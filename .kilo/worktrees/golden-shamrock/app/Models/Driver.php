<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'name',
        'permanent_number',
        'country',
        'country_code',
        'podiums',
        'career_points',
        'world_championships',
        'avatar_url',
        'bio',
        'role',
        'category',
        'helmet_color',
        'active',
    ];

    protected $casts = [
        'active'              => 'boolean',
        'podiums'             => 'integer',
        'career_points'       => 'decimal:2',
        'world_championships' => 'integer',
        'permanent_number'    => 'integer',
    ];

    // ── Relations ────────────────────────────────────────────────

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    // ── Scopes ───────────────────────────────────────────────────

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function scopeRaceDrivers(Builder $query): Builder
    {
        return $query->where('role', 'Race Driver');
    }

    public function scopeSpotlight(Builder $query, int $limit = 2): Builder
    {
        return $query->active()
            ->raceDrivers()
            ->orderBy('career_points', 'desc')
            ->limit($limit);
    }

    // ── Accessors ────────────────────────────────────────────────

    /** Zero-padded race number for display: "08" */
    public function getFormattedNumberAttribute(): string
    {
        return str_pad($this->permanent_number, 2, '0', STR_PAD_LEFT);
    }

    /** First name only */
    public function getFirstNameAttribute(): string
    {
        return explode(' ', $this->name)[0];
    }

    /** Last name (everything after first word) */
    public function getLastNameAttribute(): string
    {
        $parts = explode(' ', $this->name);
        return count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : '';
    }

    public function predictions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Prediction::class);
    }
}
