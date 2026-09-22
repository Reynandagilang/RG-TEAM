<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── Race Results — Historical race outcomes for championship analysis
        Schema::create('race_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('race_schedule_id')->constrained('race_schedules')->cascadeOnDelete();
            $table->string('driver_name');
            $table->integer('permanent_number');
            $table->string('team_name');
            $table->integer('position');
            $table->integer('grid_position')->nullable();
            $table->integer('points_earned')->default(0);
            $table->string('finish_status')->default('Finished'); // Finished, DNF, DNS, DSQ
            $table->integer('laps_completed');
            $table->string('fastest_lap_time')->nullable();
            $table->string('retirement_reason')->nullable();
            $table->integer('season_year')->default(2026);
            $table->timestamps();
        });

        // ── Driver Performance — Telemetry snapshots and lap analysis per driver
        Schema::create('driver_performances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers')->cascadeOnDelete();
            $table->foreignId('race_schedule_id')->nullable()->constrained('race_schedules')->nullOnDelete();
            $table->string('session_type'); // Practice 1, Practice 2, Qualifying, Race
            $table->string('lap_number')->nullable();
            $table->string('sector'); // S1, S2, S3, or LAP
            $table->decimal('time_seconds', 8, 3)->nullable();
            $table->decimal('speed_trap_kmh', 7, 2)->nullable();
            $table->decimal('gearbox_temp_c', 6, 2)->nullable();
            $table->decimal('tire_temp_front_l_c', 6, 2)->nullable();
            $table->decimal('tire_temp_front_r_c', 6, 2)->nullable();
            $table->decimal('tire_temp_rear_l_c', 6, 2)->nullable();
            $table->decimal('tire_temp_rear_r_c', 6, 2)->nullable();
            $table->integer('lap_date');
            $table->string('compound_used')->nullable(); // SOFT, MEDIUM, HARD
            $table->timestamps();
        });

        // ── Car Setups — Aerodynamic and suspension configurations
        Schema::create('car_setups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars')->cascadeOnDelete();
            $table->foreignId('race_schedule_id')->nullable()->constrained('race_schedules')->nullOnDelete();
            $table->integer('season_year')->default(2026);
            $table->string('setup_name');
            $table->string('circuit_name');
            $table->decimal('front_wing_angle', 5, 2)->default(7.50); // degrees
            $table->decimal('rear_wing_angle', 5, 2)->default(7.00);   // degrees
            $table->decimal('front_ride_height', 5, 2)->default(15.00); // mm
            $table->decimal('rear_ride_height', 5, 2)->default(20.00);  // mm
            $table->decimal('front_spring_rate', 6, 1)->default(1000.0); // N/m
            $table->decimal('rear_spring_rate', 6, 1)->default(1200.0);  // N/m
            $table->decimal('barbal_height', 5, 2)->default(10.00); // mm
            $table->decimal('gear_ratio_final', 5, 2)->default(13.50);
            $table->string('tyre_pressure_front', 50)->nullable();
            $table->string('tyre_pressure_rear', 50)->nullable();
            $table->string('brake_bias', 50)->default('58.0% Front');
            $table->decimal('aerodynamic_load', 5, 2)->default(1.00); // downforce multiplier
            $table->decimal('drag_coefficient', 5, 3)->default(0.350);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // ── Fantasy Teams — F1 Fantasy league management
        Schema::create('fantasy_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('season_year')->default(2026);
            $table->string('team_name');
            $table->decimal('budget_used', 10, 1)->default(0);
            $table->decimal('budget_total', 10, 1)->default(100.0);
            $table->integer('total_points')->default(0);
            $table->integer('race_count')->default(0);
            $table->integer('league_position')->nullable();
            $table->json('drivers_selected')->nullable(); // [driver_id, driver_id, driver_id, driver_id, driver_id]
            $table->timestamps();
        });

        // ── Fantasy Driver Prices — Dynamic driver valuations
        Schema::create('fantasy_driver_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers')->cascadeOnDelete();
            $table->integer('season_year')->default(2026);
            $table->decimal('price_millions', 6, 2)->default(5.00);
            $table->decimal('avg_points', 6, 2)->default(0);
            $table->integer('popularity_percent')->default(0);
            $table->timestamps();
        });

        // ── Telemetry Snapshots — Real-time telemetry data points for charts
        Schema::create('telemetry_snapshots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers')->cascadeOnDelete();
            $table->foreignId('race_schedule_id')->nullable()->constrained('race_schedules')->nullOnDelete();
            $table->integer('lap_number');
            $table->string('session_type');
            $table->decimal('speed_kmh', 6, 2)->nullable();
            $table->decimal('engine_rpm', 7, 0)->nullable();
            $table->decimal('gear', 3, 0)->nullable();
            $table->decimal('throttle_percent', 5, 1)->nullable();
            $table->decimal('brake_percent', 5, 1)->nullable();
            $table->decimal('steering_angle', 5, 1)->nullable();
            $table->decimal('drs_active', 3, 0)->default(0);
            $table->decimal('ers_deployment_percent', 5, 1)->nullable();
            $table->decimal('fuel_remaining_liters', 5, 2)->nullable();
            $table->integer('timestamp_ms')->default(0);
            $table->timestamps();
        });

        // ── Weather Data — Historical and predictive weather for circuits
        Schema::create('weather_data', function (Blueprint $table) {
            $table->id();
            $table->string('circuit_name');
            $table->foreignId('race_schedule_id')->nullable()->constrained('race_schedules')->nullOnDelete();
            $table->integer('season_year')->default(2026);
            $table->dateTime('recorded_at');
            $table->decimal('temperature_celsius', 4, 1);
            $table->decimal('humidity_percent', 4, 1);
            $table->decimal('track_temp_celsius', 4, 1);
            $table->decimal('air_pressure_hpa', 6, 1);
            $table->string('condition'); // dry, damp, wet, raining
            $table->string('wind_direction');
            $table->decimal('wind_speed_kmh', 5, 1);
            $table->integer('visibility_meters')->default(10000);
            $table->timestamps();
        });

        // ── Team Radio Messages — Archive of radio communications
        Schema::create('team_radio_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->nullOnDelete();
            $table->foreignId('race_schedule_id')->nullable()->constrained('race_schedules')->nullOnDelete();
            $table->integer('season_year')->default(2026);
            $table->string('lap_number')->nullable();
            $table->string('session_type')->default('Race');
            $table->string('sender'); // Driver, Race Engineer, Pit Wall
            $table->string('recipient');
            $table->text('message_text');
            $table->integer('audio_duration_sec')->default(0);
            $table->string('audio_url')->nullable();
            $table->string('category')->default('General'); // Strategy, Technical, Safety, Motivation
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_radio_messages');
        Schema::dropIfExists('weather_data');
        Schema::dropIfExists('telemetry_snapshots');
        Schema::dropIfExists('fantasy_driver_prices');
        Schema::dropIfExists('fantasy_teams');
        Schema::dropIfExists('car_setups');
        Schema::dropIfExists('driver_performances');
        Schema::dropIfExists('race_results');
    }
};
