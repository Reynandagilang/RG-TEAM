<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('race_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('grand_prix_name');
            $table->string('circuit_name');
            $table->string('country');
            $table->string('country_code', 3)->nullable();
            $table->dateTime('race_date');
            $table->dateTime('qualifying_date')->nullable();
            $table->dateTime('practice1_date')->nullable();
            $table->dateTime('practice2_date')->nullable();
            $table->dateTime('practice3_date')->nullable();
            $table->enum('status', ['Upcoming', 'Ongoing', 'Finished'])->default('Upcoming');
            $table->unsignedTinyInteger('round_number')->nullable();
            $table->unsignedSmallInteger('season_year')->nullable();
            $table->string('circuit_map_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('race_schedules');
    }
};
