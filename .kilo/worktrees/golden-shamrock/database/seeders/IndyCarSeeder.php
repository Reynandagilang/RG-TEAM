<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Team;

class IndyCarSeeder extends Seeder
{
    public function run(): void
    {
        $team = Team::first();
        $teamId = $team ? $team->id : 1;

        // 1. Add McLaren Racing Sponsor
        Sponsor::updateOrCreate(
            ['name' => 'McLaren Racing'],
            [
                'team_id'     => $teamId,
                'tier'        => 'Technical Partner',
                'website_url' => 'https://www.mclaren.com/racing',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=120&q=80',
                'description' => 'Produsen legendaris F1 penyedia sasis dan dukungan sasis Arrow McLaren IndyCar.',
                'sort_order'  => 16,
            ]
        );

        // 2. Add 3 IndyCar Cars (Category: IndyCar)
        Car::where('category', 'IndyCar')->delete();

        Car::create([
            'team_id' => $teamId,
            'category' => 'IndyCar',
            'car_number' => 5,
            'model_name' => 'Dallara IR-18 Arrow McLaren',
            'power_unit' => 'Chevrolet 2.2L Twin-Turbo V6 (Hybrid)',
            'chassis' => 'Dallara IR-18 Carbon Fiber',
            'weight' => 735,
            'top_speed' => 380,
            'power_hp' => 700,
            'season_year' => 2026,
            'aerodynamics_desc' => 'Paket aerodinamika speedway khusus untuk balapan oval Indianapolis 500.',
            'championship' => 'NTT IndyCar Series',
            'class_entry' => 'IndyCar Class',
            'fuel_capacity' => 70,
            'tyre_supplier' => 'Firestone',
            'livery_sponsor' => 'McLaren Racing'
        ]);

        Car::create([
            'team_id' => $teamId,
            'category' => 'IndyCar',
            'car_number' => 6,
            'model_name' => 'Dallara IR-18 Arrow McLaren',
            'power_unit' => 'Chevrolet 2.2L Twin-Turbo V6 (Hybrid)',
            'chassis' => 'Dallara IR-18 Carbon Fiber',
            'weight' => 735,
            'top_speed' => 380,
            'power_hp' => 700,
            'season_year' => 2026,
            'aerodynamics_desc' => 'Paket aerodinamika road course untuk sirkuit jalan raya standar.',
            'championship' => 'NTT IndyCar Series',
            'class_entry' => 'IndyCar Class',
            'fuel_capacity' => 70,
            'tyre_supplier' => 'Firestone',
            'livery_sponsor' => 'McLaren Racing'
        ]);

        Car::create([
            'team_id' => $teamId,
            'category' => 'IndyCar',
            'car_number' => 7,
            'model_name' => 'Dallara IR-18 Arrow McLaren',
            'power_unit' => 'Chevrolet 2.2L Twin-Turbo V6 (Hybrid)',
            'chassis' => 'Dallara IR-18 Carbon Fiber',
            'weight' => 735,
            'top_speed' => 380,
            'power_hp' => 700,
            'season_year' => 2026,
            'aerodynamics_desc' => 'Paket aerodinamika road course untuk sirkuit jalan raya standar.',
            'championship' => 'NTT IndyCar Series',
            'class_entry' => 'IndyCar Class',
            'fuel_capacity' => 70,
            'tyre_supplier' => 'Firestone',
            'livery_sponsor' => 'McLaren Racing'
        ]);

        // 3. Add 3 IndyCar Drivers (Category: IndyCar)
        Driver::where('role', 'Pembalap Utama IndyCar')->delete();

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Pato O\'Ward',
            'permanent_number' => 5,
            'country' => 'Meksiko',
            'country_code' => 'MEX',
            'podiums' => 21,
            'career_points' => 1950,
            'world_championships' => 0,
            'bio' => 'Bintang balap asal Meksiko dengan gaya balap yang sangat eksplosif dan agresif di sirkuit oval.',
            'role' => 'Pembalap Utama IndyCar',
            'category' => 'IndyCar',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Nolan Siegel',
            'permanent_number' => 6,
            'country' => 'Amerika Serikat',
            'country_code' => 'USA',
            'podiums' => 2,
            'career_points' => 320,
            'world_championships' => 0,
            'bio' => 'Bakat muda berbakat asal Amerika Serikat yang dipromosikan ke jajaran utama Arrow McLaren.',
            'role' => 'Pembalap Utama IndyCar',
            'category' => 'IndyCar',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Alexander Rossi',
            'permanent_number' => 7,
            'country' => 'Amerika Serikat',
            'country_code' => 'USA',
            'podiums' => 28,
            'career_points' => 2840,
            'world_championships' => 1, // Indy 500 winner counts as world championship level in US
            'bio' => 'Juara legendaris Indianapolis 500 dan mantan pembalap Formula 1 dengan segudang taktik sirkuit jalan raya.',
            'role' => 'Pembalap Utama IndyCar',
            'category' => 'IndyCar',
            'active' => true,
        ]);
    }
}
