<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Car;
use App\Models\Driver;
use App\Models\EnduranceRace;
use App\Models\RaceSchedule;
use App\Models\Sponsor;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RgrCompleteSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🏎  Seeding RG Racing complete dataset...');

        // ── 1. TEAM ──────────────────────────────────────────────
        $team = Team::updateOrCreate(
            ['name' => 'Mobil 1 Team RG'],
            [
                'principal'           => 'Rey Gilang',
                'base_location'       => 'Jakarta, Indonesia',
                'constructors_titles' => 4,
                'drivers_titles'      => 2,
                'founded_year'        => '2018',
                'tagline'             => 'Ultimate Speed. Gold Standard.',
                'team_color'          => '#FF002E',
                'overview_text'       => 'Mobil 1 Team RG lahir dari semangat kemandirian tim privat (privateer) yang menolak untuk menjadi pelengkap di garis start. Kami hadir dengan identitas Hitam yang melambangkan ketangguhan manajemen dan kekuatan mekanik murni di dalam garasi. Setiap inci lintasan kami lalui dengan target tunggal: podium tertinggi, yang kami visualisasikan lewat guratan warna Emas premium pada bodi kendaraan. Didukung oleh performa pelumas dunia, warna Merah ikonik pada angka \'1\' bukan sekadar logo, melainkan simbol dari api ambisi kami yang haus akan kejuaraan. Kami tidak hanya ikut membalap; kami hadir untuk menetapkan standar baru di lintasan.',
            ]
        );

        $this->command->info('   ✅ Team: RG Racing');

        // ── 2. SPONSORS (Banyak Sponsor untuk Kesan Premium Padat) ────────────────
        $sponsors = [
            // Tier 1: Sektor Keuangan & Korporasi Raksasa (Anggaran Utama)
            [
                'name'        => 'Bank Mandiri (Livin’ by Mandiri)',
                'tier'        => 'Title Sponsor',
                'website_url' => 'https://bankmandiri.co.id',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=120&q=80',
                'description' => 'Aplikasi digital modern dengan logo minimalis emas murni.',
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Bank BCA (BCA Mobile)',
                'tier'        => 'Title Sponsor',
                'website_url' => 'https://bca.co.id',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=120&q=80',
                'description' => 'Raksasa perbankan nasional dengan jangkauan pasar premium.',
                'sort_order'  => 2,
            ],
            [
                'name'        => 'Telkomsel Flash',
                'tier'        => 'Title Sponsor',
                'website_url' => 'https://telkomsel.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=120&q=80',
                'description' => 'Kecepatan tinggi konektivitas selaras dengan dunia balap.',
                'sort_order'  => 3,
            ],
            [
                'name'        => 'Pertamina Lubricants',
                'tier'        => 'Title Sponsor',
                'website_url' => 'https://pertaminalubricants.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=120&q=80',
                'description' => 'Kemitraan strategis co-branding regional presisi tinggi.',
                'sort_order'  => 4,
            ],

            // Tier 2: Sektor Gaya Hidup, Otomotif Premium & Komponen Teknis
            [
                'name'        => 'G-Shock (Casio)',
                'tier'        => 'Technical Partner',
                'website_url' => 'https://gshock.casio.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005198143-e5283b519a7f?auto=format&fit=crop&w=120&q=80',
                'description' => 'Ketangguhan mutlak (Absolute Toughness) di segala kondisi.',
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Pirelli Indonesia',
                'tier'        => 'Technical Partner',
                'website_url' => 'https://pirelli.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005198143-e5283b519a7f?auto=format&fit=crop&w=120&q=80',
                'description' => 'Penyuplai ban elit dunia untuk cengkeraman lintasan terbaik.',
                'sort_order'  => 2,
            ],
            [
                'name'        => 'Ohlins Indonesia',
                'tier'        => 'Technical Partner',
                'website_url' => 'https://ohlins.co.id',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005198143-e5283b519a7f?auto=format&fit=crop&w=120&q=80',
                'description' => 'Sistem suspensi premium berwarna emas ikonik.',
                'sort_order'  => 3,
            ],
            [
                'name'        => 'Brembo',
                'tier'        => 'Technical Partner',
                'website_url' => 'https://brembo.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005198143-e5283b519a7f?auto=format&fit=crop&w=120&q=80',
                'description' => 'Sistem pengereman performa tinggi terpercaya.',
                'sort_order'  => 4,
            ],
            [
                'name'        => 'Akrapovič',
                'tier'        => 'Technical Partner',
                'website_url' => 'https://akrapovic.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1618005198143-e5283b519a7f?auto=format&fit=crop&w=120&q=80',
                'description' => 'Sistem knalpot premium bertenaga gahar.',
                'sort_order'  => 5,
            ],
            [
                'name'        => 'Puma Motorsport',
                'tier'        => 'Official Supplier',
                'website_url' => 'https://puma.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1614741118887-7a4ee193a5fa?auto=format&fit=crop&w=120&q=80',
                'description' => 'Penyuplai seragam apparel balap modis dan sepatu taktis.',
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Oakley Indonesia',
                'tier'        => 'Official Supplier',
                'website_url' => 'https://oakley.com',
                'logo_url'    => 'https://images.unsplash.com/photo-1614741118887-7a4ee193a5fa?auto=format&fit=crop&w=120&q=80',
                'description' => 'Kacamata dan perlengkapan taktis premium luar trek.',
                'sort_order'  => 2,
            ],
        ];

        foreach ($sponsors as $sp) {
            Sponsor::updateOrCreate(
                ['team_id' => $team->id, 'name' => $sp['name']],
                array_merge($sp, ['team_id' => $team->id, 'active' => true])
            );
        }

        $this->command->info('   ✅ Banyak Sponsors Telah Dimasukkan (Total: '.count($sponsors).' Mitra)');

        // ── 3. DRIVERS ───────────────────────────────────────────
        $drivers = [
            // Kategori F1 (2 Driver)
            [
                'permanent_number'    => 1,
                'name'                => 'Max Verstappen',
                'country'             => 'Netherlands',
                'country_code'        => 'NLD',
                'podiums'             => 98,
                'career_points'       => 2586.50,
                'world_championships' => 3,
                'category'            => 'F1',
                'role'                => 'Race Driver',
                'helmet_color'        => '#FF6D00',
                'active'              => true,
                'bio'                 => 'Max Verstappen dikenal dengan gaya balapnya yang sangat agresif, klinis, dan tanpa kompromi. Pembalap asal Belanda ini bergabung dengan RGR untuk mempertahankan takhta kejuaraan dunia.',
            ],
            [
                'permanent_number'    => 44,
                'name'                => 'George Russel',
                'country'             => 'United Kingdom',
                'country_code'        => 'GBR',
                'podiums'             => 11,
                'career_points'       => 480.00,
                'world_championships' => 0,
                'category'            => 'F1',
                'role'                => 'Race Driver',
                'helmet_color'        => '#FFFFFF',
                'active'              => true,
                'bio'                 => 'George Russel adalah talenta F1 asal Inggris Raya dengan presisi balap kualifikasi luar biasa dan konsistensi tinggi di setiap tikungan.',
            ],

            // Kategori 24h Le Mans (3 Driver dalam 1 Mobil Hybrid)
            [
                'permanent_number'    => 11,
                'name'                => 'Sébastien Bourdais',
                'country'             => 'France',
                'country_code'        => 'FRA',
                'podiums'             => 8,
                'career_points'       => 110.00,
                'world_championships' => 4,
                'category'            => 'LeMans',
                'role'                => 'Race Driver',
                'helmet_color'        => '#00C853',
                'active'              => true,
                'bio'                 => 'Sébastien Bourdais adalah legenda balap asal Prancis dengan segudang pengalaman di ajang Formula 1, IndyCar, dan balap ketahanan prototipe kelas dunia.',
            ],
            [
                'permanent_number'    => 11,
                'name'                => 'Darren Leung',
                'country'             => 'United Kingdom',
                'country_code'        => 'GBR',
                'podiums'             => 2,
                'career_points'       => 35.00,
                'world_championships' => 0,
                'category'            => 'LeMans',
                'role'                => 'Race Driver',
                'helmet_color'        => '#E8421C',
                'active'              => true,
                'bio'                 => 'Darren Leung adalah pembalap GT andalan Inggris Raya dengan pemahaman lintasan ketahanan basah yang sangat solid.',
            ],
            [
                'permanent_number'    => 1,
                'name'                => 'Sean Gelael',
                'country'             => 'Indonesia',
                'country_code'        => 'IDN',
                'podiums'             => 15,
                'career_points'       => 280.00,
                'world_championships' => 0,
                'category'            => 'LeMans',
                'role'                => 'Race Driver',
                'helmet_color'        => '#FF002E',
                'active'              => true,
                'bio'                 => 'Sean Gelael adalah pahlawan motorsport Indonesia di balap ketahanan dunia FIA WEC, peraih podium legendaris di Le Mans 24 Jam.',
            ],

            // Kategori 24h Spa (3 Driver dalam 1 Mobil Hypercar)
            [
                'permanent_number'    => 2,
                'name'                => 'Sean Gelael ', // Sedikit spasi di nama untuk membedakan entri duplikat pada nama di updateOrCreate team_id + name
                'country'             => 'Indonesia',
                'country_code'        => 'IDN',
                'podiums'             => 15,
                'career_points'       => 280.00,
                'world_championships' => 0,
                'category'            => 'Spa',
                'role'                => 'Race Driver',
                'helmet_color'        => '#FF002E',
                'active'              => true,
                'bio'                 => 'Sean Gelael juga memimpin skuad RG Racing untuk ajang prestisius 24 Hours of Spa dengan daya tahan stint yang sangat tinggi.',
            ],
            [
                'permanent_number'    => 46,
                'name'                => 'Valentino Rossi',
                'country'             => 'Italy',
                'country_code'        => 'ITA',
                'podiums'             => 5,
                'career_points'       => 90.00,
                'world_championships' => 9, // MotoGP titles
                'category'            => 'Spa',
                'role'                => 'Race Driver',
                'helmet_color'        => '#AA00FF',
                'active'              => true,
                'bio'                 => 'Sang "The Doctor" legenda balap motor dunia MotoGP yang kini sukses bertransisi penuh ke balap mobil ketahanan kelas dunia GT3 bersama RG Racing.',
            ],
            [
                'permanent_number'    => 7,
                'name'                => 'Charles Weerts',
                'country'             => 'Belgium',
                'country_code'        => 'BEL',
                'podiums'             => 10,
                'career_points'       => 180.00,
                'world_championships' => 0,
                'category'            => 'Spa',
                'role'                => 'Race Driver',
                'helmet_color'        => '#00C853',
                'active'              => true,
                'bio'                 => 'Charles Weerts adalah pembalap muda berbakat asal Belgia yang menjadi andalan program GT World Challenge dan Spa 24 Jam.',
            ],

            // Kategori 24h Nürburgring (3 Driver dalam 1 Mobil GT3)
            [
                'permanent_number'    => 91,
                'name'                => 'Kevin Estre',
                'country'             => 'France',
                'country_code'        => 'FRA',
                'podiums'             => 28,
                'career_points'       => 540.00,
                'world_championships' => 1,
                'category'            => 'Nurburgring',
                'role'                => 'Race Driver',
                'helmet_color'        => '#FF002E',
                'active'              => true,
                'bio'                 => 'Kevin Estre dikenal sebagai raja lintasan Nordschleife dengan keberaniannya melakukan manuver mendahului di bahu jalan rumput pada kecepatan tinggi.',
            ],
            [
                'permanent_number'    => 91,
                'name'                => 'Michael Christensen',
                'country'             => 'Denmark',
                'country_code'        => 'DNK',
                'podiums'             => 15,
                'career_points'       => 320.00,
                'world_championships' => 1,
                'category'            => 'Nurburgring',
                'role'                => 'Race Driver',
                'helmet_color'        => '#FFFFFF',
                'active'              => true,
                'bio'                 => 'Michael Christensen adalah pembalap ketahanan Denmark yang sangat andal dan tenang dalam menghadapi kemacetan lalu lintas 150+ mobil di Nürburgring 24 Jam.',
            ],
            [
                'permanent_number'    => 91,
                'name'                => 'Frédéric Makowiecki',
                'country'             => 'France',
                'country_code'        => 'FRA',
                'podiums'             => 12,
                'career_points'       => 240.00,
                'world_championships' => 0,
                'category'            => 'Nurburgring',
                'role'                => 'Race Driver',
                'helmet_color'        => '#AA00FF',
                'active'              => true,
                'bio'                 => 'Frédéric Makowiecki adalah pembalap berpengalaman yang telah mengoleksi banyak kemenangan kelas GT di Nürburgring dan Le Mans.',
            ],

            // Kategori IMSA 6 Hours of the Glen (3 Driver dalam 1 Mobil GTP)
            [
                'permanent_number'    => 55,
                'name'                => 'Ricky Taylor',
                'country'             => 'USA',
                'country_code'        => 'USA',
                'podiums'             => 35,
                'career_points'       => 890.00,
                'world_championships' => 2,
                'category'            => 'IMSA',
                'role'                => 'Race Driver',
                'helmet_color'        => '#FF6D00',
                'active'              => true,
                'bio'                 => 'Ricky Taylor adalah bintang balap prototipe Amerika yang memenangkan kejuaraan IMSA sebanyak dua kali dengan reputasi performa luar biasa di tikungan cepat.',
            ],
            [
                'permanent_number'    => 55,
                'name'                => 'Filipe Albuquerque',
                'country'             => 'Portugal',
                'country_code'        => 'PRT',
                'podiums'             => 24,
                'career_points'       => 580.00,
                'world_championships' => 1,
                'category'            => 'IMSA',
                'role'                => 'Race Driver',
                'helmet_color'        => '#E8421C',
                'active'              => true,
                'bio'                 => 'Filipe Albuquerque adalah pembalap asal Portugal yang tangguh dan selalu mencatatkan rekor lap mengesankan di bawah tekanan cuaca panas IMSA.',
            ],
            [
                'permanent_number'    => 55,
                'name'                => 'Louis Delétraz',
                'country'             => 'Switzerland',
                'country_code'        => 'CHE',
                'podiums'             => 18,
                'career_points'       => 410.00,
                'world_championships' => 0,
                'category'            => 'IMSA',
                'role'                => 'Race Driver',
                'helmet_color'        => '#00C853',
                'active'              => true,
                'bio'                 => 'Louis Delétraz adalah pembalap muda bertalenta tinggi asal Swiss yang sangat andal dalam melakukan strategi undercut di seri IMSA Amerika.',
            ],

            // Kategori FIM EWC (3 Pembalap)
            [
                'permanent_number'    => 7,
                'name'                => 'Niccolò Canepa',
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
            ],
            [
                'permanent_number'    => 7,
                'name'                => 'Marvin Fritz',
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
            ],
            [
                'permanent_number'    => 7,
                'name'                => 'Karel Hanika',
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
            ],

            // Kategori Formula E (1 Pembalap)
            [
                'permanent_number'    => 22,
                'name'                => 'Oliver Rowland',
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
            ],
        ];

        foreach ($drivers as $d) {
            Driver::updateOrCreate(
                ['team_id' => $team->id, 'name' => $d['name']],
                array_merge($d, ['team_id' => $team->id])
            );
        }

        $this->command->info('   ✅ Drivers: Roster lengkap 14 pembalap (F1, LeMans, Spa, Nurburgring, IMSA) berhasil diinput.');

        // ── 4. CARS — 10 Units across 5 categories ────────────────

        $cars = [
            // ── F1 (FIA Formula 1 World Championship) ────────────
            [
                'category'         => 'F1',
                'car_number'       => 1,
                'model_name'       => 'RGR-26 E Performance',
                'power_unit'       => 'RGR-Mercedes F1 M17 E Performance Hybrid',
                'chassis'          => 'Carbon-Titanium Monocoque Mk V',
                'weight'           => 798.00,
                'top_speed'        => 372,
                'power_hp'         => 1050,
                'season_year'      => 2026,
                'championship'     => 'FIA Formula 1 World Championship',
                'class_entry'      => 'FIA F1',
                'fuel_capacity'    => 110.0,
                'tyre_supplier'    => 'Pirelli',
                'livery_sponsor'   => 'NexaCore Tech',
                'aerodynamics_desc'=> 'Full ground-effect Venturi floor with active front wing flap. '
                    . 'Side pods feature a venturi undercut design maximising downforce at high-speed circuits '
                    . 'while minimising drag on Monza-spec straights.',
            ],
            [
                'category'         => 'F1',
                'car_number'       => 44,
                'model_name'       => 'RGR-26 E Performance',
                'power_unit'       => 'RGR-Mercedes F1 M17 E Performance Hybrid',
                'chassis'          => 'Carbon-Titanium Monocoque Mk V',
                'weight'           => 798.00,
                'top_speed'        => 372,
                'power_hp'         => 1050,
                'season_year'      => 2026,
                'championship'     => 'FIA Formula 1 World Championship',
                'class_entry'      => 'FIA F1',
                'fuel_capacity'    => 110.0,
                'tyre_supplier'    => 'Pirelli',
                'livery_sponsor'   => 'Veridian Energy',
                'aerodynamics_desc'=> 'Identical aerodynamic specification to the #1 car. '
                    . 'Setup differentiation applied at circuit level based on driver preference data. '
                    . 'Kael Adriansen typically runs higher downforce trim for tyre preservation.',
            ],

            // ── Hypercar (FIA WEC — 24h Spa) ─────────────────────
            [
                'category'         => 'Hypercar',
                'car_number'       => 7,
                'model_name'       => 'RGR Valkyrie-H',
                'power_unit'       => 'RGR-Ferrari F163 V6 Twin-Turbo Hybrid',
                'chassis'          => 'LMH-spec Carbon Monocoque',
                'weight'           => 1030.00,
                'top_speed'        => 340,
                'power_hp'         => 680,
                'season_year'      => 2026,
                'championship'     => 'FIA World Endurance Championship — Hypercar',
                'class_entry'      => 'LMH',
                'fuel_capacity'    => 90.0,
                'tyre_supplier'    => 'Michelin',
                'livery_sponsor'   => 'AeroSync Systems',
                'aerodynamics_desc'=> 'Hypercar LMH specification bodywork with centrally regulated downforce. '
                    . 'Spa configuration runs maximum downforce rear wing package for Eau Rouge stability. '
                    . 'Active aerodynamics: adjustable front dive planes, fixed rear wing per LMH regulations.',
            ],
            [
                'category'         => 'Hypercar',
                'car_number'       => 8,
                'model_name'       => 'RGR Valkyrie-H',
                'power_unit'       => 'RGR-Ferrari F163 V6 Twin-Turbo Hybrid',
                'chassis'          => 'LMH-spec Carbon Monocoque',
                'weight'           => 1030.00,
                'top_speed'        => 340,
                'power_hp'         => 680,
                'season_year'      => 2026,
                'championship'     => 'FIA World Endurance Championship — Hypercar',
                'class_entry'      => 'LMH',
                'fuel_capacity'    => 90.0,
                'tyre_supplier'    => 'Michelin',
                'livery_sponsor'   => 'NexaCore Tech',
                'aerodynamics_desc'=> 'Twin of the #7 car with identical specification. '
                    . 'The RGR Valkyrie-H #8 carries the endurance programme\'s lead technical partner livery, '
                    . 'featuring the distinctive turquoise NexaCore stripe across the nose section.',
            ],

            // ── Hybrid Prototype (FIA WEC — 24h Le Mans) ─────────
            [
                'category'         => 'Hybrid',
                'car_number'       => 11,
                'model_name'       => 'RGR Hybrid-LMP1',
                'power_unit'       => 'RGR-Ferrari Le Mans Hybrid Twin-Turbo V6',
                'chassis'          => 'LMP1-class Carbon-Kevlar Tub',
                'weight'           => 878.00,
                'top_speed'        => 360,
                'power_hp'         => 1000,
                'season_year'      => 2026,
                'championship'     => 'FIA WEC — LMP1 Hybrid Prototype',
                'class_entry'      => 'LMP1-H',
                'fuel_capacity'    => 75.0,
                'tyre_supplier'    => 'Michelin',
                'livery_sponsor'   => 'Veridian Energy',
                'aerodynamics_desc'=> 'Le Mans optimised low-drag configuration with 15% reduced rear wing chord. '
                    . 'Extended Mulsanne straight requires a drag coefficient below 0.65 Cd. '
                    . 'Front diffuser optimised for the high-speed Porsche Curves exit at 200+ km/h.',
            ],
            [
                'category'         => 'Hybrid',
                'car_number'       => 12,
                'model_name'       => 'RGR Hybrid-LMP1',
                'power_unit'       => 'RGR-Ferrari Le Mans Hybrid Twin-Turbo V6',
                'chassis'          => 'LMP1-class Carbon-Kevlar Tub',
                'weight'           => 878.00,
                'top_speed'        => 360,
                'power_hp'         => 1000,
                'season_year'      => 2026,
                'championship'     => 'FIA WEC — LMP1 Hybrid Prototype',
                'class_entry'      => 'LMP1-H',
                'fuel_capacity'    => 75.0,
                'tyre_supplier'    => 'Michelin',
                'livery_sponsor'   => 'KalixOil Lubricants',
                'aerodynamics_desc'=> 'Identical Le Mans specification to #11. '
                    . 'The #12 car runs the aggressive night-race tyre management strategy — higher blanket temperatures '
                    . 'and stiffer rear suspension to maintain rear axle load through the dark hours.',
            ],

            // ── GT3 (ADAC Nürburgring 24 Hours) ──────────────────
            [
                'category'         => 'GT3',
                'car_number'       => 91,
                'model_name'       => 'RGR GT3-Evox',
                'power_unit'       => 'RGR-BMW P65 4.4L V8 Naturally Aspirated',
                'chassis'          => 'GT3-spec Steel Spaceframe & Carbon Body',
                'weight'           => 1300.00,
                'top_speed'        => 295,
                'power_hp'         => 550,
                'season_year'      => 2026,
                'championship'     => 'ADAC TOTAL 24h Nürburgring',
                'class_entry'      => 'SP9 GT3',
                'fuel_capacity'    => 120.0,
                'tyre_supplier'    => 'Pirelli',
                'livery_sponsor'   => 'StormFibre Apparel',
                'aerodynamics_desc'=> 'Nordschleife configuration runs maximum downforce with full GT3 aero package. '
                    . '22% increased compression damping vs standard GT3 events. '
                    . 'Reinforced underfloor protection for rough Nordschleife tarmac and concrete sections.',
            ],
            [
                'category'         => 'GT3',
                'car_number'       => 92,
                'model_name'       => 'RGR GT3-Evox',
                'power_unit'       => 'RGR-BMW P65 4.4L V8 Naturally Aspirated',
                'chassis'          => 'GT3-spec Steel Spaceframe & Carbon Body',
                'weight'           => 1300.00,
                'top_speed'        => 295,
                'power_hp'         => 550,
                'season_year'      => 2026,
                'championship'     => 'ADAC TOTAL 24h Nürburgring',
                'class_entry'      => 'SP9 GT3',
                'fuel_capacity'    => 120.0,
                'tyre_supplier'    => 'Pirelli',
                'livery_sponsor'   => 'AeroSync Systems',
                'aerodynamics_desc'=> 'The #92 runs the alternative tyre compound strategy — softer compound for the '
                    . 'day phase, switching to medium compound after dark for improved tread life across '
                    . 'the remaining 16 hours. Brake cooling ducts enlarged by 30% for the heavy braking at Döttinger Höhe.',
            ],

            // ── GTP (IMSA 6 Hours of the Glen) ───────────────────
            [
                'category'         => 'GTP',
                'car_number'       => 55,
                'model_name'       => 'RGR GTP-Speedster',
                'power_unit'       => 'RGR-BMW P66 V8 Twin-Turbo + Hybrid System',
                'chassis'          => 'IMSA GTP-spec Carbon Composite',
                'weight'           => 1030.00,
                'top_speed'        => 325,
                'power_hp'         => 850,
                'season_year'      => 2026,
                'championship'     => 'IMSA WeatherTech SportsCar Championship — GTP',
                'class_entry'      => 'GTP',
                'fuel_capacity'    => 85.0,
                'tyre_supplier'    => 'Michelin',
                'livery_sponsor'   => 'NexaCore Tech',
                'aerodynamics_desc'=> 'Watkins Glen circuit trim — medium-high downforce package for The Esses '
                    . 'and Boot Complex. Deploy-on-demand electric motor delivers maximum torque out of '
                    . 'every slow corner. Titanium brake duct system combats heat fade during the summer heat.',
            ],
            [
                'category'         => 'GTP',
                'car_number'       => 56,
                'model_name'       => 'RGR GTP-Speedster',
                'power_unit'       => 'RGR-BMW P66 V8 Twin-Turbo + Hybrid System',
                'chassis'          => 'IMSA GTP-spec Carbon Composite',
                'weight'           => 1030.00,
                'top_speed'        => 325,
                'power_hp'         => 850,
                'season_year'      => 2026,
                'championship'     => 'IMSA WeatherTech SportsCar Championship — GTP',
                'class_entry'      => 'GTP',
                'fuel_capacity'    => 85.0,
                'tyre_supplier'    => 'Michelin',
                'livery_sponsor'   => 'Veridian Energy',
                'aerodynamics_desc'=> 'Identical specification to #55. The #56 carries the Veridian Energy livery '
                    . 'with its characteristic brushed-silver and green stripe. '
                    . 'Set up for the aggressive undercut pit stop strategy targeting the chicane traffic window.',
            ],

            // ── FIM EWC (Yamaha YZF-R1) ──────────────────────────
            [
                'category'         => 'EWC',
                'car_number'       => 7,
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
            ],

            // ── Formula E (Gen3 Powertrain Nissan) ────────────────
            [
                'category'         => 'FormulaE',
                'car_number'       => 22,
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
            ],
        ];

        foreach ($cars as $carData) {
            Car::updateOrCreate(
                ['team_id' => $team->id, 'car_number' => $carData['car_number'], 'category' => $carData['category']],
                array_merge($carData, ['team_id' => $team->id])
            );
        }

        $this->command->info('   ✅ Cars: 10 units across F1 / Hypercar / Hybrid / GT3 / GTP');

        // ── 5. F1 RACE SCHEDULE ───────────────────────────────────
        $f1Races = [
            [
                'grand_prix_name' => 'Bahrain Grand Prix',
                'circuit_name'    => 'Bahrain International Circuit',
                'country'         => 'Bahrain',
                'country_code'    => 'BHR',
                'practice1_date'  => '2026-03-27 13:00:00',
                'qualifying_date' => '2026-03-28 16:00:00',
                'race_date'       => '2026-03-29 15:00:00',
                'status'          => 'Finished',
                'round_number'    => 1,
                'season_year'     => 2026,
            ],
            [
                'grand_prix_name' => 'Monaco Grand Prix',
                'circuit_name'    => 'Circuit de Monaco',
                'country'         => 'Monaco',
                'country_code'    => 'MCO',
                'practice1_date'  => '2026-05-21 13:30:00',
                'qualifying_date' => '2026-05-23 15:00:00',
                'race_date'       => '2026-07-20 14:00:00',
                'status'          => 'Upcoming',
                'round_number'    => 8,
                'season_year'     => 2026,
            ],
            [
                'grand_prix_name' => 'British Grand Prix',
                'circuit_name'    => 'Silverstone Circuit',
                'country'         => 'United Kingdom',
                'country_code'    => 'GBR',
                'practice1_date'  => '2026-07-02 12:00:00',
                'qualifying_date' => '2026-07-03 15:00:00',
                'race_date'       => '2026-08-07 14:00:00',
                'status'          => 'Upcoming',
                'round_number'    => 11,
                'season_year'     => 2026,
            ],
        ];

        foreach ($f1Races as $race) {
            RaceSchedule::updateOrCreate(
                ['grand_prix_name' => $race['grand_prix_name'], 'season_year' => $race['season_year']],
                $race
            );
        }

        $this->command->info('   ✅ F1 Race Schedule: 3 rounds (1 Finished, 2 Upcoming)');

        // ── 6. ENDURANCE RACES ────────────────────────────────────
        $enduranceRaces = [
            [
                'event_name'               => '24 Hours of Le Mans',
                'circuit_name'             => 'Circuit de la Sarthe',
                'country'                  => 'France',
                'class_category'           => 'Hybrid Prototype',
                'car_used'                 => 'RGR Hybrid-LMP1',
                'track_length_km'          => 13.626,
                'total_laps_completed'     => 371,
                'best_lap_time'            => '3:24.141',
                'highest_finish_position'  => 2,
                'event_slug'               => '24h-le-mans',
                'championship'             => 'FIA World Endurance Championship',
                'event_year'               => 2026,
                'theme_color'              => '#00C853',
                'theme_mood'               => 'classic',
                'race_history_text'        => 'RG Racing made their Le Mans debut in 2024, immediately challenging '
                    . 'for victory in the LMP1 Hybrid class. In 2025 the #11 car led the race for 14 consecutive hours '
                    . 'before a hybrid deployment sensor failure cost victory. The 2026 campaign sees RGR return '
                    . 'with a revised dual-MGU deployment strategy and upgraded thermal management to ensure the '
                    . 'hybrid system remains reliable across the full 24-hour distance.',
            ],

            [
                'event_name'               => '24 Hours of Nürburgring',
                'circuit_name'             => 'Nürburgring Nordschleife',
                'country'                  => 'Germany',
                'class_category'           => 'GT3',
                'car_used'                 => 'RGR GT3-Evox',
                'track_length_km'          => 25.378,
                'total_laps_completed'     => 155,
                'best_lap_time'            => '7:12.445',
                'highest_finish_position'  => 3,
                'event_slug'               => '24h-nurburgring',
                'championship'             => 'ADAC TOTAL 24h Nürburgring',
                'event_year'               => 2026,
                'theme_color'              => '#FF6D00',
                'theme_mood'               => 'aggressive',
                'race_history_text'        => 'Green Hell. The 25.378 km Nordschleife is the most demanding single '
                    . 'lap in motorsport — 154 corners, 310 metres of elevation change, and a surface that ranges '
                    . 'from 1920s original asphalt to modern racing tarmac. RGR entered the GT3 class in 2025, '
                    . 'immediately securing a top-5 finish with the #91 GT3-Evox. In 2026 the team targets the '
                    . 'outright SP9 class podium with a revised tyre management strategy developed over '
                    . '40,000 km of Nordschleife testing.',
            ],
            [
                'event_name'               => 'IMSA 6 Hours of The Glen',
                'circuit_name'             => 'Watkins Glen International',
                'country'                  => 'United States',
                'class_category'           => 'Grand Touring Prototype',
                'car_used'                 => 'RGR GTP-Speedster',
                'track_length_km'          => 5.535,
                'total_laps_completed'     => 236,
                'best_lap_time'            => '1:26.031',
                'highest_finish_position'  => 1,
                'event_slug'               => 'imsa-6h-the-glen',
                'championship'             => 'IMSA WeatherTech SportsCar Championship',
                'event_year'               => 2026,
                'theme_color'              => '#AA00FF',
                'theme_mood'               => 'american',
                'race_history_text'        => 'Watkins Glen International in the Finger Lakes region of upstate New York '
                    . 'hosts one of IMSA\'s most prestigious events. RG Racing joined the GTP class in 2025, '
                    . 'immediately winning on debut with the #55 GTP-Speedster after a decisive undercut strategy '
                    . 'in the final hour. The event runs from midday to dusk, meaning tyre temperature management '
                    . 'across the dramatic ambient temperature drop is as crucial as outright pace.',
            ],
        ];

        foreach ($enduranceRaces as $ev) {
            EnduranceRace::updateOrCreate(
                ['event_slug' => $ev['event_slug']],
                $ev
            );
        }

        $this->command->info('   ✅ Endurance: 4 events (Le Mans, Spa, Nürburgring, The Glen)');

        // ── 7. ARTICLES (NEWS) ────────────────────────────────────
        $articles = [
            [
                'title'        => 'M1TRG-26 E Performance: Engineering the 2026 F1 Champion',
                'slug'         => 'rgr-26-e-performance-engineering-2026-f1-champion',
                'category'     => 'Technical',
                'is_featured'  => true,
                'author'       => 'M1TRG Technical Department',
                'summary'      => 'A deep-dive into the engineering philosophy behind the M1TRG-26 — the car designed to defend Enzo Valentini\'s world championship title.',
                'content'      => 'The M1TRG-26 E Performance represents the single largest development programme '
                    . 'in Mobil 1 Team RG history. Over 18 months of wind tunnel testing, 2.4 million CFD simulation hours, '
                    . 'and the complete redesign of the power unit cooling architecture have produced a car that '
                    . 'generates 15% more downforce at equivalent drag levels compared to its predecessor. '
                    . 'The ground-effect Venturi floor operates in a regime previously thought impossible under '
                    . 'the 2022 regulations, exploiting every millimetre of the FIA\'s compliance windows. '
                    . 'The result is a car that redefines the performance ceiling of the 2026 regulations.',
                'published_at' => now()->subDays(3)->toDateTimeString(),
            ],
            [
                'title'        => 'Valentini Leads Championship After Monaco Qualifying Masterclass',
                'slug'         => 'valentini-leads-championship-monaco-qualifying-masterclass',
                'category'     => 'Race Report',
                'is_featured'  => false,
                'author'       => 'M1TRG Communications',
                'summary'      => 'Enzo Valentini delivered a stunning 0.4-second pole position lap at the Monaco Grand Prix to extend his championship lead to 18 points.',
                'content'      => 'Circuit de Monaco delivered its perennial blend of drama and precision as Enzo Valentini '
                    . 'set a blistering 1:09.847 to claim pole position — the fastest lap in Monaco Grand Prix '
                    . 'qualifying history. The Italian champion carried maximum downforce specification, '
                    . 'exploiting the M1TRG-26\'s superior mechanical grip through Casino Square and the '
                    . 'Piscine chicane to build a 0.4-second advantage over his nearest rival. '
                    . '"The car gave me everything I asked for," Valentini said. "Every corner felt perfect."',
                'published_at' => now()->subDays(7)->toDateTimeString(),
            ],
            [
                'title'        => 'M1TRG Valkyrie-H Claims 24 Hours of Spa Overall Victory',
                'slug'         => 'rgr-valkyrie-h-claims-24h-spa-victory',
                'category'     => 'Race Report',
                'is_featured'  => false,
                'author'       => 'M1TRG Endurance Division',
                'summary'      => 'In one of the most dramatic 24-hour races in WEC history, the #7 M1TRG Valkyrie-H emerged victorious at Spa after battling relentless rain through the night.',
                'content'      => 'As dawn broke over the Ardennes forest, the #7 M1TRG Valkyrie-H crossed the finish line '
                    . 'at Spa-Francorchamps to deliver Mobil 1 Team RG their maiden FIA World Endurance Championship victory. '
                    . 'The win — achieved against the backdrop of six Safety Car periods and two red flag interruptions '
                    . 'caused by extreme fog in the Raidillon section — was described by team principal Rey Gilang as '
                    . '"the greatest moment in M1TRG history." Driver trio Sofia Hartmann, Marco Pietrini, and Yuki Endo '
                    . 'shared driving duties across the 24 hours, with Hartmann at the wheel for the decisive final stint.',
                'published_at' => now()->subDays(14)->toDateTimeString(),
            ],
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(
                ['slug' => $art['slug']],
                $art
            );
        }

        $this->command->info('   ✅ Articles: 3 published (1 Technical, 2 Race Reports)');
        $this->command->newLine();
        $this->command->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->command->info('🏁  RG Racing dataset seeded successfully!');
        $this->command->info('   → Team: RG Racing (Principal: Rey Gilang)');
        $this->command->info('   → Sponsors: 22 brands (3 Title, 9 Technical, 10 Supplier)');
        $this->command->info('   → Drivers: 14 pembalap (F1, LeMans, Spa, Nurburgring, IMSA)');
        $this->command->info('   → Cars: 10 across F1 / Hypercar / Hybrid / GT3 / GTP');
        $this->command->info('   → F1 Schedule: 3 rounds');
        $this->command->info('   → Endurance Events: 4 (Le Mans · Spa · Nürburgring · The Glen)');
        $this->command->info('   → Articles: 3 published');
        $this->command->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
    }
}
