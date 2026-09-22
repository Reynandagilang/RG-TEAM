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
        Schema::create('financial_cost_caps', function (Blueprint $table) {
            $table->id();
            $table->year('season_year')->default(2026);
            $table->string('category'); // R&D, Trackside Operations, Manufacturing, Wind Tunnel & CFD, Excluded
            $table->decimal('budget_limit_usd', 15, 2);
            $table->decimal('actual_spent_usd', 15, 2);
            $table->decimal('committed_usd', 15, 2)->default(0);
            $table->string('compliance_status')->default('compliant'); // compliant, warning, breach
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('sponsor_exposures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sponsor_id')->nullable()->constrained('sponsors')->nullOnDelete();
            $table->string('brand_name');
            $table->string('event_name');
            $table->string('car_placement'); // Front Wing, Sidepod, Halo, Rear Wing, Driver Helmet
            $table->integer('screen_time_seconds');
            $table->bigInteger('broadcast_impressions');
            $table->decimal('media_value_usd', 15, 2);
            $table->decimal('roi_percentage', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('logistics_shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code')->unique();
            $table->string('transport_mode'); // Air, Sea, Road
            $table->string('origin');
            $table->string('destination_circuit');
            $table->dateTime('departure_time');
            $table->dateTime('estimated_arrival');
            $table->string('status')->default('in_transit'); // scheduled, in_transit, customs_cleared, delivered
            $table->integer('progress_percent')->default(0);
            $table->string('vessel_or_flight_number')->nullable();
            $table->timestamps();
        });

        Schema::create('freight_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained('logistics_shipments')->cascadeOnDelete();
            $table->string('item_name');
            $table->string('category'); // Power Unit, Aero Wing, Chassis, Telemetry Rig, Tools
            $table->string('serial_number');
            $table->integer('quantity')->default(1);
            $table->decimal('weight_kg', 8, 2)->default(0);
            $table->boolean('is_hazardous_lithium')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freight_items');
        Schema::dropIfExists('logistics_shipments');
        Schema::dropIfExists('sponsor_exposures');
        Schema::dropIfExists('financial_cost_caps');
    }
};
