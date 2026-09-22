@extends('layouts.rgr-premium')

@section('title', 'Divisi Formula 1 | Mobil 1 Team RG')
@section('meta_description', 'Jelajahi Divisi Formula 1 Mobil 1 Team RG. Spesifikasi mesin Mercedes F1, pembalap utama Max Verstappen & George Russel, serta jadwal balapan.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20" style="background:#111315">

    <div class="max-w-7xl mx-auto px-6 mb-16">
        <div class="section-eyebrow mb-4">FIA FORMULA ONE WORLD CHAMPIONSHIP</div>
        <h1 class="section-title-std mb-4">FORMULA 1 DIVISION</h1>
        <p class="font-['Sora'] text-[#D2D6DC] text-sm max-w-xl leading-relaxed">
            Puncak teknologi balap dunia. Divisi F1 Mobil 1 Team RG memadukan sasis karbon aerodinamika radikal dengan kekuatan mesin Mercedes F1 Power Unit yang legendaris.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 mb-20 grid lg:grid-cols-12 gap-8">

        <div class="lg:col-span-7 m1-card p-8 flex flex-col justify-between">
            <div>
                <div class="section-eyebrow mb-2">JET DARAT UTAMA</div>
                <h2 class="font-['Albert_Sans'] font-black text-2xl lg:text-3xl text-[#F8FAFC] mb-6">
                    @if($f1Car) {{ $f1Car->model_name }} @else RGR-26 E Performance @endif
                </h2>

                @if($f1Car)
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <p class="text-xs text-[#8C96A3] uppercase font-['Albert_Sans'] tracking-wider">Unit Daya (Power Unit)</p>
                        <p class="text-sm font-['Albert_Sans'] font-bold text-[#F8FAFC] mt-1">{{ $f1Car->power_unit }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-[#8C96A3] uppercase font-['Albert_Sans'] tracking-wider">Sasis & Komposit</p>
                        <p class="text-sm font-['Albert_Sans'] font-bold text-[#F8FAFC] mt-1">{{ $f1Car->chassis }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-[#8C96A3] uppercase font-['Albert_Sans'] tracking-wider">Berat Minimum</p>
                        <p class="text-sm font-['Albert_Sans'] font-bold text-[#F8FAFC] mt-1">{{ $f1Car->weight }} kg</p>
                    </div>
                    <div>
                        <p class="text-xs text-[#8C96A3] uppercase font-['Albert_Sans'] tracking-wider">Kekuatan Mesin</p>
                        <p class="text-sm font-['Albert_Sans'] font-bold text-[#F8FAFC] mt-1">{{ $f1Car->power_hp }} HP</p>
                    </div>
                </div>

                <p class="text-xs text-[#D2D6DC] leading-relaxed mb-6 font-['Sora']">
                     {{ $f1Car->aerodynamics_desc }}
                </p>
                @else
                <p class="text-[#D2D6DC] text-sm mb-6">Data spesifikasi mobil F1 belum tersedia.</p>
                @endif
            </div>

            <div class="border-t border-[rgba(255,255,255,0.06)] pt-6 flex justify-between items-center">
                <span class="text-xs font-['Albert_Sans'] text-[#8C96A3]">Ban Resmi: <strong class="text-[#F8FAFC]">Pirelli</strong></span>
                <a href="{{ route('car.specs') }}" class="btn-m1-ghost text-xs">SPESIFIKASI PENUH</a>
            </div>
        </div>

        <div class="lg:col-span-5 flex flex-col gap-4">
            <div class="section-eyebrow px-2">Pembalap Resmi F1</div>
            @foreach($f1Drivers as $dr)
            <div class="m1-card p-6 relative overflow-hidden">
                <div class="absolute right-[-0.5rem] bottom-[-1.5rem] font-['Albert_Sans'] font-black text-8xl text-[#F8FAFC]/[0.03] select-none pointer-events-none">
                    {{ str_pad($dr->permanent_number, 2, '0', STR_PAD_LEFT) }}
                </div>

                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h3 class="font-['Albert_Sans'] font-bold text-lg text-[#F8FAFC]">{{ $dr->name }}</h3>
                        <p class="text-xs text-[#8C96A3] uppercase tracking-wider font-['Albert_Sans'] mt-1">{{ $dr->country }} ({{ $dr->country_code }})</p>
                    </div>
                    <span class="font-['Albert_Sans'] font-black text-2xl text-[#B8E637]">#{{ $dr->permanent_number }}</span>
                </div>
                <p class="text-xs text-[#D2D6DC] leading-relaxed font-['Sora']">
                    {{ $dr->bio }}
                </p>
            </div>
            @endforeach
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="section-eyebrow mb-4">KALENDER BALAPAN MUSIM 2026</div>
        <h2 class="section-title-std mb-8">RACE SCHEDULE F1</h2>

        <div class="grid gap-4">
            @forelse($f1Schedule as $sch)
            <div class="m1-card p-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="text-xs text-[#B8E637] font-['Albert_Sans'] font-bold tracking-widest uppercase mb-1 block">SERI {{ $sch->round }}</span>
                    <h3 class="font-['Albert_Sans'] font-bold text-lg text-[#F8FAFC]">{{ $sch->race_name }}</h3>
                    <p class="text-xs text-[#D2D6DC] font-['Albert_Sans'] uppercase mt-1">{{ $sch->circuit_name }}, {{ $sch->location }}</p>
                </div>

                <div class="flex items-center gap-6">
                    <div class="text-right">
                        <p class="text-xs text-[#8C96A3] uppercase font-['Albert_Sans'] tracking-wider">Tanggal Balapan</p>
                        <p class="text-sm font-['Albert_Sans'] font-bold text-[#F8FAFC] mt-1">{{ $sch->race_date->format('d M Y') }}</p>
                    </div>
                    <div>
                        <span class="{{ $sch->status === 'Upcoming' ? 'm1-badge text-[0.62rem]' : 'm1-badge-muted text-[0.62rem]' }}">
                            {{ $sch->status === 'Upcoming' ? 'AKAN DATANG' : 'SELESAI' }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-[#8C96A3] text-sm">Jadwal balapan F1 belum tersedia.</p>
            @endforelse
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 mt-20">
        <div class="section-eyebrow mb-4">MEDIA & STRATEGY ACTION</div>
        <h2 class="section-title-std mb-8">F1 PHOTO GALLERY</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="m1-card p-4 overflow-hidden">
                <div class="h-48 rounded mb-3 flex items-center justify-center relative overflow-hidden" style="background:#20252C; border:1px solid rgba(255,255,255,0.06)">
                    <span class="text-[0.62rem] font-['Albert_Sans'] tracking-widest text-[#8C96A3]">MONACO GRAND PRIX FP1</span>
                </div>
                <h4 class="font-['Albert_Sans'] font-bold text-sm text-[#F8FAFC]">FP1 Monaco Outlap</h4>
                <p class="text-[0.68rem] text-[#D2D6DC] leading-relaxed mt-1 font-['Sora']">Sesi latihan bebas di tikungan Fairmont Hairpin, menguji tingkat kelenturan suspensi karbon.</p>
            </div>
            <div class="m1-card p-4 overflow-hidden">
                <div class="h-48 rounded mb-3 flex items-center justify-center relative overflow-hidden" style="background:#20252C; border:1px solid rgba(255,255,255,0.06)">
                    <span class="text-[0.62rem] font-['Albert_Sans'] tracking-widest text-[#8C96A3]">SILVERSTONE HOTLAP</span>
                </div>
                <h4 class="font-['Albert_Sans'] font-bold text-sm text-[#F8FAFC]">Qualifying Hotlap Silverstone</h4>
                <p class="text-[0.68rem] text-[#D2D6DC] leading-relaxed mt-1 font-['Sora']">George Russell memecahkan rekor waktu tercepat sektor 2 pada ban Pirelli Soft Compound.</p>
            </div>
            <div class="m1-card p-4 overflow-hidden">
                <div class="h-48 rounded mb-3 flex items-center justify-center relative overflow-hidden" style="background:#20252C; border:1px solid rgba(255,255,255,0.06)">
                    <span class="text-[0.62rem] font-['Albert_Sans'] tracking-widest text-[#8C96A3]">SAKHIR NIGHT PIT STOP</span>
                </div>
                <h4 class="font-['Albert_Sans'] font-bold text-sm text-[#F8FAFC]">Night Race Pit Stop Sakhir</h4>
                <p class="text-[0.68rem] text-[#D2D6DC] leading-relaxed mt-1 font-['Sora']">Kerja sama kru mekanik Mobil 1 Team RG menyelesaikan pergantian 4 ban dalam waktu 2.1 detik.</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 mt-20">
        <div class="section-eyebrow mb-4">SPONSOR & PROGRAM PARTNERS</div>
        <h2 class="section-title-std mb-8">F1 DIVISION PARTNERS</h2>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
            @php
                $f1Sponsors = ['Bank Mandiri', 'Telkomsel Flash', 'Pirelli Indonesia', 'Brembo', 'Akrapovič'];
            @endphp
            @foreach($f1Sponsors as $name)
                <div class="m1-card-elevated p-4 flex flex-col justify-center items-center text-center min-h-[100px]">
                    <span class="text-xs font-['Albert_Sans'] font-bold text-[#F8FAFC]">{{ $name }}</span>
                    <span class="text-[0.55rem] font-['Albert_Sans'] text-[#B8E637] uppercase font-bold mt-2">F1 Partner</span>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection