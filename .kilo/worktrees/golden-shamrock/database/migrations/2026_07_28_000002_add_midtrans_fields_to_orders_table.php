<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('midtrans_order_id')->nullable()->after('invoice_number');
            $table->string('snap_token')->nullable()->after('midtrans_order_id');
            $table->string('transaction_id')->nullable()->after('snap_token');
            $table->string('transaction_status')->default('Pending')->after('status');
            $table->string('fraud_status')->nullable()->after('transaction_status');
            $table->timestamp('paid_at')->nullable()->after('updated_at');
            $table->timestamp('expired_at')->nullable()->after('paid_at');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'midtrans_order_id',
                'snap_token',
                'transaction_id',
                'transaction_status',
                'fraud_status',
                'paid_at',
                'expired_at',
            ]);
        });
    }
};
