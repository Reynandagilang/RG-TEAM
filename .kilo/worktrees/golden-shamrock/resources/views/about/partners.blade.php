@extends('layouts.rgr-premium')

@section('title', 'Mitra Pabrikan Premium — Mobil 1 Team RG')
@section('meta_description', 'Portal resmi mitra pabrikan otomotif global penyedia teknologi dan sasis mobil balap Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">Manufacturer Partners</span>
            <h1 class="display-title mt-4 max-w-4xl">Mitra Pabrikan Premium</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Mobil 1 Team RG bekerja sama secara langsung dengan produsen otomotif terkemuka dunia untuk menyuplai sasis, mesin, dan inovasi rekayasa motorsport terbaik.
            </p>
        </div>
    </section>

    {{-- Partners List --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="space-y-8">

                {{-- Mercedes-AMG --}}
                <div class="m1-card-elevated p-8 flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center" data-reveal>
                    <div class="space-y-3 max-w-2xl">
                        <span class="m1-badge">FORMULA 1 & GT3 PARTNER</span>
                        <h2 class="font-display font-bold text-3xl text-[#F8FAFC]">Mercedes-AMG</h2>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                            Penyedia resmi unit daya (Power Unit) V6 Turbo Hybrid berkinerja tinggi untuk divisi utama FIA Formula 1 Mobil 1 Team RG, serta sasis Mercedes-AMG GT3 Evo yang digunakan dalam berbagai kompetisi ketahanan dunia.
                        </p>
                        <div class="flex gap-6 text-sm font-mono text-[#8C96A3]">
                            <p><span class="text-[#8C96A3]">Suplai Utama:</span> F1 Power Unit & GT3 Evo</p>
                            <p><span class="text-[#8C96A3]">Sejak:</span> 2025</p>
                        </div>
                    </div>
                    <a href="{{ route('f1.division') }}" class="btn-m1-primary text-xs w-full lg:w-fit justify-center shrink-0">Lihat Divisi F1</a>
                </div>

                {{-- Porsche --}}
                <div class="m1-card-elevated p-8 flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center" data-reveal>
                    <div class="space-y-3 max-w-2xl">
                        <span class="m1-badge-gold">GTWCA DIVISION PARTNER</span>
                        <h2 class="font-display font-bold text-3xl text-[#F8FAFC]">Porsche Motorsport</h2>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                            Pemasok resmi armada mobil balap legendaris Porsche 911 GT3 R (generasi 992) untuk merebut kemenangan kejuaraan kontinental di ajang GT World Challenge Asia.
                        </p>
                        <div class="flex gap-6 text-sm font-mono text-[#8C96A3]">
                            <p><span class="text-[#8C96A3]">Suplai Utama:</span> Porsche 911 GT3 R (992)</p>
                            <p><span class="text-[#8C96A3]">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('gt.asia') }}" class="btn-m1-primary text-xs w-full lg:w-fit justify-center shrink-0">Lihat Divisi GTWC Asia</a>
                </div>

                {{-- Chevrolet --}}
                <div class="m1-card-elevated p-8 flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center" data-reveal>
                    <div class="space-y-3 max-w-2xl">
                        <span class="m1-badge-gold">NASCAR DIVISION PARTNER</span>
                        <h2 class="font-display font-bold text-3xl text-[#F8FAFC]">Chevrolet Racing</h2>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                            Penyedia resmi sasis dan mesin V8 Naturally Aspirated Chevrolet Camaro ZL1 untuk kejuaraan balap mobil stok Amerika Serikat di ajang NASCAR Cup Series.
                        </p>
                        <div class="flex gap-6 text-sm font-mono text-[#8C96A3]">
                            <p><span class="text-[#8C96A3]">Suplai Utama:</span> Chevrolet Camaro ZL1 V8</p>
                            <p><span class="text-[#8C96A3]">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('nascar') }}" class="btn-m1-primary text-xs w-full lg:w-fit justify-center shrink-0">Lihat Divisi NASCAR</a>
                </div>

                {{-- Aston Martin --}}
                <div class="m1-card-elevated p-8 flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center" data-reveal>
                    <div class="space-y-3 max-w-2xl">
                        <span class="m1-badge">GTWCE DIVISION PARTNER</span>
                        <h2 class="font-display font-bold text-3xl text-[#F8FAFC]">Aston Martin Racing</h2>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                            Mitra penyedia sasis Aston Martin Vantage AMR GT3 bermesin Twin-Turbo V8 untuk berkompetisi di kelas Pro dan Bronze pada kejuaraan ketahanan elit GT World Challenge Europe.
                        </p>
                        <div class="flex gap-6 text-sm font-mono text-[#8C96A3]">
                            <p><span class="text-[#8C96A3]">Suplai Utama:</span> Aston Martin Vantage GT3</p>
                            <p><span class="text-[#8C96A3]">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('gt.europe') }}" class="btn-m1-primary text-xs w-full lg:w-fit justify-center shrink-0">Lihat Divisi GTWC Europe</a>
                </div>

                {{-- Ferrari --}}
                <div class="m1-card-elevated p-8 flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center" data-reveal>
                    <div class="space-y-3 max-w-2xl">
                        <span class="m1-badge-danger">GT3 / ENDURANCE PARTNER</span>
                        <h2 class="font-display font-bold text-3xl text-[#F8FAFC]">Ferrari Corse Clienti</h2>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                            Kolaborasi riset teknologi sasis mobil balap Ferrari 296 GT3 bermesin V6 Twin-Turbo yang berfokus pada aerodinamika kolong sasis (ground-effect).
                        </p>
                        <div class="flex gap-6 text-sm font-mono text-[#8C96A3]">
                            <p><span class="text-[#8C96A3]">Suplai Utama:</span> Ferrari 296 GT3 Tech</p>
                            <p><span class="text-[#8C96A3]">Sejak:</span> 2024</p>
                        </div>
                    </div>
                    <a href="{{ route('car.specs') }}" class="btn-m1-primary text-xs w-full lg:w-fit justify-center shrink-0">Lihat Spesifikasi Sasis</a>
                </div>

                {{-- BMW --}}
                <div class="m1-card-elevated p-8 flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center" data-reveal>
                    <div class="space-y-3 max-w-2xl">
                        <span class="m1-badge">IMSA GTP PARTNER</span>
                        <h2 class="font-display font-bold text-3xl text-[#F8FAFC]">BMW M</h2>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                            Penyedia resmi unit mobil purwarupa hibrida tercanggih BMW M Hybrid V8 (LMDh) untuk kompetisi balap ketahanan Amerika di ajang IMSA WeatherTech SportsCar Championship.
                        </p>
                        <div class="flex gap-6 text-sm font-mono text-[#8C96A3]">
                            <p><span class="text-[#8C96A3]">Suplai Utama:</span> BMW M Hybrid V8 (LMDh)</p>
                            <p><span class="text-[#8C96A3]">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('endurance.show', 'imsa-6h-the-glen') }}" class="btn-m1-primary text-xs w-full lg:w-fit justify-center shrink-0">Lihat Divisi IMSA</a>
                </div>

                {{-- McLaren --}}
                <div class="m1-card-elevated p-8 flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center" data-reveal>
                    <div class="space-y-3 max-w-2xl">
                        <span class="m1-badge-gold">INDYCAR & F1 TECHNICAL PARTNER</span>
                        <h2 class="font-display font-bold text-3xl text-[#F8FAFC]">McLaren Racing</h2>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                            Kolaborasi rekayasa aerodinamika, penyuplai sasis Dallara IR-18 untuk ajang balap roda terbuka Amerika Serikat, serta kerja sama transfer teknologi Formula 1.
                        </p>
                        <div class="flex gap-6 text-sm font-mono text-[#8C96A3]">
                            <p><span class="text-[#8C96A3]">Suplai Utama:</span> Dallara IR-18 Chassis Tech</p>
                            <p><span class="text-[#8C96A3]">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('indycar') }}" class="btn-m1-primary text-xs w-full lg:w-fit justify-center shrink-0">Lihat Divisi IndyCar</a>
                </div>

                {{-- Toyota --}}
                <div class="m1-card-elevated p-8 flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center" data-reveal>
                    <div class="space-y-3 max-w-2xl">
                        <span class="m1-badge">WRC TECHNICAL PARTNER</span>
                        <h2 class="font-display font-bold text-3xl text-[#F8FAFC]">Toyota Gazoo Racing</h2>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                            Penyedia resmi mobil GR Yaris Rally1 Hybrid untuk ajang balap ketahanan medan berat FIA World Rally Championship (WRC), serta riset gabungan daya hibrida Rally1.
                        </p>
                        <div class="flex gap-6 text-sm font-mono text-[#8C96A3]">
                            <p><span class="text-[#8C96A3]">Suplai Utama:</span> Toyota GR Yaris Rally1 Hybrid</p>
                            <p><span class="text-[#8C96A3]">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('wrc') }}" class="btn-m1-primary text-xs w-full lg:w-fit justify-center shrink-0">Lihat Divisi WRC</a>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
