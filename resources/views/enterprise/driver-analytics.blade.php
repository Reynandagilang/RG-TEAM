@extends('layouts.rgr-premium')

@section('title', 'Driver Performance Analytics & Telemetry — Mobil 1 Team RG')
@section('meta_description', 'Analisis komparatif performa pembalap, kualifikasi vs finis balap, dan telemetri per lap Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-10 pb-6 border-b border-white/10">
            <span class="inline-block px-3 py-1 text-xs font-bold font-mono tracking-wider uppercase bg-[#E10600]/20 text-[#E10600] border border-[#E10600]/30 rounded mb-2">
                TELEMETRY & DRIVER METRICS
            </span>
            <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC] tracking-tight">
                DRIVER ANALYTICS HUB
            </h1>
            <p class="text-sm md:text-base text-[#8C96A3] mt-2 max-w-3xl">
                Evaluasi komparatif telemetri pembalap, delta grid-to-flag, degradasi ban, dan analisis sektor kecepatan tinggi.
            </p>
        </div>

        <!-- Driver Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            @foreach($drivers as $driver)
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 relative overflow-hidden">
                <div class="flex items-center justify-between pb-4 border-b border-white/10 mb-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-lg bg-[#1A1D21] border border-white/10 flex items-center justify-center font-display font-black text-xl text-[#E10600]">
                            #{{ $driver->number }}
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-white">{{ $driver->name }}</h3>
                            <span class="text-xs font-mono text-[#8C96A3]">{{ $driver->country }} • {{ $driver->role ?? 'Lead Driver' }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-xs text-zinc-500 font-mono uppercase block">Podiums</span>
                        <span class="text-xl font-black font-mono text-amber-400">{{ $driver->podiums }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 font-mono text-xs">
                    <div class="bg-[#1A1D21] p-3 rounded">
                        <span class="text-[10px] text-zinc-500 uppercase block">Total Points</span>
                        <span class="text-base font-bold text-white">{{ $driver->career_points ?? 0 }}</span>
                    </div>
                    <div class="bg-[#1A1D21] p-3 rounded">
                        <span class="text-[10px] text-zinc-500 uppercase block">Quali Delta</span>
                        <span class="text-base font-bold text-cyan-400">-0.142s</span>
                    </div>
                    <div class="bg-[#1A1D21] p-3 rounded">
                        <span class="text-[10px] text-zinc-500 uppercase block">Race Craft Rating</span>
                        <span class="text-base font-bold text-emerald-400">96.4</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Championship Standings Table -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
            <h3 class="text-lg font-black tracking-tight mb-4 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-sm bg-[#E10600]"></span>
                2026 DRIVERS CHAMPIONSHIP CLASSIFICATION
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs font-mono">
                    <thead>
                        <tr class="text-zinc-500 border-b border-white/10 pb-3">
                            <th class="py-3 px-4">POS</th>
                            <th class="py-3 px-4">DRIVER</th>
                            <th class="py-3 px-4">TEAM</th>
                            <th class="py-3 px-4">WINS</th>
                            <th class="py-3 px-4">PODIUMS</th>
                            <th class="py-3 px-4">AVG FINISH</th>
                            <th class="py-3 px-4">TOTAL POINTS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($standings as $idx => $st)
                        <tr class="hover:bg-white/[0.02]">
                            <td class="py-3 px-4 font-bold text-white">#{{ $idx + 1 }}</td>
                            <td class="py-3 px-4 font-bold font-sans text-sm text-white">{{ $st->driver_name }}</td>
                            <td class="py-3 px-4 text-zinc-400">{{ $st->team_name }}</td>
                            <td class="py-3 px-4 text-amber-400 font-bold">{{ $st->wins ?? 0 }}</td>
                            <td class="py-3 px-4 text-zinc-300">{{ $st->podiums ?? 0 }}</td>
                            <td class="py-3 px-4 text-cyan-400">{{ round($st->avg_position, 1) }}</td>
                            <td class="py-3 px-4 text-emerald-400 font-bold text-sm">{{ $st->total_points }} PTS</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection