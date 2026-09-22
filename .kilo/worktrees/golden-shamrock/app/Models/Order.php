<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'shipping_courier',
        'shipping_cost',
        'payment_method',
        'promo_code',
        'subtotal',
        'discount',
        'total',
        'status',
        'invoice_number',
        'midtrans_order_id',
        'snap_token',
        'transaction_id',
        'transaction_status',
        'fraud_status',
        'paid_at',
        'expired_at'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
