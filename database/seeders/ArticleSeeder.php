<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::create([
            'title' => 'Analisis CFD: Desain Kolong Sasis Venturi untuk GP Silverstone',
            'slug' => 'analisis-cfd-desain-kolong-sasis-venturi-silverstone',
            'summary' => 'Insinyur aerodinamika M1TRG menjelaskan optimasi sayap kolong Venturi untuk memaksimalkan efek ground-effect pada tikungan kecepatan tinggi Copse dan Maggots.',
            'content' => 'Detail lengkap simulasi CFD...',
            'category' => 'TECHNICAL',
            'author' => 'M1TRG Technical Dept',
            'published_at' => Carbon::now()->subDays(2),
        ]);

        Article::create([
            'title' => 'Russell Targetkan Podium Pertama di GP Hong Kong Virtual',
            'slug' => 'russell-targetkan-podium-pertama-gp-hong-kong-virtual',
            'summary' => 'Divisi E-Sports M1TRG mengumumkan George Russell akan memimpin tim dalam seri kejuaraan simulator resmi akhir pekan ini di sirkuit jalan raya Hong Kong.',
            'content' => 'Detail e-sports...',
            'category' => 'E-SPORTS',
            'author' => 'M1TRG E-Sports',
            'published_at' => Carbon::now()->subDays(4),
        ]);

        Article::create([
            'title' => 'Kemitraan Bahan Bakar Bio Pertamax Turbo & M1TRG Berlanjut',
            'slug' => 'kemitraan-bahan-bakar-bio-pertamax-turbo-rgr-berlanjut',
            'summary' => 'Mobil 1 Team RG memperpanjang kolaborasi riset bahan bakar ramah lingkungan generasi terbaru 100% berkelanjutan untuk digunakan pada sasis Venturi 2026.',
            'content' => 'Detail partnership...',
            'category' => 'PARTNERSHIP',
            'author' => 'M1TRG Communications',
            'published_at' => Carbon::now()->subDays(7),
        ]);

        Article::create([
            'title' => 'Verstappen Puji Kinerja Kru Pit Stop M1TRG di GP Monaco',
            'slug' => 'verstappen-puji-kinerja-kru-pit-stop-rgr-gp-monaco',
            'summary' => 'Keberhasilan melakukan pergantian ban dalam waktu 1.98 detik membantu Verstappen mengamankan posisi terdepan dan memenangkan GP Monaco yang penuh drama.',
            'content' => 'Detail pit stop...',
            'category' => 'RACE REPORT',
            'author' => 'M1TRG Communications',
            'published_at' => Carbon::now()->subDays(9),
        ]);

        Article::create([
            'title' => 'Evaluasi Driver Academy: Nakamura-Berta Bersiap untuk F3',
            'slug' => 'evaluasi-driver-academy-nakamura-berta-bersiap-f3',
            'summary' => 'Program pengembangan pembalap muda M1TRG resmi mendaftarkan Nakamura-Berta untuk mengikuti tes privat pramusim Formula 3 di Barcelona pekan depan.',
            'content' => 'Detail akademi...',
            'category' => 'ACADEMY',
            'author' => 'M1TRG Academy',
            'published_at' => Carbon::now()->subDays(12),
        ]);

        Article::create([
            'title' => 'M1TRG Umumkan Pengurangan Emisi Karbon Logistik Sebesar 40%',
            'slug' => 'rgr-umumkan-pengurangan-emisi-karbon-logistik-40',
            'summary' => 'Melalui optimalisasi rute pelayaran laut dan penggunaan truk bio-fuel di Eropa, tim berhasil memangkas jejak karbon logistik secara signifikan.',
            'content' => 'Detail ramah lingkungan...',
            'category' => 'SUSTAINABILITY',
            'author' => 'Sustainability Dept',
            'published_at' => Carbon::now()->subDays(15),
        ]);
    }
}
