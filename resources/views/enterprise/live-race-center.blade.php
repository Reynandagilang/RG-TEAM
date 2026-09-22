@extends('layouts.rgr-premium')

@section('title', 'Live Race Center — Telemetri Real-Time — Mobil 1 Team RG')
@section('meta_description', 'Pusat telemetri live, strategi pit, posisi pembalap, dan data cuaca sirkuit real-time Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#111315] pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Header Bar --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 pb-6 border-b border-white/10">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="m1-badge">LIVE RACE CENTER</span>
                    <span class="text-xs text-[#B8E637] font-mono animate-pulse">● LIVE TELEMETRY STREAM</span>
                </div>
                <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC]">GP MONACO 2026 — FORMULA 1</h1>
            </div>
            <div class="flex gap-3">
                <span class="m1-badge-gold">SESSION: QUALIFYING Q3</span>
                <span class="m1-badge-muted">WEATHER: DRY / 28°C</span>
            </div>
        </div>

        {{-- Telemetry Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            {{-- Primary Telemetry --}}
            <div class="m1-card p-6 lg:col-span-2">
                <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-4">Telemetri Sasis M1TRG-F1 #01</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
                    <div class="bg-[#171B20] p-4 rounded-lg border border-white/5">
                        <span class="text-[0.65rem] text-[#8C96A3] font-mono block">KECEPATAN</span>
                        <span class="font-display font-black text-2xl text-[#B8E637]">314 KM/H</span>
                    </div>
                    <div class="bg-[#171B20] p-4 rounded-lg border border-white/5">
                        <span class="text-[0.65rem] text-[#8C96A3] font-mono block">BATERAI ERS/SOC</span>
                        <span class="font-display font-black text-2xl text-[#F8FAFC]">94.8%</span>
                    </div>
                    <div class="bg-[#171B20] p-4 rounded-lg border border-white/5">
                        <span class="text-[0.65rem] text-[#8C96A3] font-mono block">SUHU BAN (FL)</span>
                        <span class="font-display font-black text-2xl text-[#F4B63D]">104 °C</span>
                    </div>
                    <div class="bg-[#171B20] p-4 rounded-lg border border-white/5">
                        <span class="text-[0.65rem] text-[#8C96A3] font-mono block">TEKANAN OLI</span>
                        <span class="font-display font-black text-2xl text-[#38C172]">5.4 BAR</span>
                    </div>
                </div>

                {{-- Live Session Timing Table --}}
                <h4 class="font-display font-bold text-sm text-[#F8FAFC] mb-3">Leaderboard Posisi Sesi</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs font-mono">
                        <thead>
                            <tr class="text-[#8C96A3] border-b border-white/10 pb-2">
                                <th class="pb-2">POS</th>
                                <th class="pb-2">PEMBALAP</th>
                                <th class="pb-2">TIM</th>
                                <th class="pb-2">BEST LAP</th>
                                <th class="pb-2">GAP</th>
                                <th class="pb-2">BAN</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-[#D2D6DC]">
                            <tr class="hover:bg-white/5">
                                <td class="py-2.5 font-bold text-[#B8E637]">P1</td>
                                <td class="py-2.5 font-bold text-[#F8FAFC]">Max Verstappen</td>
                                <td class="py-2.5">Mobil 1 Team RG</td>
                                <td class="py-2.5 text-[#B8E637]">1:10.264</td>
                                <td class="py-2.5">-</td>
                                <td class="py-2.5"><span class="px-2 py-0.5 rounded bg-red-500/20 text-red-400 font-bold">SOFT</span></td>
                            </tr>
                            <tr class="hover:bg-white/5">
                                <td class="py-2.5 font-bold">P2</td>
                                <td class="py-2.5 font-bold text-[#F8FAFC]">Charles Leclerc</td>
                                <td class="py-2.5">Scuderia Ferrari</td>
                                <td class="py-2.5">1:10.392</td>
                                <td class="py-2.5">+0.128s</td>
                                <td class="py-2.5"><span class="px-2 py-0.5 rounded bg-red-500/20 text-red-400 font-bold">SOFT</span></td>
                            </tr>
                            <tr class="hover:bg-white/5">
                                <td class="py-2.5 font-bold text-[#B8E637]">P3</td>
                                <td class="py-2.5 font-bold text-[#F8FAFC]">Rey Gilang</td>
                                <td class="py-2.5">Mobil 1 Team RG</td>
                                <td class="py-2.5">1:10.450</td>
                                <td class="py-2.5">+0.186s</td>
                                <td class="py-2.5"><span class="px-2 py-0.5 rounded bg-yellow-500/20 text-yellow-400 font-bold">MEDIUM</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Pit Strategy & Weather --}}
            <div class="space-y-6">
                <div class="m1-card p-6">
                    <h3 class="font-display font-bold text-base text-[#F8FAFC] mb-3">Strategi Pit-Stop</h3>
                    <p class="text-xs text-[#8C96A3] leading-relaxed mb-4">Prediksi jendela pit optimal berbasis simulasi AI superkomputer.</p>
                    <div class="space-y-3 font-mono text-xs">
                        <div class="flex justify-between p-3 rounded bg-[#171B20]">
                            <span class="text-[#8C96A3]">Jendela Pit Target:</span>
                            <span class="text-[#B8E637] font-bold">Lap 22 - Lap 26</span>
                        </div>
                        <div class="flex justify-between p-3 rounded bg-[#171B20]">
                            <span class="text-[#8C96A3]">Estimasi Durasi Pit:</span>
                            <span class="text-[#F8FAFC] font-bold">2.1 Detik</span>
                        </div>
                    </div>
                </div>

                <div class="m1-card p-6">
                    <h3 class="font-display font-bold text-base text-[#F8FAFC] mb-3">Informasi Sirkuit Monaco</h3>
                    <ul class="text-xs space-y-2 text-[#D2D6DC] font-mono">
                        <li>📍 <strong>Panjang Sirkuit:</strong> 3.337 km</li>
                        <li>🔄 <strong>Jumlah Lap:</strong> 78 Lap</li>
                        <li>⚡ <strong>Lap Record:</strong> 1:12.909 (Lewis Hamilton)</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
