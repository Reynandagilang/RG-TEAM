<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ── Enterprise REST API Endpoints ─────────────────────────────────────────
use App\Http\Controllers\Api\EnterpriseApiController;

Route::prefix('v1')->group(function () {
    Route::get('/team', [EnterpriseApiController::class, 'teamInfo']);
    Route::get('/drivers', [EnterpriseApiController::class, 'drivers']);
    Route::get('/schedule', [EnterpriseApiController::class, 'schedule']);
    Route::get('/telemetry', [EnterpriseApiController::class, 'telemetryData']);
});
