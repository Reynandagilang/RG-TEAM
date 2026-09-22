<?php

namespace App\Services;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Collection;

/**
 * DriverService
 * -------------
 * Encapsulates all driver-related business logic and data retrieval.
 * Controllers depend on this service — never query Driver directly.
 */
class DriverService
{
    /**
     * Fetch the two most prominent active race drivers for the homepage spotlight.
     * Ranked by career points descending.
     */
    public function getSpotlightDrivers(int $limit = 2): Collection
    {
        return Driver::spotlight($limit)->with('team')->get();
    }

    /**
     * Fetch all active race drivers, ordered by car number.
     */
    public function getAllActiveRaceDrivers(): Collection
    {
        return Driver::active()
            ->raceDrivers()
            ->with('team')
            ->orderBy('permanent_number')
            ->get();
    }

    /**
     * Fetch a single driver by their permanent race number.
     */
    public function getDriverByNumber(int $number): ?Driver
    {
        return Driver::where('permanent_number', $number)->first();
    }

    /**
     * Aggregate headline statistics across all active drivers.
     *
     * @return array{total_podiums: int, total_championships: int, total_points: float}
     */
    public function getTeamDriverStats(): array
    {
        $drivers = Driver::active()->get();

        return [
            'total_podiums'       => $drivers->sum('podiums'),
            'total_championships' => $drivers->sum('world_championships'),
            'total_points'        => (float) $drivers->sum('career_points'),
            'driver_count'        => $drivers->count(),
        ];
    }
}
