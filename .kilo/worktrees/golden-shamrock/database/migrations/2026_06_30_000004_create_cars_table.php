<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->string('category')->default('F1');
            $table->unsignedSmallInteger('car_number');
            $table->string('model_name');
            $table->string('power_unit');
            $table->string('chassis');
            $table->decimal('weight', 7, 2)->nullable();             // kg
            $table->unsignedSmallInteger('top_speed')->nullable();   // km/h
            $table->unsignedSmallInteger('power_hp')->nullable();    // combined horsepower
            $table->unsignedSmallInteger('season_year')->nullable();
            $table->text('aerodynamics_desc')->nullable();
            $table->string('car_image')->nullable();
            $table->string('championship')->nullable();               // WEC, IMSA, FIA F1, VLN
            $table->string('class_entry')->nullable();               // LMH, LMP1, GTD-Pro, etc.
            $table->decimal('fuel_capacity', 6, 2)->nullable();      // liters
            $table->string('tyre_supplier')->nullable();
            $table->string('livery_sponsor')->nullable();             // primary sponsor on livery
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
