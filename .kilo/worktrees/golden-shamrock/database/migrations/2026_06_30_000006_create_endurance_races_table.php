<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('endurance_races', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');                             // 24 Hours of Le Mans
            $table->string('circuit_name');                           // Circuit de la Sarthe
            $table->string('country');
            $table->string('class_category');                         // Hybrid Prototype / Hypercar / GT3 / GTP
            $table->string('car_used');                               // RGR Hybrid-LMP1
            $table->decimal('track_length_km', 6, 3)->nullable();     // 13.626
            $table->unsignedSmallInteger('total_laps_completed')->nullable();
            $table->string('best_lap_time', 15)->nullable();          // 3:22.483
            $table->unsignedTinyInteger('highest_finish_position')->nullable();
            $table->text('race_history_text')->nullable();
            $table->string('event_slug')->unique();                   // 24h-le-mans
            $table->string('championship')->nullable();               // FIA WEC, IMSA, VLN, Blancpain
            $table->string('event_poster')->nullable();
            $table->unsignedSmallInteger('event_year')->nullable();
            $table->string('theme_color', 10)->nullable()->default('#00A19B');
            $table->string('theme_mood')->nullable();                 // classic / dramatic / aggressive / american
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('endurance_races');
    }
};
