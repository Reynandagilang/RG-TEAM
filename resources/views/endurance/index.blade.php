@extends('layouts.rgr-premium')

@section('title', 'Seri Balap Ketahanan — Mobil 1 Team RG')
@section('meta_description', 'Program Balap Ketahanan Mobil 1 Team RG — Le Mans 24 Jam, Nürburgring 24 Jam, dan IMSA 6 Jam The Glen. Tiga balapan legendaris, empat kelas, satu tim.')

@section('content')

<section class="relative pt-32 pb-16 overflow-hidden" style="background:#111315">
    <div class="absolute inset-0 opacity-[0.03]"
         style="background-image:linear-gradient(rgba(184,230,55,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(184,230,55,0.03) 1px, transparent 1px); background-size:65px 65px">
    </div>
    <div class="absolute left-0 top-0 bottom-0 w-[3px] hidden lg:block"
         style="background:linear-gradient(180deg,transparent,#B8E637 35%,#B8E637 65%,transparent)">
    </div>

    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="section-eyebrow mb-4">Program Balap Global</div>
        <h1 class="section-title-std mb-5">Balap Ketahanan</h1>
        <p class="font-['Sora'] text-[#D2D6DC] text-lg max-w-2xl leading-relaxed">
            Dari Trek Lurus Mulsanne yang legendaris hingga trek Green Hell Nordschleife — Mobil 1 Team RG bersaing di ajang balap ketahanan paling ekstrem di dunia yang mencakup tiga kejuaraan internasional dan empat kategori mobil.
        </p>
    </div>
</section>

<section class="py-16 pb-24" style="background:#111315">
    <div class="max-w-7xl mx-auto px-6">

        @php
        $eventColors = [
            '24h-le-mans'      => '#38C172',
            '24h-spa'          => '#E5484D',
            '24h-nurburgring'  => '#F4B63D',
            'imsa-6h-the-glen' => '#B8E637',
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($enduranceRaces as $i => $ev)
            @php $evColor = $eventColors[$ev->event_slug] ?? '#B8E637'; @endphp
            <a href="{{ route('endurance.show', $ev->event_slug) }}"
               class="m1-card relative overflow-hidden group block transition-all duration-500 hover:-translate-y-1"
               id="event-{{ $ev->id }}">

                <div class="absolute left-0 top-0 bottom-0 w-[3px] transition-all duration-500 group-hover:w-[4px]"
                     style="background:linear-gradient(180deg, transparent, {{ $evColor }}, transparent)">
                </div>
                <div class="absolute right-[-2rem] bottom-[-2rem] font-['Albert_Sans'] font-black text-[12rem] leading-none text-[#F8FAFC]/[0.015] pointer-events-none select-none">
                    {{ $i + 1 }}
                </div>

                <div class="p-8 pl-10 relative z-10">
                    <div class="mb-5">
                        <p class="text-[#8C96A3] text-xs font-['Albert_Sans'] tracking-widest uppercase mb-2">{{ $ev->championship }}</p>
                        <h2 class="text-[#F8FAFC] font-['Albert_Sans'] font-black text-2xl lg:text-3xl leading-tight mb-2">{{ $ev->event_name }}</h2>
                        <p class="text-[#D2D6DC] text-sm">{{ $ev->circuit_name }} &middot; {{ $ev->country }}</p>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div>
                            <p class="font-['Albert_Sans'] font-bold text-xl" style="color:{{ $evColor }}">{{ $ev->class_category }}</p>
                            <p class="text-[#8C96A3] text-xs font-['Albert_Sans'] uppercase tracking-widest mt-1">Kelas</p>
                        </div>
                        <div>
                            <p class="text-[#F8FAFC] font-['Albert_Sans'] font-bold text-xl">{{ $ev->best_lap_time ?? '—' }}</p>
                            <p class="text-[#8C96A3] text-xs font-['Albert_Sans'] uppercase tracking-widest mt-1">Lap Terbaik</p>
                        </div>
                        <div>
                            <p class="text-[#F8FAFC] font-['Albert_Sans'] font-bold text-xl">P{{ $ev->highest_finish_position ?? '—' }}</p>
                            <p class="text-[#8C96A3] text-xs font-['Albert_Sans'] uppercase tracking-widest mt-1">Finis Terbaik</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 mb-4">
                        <span class="m1-badge text-[0.65rem]" style="background:{{ $evColor }}11; color:{{ $evColor }}; border-color:{{ $evColor }}33">
                            {{ $ev->car_used }}
                        </span>
                        @if($ev->track_length_km)
                        <span class="m1-badge-muted text-[0.65rem]">{{ $ev->track_length_km }} km</span>
                        @endif
                        @if($ev->total_laps_completed)
                        <span class="m1-badge-muted text-[0.65rem]">{{ $ev->total_laps_completed }} Putaran</span>
                        @endif
                    </div>

                    <div class="flex items-center justify-between pt-5 border-t border-[rgba(255,255,255,0.06)]">
                        <p class="text-[#8C96A3] text-sm leading-relaxed line-clamp-2 max-w-sm font-['Sora']">
                            {{ Str::limit($ev->race_history_text ?? '', 100) }}
                        </p>
                        <span class="flex items-center gap-1 font-['Albert_Sans'] font-bold text-sm ml-4 flex-shrink-0 transition-colors group-hover:gap-2" style="color:{{ $evColor }}">
                            Jelajahi
                            <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                </div>

            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection