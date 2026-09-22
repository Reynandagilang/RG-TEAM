<?php

namespace App\Services;

use App\Models\Sponsor;
use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;

/**
 * SponsorService
 * --------------
 * Encapsulates sponsor-related queries and tiered data retrieval.
 * Used by HomeController (footer, hero) and any sponsor-display component.
 */
class SponsorService
{
    /**
     * Get all active sponsors for a team, grouped by tier.
     *
     * @return array{
     *     'Title Sponsor': Collection,
     *     'Technical Partner': Collection,
     *     'Official Supplier': Collection
     * }
     */
    public function getSponsorsByTier(int $teamId): array
    {
        $all = Sponsor::where('team_id', $teamId)
            ->active()
            ->orderBy('sort_order')
            ->get()
            ->groupBy('tier');

        return [
            'Title Sponsor'     => $all->get('Title Sponsor',     collect()),
            'Technical Partner' => $all->get('Technical Partner', collect()),
            'Official Supplier' => $all->get('Official Supplier', collect()),
        ];
    }

    /**
     * Get title sponsors for hero badge display.
     */
    public function getTitleSponsors(int $teamId): Collection
    {
        return Sponsor::where('team_id', $teamId)
            ->titleSponsors()
            ->get();
    }

    /**
     * Get all active sponsors flat (for footer grid).
     */
    public function getAllActiveSponsors(int $teamId): Collection
    {
        return Sponsor::where('team_id', $teamId)
            ->active()
            ->orderBy('tier')
            ->orderBy('sort_order')
            ->get();
    }

    /**
     * Get technical partners (for car specs livery section).
     */
    public function getTechnicalPartners(int $teamId): Collection
    {
        return Sponsor::where('team_id', $teamId)
            ->technicalPartners()
            ->get();
    }
}
