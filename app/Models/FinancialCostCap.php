<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialCostCap extends Model
{
    use HasFactory;

    protected $fillable = [
        'season_year',
        'category',
        'budget_limit_usd',
        'actual_spent_usd',
        'committed_usd',
        'compliance_status',
        'notes',
    ];

    protected $casts = [
        'budget_limit_usd' => 'decimal:2',
        'actual_spent_usd' => 'decimal:2',
        'committed_usd' => 'decimal:2',
    ];
}
