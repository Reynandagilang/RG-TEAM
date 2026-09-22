<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VipPass extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'race_schedule_id',
        'qr_token',
        'issued_at',
        'expires_at',
        'status',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    /**
     * User who owns this VIP Pass.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Order that generated this pass (may be null if created manually).
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Race schedule associated with this pass.
     */
    public function raceSchedule(): BelongsTo
    {
        return $this->belongsTo(RaceSchedule::class);
    }
}

