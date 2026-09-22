<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class RaceResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'race_schedule_id',
        'driver_name',
        'permanent_number',
        'team_name',
        'position',
        'grid_position',
        'points_earned',
        'finish_status',
        'laps_completed',
        'fastest_lap_time',
        'retirement_reason',
        'season_year',
    ];

    protected $casts = [
        'position'           => 'integer',
        'grid_position'      => 'integer',
        'points_earned'      => 'integer',
        'laps_completed'     => 'integer',
        'season_year'        => 'integer',
    ];

    public function raceSchedule(): BelongsTo
    {
        return $this->belongsTo(RaceSchedule::class, 'race_schedule_id');
    }

    public function scopeBySeason(Builder $query, int $year): Builder
    {
        return $query->where('race_results.season_year', $year);
    }

    public function scopeByDriver(Builder $query, string $driverName): Builder
    {
        return $query->where('race_results.driver_name', $driverName);
    }

    public function scopeFinished(Builder $query): Builder
    {
        return $query->where('finish_status', 'Finished');
    }

    public function scopeForTeam(Builder $query, string $teamName): Builder
    {
        return $query->where('team_name', $teamName);
    }

    public function getPositionBadgeAttribute(): string
    {
        $pos = $this->position;
        if ($pos === 1) {
            return 'bg-[#B8E637]/10 text-[#B8E637] border border-[#B8E637]/30';
        }
        if ($pos <= 3) {
            return 'bg-amber-500/10 text-amber-400 border border-amber-500/30';
        }
        if ($pos <= 10) {
            return 'bg-blue-500/10 text-blue-400 border border-blue-500/30';
        }
        return 'bg-zinc-500/10 text-zinc-500 border border-zinc-500/30';
    }
}
