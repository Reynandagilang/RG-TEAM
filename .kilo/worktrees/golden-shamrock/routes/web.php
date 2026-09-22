<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\CarController;
use App\Http\Controllers\Public\EnduranceRaceController;
use App\Http\Controllers\Public\FanController;

/*
|--------------------------------------------------------------------------
| RG Racing — Public Web Routes
|--------------------------------------------------------------------------
|
| All public-facing routes are handled by the Public namespace controllers.
| Business logic is fully delegated to Service classes.
|
*/

// ── Homepage ──────────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

// ── Car Specifications ────────────────────────────────────────────────────
Route::get('/car-specs', [CarController::class, 'specs'])->name('car.specs');

// ── Drivers Lineup ────────────────────────────────────────────────────────
Route::get('/drivers', [HomeController::class, 'drivers'])->name('drivers');
Route::get('/partners', [HomeController::class, 'partners'])->name('partners');

// ── Divisi F1 ─────────────────────────────────────────────────────────────
Route::get('/f1-division', [HomeController::class, 'f1Division'])->name('f1.division');
Route::get('/paddock-club', [HomeController::class, 'paddockClub'])->name('paddock.club');

// ── Jadwal & Klasemen ─────────────────────────────────────────────────────
Route::get('/race-schedule', [HomeController::class, 'schedule'])->name('race.schedule');
Route::get('/standings', [HomeController::class, 'standings'])->name('standings');

// ── Sistem Autentikasi Fans ──────────────────────────────────────────────
Route::get('/login', [HomeController::class, 'showLogin'])->name('login');
Route::post('/login', [HomeController::class, 'login']);
Route::get('/register', [HomeController::class, 'showRegister'])->name('register');
Route::post('/register', [HomeController::class, 'register']);
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

// ── Dashboard & Pembelian Tiket VIP ──────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::post('/paddock-club/book', [HomeController::class, 'bookTicket'])->name('paddock.book');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

// ── About Us Sub-pages ────────────────────────────────────────────────────
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/corporate', [HomeController::class, 'corporate'])->name('corporate');
    Route::get('/sustainability', [HomeController::class, 'sustainability'])->name('sustainability');
    Route::get('/media-centre', [HomeController::class, 'mediaCentre'])->name('media');
    Route::get('/academy', [HomeController::class, 'academy'])->name('academy');
    Route::get('/news', [HomeController::class, 'news'])->name('news');
    Route::get('/magazine', [HomeController::class, 'magazine'])->name('magazine');
    Route::get('/history', [HomeController::class, 'history'])->name('history');
    Route::get('/achievements', [HomeController::class, 'achievements'])->name('achievements');
    Route::get('/partnership', [HomeController::class, 'partnership'])->name('partnership');
    Route::get('/join-us', [HomeController::class, 'joinUs'])->name('join');
});

// ── Endurance Series ──────────────────────────────────────────────────────
Route::prefix('endurance')->name('endurance.')->group(function () {

    // Hub page: lists all 4 endurance events
    Route::get('/', [EnduranceRaceController::class, 'index'])->name('index');

    // Dynamic detail page per event slug:
    //   /endurance/24h-le-mans
    //   /endurance/24h-spa
    //   /endurance/24h-nurburgring
    //   /endurance/imsa-6h-the-glen
    Route::get('/{slug}', [EnduranceRaceController::class, 'show'])
        ->where('slug', '[a-z0-9\-]+')
        ->name('show');
});

// ── Divisi Racing Tambahan ────────────────────────────────────────────────
Route::get('/nascar', [HomeController::class, 'nascar'])->name('nascar');
Route::prefix('gt-world-challenge')->name('gt.')->group(function () {
    Route::get('/europe', [HomeController::class, 'gtwce'])->name('europe');
    Route::get('/asia', [HomeController::class, 'gtwca'])->name('asia');
});

// ── Toko Merchandise Resmi ────────────────────────────────────────────────
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::post('/checkout', [HomeController::class, 'placeOrder'])->name('checkout.place');
Route::get('/checkout/success/{id}', [HomeController::class, 'checkoutSuccess'])->name('checkout.success');

// ── Divisi IndyCar Series ──────────────────────────────────────────────────
Route::get('/indycar', [HomeController::class, 'indycar'])->name('indycar');

// ── Divisi WRC Rally ───────────────────────────────────────────────────────
Route::get('/wrc', [HomeController::class, 'wrc'])->name('wrc');

// ── Divisi FIM EWC & Formula E ─────────────────────────────────────────────
Route::get('/fim-ewc', [HomeController::class, 'ewc'])->name('ewc');
Route::get('/formula-e', [HomeController::class, 'formulaE'])->name('fe');

// ── E-Commerce Checkout V2 ────────────────────────────────────────────────
Route::get('/shop/checkout', [HomeController::class, 'checkoutV2'])->name('shop.checkout-v2');

// ── Fan Zone Auth & Portal ────────────────────────────────────────────────
Route::get('/fan/register', [FanController::class, 'showRegister'])->name('fan.register');
Route::post('/fan/register', [FanController::class, 'register'])->name('fan.register.post');
Route::get('/fan/login', [FanController::class, 'showLogin'])->name('fan.login');
Route::post('/fan/login', [FanController::class, 'login'])->name('fan.login.post');
Route::post('/fan/logout', [FanController::class, 'logout'])->name('fan.logout');

Route::middleware(['auth'])->prefix('fan')->name('fan.')->group(function () {
    Route::get('/dashboard', [FanController::class, 'dashboard'])->name('dashboard');
    Route::post('/profile/update', [FanController::class, 'updateProfile'])->name('profile.update');
    Route::post('/predict', [FanController::class, 'storePrediction'])->name('predict');
});

// ── Midtrans Integration ──────────────────────────────────────────────────
Route::post('/midtrans/callback', [App\Http\Controllers\Public\MidtransCallbackController::class, 'handle'])->name('midtrans.callback');

// ── Sitemap ───────────────────────────────────────────────────────────────
Route::get('/sitemap.xml', function () {
    return response()->view('sitemap', [], 200, [
        'Content-Type' => 'application/xml',
    ]);
})->name('sitemap');

// ── Enterprise Modules ───────────────────────────────────────────────────
use App\Http\Controllers\Public\EnterpriseModuleController;

Route::prefix('enterprise')->name('enterprise.')->group(function () {
    Route::get('/live-race-center', [EnterpriseModuleController::class, 'liveRaceCenter'])->name('live-race');
    Route::get('/statistics-center', [EnterpriseModuleController::class, 'statisticsCenter'])->name('statistics');
    Route::get('/team-museum', [EnterpriseModuleController::class, 'teamMuseum'])->name('museum');
    Route::get('/sponsor-portal', [EnterpriseModuleController::class, 'sponsorPortal'])->name('sponsor-portal');
    Route::get('/engineering-dashboard', [EnterpriseModuleController::class, 'engineeringDashboard'])->name('engineering');
    Route::get('/membership', [EnterpriseModuleController::class, 'membership'])->name('membership');
});
