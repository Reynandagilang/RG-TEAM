@extends('layouts.rgr-premium')

@section('title', 'Prestasi & Statistik Tim — Mobil 1 Team RG')
@section('meta_description', 'Papan statistik utama prestasi karir dan tabel garis waktu hasil balapan Mobil 1 Team RG.')

@push('styles')
<style>
.timeline-table {
    width: 100%; border-collapse: collapse; text-align: left;
}
.timeline-table th {
    padding: 1rem; background: rgba(255,255,255,0.03);
    border-bottom: 1px solid rgba(255,255,255,0.08);
    font-family: 'Albert Sans', sans-serif; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.1em; color: #8C96A3; font-weight: 700;
}
.timeline-table td {
    padding: 1.1rem 1rem; border-bottom: 1px solid rgba(255,255,255,0.04); color: #D2D6DC;
}
.timeline-row:hover {
    background: rgba(255,255,255,0.02);
}
.badge-p1 { background: rgba(184,230,55,0.12); color: #B8E637; border: 1px solid rgba(184,230,55,0.25); }
.badge-p2 { background: rgba(244,182,61,0.12); color: #F4B63D; border: 1px solid rgba(244,182,61,0.25); }
.badge-p3 { background: rgba(56,193,114,0.12); color: #38C172; border: 1px solid rgba(56,193,114,0.25); }
.badge-dnf { background: rgba(229,72,77,0.12); color: #E5484D; border: 1px solid rgba(229,72,77,0.25); }
.badge-mid { background: rgba(255,255,255,0.05); color: #8C96A3; border: 1px solid rgba(255,255,255,0.08); }
.badge-last { background: rgba(255,255,255,0.05); color: #8C96A3; border: 1px solid rgba(255,255,255,0.08); }
.badge-title {
    font-size: 0.58rem; font-weight: 800; font-family: 'Albert Sans', sans-serif; letter-spacing: 0.05em;
    padding: 0.25rem 0.5rem; border-radius: 3px; display: inline-block;
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">Performance Hub</span>
            <h1 class="display-title mt-4 max-w-4xl">Prestasi & Statistik</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Catatan komprehensif pencapaian karir Mobil 1 Team RG sepanjang sejarah kejuaraan motorsport internasional dan nasional.
            </p>
        </div>
    </section>

    {{-- Stats Dashboard --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-3">
                    <span class="w-1 h-6 bg-[#B8E637] rounded-full"></span>
                    <h2 class="font-display font-bold text-xl text-[#F8FAFC] uppercase tracking-widest">Papan Statistik Utama</h2>
                </div>
                <p class="text-sm text-[#8C96A3]">Infografis akumulasi seluruh data balapan resmi M1TRG.</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="m1-card p-8 text-center relative overflow-hidden" data-reveal>
                    <div class="absolute -right-6 -bottom-6 text-[#F8FAFC] opacity-5 font-display font-black text-7xl select-none">ST</div>
                    <span class="text-xs text-[#8C96A3] font-ui tracking-wider block uppercase mb-2">Total Balapan</span>
                    <span class="font-display font-black text-4xl lg:text-5xl text-[#F8FAFC] tracking-tight">480</span>
                    <span class="text-[0.62rem] text-[#B8E637] font-ui font-semibold block mt-2">starts across 7 divisions</span>
                </div>
                <div class="m1-card p-8 text-center relative overflow-hidden" data-reveal>
                    <div class="absolute -right-6 -bottom-6 text-[#F8FAFC] opacity-5 font-display font-black text-7xl select-none">P1</div>
                    <span class="text-xs text-[#8C96A3] font-ui tracking-wider block uppercase mb-2">Podium Utama (P1)</span>
                    <span class="font-display font-black text-4xl lg:text-5xl text-[#F4B63D] tracking-tight">102</span>
                    <span class="text-[0.62rem] text-[#F4B63D] font-ui font-semibold block mt-2">victory / first place finishes</span>
                </div>
                <div class="m1-card p-8 text-center relative overflow-hidden" data-reveal>
                    <div class="absolute -right-6 -bottom-6 text-[#F8FAFC] opacity-5 font-display font-black text-7xl select-none">POD</div>
                    <span class="text-xs text-[#8C96A3] font-ui tracking-wider block uppercase mb-2">Total Podium</span>
                    <span class="font-display font-black text-4xl lg:text-5xl text-[#F8FAFC] tracking-tight">258</span>
                    <span class="text-[0.62rem] text-[#8C96A3] font-ui font-semibold block mt-2">P1, P2, and P3 finishes</span>
                </div>
                <div class="m1-card p-8 text-center relative overflow-hidden" data-reveal>
                    <div class="absolute -right-6 -bottom-6 text-[#F8FAFC] opacity-5 font-display font-black text-7xl select-none">PP</div>
                    <span class="text-xs text-[#8C96A3] font-ui tracking-wider block uppercase mb-2">Pole Position</span>
                    <span class="font-display font-black text-4xl lg:text-5xl text-[#B8E637] tracking-tight">76</span>
                    <span class="text-[0.62rem] text-[#B8E637] font-ui font-semibold block mt-2">fastest qualifying times</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Timeline Table --}}
    <section class="py-20 border-t border-[rgba(255,255,255,0.06)]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-3">
                    <span class="w-1 h-6 bg-[#B8E637] rounded-full"></span>
                    <h2 class="font-display font-bold text-xl text-[#F8FAFC] uppercase tracking-widest">Garis Waktu Prestasi Balap</h2>
                </div>
                <p class="text-sm text-[#8C96A3]">Rekam jejak podium dan hasil akhir kejuaraan diurutkan mundur dari musim terbaru.</p>
            </div>

            <div class="m1-card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="timeline-table">
                        <thead>
                            <tr>
                                <th>Tahun/Musim</th>
                                <th>Kejuaraan & Seri</th>
                                <th>Hasil Akhir</th>
                                <th>Pembalap</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2026</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">FIA Formula 1 World Championship</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 12 - GP Spa-Francorchamps</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Podium Utama & Lap Tercepat</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Enzo Valentini</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2026</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">FIA Formula 1 World Championship</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 5 - GP Catalunya</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-mid">Posisi Tengah (P10)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Finis Zona Poin Menengah</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Oscar Piastri</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2026</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">FIA World Endurance Championship (WEC)</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 2 - 6 Hours of Imola</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-dnf">DNF (Mesin Rusak)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Sistem Hybrid MGU-K Mengalami Overheat</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Sofia Hartmann</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2026</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">NTT IndyCar Series</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 4 - GP Barber Motorsports Park</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-last">Posisi Terakhir (P27)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Insiden Tabrakan Sayap Depan Rusak</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">David Malukas</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2026</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">FIA Formula 1 World Championship</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 6 - GP Monaco</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Pole Position & Pemenang Balapan</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Enzo Valentini</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2026</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">FIA World Endurance Championship (WEC)</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 3 - 24 Hours of Spa</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Overall Winner (Hypercar)</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Sofia Hartmann / Marco Pietrini</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2026</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">IMSA WeatherTech SportsCar Championship</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 4 - 6 Hours of The Glen</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">GTP Class Winner</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Marcus Ericsson / Yuki Endo</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2025</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">NTT IndyCar Series</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 6 - Indianapolis 500</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Indy 500 Winner</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Pato O'Ward</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2025</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">Kejurnas ISSOM (Indonesia Super Touring)</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 4 - Sirkuit Internasional Sentul</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Kelas ITCR 1500 Pro</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Rey Gilang</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2025</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">Mandalika Racing Series (MRS)</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 3 - Pertamina Mandalika Circuit</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Pole Position & Lap Tercepat</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Rey Gilang</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2024</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">FIA World Endurance Championship (WEC)</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 4 - 24 Hours of Le Mans</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">World Champion Constructor Title</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Sofia Hartmann / Yuki Endo</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2024</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">ADAC TOTAL 24h Nürburgring</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">SP9 Class - Nordschleife</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p3">Juara 3 (P3)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Podium Finish on SP9</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Marco Pietrini</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2023</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">FIA WEC LMP2 Division</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 5 - Spa 6 Hours</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">LMP2 Class Winner</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Sofia Hartmann</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2022</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">Kejurnas ISSOM Touring Car</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 2 - Sirkuit Sentul</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p2">Juara 2 (P2)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">ITCR 1500 Class</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Rey Gilang</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2021</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">FIA World Endurance Championship (WEC)</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 1 - 6 Hours of Spa</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">LMP2 Debut Class Winner</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Sofia Hartmann</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2020</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">24 Hours of Le Mans Virtual (E-Sports)</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Kejuaraan Ketahanan Sim-Racing Global</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Virtual Endurance Champion</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Enzo Valentini / George Russell</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2020</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">Kejurnas ISSOM Touring Car</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 3 - Sirkuit Sentul</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Kelas ITCR 1500 Pro</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Rey Gilang</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2019</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">Kejurnas Gokart Etape 4</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Sirkuit Sentul Karting</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Kelas Senior Max</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Rey Gilang</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2018</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">Mandalika Racing Series (MRS)</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Putaran 1 - Sirkuit Mandalika</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p3">Juara 3 (P3)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Kelas Underbone 150</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Rey Gilang</td>
                            </tr>

                            <tr class="timeline-row">
                                <td class="font-display font-bold text-[#F8FAFC]">2018</td>
                                <td>
                                    <span class="text-[#F8FAFC] block font-medium">Kejurnas Gokart Etape 1</span>
                                    <span class="text-[0.68rem] text-[#8C96A3]">Sirkuit Sentul Karting</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p2">Juara 2 (P2)</span>
                                    <span class="text-[0.68rem] block text-[#8C96A3] mt-1">Kelas Senior Max</span>
                                </td>
                                <td class="font-medium text-[#F8FAFC]">Rey Gilang</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
