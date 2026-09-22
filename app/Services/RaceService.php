<?php

namespace App\Services;

use App\Models\Article;
use App\Models\EnduranceRace;
use App\Models\RaceSchedule;
use Illuminate\Database\Eloquent\Collection;

/**
 * RaceService
 * -----------
 * Handles all race-related queries:
 *  - F1 Grand Prix schedule & countdown
 *  - Endurance race hub and slug-based detail routing
 *  - Latest news articles
 */
class RaceService
{
    // ── F1 Schedule ───────────────────────────────────────────────

    /**
     * Return the next upcoming F1 Grand Prix (closest future race).
     */
    public function getNextRace(): ?RaceSchedule
    {
        return RaceSchedule::nextRace()->first();
    }

    /**
     * Return all upcoming races ordered by date.
     */
    public function getUpcomingRaces(): Collection
    {
        return RaceSchedule::upcoming()->get();
    }

    /**
     * Return all finished races, most recent first.
     */
    public function getFinishedRaces(): Collection
    {
        return RaceSchedule::finished()->get();
    }

    /**
     * Return all races grouped by status.
     *
     * @return \Illuminate\Support\Collection<string, Collection>
     */
    public function getAllRacesGrouped(): \Illuminate\Support\Collection
    {
        return RaceSchedule::orderBy('race_date')
            ->get()
            ->groupBy('status');
    }

    /**
     * Calculate seconds remaining until the next race for the countdown widget.
     * Returns 0 if no upcoming race.
     */
    public function getCountdownSeconds(): int
    {
        $next = $this->getNextRace();
        return $next ? max(0, (int) now()->diffInSeconds($next->race_date, false)) : 0;
    }

    // ── Endurance Series ──────────────────────────────────────────

    /**
     * Return all endurance races for the hub/index page.
     */
    public function getAllEnduranceRaces(): Collection
    {
        return EnduranceRace::orderBy('event_name')->get();
    }

    /**
     * Find a specific endurance event by its unique slug.
     * Throws 404 if not found.
     */
    public function getEnduranceBySlug(string $slug): EnduranceRace
    {
        return EnduranceRace::bySlug($slug)->firstOrFail();
    }

    /**
     * Return a map of all slugs to event names for navigation links.
     *
     * @return array<string, string>
     */
    public function getEnduranceNavMap(): array
    {
        return EnduranceRace::orderBy('event_name')
            ->get(['event_slug', 'event_name'])
            ->pluck('event_name', 'event_slug')
            ->toArray();
    }

    // ── Articles / News ───────────────────────────────────────────

    /**
     * Return the 3 most recently published articles for the homepage.
     */
    public function getLatestArticles(int $limit = 3): Collection
    {
        return Article::published()
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Return the featured article (if any).
     */
    public function getFeaturedArticle(): ?Article
    {
        return Article::published()->featured()->latest('published_at')->first();
    }
}
