<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'principal',
        'base_location',
        'constructors_titles',
        'drivers_titles',
        'overview_text',
        'team_logo',
        'tagline',
        'founded_year',
        'team_color',
    ];

    protected $casts = [
        'constructors_titles' => 'integer',
        'drivers_titles'      => 'integer',
    ];

    // ── Relations ────────────────────────────────────────────────

    /** All drivers in the team */
    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class)->orderBy('permanent_number');
    }

    /** Only active race drivers */
    public function activeRaceDrivers(): HasMany
    {
        return $this->hasMany(Driver::class)
            ->where('active', true)
            ->where('role', 'Race Driver')
            ->orderBy('career_points', 'desc');
    }

    /** All cars */
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class)->orderBy('category')->orderBy('car_number');
    }

    /** F1 cars only */
    public function f1Cars(): HasMany
    {
        return $this->hasMany(Car::class)->where('category', 'F1')->orderBy('car_number');
    }

    /** All sponsors */
    public function sponsors(): HasMany
    {
        return $this->hasMany(Sponsor::class)->orderBy('sort_order');
    }

    /** Title sponsors only */
    public function titleSponsors(): HasMany
    {
        return $this->hasMany(Sponsor::class)
            ->where('tier', 'Title Sponsor')
            ->where('active', true)
            ->orderBy('sort_order');
    }

    /** Technical partners only */
    public function technicalPartners(): HasMany
    {
        return $this->hasMany(Sponsor::class)
            ->where('tier', 'Technical Partner')
            ->where('active', true)
            ->orderBy('sort_order');
    }

    /** Official suppliers only */
    public function officialSuppliers(): HasMany
    {
        return $this->hasMany(Sponsor::class)
            ->where('tier', 'Official Supplier')
            ->where('active', true)
            ->orderBy('sort_order');
    }
}
