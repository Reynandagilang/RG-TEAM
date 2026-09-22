<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeatherData extends Model
{
    use HasFactory;

    protected $fillable = [
        'circuit_name',
        'race_schedule_id',
        'season_year',
        'recorded_at',
        'temperature_celsius',
        'humidity_percent',
        'track_temp_celsius',
        'air_pressure_hpa',
        'condition',
        'wind_direction',
        'wind_speed_kmh',
        'visibility_meters',
    ];

    protected $casts = [
        'season_year'         => 'integer',
        'recorded_at'         => 'datetime',
        'temperature_celsius' => 'decimal:1',
        'humidity_percent'    => 'decimal:1',
        'track_temp_celsius'  => 'decimal:1',
        'air_pressure_hpa'    => 'decimal:1',
        'wind_speed_kmh'      => 'decimal:1',
        'visibility_meters'   => 'integer',
    ];

    public function raceSchedule(): BelongsTo
    {
        return $this->belongsTo(RaceSchedule::class, 'race_schedule_id');
    }

    public function getConditionBadgeClassAttribute(): string
    {
        return match ($this->condition) {
            'dry'      => 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30',
            'damp'     => 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/30',
            'wet'      => 'bg-blue-500/10 text-blue-400 border border-blue-500/30',
            'raining'  => 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/30',
            default    => 'bg-zinc-500/10 text-zinc-400 border border-zinc-500/30',
        };
    }

    public function getWeatherIconAttribute(): string
    {
        return match ($this->condition) {
            'dry'     => '☀️',
            'damp'    => '🌤️',
            'wet'     => '🌧️',
            'raining' => '🌧️',
            default   => '❓',
        };
    }
}
