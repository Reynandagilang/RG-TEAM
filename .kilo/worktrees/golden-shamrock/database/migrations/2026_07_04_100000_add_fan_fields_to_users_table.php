<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('favorite_driver_id')->nullable()->constrained('drivers')->nullOnDelete();
            $table->integer('points')->default(0);
            $table->string('avatar_color')->default('#FF002E');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('favorite_driver_id');
            $table->dropColumn(['points', 'avatar_color']);
        });
    }
};
