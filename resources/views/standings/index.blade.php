@extends('layouts.rgr-premium')

@section('title', 'Klasemen Kejuaraan Dunia 2026 | Mobil 1 Team RG')
@section('meta_description', 'Pantau posisi klasemen langsung pembalap dan konstruktor Mobil 1 Team RG di kejuaraan Formula 1 2026.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20" style="background:#111315" x-data="{ tab: 'drivers' }">

    <div class="max-w-7xl mx-auto px-6 mb-12">
        <div class="section-eyebrow mb-4">LIVE STANDINGS</div>
        <h1 class="section-title-std mb-4">KLASEMEN KEJUARAAN</h1>
        <p class="font-['Sora'] text-[#D2D6DC] text-sm max-w-xl leading-relaxed">
            Hasil pengumpulan poin real-time tim Mobil 1 Team RG di panggung motorsport FIA Formula 1 World Championship.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 mb-10">
        <div class="flex gap-4 border-b border-[rgba(255,255,255,0.06)] pb-3" role="tablist" aria-label="Pilih Tipe Klasemen">
            <button
                @click="tab = 'drivers'"
                :class="tab === 'drivers' ? 'border-[#B8E637] text-[#F8FAFC] bg-[#B8E637]/10' : 'border-transparent text-[#8C96A3] hover:text-[#F8FAFC]'"
                class="px-5 py-2.5 text-xs font-['Albert_Sans'] tracking-wider uppercase border-b-2 font-bold transition-all duration-300"
                role="tab" :aria-selected="tab === 'drivers'" aria-controls="tab-drivers">
                Klasemen Pembalap
            </button>
            <button
                @click="tab = 'constructors'"
                :class="tab === 'constructors' ? 'border-[#B8E637] text-[#F8FAFC] bg-[#B8E637]/10' : 'border-transparent text-[#8C96A3] hover:text-[#F8FAFC]'"
                class="px-5 py-2.5 text-xs font-['Albert_Sans'] tracking-wider uppercase border-b-2 font-bold transition-all duration-300"
                role="tab" :aria-selected="tab === 'constructors'" aria-controls="tab-constructors">
                Klasemen Konstruktor
            </button>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6">

        <div x-show="tab === 'drivers'" id="tab-drivers" role="tabpanel" aria-label="Klasemen Pembalap" class="m1-card overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-[rgba(255,255,255,0.06)]" style="background:#171B20">
                            <th class="py-4 px-6 text-xs font-['Albert_Sans'] tracking-wider text-[#8C96A3] uppercase font-bold w-16">Pos</th>
                            <th class="py-4 px-6 text-xs font-['Albert_Sans'] tracking-wider text-[#8C96A3] uppercase font-bold">Pembalap</th>
                            <th class="py-4 px-6 text-xs font-['Albert_Sans'] tracking-wider text-[#8C96A3] uppercase font-bold">Konstruktor / Tim</th>
                            <th class="py-4 px-6 text-xs font-['Albert_Sans'] tracking-wider text-[#8C96A3] uppercase font-bold text-center w-24">Kemenangan</th>
                            <th class="py-4 px-6 text-xs font-['Albert_Sans'] tracking-wider text-[#8C96A3] uppercase font-bold text-right w-32">Poin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[rgba(255,255,255,0.06)] font-['Sora'] text-sm">
                        @foreach($driverStandings as $stand)
                        <tr class="hover:bg-[#282E37] transition-colors {{ $stand['team'] === 'Mobil 1 Team RG' || $stand['team'] === 'RG Racing' ? 'bg-[#B8E637]/[0.03]' : '' }}">
                            <td class="py-4 px-6">
                                @if($stand['pos'] <= 3)
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-full font-['Albert_Sans'] font-black text-sm
                                    {{ $stand['pos'] === 1 ? 'bg-[#F4B63D]/20 text-[#F4B63D]' : ($stand['pos'] === 2 ? 'bg-[#8C96A3]/20 text-[#D2D6DC]' : 'bg-[#B8E637]/20 text-[#B8E637]') }}">
                                    {{ $stand['pos'] }}
                                </span>
                                @else
                                <span class="font-['Albert_Sans'] font-black text-lg text-[#8C96A3]">{{ $stand['pos'] }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 font-['Albert_Sans'] font-bold text-[#F8FAFC]">{{ $stand['name'] }}</td>
                            <td class="py-4 px-6 font-['Albert_Sans'] tracking-wide text-[#8C96A3] uppercase text-xs">{{ $stand['team'] }}</td>
                            <td class="py-4 px-6 text-center text-[#F8FAFC] font-['Albert_Sans'] font-semibold">{{ $stand['wins'] }}</td>
                            <td class="py-4 px-6 text-right font-['Albert_Sans'] font-bold text-[#B8E637] text-base">{{ $stand['points'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="tab === 'constructors'" class="m1-card overflow-hidden" style="display: none;">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-[rgba(255,255,255,0.06)]" style="background:#171B20">
                            <th class="py-4 px-6 text-xs font-['Albert_Sans'] tracking-wider text-[#8C96A3] uppercase font-bold w-16">Pos</th>
                            <th class="py-4 px-6 text-xs font-['Albert_Sans'] tracking-wider text-[#8C96A3] uppercase font-bold">Konstruktor</th>
                            <th class="py-4 px-6 text-xs font-['Albert_Sans'] tracking-wider text-[#8C96A3] uppercase font-bold text-center w-24">Kemenangan</th>
                            <th class="py-4 px-6 text-xs font-['Albert_Sans'] tracking-wider text-[#8C96A3] uppercase font-bold text-right w-32">Poin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[rgba(255,255,255,0.06)] font-['Sora'] text-sm">
                        @foreach($constructorStandings as $stand)
                        <tr class="hover:bg-[#282E37] transition-colors {{ $stand['name'] === 'Mobil 1 Team RG' || $stand['name'] === 'RG Racing' ? 'bg-[#B8E637]/[0.03]' : '' }}">
                            <td class="py-4 px-6">
                                @if($stand['pos'] <= 3)
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-full font-['Albert_Sans'] font-black text-sm
                                    {{ $stand['pos'] === 1 ? 'bg-[#F4B63D]/20 text-[#F4B63D]' : ($stand['pos'] === 2 ? 'bg-[#8C96A3]/20 text-[#D2D6DC]' : 'bg-[#B8E637]/20 text-[#B8E637]') }}">
                                    {{ $stand['pos'] }}
                                </span>
                                @else
                                <span class="font-['Albert_Sans'] font-black text-lg text-[#8C96A3]">{{ $stand['pos'] }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 flex items-center gap-3">
                                <span class="w-2.5 h-2.5 rounded-full" style="background-color: {{ $stand['color'] }}"></span>
                                <span class="font-['Albert_Sans'] font-bold text-[#F8FAFC]">{{ $stand['name'] }}</span>
                            </td>
                            <td class="py-4 px-6 text-center text-[#F8FAFC] font-['Albert_Sans'] font-semibold">{{ $stand['wins'] }}</td>
                            <td class="py-4 px-6 text-right font-['Albert_Sans'] font-bold text-[#B8E637] text-base">{{ $stand['points'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection