<?php

namespace App\Services;

use App\Models\Driver;
use App\Models\FantasyDriverPrice;
use App\Models\FantasyTeam;
use App\Models\RaceResult;
use Illuminate\Database\Eloquent\Collection;

/**
 * FantasyService
 * --------------
 * Manages F1 Fantasy league logic: driver prices, team building,
 * points calculation, and league standings.
 */
class FantasyService
{
    private const BUDGET_TOTAL = 100.0;

    /**
     * Get all driver prices for the current season.
     */
    public function getDriverPrices(int $seasonYear = 2026): Collection
    {
        return FantasyDriverPrice::where('season_year', $seasonYear)
            ->with('driver')
            ->orderBy('price_millions', 'desc')
            ->get();
    }

    /**
     * Get the current user's fantasy team.
     */
    public function getUserTeam(int $userId, int $seasonYear = 2026): ?FantasyTeam
    {
        return FantasyTeam::where('user_id', $userId)
            ->where('season_year', $seasonYear)
            ->first();
    }

    /**
     * Create a new fantasy team for a user.
     */
    public function createTeam(int $userId, string $teamName, int $seasonYear = 2026): FantasyTeam
    {
        return FantasyTeam::create([
            'user_id'       => $userId,
            'season_year'   => $seasonYear,
            'team_name'     => $teamName,
            'budget_total'  => self::BUDGET_TOTAL,
            'budget_used'   => 0,
            'total_points'  => 0,
            'drivers_selected' => [],
        ]);
    }

    /**
     * Draft a driver into the user's fantasy team.
     */
    public function draftDriver(int $userId, int $driverId): array
    {
        $team = $this->getUserTeam($userId);
        $price = FantasyDriverPrice::where('driver_id', $driverId)->first();

        if (!$team || !$price) {
            return ['success' => false, 'message' => 'Team or driver not found'];
        }

        $selected = $team->drivers_selected ?? [];

        if (in_array($driverId, $selected)) {
            return ['success' => false, 'message' => 'Driver already selected'];
        }

        if (count($selected) >= 5) {
            return ['success' => false, 'message' => 'Roster is full (max 5 drivers)'];
        }

        if ($team->budget_used + $price->price_millions > $team->budget_total) {
            return ['success' => false, 'message' => 'Insufficient budget for this driver'];
        }

        $selected[] = $driverId;
        $team->drivers_selected = $selected;
        $team->budget_used += $price->price_millions;
        $team->save();

        return [
            'success'      => true,
            'driver_name'  => $price->driver->name ?? 'Unknown',
            'price'        => $price->price_millions,
            'remaining'    => $team->budget_remaining,
        ];
    }

    /**
     * Remove a driver from the user's fantasy team.
     */
    public function dropDriver(int $userId, int $driverId): array
    {
        $team = $this->getUserTeam($userId);
        if (!$team) {
            return ['success' => false, 'message' => 'Team not found'];
        }

        $selected = $team->drivers_selected ?? [];
        $key = array_search($driverId, $selected);

        if ($key === false) {
            return ['success' => false, 'message' => 'Driver not on roster'];
        }

        $price = FantasyDriverPrice::where('driver_id', $driverId)->first();
        unset($selected[$key]);
        $selected = array_values($selected);

        $team->drivers_selected = $selected;
        $team->budget_used -= $price->price_millions;
        $team->save();

        return [
            'success'      => true,
            'driver_name'  => $price->driver->name ?? 'Unknown',
            'price'        => $price->price_millions,
            'remaining'    => $team->budget_remaining,
        ];
    }

    /**
     * Calculate fantasy points for a driver based on race results.
     * Points formula: position, finishing, fastest lap bonus.
     */
    public function calculatePoints(RaceResult $result): int
    {
        $position = $result->position;
        $points = 0;

        // Points per position (F1-style with bonus)
        if ($position === 1) {
            $points = 25;
        } elseif ($position === 2) {
            $points = 18;
        } elseif ($position === 3) {
            $points = 15;
        } elseif ($position <= 10) {
            $points = 11 - $position; // P4=8, P5=7...P10=1
        }

        // Bonus for top 10 qualifying
        if ($result->grid_position <= 10 && $result->grid_position > 0) {
            $points += 1;
        }

        // Fastest lap bonus
        if (!empty($result->fastest_lap_time)) {
            $points += 1;
        }

        // DNF penalty
        if ($result->finish_status !== 'Finished') {
            $points = 0;
        }

        return $points;
    }

    /**
     * Get league standings across all fantasy teams.
     */
    public function getLeagueStandings(int $seasonYear = 2026): Collection
    {
        return FantasyTeam::where('season_year', $seasonYear)
            ->join('users', 'fantasy_teams.user_id', '=', 'users.id')
            ->select('fantasy_teams.*', 'users.name as user_name')
            ->orderByDesc('total_points')
            ->orderByDesc('race_count')
            ->get()
            ->each(function ($team, $index) {
                $team->league_position = $index + 1;
            });
    }

    /**
     * Get all drivers available for drafting with their prices.
     */
    public function getDraftableDrivers(int $seasonYear = 2026): Collection
    {
        $prices = $this->getDriverPrices($seasonYear);

        return Driver::active()
            ->raceDrivers()
            ->with('team')
            ->get()
            ->map(function ($driver) use ($prices) {
                $price = $prices->firstWhere('driver_id', $driver->id);
                $driver->price_millions = $price->price_millions ?? 5.00;
                $driver->popularity_percent = $price->popularity_percent ?? 0;
                $driver->avg_points = $price->avg_points ?? 0;
                $driver->value_rating = $price->value_rating ?? 'N/A';
                return $driver;
            })
            ->sortByDesc('price_millions');
    }

    /**
     * Get budget summary for the draft UI.
     */
    public function getBudgetSummary(FantasyTeam $team): array
    {
        $selectedDrivers = Driver::whereIn('id', $team->drivers_selected ?? [])
            ->withPivot([])
            ->get();

        $selectedPrices = FantasyDriverPrice::whereIn('driver_id', $team->drivers_selected ?? [])->get();

        return [
            'budget_total'   => $team->budget_total,
            'budget_used'    => $team->budget_used,
            'budget_remaining' => $team->budget_remaining,
            'usage_percent'  => $team->budget_usage_percent,
            'drivers_count'  => count($team->drivers_selected ?? []),
            'max_drivers'    => 5,
            'selected'       => $selectedPrices->mapWithKeys(function ($price) {
                return [$price->driver_id => $price->price_millions];
            })->toArray(),
        ];
    }
}
