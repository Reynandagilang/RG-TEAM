<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
use App\Models\Team;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        $team = Team::first();
        $teamId = $team ? $team->id : 1;

        // Truncate drivers table to reset
        Driver::truncate();

        // ── Formula 1 ─────────────────────────────────────────────────────
        Driver::create([
            'team_id' => $teamId,
            'name' => 'Max Verstappen',
            'permanent_number' => 1,
            'country' => 'Belanda',
            'country_code' => 'NLD',
            'podiums' => 98,
            'career_points' => 2587,
            'world_championships' => 3,
            'bio' => 'Max Verstappen dikenal dengan gaya balapnya yang sangat agresif, klinis, dan tanpa kompromi. Ia bergabung dengan RGR untuk mempertahankan dominasi gelar.',
            'role' => 'Pembalap Utama',
            'category' => 'F1',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'George Russell',
            'permanent_number' => 63,
            'country' => 'Inggris',
            'country_code' => 'GBR',
            'podiums' => 11,
            'career_points' => 480,
            'world_championships' => 0,
            'bio' => 'George Russell adalah talenta F1 asal Inggris dengan presisi balap kualifikasi luar biasa dan konsistensi tinggi di setiap tikungan sirkuit.',
            'role' => 'Pembalap Utama',
            'category' => 'F1',
            'active' => true,
        ]);

        // ── Balap Ketahanan (WEC / Endurance) ─────────────────────────────
        Driver::create([
            'team_id' => $teamId,
            'name' => 'Sébastien Bourdais',
            'permanent_number' => 11,
            'country' => 'Prancis',
            'country_code' => 'FRA',
            'podiums' => 8,
            'career_points' => 110,
            'world_championships' => 4,
            'bio' => 'Sébastien Bourdais adalah legenda balap asal Prancis dengan segudang pengalaman di ajang Formula 1, IndyCar, dan balap ketahanan prototipe kelas dunia.',
            'role' => 'Pembalap Utama WEC',
            'category' => 'Endurance',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Sean Gelael',
            'permanent_number' => 31,
            'country' => 'Indonesia',
            'country_code' => 'IDN',
            'podiums' => 5,
            'career_points' => 72,
            'world_championships' => 0,
            'bio' => 'Sean Gelael memimpin skuad ketahanan RGR di kelas LMP2/Hypercar dengan daya tahan stints yang sangat stabil di balapan basah.',
            'role' => 'Pembalap Utama WEC',
            'category' => 'Endurance',
            'active' => true,
        ]);

        // ── NASCAR ────────────────────────────────────────────────────────
        Driver::create([
            'team_id' => $teamId,
            'name' => 'Kyle Larson',
            'permanent_number' => 24,
            'country' => 'Amerika Serikat',
            'country_code' => 'USA',
            'podiums' => 27,
            'career_points' => 1250,
            'world_championships' => 1,
            'bio' => 'Juara NASCAR Cup Series 2021 dan ahli balap lintasan tanah (dirt track). Larson terkenal dengan manuver agresif di sisi luar tembok sirkuit oval.',
            'role' => 'Pembalap Utama NASCAR',
            'category' => 'NASCAR',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Chase Elliott',
            'permanent_number' => 48,
            'country' => 'Amerika Serikat',
            'country_code' => 'USA',
            'podiums' => 19,
            'career_points' => 980,
            'world_championships' => 1,
            'bio' => 'Juara NASCAR Cup Series 2020 dan pemenang balapan road course terbanyak. Elliott adalah ikon dan favorit para penggemar balap Amerika.',
            'role' => 'Pembalap Utama NASCAR',
            'category' => 'NASCAR',
            'active' => true,
        ]);

        // ── GT World Challenge Europe (GTWCE) ─────────────────────────────
        Driver::create([
            'team_id' => $teamId,
            'name' => 'Jules Gounon',
            'permanent_number' => 99,
            'country' => 'Prancis',
            'country_code' => 'FRA',
            'podiums' => 12,
            'career_points' => 210,
            'world_championships' => 3,
            'bio' => 'Spesialis trek basah yang andal dan pemegang rekor kemenangan beruntun di Spa 24 Jam.',
            'role' => 'Pembalap Utama GTWCE',
            'category' => 'GTWCE',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Raffaele Marciello',
            'permanent_number' => 88,
            'country' => 'Swiss',
            'country_code' => 'CHE',
            'podiums' => 18,
            'career_points' => 310,
            'world_championships' => 2,
            'bio' => 'Pakar kualifikasi GT3 dunia, Marciello memiliki insting lap tunggal yang sangat tajam dan andal memimpin jalannya balapan.',
            'role' => 'Pembalap Utama GTWCE',
            'category' => 'GTWCE',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Maro Engel',
            'permanent_number' => 80,
            'country' => 'Jerman',
            'country_code' => 'DEU',
            'podiums' => 14,
            'career_points' => 240,
            'world_championships' => 1,
            'bio' => 'Pembalap veteran Nürburgring Nordschleife dengan konsistensi lap tinggi dan manajemen ban yang presisi.',
            'role' => 'Pembalap Utama GTWCE',
            'category' => 'GTWCE',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Luca Stolz',
            'permanent_number' => 82,
            'country' => 'Jerman',
            'country_code' => 'DEU',
            'podiums' => 8,
            'career_points' => 160,
            'world_championships' => 0,
            'bio' => 'Ahli taktis di lintasan sempit, dikenal tangguh mempertahankan posisi dari tekanan pembalap lawan.',
            'role' => 'Pembalap Utama GTWCE',
            'category' => 'GTWCE',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Valentino Rossi',
            'permanent_number' => 46,
            'country' => 'Italia',
            'country_code' => 'ITA',
            'podiums' => 5,
            'career_points' => 88,
            'world_championships' => 9,
            'bio' => 'Legenda MotoGP 9 kali juara dunia yang beralih ke balap roda empat GT3. Rossi menunjukkan progres performa luar biasa bersama skuad RGR.',
            'role' => 'Pembalap Utama GTWCE',
            'category' => 'GTWCE',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Maxime Martin',
            'permanent_number' => 47,
            'country' => 'Belgia',
            'country_code' => 'BEL',
            'podiums' => 11,
            'career_points' => 195,
            'world_championships' => 1,
            'bio' => 'Rekan setim Valentino Rossi di kelas Bronze Cup. Martin membawa insting taktis yang kaya dari berbagai ajang ketahanan klasik Eropa.',
            'role' => 'Pembalap Utama GTWCE',
            'category' => 'GTWCE',
            'active' => true,
        ]);

        // ── GT World Challenge Asia (GTWCA) ───────────────────────────────
        Driver::create([
            'team_id' => $teamId,
            'name' => 'Rio Haryanto',
            'permanent_number' => 55,
            'country' => 'Indonesia',
            'country_code' => 'IDN',
            'podiums' => 4,
            'career_points' => 120,
            'world_championships' => 0,
            'bio' => 'Mantan pembalap Formula 1 kebanggaan Indonesia, Rio Haryanto menjadi andalan utama RGR dalam merebut kemenangan di kejuaraan sirkuit Asia.',
            'role' => 'Pembalap Utama GTWCA',
            'category' => 'GTWCA',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Alessio Picariello',
            'permanent_number' => 56,
            'country' => 'Belgia',
            'country_code' => 'BEL',
            'podiums' => 15,
            'career_points' => 280,
            'world_championships' => 1,
            'bio' => 'Pembalap pabrikan Porsche yang memiliki rekor kemenangan mentereng di berbagai sirkuit Asia Pasifik.',
            'role' => 'Pembalap Utama GTWCA',
            'category' => 'GTWCA',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Yifei Ye',
            'permanent_number' => 66,
            'country' => 'Tiongkok',
            'country_code' => 'CHN',
            'podiums' => 9,
            'career_points' => 170,
            'world_championships' => 2,
            'bio' => 'Pembalap elit Porsche Asia Pasifik, ahli sirkuit Shanghai dan Suzuka dengan ritme lap balapan yang konsisten.',
            'role' => 'Pembalap Utama GTWCA',
            'category' => 'GTWCA',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Tanart Sathienthirakul',
            'permanent_number' => 67,
            'country' => 'Thailand',
            'country_code' => 'THA',
            'podiums' => 6,
            'career_points' => 110,
            'world_championships' => 0,
            'bio' => 'Pembalap berpengalaman tinggi di kancah GT Asia Tenggara, mahir dalam menjaga stabilitas grip ban di cuaca tropis basah.',
            'role' => 'Pembalap Utama GTWCA',
            'category' => 'GTWCA',
            'active' => true,
        ]);

        // ── Academy ───────────────────────────────────────────────────────
        Driver::create([
            'team_id' => $teamId,
            'name' => 'Arvid Lindblad',
            'permanent_number' => 12,
            'country' => 'Inggris',
            'country_code' => 'GBR',
            'podiums' => 9,
            'career_points' => 113,
            'world_championships' => 0,
            'bio' => 'Talenta muda Formula 2 RGR Academy, pemenang GP Macau F4 termuda. Siap dipersiapkan untuk promosi ke grid utama F1.',
            'role' => 'Pembalap Akademi',
            'category' => 'Academy',
            'active' => true,
        ]);

        Driver::create([
            'team_id' => $teamId,
            'name' => 'Kean Nakamura-Berta',
            'permanent_number' => 8,
            'country' => 'Jepang',
            'country_code' => 'JPN',
            'podiums' => 7,
            'career_points' => 85,
            'world_championships' => 0,
            'bio' => 'Juara Dunia Gokart OK FIA 2021. Nakamura-Berta memiliki keahlian berkendara presisi tinggi di lintasan sasis tunggal Formula 3.',
            'role' => 'Pembalap Akademi',
            'category' => 'Academy',
            'active' => true,
        ]);
    }
}
