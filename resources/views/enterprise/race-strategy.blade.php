@extends('layouts.rgr-premium')

@section('title', 'Race Strategy Simulator — Simulasi Strategi Pitstop — Mobil 1 Team RG')
@section('meta_description', 'Simulator strategi balap interaktif Mobil 1 Team RG. Hitung jendela pit optimal, kompound ban, dan prediksi cuaca untuk setiap sirkuit.')

@section('content')
@php
    $strategyJson = json_encode($strategy);
    $weatherAdviceJson = json_encode($weatherAdvice);
@endphp

<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]"
     x-data="strategySim()"
     x-init="init()"
     x-cloak
     data-strategy='{{ $strategyJson }}'
     data-weather-advice='{{ $weatherAdviceJson }}'
     data-circuits='@json($circuits)'
     data-tire-compounds='@json($tireCompounds)'>
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-6 border-b border-white/10 gap-4">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="inline-block px-3 py-1 text-xs font-bold font-mono tracking-wider uppercase bg-[#1A8FFF]/20 text-[#1A8FFF] border border-[#1A8FFF]/30 rounded">
                        STRATEGY LAB
                    </span>
                    <span class="text-xs text-[#B8E637] font-mono animate-pulse">• COMPUTER-AIDED OPTIMIZATION</span>
                </div>
                <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC] tracking-tight">
                    RACE STRATEGY SIMULATOR
                </h1>
                <p class="text-sm md:text-base text-[#8C96A3] mt-2 max-w-3xl">
                    Hitung jendela pit optimal, prediksi kompound ban, dan rekomendasi cuaca berdasarkan model AI superkomputer M1TRG.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('enterprise.logistics') }}" class="px-4 py-2.5 rounded text-xs font-mono font-bold tracking-wider uppercase bg-[#181B1F] border border-white/10 text-white hover:border-[#E10600] transition-colors flex items-center gap-2">
                    Lihat Logistics Hub
                </a>
                <a href="{{ route('enterprise.engineering') }}" class="px-4 py-2.5 rounded text-xs font-mono font-bold tracking-wider uppercase bg-[#181B1F] border border-white/10 text-white hover:border-[#E10600] transition-colors flex items-center gap-2">
                    Ke Engineering Dashboard
                </a>
            </div>
        </div>

        <!-- Strategy Control Panel -->
        <div class="grid grid-cols-1 xl:grid-cols-4 gap-8 mb-12">

            <!-- Controls -->
            <div class="xl:col-span-1 space-y-6">
                <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                    <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#1A8FFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 .697-.09 1.374-.267 2.032A4.005 4.0 0 017 17a4 4 0 01-.033-7.729 7.5 7.5 0 011.937-1.128 7 7 0 011.407-2.126 1A1 1 0 0112 9.5v1.5z"/></svg>
                        Konfigurasi Simulasi
                    </h3>

                    <div class="space-y-5 text-xs font-mono">
                        <div>
                            <label class="block text-[#8C96A3] uppercase tracking-wider mb-2">Sirkuit</label>
                            <select x-model="circuitLaps" @change="recalcStrategy()"
                                class="w-full bg-[#171B20] border border-white/10 rounded px-3 py-2.5 text-white focus:border-[#1A8FFF] focus:outline-none">
                                <template x-for="[name, laps] in Object.entries(circuits)" :key="name">
                                    <option :value="laps" x-text="name + ' (' + laps + ' laps)'"></option>
                                </template>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[#8C96A3] uppercase tracking-wider mb-2">Kompound Utama</label>
                            <select x-model="primary" @change="recalcStrategy()"
                                class="w-full bg-[#171B20] border border-white/10 rounded px-3 py-2.5 text-white focus:border-[#1A8FFF] focus:outline-none">
                                <template x-for="[key, info] in tireCompounds" :key="key">
                                    <option :value="key" x-text="key + ' — ' + info.avg_life_laps + ' avg laps'"></option>
                                </template>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[#8C96A3] uppercase tracking-wider mb-2">Kompound Cadangan</label>
                            <select x-model="secondary" @change="recalcStrategy()"
                                class="w-full bg-[#171B20] border border-white/10 rounded px-3 py-2.5 text-white focus:border-[#1A8FFF] focus:outline-none">
                                <template x-for="[key, info] in tireCompounds" :key="key">
                                    <option :value="key" x-text="key + ' — ' + info.avg_life_laps + ' avg laps'"></option>
                                </template>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[#8C96A3] uppercase tracking-wider mb-2">Kondisi Cuaca</label>
                            <div class="grid grid-cols-2 gap-2">
                                <button @click="setWeather('dry')" :class="weather === 'dry' ? 'border-[#1A8FFF]/40 bg-[#1A8FFF]/10' : 'border-white/10'" class="weather-btn py-2 rounded transition-all border">
                                    <span class="text-lg">☀️</span><span class="block mt-0.5">Dry</span>
                                </button>
                                <button @click="setWeather('damp')" :class="weather === 'damp' ? 'border-cyan-400/40 bg-cyan-400/10' : 'border-white/10'" class="weather-btn py-2 rounded transition-all border">
                                    <span class="text-lg">🌤️</span><span class="block mt-0.5">Damp</span>
                                </button>
                                <button @click="setWeather('wet')" :class="weather === 'wet' ? 'border-blue-400/40 bg-blue-400/10' : 'border-white/10'" class="weather-btn py-2 rounded transition-all border">
                                    <span class="text-lg">🌧️</span><span class="block mt-0.5">Wet</span>
                                </button>
                                <button @click="setWeather('raining')" :class="weather === 'raining' ? 'border-indigo-400/40 bg-indigo-400/10' : 'border-white/10'" class="weather-btn py-2 rounded transition-all border">
                                    <span class="text-lg">🌧️</span><span class="block mt-0.5">Rain</span>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[#8C96A3] uppercase tracking-wider mb-2">Estimasi Bahan Bakar</label>
                            <div class="bg-[#171B20] border border-white/5 rounded p-3">
                                <div class="flex justify-between text-xs font-mono mb-1">
                                    <span class="text-[#8C96A3]">Total Fuel (kg)</span>
                                    <span class="text-[#B8E637] font-bold" x-text="strategy.fuel_total_kg + ' kg'"></span>
                                </div>
                                <div class="w-full bg-white/5 h-2 rounded-full overflow-hidden">
                                    <div class="bg-gradient-to-r from-[#1A8FFF] to-[#B8E637] h-full rounded-full transition-all"
                                         :style="`width: ${strategy.fuel_stint1_kg / (strategy.fuel_total_kg || 1) * 100}%`"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Strategy Summary Card -->
                <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                    <h3 class="font-display font-bold text-base text-[#F8FAFC] mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#F4B63D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        Ringkasan Strategi
                    </h3>
                    <div class="space-y-3 font-mono text-xs">
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Total Stops:</span>
                            <span class="text-[#B8E637] font-bold" x-text="strategy.stops_required + ' pits'"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Total Pit Loss:</span>
                            <span class="text-[#F8FAFC] font-bold" x-text="strategy.total_pit_loss + 's'"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Undercut:</span>
                            <span class="text-emerald-400 font-bold" x-text="strategy.undercut_viable ? 'Viable' : 'Not Viable'"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Overcut:</span>
                            <span class="text-amber-400 font-bold" x-text="strategy.overcut_viable ? 'Viable' : 'Not Viable'"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Weather Advice:</span>
                            <span class="text-cyan-400 font-bold text-[10px]" x-text="weatherAdvice.recommendation"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Strategy Visualization: Stint Timeline -->
            <div class="xl:col-span-3">
                <!-- Timeline -->
                <div class="bg-[#141619] border border-white/10 rounded-xl p-6 mb-8">
                    <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#B8E637]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Timeline Strategi Balap
                    </h3>

                    <div class="relative h-24 mb-4">
                        <div class="w-full h-8 bg-[#1A1D21] rounded-full border border-white/5 relative overflow-hidden">
                            <template x-for="n in 10" :key="n">
                                <div class="absolute top-0 bottom-0 border-l border-white/5"
                                     :style="`left: ${(n-1) * 10}%`"></div>
                            </template>
                            <template x-for="(stint, index) in strategy.stint_plan" :key="stint.stint">
                                <div class="absolute top-0 h-full rounded flex items-center justify-center"
                                     :style="getSegmentStyle(index)">
                                    <span class="text-[10px] font-black text-white" x-text="stint.compound"></span>
                                </div>
                            </template>
                        </div>

                        <template x-for="(stint, index) in strategy.stint_plan" :key="'pit-' + index">
                            <div x-show="index < strategy.stint_plan.length - 1" class="absolute bottom-2" :style="getPitPosition(index)">
                                <div class="w-4 h-4 bg-[#E10600] rounded-full animate-bounce shadow-lg shadow-[#E10600]/50"></div>
                                <span class="block text-[9px] text-[#E10600] font-mono mt-0.5">PIT</span>
                            </div>
                        </template>
                    </div>

                    <!-- Stint Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <template x-for="stint in strategy.stint_plan" :key="stint.stint">
                            <div class="bg-[#171A1E] border border-white/5 rounded-xl p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-mono text-[#8C96A3] uppercase">Stint <span x-text="stint.stint"></span></span>
                                    <span class="px-2.5 py-0.5 rounded text-xs font-mono font-bold"
                                          :class="getCompoundBadgeClass(stint.compound)" x-text="stint.compound"></span>
                                </div>
                                <div class="space-y-2.5 font-mono text-xs">
                                    <div class="flex justify-between">
                                        <span class="text-[#8C96A3]">Jumlah Lap</span>
                                        <span class="text-[#F8FAFC] font-bold" x-text="stint.laps + ' laps'"></span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-[#8C96A3]">Est. Stint Time</span>
                                        <span class="text-[#B8E637] font-bold" x-text="stint.estimated_time + 's'"></span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-[#8C96A3]">Pit Window</span>
                                        <span class="text-[#F4B63D] font-bold" x-text="stint.pit_window_start + '-' + stint.pit_window_end"></span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-[#8C96A3]">Fuel on Start</span>
                                        <span class="text-cyan-400 font-bold" x-text="stint.start_fuel + ' kg'"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- DRS Zones & Weather Advice -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                        <h3 class="font-display font-bold text-base text-[#F8FAFC] mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#B8E637]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            DRS Detection Zones
                        </h3>
                        <div class="space-y-3">
                            <template x-for="zone in strategy.drs_zones" :key="zone.zone">
                                <div class="flex items-center justify-between p-3 bg-[#171B20] rounded-lg border border-white/5">
                                    <div>
                                        <span class="font-mono text-xs text-[#8C96A3] uppercase">Zone <span x-text="zone.zone"></span></span>
                                        <div class="text-sm font-bold text-[#F8FAFC]" x-text="zone.name"></div>
                                    </div>
                                    <div class="text-right">
                                        <span class="font-mono text-xs text-[#B8E637]" x-text="zone.avg_speed_gain_kmh + ' km/h'"></span>
                                        <div class="text-[10px] text-[#8C96A3] font-mono" x-text="'detection → target: ' + zone.detection_to_target + 'm'"></div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                        <h3 class="font-display font-bold text-base text-[#F8FAFC] mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.653A9 9 0 018.346 3.647 9 9 0 0012 21a9 9 0 0 8.354-5.347z"/></svg>
                            Analisis & Rekomendasi
                        </h3>
                        <div class="space-y-3 font-mono text-xs">
                            <div class="p-3 bg-[#171B20] rounded-lg border border-white/5">
                                <span class="text-[#8C96A3] block mb-1">Undercut Strategy</span>
                                <span class="text-[#B8E637] font-bold" x-text="strategy.undercut_viable ? 'Viable — pitorcel early untuk undercut pesaing' : 'Not viable'"></span>
                            </div>
                            <div class="p-3 bg-[#171B20] rounded-lg border border-white/5">
                                <span class="text-[#8C96A3] block mb-1">Overcut Strategy</span>
                                <span class="text-[#B8E637] font-bold" x-text="strategy.overcut_viable ? 'Viable — extend stint untuk overcut' : 'Not viable'"></span>
                            </div>
                            <div class="p-3 bg-[#171B20] rounded-lg border border-white/5">
                                <span class="text-[#8C96A3] block mb-1">Weather Advice</span>
                                <span class="text-cyan-400 font-bold" x-text="weatherAdvice.recommendation"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('strategySim', () => ({
        circuitLaps: 78,
        primary: 'MEDIUM',
        secondary: 'SOFT',
        weather: 'dry',
        strategy: null,
        weatherAdvice: null,
        circuits: {},
        tireCompounds: {},
        loading: false,

        init() {
            this.circuits = JSON.parse(this.$el.dataset.circuits || '{}');
            this.tireCompounds = JSON.parse(this.$el.dataset.tireCompounds || '{}');
            this.strategy = JSON.parse(this.$el.dataset.strategy || '{}');
            this.weatherAdvice = JSON.parse(this.$el.dataset.weatherAdvice || '{}');
        },

        async recalcStrategy() {
            this.loading = true;
            try {
                const res = await fetch('{{ route('enterprise.strategy-calculate') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        laps: this.circuitLaps,
                        primary: this.primary,
                        secondary: this.secondary,
                        weather: this.weather,
                    })
                });
                const data = await res.json();
                this.strategy = data.strategy;
                this.weatherAdvice = data.weather_advice;
            } catch(e) {
                console.error('Strategy calculation failed:', e);
            }
            this.loading = false;
        },

        setWeather(condition) {
            this.weather = condition;
            this.recalcStrategy();
        },

        getCompoundColor(compound) {
            const colors = {
                'SOFT': '#EF4444',
                'MEDIUM': '#FBBF24',
                'HARD': '#F3F4F6',
                'INTERMEDIATE': '#06B7E0',
                'FULL_WET': '#3B82F6'
            };
            return colors[compound] || '#6B7280';
        },

        getCompoundBadgeClass(compound) {
            const classes = {
                'SOFT': 'bg-red-500/10 text-red-400 border border-red-500/30',
                'MEDIUM': 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/30',
                'HARD': 'bg-white/10 text-zinc-300 border border-white/20',
                'INTERMEDIATE': 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/30',
                'FULL_WET': 'bg-blue-500/10 text-blue-400 border border-blue-500/30'
            };
            return classes[compound] || 'bg-zinc-500/10 text-zinc-400 border border-zinc-500/30';
        },

        getSegmentStyle(index) {
            if (!this.strategy.stint_plan) return {};
            const total = this.strategy.stint_plan.length;
            const stint = this.strategy.stint_plan[index];
            const cumulative = this.strategy.stint_plan.slice(0, index).reduce((sum, s) => sum + s.laps, 0);
            const widthPct = (stint.laps / this.circuitLaps) * 100;
            const leftPct = (cumulative / this.circuitLaps) * 100;
            return {
                left: leftPct + '%',
                width: widthPct + '%',
                background: this.getCompoundColor(stint.compound) + '40',
                border: '1px solid ' + this.getCompoundColor(stint.compound)
            };
        },

        getPitPosition(index) {
            if (!this.strategy.stint_plan) return { display: 'none' };
            const total = this.strategy.stint_plan.length;
            if (index >= total - 1) return { display: 'none' };
            const cumulative = this.strategy.stint_plan.slice(0, index + 1).reduce((sum, s) => sum + s.laps, 0);
            const leftPct = (cumulative / this.circuitLaps) * 100;
            return { left: leftPct + '%' };
        }
    }));
});
</script>
@endpush
