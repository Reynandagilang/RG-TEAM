<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TelemetrySnapshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'race_schedule_id',
        'lap_number',
        'session_type',
        'speed_kmh',
        'engine_rpm',
        'gear',
        'throttle_percent',
        'brake_percent',
        'steering_angle',
        'drs_active',
        'ers_deployment_percent',
        'fuel_remaining_liters',
        'timestamp_ms',
    ];

    protected $casts = [
        'driver_id'            => 'integer',
        'race_schedule_id'    => 'integer',
        'lap_number'          => 'integer',
        'speed_kmh'           => 'decimal:2',
        'engine_rpm'          => 'decimal:0',
        'gear'                => 'decimal:0',
        'throttle_percent'    => 'decimal:1',
        'brake_percent'       => 'decimal:1',
        'steering_angle'      => 'decimal:1',
        'drs_active'          => 'decimal:0',
        'ers_deployment_percent' => 'decimal:1',
        'fuel_remaining_liters' => 'decimal:2',
        'timestamp_ms'        => 'integer',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function raceSchedule(): BelongsTo
    {
        return $this->belongsTo(RaceSchedule::class, 'race_schedule_id');
    }

    public function getGearNameAttribute(): string
    {
        $gear = (int) $this->gear;
        if ($gear === 0) return 'REVERSE';
        if ($gear === 1) return '1st';
        if ($gear === 2) return '2nd';
        if ($gear === 3) return '3rd';
        if ($gear >= 4) return "{$gear}th";
        return (string) $gear;
    }

    public function getRpmPercentageAttribute(): float
    {
        return round(($this->engine_rpm / 15000) * 100, 1);
    }

    public function getThrottlePercentDisplayAttribute(): float
    {
        return (float) $this->throttle_percent;
    }
}
