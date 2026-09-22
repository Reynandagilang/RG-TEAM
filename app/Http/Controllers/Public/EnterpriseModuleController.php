<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Services\SponsorService;
use App\Services\AnalyticsService;
use App\Services\StrategyService;
use App\Services\FantasyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EnterpriseModuleController extends Controller
{
    public function __construct(
        protected SponsorService $sponsorService,
        protected AnalyticsService $analyticsService,
        protected StrategyService $strategyService,
        protected FantasyService $fantasyService
    ) {}

    private function getCommonData(): array
    {
        $team = Team::first();
        $sponsorsByTier = $this->sponsorService->getSponsorsByTier($team?->id ?? 0);
        return compact('team', 'sponsorsByTier');
    }

    /** Live Race Center */
    public function liveRaceCenter(): View
    {
        $data = $this->getCommonData();

        $drivers = $this->analyticsService->getTeamDrivers($data['team']?->id ?? 0);
        $seasonStats = $this->analyticsService->getSeasonStats(2026);
        $recentResults = $this->analyticsService->getLastRaceResults(5);
        $dRSZones = $this->strategyService->getDRSDetectionPoints();

        return view('enterprise.live-race-center', array_merge($data, compact(
            'drivers', 'seasonStats', 'recentResults', 'dRSZones'
        )));
    }

    /** Statistics Center */
    public function statisticsCenter(): View
    {
        $data = $this->getCommonData();

        $standings = $this->analyticsService->getChampionshipStandings(2026);
        $seasonStats = $this->analyticsService->getSeasonStats(2026);
        $recentResults = $this->analyticsService->getLastRaceResults(10);
        $gridToFlag = $this->analyticsService->getGridToFlagAnalysis(2026);

        return view('enterprise.statistics-center', array_merge($data, compact(
            'standings', 'seasonStats', 'recentResults', 'gridToFlag'
        )));
    }

    /** Team Museum */
    public function teamMuseum(): View
    {
        $data = $this->getCommonData();

        return view('enterprise.team-museum', $data);
    }

    /** Sponsor Portal & FIA Cost Cap Overview */
    public function sponsorPortal(): View
    {
        $data = $this->getCommonData();
        $costCaps = \App\Models\FinancialCostCap::where('season_year', 2026)->get();
        $totalCapLimit = $costCaps->where('category', '!=', 'Regulatory Exclusions (Driver Salaries & Marketing)')->sum('budget_limit_usd');
        $totalActualSpent = $costCaps->where('category', '!=', 'Regulatory Exclusions (Driver Salaries & Marketing)')->sum('actual_spent_usd');
        $totalCommitted = $costCaps->where('category', '!=', 'Regulatory Exclusions (Driver Salaries & Marketing)')->sum('committed_usd');
        $remainingCap = $totalCapLimit - ($totalActualSpent + $totalCommitted);

        $exposures = \App\Models\SponsorExposure::latest()->get();
        $totalMediaValue = $exposures->sum('media_value_usd');
        $totalImpressions = $exposures->sum('broadcast_impressions');

        return view('enterprise.sponsor-portal', array_merge($data, compact(
            'costCaps',
            'totalCapLimit',
            'totalActualSpent',
            'totalCommitted',
            'remainingCap',
            'exposures',
            'totalMediaValue',
            'totalImpressions'
        )));
    }

    /** Global Logistics & Freight Operations Hub */
    public function logisticsHub(): View
    {
        $data = $this->getCommonData();
        $shipments = \App\Models\LogisticsShipment::with('items')->latest()->get();
        $activeShipmentsCount = $shipments->where('status', '!=', 'delivered')->count();
        $totalFreightWeight = \App\Models\FreightItem::sum('weight_kg');

        return view('enterprise.logistics-hub', array_merge($data, compact(
            'shipments',
            'activeShipmentsCount',
            'totalFreightWeight'
        )));
    }

    /** Engineering Telemetry Dashboard */
    public function engineeringDashboard(): View
    {
        $data = $this->getCommonData();

        $drivers = $this->analyticsService->getTeamDrivers($data['team']?->id ?? 0);
        $telemetryData = \App\Models\TelemetrySnapshot::where('session_type', 'Race')
            ->where('lap_number', 5)
            ->orderBy('timestamp_ms')
            ->limit(30)
            ->get();

        $weatherData = \App\Models\WeatherData::latest('recorded_at')->limit(24)->get();

        $activeSetups = \App\Models\CarSetup::with('car')
            ->where('season_year', 2026)
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        return view('enterprise.engineering-dashboard', array_merge($data, compact(
            'drivers', 'telemetryData', 'weatherData', 'activeSetups'
        )));
    }

    /** Membership Tiers Portal */
    public function membership(): View
    {
        $data = $this->getCommonData();

        return view('enterprise.membership', $data);
    }

    /** Race Strategy Simulator */
    public function raceStrategy(): View
    {
        $data = $this->getCommonData();

        $tireCompounds = $this->strategyService->getTireCompounds();
        $circuits = [
            'Marina Bay Street Circuit' => 62,
            'Circuit de Monaco' => 78,
            'Silverstone Circuit' => 52,
            'Circuit de Spa-Francorchamps' => 44,
            'Autodromo Nazionale Monza' => 53,
            'Circuit of the Americas' => 56,
            'Suzuka International Racing Course' => 53,
            'Interlagos (Sao Paulo)' => 71,
        ];

        $strategy = $this->strategyService->calculateStintStrategy(78, 'MEDIUM', 'SOFT');
        $weatherAdvice = $this->strategyService->getWeatherStrategy('dry', 'MEDIUM');

        return view('enterprise.race-strategy', array_merge($data, compact(
            'tireCompounds', 'circuits', 'strategy', 'weatherAdvice'
        )));
    }

    /** Interactive Race Strategy Calculator */
    public function strategyCalculate(): \Illuminate\Http\JsonResponse
    {
        $totalLaps = (int) request('laps', 78);
        $primary = request('primary', 'MEDIUM');
        $secondary = request('secondary', 'SOFT');
        $weather = request('weather', 'dry');

        $strategy = $this->strategyService->calculateStintStrategy($totalLaps, $primary, $secondary);
        $weatherAdvice = $this->strategyService->getWeatherStrategy($weather, $primary);

        return response()->json([
            'strategy'      => $strategy,
            'weather_advice' => $weatherAdvice,
        ]);
    }

    /** Driver Analytics & Comparison */
    public function driverAnalytics(): View
    {
        $data = $this->getCommonData();

        $drivers = $this->analyticsService->getTeamDrivers($data['team']?->id ?? 0);
        $standings = $this->analyticsService->getChampionshipStandings(2026);
        $gridToFlag = $this->analyticsService->getGridToFlagAnalysis(2026);

        $driver1Results = $drivers->first()?->name
            ? $this->analyticsService->getDriverResults($drivers->first()->name)
            : collect();
        $driver2Results = $drivers->skip(1)->first()?->name
            ? $this->analyticsService->getDriverResults($drivers->skip(1)->first()->name)
            : collect();

        return view('enterprise.driver-analytics', array_merge($data, compact(
            'drivers', 'standings', 'gridToFlag', 'driver1Results', 'driver2Results'
        )));
    }

    /** Car Setup Configurator */
    public function carSetup(): View
    {
        $data = $this->getCommonData();

        $setups = \App\Models\CarSetup::with('car')
            ->where('season_year', 2026)
            ->orderByDesc('created_at')
            ->get();

        $cars = \App\Models\Car::where('season_year', 2026)->get();
        $tireCompounds = $this->strategyService->getTireCompounds();

        return view('enterprise.car-setup', array_merge($data, compact(
            'setups', 'cars', 'tireCompounds'
        )));
    }

    /** F1 Fantasy League */
    public function fantasyLeague(): View
    {
        $data = $this->getCommonData();

        $prices = $this->fantasyService->getDriverPrices(2026);
        $userTeam = Auth::check()
            ? $this->fantasyService->getUserTeam(Auth::id())
            : null;

        $standings = $this->fantasyService->getLeagueStandings(2026);

        $budgetSummary = $userTeam
            ? $this->fantasyService->getBudgetSummary($userTeam)
            : null;

        return view('enterprise.fantasy-league', array_merge($data, compact(
            'prices', 'userTeam', 'standings', 'budgetSummary'
        )));
    }

    /** Draft a driver into fantasy team (AJAX) */
    public function fantasyDraft(int $driverId): \Illuminate\Http\JsonResponse
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Authentication required'], 401);
        }

        $result = $this->fantasyService->draftDriver(Auth::id(), $driverId);

        return response()->json($result);
    }

    /** Drop a driver from fantasy team (AJAX) */
    public function fantasyDrop(int $driverId): \Illuminate\Http\JsonResponse
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Authentication required'], 401);
        }

        $result = $this->fantasyService->dropDriver(Auth::id(), $driverId);

        return response()->json($result);
    }

    /** Team Radio Archive */
    public function teamRadio(): View
    {
        $data = $this->getCommonData();

        $messages = \App\Models\TeamRadioMessage::with('driver')
            ->where('season_year', 2026)
            ->orderByDesc('created_at')
            ->limit(50)
            ->get();

        $categories = \App\Models\TeamRadioMessage::where('season_year', 2026)
            ->selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->orderByDesc('count')
            ->get();

        return view('enterprise.team-radio', array_merge($data, compact(
            'messages', 'categories'
        )));
    }

    /** Weather & Track Conditions Center */
    public function weatherCenter(): View
    {
        $data = $this->getCommonData();

        $weatherData = \App\Models\WeatherData::where('season_year', 2026)
            ->orderByDesc('recorded_at')
            ->limit(48)
            ->get();

        $circuitSummaries = \App\Models\WeatherData::where('season_year', 2026)
            ->selectRaw('circuit_name, AVG(temperature_celsius) as avg_temp, AVG(track_temp_celsius) as avg_track_temp, AVG(wind_speed_kmh) as avg_wind, MAX(recorded_at) as last_recorded')
            ->groupBy('circuit_name')
            ->get();

        return view('enterprise.weather-center', array_merge($data, compact(
            'weatherData', 'circuitSummaries'
        )));
    }

    /** Race Results Archive */
    public function raceResults(): View
    {
        $data = $this->getCommonData();

        $results = \App\Models\RaceResult::join('race_schedules', 'race_results.race_schedule_id', '=', 'race_schedules.id')
            ->select('race_results.*', 'race_schedules.grand_prix_name', 'race_schedules.circuit_name', 'race_schedules.country', 'race_schedules.race_date')
            ->orderByDesc('race_schedules.race_date')
            ->paginate(30);

        $standings = $this->analyticsService->getChampionshipStandings(2026);

        return view('enterprise.race-results', array_merge($data, compact(
            'results', 'standings'
        )));
    }
}
