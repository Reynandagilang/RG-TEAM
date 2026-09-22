<?php

namespace App\Services;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

/**
 * CarService
 * ----------
 * Handles all car fleet queries and specification data aggregation.
 * Supports filtering by category (F1, Hypercar, Hybrid, GT3, GTP).
 */
class CarService
{
    /**
     * Get the primary F1 car (first unit, lowest car number).
     */
    public function getPrimaryF1Car(): ?Car
    {
        return Car::f1()->orderBy('car_number')->first();
    }

    /**
     * Get all F1 cars ordered by number.
     */
    public function getF1Fleet(): Collection
    {
        return Car::f1()->orderBy('car_number')->get();
    }

    /**
     * Get all endurance cars (Hypercar, Hybrid, GT3, GTP) grouped by category.
     *
     * @return array<string, Collection>
     */
    public function getEnduranceFleetGrouped(): array
    {
        $cars = Car::endurance()
            ->orderBy('category')
            ->orderBy('car_number')
            ->get();

        return $cars->groupBy('category')->toArray() === []
            ? []
            : $cars->groupBy('category')->map(fn($group) => $group)->toArray();
    }

    /**
     * Get all endurance cars as a Collection (not grouped).
     */
    public function getEnduranceFleet(): Collection
    {
        return Car::endurance()
            ->orderBy('category')
            ->orderBy('car_number')
            ->get();
    }

    /**
     * Get cars for a specific category.
     */
    public function getCarsByCategory(string $category): Collection
    {
        return Car::byCategory($category)->orderBy('car_number')->get();
    }

    /**
     * Get the full fleet (all categories) as a Collection.
     */
    public function getFullFleet(): Collection
    {
        return Car::with('team')
            ->orderByRaw("FIELD(category, 'F1', 'Hypercar', 'Hybrid', 'GT3', 'GTP')")
            ->orderBy('car_number')
            ->get();
    }

    /**
     * Get all distinct categories present in the fleet (for tab rendering).
     *
     * @return array<string>
     */
    public function getAvailableCategories(): array
    {
        return Car::select('category')
            ->distinct()
            ->orderByRaw("FIELD(category, 'F1', 'Hypercar', 'Hybrid', 'GT3', 'GTP')")
            ->pluck('category')
            ->toArray();
    }

    /**
     * Aggregate fleet statistics.
     *
     * @return array{total_cars: int, max_hp: int, max_speed: int, categories: int}
     */
    public function getFleetStats(): array
    {
        $cars = Car::all();

        return [
            'total_cars'  => $cars->count(),
            'max_hp'      => (int) $cars->max('power_hp'),
            'max_speed'   => (int) $cars->max('top_speed'),
            'categories'  => $cars->pluck('category')->unique()->count(),
        ];
    }
}
