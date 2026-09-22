@extends('layouts.rgr-premium')

@section('title', 'Track Weather & Meteorological Radar — Mobil 1 Team RG')
@section('meta_description', 'Pusat prakiraan cuaca, temperatur aspal sirkuit, dan peluang hujan real-time Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-10 pb-6 border-b border-white/10">
            <span class="inline-block px-3 py-1 text-xs font-bold font-mono tracking-wider uppercase bg-[#E10600]/20 text-[#E10600] border border-[#E10600]/30 rounded mb-2">
                METEOROLOGY STATION
            </span>
            <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC] tracking-tight">
                WEATHER & TRACK CENTER
            </h1>
            <p class="text-sm md:text-base text-[#8C96A3] mt-2 max-w-3xl">
                Radar cuaca mikro-sirkuit, temperatur permukaan lintasan, kelembapan udara, dan simulasi probabilitas hujan untuk strategi ban.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            @php $latestWeather = $weatherData->first(); @endphp
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                <span class="text-xs font-mono text-[#8C96A3] uppercase block mb-1">Track Temperature</span>
                <div class="text-3xl font-black font-mono text-amber-400">
                    {{ $latestWeather->track_temp_celsius ?? 34.0 }}°C
                </div>
                <span class="text-xs text-zinc-500 mt-2 block font-mono">Air: {{ $latestWeather->temperature_celsius ?? 29.5 }}°C</span>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                <span class="text-xs font-mono text-[#8C96A3] uppercase block mb-1">Track Surface Condition</span>
                <div class="text-3xl font-black font-mono text-cyan-400 uppercase">
                    {{ $latestWeather->condition ?? 'DRY' }}
                </div>
                <span class="text-xs text-zinc-500 mt-2 block font-mono">Grip Index: Optimal</span>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                <span class="text-xs font-mono text-[#8C96A3] uppercase block mb-1">Wind Vector & Speed</span>
                <div class="text-3xl font-black font-mono text-emerald-400">
                    {{ $latestWeather->wind_speed_kmh ?? 12.5 }} <span class="text-base text-zinc-500 font-sans">km/h</span>
                </div>
                <span class="text-xs text-zinc-500 mt-2 block font-mono">Heading: {{ $latestWeather->wind_direction ?? 'SSE' }}</span>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                <span class="text-xs font-mono text-[#8C96A3] uppercase block mb-1">Relative Humidity</span>
                <div class="text-3xl font-black font-mono text-[#F8FAFC]">
                    {{ $latestWeather->humidity_percent ?? 72.0 }}%
                </div>
                <span class="text-xs text-zinc-500 mt-2 block font-mono">Pressure: {{ $latestWeather->air_pressure_hpa ?? 1008.5 }} hPa</span>
            </div>
        </div>

        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
            <h3 class="text-lg font-black tracking-tight mb-4 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-sm bg-cyan-400"></span>
                HISTORICAL CIRCUIT ATMOSPHERIC LOG
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs font-mono">
                    <thead>
                        <tr class="text-zinc-500 border-b border-white/10 pb-3">
                            <th class="py-3 px-4">TIMESTAMP</th>
                            <th class="py-3 px-4">CIRCUIT</th>
                            <th class="py-3 px-4">CONDITION</th>
                            <th class="py-3 px-4">TRACK TEMP</th>
                            <th class="py-3 px-4">AIR TEMP</th>
                            <th class="py-3 px-4">WIND SPEED</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($weatherData->take(15) as $w)
                        <tr class="hover:bg-white/[0.02]">
                            <td class="py-3 px-4 text-zinc-400">{{ $w->recorded_at->format('H:i:s d M') }}</td>
                            <td class="py-3 px-4 font-bold text-white">{{ $w->circuit_name }}</td>
                            <td class="py-3 px-4 uppercase text-cyan-400 font-bold">{{ $w->condition }}</td>
                            <td class="py-3 px-4 text-amber-400">{{ $w->track_temp_celsius }}°C</td>
                            <td class="py-3 px-4 text-zinc-300">{{ $w->temperature_celsius }}°C</td>
                            <td class="py-3 px-4 text-white">{{ $w->wind_speed_kmh }} km/h ({{ $w->wind_direction }})</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection