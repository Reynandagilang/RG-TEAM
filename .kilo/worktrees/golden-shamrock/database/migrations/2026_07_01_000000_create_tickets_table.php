<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('race_schedule_id')->nullable()->constrained('race_schedules')->onDelete('set null');
            $table->string('event_name');
            $table->string('ticket_tier');
            $table->integer('quantity');
            $table->bigInteger('total_price');
            $table->string('status')->default('Pending'); // Pending, Approved, Cancelled
            $table->string('booking_code')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
