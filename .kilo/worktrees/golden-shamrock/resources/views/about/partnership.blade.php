@extends('layouts.rgr-premium')

@section('title', 'Partnership & B2B Portal — Mobil 1 Team RG')
@section('meta_description', 'Portal bisnis (B2B) dan Sponsor Hub resmi tim Mobil 1 Team RG. Jelajahi kemitraan korporasi strategis.')

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">B2B Portal</span>
            <h1 class="display-title mt-4 max-w-4xl">Partnership Hub</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Jadilah bagian dari perjalanan dominasi kami. Hubungkan brand Anda dengan jutaan penonton motorsport global melalui program kolaborasi strategis bernilai tinggi.
            </p>
        </div>
    </section>

    {{-- Proposal Benefits --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-12 text-center">
                <span class="section-eyebrow">Penawaran Kemitraan</span>
                <h2 class="section-title-std mt-4 text-[#F8FAFC]">Kenapa Bermitra dengan M1TRG?</h2>
                <div class="w-8 h-0.5 bg-[#B8E637] mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="m1-card-elevated p-7" data-reveal>
                    <div class="w-10 h-10 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded mb-4 font-mono font-bold text-lg">01</div>
                    <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-2">Eksposur Global Masif</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Brand Anda akan terpampang di livery sasis mobil balap F1, WEC, IndyCar, dan WRC kami, menjangkau lebih dari 1.6 miliar pemirsa siaran TV global dan ratusan ribu penonton langsung di sirkuit setiap musimnya.
                    </p>
                </div>

                <div class="m1-card-elevated p-7" data-reveal>
                    <div class="w-10 h-10 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded mb-4 font-mono font-bold text-lg">02</div>
                    <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-2">Akses Paddock & Hospitality Elit</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Nikmati fasilitas eksklusif VIP Paddock Club, akses garasi pit-lane, tiket tribun eksklusif untuk klien B2B Anda, serta sesi temu-sapa (meet-and-greet) pribadi dengan jajaran pembalap utama kami di setiap etape.
                    </p>
                </div>

                <div class="m1-card-elevated p-7" data-reveal>
                    <div class="w-10 h-10 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded mb-4 font-mono font-bold text-lg">03</div>
                    <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-2">R&D Bersama & Aktivasi Digital</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Kolaborasi pengembangan teknis komponen, pengujian lapangan secara ekstrem, aktivasi pemasaran digital bersama pembalap, serta kampanye konten media sosial terintegrasi untuk mendongkrak gengsi brand Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sponsors Grid --}}
    <section class="py-20 border-t border-[rgba(255,255,255,0.06)]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-3">
                    <span class="w-1 h-6 bg-[#B8E637] rounded-full"></span>
                    <h2 class="font-display font-bold text-xl text-[#F8FAFC] uppercase tracking-widest">Sponsor & Mitra Aktif Kami</h2>
                </div>
                <p class="text-sm text-[#8C96A3]">Daftar mitra bisnis korporasi yang menyokong program logistik kompetisi dan rekayasa sasis M1TRG.</p>
            </div>

            <div class="mb-12">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @if(isset($sponsorsByTier['Title Sponsor']) && count($sponsorsByTier['Title Sponsor']) > 0)
                        @foreach($sponsorsByTier['Title Sponsor'] as $sp)
                            <div class="m1-card p-6 relative overflow-hidden flex flex-col justify-between min-h-[140px] hover:border-[rgba(184,230,55,0.3)]">
                                <div>
                                    <h4 class="font-display font-bold text-[#F8FAFC] text-base mb-1">{{ $sp->name }}</h4>
                                    <p class="text-sm text-[#8C96A3] leading-relaxed font-body">{{ $sp->description }}</p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-[rgba(255,255,255,0.06)] flex justify-between items-center text-xs text-[#8C96A3]">
                                    <span class="m1-badge">TITLE SPONSOR</span>
                                    <a href="{{ $sp->website_url }}" target="_blank" class="hover:text-[#B8E637] transition-colors">&rarr; Website</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-sm text-[#8C96A3]">Belum ada sponsor utama terdaftar.</p>
                    @endif
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $tech = collect($sponsorsByTier['Technical Partner'] ?? []);
                        $supp = collect($sponsorsByTier['Official Supplier'] ?? []);
                        $tier2 = $tech->merge($supp);
                    @endphp
                    @if(count($tier2) > 0)
                        @foreach($tier2 as $sp)
                            <div class="m1-card p-6 relative overflow-hidden flex flex-col justify-between min-h-[140px] hover:border-[rgba(184,230,55,0.3)]">
                                <div>
                                    <h4 class="font-display font-bold text-[#F8FAFC] text-sm mb-1">{{ $sp->name }}</h4>
                                    <p class="text-sm text-[#8C96A3] leading-relaxed font-body">{{ $sp->description }}</p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-[rgba(255,255,255,0.06)] flex justify-between items-center text-xs text-[#8C96A3]">
                                    <span class="m1-badge-muted">{{ str_replace('_', ' ', $sp->tier) }}</span>
                                    <a href="{{ $sp->website_url }}" target="_blank" class="hover:text-[#B8E637] transition-colors">&rarr; Website</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-sm text-[#8C96A3]">Belum ada mitra teknis terdaftar.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 border-t border-[rgba(255,255,255,0.06)]">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-2">Ingin Bergabung sebagai Sponsor?</h3>
            <p class="text-sm text-[#8C96A3] max-w-md mx-auto leading-relaxed mb-8">
                Unduh proposal kemitraan resmi musim 2026 atau jadwalkan pertemuan pribadi dengan manajer komersial B2B kami.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="#" class="btn-m1-primary text-xs">Unduh Dokumen Kemitraan</a>
                <a href="mailto:b2b@mobil1teamrg.co.id" class="btn-m1-secondary text-xs">Hubungi Kami</a>
            </div>
        </div>
    </section>

</div>
@endsection
