<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_cents',
        'image_path',
        'stock_quantity',
    ];

    public function getPriceAttribute()
    {
        return $this->price_cents / 100;
    }
}

