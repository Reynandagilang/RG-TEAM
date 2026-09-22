<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticsShipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_code',
        'transport_mode',
        'origin',
        'destination_circuit',
        'departure_time',
        'estimated_arrival',
        'status',
        'progress_percent',
        'vessel_or_flight_number',
    ];

    protected $casts = [
        'departure_time' => 'datetime',
        'estimated_arrival' => 'datetime',
        'progress_percent' => 'integer',
    ];

    public function items()
    {
        return $this->hasMany(FreightItem::class, 'shipment_id');
    }
}
