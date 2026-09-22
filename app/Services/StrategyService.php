<?php

namespace App\Services;

use App\Models\CarSetup;
use App\Models\RaceSchedule;
use App\Models\TelemetrySnapshot;
use App\Models\WeatherData;
use Illuminate\Database\Eloquent\Collection;

/**
 * StrategyService
 * ---------------
 * Computes race strategy recommendations: optimal tire compounds,
 * pit stop windows, fuel calculations, and setup suggestions.
 */
class StrategyService
{
    /** Tire compounds data for F1 2026 regulation */
    private const TIRE_COMPOUNDS = [
        'SOFT'   => ['color' => 'red',   'avg_life_laps' => 22, 'degradation' => 0.045, 'pit_loss' => 2.1],
        'MEDIUM' => ['color' => 'yellow','avg_life_laps' => 32, 'degradation' => 0.030, 'pit_loss' => 1.9],
        'HARD'   => ['color' => 'white', 'avg_life_laps' => 45, 'degradation' => 0.018, 'pit_loss' => 1.8],
    ];

    /** Fuel consumption model (kg per lap) */
    private const FUEL_PER_LAP = 1.9;

    /**
     * Calculate optimal stint strategy for a given race distance.
     */
    public function calculateStintStrategy(int $totalLaps, string $primaryCompound = 'MEDIUM', string $secondaryCompound = 'SOFT'): array
    {
        $primary  = self::TIRE_COMPOUNDS[$primaryCompound];
        $secondary = self::TIRE_COMPOUNDS[$secondaryCompound];

        // Two-stop strategy simulation
        $stint1Laps = min($primary['avg_life_laps'], floor($totalLaps / 2.5));
        $stint2Laps = min($primary['avg_life_laps'], floor(($totalLaps - $stint1Laps) / 1.7));
        $stint3Laps = $totalLaps - $stint1Laps - $stint2Laps;

        // Fuel calculations
        $totalFuel = $totalLaps * self::FUEL_PER_LAP;
        $fuelStint1 = ($stint1Laps + $stint2Laps) * self::FUEL_PER_LAP; // start heavy

        // DRS zones estimation
        $estimatedDRSZones = $this->estimateDRSZones($totalLaps);

        return [
            'total_laps'           => $totalLaps,
            'fuel_total_kg'        => round($totalFuel, 1),
            'fuel_stint1_kg'       => round($fuelStint1, 1),
            'stops_required'       => 2,
            'stint_plan' => [
                [
                    'stint'       => 1,
                    'compound'    => $primaryCompound,
                    'laps'        => $stint1Laps,
                    'start_fuel'  => round($fuelStint1, 1),
                    'pit_window_start' => max(1, $stint1Laps - 3),
                    'pit_window_end'   => $stint1Laps + 2,
                    'estimated_time' => $this->calculateStintTime($stint1Laps, $primary),
                ],
                [
                    'stint'       => 2,
                    'compound'    => $secondaryCompound,
                    'laps'        => $stint2Laps,
                    'start_fuel'  => round($stint2Laps * self::FUEL_PER_LAP, 1),
                    'pit_window_start' => max($stint1Laps + 1, $stint1Laps + $stint2Laps - 3),
                    'pit_window_end'   => $stint1Laps + $stint2Laps + 2,
                    'estimated_time' => $this->calculateStintTime($stint2Laps, $secondary),
                ],
                [
                    'stint'       => 3,
                    'compound'    => $primaryCompound,
                    'laps'        => $stint3Laps,
                    'start_fuel'  => round($stint3Laps * self::FUEL_PER_LAP, 1),
                    'pit_window_start' => $totalLaps - 3,
                    'pit_window_end'   => $totalLaps,
                    'estimated_time' => $this->calculateStintTime($stint3Laps, $primary),
                ],
            ],
            'total_pit_loss'       => round($primary['pit_loss'] * 2 + $secondary['pit_loss'], 1),
            'drs_zones'            => $estimatedDRSZones,
            'weather_advice'       => 'Monitor track evolution; medium compound preferred for stint 2-3 as track gets faster.',
            'undercut_viable'      => true,
            'overcut_viable'       => $primary['avg_life_laps'] > 30,
        ];
    }

    /**
     * Get available tire compounds for UI dropdown.
     */
    public function getTireCompounds(): array
    {
        return self::TIRE_COMPOUNDS;
    }

    /**
     * Get recommended car setups for a specific circuit.
     */
    public function getRecommendSetups(string $circuitName, ?RaceSchedule $race = null): Collection
    {
        return CarSetup::where('circuit_name', 'LIKE', '%' . $circuitName . '%')
            ->orderByDesc('created_at')
            ->get();
    }

    /**
     * Generate race strategy recommendations based on weather.
     */
    public function getWeatherStrategy(string $weatherCondition, string $currentCompound): array
    {
        $recommendations = [
            'dry' => [
                'recommendation' => 'Keep current compound. Moderate degradation track.',
                'compound_change' => false,
                'pit_stop_urgency' => 'normal',
            ],
            'damp' => [
                'recommendation' => 'Consider switching to intermediate compounds on next pit stop.',
                'compound_change' => true,
                'new_compound' => 'INTERMEDIATE',
                'pit_stop_urgency' => 'high',
            ],
            'wet' => [
                'recommendation' => 'Switch to full wet tires immediately. Safety car likely.',
                'compound_change' => true,
                'new_compound' => 'FULL_WET',
                'pit_stop_urgency' => 'critical',
            ],
            'raining' => [
                'recommendation' => 'Heavy rain detected. Switch to full wets and reduce pace.',
                'compound_change' => true,
                'new_compound' => 'FULL_WET',
                'pit_stop_urgency' => 'critical',
            ],
        ];

        return $recommendations[$weatherCondition] ?? $recommendations['dry'];
    }

    /**
     * Get telemetry-based DRS detection.
     */
    public function getDRSDetectionPoints(?int $driverId = null): array
    {
        // Static DRS detection zones based on circuit knowledge
        return [
            'zone_1' => ['name' => 'Pit Straight',     'active' => true,  'distance' => 1000],
            'zone_2' => ['name' => 'Kemmel Straight',   'active' => true,  'distance' => 650],
            'zone_3' => ['name' => ' Hangar Straight',  'active' => false, 'distance' => 0],
        ];
    }

    /**
     * Get setup recommendation score for current conditions.
     */
    public function getSetupCompatibilityScore(CarSetup $setup): array
    {
        $score = $setup->setup_rating;

        $aerodynamicEfficiency = round(100 - ($setup->drag_coefficient * 285), 1);
        $downforceEfficiency  = round($setup->downforce_rating * 8.3, 1);

        return [
            'total_score'          => $score,
            'max_score'            => 100,
            'aerodynamic_efficiency' => $aerodynamicEfficiency,
            'downforce_efficiency'   => $downforceEfficiency,
            'fuel_efficiency'        => round(100 - ($setup->front_wing_angle * 3.2), 1),
            'tire_wear_estimate'     => $this->estimateTireWear($setup),
            'recommendation'         => $this->getSetupRecommendation($score),
        ];
    }

    // ── Internal Helpers ──────────────────────────────────────────

    private function calculateStintTime(int $laps, array $compound): float
    {
        $baseLapTime = 85.0; // seconds, Monaco baseline
        $degradationFactor = $compound['degradation'] * $laps * 0.3;

        return round($laps * $baseLapTime + $degradationFactor, 1);
    }

    private function estimateDRSZones(int $totalLaps): array
    {
        return [
            ['zone' => 1, 'name' => 'Pit Straight (Start/Finish)', 'detection_to_target' => 650, 'avg_speed_gain_kmh' => 12],
            ['zone' => 2, 'name' => 'Kemmel Straight (Turn 10 to Eau Rouge)', 'detection_to_target' => 580, 'avg_speed_gain_kmh' => 10],
            ['zone' => 3, 'name' => 'Hangar Straight (Copse to Magotts)', 'detection_to_target' => 510, 'avg_speed_gain_kmh' => 8],
        ];
    }

    private function estimateTireWear(CarSetup $setup): string
    {
        $avgWingAngle = ($setup->front_wing_angle + $setup->rear_wing_angle) / 2;

        if ($avgWingAngle > 9.0) {
            return 'High wear expected — aggressive front end';
        }
        if ($avgWingAngle > 7.5) {
            return 'Moderate wear — balanced setup';
        }
        return 'Low wear — conservative setup';
    }

    private function getSetupRecommendation(float $score): string
    {
        if ($score >= 85) {
            return 'Excellent setup — optimal for this track conditions.';
        }
        if ($score >= 65) {
            return 'Good setup — minor adjustments recommended.';
        }
        if ($score >= 40) {
            return 'Acceptable setup — significant revision needed for competitiveness.';
        }
        return 'Poor setup — complete redesign recommended before next session.';
    }
}
