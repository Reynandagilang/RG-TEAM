<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Team;
use App\Services\CarService;
use App\Services\SponsorService;
use Illuminate\View\View;

/**
 * CarController
 * -------------
 * Drives the "The Machine" car specifications page (/car-specs).
 * Renders the full fleet breakdown by category with sponsor livery context.
 */
class CarController extends Controller
{
    public function __construct(
        protected CarService     $carService,
        protected SponsorService $sponsorService,
    ) {}

    /**
     * GET /car-specs
     * Renders the interactive car specs page with:
     *  - Available categories for tab navigation
     *  - All cars grouped by category
     *  - Technical partners (for livery sponsor section)
     *  - Fleet stats (headline numbers)
     */
    public function specs(): View
    {
        $team = Team::first();
        $teamId = $team?->id ?? 0;

        // All cars fully grouped by category (for tab switching)
        $fleetGrouped   = Car::with('team')
            ->orderByRaw("FIELD(category, 'F1', 'Hypercar', 'Hybrid', 'GT3', 'GTP')")
            ->orderBy('car_number')
            ->get()
            ->groupBy('category');

        $categories       = $this->carService->getAvailableCategories();
        $fleetStats       = $this->carService->getFleetStats();
        $technicalPartners = $this->sponsorService->getTechnicalPartners($teamId);

        // Build detailed spec panels per category
        $categoryMeta = [
            'F1' => [
                'championship' => 'FIA Formula 1 World Championship',
                'color'        => '#00A19B',
                'icon'         => 'f1',
                'description'  => 'The pinnacle of single-seater motorsport. Our 2026 F1 challenger '
                    . 'is engineered to FIA Formula 1 technical regulations with a full hybrid power '
                    . 'unit delivering over 1,000 combined horsepower.',
            ],
            'Hypercar' => [
                'championship' => 'FIA World Endurance Championship — Hypercar Class',
                'color'        => '#E8421C',
                'icon'         => 'hypercar',
                'description'  => 'Racing under the FIA WEC Hypercar LMH regulations, the RGR Valkyrie-H '
                    . 'is built for 24-hour combat at Spa, Le Mans, and the world\'s most demanding circuits.',
            ],
            'Hybrid' => [
                'championship' => 'FIA WEC — LMP1 Hybrid Prototype',
                'color'        => '#00C853',
                'icon'         => 'hybrid',
                'description'  => 'The Hybrid-LMP1 prototype carries a dual-motor hybrid drivetrain producing '
                    . 'over 600 kW total, engineered specifically for the marathon of Circuit de la Sarthe.',
            ],
            'GT3' => [
                'championship' => 'ADAC Nürburgring 24 Hours — GT3 Class',
                'color'        => '#FF6D00',
                'icon'         => 'gt3',
                'description'  => 'Conquering Green Hell. The RGR GT3-Evox runs under GT3 BoP regulations, '
                    . 'designed to endure the brutal 25.378 km Nordschleife layout.',
            ],
            'GTP' => [
                'championship' => 'IMSA WeatherTech SportsCar Championship — GTP Class',
                'color'        => '#AA00FF',
                'icon'         => 'gtp',
                'description'  => 'Built for the American racing calendar, the RGR GTP-Speedster competes '
                    . 'under the IMSA GTP hybrid regulations at Road America, Watkins Glen, and Daytona.',
            ],
        ];

        return view('car.specs', compact(
            'team',
            'fleetGrouped',
            'categories',
            'fleetStats',
            'technicalPartners',
            'categoryMeta',
        ));
    }
}
