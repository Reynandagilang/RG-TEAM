<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverPerformance extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'race_schedule_id',
        'session_type',
        'lap_number',
        'sector',
        'time_seconds',
        'speed_trap_kmh',
        'gearbox_temp_c',
        'tire_temp_front_l_c',
        'tire_temp_front_r_c',
        'tire_temp_rear_l_c',
        'tire_temp_rear_r_c',
        'lap_date',
        'compound_used',
    ];

    protected $casts = [
        'time_seconds'              => 'decimal:3',
        'speed_trap_kmh'            => 'decimal:2',
        'gearbox_temp_c'            => 'decimal:2',
        'tire_temp_front_l_c'       => 'decimal:2',
        'tire_temp_front_r_c'       => 'decimal:2',
        'tire_temp_rear_l_c'        => 'decimal:2',
        'tire_temp_rear_r_c'        => 'decimal:2',
        'lap_date'                  => 'integer',
        'driver_id'                 => 'integer',
        'race_schedule_id'          => 'integer',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function raceSchedule(): BelongsTo
    {
        return $this->belongsTo(RaceSchedule::class, 'race_schedule_id');
    }

    public function getFormattedTimeAttribute(): string
    {
        if (!$this->time_seconds) {
            return '--';
        }
        $mins  = floor($this->time_seconds / 60);
        $secs  = $this->time_seconds % 60;
        return sprintf('%d:%06.3f', $mins, $secs);
    }

    public function getCompoundBadgeClassAttribute(): string
    {
        return match ($this->compound_used) {
            'SOFT'   => 'bg-red-500/10 text-red-400 border border-red-500/30',
            'MEDIUM' => 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/30',
            'HARD'   => 'bg-white/10 text-zinc-300 border border-white/20',
            default  => 'bg-zinc-500/10 text-zinc-400 border border-zinc-500/30',
        };
    }
}
