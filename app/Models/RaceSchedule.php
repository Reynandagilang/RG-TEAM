<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class RaceSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'grand_prix_name',
        'circuit_name',
        'country',
        'country_code',
        'race_date',
        'qualifying_date',
        'practice1_date',
        'practice2_date',
        'practice3_date',
        'status',
        'round_number',
        'season_year',
        'circuit_map_image',
    ];

    protected $casts = [
        'race_date'       => 'datetime',
        'qualifying_date' => 'datetime',
        'practice1_date'  => 'datetime',
        'practice2_date'  => 'datetime',
        'practice3_date'  => 'datetime',
        'round_number'    => 'integer',
        'season_year'     => 'integer',
    ];

    // ── Scopes ───────────────────────────────────────────────────

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('status', 'Upcoming')
            ->where('race_date', '>', now())
            ->orderBy('race_date');
    }

    public function scopeOngoing(Builder $query): Builder
    {
        return $query->where('status', 'Ongoing');
    }

    public function scopeFinished(Builder $query): Builder
    {
        return $query->where('status', 'Finished')->orderBy('race_date', 'desc');
    }

    public function scopeNextRace(Builder $query): Builder
    {
        return $query->upcoming()->limit(1);
    }

    // ── Accessors ────────────────────────────────────────────────

    public function getFormattedDateAttribute(): string
    {
        return $this->race_date->format('d M Y');
    }

    public function getSecondsUntilRaceAttribute(): int
    {
        return max(0, (int) now()->diffInSeconds($this->race_date, false));
    }

    public function getIsUpcomingAttribute(): bool
    {
        return $this->status === 'Upcoming' && $this->race_date->isFuture();
    }
}
