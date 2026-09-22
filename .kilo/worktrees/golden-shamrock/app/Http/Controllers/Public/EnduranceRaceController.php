<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Services\CarService;
use App\Services\RaceService;
use App\Services\SponsorService;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * EnduranceRaceController
 * -----------------------
 * Handles the Endurance Series hub and the slug-driven detail pages.
 *
 * Routes:
 *   GET /endurance          → index()
 *   GET /endurance/{slug}   → show($slug)
 */
class EnduranceRaceController extends Controller
{
    public function __construct(
        protected RaceService    $raceService,
        protected CarService     $carService,
        protected SponsorService $sponsorService,
    ) {}

    /**
     * GET /endurance
     * Endurance Series hub — lists all four race events with cards.
     */
    public function index(): View
    {
        $team             = Team::first();
        $enduranceRaces   = $this->raceService->getAllEnduranceRaces();
        $enduranceNavMap  = $this->raceService->getEnduranceNavMap();

        return view('endurance.index', compact(
            'team',
            'enduranceRaces',
            'enduranceNavMap',
        ));
    }

    /**
     * GET /endurance/{slug}
     * Dynamic detail page — renders a rich, themed page for each event.
     *
     * Supported slugs:
     *   24h-le-mans         → Classic LMP1 Hybrid, Circuit de la Sarthe
     *   24h-spa             → Dramatic Hypercar, Spa Ardennes
     *   24h-nurburgring     → Aggressive GT3, Nordschleife
     *   imsa-6h-the-glen    → American GTP, Watkins Glen
     */
    public function show(string $slug): View
    {
        $team  = Team::first();
        $event = $this->raceService->getEnduranceBySlug($slug);

        // Fetch the cars used in this event by class_category match
        $eventCars = $this->carService->getCarsByCategory(
            $this->mapSlugToCarCategory($slug)
        );

        // All endurance events for sidebar navigation
        $allEvents       = $this->raceService->getAllEnduranceRaces();
        $enduranceNavMap = $this->raceService->getEnduranceNavMap();

        // Build slug-specific circuit data for the infographic section
        $circuitData = $this->buildCircuitData($slug);

        // Build slug-specific challenge data (unique to each race)
        $challengeData = $this->buildChallengeData($slug);

        return view('endurance.show', compact(
            'team',
            'event',
            'eventCars',
            'allEvents',
            'enduranceNavMap',
            'circuitData',
            'challengeData',
        ));
    }

    // ── Private Helpers ───────────────────────────────────────────

    /**
     * Map an endurance slug to the Car model category string.
     */
    private function mapSlugToCarCategory(string $slug): string
    {
        return match ($slug) {
            '24h-le-mans'      => 'Hybrid',
            '24h-spa'          => 'Hypercar',
            '24h-nurburgring'  => 'GT3',
            'imsa-6h-the-glen' => 'GTP',
            default            => 'Hypercar',
        };
    }

    /**
     * Build circuit infographic data per slug.
     *
     * @return array<string, mixed>
     */
    private function buildCircuitData(string $slug): array
    {
        return match ($slug) {
            '24h-le-mans' => [
                'name'         => 'Circuit de la Sarthe',
                'length'       => '13.626 km',
                'turns'        => 38,
                'drs_zones'    => 2,
                'lap_record'   => '3:22.483',
                'record_holder' => 'Kobayashi (Toyota 2022)',
                'surface'      => 'Asphalt & Concrete sections',
                'altitude'     => '42 m above sea level',
                'key_sections' => [
                    ['name' => 'Dunlop Chicane',    'desc' => 'High-speed 250 km/h entry into chicane before the grandstands'],
                    ['name' => 'Mulsanne Straight', 'desc' => '5.9 km full-throttle blast historically reaching over 400 km/h'],
                    ['name' => 'Porsche Curves',    'desc' => 'Technical section demanding aerodynamic balance and driver skill'],
                    ['name' => 'Ford Chicanes',      'desc' => 'Hard braking zones before the final run to the pit straight'],
                ],
            ],
            '24h-nurburgring' => [
                'name'         => 'Nürburgring Nordschleife (Combined)',
                'length'       => '25.378 km',
                'turns'        => 154,
                'drs_zones'    => 0,
                'lap_record'   => '6:58.395',
                'record_holder' => 'Manthey Grello Porsche (2013)',
                'surface'      => 'Asphalt — Some sections remain original 1920s-era layout',
                'altitude'     => '310 m – 620 m (310 m elevation change)',
                'key_sections' => [
                    ['name' => 'Flugplatz',    'desc' => 'Blind crest at 220 km/h — cars go airborne over the brow'],
                    ['name' => 'Karussell',    'desc' => 'Iconic banked concrete carousel, unique to the Nordschleife'],
                    ['name' => 'Fuchsröhre',   'desc' => '"Fox Hole" compression at the bottom of a steep descent'],
                    ['name' => 'Brünnchen',    'desc' => 'Fan-favourite spectator section with 270° viewing angles'],
                ],
            ],
            'imsa-6h-the-glen' => [
                'name'         => 'Watkins Glen International',
                'length'       => '5.535 km',
                'turns'        => 11,
                'drs_zones'    => 0,
                'lap_record'   => '1:25.632',
                'record_holder' => 'Palou (Chip Ganassi 2022)',
                'surface'      => 'Asphalt — Watkins Glen, New York',
                'altitude'     => '570 m above sea level',
                'key_sections' => [
                    ['name' => 'Turn 1 Braking Zone', 'desc' => 'Heavy braking into the first corner after the pit straight at 230 km/h'],
                    ['name' => 'The Esses',            'desc' => 'Classic flowing S-curves demanding high-speed aerodynamic balance'],
                    ['name' => 'Inner Loop',           'desc' => 'Tight technical chicane separating the fast and slow sequences'],
                    ['name' => 'The Boot',             'desc' => 'Signature section with elevation change and long 200 km/h exit'],
                ],
            ],
            default => [],
        };
    }

    /**
     * Build unique challenge data (talking points) per slug.
     *
     * @return array<array{title: string, body: string}>
     */
    private function buildChallengeData(string $slug): array
    {
        return match ($slug) {
            '24h-le-mans' => [
                ['title' => 'Managing Hybrid Deployment', 'body' => 'The LMP1 Hybrid system must be deployed strategically across 13.6 km — too aggressive on the Mulsanne and energy reserves fall short before Porsche Curves.'],
                ['title' => 'Night Phase Strategy',       'body' => 'With 10+ hours in darkness, tyre warm-up cycles change dramatically. The RGR strategy wall runs predictive models every 2 minutes throughout the night.'],
                ['title' => 'FCY & Safety Car Windows',  'body' => 'With 50+ cars on track, full-course yellow periods are critical pit stop opportunities. Undercut strategy can gain or lose 2-3 positions instantly.'],
            ],
            '24h-nurburgring' => [
                ['title' => 'The 154-Corner Challenge',     'body' => 'No other race in the world has this many corners per lap. The GT3-Evox requires a unique suspension setup with 22% higher compression damping vs standard GT3 events.'],
                ['title' => 'Traffic & Lap Time Variance',  'body' => 'The combined Nürburgring layout runs multiple classes simultaneously. Navigating slower traffic through Fuchsröhre at night is one of the most demanding tasks in motorsport.'],
                ['title' => 'Tyre Wear at Green Hell',      'body' => 'The rough Nordschleife surface destroys tyres in 3-4 laps. RGR\'s engineering team runs real-time degradation models to call the optimal pit window.'],
            ],
            'imsa-6h-the-glen' => [
                ['title' => 'Sprint-Style Hybrid Deployment',    'body' => 'Unlike 24-hour endurance, the 6-hour format rewards aggressive hybrid use. The GTP-Speedster\'s deploy-on-demand system gives full power out of Boot Complex every lap.'],
                ['title' => 'Class Traffic Management',           'body' => 'IMSA runs GTD-Pro and GTD classes alongside GTP. Traffic management through The Esses is critical — a poorly-timed pass costs 1.5+ seconds.'],
                ['title' => 'Afternoon Heat & Tyre Management',  'body' => 'Summer at Watkins Glen brings track temperatures above 50°C. The GTP-Speedster runs a titanium brake duct system to combat heat fade across the 6-hour window.'],
            ],
            default => [],
        };
    }
}
