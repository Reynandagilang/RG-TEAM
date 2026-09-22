<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'category',
        'car_number',
        'model_name',
        'power_unit',
        'chassis',
        'weight',
        'top_speed',
        'power_hp',
        'season_year',
        'aerodynamics_desc',
        'car_image',
        'championship',
        'class_entry',
        'fuel_capacity',
        'tyre_supplier',
        'livery_sponsor',
    ];

    protected $casts = [
        'weight'      => 'decimal:2',
        'top_speed'   => 'integer',
        'power_hp'    => 'integer',
        'car_number'  => 'integer',
        'season_year' => 'integer',
    ];

    // ── Relations ────────────────────────────────────────────────

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    // ── Scopes ───────────────────────────────────────────────────

    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopeF1(Builder $query): Builder
    {
        return $query->where('category', 'F1');
    }

    public function scopeEndurance(Builder $query): Builder
    {
        return $query->whereIn('category', ['Hypercar', 'Hybrid', 'GT3', 'GTP']);
    }

    // ── Accessors ────────────────────────────────────────────────

    /** Full display name: "RGR-26 E Performance #1" */
    public function getFullNameAttribute(): string
    {
        return "{$this->model_name} #{$this->car_number}";
    }

    /** Category badge CSS class */
    public function getCategoryClassAttribute(): string
    {
        return match ($this->category) {
            'F1'       => 'badge-f1',
            'Hypercar' => 'badge-hypercar',
            'Hybrid'   => 'badge-hybrid',
            'GT3'      => 'badge-gt3',
            'GTP'      => 'badge-gtp',
            default    => 'badge-default',
        };
    }

    /** Category accent color */
    public function getCategoryColorAttribute(): string
    {
        return match ($this->category) {
            'F1'       => '#00A19B',
            'Hypercar' => '#E8421C',
            'Hybrid'   => '#00C853',
            'GT3'      => '#FF6D00',
            'GTP'      => '#AA00FF',
            default    => '#8A8A93',
        };
    }
}
