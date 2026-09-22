<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Services\SponsorService;
use Illuminate\View\View;

class EnterpriseModuleController extends Controller
{
    public function __construct(
        protected SponsorService $sponsorService
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
        return view('enterprise.live-race-center', $data);
    }

    /** Statistics Center */
    public function statisticsCenter(): View
    {
        $data = $this->getCommonData();
        return view('enterprise.statistics-center', $data);
    }

    /** Team Museum */
    public function teamMuseum(): View
    {
        $data = $this->getCommonData();
        return view('enterprise.team-museum', $data);
    }

    /** Sponsor Portal */
    public function sponsorPortal(): View
    {
        $data = $this->getCommonData();
        return view('enterprise.sponsor-portal', $data);
    }

    /** Engineering Telemetry Dashboard */
    public function engineeringDashboard(): View
    {
        $data = $this->getCommonData();
        return view('enterprise.engineering-dashboard', $data);
    }

    /** Membership Tiers Portal */
    public function membership(): View
    {
        $data = $this->getCommonData();
        return view('enterprise.membership', $data);
    }
}
