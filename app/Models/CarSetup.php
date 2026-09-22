<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarSetup extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'race_schedule_id',
        'season_year',
        'setup_name',
        'circuit_name',
        'front_wing_angle',
        'rear_wing_angle',
        'front_ride_height',
        'rear_ride_height',
        'front_spring_rate',
        'rear_spring_rate',
        'barbal_height',
        'gear_ratio_final',
        'tyre_pressure_front',
        'tyre_pressure_rear',
        'brake_bias',
        'aerodynamic_load',
        'drag_coefficient',
        'notes',
    ];

    protected $casts = [
        'car_id'                => 'integer',
        'race_schedule_id'      => 'integer',
        'season_year'           => 'integer',
        'front_wing_angle'      => 'decimal:2',
        'rear_wing_angle'       => 'decimal:2',
        'front_ride_height'     => 'decimal:2',
        'rear_ride_height'      => 'decimal:2',
        'front_spring_rate'     => 'decimal:1',
        'rear_spring_rate'      => 'decimal:1',
        'barbal_height'         => 'decimal:2',
        'gear_ratio_final'      => 'decimal:2',
        'aerodynamic_load'      => 'decimal:2',
        'drag_coefficient'      => 'decimal:3',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function raceSchedule(): BelongsTo
    {
        return $this->belongsTo(RaceSchedule::class, 'race_schedule_id');
    }

    public function getFrontWingEfficiencyAttribute(): float
    {
        return round($this->front_wing_angle * 1.27 + $this->aerodynamic_load * 12.5, 1);
    }

    public function getDragIndexAttribute(): float
    {
        return round($this->drag_coefficient * 100, 1);
    }

    public function getDownforceRatingAttribute(): float
    {
        return round(($this->front_wing_angle + $this->rear_wing_angle) / 2 * $this->aerodynamic_load, 1);
    }

    public function getSetupRatingAttribute(): float
    {
        $score = 0;
        if ($this->front_wing_angle >= 6.5 && $this->front_wing_angle <= 8.5) $score += 20;
        if ($this->rear_wing_angle >= 6.0 && $this->rear_wing_angle <= 8.0) $score += 20;
        if ($this->front_ride_height >= 12 && $this->front_ride_height <= 18) $score += 10;
        if ($this->rear_ride_height >= 15 && $this->rear_ride_height <= 25) $score += 10;
        if ($this->spring_rate_diff() <= 300) $score += 15;
        if ($this->aerodynamic_load >= 0.9 && $this->aerodynamic_load <= 1.1) $score += 15;
        if ($this->drag_coefficient >= 0.340 && $this->drag_coefficient <= 0.360) $score += 10;
        return $score;
    }

    private function springRateDiff(): float
    {
        return abs($this->front_spring_rate - $this->rear_spring_rate);
    }
}
