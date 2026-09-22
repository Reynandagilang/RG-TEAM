<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'race_schedule_id',
        'driver_id',
        'predicted_position',
        'points_earned',
    ];

    protected $casts = [
        'predicted_position' => 'integer',
        'points_earned' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function raceSchedule(): BelongsTo
    {
        return $this->belongsTo(RaceSchedule::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
