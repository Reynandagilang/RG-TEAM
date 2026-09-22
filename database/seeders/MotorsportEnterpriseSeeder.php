<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotorsportEnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \App\Models\FreightItem::truncate();
        \App\Models\LogisticsShipment::truncate();
        \App\Models\SponsorExposure::truncate();
        \App\Models\FinancialCostCap::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        // 1. FIA Cost Cap Data (2026 Season Budget: ~$135M Base)
        $costCaps = [
            [
                'season_year' => 2026,
                'category' => 'Aerodynamics R&D & Wind Tunnel',
                'budget_limit_usd' => 28500000.00,
                'actual_spent_usd' => 19400000.00,
                'committed_usd' => 4500000.00,
                'compliance_status' => 'compliant',
                'notes' => 'Within 400 ATR wind tunnel testing quota hours compliant under FIA Annex 8.',
            ],
            [
                'season_year' => 2026,
                'category' => 'Chassis & Composites Manufacturing',
                'budget_limit_usd' => 34000000.00,
                'actual_spent_usd' => 24800000.00,
                'committed_usd' => 6200000.00,
                'compliance_status' => 'compliant',
                'notes' => 'Chassis #01 (AG-26X) and #02 production completed. Spare monocoque #03 in autoclave cycle.',
            ],
            [
                'season_year' => 2026,
                'category' => 'Trackside Operations & Race Engineering',
                'budget_limit_usd' => 38000000.00,
                'actual_spent_usd' => 27950000.00,
                'committed_usd' => 7100000.00,
                'compliance_status' => 'compliant',
                'notes' => 'Includes 24 Grand Prix paddock personnel hospitality, garage telemetry infrastructure, and freight overhead.',
            ],
            [
                'season_year' => 2026,
                'category' => 'Component Fatigue & Crash Damage Pool',
                'budget_limit_usd' => 16500000.00,
                'actual_spent_usd' => 9100000.00,
                'committed_usd' => 2300000.00,
                'compliance_status' => 'compliant',
                'notes' => 'Covers sprint race wing replacements and gearbox casing stress replacements.',
            ],
            [
                'season_year' => 2026,
                'category' => 'Regulatory Exclusions (Driver Salaries & Marketing)',
                'budget_limit_usd' => 45000000.00,
                'actual_spent_usd' => 32000000.00,
                'committed_usd' => 10000000.00,
                'compliance_status' => 'compliant',
                'notes' => 'Excluded from FIA Cap: Top 3 highest paid staff, Driver contracts (A. Silva & K. Tanaka), and brand activations.',
            ],
        ];

        foreach ($costCaps as $cap) {
            \App\Models\FinancialCostCap::create($cap);
        }

        // 2. Sponsor Exposure & Media Valuation Data
        \App\Models\SponsorExposure::truncate();
        $exposures = [
            [
                'brand_name' => 'Mobil 1',
                'event_name' => 'Monaco Grand Prix',
                'car_placement' => 'Front Wing Endplate & Engine Cover',
                'screen_time_seconds' => 842,
                'broadcast_impressions' => 68400000,
                'media_value_usd' => 4250000.00,
                'roi_percentage' => 324.50,
            ],
            [
                'brand_name' => 'Tag Heuer',
                'event_name' => 'Monaco Grand Prix',
                'car_placement' => 'Cockpit Halo & Steering Display',
                'screen_time_seconds' => 615,
                'broadcast_impressions' => 49200000,
                'media_value_usd' => 2890000.00,
                'roi_percentage' => 275.20,
            ],
            [
                'brand_name' => 'Pirelli Motorsport',
                'event_name' => 'Silverstone GP',
                'car_placement' => 'Wheel Rim Deflector & Bargeboard',
                'screen_time_seconds' => 490,
                'broadcast_impressions' => 41100000,
                'media_value_usd' => 1950000.00,
                'roi_percentage' => 210.00,
            ],
            [
                'brand_name' => 'Mobil 1',
                'event_name' => 'Spa-Francorchamps 24H',
                'car_placement' => 'Rear Wing & Sidepod Louvres',
                'screen_time_seconds' => 1240,
                'broadcast_impressions' => 82000000,
                'media_value_usd' => 5600000.00,
                'roi_percentage' => 410.80,
            ],
            [
                'brand_name' => 'AWS Cloud Analytics',
                'event_name' => 'Suzuka Grand Prix',
                'car_placement' => 'Rear Wing DR Flap & Pit-Wall Banner',
                'screen_time_seconds' => 520,
                'broadcast_impressions' => 39500000,
                'media_value_usd' => 2100000.00,
                'roi_percentage' => 245.00,
            ],
        ];

        foreach ($exposures as $exp) {
            \App\Models\SponsorExposure::create($exp);
        }

        // 3. Logistics Shipments & Critical Freight Tracking
        \App\Models\FreightItem::query()->delete();
        \App\Models\LogisticsShipment::query()->delete();

        $shipment1 = \App\Models\LogisticsShipment::create([
            'tracking_code' => 'RG-AIR-777F-091',
            'transport_mode' => 'Air Freight (Boeing 777F Charter)',
            'origin' => 'Silverstone HQ Tech Campus, UK',
            'destination_circuit' => 'Marina Bay Street Circuit, Singapore',
            'departure_time' => now()->subHours(14),
            'estimated_arrival' => now()->addHours(6),
            'status' => 'in_transit',
            'progress_percent' => 72,
            'vessel_or_flight_number' => 'QR-F1-8842X',
        ]);

        $shipment1->items()->createMany([
            [
                'item_name' => 'Antigravity V6 Hybrid ICE Power Unit #04',
                'category' => 'Power Unit',
                'serial_number' => 'AG-PU-2026-004',
                'quantity' => 2,
                'weight_kg' => 310.00,
                'is_hazardous_lithium' => false,
            ],
            [
                'item_name' => 'Energy Storage System (ESS 400V Battery)',
                'category' => 'Battery / ERS',
                'serial_number' => 'AG-ESS-LITH-992',
                'quantity' => 2,
                'weight_kg' => 95.00,
                'is_hazardous_lithium' => true,
            ],
            [
                'item_name' => 'Low-Downforce Carbon Front Wing Assembly',
                'category' => 'Aero Wing',
                'serial_number' => 'AG-FW-SPEC-D',
                'quantity' => 4,
                'weight_kg' => 48.00,
                'is_hazardous_lithium' => false,
            ],
        ]);

        $shipment2 = \App\Models\LogisticsShipment::create([
            'tracking_code' => 'RG-SEA-40HC-018',
            'transport_mode' => 'Maritime Cargo (40ft High-Cube Containers)',
            'origin' => 'Port of Southampton, UK',
            'destination_circuit' => 'Suzuka Circuit (via Nagoya Port), Japan',
            'departure_time' => now()->subDays(18),
            'estimated_arrival' => now()->addDays(5),
            'status' => 'customs_cleared',
            'progress_percent' => 88,
            'vessel_or_flight_number' => 'ONE-OLYMPUS-V044',
        ]);

        $shipment2->items()->createMany([
            [
                'item_name' => 'Motorhome Hospitality Modules & Kitchen Unit',
                'category' => 'Garage Equipment',
                'serial_number' => 'MHM-RG-2026-A',
                'quantity' => 6,
                'weight_kg' => 8500.00,
                'is_hazardous_lithium' => false,
            ],
            [
                'item_name' => 'Hydraulic Pit Stop Gantry & Wheel Guns',
                'category' => 'Pit Equipment',
                'serial_number' => 'PIT-GANTRY-PA-12',
                'quantity' => 4,
                'weight_kg' => 1200.00,
                'is_hazardous_lithium' => false,
            ],
        ]);

        $shipment3 = \App\Models\LogisticsShipment::create([
            'tracking_code' => 'RG-ROAD-EUR-104',
            'transport_mode' => 'Road Haulier Fleet (Mercedes Actros Euro 6)',
            'origin' => 'Maranello Aerodynamics Lab, Italy',
            'destination_circuit' => 'Circuit de Spa-Francorchamps, Belgium',
            'departure_time' => now()->subHours(8),
            'estimated_arrival' => now()->addHours(3),
            'status' => 'in_transit',
            'progress_percent' => 82,
            'vessel_or_flight_number' => 'TRUCK-FLEET-07-RG',
        ]);

        $shipment3->items()->createMany([
            [
                'item_name' => 'Chassis Monocoque Monolithic Cell #03',
                'category' => 'Chassis',
                'serial_number' => 'AG-CH-26-03',
                'quantity' => 1,
                'weight_kg' => 798.00,
                'is_hazardous_lithium' => false,
            ],
            [
                'item_name' => 'Pit Wall Telemetry Server & Satellite Rig',
                'category' => 'Telemetry Rig',
                'serial_number' => 'TEL-SRV-DUAL-XEON',
                'quantity' => 3,
                'weight_kg' => 340.00,
                'is_hazardous_lithium' => false,
            ],
        ]);
    }
}
