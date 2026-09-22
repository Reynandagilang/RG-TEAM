<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->string('name');
            $table->unsignedSmallInteger('permanent_number');
            $table->string('country');
            $table->string('country_code', 3)->nullable();
            $table->unsignedSmallInteger('podiums')->default(0);
            $table->decimal('career_points', 10, 2)->default(0);
            $table->unsignedTinyInteger('world_championships')->default(0);
            $table->string('avatar_url')->nullable();
            $table->text('bio')->nullable();
            $table->string('category')->default('F1');
            $table->string('role')->default('Race Driver');           // Race Driver / Reserve / Test
            $table->string('helmet_color', 10)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
