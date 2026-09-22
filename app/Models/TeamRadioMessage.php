<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamRadioMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'race_schedule_id',
        'season_year',
        'lap_number',
        'session_type',
        'sender',
        'recipient',
        'message_text',
        'audio_duration_sec',
        'audio_url',
        'category',
    ];

    protected $casts = [
        'season_year'        => 'integer',
        'lap_number'         => 'integer',
        'audio_duration_sec' => 'integer',
        'driver_id'          => 'integer',
        'race_schedule_id'   => 'integer',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function raceSchedule(): BelongsTo
    {
        return $this->belongsTo(RaceSchedule::class, 'race_schedule_id');
    }

    public function getCategoryIconAttribute(): string
    {
        return match ($this->category) {
            'Strategy'      => '📊',
            'Technical'     => '🔧',
            'Safety'        => '⚠️',
            'Motivation'    => '💪',
            'General'       => '📻',
            default         => '📻',
        };
    }

    public function getCategoryBadgeClassAttribute(): string
    {
        return match ($this->category) {
            'Strategy'   => 'bg-purple-500/10 text-purple-400 border border-purple-500/30',
            'Technical'  => 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/30',
            'Safety'     => 'bg-amber-500/10 text-amber-400 border border-amber-500/30',
            'Motivation' => 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30',
            default      => 'bg-zinc-500/10 text-zinc-400 border border-zinc-500/30',
        };
    }

    public function getFormattedDurationAttribute(): string
    {
        $sec = $this->audio_duration_sec;
        $mins = floor($sec / 60);
        $s = $sec % 60;
        return sprintf('%d:%02d', $mins, $s);
    }
}
