<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnalyticsAndFantasySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedule = \App\Models\RaceSchedule::first();
        $scheduleId = $schedule?->id ?? 1;

        $drivers = \App\Models\Driver::all();
        $driver1 = $drivers->first();
        $driver2 = $drivers->skip(1)->first();
        $car = \App\Models\Car::first();
        $carId = $car?->id ?? 1;

        // 1. Race Results
        \Illuminate\Support\Facades\DB::table('race_results')->truncate();
        $results = [
            ['race_schedule_id' => $scheduleId, 'driver_name' => 'Alexandre Silva', 'permanent_number' => 44, 'team_name' => 'Mobil 1 Team RG', 'position' => 1, 'grid_position' => 2, 'points_earned' => 25, 'finish_status' => 'Finished', 'laps_completed' => 58, 'fastest_lap_time' => '1:19.452', 'season_year' => 2026],
            ['race_schedule_id' => $scheduleId, 'driver_name' => 'Max Verstappen', 'permanent_number' => 1, 'team_name' => 'Red Bull Racing', 'position' => 2, 'grid_position' => 1, 'points_earned' => 18, 'finish_status' => 'Finished', 'laps_completed' => 58, 'fastest_lap_time' => '1:19.510', 'season_year' => 2026],
            ['race_schedule_id' => $scheduleId, 'driver_name' => 'Kaito Tanaka', 'permanent_number' => 19, 'team_name' => 'Mobil 1 Team RG', 'position' => 3, 'grid_position' => 4, 'points_earned' => 15, 'finish_status' => 'Finished', 'laps_completed' => 58, 'fastest_lap_time' => '1:19.820', 'season_year' => 2026],
            ['race_schedule_id' => $scheduleId, 'driver_name' => 'Charles Leclerc', 'permanent_number' => 16, 'team_name' => 'Scuderia Ferrari', 'position' => 4, 'grid_position' => 3, 'points_earned' => 12, 'finish_status' => 'Finished', 'laps_completed' => 58, 'fastest_lap_time' => '1:19.990', 'season_year' => 2026],
            ['race_schedule_id' => $scheduleId, 'driver_name' => 'Lando Norris', 'permanent_number' => 4, 'team_name' => 'McLaren F1 Team', 'position' => 5, 'grid_position' => 5, 'points_earned' => 10, 'finish_status' => 'Finished', 'laps_completed' => 58, 'fastest_lap_time' => '1:20.100', 'season_year' => 2026],
        ];
        foreach ($results as $res) {
            \Illuminate\Support\Facades\DB::table('race_results')->insert(array_merge($res, ['created_at' => now(), 'updated_at' => now()]));
        }

        // 2. Car Setups
        \Illuminate\Support\Facades\DB::table('car_setups')->truncate();
        $setups = [
            [
                'car_id' => $carId,
                'race_schedule_id' => $scheduleId,
                'season_year' => 2026,
                'setup_name' => 'Monaco High-Downforce Qualifying Spec',
                'circuit_name' => 'Circuit de Monaco',
                'front_wing_angle' => 38.5,
                'rear_wing_angle' => 42.0,
                'front_ride_height' => 14.5,
                'rear_ride_height' => 19.0,
                'front_spring_rate' => 1100.0,
                'rear_spring_rate' => 1250.0,
                'barbal_height' => 9.5,
                'gear_ratio_final' => 13.8,
                'tyre_pressure_front' => '22.5 PSI',
                'tyre_pressure_rear' => '20.0 PSI',
                'brake_bias' => '56.5% Front',
                'aerodynamic_load' => 1.45,
                'drag_coefficient' => 0.420,
                'notes' => 'Optimized for slow corner rotation and maximum apex stability through Loews Hairpin.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_id' => $carId,
                'race_schedule_id' => $scheduleId,
                'season_year' => 2026,
                'setup_name' => 'Monza Low-Drag High-Speed Trim',
                'circuit_name' => 'Autodromo Nazionale Monza',
                'front_wing_angle' => 18.0,
                'rear_wing_angle' => 16.5,
                'front_ride_height' => 12.0,
                'rear_ride_height' => 15.0,
                'front_spring_rate' => 1300.0,
                'rear_spring_rate' => 1400.0,
                'barbal_height' => 10.0,
                'gear_ratio_final' => 14.2,
                'tyre_pressure_front' => '24.0 PSI',
                'tyre_pressure_rear' => '21.5 PSI',
                'brake_bias' => '58.0% Front',
                'aerodynamic_load' => 0.85,
                'drag_coefficient' => 0.280,
                'notes' => 'Skinny rear wing flap targeting 355+ km/h top speed down Rettifilo straight.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        \Illuminate\Support\Facades\DB::table('car_setups')->insert($setups);

        // 3. Fantasy Driver Prices
        \Illuminate\Support\Facades\DB::table('fantasy_driver_prices')->truncate();
        if ($drivers->isNotEmpty()) {
            foreach ($drivers as $d) {
                \Illuminate\Support\Facades\DB::table('fantasy_driver_prices')->insert([
                    'driver_id' => $d->id,
                    'season_year' => 2026,
                    'price_millions' => $d->number == 44 ? 28.50 : 21.00,
                    'avg_points' => $d->number == 44 ? 22.40 : 16.80,
                    'popularity_percent' => $d->number == 44 ? 74 : 58,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // 4. Telemetry Snapshots
        \Illuminate\Support\Facades\DB::table('telemetry_snapshots')->truncate();
        $snapshots = [];
        $baseSpeed = 260.0;
        for ($i = 0; $i < 30; $i++) {
            $snapshots[] = [
                'driver_id' => $driver1?->id ?? 1,
                'race_schedule_id' => $scheduleId,
                'lap_number' => 5,
                'session_type' => 'Race',
                'speed_kmh' => $baseSpeed + sin($i * 0.4) * 50,
                'engine_rpm' => 11500 + sin($i * 0.4) * 1200,
                'gear' => ($i % 8) + 1,
                'throttle_percent' => max(10, min(100, 80 + cos($i * 0.5) * 25)),
                'brake_percent' => ($i % 7 == 0) ? 85.0 : 0.0,
                'steering_angle' => sin($i * 0.3) * 15,
                'drs_active' => ($i > 10 && $i < 20) ? 1 : 0,
                'ers_deployment_percent' => 68.5,
                'fuel_remaining_liters' => 74.2 - ($i * 0.1),
                'timestamp_ms' => $i * 500,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        \Illuminate\Support\Facades\DB::table('telemetry_snapshots')->insert($snapshots);

        // 5. Weather Data
        \Illuminate\Support\Facades\DB::table('weather_data')->truncate();
        $weatherRecords = [];
        for ($h = 0; $h < 24; $h++) {
            $weatherRecords[] = [
                'circuit_name' => 'Marina Bay Street Circuit',
                'race_schedule_id' => $scheduleId,
                'season_year' => 2026,
                'recorded_at' => now()->subHours(24 - $h),
                'temperature_celsius' => 29.5 + sin($h * 0.2) * 3,
                'humidity_percent' => 78.0 - sin($h * 0.2) * 10,
                'track_temp_celsius' => 34.0 + sin($h * 0.2) * 5,
                'air_pressure_hpa' => 1008.5,
                'condition' => ($h > 18) ? 'damp' : 'dry',
                'wind_direction' => 'SSE',
                'wind_speed_kmh' => 12.5,
                'visibility_meters' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        \Illuminate\Support\Facades\DB::table('weather_data')->insert($weatherRecords);

        // 6. Team Radio Messages
        \Illuminate\Support\Facades\DB::table('team_radio_messages')->truncate();
        $radio = [
            [
                'driver_id' => $driver1?->id ?? 1,
                'race_schedule_id' => $scheduleId,
                'season_year' => 2026,
                'lap_number' => '14',
                'session_type' => 'Race',
                'sender' => 'Pit Wall (Gianpiero)',
                'recipient' => 'Alexandre Silva',
                'message_text' => 'Box this lap, box for Hard tyres. Undercut window is open.',
                'audio_duration_sec' => 4,
                'category' => 'Strategy',
                'created_at' => now()->subMinutes(35),
                'updated_at' => now()->subMinutes(35),
            ],
            [
                'driver_id' => $driver1?->id ?? 1,
                'race_schedule_id' => $scheduleId,
                'season_year' => 2026,
                'lap_number' => '15',
                'session_type' => 'Race',
                'sender' => 'Alexandre Silva',
                'recipient' => 'Pit Wall',
                'message_text' => 'Copy that, tyres feel good but traffic ahead is costing 4 tenths.',
                'audio_duration_sec' => 5,
                'category' => 'Strategy',
                'created_at' => now()->subMinutes(34),
                'updated_at' => now()->subMinutes(34),
            ],
            [
                'driver_id' => $driver2?->id ?? 2,
                'race_schedule_id' => $scheduleId,
                'season_year' => 2026,
                'lap_number' => '28',
                'session_type' => 'Race',
                'sender' => 'Pit Wall (Engineer)',
                'recipient' => 'Kaito Tanaka',
                'message_text' => 'Yellow flag Sector 2, debris on exit of Turn 4. Switch to Mode 7.',
                'audio_duration_sec' => 6,
                'category' => 'Safety',
                'created_at' => now()->subMinutes(18),
                'updated_at' => now()->subMinutes(18),
            ],
        ];
        \Illuminate\Support\Facades\DB::table('team_radio_messages')->insert($radio);
    }
}
