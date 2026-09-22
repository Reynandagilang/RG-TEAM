<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Driver;
use App\Models\RaceSchedule;
use App\Models\Team;
use Illuminate\Database\Seeder;

class RgrTeamSeeder extends Seeder
{
    /**
     * Seed the Rey Gilang Racing team data.
     */
    public function run(): void
    {
        // ─────────────────────────────────────────────────────────
        // 1. TEAM DATA
        // ─────────────────────────────────────────────────────────
        $team = Team::updateOrCreate(
            ['name' => 'Rey Gilang Racing'],
            [
                'principal'           => 'Rey Gilang',
                'base_location'       => 'Jakarta, Indonesia',
                'constructors_titles' => 3,
                'drivers_titles'      => 2,
                'team_description'    => 'Rey Gilang Racing (RGR) is an Indonesian-born Formula 1 constructor, '
                    . 'founded in 2018 and based in Jakarta. Rising from the back of the grid to the '
                    . 'championship battle within just five seasons, RGR embodies the relentless pursuit '
                    . 'of speed, precision, and innovation — forged in carbon fiber and powered by the '
                    . 'next-generation hybrid power unit.',
                'team_logo'           => null,
            ]
        );

        // ─────────────────────────────────────────────────────────
        // 2. CAR — RGR-26 E Performance
        // ─────────────────────────────────────────────────────────
        Car::updateOrCreate(
            ['team_id' => $team->id, 'model_name' => 'RGR-26 E Performance'],
            [
                'power_unit'          => 'RGR-HP2026 Hybrid V6',
                'chassis'             => 'Carbon-Titanium Monocoque Mk IV',
                'weight'              => 798.00,       // kg (regulation minimum 2026)
                'top_speed'           => 372,          // km/h
                'power_hp'            => 1050,         // combined HP
                'season_year'         => 2026,
                'car_image'           => null,
                'side_view_image'     => null,
                'aerodynamics_notes'  => 'Full ground-effect Venturi floor with active front wing flap. '
                    . 'Sidepod design inspired by venturi undercut concept for maximum downforce '
                    . 'in high-speed corners while minimizing straight-line drag coefficient.',
                'suspension_notes'    => 'Push-rod front suspension with pull-rod rear configuration. '
                    . 'Inboard damper with heave spring unit. Titanium wishbones, carbon uprights.',
            ]
        );

        // ─────────────────────────────────────────────────────────
        // 3. DRIVERS — 2 Race Drivers + 1 Reserve
        // ─────────────────────────────────────────────────────────

        // Driver 1 — Enzo Valentini (Italian prodigy)
        Driver::updateOrCreate(
            ['team_id' => $team->id, 'permanent_number' => 8],
            [
                'name'           => 'Enzo Valentini',
                'country'        => 'Italy',
                'country_code'   => 'ITA',
                'podiums'        => 27,
                'career_points'  => 612.50,
                'profile_image'  => null,
                'helmet_image'   => null,
                'active'         => true,
                'role'           => 'Race Driver',
            ]
        );

        // Driver 2 — Kael Adriansen (Dutch rising star)
        Driver::updateOrCreate(
            ['team_id' => $team->id, 'permanent_number' => 17],
            [
                'name'           => 'Kael Adriansen',
                'country'        => 'Netherlands',
                'country_code'   => 'NLD',
                'podiums'        => 14,
                'career_points'  => 389.00,
                'profile_image'  => null,
                'helmet_image'   => null,
                'active'         => true,
                'role'           => 'Race Driver',
            ]
        );

        // Driver 3 — Reserve / Test
        Driver::updateOrCreate(
            ['team_id' => $team->id, 'permanent_number' => 55],
            [
                'name'           => 'Sofia Hartmann',
                'country'        => 'Germany',
                'country_code'   => 'DEU',
                'podiums'        => 0,
                'career_points'  => 18.00,
                'profile_image'  => null,
                'helmet_image'   => null,
                'active'         => true,
                'role'           => 'Reserve',
            ]
        );

        // ─────────────────────────────────────────────────────────
        // 4. RACE SCHEDULE — 2026 Season (Sample)
        // ─────────────────────────────────────────────────────────
        $races = [
            [
                'round_number'   => 1,
                'grand_prix_name'=> 'Bahrain Grand Prix',
                'circuit_name'   => 'Bahrain International Circuit',
                'country'        => 'Bahrain',
                'country_code'   => 'BHR',
                'practice1_date' => '2026-03-27 13:00:00',
                'qualifying_date'=> '2026-03-28 16:00:00',
                'race_date'      => '2026-03-29 15:00:00',
                'status'         => 'Finished',
                'season_year'    => 2026,
            ],
            [
                'round_number'   => 2,
                'grand_prix_name'=> 'Saudi Arabian Grand Prix',
                'circuit_name'   => 'Jeddah Corniche Circuit',
                'country'        => 'Saudi Arabia',
                'country_code'   => 'SAU',
                'practice1_date' => '2026-04-03 17:30:00',
                'qualifying_date'=> '2026-04-04 20:00:00',
                'race_date'      => '2026-04-05 20:00:00',
                'status'         => 'Finished',
                'season_year'    => 2026,
            ],
            [
                'round_number'   => 3,
                'grand_prix_name'=> 'Australian Grand Prix',
                'circuit_name'   => 'Albert Park Circuit',
                'country'        => 'Australia',
                'country_code'   => 'AUS',
                'practice1_date' => '2026-04-10 12:30:00',
                'qualifying_date'=> '2026-04-11 15:00:00',
                'race_date'      => '2026-04-12 14:00:00',
                'status'         => 'Finished',
                'season_year'    => 2026,
            ],
            [
                'round_number'   => 8,
                'grand_prix_name'=> 'Monaco Grand Prix',
                'circuit_name'   => 'Circuit de Monaco',
                'country'        => 'Monaco',
                'country_code'   => 'MCO',
                'practice1_date' => '2026-05-21 13:30:00',
                'qualifying_date'=> '2026-05-23 15:00:00',
                'race_date'      => '2026-07-20 14:00:00',
                'status'         => 'Upcoming',
                'season_year'    => 2026,
            ],
            [
                'round_number'   => 11,
                'grand_prix_name'=> 'British Grand Prix',
                'circuit_name'   => 'Silverstone Circuit',
                'country'        => 'United Kingdom',
                'country_code'   => 'GBR',
                'practice1_date' => '2026-07-02 12:00:00',
                'qualifying_date'=> '2026-07-03 15:00:00',
                'race_date'      => '2026-08-07 14:00:00',
                'status'         => 'Upcoming',
                'season_year'    => 2026,
            ],
            [
                'round_number'   => 14,
                'grand_prix_name'=> 'Belgian Grand Prix',
                'circuit_name'   => 'Circuit de Spa-Francorchamps',
                'country'        => 'Belgium',
                'country_code'   => 'BEL',
                'practice1_date' => '2026-07-23 12:00:00',
                'qualifying_date'=> '2026-07-24 15:00:00',
                'race_date'      => '2026-09-06 13:00:00',
                'status'         => 'Upcoming',
                'season_year'    => 2026,
            ],
            [
                'round_number'   => 17,
                'grand_prix_name'=> 'Singapore Grand Prix',
                'circuit_name'   => 'Marina Bay Street Circuit',
                'country'        => 'Singapore',
                'country_code'   => 'SGP',
                'practice1_date' => '2026-09-17 17:30:00',
                'qualifying_date'=> '2026-09-18 21:00:00',
                'race_date'      => '2026-10-04 20:00:00',
                'status'         => 'Upcoming',
                'season_year'    => 2026,
            ],
            [
                'round_number'   => 18,
                'grand_prix_name'=> 'Japanese Grand Prix',
                'circuit_name'   => 'Suzuka International Racing Course',
                'country'        => 'Japan',
                'country_code'   => 'JPN',
                'practice1_date' => '2026-10-01 12:30:00',
                'qualifying_date'=> '2026-10-02 15:00:00',
                'race_date'      => '2026-10-18 13:00:00',
                'status'         => 'Upcoming',
                'season_year'    => 2026,
            ],
            [
                'round_number'   => 20,
                'grand_prix_name'=> 'United States Grand Prix',
                'circuit_name'   => 'Circuit of the Americas',
                'country'        => 'United States',
                'country_code'   => 'USA',
                'practice1_date' => '2026-10-22 20:00:00',
                'qualifying_date'=> '2026-10-23 22:00:00',
                'race_date'      => '2026-11-01 19:00:00',
                'status'         => 'Upcoming',
                'season_year'    => 2026,
            ],
            [
                'round_number'   => 22,
                'grand_prix_name'=> 'Abu Dhabi Grand Prix',
                'circuit_name'   => 'Yas Marina Circuit',
                'country'        => 'United Arab Emirates',
                'country_code'   => 'UAE',
                'practice1_date' => '2026-11-27 10:00:00',
                'qualifying_date'=> '2026-11-28 14:00:00',
                'race_date'      => '2026-11-29 13:00:00',
                'status'         => 'Upcoming',
                'season_year'    => 2026,
            ],
        ];

        foreach ($races as $race) {
            RaceSchedule::updateOrCreate(
                [
                    'grand_prix_name' => $race['grand_prix_name'],
                    'season_year'     => $race['season_year'],
                ],
                $race
            );
        }

        $this->command->info('✅ Rey Gilang Racing data seeded successfully!');
        $this->command->info('   → Team: Rey Gilang Racing');
        $this->command->info('   → Car: RGR-26 E Performance (1050 HP)');
        $this->command->info('   → Drivers: Enzo Valentini (#8), Kael Adriansen (#17)');
        $this->command->info('   → Race Schedules: ' . count($races) . ' rounds seeded');
    }
}
