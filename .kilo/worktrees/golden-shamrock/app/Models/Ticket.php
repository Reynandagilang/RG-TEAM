<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'race_schedule_id',
        'event_name',
        'ticket_tier',
        'quantity',
        'total_price',
        'status',
        'booking_code',
    ];

    protected $casts = [
        'quantity'    => 'integer',
        'total_price' => 'integer',
    ];

    // ── Relations ────────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function raceSchedule(): BelongsTo
    {
        return $this->belongsTo(RaceSchedule::class);
    }
}
