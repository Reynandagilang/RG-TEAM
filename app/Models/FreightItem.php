<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreightItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'item_name',
        'category',
        'serial_number',
        'quantity',
        'weight_kg',
        'is_hazardous_lithium',
    ];

    protected $casts = [
        'weight_kg' => 'decimal:2',
        'is_hazardous_lithium' => 'boolean',
    ];

    public function shipment()
    {
        return $this->belongsTo(LogisticsShipment::class, 'shipment_id');
    }
}
