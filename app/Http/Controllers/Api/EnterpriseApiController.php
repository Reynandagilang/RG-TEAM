<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Order;
use App\Models\RaceSchedule;
use App\Models\Team;
use Illuminate\Http\JsonResponse;

class EnterpriseApiController extends Controller
{
    public function teamInfo(): JsonResponse
    {
        $team = Team::first();
        return response()->json(['status' => 'success', 'data' => $team]);
    }

    public function drivers(): JsonResponse
    {
        $drivers = Driver::with('team')->get();
        return response()->json(['status' => 'success', 'data' => $drivers]);
    }

    public function schedule(): JsonResponse
    {
        $schedule = RaceSchedule::orderBy('race_date')->get();
        return response()->json(['status' => 'success', 'data' => $schedule]);
    }

    public function telemetryData(): JsonResponse
    {
        $telemetry = [
            'chassis' => 'M1TRG-F1-2026-EVO',
            'engine_temp' => '98.4 °C',
            'oil_pressure' => '5.2 bar',
            'hybrid_soc' => '94.2 %',
            'tyre_life' => ['fl' => '88%', 'fr' => '86%', 'rl' => '91%', 'rr' => '89%'],
            'speed' => '328 km/h',
            'lap_time' => '1:28.452'
        ];

        return response()->json(['status' => 'success', 'data' => $telemetry]);
    }
}
