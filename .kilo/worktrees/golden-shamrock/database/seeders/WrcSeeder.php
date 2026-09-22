<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Team;

class WrcSeeder extends Seeder
{
    public function run(): void
    {
        $team = Team::first();
        $teamId = $team ? $team->id : 1;

        // 1. Add Toyota Gazoo Racing Sponsor
        Sponsor::updateOrCreate(
            ['name' => 'Toyota Gazoo Racing'],
            [
                'team_id'     => $teamId,
                'tier'        => 'Technical Partner',
                'website_url' => 'https://toyotagazooracing.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=120&q=80',
                'description' => 'Penyedia resmi mobil balap Toyota GR Yaris Rally1 Hybrid divisi WRC.',
                'sort_order'  => 17,
            ]
        );

        // 2. Add WRC Car (Category: WRC)
        Car::where('category', 'WRC')->delete();

        Car::create([
            'team_id' => $teamId,
            'category' => 'WRC',
            'car_number' => 69,
            'model_name' => 'Toyota GR Yaris Rally1 Hybrid',
            'power_unit' => '1.6L Direct Injection Turbo + 100kW Electric Motor',
            'chassis' => 'Spaceframe Steel & Carbon Composite',
            'weight' => 1260,
            'top_speed' => 201, // Rally cars are geared for acceleration
            'power_hp' => 500,  // combined with hybrid boost
            'season_year' => 2026,
            'aerodynamics_desc' => 'Paket aero downforce tinggi untuk melibas gundukan ekstrem dan jalur licin.',
            'championship' => 'FIA World Rally Championship',
            'class_entry' => 'Rally1 Class',
            'fuel_capacity' => 60,
            'tyre_supplier' => 'Pirelli',
            'livery_sponsor' => 'Toyota Gazoo Racing'
        ]);

        // 3. Add 2 WRC Drivers (Category: WRC)
        Driver::where('role', 'Pembalap Utama WRC')->delete();

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Kalle Rovanperä',
            'permanent_number' => 69,
            'country' => 'Finlandia',
            'country_code' => 'FIN',
            'podiums' => 24,
            'career_points' => 980,
            'world_championships' => 2,
            'bio' => 'Juara dunia WRC termuda sepanjang sejarah, spesialis meluncur ekstrem di lintasan salju dan kerikil kasar.',
            'role' => 'Pembalap Utama WRC',
            'category' => 'WRC',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Sébastien Ogier',
            'permanent_number' => 17,
            'country' => 'Prancis',
            'country_code' => 'FRA',
            'podiums' => 98,
            'career_points' => 2750,
            'world_championships' => 8,
            'bio' => 'Legenda hidup reli dunia dengan 8 gelar juara dunia WRC, membawa taktik presisi tinggi ke kubu RGR.',
            'role' => 'Pembalap Utama WRC',
            'category' => 'WRC',
            'active' => true,
        ]);
    }
}
