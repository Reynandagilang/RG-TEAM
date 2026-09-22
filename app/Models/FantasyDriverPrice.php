<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FantasyDriverPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'season_year',
        'price_millions',
        'avg_points',
        'popularity_percent',
    ];

    protected $casts = [
        'season_year'          => 'integer',
        'price_millions'       => 'decimal:2',
        'avg_points'           => 'decimal:2',
        'popularity_percent'   => 'integer',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function getPriceFormattedAttribute(): string
    {
        return number_format($this->price_millions, 1) . 'M';
    }

    public function getValueRatingAttribute(): string
    {
        if ($this->avg_points <= 0) return 'N/A';
        $ratio = $this->price_millions / $this->avg_points;
        if ($ratio <= 1.0) return 'Bargain';
        if ($ratio <= 2.0) return 'Fair';
        if ($ratio <= 3.0) return 'Average';
        return 'Overpriced';
    }

    public function getValueColorAttribute(): string
    {
        return match ($this->value_rating) {
            'Bargain'  => '#38C172',
            'Fair'     => '#8C96A3',
            'Average'  => '#F4B63D',
            'Overpriced' => '#E5484D',
            default    => '#8C96A3',
        };
    }
}
