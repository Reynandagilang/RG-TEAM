@extends('layouts.rgr-premium')

@section('title', $event->event_name . ' — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG di ' . $event->event_name . '. ' . Str::limit($event->race_history_text ?? '', 140))

@php
$slugConfig = [
    '24h-le-mans' => [
        'accent'       => '#38C172',
        'accent_rgb'   => '56,193,114',
        'badge'        => 'LMP1 Hybrid',
        'tagline'      => 'Balapan Terbesar Dunia',
        'atmosphere'   => 'Klasik &middot; Bersejarah &middot; 24 Jam Kejayaan',
        'emoji_flag'   => '🇫🇷',
    ],
    '24h-spa' => [
        'accent'       => '#E5484D',
        'accent_rgb'   => '229,72,77',
        'badge'        => 'LMH Hypercar',
        'tagline'      => 'Pertempuran di Ardennes',
        'atmosphere'   => 'Dramatis &middot; Cuaca Ekstrem &middot; Balap Malam',
        'emoji_flag'   => '🇧🇪',
    ],
    '24h-nurburgring' => [
        'accent'       => '#F4B63D',
        'accent_rgb'   => '244,182,61',
        'badge'        => 'Kelas GT3',
        'tagline'      => 'Menaklukkan Neraka Hijau',
        'atmosphere'   => 'Agresif &middot; 154 Tikungan &middot; Elevasi Ekstrem',
        'emoji_flag'   => '🇩🇪',
    ],
    'imsa-6h-the-glen' => [
        'accent'       => '#B8E637',
        'accent_rgb'   => '184,230,55',
        'badge'        => 'Kelas GTP',
        'tagline'      => 'Sprint Menuju Senja',
        'atmosphere'   => 'Amerika &middot; IMSA &middot; Watkins Glen NY',
        'emoji_flag'   => '🇺🇸',
    ],
];

$cfg        = $slugConfig[$event->event_slug] ?? $slugConfig['24h-le-mans'];
$accent     = $cfg['accent'];
$accentRgb  = $cfg['accent_rgb'];
$badge      = $cfg['badge'];
$tagline    = $cfg['tagline'];
$atmosphere = $cfg['atmosphere'];
$emojiFlag  = $cfg['emoji_flag'];
@endphp

@section('content')

<section class="relative min-h-screen flex items-center overflow-hidden pt-24" style="background:#111315">
    <div class="absolute inset-0 opacity-[0.04]"
         style="background-image:linear-gradient(rgba({{ $accentRgb }},0.04) 1px, transparent 1px), linear-gradient(90deg, rgba({{ $accentRgb }},0.04) 1px, transparent 1px); background-size:65px 65px">
    </div>
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[800px] h-[500px] pointer-events-none"
         style="background:radial-gradient(ellipse, rgba({{ $accentRgb }},0.06) 0%, transparent 65%)">
    </div>

    <div class="max-w-7xl mx-auto px-6 w-full relative z-10 py-20">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div>
                <div class="flex items-center gap-2 mb-6 text-xs font-['Albert_Sans'] text-[#8C96A3]">
                    <a href="{{ route('endurance.index') }}" class="hover:text-[#F8FAFC] transition-colors">Balap Ketahanan</a>
                    <span class="text-[#8C96A3]">/</span>
                    <span style="color:{{ $accent }}">{{ $event->event_name }}</span>
                </div>

                <div class="section-eyebrow mb-4" style="color:{{ $accent }}">
                    <span style="background:{{ $accent }}"></span>
                    {{ $emojiFlag }} {{ $event->championship }}
                </div>

                <h1 class="font-['Albert_Sans'] font-black text-[clamp(2.5rem,6vw,6rem)] leading-[0.95] tracking-[-0.02em] text-[#F8FAFC] mb-4">
                    @php $words = explode(' ', $event->event_name, 3); @endphp
                    {{ $words[0] ?? '' }}
                    <span style="color:{{ $accent }}">{{ implode(' ', array_slice($words, 1)) }}</span>
                </h1>

                <p class="text-[#D2D6DC] text-lg mb-3 font-['Sora']">{{ $tagline }}</p>
                <p class="text-sm font-['Albert_Sans'] tracking-widest uppercase mb-8" style="color:{{ $accent }}">
                    {{ $atmosphere }}
                </p>

                <div class="flex flex-wrap items-center gap-3 mb-8">
                    <span class="font-['Albert_Sans'] font-bold text-sm tracking-widest uppercase px-4 py-2 rounded"
                          style="border:1px solid {{ $accent }}; color:{{ $accent }}; background:rgba({{ $accentRgb }},0.08)">
                        {{ $badge }}
                    </span>
                    <span class="font-['Albert_Sans'] font-bold text-sm tracking-widest uppercase px-4 py-2 rounded"
                          style="border:1px solid rgba({{ $accentRgb }},0.3); color:#F8FAFC">
                        {{ $event->car_used }}
                    </span>
                </div>

                <div class="flex flex-wrap gap-3">
                    @if($event->track_length_km)
                    <div class="m1-card-elevated px-5 py-3 text-center">
                        <span class="font-['Albert_Sans'] font-black text-2xl leading-none" style="color:{{ $accent }}">{{ $event->track_length_km }}</span>
                        <span class="block font-['Albert_Sans'] text-[0.6rem] font-bold tracking-[0.22em] uppercase text-[#8C96A3] mt-1">km/lap</span>
                    </div>
                    @endif
                    @if($event->total_laps_completed)
                    <div class="m1-card-elevated px-5 py-3 text-center">
                        <span class="font-['Albert_Sans'] font-black text-2xl leading-none" style="color:{{ $accent }}">{{ $event->total_laps_completed }}</span>
                        <span class="block font-['Albert_Sans'] text-[0.6rem] font-bold tracking-[0.22em] uppercase text-[#8C96A3] mt-1">Lap Tuntas</span>
                    </div>
                    @endif
                    @if($event->best_lap_time)
                    <div class="m1-card-elevated px-5 py-3 text-center">
                        <span class="font-['Albert_Sans'] font-black text-lg leading-none" style="color:{{ $accent }}">{{ $event->best_lap_time }}</span>
                        <span class="block font-['Albert_Sans'] text-[0.6rem] font-bold tracking-[0.22em] uppercase text-[#8C96A3] mt-1">Waktu Lap Terbaik</span>
                    </div>
                    @endif
                    @if($event->highest_finish_position)
                    <div class="m1-card-elevated px-5 py-3 text-center">
                        <span class="font-['Albert_Sans'] font-black text-2xl leading-none" style="color:{{ $accent }}">P{{ $event->highest_finish_position }}</span>
                        <span class="block font-['Albert_Sans'] text-[0.6rem] font-bold tracking-[0.22em] uppercase text-[#8C96A3] mt-1">Finis Terbaik</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="hidden lg:block">
                <div class="m1-card-elevated p-8">
                    <p class="section-eyebrow mb-2" style="color:{{ $accent }}">Skema Sirkuit</p>
                    <h3 class="font-['Albert_Sans'] font-bold text-xl text-[#F8FAFC] mb-6">{{ $event->circuit_name }}</h3>

                    <svg viewBox="0 0 400 260" class="w-full mb-6" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="circuitGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%"   stop-color="{{ $accent }}" stop-opacity="0.9"/>
                                <stop offset="100%" stop-color="{{ $accent }}" stop-opacity="0.3"/>
                            </linearGradient>
                            <filter id="glow">
                                <feGaussianBlur stdDeviation="3" result="b"/>
                                <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
                            </filter>
                        </defs>

                        @for($gx=0;$gx<=400;$gx+=40)
                        <line x1="{{ $gx }}" y1="0" x2="{{ $gx }}" y2="260" stroke="rgba({{ $accentRgb }},0.05)" stroke-width="0.5"/>
                        @endfor
                        @for($gy=0;$gy<=260;$gy+=40)
                        <line x1="0" y1="{{ $gy }}" x2="400" y2="{{ $gy }}" stroke="rgba({{ $accentRgb }},0.05)" stroke-width="0.5"/>
                        @endfor

                        @if($event->event_slug === '24h-le-mans')
                        <path d="M 60,200 L 60,80 Q 60,50 90,50 L 200,50 Q 230,50 240,70 L 290,70 Q 340,70 360,100 L 360,170 Q 360,200 330,210 L 230,210 Q 210,220 200,210 L 150,210 Q 120,220 90,210 Q 60,200 60,200 Z"
                              fill="none" stroke="url(#circuitGrad)" stroke-width="3" filter="url(#glow)"/>
                        <text x="330" y="145" text-anchor="middle" font-family="Albert Sans" font-size="8" fill="rgba({{ $accentRgb }},0.6)" letter-spacing="2">MULSANNE</text>
                        <line x1="360" y1="100" x2="360" y2="170" stroke="{{ $accent }}" stroke-width="4" opacity="0.7" filter="url(#glow)"/>

                        @elseif($event->event_slug === '24h-spa')
                        <path d="M 50,200 L 50,120 Q 55,80 100,65 L 150,70 Q 190,80 200,110 L 210,90 Q 230,50 280,60 L 340,80 Q 370,100 360,140 L 340,180 Q 320,210 280,215 L 180,215 Q 130,218 90,210 Q 50,200 50,200 Z"
                              fill="none" stroke="url(#circuitGrad)" stroke-width="3" filter="url(#glow)"/>
                        <text x="135" y="85" text-anchor="middle" font-family="Albert Sans" font-size="7" fill="rgba({{ $accentRgb }},0.7)" letter-spacing="1">EAU ROUGE</text>

                        @elseif($event->event_slug === '24h-nurburgring')
                        <path d="M 30,220 L 30,160 Q 35,130 60,110 L 90,95 Q 120,80 140,90 L 160,100 Q 180,110 190,95 L 210,75 Q 240,50 280,60 L 320,75 Q 360,95 370,130 L 365,165 Q 355,195 330,205 L 280,215 L 200,218 L 120,215 Q 70,220 30,220 Z"
                              fill="none" stroke="url(#circuitGrad)" stroke-width="2.5" filter="url(#glow)"/>
                        <text x="200" y="130" text-anchor="middle" font-family="Albert Sans" font-size="8" fill="rgba({{ $accentRgb }},0.5)" letter-spacing="2">NORDSCHLEIFE</text>
                        <circle cx="145" cy="95" r="12" fill="none" stroke="{{ $accent }}" stroke-width="1.5" opacity="0.6"/>
                        <text x="145" y="78" text-anchor="middle" font-family="Albert Sans" font-size="6" fill="{{ $accent }}" opacity="0.7">KARUSSELL</text>

                        @elseif($event->event_slug === 'imsa-6h-the-glen')
                        <path d="M 40,210 L 40,140 Q 42,100 80,80 L 140,70 Q 180,65 200,80 L 240,100 Q 270,115 280,140 L 290,160 Q 300,180 310,170 L 340,150 Q 370,140 375,170 L 370,200 Q 360,220 330,222 L 200,222 L 100,220 Q 50,218 40,210 Z"
                              fill="none" stroke="url(#circuitGrad)" stroke-width="3" filter="url(#glow)"/>
                        <text x="300" y="162" text-anchor="middle" font-family="Albert Sans" font-size="7" fill="rgba({{ $accentRgb }},0.7)" letter-spacing="1">THE BOOT</text>
                        @endif

                        <line x1="55" y1="195" x2="55" y2="215" stroke="{{ $accent }}" stroke-width="2.5" opacity="0.8"/>
                        <text x="42" y="188" font-family="Albert Sans" font-size="7" fill="{{ $accent }}" opacity="0.7" letter-spacing="1">S/F</text>
                    </svg>

                    @if(!empty($circuitData))
                    <div class="space-y-2">
                        @foreach([
                            ['label' => 'Sirkuit', 'val' => $circuitData['name'] ?? '—'],
                            ['label' => 'Panjang lintasan',  'val' => $circuitData['length'] ?? '—'],
                            ['label' => 'Jumlah Tikungan',   'val' => ($circuitData['turns'] ?? '—') . ' tikungan'],
                            ['label' => 'Rekor Putaran', 'val' => ($circuitData['lap_record'] ?? '—') . ' — ' . ($circuitData['record_holder'] ?? '')],
                            ['label' => 'Ketinggian',   'val' => $circuitData['altitude'] ?? '—'],
                        ] as $row)
                        <div class="flex justify-between items-center py-1.5 border-b border-[rgba(255,255,255,0.06)]">
                            <span class="text-[#8C96A3] text-xs font-['Albert_Sans'] tracking-widest uppercase">{{ $row['label'] }}</span>
                            <span class="text-[#F8FAFC] text-xs font-medium text-right max-w-[55%]">{{ $row['val'] }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 h-32 pointer-events-none"
         style="background:linear-gradient(0deg,#111315 0%,transparent 100%)">
    </div>
</section>

@if($event->race_history_text)
<section class="py-20 relative" style="background:#111315">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <div>
                <div class="section-eyebrow mb-3" style="color:{{ $accent }}">Kronik Balapan</div>
                <h2 class="section-title-std mb-6">Kiprah M1TRG di<br>{{ $event->event_name }}</h2>
                <p class="text-[#D2D6DC] text-base leading-relaxed font-['Sora']">{{ $event->race_history_text }}</p>
            </div>

            @if(!empty($circuitData['key_sections'] ?? []))
            <div>
                <p class="section-eyebrow mb-5" style="color:{{ $accent }}">Sektor Sirkuit Krusial</p>
                <div class="space-y-3">
                    @foreach($circuitData['key_sections'] as $i => $sec)
                    <div class="pl-4 py-4 border-l-2 transition-all duration-300 hover:pl-6"
                         style="border-color:{{ $accent }}{{ $i === 0 ? '' : '66' }}; background:rgba(23,27,32,0.5); border-radius:0 8px 8px 0">
                        <h4 class="font-['Albert_Sans'] font-bold text-base text-[#F8FAFC] mb-1">{{ $sec['name'] }}</h4>
                        <p class="text-[#D2D6DC] text-sm leading-relaxed font-['Sora']">{{ $sec['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

@if($eventCars->count() > 0)
<section class="py-20 relative" style="background:#111315">
    <div class="max-w-7xl mx-auto px-6">

        <div class="mb-10">
            <div class="section-eyebrow mb-3" style="color:{{ $accent }}">Entri Balapan</div>
            <h2 class="section-title-std">Armada {{ $event->class_category }}<br>yang Diturunkan</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            @foreach($eventCars as $i => $car)
            <div class="m1-card-elevated p-7 relative overflow-hidden transition-all duration-500 hover:-translate-y-1" id="ev-car-{{ $car->id }}">
                <span class="absolute right-[-0.5rem] top-1/2 -translate-y-1/2 font-['Albert_Sans'] font-black text-[8rem] leading-none text-[#F8FAFC]/[0.02] pointer-events-none select-none">{{ $car->car_number }}</span>
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-5">
                        <div>
                            <span class="font-['Albert_Sans'] font-black text-3xl" style="color:{{ $accent }}">#{{ $car->car_number }}</span>
                            <p class="text-[#F8FAFC] font-['Albert_Sans'] font-bold text-xl mt-1">{{ $car->model_name }}</p>
                            @if($car->championship) <p class="text-[#8C96A3] text-xs font-['Albert_Sans'] mt-0.5">{{ $car->championship }}</p> @endif
                        </div>
                        @if($car->class_entry)
                        <span class="m1-badge text-xs" style="color:{{ $accent }}; border-color:rgba({{ $accentRgb }},0.3); background:rgba({{ $accentRgb }},0.08)">{{ $car->class_entry }}</span>
                        @endif
                    </div>

                    <div class="grid grid-cols-2 gap-x-6 gap-y-2 mb-5">
                        @foreach([
                            ['Unit Tenaga', $car->power_unit],
                            ['Output Daya', ($car->power_hp ? number_format($car->power_hp).' HP' : '—')],
                            ['Sasis',     $car->chassis],
                            ['Kec. Maksimal',   ($car->top_speed ? $car->top_speed.' km/jam' : '—')],
                            ['Bobot Mobil',      ($car->weight ? $car->weight.' kg' : '—')],
                            ['Ban Resmi',       ($car->tyre_supplier ?? '—')],
                        ] as [$lbl, $val])
                        <div>
                            <p class="text-[#8C96A3] text-xs font-['Albert_Sans'] uppercase tracking-widest">{{ $lbl }}</p>
                            <p class="text-[#F8FAFC] text-sm font-medium mt-0.5">{{ $val }}</p>
                        </div>
                        @endforeach
                    </div>

                    @if($car->aerodynamics_desc)
                    <div class="pt-4 border-t border-[rgba(255,255,255,0.06)]">
                        <p class="section-eyebrow mb-1" style="color:{{ $accent }}">Paket Aerodinamika</p>
                        <p class="text-[#D2D6DC] text-sm leading-relaxed font-['Sora']">{{ $car->aerodynamics_desc }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if(!empty($challengeData))
<section class="py-20 relative" style="background:#111315">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-10">
            <div class="section-eyebrow mb-3" style="color:{{ $accent }}">Intelijen Rekayasa (Engineering)</div>
            <h2 class="section-title-std">Tantangan Balapan</h2>
        </div>

        <div class="space-y-4">
            @foreach($challengeData as $i => $ch)
            <div class="m1-card p-6 transition-all duration-300 hover:translate-x-1"
                 style="border-left:3px solid {{ $accent }}"
                 id="challenge-{{ $i }}">
                <h4 class="font-['Albert_Sans'] font-bold text-lg text-[#F8FAFC] mb-2">{{ $ch['title'] }}</h4>
                <p class="text-[#D2D6DC] text-sm leading-relaxed font-['Sora']">{{ $ch['body'] ?? $ch['desc'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="py-16 border-t border-[rgba(255,255,255,0.06)]" style="background:#111315">
    <div class="max-w-7xl mx-auto px-6">
        <div class="section-eyebrow mb-6 justify-center">Seri Balap Ketahanan Lainnya</div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
            @foreach($enduranceNavMap as $slug => $name)
            <a href="{{ route('endurance.show', $slug) }}"
               class="block px-4 py-3 text-center font-['Albert_Sans'] text-xs font-semibold tracking-wider uppercase transition-all duration-300 rounded"
               style="{{ $slug === $event->event_slug ? 'background:rgba(184,230,55,0.1); color:#B8E637; border:1px solid rgba(184,230,55,0.3)' : 'border:1px solid rgba(255,255,255,0.06); color:#8C96A3' }}"
               id="evnav-{{ $slug }}">
                {{ $name }}
            </a>
            @endforeach
        </div>
        <div class="text-center mt-6">
            <a href="{{ route('endurance.index') }}" class="btn-m1-ghost text-xs" id="btn-all-events">
                &larr; Lihat Semua Balapan Ketahanan
            </a>
        </div>
    </div>
</section>

@endsection