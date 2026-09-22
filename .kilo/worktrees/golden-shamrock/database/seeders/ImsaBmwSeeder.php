<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Team;

class ImsaBmwSeeder extends Seeder
{
    public function run(): void
    {
        $team = Team::first();
        $teamId = $team ? $team->id : 1;

        // 1. Add BMW M Sponsor
        Sponsor::updateOrCreate(
            ['name' => 'BMW M'],
            [
                'team_id'     => $teamId,
                'tier'        => 'Technical Partner',
                'website_url' => 'https://www.bmw-m.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=120&q=80',
                'description' => 'Penyedia resmi mobil purwarupa BMW M Hybrid V8 divisi GTP.',
                'sort_order'  => 15,
            ]
        );

        // 2. Add 2 BMW M Hybrid V8 cars (Category: GTP)
        Car::where('category', 'GTP')->delete();

        Car::create([
            'team_id' => $teamId,
            'category' => 'GTP',
            'car_number' => 24,
            'model_name' => 'BMW M Hybrid V8',
            'power_unit' => 'P66/3 4.0L Twin-Turbo V8 Hybrid',
            'chassis' => 'Dallara Carbon Monocoque',
            'weight' => 1030,
            'top_speed' => 345,
            'power_hp' => 680,
            'season_year' => 2026,
            'aerodynamics_desc' => 'Desain sasis purwarupa regulasi LMDh dengan downforce dinamis tinggi.',
            'championship' => 'IMSA WeatherTech SportsCar Championship',
            'class_entry' => 'GTP Class',
            'fuel_capacity' => 75,
            'tyre_supplier' => 'Michelin',
            'livery_sponsor' => 'BMW M'
        ]);

        Car::create([
            'team_id' => $teamId,
            'category' => 'GTP',
            'car_number' => 25,
            'model_name' => 'BMW M Hybrid V8',
            'power_unit' => 'P66/3 4.0L Twin-Turbo V8 Hybrid',
            'chassis' => 'Dallara Carbon Monocoque',
            'weight' => 1030,
            'top_speed' => 345,
            'power_hp' => 680,
            'season_year' => 2026,
            'aerodynamics_desc' => 'Desain sasis purwarupa regulasi LMDh dengan downforce dinamis tinggi.',
            'championship' => 'IMSA WeatherTech SportsCar Championship',
            'class_entry' => 'GTP Class',
            'fuel_capacity' => 75,
            'tyre_supplier' => 'Michelin',
            'livery_sponsor' => 'BMW M'
        ]);

        // 3. Add 4 IMSA drivers (Category: IMSA so they appear in a dedicated IMSA tab)
        Driver::where('role', 'Pembalap Utama IMSA')->delete();

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Connor De Phillippi',
            'permanent_number' => 25,
            'country' => 'Amerika Serikat',
            'country_code' => 'USA',
            'podiums' => 12,
            'career_points' => 380,
            'world_championships' => 0,
            'bio' => 'Pembalap utama tim IMSA RGR, dikenal memiliki kecepatan konsisten di trek jalanan Amerika.',
            'role' => 'Pembalap Utama IMSA',
            'category' => 'IMSA',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Nick Yelloly',
            'permanent_number' => 26,
            'country' => 'Inggris',
            'country_code' => 'GBR',
            'podiums' => 8,
            'career_points' => 290,
            'world_championships' => 0,
            'bio' => 'Pembalap kawakan asal Inggris dengan jam terbang tinggi di balap ketahanan Eropa dan Amerika.',
            'role' => 'Pembalap Utama IMSA',
            'category' => 'IMSA',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Philipp Eng',
            'permanent_number' => 24,
            'country' => 'Austria',
            'country_code' => 'AUT',
            'podiums' => 10,
            'career_points' => 310,
            'world_championships' => 1,
            'bio' => 'Spesialis mobil sport kelas utama, Philipp membawa taktik manajemen ban Michelin yang sangat andal.',
            'role' => 'Pembalap Utama IMSA',
            'category' => 'IMSA',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Jesse Krohn',
            'permanent_number' => 27,
            'country' => 'Finlandia',
            'country_code' => 'FIN',
            'podiums' => 6,
            'career_points' => 190,
            'world_championships' => 0,
            'bio' => 'Dikenal dengan julukan Flying Finn di kancah sportscar, andalan RGR di kondisi lintasan licin.',
            'role' => 'Pembalap Utama IMSA',
            'category' => 'IMSA',
            'active' => true,
        ]);
    }
}
