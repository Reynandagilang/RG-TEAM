<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Team;
use Illuminate\Database\Seeder;

class EwcFeSeeder extends Seeder
{
    public function run(): void
    {
        $team = Team::first();
        $teamId = $team?->id ?? 1;

        // Seed EWC riders
        Driver::updateOrCreate(
            ['team_id' => $teamId, 'name' => 'Niccolò Canepa'],
            [
                'permanent_number'    => 7,
                'country'             => 'Italy',
                'country_code'        => 'ITA',
                'podiums'             => 28,
                'career_points'       => 780.00,
                'world_championships' => 2,
                'category'            => 'EWC',
                'role'                => 'Race Rider',
                'helmet_color'        => '#00E5FF',
                'active'              => true,
                'bio'                 => 'Niccolò Canepa adalah pembalap motor ketahanan asal Italia dengan presisi cornering ekstrem dan pengalaman juara dunia FIM EWC ganda.',
            ]
        );

        Driver::updateOrCreate(
            ['team_id' => $teamId, 'name' => 'Marvin Fritz'],
            [
                'permanent_number'    => 7,
                'country'             => 'Germany',
                'country_code'        => 'DEU',
                'podiums'             => 19,
                'career_points'       => 540.00,
                'world_championships' => 1,
                'category'            => 'EWC',
                'role'                => 'Race Rider',
                'helmet_color'        => '#FFEB3B',
                'active'              => true,
                'bio'                 => 'Marvin Fritz adalah pembalap Jerman tangguh dengan fokus ritme lap yang sangat konsisten di balapan malam hari 24 jam.',
            ]
        );

        Driver::updateOrCreate(
            ['team_id' => $teamId, 'name' => 'Karel Hanika'],
            [
                'permanent_number'    => 7,
                'country'             => 'Czech Republic',
                'country_code'        => 'CZE',
                'podiums'             => 14,
                'career_points'       => 420.00,
                'world_championships' => 0,
                'category'            => 'EWC',
                'role'                => 'Race Rider',
                'helmet_color'        => '#E040FB',
                'active'              => true,
                'bio'                 => 'Karel Hanika adalah mantan bintang Moto3 asal Ceko yang terkenal dengan kecepatan satu putaran kualifikasi kilat di kejuaraan ketahanan motor.',
            ]
        );

        // Seed Formula E driver
        Driver::updateOrCreate(
            ['team_id' => $teamId, 'name' => 'Oliver Rowland'],
            [
                'permanent_number'    => 22,
                'country'             => 'United Kingdom',
                'country_code'        => 'GBR',
                'podiums'             => 12,
                'career_points'       => 390.00,
                'world_championships' => 0,
                'category'            => 'FormulaE',
                'role'                => 'Race Driver',
                'helmet_color'        => '#03A9F4',
                'active'              => true,
                'bio'                 => 'Oliver Rowland adalah bintang sirkuit jalanan Formula E asal Inggris dengan insting agresif dan taktik manajemen energi yang super efisien.',
            ]
        );

        // Seed Yamaha YZF-R1
        Car::updateOrCreate(
            ['team_id' => $teamId, 'car_number' => 7, 'category' => 'EWC'],
            [
                'model_name'       => 'Yamaha YZF-R1 EWC-Spec',
                'power_unit'       => 'Yamaha 998cc CP4 Inline-4 Engine',
                'chassis'          => 'Aluminium Deltabox Frame',
                'weight'           => 168.00,
                'top_speed'        => 315,
                'power_hp'         => 220,
                'season_year'      => 2026,
                'championship'     => 'FIM Endurance World Championship',
                'class_entry'      => 'Formula EWC',
                'fuel_capacity'    => 24.0,
                'tyre_supplier'    => 'Bridgestone',
                'livery_sponsor'   => 'Yamaha Racing',
                'aerodynamics_desc'=> 'Lightweight Carbon Fiber Fairings with winglets to maximize front axle downforce and optimize stability at high speeds.',
            ]
        );

        // Seed FE Gen3 Nismo
        Car::updateOrCreate(
            ['team_id' => $teamId, 'car_number' => 22, 'category' => 'FormulaE'],
            [
                'model_name'       => 'M1TRG Nissan FE Gen3',
                'power_unit'       => 'Nissan e-4ORCE Powertrain',
                'chassis'          => 'Carbon Fiber Monocoque Gen3',
                'weight'           => 840.00,
                'top_speed'        => 322,
                'power_hp'         => 470,
                'season_year'      => 2026,
                'championship'     => 'ABB FIA Formula E World Championship',
                'class_entry'      => 'Gen3',
                'fuel_capacity'    => 0.0,
                'tyre_supplier'    => 'Hankook',
                'livery_sponsor'   => 'Nissan Nismo',
                'aerodynamics_desc'=> 'Minimal drag Gen3 open-wheel aerodynamic profile designed for tight street circuits. Energy regeneration efficiency exceeds 40%.',
            ]
        );
    }
}
