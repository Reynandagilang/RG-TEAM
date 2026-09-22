<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorExposure extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsor_id',
        'brand_name',
        'event_name',
        'car_placement',
        'screen_time_seconds',
        'broadcast_impressions',
        'media_value_usd',
        'roi_percentage',
    ];

    protected $casts = [
        'media_value_usd' => 'decimal:2',
        'roi_percentage' => 'decimal:2',
    ];

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }
}
