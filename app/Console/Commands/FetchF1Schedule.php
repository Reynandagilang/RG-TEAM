<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\RaceSchedule;
use Carbon\Carbon;

class FetchF1Schedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'f1:fetch-schedule {year=current}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch real-time F1 schedule from Ergast (Jolpi API) and update the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $year = $this->argument('year');
        $this->info("Fetching F1 schedule for {$year}...");

        // Ergast API mirror via Jolpi (since original Ergast is deprecated)
        $url = "https://api.jolpi.ca/ergast/f1/{$year}.json";
        
        $response = Http::get($url);

        if ($response->failed()) {
            $this->error("Failed to fetch data from API.");
            return;
        }

        $data = $response->json();
        
        if (!isset($data['MRData']['RaceTable']['Races'])) {
            $this->error("Invalid API response structure.");
            return;
        }

        $races = $data['MRData']['RaceTable']['Races'];
        $season = $data['MRData']['RaceTable']['season'];
        
        $this->info("Found " . count($races) . " races for season {$season}. Syncing to database...");

        foreach ($races as $race) {
            // Determine race date and time
            $date = $race['date'];
            $time = $race['time'] ?? '00:00:00Z';
            
            $raceDate = Carbon::parse($date . ' ' . $time);
            
            // Determine status
            $status = 'Upcoming';
            if ($raceDate->isPast()) {
                $status = 'Finished';
            }
            
            // Check if it's currently ongoing (within 2 hours of race start)
            if ($raceDate->isPast() && $raceDate->copy()->addHours(2)->isFuture()) {
                $status = 'Ongoing';
            }

            // Upsert based on round number and season year
            RaceSchedule::updateOrCreate(
                [
                    'round_number' => $race['round'],
                    'season_year' => $season,
                ],
                [
                    'grand_prix_name' => $race['raceName'],
                    'circuit_name' => $race['Circuit']['circuitName'],
                    'country' => $race['Circuit']['Location']['country'],
                    'country_code' => strtoupper(substr($race['Circuit']['Location']['country'], 0, 3)),
                    'race_date' => $raceDate,
                    'status' => $status,
                ]
            );
        }

        $this->info("✅ Successfully synced {$season} F1 Schedule from real-time API!");
    }
}
