<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class EnduranceRace extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'circuit_name',
        'country',
        'class_category',
        'car_used',
        'track_length_km',
        'total_laps_completed',
        'best_lap_time',
        'highest_finish_position',
        'race_history_text',
        'event_slug',
        'championship',
        'event_poster',
        'event_year',
        'theme_color',
        'theme_mood',
    ];

    protected $casts = [
        'track_length_km'         => 'decimal:3',
        'total_laps_completed'    => 'integer',
        'highest_finish_position' => 'integer',
        'event_year'              => 'integer',
    ];

    // ── Scopes ───────────────────────────────────────────────────

    public function scopeBySlug(Builder $query, string $slug): Builder
    {
        return $query->where('event_slug', $slug);
    }

    // ── Accessors ────────────────────────────────────────────────

    /** Finish position as an ordinal string: "1st", "2nd", etc. */
    public function getFinishPositionOrdinalAttribute(): string
    {
        $pos = $this->highest_finish_position;
        if (!$pos) return 'N/A';

        $suffix = match (true) {
            ($pos % 100 >= 11 && $pos % 100 <= 13) => 'th',
            ($pos % 10 === 1)                       => 'st',
            ($pos % 10 === 2)                       => 'nd',
            ($pos % 10 === 3)                       => 'rd',
            default                                  => 'th',
        };

        return "{$pos}{$suffix}";
    }

    /** Resolved accent color with fallback to default teal */
    public function getAccentColorAttribute(): string
    {
        return $this->theme_color ?? '#00A19B';
    }

    /** Mood-based CSS class for page theming */
    public function getMoodClassAttribute(): string
    {
        return match ($this->theme_mood) {
            'classic'    => 'mood-classic',
            'dramatic'   => 'mood-dramatic',
            'aggressive' => 'mood-aggressive',
            'american'   => 'mood-american',
            default      => 'mood-default',
        };
    }
}
