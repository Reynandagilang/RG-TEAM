<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use App\Models\RaceSchedule;
use App\Models\Team;
use Illuminate\Http\Request;

class RgrTeamController extends Controller
{
    /**
     * index()
     * -------
     * Halaman utama (/) — Menggabungkan:
     *  - Data tim RGR
     *  - Line-up driver aktif
     *  - Mobil terbaru (RGR-26)
     *  - Balapan berikutnya untuk modul countdown
     *  - Semua jadwal balapan musim ini
     */
    public function index()
    {
        // Ambil tim RGR (asumsi hanya ada 1 tim)
        $team = Team::with(['activeDrivers', 'car'])->first();

        // Driver aktif (Race Drivers saja), urutkan berdasarkan nomor balap
        $drivers = Driver::active()
            ->raceDrivers()
            ->orderBy('permanent_number')
            ->get();

        // Balapan berikutnya (paling dekat, upcoming)
        $nextRace = RaceSchedule::upcoming()
            ->orderBy('race_date', 'asc')
            ->first();

        // Semua jadwal balapan musim 2026
        $raceSchedules = RaceSchedule::orderBy('race_date', 'asc')
            ->get()
            ->groupBy('status');

        // Mobil terbaru RGR
        $activeCar = Car::latest()->first();

        // Hitung seconds untuk JavaScript countdown
        $countdownSeconds = $nextRace ? max(0, now()->diffInSeconds($nextRace->race_date, false)) : 0;

        return view('rgr.index', compact(
            'team',
            'drivers',
            'nextRace',
            'raceSchedules',
            'activeCar',
            'countdownSeconds'
        ));
    }

    /**
     * carSpecs()
     * ----------
     * Halaman /car — Membedah spesifikasi teknis mendalam RGR-26 E Performance.
     *  - Detail teknis: Power Unit, Chassis, Aero, Suspension
     *  - Perbandingan statistik visual
     */
    public function carSpecs()
    {
        $team = Team::first();

        // Ambil mobil terbaru (RGR-26)
        $car = Car::with('team')->latest()->firstOrFail();

        // Spesifikasi dalam format terstruktur untuk tampilan card
        $techSpecs = [
            'powertrain' => [
                'title' => 'Power Unit',
                'icon'  => 'bolt',
                'color' => 'cyan',
                'specs' => [
                    ['label' => 'Engine Formula',    'value' => '1.6L V6 Turbo Hybrid'],
                    ['label' => 'Power Unit',         'value' => $car->power_unit],
                    ['label' => 'Combined Power',     'value' => $car->power_hp . ' HP'],
                    ['label' => 'MGU-K Output',       'value' => '120 kW (Regulation Max)'],
                    ['label' => 'Energy Recovery',    'value' => 'MGU-K + MGU-H Dual System'],
                    ['label' => 'Fuel Flow Limit',    'value' => '100 kg/hr'],
                ],
            ],
            'chassis' => [
                'title' => 'Chassis & Structure',
                'icon'  => 'wrench',
                'color' => 'white',
                'specs' => [
                    ['label' => 'Chassis Type',       'value' => $car->chassis],
                    ['label' => 'Weight (min)',        'value' => $car->weight . ' kg'],
                    ['label' => 'Gearbox',            'value' => '8-Speed Semi-Automatic'],
                    ['label' => 'Differential',       'value' => 'Multi-Plate Carbon'],
                    ['label' => 'Brakes',             'value' => 'Brembo Carbon-Ceramic'],
                    ['label' => 'Steering',           'value' => 'Power-Assisted Rack'],
                ],
            ],
            'aerodynamics' => [
                'title' => 'Aerodynamics',
                'icon'  => 'wind',
                'color' => 'cyan',
                'specs' => [
                    ['label' => 'Front Wing',         'value' => 'Active Multi-Element Carbon'],
                    ['label' => 'Rear Wing',          'value' => 'DRS-Equipped Beam Wing'],
                    ['label' => 'Sidepods',           'value' => 'Venturi Undercut Design'],
                    ['label' => 'Floor',              'value' => 'Full Ground-Effect Venturi'],
                    ['label' => 'Drag Coefficient',   'value' => '0.7 – 1.1 Cd (variable)'],
                    ['label' => 'Downforce',          'value' => '4,800+ N at 250 km/h'],
                ],
            ],
            'performance' => [
                'title' => 'Performance',
                'icon'  => 'gauge',
                'color' => 'white',
                'specs' => [
                    ['label' => 'Top Speed',          'value' => $car->top_speed . ' km/h'],
                    ['label' => '0–100 km/h',         'value' => '< 2.5 seconds'],
                    ['label' => '0–300 km/h',         'value' => '< 11.8 seconds'],
                    ['label' => 'Cornering G-Force',  'value' => 'Up to 6.5G'],
                    ['label' => 'Braking (100–0)',    'value' => '< 15 metres'],
                    ['label' => 'Lap Record Circuit', 'value' => 'Spa-Francorchamps'],
                ],
            ],
        ];

        return view('rgr.car-specs', compact('team', 'car', 'techSpecs'));
    }

    /**
     * schedule()
     * ----------
     * Halaman /schedule — Tampilan kalender balapan musim 2026.
     */
    public function schedule()
    {
        $team      = Team::first();
        $upcoming  = RaceSchedule::upcoming()->orderBy('race_date')->get();
        $finished  = RaceSchedule::finished()->orderBy('race_date')->get();
        $nextRace  = $upcoming->first();

        return view('rgr.schedule', compact('team', 'upcoming', 'finished', 'nextRace'));
    }

    /**
     * drivers()
     * ----------
     * Halaman /drivers — Profil semua pembalap RGR.
     */
    public function drivers()
    {
        $team    = Team::first();
        $drivers = Driver::active()->orderBy('permanent_number')->get();

        return view('rgr.drivers', compact('team', 'drivers'));
    }
}
