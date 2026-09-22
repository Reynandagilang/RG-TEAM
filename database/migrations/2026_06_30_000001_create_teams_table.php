<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                   // RG Racing
            $table->string('principal');                              // Rey Gilang
            $table->string('base_location');                          // Jakarta, Indonesia
            $table->unsignedSmallInteger('constructors_titles')->default(0);
            $table->unsignedSmallInteger('drivers_titles')->default(0);
            $table->text('overview_text')->nullable();
            $table->string('team_logo')->nullable();
            $table->string('tagline')->nullable();
            $table->string('founded_year', 4)->nullable();
            $table->string('team_color', 10)->nullable()->default('#00A19B');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
