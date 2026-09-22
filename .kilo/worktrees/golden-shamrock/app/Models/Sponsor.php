<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'name',
        'logo_url',
        'tier',
        'website_url',
        'description',
        'sort_order',
        'active',
    ];

    protected $casts = [
        'active'     => 'boolean',
        'sort_order' => 'integer',
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

    public function scopeByTier(Builder $query, string $tier): Builder
    {
        return $query->where('tier', $tier);
    }

    public function scopeTitleSponsors(Builder $query): Builder
    {
        return $query->where('tier', 'Title Sponsor')->active()->orderBy('sort_order');
    }

    public function scopeTechnicalPartners(Builder $query): Builder
    {
        return $query->where('tier', 'Technical Partner')->active()->orderBy('sort_order');
    }

    public function scopeOfficialSuppliers(Builder $query): Builder
    {
        return $query->where('tier', 'Official Supplier')->active()->orderBy('sort_order');
    }

    // ── Accessors ────────────────────────────────────────────────

    /** Returns a CSS-safe class name for the tier */
    public function getTierClassAttribute(): string
    {
        return match ($this->tier) {
            'Title Sponsor'     => 'tier-title',
            'Technical Partner' => 'tier-technical',
            'Official Supplier' => 'tier-supplier',
            default             => 'tier-other',
        };
    }
}
