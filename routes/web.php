<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\CarController;
use App\Http\Controllers\Public\EnterpriseModuleController;
use App\Http\Controllers\VipPassController;

// ── Home ────────────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

// ── Authentication (sementara di‑comment karena controller belum ada) ──
// Route::get('/login', [\App\Http\Controllers\Public\Auth\LoginController::class, 'showLogin'])->name('login');
// Route::post('/login', [\App\Http\Controllers\Public\Auth\LoginController::class, 'login'])->name('login.post');
// Route::post('/logout', [\App\Http\Controllers\Public\Auth\LogoutController::class, 'logout'])->name('logout');
// Route::get('/register', [\App\Http\Controllers\Public\Auth\RegisterController::class, 'showRegister'])->name('register');
// Route::post('/register', [\App\Http\Controllers\Public\Auth\RegisterController::class, 'register'])->name('register.post');

// ── About ────────────────────────────────────────────────────────────────
Route::view('/about', 'about')->name('about');

// ── Car Section ────────────────────────────────────────────────────────
Route::get('/car', [CarController::class, 'index'])->name('car.index');
Route::get('/car/{slug}', [CarController::class, 'show'])->name('car.show');
Route::get('/car-specs', [CarController::class, 'specs'])->name('car.specs');

// ── Drivers Section (placeholder) ───────────────────────────────────────
// TODO: Buat DriverController jika diperlukan.
// Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
// Route::get('/driver/{slug}', [DriverController::class, 'show'])->name('driver.show');

// ── VIP Pass (authenticated) ────────────────────────────────────────
Route::middleware('auth')
    ->prefix('vip-pass')
    ->name('vip-pass.')
    ->group(function () {
        Route::get('/', [VipPassController::class, 'index'])->name('index');
        Route::get('/{vipPass}', [VipPassController::class, 'show'])->name('show');
        Route::get('/{vipPass}/download', [VipPassController::class, 'download'])->name('download');
        Route::get('/{vipPass}/popup', [VipPassController::class, 'showPopup'])->name('popup');
    });

// ── Endurance ────────────────────────────────────────────────────────────
Route::get('/endurance', [EnterpriseModuleController::class, 'liveRaceCenter'])->name('endurance.index');
Route::get('/endurance/{slug}', [EnterpriseModuleController::class, 'liveRaceCenter'])->name('endurance.show');

// ── Divisions ────────────────────────────────────────────────────────────
Route::view('/divisions/f1', 'racing.formulae')->name('f1.division');
Route::view('/divisions/indycar', 'racing.indycar')->name('indycar');
Route::view('/divisions/wrc', 'racing.wrc')->name('wrc');

// ── Drivers ──────────────────────────────────────────────────────────────
Route::get('/drivers', function () {
    $team = \App\Models\Team::first();
    $drivers = \App\Models\Driver::where('team_id', $team?->id ?? 0)
        ->where('active', true)
        ->orderBy('career_points', 'desc')
        ->get();
    return view('rgr.drivers', compact('drivers'));
})->name('drivers');

// ── Standings ────────────────────────────────────────────────────────────
Route::get('/standings', [EnterpriseModuleController::class, 'liveRaceCenter'])->name('standings');

// ── Paddock Club ─────────────────────────────────────────────────────────
Route::get('/paddock-club', [EnterpriseModuleController::class, 'membership'])->name('paddock.club');

// ── Sitemap ───────────────────────────────────────────────────────────────
Route::get('/sitemap.xml', function () {
    return response()->view('sitemap', [], 200, [
        'Content-Type' => 'application/xml',
    ]);
})->name('sitemap');

// ── Enterprise Modules ───────────────────────────────────────────────────
Route::prefix('enterprise')
    ->name('enterprise.')
    ->group(function () {
        Route::get('/live-race-center', [EnterpriseModuleController::class, 'liveRaceCenter'])->name('live-race');
        Route::get('/statistics-center', [EnterpriseModuleController::class, 'statisticsCenter'])->name('statistics');
        Route::get('/team-museum', [EnterpriseModuleController::class, 'teamMuseum'])->name('museum');
        Route::get('/sponsor-portal', [EnterpriseModuleController::class, 'sponsorPortal'])->name('sponsor-portal');
        Route::get('/logistics-hub', [EnterpriseModuleController::class, 'logisticsHub'])->name('logistics');
        Route::get('/engineering-dashboard', [EnterpriseModuleController::class, 'engineeringDashboard'])->name('engineering');
        Route::get('/membership', [EnterpriseModuleController::class, 'membership'])->name('membership');

        // ── New Interactive Modules ────────────────────────────────────────
        Route::get('/race-strategy', [EnterpriseModuleController::class, 'raceStrategy'])->name('race-strategy');
        Route::post('/race-strategy/calculate', [EnterpriseModuleController::class, 'strategyCalculate'])->name('strategy-calculate');
        Route::get('/driver-analytics', [EnterpriseModuleController::class, 'driverAnalytics'])->name('driver-analytics');
        Route::get('/car-setup', [EnterpriseModuleController::class, 'carSetup'])->name('car-setup');
        Route::get('/fantasy-league', [EnterpriseModuleController::class, 'fantasyLeague'])->name('fantasy-league');
        Route::post('/fantasy/draft/{driver}', [EnterpriseModuleController::class, 'fantasyDraft'])->name('fantasy-draft');
        Route::post('/fantasy/drop/{driver}', [EnterpriseModuleController::class, 'fantasyDrop'])->name('fantasy-drop');
        Route::get('/team-radio', [EnterpriseModuleController::class, 'teamRadio'])->name('team-radio');
        Route::get('/weather-center', [EnterpriseModuleController::class, 'weatherCenter'])->name('weather-center');
        Route::get('/race-results', [EnterpriseModuleController::class, 'raceResults'])->name('race-results');
    });

// ── Fan Zone (Auth) ──────────────────────────────────────────────────────
Route::get('/fan/login', [EnterpriseModuleController::class, 'membership'])->name('fan.login');
Route::post('/fan/logout', function () { return redirect('/'); })->name('fan.logout');
Route::get('/fan/dashboard', [EnterpriseModuleController::class, 'membership'])->name('fan.dashboard');
Route::get('/dashboard', [EnterpriseModuleController::class, 'membership'])->name('dashboard');

// ── About Sub-Pages ──────────────────────────────────────────────────────
Route::get('/about/corporate', [EnterpriseModuleController::class, 'teamMuseum'])->name('about.corporate');
Route::get('/about/history', [EnterpriseModuleController::class, 'teamMuseum'])->name('about.history');
Route::get('/about/achievements', [EnterpriseModuleController::class, 'teamMuseum'])->name('about.achievements');
Route::view('/about/academy', 'about.academy')->name('about.academy');
Route::get('/about/sustainability', [EnterpriseModuleController::class, 'teamMuseum'])->name('about.sustainability');
Route::get('/about/partnership', [EnterpriseModuleController::class, 'sponsorPortal'])->name('about.partnership');
Route::get('/about/news', [EnterpriseModuleController::class, 'liveRaceCenter'])->name('about.news');
Route::get('/about/media', [EnterpriseModuleController::class, 'liveRaceCenter'])->name('about.media');
Route::get('/about/magazine', [EnterpriseModuleController::class, 'liveRaceCenter'])->name('about.magazine');

// ── More Racing Divisions ─────────────────────────────────────────────────
Route::view('/divisions/fe', 'racing.formulae')->name('fe');
Route::view('/divisions/ewc', 'racing.ewc')->name('ewc');
Route::view('/divisions/nascar', 'racing.nascar')->name('nascar');
Route::view('/divisions/gt/europe', 'racing.gtwce')->name('gt.europe');
Route::view('/divisions/gt/asia', 'racing.gtwca')->name('gt.asia');

// ── Race Schedule ─────────────────────────────────────────────────────────
Route::get('/schedule', [EnterpriseModuleController::class, 'raceResults'])->name('race.schedule');

// ── Partners ──────────────────────────────────────────────────────────────
Route::get('/partners', [EnterpriseModuleController::class, 'sponsorPortal'])->name('partners');

// ── Shop ──────────────────────────────────────────────────────────────────
Route::get('/shop', [EnterpriseModuleController::class, 'membership'])->name('shop');
Route::get('/shop/checkout', [EnterpriseModuleController::class, 'membership'])->name('shop.checkout-v2');
