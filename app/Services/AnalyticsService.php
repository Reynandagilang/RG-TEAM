<?php

namespace App\Services;

use App\Models\Driver;
use App\Models\DriverPerformance;
use App\Models\RaceResult;
use App\Models\RaceSchedule;
use App\Models\TelemetrySnapshot;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * AnalyticsService
 * ----------------
 * Aggregates driver performance data, race results, and telemetry
 * for statistical dashboards and driver comparison tools.
 */
class AnalyticsService
{
    /**
     * Get full championship standings for a given season.
     */
    public function getChampionshipStandings(int $seasonYear = 2026): Collection
    {
        return RaceResult::bySeason($seasonYear)
            ->select('driver_name', 'permanent_number', 'team_name')
            ->selectRaw('SUM(points_earned) as total_points')
            ->selectRaw('COUNT(CASE WHEN position = 1 THEN 1 END) as wins')
            ->selectRaw('COUNT(CASE WHEN position IN (1,2,3) THEN 1 END) as podiums')
            ->selectRaw('COUNT(CASE WHEN finish_status != "Finished" THEN 1 END) as dnf_count')
            ->selectRaw('AVG(position) as avg_position')
            ->groupBy('driver_name', 'permanent_number', 'team_name')
            ->orderByDesc('total_points')
            ->get();
    }

    /**
     * Get all results for a specific driver.
     */
    public function getDriverResults(string $driverName, int $seasonYear = 2026): Collection
    {
        return RaceResult::bySeason($seasonYear)
            ->byDriver($driverName)
            ->join('race_schedules', 'race_results.race_schedule_id', '=', 'race_schedules.id')
            ->select('race_results.*', 'race_schedules.grand_prix_name', 'race_schedules.circuit_name', 'race_schedules.race_date')
            ->orderBy('race_schedules.race_date')
            ->get();
    }

    /**
     * Get telemetry data series for charting (speed over a lap).
     */
    public function getTelemetrySeries(int $driverId, int $lapNumber = 1, string $session = 'Race'): Collection
    {
        return TelemetrySnapshot::where('driver_id', $driverId)
            ->where('lap_number', $lapNumber)
            ->where('session_type', $session)
            ->orderBy('timestamp_ms')
            ->get();
    }

    /**
     * Get the most recent race results with full details.
     */
    public function getLastRaceResults(int $limit = 10): Collection
    {
        return RaceResult::where('finish_status', 'Finished')
            ->join('race_schedules', 'race_results.race_schedule_id', '=', 'race_schedules.id')
            ->select('race_results.*', 'race_schedules.grand_prix_name', 'race_schedules.country')
            ->orderByDesc('race_schedules.race_date')
            ->limit($limit)
            ->get();
    }

    /**
     * Get season statistics for KPIs.
     */
    public function getSeasonStats(int $seasonYear = 2026): array
    {
        $results = RaceResult::bySeason($seasonYear)->get();

        $totalRaces = $results->count();
        $teamResults = $results->filter(fn($r) => $r->team_name === 'Mobil 1 Team RG');

        $totalPoints = $teamResults->sum('points_earned');
        $totalWins = $teamResults->where('position', 1)->count();
        $podiums = $teamResults->whereIn('position', [1, 2, 3])->count();
        $avgFinish = $teamResults->avg('position') ?: 0;

        // Fastest laps
        $fastestLaps = $teamResults->filter(fn($r) => $r->fastest_lap_time !== null)->count();

        return [
            'total_races'      => $totalRaces,
            'total_points'     => $totalPoints,
            'total_wins'       => $totalWins,
            'podiums'          => $podiums,
            'avg_finish'       => round($avgFinish, 1),
            'fastest_laps'     => $fastestLaps,
            'points_per_race'  => $totalRaces > 0 ? round($totalPoints / $totalRaces, 2) : 0,
            'win_rate'         => $totalRaces > 0 ? round(($totalWins / $totalRaces) * 100, 1) : 0,
        ];
    }

    /**
     * Get driver head-to-head comparison data.
     */
    public function getDriverComparison(string $driver1, string $driver2, int $seasonYear = 2026): array
    {
        $r1 = RaceResult::bySeason($seasonYear)->byDriver($driver1)->get();
        $r2 = RaceResult::bySeason($seasonYear)->byDriver($driver2)->get();

        return [
            'driver1' => [
                'name'             => $driver1,
                'points'           => $r1->sum('points_earned'),
                'wins'             => $r1->where('position', 1)->count(),
                'podiums'          => $r1->whereIn('position', [1, 2, 3])->count(),
                'avg_position'     => $r1->avg('position') ?: 0,
                'dnf'              => $r1->where('finish_status', '!=', 'Finished')->count(),
            ],
            'driver2' => [
                'name'             => $driver2,
                'points'           => $r2->sum('points_earned'),
                'wins'             => $r2->where('position', 1)->count(),
                'podiums'          => $r2->whereIn('position', [1, 2, 3])->count(),
                'avg_position'     => $r2->avg('position') ?: 0,
                'dnf'              => $r2->where('finish_status', '!=', 'Finished')->count(),
            ],
        ];
    }

    /**
     * Get qualifying vs race performance delta for a driver.
     */
    public function getGridToFlagAnalysis(int $seasonYear = 2026): Collection
    {
        return RaceResult::bySeason($seasonYear)
            ->whereNotNull('grid_position')
            ->get()
            ->groupBy('driver_name');
    }

    /**
     * Get the team's active drivers.
     */
    public function getTeamDrivers(int $teamId): Collection
    {
        return Driver::where('team_id', $teamId)
            ->where('active', true)
            ->orderBy('career_points', 'desc')
            ->get();
    }

    /**
     * Get the most recent qualifying results.
     */
    public function getQualifyingResults(int $limit = 10): Collection
    {
        $latestRace = RaceSchedule::ongoing()->orWhere('status', 'Finished')
            ->latest('race_date')->first();

        if (!$latestRace) {
            return collect();
        }

        return RaceResult::where('race_schedule_id', $latestRace->id)
            ->orderBy('position')
            ->limit($limit)
            ->get();
    }

    /**
     * Get sector performance comparison per driver.
     */
    public function getSectorAnalysis(int $driverId, int $limit = 50): array
    {
        $data = DriverPerformance::where('driver_id', $driverId)
            ->where('lap_date', '>=', now()->subDays(30)->day)
            ->orderByDesc('lap_date')
            ->limit($limit)
            ->get();

        $sectors = ['S1', 'S2', 'S3'];
        $result = [];

        foreach ($sectors as $s) {
            $sectorData = $data->where('sector', $s);
            $result[$s] = [
                'best_time'   => $sectorData->min('time_seconds'),
                'avg_time'    => $sectorData->avg('time_seconds'),
                'avg_speed'   => $sectorData->avg('speed_trap_kmh'),
                'count'       => $sectorData->count(),
            ];
        }

        return $result;
    }
}
