<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\RaceSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FanController extends Controller
{
    public function showRegister(): View
    {
        return view('fan.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('fan.dashboard')->with('success', 'Registrasi sukses! Selamat bergabung di Fan Zone M1TRG.');
    }

    public function showLogin(): View
    {
        return view('fan.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('fan.dashboard')->with('success', 'Selamat datang kembali di Paddock Portal!');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Anda berhasil keluar dari Fan Zone.');
    }

    public function dashboard(): View
    {
        $user = Auth::user();
        $drivers = Driver::orderBy('name')->get();
        
        // Upcoming races that the user can predict
        $upcomingRaces = RaceSchedule::where('race_date', '>', now())
            ->orderBy('race_date')
            ->get();

        // User's past and pending predictions
        $predictions = \DB::table('predictions')
            ->join('race_schedules', 'predictions.race_schedule_id', '=', 'race_schedules.id')
            ->join('drivers', 'predictions.driver_id', '=', 'drivers.id')
            ->where('predictions.user_id', $user->id)
            ->select('predictions.*', 'race_schedules.grand_prix_name', 'race_schedules.race_date', 'drivers.name as driver_name', 'drivers.permanent_number')
            ->orderBy('predictions.created_at', 'desc')
            ->get();

        return view('fan.dashboard', compact('user', 'drivers', 'upcomingRaces', 'predictions'));
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'avatar_color' => 'required|string|max:7',
            'favorite_driver_id' => 'nullable|exists:drivers,id',
        ]);

        $user->name = $request->name;
        $user->avatar_color = $request->avatar_color;
        $user->favorite_driver_id = $request->favorite_driver_id;
        
        // Automatically award 10 welcome/setup points if points is 0
        if ($user->points == 0) {
            $user->points = 10;
        }

        $user->save();

        return back()->with('success', 'Profil keanggotaan fans berhasil diperbarui!');
    }

    public function storePrediction(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'race_schedule_id' => 'required|exists:race_schedules,id',
            'driver_id' => 'required|exists:drivers,id',
        ]);

        // Check if user already predicted for this race
        $existing = \DB::table('predictions')
            ->where('user_id', $user->id)
            ->where('race_schedule_id', $request->race_schedule_id)
            ->first();

        if ($existing) {
            return back()->withErrors(['prediction' => 'Anda sudah memasukkan tebakan pemenang untuk seri balapan ini.']);
        }

        \DB::table('predictions')->insert([
            'user_id' => $user->id,
            'race_schedule_id' => $request->race_schedule_id,
            'driver_id' => $request->driver_id,
            'status' => 'pending',
            'points_awarded' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Award 5 points just for predicting!
        $user->points += 5;
        $user->save();

        return back()->with('success', 'Prediksi berhasil disimpan! (+5 Poin keaktifan fans ditambahkan)');
    }
}
