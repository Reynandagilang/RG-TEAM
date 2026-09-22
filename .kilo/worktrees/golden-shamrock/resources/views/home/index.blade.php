@extends('layouts.rgr-premium')

@section('title', 'Mobil 1 Team RG — Premium International Racing Enterprise')
@section('meta_description', 'Mobil 1 Team RG — World-class international racing constructor competing across Formula 1, WEC Hypercar, IMSA GTD, IndyCar, and WRC.')

@push('styles')
<style>
.hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: #111315;
}
.hero-video-container {
    position: absolute; inset: 0; z-index: 0; overflow: hidden;
}
.hero-video-container video {
    width: 100%; height: 100%; object-fit: cover; opacity: 0.12;
}
.hero-overlay {
    position: absolute; inset: 0;
    background: radial-gradient(circle at 55% 45%, rgba(184,230,55,0.08) 0%, #111315 75%);
    z-index: 1;
}
.hero-grid-overlay {
    position: absolute; inset: 0; z-index: 2;
    background-image:
        linear-gradient(rgba(255,255,255,0.015) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.015) 1px, transparent 1px);
    background-size: 60px 60px;
}

.flip-card-wrapper { perspective: 1000px; }
.flip-card-inner {
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    transform-style: preserve-3d;
}
.flip-card-inner.is-flipped { transform: rotateY(180deg); }
.flip-card-front, .flip-card-back {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}
.flip-card-back { transform: rotateY(180deg); }
</style>
@endpush

@section('content')

{{-- ════════════════════════════ HERO ════════════════════════════════ --}}
<section class="hero" id="hero" aria-label="Main Hero">
    <div class="hero-video-container" aria-hidden="true">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('https://assets.mixkit.co/videos/preview/mixkit-formula-one-race-car-on-a-track-32363-large.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-grid-overlay"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full pt-32 lg:pt-20">
        <div class="grid lg:grid-cols-12 gap-12 items-center min-h-[85vh] py-16 lg:py-20">

            {{-- Left Content (7 cols) --}}
            <div class="lg:col-span-7 relative z-10" data-reveal>
                @if(isset($titleSponsors) && $titleSponsors->count() > 0)
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-xs text-[#8C96A3] font-display font-bold tracking-widest uppercase">Official Title Partner</span>
                    @foreach($titleSponsors->take(1) as $ts)
                    <span class="m1-badge text-[0.65rem] py-1.5 px-3">{{ $ts->name }}</span>
                    @endforeach
                </div>
                @endif

                <span class="section-eyebrow mb-5">FIA Formula 1 &middot; WEC Hypercar &middot; Musim 2026</span>

                <h1 class="display-title text-5xl lg:text-7xl xl:text-8xl mb-6 leading-[0.92]">
                    MOBIL 1<br>
                    <span class="text-[#B8E637]">TEAM RG</span>
                </h1>

                <p class="text-lg lg:text-xl text-[#F8FAFC] font-display font-bold tracking-wide mb-3 leading-tight">
                    "Precision. Power. Presence."
                </p>
                <p class="text-sm lg:text-base text-[#8C96A3] leading-relaxed max-w-xl font-body mb-8">
                    Dari Jakarta menuju panggung motorsport global. M1TRG bersaing di 10 kejuaraan internasional — F1, WEC, IMSA, IndyCar, NASCAR, WRC, Formula E, GT World Challenge, Nürburgring 24H, dan FIM EWC.
                </p>

                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="{{ route('car.specs') }}" class="btn-m1-primary gap-2 text-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Eksplorasi Armada
                    </a>
                    <a href="{{ route('endurance.index') }}" class="btn-m1-secondary gap-2 text-xs">
                        Program Balap Ketahanan
                    </a>
                </div>

                {{-- Team Stats Grid --}}
                @if($team)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <div class="m1-card p-4 text-center">
                        <p class="font-display font-black text-2xl lg:text-3xl text-[#B8E637]">{{ $team->constructors_titles }}</p>
                        <p class="text-[0.6rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase mt-1">Gelar Konstruktor</p>
                    </div>
                    <div class="m1-card p-4 text-center">
                        <p class="font-display font-black text-2xl lg:text-3xl text-[#F8FAFC]">{{ $team->drivers_titles }}</p>
                        <p class="text-[0.6rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase mt-1">Gelar Pembalap</p>
                    </div>
                    @if(isset($driverStats))
                    <div class="m1-card p-4 text-center">
                        <p class="font-display font-black text-2xl lg:text-3xl text-[#F8FAFC]">{{ $driverStats['total_podiums'] }}</p>
                        <p class="text-[0.6rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase mt-1">Total Podium</p>
                    </div>
                    @endif
                    <div class="m1-card p-4 text-center">
                        <p class="font-display font-black text-2xl lg:text-3xl text-[#B8E637]">10</p>
                        <p class="text-[0.6rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase mt-1">Divisi Aktif</p>
                    </div>
                </div>
                @endif
            </div>

            {{-- Right Panel (5 cols) --}}
            <div class="lg:col-span-5 relative z-10" data-reveal>
                <div class="m1-glass p-6 lg:p-8 shadow-2xl">
                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-white/10">
                        <div>
                            <span class="text-[0.6rem] font-display font-bold text-[#B8E637] tracking-widest uppercase">M1TRG LIVE DATA</span>
                            <h3 class="font-display font-black text-lg text-[#F8FAFC] tracking-tight uppercase mt-0.5">TELEMETRY &amp; RACE HUB</h3>
                        </div>
                        <span class="m1-badge text-[0.55rem] animate-pulse py-1 px-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#B8E637] inline-block mr-1"></span> LIVE
                        </span>
                    </div>

                    {{-- Next Race Countdown --}}
                    @if($nextRace)
                    <div class="mb-5 p-4 rounded-lg bg-[#20252C] border border-white/10">
                        <p class="text-[0.55rem] font-display font-bold text-[#8C96A3] tracking-widest uppercase mb-2 text-center">NEXT RACE COUNTDOWN</p>
                        <div class="grid grid-cols-4 gap-2 text-center" id="countdown-display">
                            <div class="p-2 rounded bg-[#111315] border border-white/10">
                                <span class="font-display font-black text-xl text-[#B8E637]" id="cd-d">00</span>
                                <p class="text-[0.5rem] text-[#8C96A3] font-display font-bold uppercase tracking-wider">Hari</p>
                            </div>
                            <div class="p-2 rounded bg-[#111315] border border-white/10">
                                <span class="font-display font-black text-xl text-[#F8FAFC]" id="cd-h">00</span>
                                <p class="text-[0.5rem] text-[#8C96A3] font-display font-bold uppercase tracking-wider">Jam</p>
                            </div>
                            <div class="p-2 rounded bg-[#111315] border border-white/10">
                                <span class="font-display font-black text-xl text-[#F8FAFC]" id="cd-m">00</span>
                                <p class="text-[0.5rem] text-[#8C96A3] font-display font-bold uppercase tracking-wider">Menit</p>
                            </div>
                            <div class="p-2 rounded bg-[#111315] border border-white/10">
                                <span class="font-display font-black text-xl text-[#F8FAFC]" id="cd-s">00</span>
                                <p class="text-[0.5rem] text-[#8C96A3] font-display font-bold uppercase tracking-wider">Detik</p>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <p class="text-xs text-[#F8FAFC] font-display font-bold">{{ $nextRace->grand_prix_name }}</p>
                            <p class="text-[0.6rem] text-[#8C96A3]">{{ $nextRace->circuit_name }} &middot; {{ $nextRace->country }}</p>
                        </div>
                    </div>
                    @endif

                    {{-- Telemetry Data --}}
                    <div class="space-y-2 mb-5">
                        <p class="text-[0.55rem] font-display font-bold text-[#B8E637] tracking-widest uppercase">PERFORMANCE DATA</p>
                        <div class="flex justify-between text-xs font-mono py-1.5 border-b border-white/10">
                            <span class="text-[#8C96A3]">Top Speed (Sepang)</span>
                            <span class="font-bold text-[#F8FAFC]">324.8 km/h</span>
                        </div>
                        <div class="flex justify-between text-xs font-mono py-1.5 border-b border-white/10">
                            <span class="text-[#8C96A3]">Total Lap Tim</span>
                            <span class="font-bold text-[#F8FAFC]">5,124 Laps</span>
                        </div>
                        <div class="flex justify-between text-xs font-mono py-1.5">
                            <span class="text-[#8C96A3]">Constructor Standings</span>
                            <span class="font-bold text-[#B8E637]">P1 &middot; 284 Points</span>
                        </div>
                    </div>

                    <a href="{{ route('paddock.club') }}" class="btn-m1-primary w-full text-xs justify-center py-3">
                        VIP Paddock Club Access &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-[#111315] to-transparent pointer-events-none z-10"></div>
</section>

{{-- ════════════════════════ GLOBAL STATS BAR ════════════════════════ --}}
<section class="border-y border-white/10 bg-[#171B20] py-8" aria-label="Team Statistics">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 text-center">
            <div class="m1-card p-5" data-reveal>
                <p class="font-display font-black text-3xl lg:text-4xl text-[#B8E637]">15</p>
                <p class="text-xs text-[#F8FAFC] font-display font-bold tracking-wider uppercase mt-1">World Championships</p>
                <p class="text-[0.6rem] text-[#8C96A3] mt-1">2x F1 &middot; 2x WEC &middot; 1x Indy 500</p>
            </div>
            <div class="m1-card p-5" data-reveal>
                <p class="font-display font-black text-3xl lg:text-4xl text-[#F8FAFC]">250+</p>
                <p class="text-xs text-[#F8FAFC] font-display font-bold tracking-wider uppercase mt-1">Total Podium</p>
                <p class="text-[0.6rem] text-[#8C96A3] mt-1">F1 &middot; WEC &middot; IndyCar &middot; NASCAR</p>
            </div>
            <div class="m1-card p-5" data-reveal>
                <p class="font-display font-black text-3xl lg:text-4xl text-[#F8FAFC]">5.800+</p>
                <p class="text-xs text-[#F8FAFC] font-display font-bold tracking-wider uppercase mt-1">Career Points</p>
                <p class="text-[0.6rem] text-[#8C96A3] mt-1">Across All Divisions</p>
            </div>
            <div class="m1-card p-5" data-reveal>
                <p class="font-display font-black text-3xl lg:text-4xl text-[#B8E637]">10</p>
                <p class="text-xs text-[#F8FAFC] font-display font-bold tracking-wider uppercase mt-1">Active Racing Divisions</p>
                <p class="text-[0.6rem] text-[#8C96A3] mt-1">F1 &middot; WEC &middot; FE &middot; EWC &middot; IMSA &middot; NASCAR &middot; GTWC &middot; IndyCar &middot; WRC</p>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════ DRIVER SPOTLIGHT ════════════════════════ --}}
<section class="py-24 bg-[#111315]" id="drivers" aria-label="Driver Spotlight">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-12 gap-6" data-reveal>
            <div>
                <span class="section-eyebrow mb-3">Driver Line-Up 2026</span>
                <h2 class="section-title-std">Sorotan Pembalap</h2>
                <p class="section-subtitle mt-4">Temui para pembalap elit M1TRG yang memimpin di setiap kejuaraan.</p>
            </div>
            <a href="{{ route('drivers') }}" class="btn-m1-ghost text-xs flex-shrink-0">
                Lihat Semua Pembalap &rarr;
            </a>
        </div>

        @if($spotlightDrivers->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($spotlightDrivers as $i => $driver)
            <div class="flip-card-wrapper h-[480px]" x-data="{ flipped: false }" @click="flipped = !flipped" data-reveal>
                <div class="flip-card-inner w-full h-full relative" :class="flipped ? 'is-flipped' : ''">
                    {{-- Front --}}
                    <div class="flip-card-front absolute inset-0 w-full h-full m1-card overflow-hidden cursor-pointer">
                        @if($driver->avatar_url)
                        <img src="{{ asset('storage/'.$driver->avatar_url) }}" alt="{{ $driver->name }}"
                             class="w-full h-[280px] object-cover object-top" loading="lazy" decoding="async">
                        @else
                        <div class="w-full h-[280px] flex items-center justify-center bg-[#20252C]">
                            <span class="font-display font-black text-8xl text-[#B8E637]/10">#{{ $driver->permanent_number }}</span>
                        </div>
                        @endif
                        <div class="p-5 flex flex-col justify-between flex-1">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-[0.6rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase">{{ $driver->country_code ?? $driver->country }}</p>
                                    <h3 class="font-display font-black text-xl text-[#F8FAFC] leading-tight mt-1">
                                        {{ $driver->first_name }}<br>
                                        <span class="text-[#B8E637]">{{ $driver->last_name }}</span>
                                    </h3>
                                </div>
                                <span class="font-display font-black text-3xl text-[#B8E637]">#{{ $driver->permanent_number }}</span>
                            </div>
                        </div>
                        <div class="absolute bottom-3 right-4 text-[0.55rem] text-[#8C96A3] font-display font-semibold uppercase tracking-wider">
                            Tap untuk data &rarr;
                        </div>
                    </div>

                    {{-- Back --}}
                    <div class="flip-card-back absolute inset-0 w-full h-full m1-card p-6 flex flex-col justify-between cursor-pointer bg-[#20252C]">
                        <div>
                            <div class="flex justify-between items-start border-b border-white/10 pb-3 mb-4">
                                <div>
                                    <p class="text-[0.6rem] text-[#B8E637] font-display font-bold tracking-widest uppercase">M1TRG Telemetry</p>
                                    <h3 class="font-display font-black text-lg text-[#F8FAFC]">{{ $driver->name }}</h3>
                                </div>
                                <span class="font-display font-black text-2xl text-[#B8E637]">#{{ $driver->permanent_number }}</span>
                            </div>
                            <div class="space-y-2.5 text-xs font-mono">
                                <div class="flex justify-between">
                                    <span class="text-[#8C96A3]">License</span>
                                    <span class="text-[#F8FAFC] font-bold">FIA Super License</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-[#8C96A3]">World Titles</span>
                                    <span class="text-[#B8E637] font-bold">{{ $driver->world_championships }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-[#8C96A3]">Race Wins</span>
                                    <span class="text-[#F8FAFC] font-bold">{{ $driver->podiums ?? 0 }} Podiums</span>
                                </div>
                            </div>
                            @if($driver->bio)
                            <p class="text-[#8C96A3] text-xs leading-relaxed mt-5 italic border-t border-white/10 pt-4">
                                "{{ $driver->bio }}"
                            </p>
                            @endif
                        </div>
                        <span class="text-[0.55rem] text-[#8C96A3] font-display font-semibold uppercase tracking-wider border-t border-white/10 pt-3">
                            Tap kembali &rarr;
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- ════════════════════════ F1 STANDINGS (MINI) ════════════════════════ --}}
<section class="py-20 bg-[#171B20] border-y border-white/10" id="standings" aria-label="Current Standings">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-5" data-reveal>
                <span class="section-eyebrow mb-3">FIA Formula 1 Standings</span>
                <h2 class="section-title-std">Current Leaderboard</h2>
                <p class="section-subtitle mt-4">Mobil 1 Team RG memimpin klasemen konstruktor musim 2026 dengan performa konsisten di setiap Grand Prix.</p>
                <a href="{{ route('standings') }}" class="btn-m1-ghost text-xs mt-6">Full Standings &rarr;</a>
            </div>
            <div class="lg:col-span-7" data-reveal>
                <div class="m1-card-elevated p-6">
                    <p class="text-[0.6rem] font-display font-bold text-[#B8E637] tracking-widest uppercase mb-4">TOP 3 DRIVER STANDINGS</p>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-4 rounded-lg bg-[#20252C] border border-[#B8E637]/20">
                            <div class="flex items-center gap-4">
                                <span class="font-display font-black text-2xl text-[#B8E637]">P1</span>
                                <div>
                                    <p class="font-display font-bold text-sm text-[#F8FAFC]">Max Verstappen</p>
                                    <p class="text-[0.6rem] text-[#8C96A3] font-display uppercase tracking-wider">Mobil 1 Team RG</p>
                                </div>
                            </div>
                            <span class="font-display font-bold text-sm text-[#B8E637]">186 Pts</span>
                        </div>
                        <div class="flex items-center justify-between p-4 rounded-lg bg-[#171B20] border border-white/10">
                            <div class="flex items-center gap-4">
                                <span class="font-display font-black text-2xl text-[#8C96A3]">P2</span>
                                <div>
                                    <p class="font-display font-bold text-sm text-[#F8FAFC]">Charles Leclerc</p>
                                    <p class="text-[0.6rem] text-[#8C96A3] font-display uppercase tracking-wider">Ferrari</p>
                                </div>
                            </div>
                            <span class="font-display font-bold text-sm text-[#F8FAFC]">152 Pts</span>
                        </div>
                        <div class="flex items-center justify-between p-4 rounded-lg bg-[#171B20] border border-white/10">
                            <div class="flex items-center gap-4">
                                <span class="font-display font-black text-2xl text-[#8C96A3]">P3</span>
                                <div>
                                    <p class="font-display font-bold text-sm text-[#F8FAFC]">Lando Norris</p>
                                    <p class="text-[0.6rem] text-[#8C96A3] font-display uppercase tracking-wider">McLaren</p>
                                </div>
                            </div>
                            <span class="font-display font-bold text-sm text-[#F8FAFC]">145 Pts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════ LATEST NEWS ════════════════════════ --}}
@if($latestArticles->count() > 0)
<section class="py-24 bg-[#111315]" id="news" aria-label="Latest News">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-14 gap-6" data-reveal>
            <div>
                <span class="section-eyebrow mb-3">Media &amp; Press</span>
                <h2 class="section-title-std">Latest News</h2>
                <p class="section-subtitle mt-4">Berita resmi, press releases, dan update tim dari seluruh divisi.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($latestArticles as $i => $article)
            <article class="m1-card overflow-hidden group cursor-pointer" data-reveal>
                @if($article->main_image)
                <img src="{{ asset('storage/'.$article->main_image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105"
                     loading="lazy" decoding="async">
                @else
                <div class="w-full h-48 bg-[#20252C] flex items-center justify-center">
                    <span class="text-[0.6rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase">{{ $article->category ?? 'News' }}</span>
                </div>
                @endif
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="m1-badge text-[0.5rem] py-0.5 px-2">{{ $article->category }}</span>
                        <span class="text-[0.6rem] text-[#8C96A3] font-display">{{ $article->formatted_date }}</span>
                    </div>
                    <h3 class="font-display font-bold text-base text-[#F8FAFC] leading-snug line-clamp-2 group-hover:text-[#B8E637] transition-colors">{{ $article->title }}</h3>
                    <p class="text-xs text-[#8C96A3] mt-2 line-clamp-3 leading-relaxed">{{ $article->summary }}</p>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ════════════════════════ ICONIC F1 CIRCUITS ════════════════════════ --}}
<section class="py-24 bg-[#171B20]" id="circuits" aria-label="Iconic Circuits">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="mb-14" data-reveal>
            <span class="section-eyebrow mb-3">Featured Series</span>
            <h2 class="section-title-std">Iconic Circuits</h2>
            <p class="section-subtitle mt-4">Sirkuit legendaris yang menjadi medan tempur M1TRG di musim 2026.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="m1-card-elevated p-6 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="text-[0.55rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase">MONACO GP</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mt-1">Circuit de Monaco</h3>
                    <p class="text-xs text-[#8C96A3] mb-3">Monte Carlo &middot; Street Circuit &middot; 3.337 km</p>
                    <div class="flex flex-wrap gap-3 mb-3">
                        <span class="m1-badge-muted text-[0.5rem]">19 Turns</span>
                        <span class="m1-badge-muted text-[0.5rem]">Lap Record: 1:12.909</span>
                    </div>
                    <p class="text-xs text-[#8C96A3] leading-relaxed">Balapan jalan raya paling prestisius. Setiap milimeter adalah batas antara hero dan zero.</p>
                </div>
                <div class="mt-5 pt-4 border-t border-white/10 flex justify-between items-center">
                    <span class="text-[0.55rem] text-[#8C96A3] font-display uppercase tracking-wider">Precision &amp; Nerve</span>
                    <a href="{{ route('paddock.club') }}" class="text-xs text-[#B8E637] font-display font-bold">VIP Access &rarr;</a>
                </div>
            </div>

            <div class="m1-card-elevated p-6 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="text-[0.55rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase">BRITISH GP</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mt-1">Silverstone Circuit</h3>
                    <p class="text-xs text-[#8C96A3] mb-3">Silverstone &middot; Historic Layout &middot; 5.891 km</p>
                    <div class="flex flex-wrap gap-3 mb-3">
                        <span class="m1-badge-muted text-[0.5rem]">18 Turns</span>
                        <span class="m1-badge-muted text-[0.5rem]">Lap Record: 1:27.097</span>
                    </div>
                    <p class="text-xs text-[#8C96A3] leading-relaxed">Kombinasi tikungan kecepatan tinggi legendaris — Maggots, Becketts, dan Chapel.</p>
                </div>
                <div class="mt-5 pt-4 border-t border-white/10 flex justify-between items-center">
                    <span class="text-[0.55rem] text-[#8C96A3] font-display uppercase tracking-wider">High-Speed Challenge</span>
                    <a href="{{ route('paddock.club') }}" class="text-xs text-[#B8E637] font-display font-bold">VIP Access &rarr;</a>
                </div>
            </div>

            <div class="m1-card-elevated p-6 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="text-[0.55rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase">ITALIAN GP</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mt-1">Autodromo Nazionale Monza</h3>
                    <p class="text-xs text-[#8C96A3] mb-3">Monza &middot; Cathedral of Speed &middot; 5.793 km</p>
                    <div class="flex flex-wrap gap-3 mb-3">
                        <span class="m1-badge-muted text-[0.5rem]">11 Turns</span>
                        <span class="m1-badge-muted text-[0.5rem]">Lap Record: 1:21.046</span>
                    </div>
                    <p class="text-xs text-[#8C96A3] leading-relaxed">Lintasan lurus panjang mendominasi dengan pengereman keras di chicane Legenda.</p>
                </div>
                <div class="mt-5 pt-4 border-t border-white/10 flex justify-between items-center">
                    <span class="text-[0.55rem] text-[#8C96A3] font-display uppercase tracking-wider">Top Speed Arena</span>
                    <a href="{{ route('paddock.club') }}" class="text-xs text-[#B8E637] font-display font-bold">VIP Access &rarr;</a>
                </div>
            </div>

            <div class="m1-card-elevated p-6 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="text-[0.55rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase">SINGAPORE GP</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mt-1">Marina Bay Street Circuit</h3>
                    <p class="text-xs text-[#8C96A3] mb-3">Marina Bay &middot; Night Race &middot; 4.940 km</p>
                    <div class="flex flex-wrap gap-3 mb-3">
                        <span class="m1-badge-muted text-[0.5rem]">19 Turns</span>
                        <span class="m1-badge-muted text-[0.5rem]">Lap Record: 1:35.867</span>
                    </div>
                    <p class="text-xs text-[#8C96A3] leading-relaxed">Tantangan kelembapan tropis malam hari di sirkuit jalan raya sempit nan terjal.</p>
                </div>
                <div class="mt-5 pt-4 border-t border-white/10 flex justify-between items-center">
                    <span class="text-[0.55rem] text-[#8C96A3] font-display uppercase tracking-wider">Night Heat Battle</span>
                    <a href="{{ route('paddock.club') }}" class="text-xs text-[#B8E637] font-display font-bold">VIP Access &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════ GLOBAL DIVISIONS ════════════════════════ --}}
<section class="py-24 bg-[#111315]" id="divisions" aria-label="Global Racing Divisions">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="mb-14" data-reveal>
            <span class="section-eyebrow mb-3">Global Motorsport Ecosystem</span>
            <h2 class="section-title-std">Racing Divisions</h2>
            <p class="section-subtitle mt-4">Dari Grand Prix F1 hingga Nürburgring 24 Jam — M1TRG hadir di panggung terdepan motorsport dunia.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('f1.division') }}" class="m1-card p-6 group" data-reveal>
                <span class="text-[0.55rem] font-display font-black text-[#B8E637] tracking-widest uppercase">Open-Wheel</span>
                <h3 class="font-display font-bold text-lg text-[#F8FAFC] mt-2 group-hover:text-[#B8E637] transition-colors">Formula 1</h3>
                <p class="text-xs text-[#8C96A3] mt-2 leading-relaxed">Kasta tertinggi motorsport dunia dengan teknologi hybrid dan aerodinamika canggih.</p>
                <div class="mt-4 pt-3 border-t border-white/10 flex justify-between items-center text-xs">
                    <span class="text-[#8C96A3] font-mono">Mercedes-AMG</span>
                    <span class="text-[#B8E637] font-bold">&rarr;</span>
                </div>
            </a>

            <a href="{{ route('endurance.show', '24h-le-mans') }}" class="m1-card p-6 group" data-reveal>
                <span class="text-[0.55rem] font-display font-black text-[#F4B63D] tracking-widest uppercase">Endurance</span>
                <h3 class="font-display font-bold text-lg text-[#F8FAFC] mt-2 group-hover:text-[#F4B63D] transition-colors">WEC Hypercar</h3>
                <p class="text-xs text-[#8C96A3] mt-2 leading-relaxed">Balap ketahanan 24 jam dengan mobil Hypercar berteknologi tinggi.</p>
                <div class="mt-4 pt-3 border-t border-white/10 flex justify-between items-center text-xs">
                    <span class="text-[#8C96A3] font-mono">Le Mans 24H</span>
                    <span class="text-[#F4B63D] font-bold">&rarr;</span>
                </div>
            </a>

            <a href="{{ route('indycar') }}" class="m1-card p-6 group" data-reveal>
                <span class="text-[0.55rem] font-display font-black text-[#E5484D] tracking-widest uppercase">Open-Wheel</span>
                <h3 class="font-display font-bold text-lg text-[#F8FAFC] mt-2 group-hover:text-[#E5484D] transition-colors">IndyCar Series</h3>
                <p class="text-xs text-[#8C96A3] mt-2 leading-relaxed">Kecepatan ekstrem hingga 380 km/jam di oval dan sirkuit jalanan Amerika.</p>
                <div class="mt-4 pt-3 border-t border-white/10 flex justify-between items-center text-xs">
                    <span class="text-[#8C96A3] font-mono">Chevrolet</span>
                    <span class="text-[#E5484D] font-bold">&rarr;</span>
                </div>
            </a>

            <a href="{{ route('wrc') }}" class="m1-card p-6 group" data-reveal>
                <span class="text-[0.55rem] font-display font-black text-[#38C172] tracking-widest uppercase">Rally</span>
                <h3 class="font-display font-bold text-lg text-[#F8FAFC] mt-2 group-hover:text-[#38C172] transition-colors">WRC Rally</h3>
                <p class="text-xs text-[#8C96A3] mt-2 leading-relaxed">Menaklukkan jalur salju, lumpur, dan kerikil di kejuaraan reli dunia.</p>
                <div class="mt-4 pt-3 border-t border-white/10 flex justify-between items-center text-xs">
                    <span class="text-[#8C96A3] font-mono">Toyota Gazoo</span>
                    <span class="text-[#38C172] font-bold">&rarr;</span>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- ════════════════════════ ENDURANCE HUB ════════════════════════ --}}
@if(isset($enduranceEvents) && $enduranceEvents->count() > 0)
<section class="py-24 bg-[#171B20] border-t border-white/10" id="endurance" aria-label="Endurance Programs">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="mb-14" data-reveal>
            <span class="section-eyebrow mb-3">Endurance Series</span>
            <h2 class="section-title-std">Endurance Racing Programs</h2>
            <p class="section-subtitle mt-4">Empat kejuaraan ketahanan. Satu tim. Batas maksimal yang terus didorong.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($enduranceEvents as $i => $ev)
            <a href="{{ route('endurance.show', $ev->event_slug) }}"
               class="m1-card-elevated p-6 group"
               data-reveal>
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <span class="text-[0.55rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase">{{ $ev->championship }}</span>
                        <h3 class="font-display font-bold text-lg text-[#F8FAFC] mt-1 group-hover:text-[#B8E637] transition-colors">{{ $ev->event_name }}</h3>
                        <p class="text-xs text-[#8C96A3] mt-1">{{ $ev->circuit_name }} &middot; {{ $ev->country }}</p>
                        <div class="flex flex-wrap gap-2 mt-3">
                            <span class="m1-badge-muted text-[0.5rem] py-0.5 px-2">{{ $ev->class_category }}</span>
                            <span class="m1-badge-muted text-[0.5rem] py-0.5 px-2">{{ $ev->car_used }}</span>
                            @if($ev->highest_finish_position)
                            <span class="m1-badge text-[0.5rem] py-0.5 px-2">Best: P{{ $ev->highest_finish_position }}</span>
                            @endif
                        </div>
                    </div>
                    @if($ev->best_lap_time)
                    <div class="flex flex-col items-center gap-0.5 flex-shrink-0">
                        <span class="font-display font-bold text-sm text-[#B8E637]">{{ $ev->best_lap_time }}</span>
                        <span class="text-[0.5rem] text-[#8C96A3] font-display font-bold tracking-widest uppercase">Best Lap</span>
                    </div>
                    @endif
                </div>
                <div class="mt-4 pt-3 border-t border-white/10 flex justify-between items-center text-xs">
                    <span class="text-[#8C96A3]">{{ $ev->track_length_km ?? '—' }} km per lap</span>
                    <span class="text-[#B8E637] font-bold group-hover:gap-2 transition-all">View Race &rarr;</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ════════════════════════ PIT WALL LIVE FEED ════════════════════════ --}}
<section class="py-20 bg-[#111315]" id="live-feed" aria-label="Live Race Feed">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-10 items-start">
            <div class="lg:col-span-4" data-reveal>
                <span class="section-eyebrow mb-3">Pit Wall</span>
                <h2 class="section-title-std">Live Race Feed</h2>
                <p class="section-subtitle mt-4">Simulasi telemetry dan komunikasi strategis dari paddock M1TRG.</p>
            </div>
            <div class="lg:col-span-8" data-reveal>
                <div class="m1-card-elevated p-6 min-h-[280px] flex flex-col justify-between">
                    <div class="space-y-3 font-mono text-xs overflow-y-auto max-h-[320px] pr-2" id="live-feed-log">
                        <div class="text-[#8C96A3]">[10:42:01] SYSTEM: Live feed connection established.</div>
                        <div class="text-[#D2D6DC]"><span class="text-[#B8E637]">[10:42:15] PIT WALL:</span> Driver George Russell — slight understeer at Turn 12.</div>
                        <div class="text-[#D2D6DC]"><span class="text-[#B8E637]">[10:43:05] TELEMETRY:</span> Front tire wear 42%. Fuel for 12 laps.</div>
                        <div class="text-[#38C172] font-semibold"><span class="text-[#B8E637]">[10:44:20] PIT ENTRY:</span> Car #99 entering pit lane. Max Verstappen preparing.</div>
                        <div class="text-[#F8FAFC] font-bold"><span class="text-[#B8E637]">[10:45:10] PIT STOP:</span> Tires swapped. Fuel topped. Stop: 2.15s.</div>
                    </div>
                    <div class="mt-4 pt-3 border-t border-white/10 flex justify-between text-[0.55rem] text-[#8C96A3]">
                        <span class="font-display font-semibold tracking-wider uppercase">Source: M1TRG Telemetry v4</span>
                        <span class="flex items-center gap-1.5 text-[#38C172]">
                            <span class="w-1.5 h-1.5 bg-[#38C172] rounded-full animate-ping inline-block"></span>
                            Feed Active
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#111315] h-16 relative" aria-hidden="true">
    <div class="border-t border-white/10 absolute inset-x-0 top-0"></div>
</section>

@endsection

@push('scripts')
<script>
(function() {
    // Countdown
    const secs = {{ $countdownSeconds ?? 0 }};
    if (secs > 0) {
        const target = Date.now() + secs * 1000;
        const els = {
            d: document.getElementById('cd-d'),
            h: document.getElementById('cd-h'),
            m: document.getElementById('cd-m'),
            s: document.getElementById('cd-s'),
        };
        const p = n => String(n).padStart(2,'0');
        function tick() {
            const diff = Math.max(0, Math.floor((target - Date.now()) / 1000));
            if (els.d) els.d.textContent = p(Math.floor(diff / 86400));
            if (els.h) els.h.textContent = p(Math.floor((diff % 86400) / 3600));
            if (els.m) els.m.textContent = p(Math.floor((diff % 3600) / 60));
            if (els.s) els.s.textContent = p(diff % 60);
            if (diff > 0) setTimeout(tick, 1000);
        }
        tick();
    }

    // Live feed
    const feedLog = document.getElementById('live-feed-log');
    if (feedLog) {
        const events = [
            { time: '10:46:12', type: 'TRACK', msg: 'Green flag active. Verstappen sets personal best Sector 1 (38.84s).' },
            { time: '10:47:04', type: 'TELEMETRY', msg: 'Lap 183: 2:21.450. Gap to P2 extends to 0.741s.' },
            { time: '10:48:30', type: 'PIT WALL', msg: 'Track drying Sector 3. Analyzing slick tire crossover.' },
            { time: '10:49:15', type: 'STRATEGY', msg: 'Crossover point predicted in approximately 4 laps.' },
            { time: '10:50:50', type: 'TRACK', msg: 'Yellow Flag Sector 2. GT3 entry #88 off track at Les Combes.' },
        ];
        let index = 0;
        setInterval(() => {
            if (index < events.length) {
                const ev = events[index];
                const el = document.createElement('div');
                el.className = 'text-xs';
                let color = 'text-[#B8E637]';
                if (ev.type === 'TRACK') color = 'text-[#38C172]';
                if (ev.type === 'STRATEGY') color = 'text-[#F4B63D]';
                el.innerHTML = `<span class=\"text-[#8C96A3]\">[${ev.time}]</span> <span class=\"${color}\">[${ev.type}]:</span> ${ev.msg}`;
                feedLog.appendChild(el);
                feedLog.scrollTop = feedLog.scrollHeight;
                index++;
            } else { index = 0; }
        }, 8000);
    }
})();
</script>
@endpush