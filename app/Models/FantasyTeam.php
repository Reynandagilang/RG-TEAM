<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FantasyTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'season_year',
        'team_name',
        'budget_used',
        'budget_total',
        'total_points',
        'race_count',
        'league_position',
        'drivers_selected',
    ];

    protected $casts = [
        'season_year'   => 'integer',
        'budget_used'   => 'decimal:1',
        'budget_total'  => 'decimal:1',
        'total_points'  => 'integer',
        'race_count'    => 'integer',
        'league_position' => 'integer',
        'drivers_selected' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getBudgetRemainingAttribute(): float
    {
        return $this->budget_total - $this->budget_used;
    }

    public function getBudgetUsagePercentAttribute(): float
    {
        return $this->budget_total > 0
            ? round(($this->budget_used / $this->budget_total) * 100, 1)
            : 0;
    }

    public function getAveragePointsPerRaceAttribute(): float
    {
        return $this->race_count > 0
            ? round($this->total_points / $this->race_count, 1)
            : 0;
    }

    public function getSelectedDriverIds(): array
    {
        return $this->drivers_selected ?? [];
    }

    public function getTierColorAttribute(): string
    {
        $pos = $this->league_position;
        if ($pos === null) return '#8C96A3';
        if ($pos <= 3) return '#B8E637';
        if ($pos <= 10) return '#F4B63D';
        return '#D2D6DC';
    }
}
