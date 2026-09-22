<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drivers table indexes
        Schema::table('drivers', function (Blueprint $table) {
            $table->index('active', 'drivers_active_index');
            $table->index('category', 'drivers_category_index');
            $table->index('role', 'drivers_role_index');
            $table->index(['active', 'role', 'category'], 'drivers_compound_index');
        });

        // Cars table indexes
        Schema::table('cars', function (Blueprint $table) {
            $table->index('category', 'cars_category_index');
            $table->index('season_year', 'cars_season_year_index');
        });

        // Race schedules indexes
        Schema::table('race_schedules', function (Blueprint $table) {
            $table->index('status', 'race_schedules_status_index');
            $table->index('race_date', 'race_schedules_race_date_index');
            $table->index('season_year', 'race_schedules_season_year_index');
            $table->index(['status', 'race_date'], 'race_schedules_compound_index');
        });

        // Sponsors indexes
        Schema::table('sponsors', function (Blueprint $table) {
            $table->index('active', 'sponsors_active_index');
            $table->index('tier', 'sponsors_tier_index');
        });
    }

    public function down(): void
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->dropIndex('drivers_active_index');
            $table->dropIndex('drivers_category_index');
            $table->dropIndex('drivers_role_index');
            $table->dropIndex('drivers_compound_index');
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->dropIndex('cars_category_index');
            $table->dropIndex('cars_season_year_index');
        });

        Schema::table('race_schedules', function (Blueprint $table) {
            $table->dropIndex('race_schedules_status_index');
            $table->dropIndex('race_schedules_race_date_index');
            $table->dropIndex('race_schedules_season_year_index');
            $table->dropIndex('race_schedules_compound_index');
        });

        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropIndex('sponsors_active_index');
            $table->dropIndex('sponsors_tier_index');
        });
    }
};
