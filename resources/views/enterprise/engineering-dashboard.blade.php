@extends('layouts.rgr-premium')

@section('title', 'Engineering Telemetry Dashboard — Mobil 1 Team RG')
@section('meta_description', 'Dashboard telemetri waktu-nyata insinyur sasis dan mesin untuk evaluasi performa sirkuit.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-10 pb-6 border-b border-white/10">
            <div class="flex items-center gap-3 mb-2">
                <span class="m1-badge">PIT-WALL INTERNAL SYSTEMS</span>
                <span class="text-xs text-cyan-400 font-mono">• TELEMETRY ANALYSIS SUITE</span>
            </div>
            <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC]">ENGINEERING TELEMETRY DASHBOARD</h1>
            <p class="text-sm text-[#8C96A3] mt-2">Dasbor telemetri waktu-nyata insinyur sasis dan mesin untuk evaluasi performa sirkuit.</p>
        </div>

        <!-- Telemetry Live Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">

            <!-- Speed & RPM Chart -->
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#B8E637]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Speed & Engine RPM — Lap 5
                </h3>
                <canvas id="speedRpmChart" class="w-full h-56"></canvas>
            </div>

            <!-- Brake & Throttle Inputs -->
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 .697-.09 1.374-.267 2.032A4.005 4.0 0 017 17a4 4 0 01-.033-7.729 7.5 7.5 0 011.937-1.128 7 7 0 011.407-2.126 1A1 1 0 0112 9.5v1.5z"/></svg>
                    Input Trace: Brake & Throttle
                </h3>
                <canvas id="inputChart" class="w-full h-56"></canvas>
            </div>
        </div>

        <!-- Tire Temperature & Fuel -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">

            <!-- Tire Temperature Heatmap -->
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z"/></svg>
                    Suhu Ban (Lap 5) — Heatmap
                </h3>
                <div class="grid grid-cols-4 gap-2">
                    <div class="text-center">
                        <div class="text-[10px] text-[#8C96A3] mb-1">Front Left</div>
                        <div class="bg-[#171B20] border border-white/5 rounded-lg p-4 text-center">
                            <span class="font-display font-black text-2xl text-cyan-400">{{ $telemetryData->avg('tire_temp_front_l_c') ? number_format($telemetryData->avg('tire_temp_front_l_c'), 1) . '°C' : '—' }}</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-[10px] text-[#8C96A3] mb-1">Front Right</div>
                        <div class="bg-[#171B20] border border-white/5 rounded-lg p-4 text-center">
                            <span class="font-display font-black text-2xl text-[#F4B63D]">{{ $telemetryData->avg('tire_temp_front_r_c') ? number_format($telemetryData->avg('tire_temp_front_r_c'), 1) . '°C' : '—' }}</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-[10px] text-[#8C96A3] mb-1">Rear Left</div>
                        <div class="bg-[#171B20] border border-white/5 rounded-lg p-4 text-center">
                            <span class="font-display font-black text-2xl text-emerald-400">{{ $telemetryData->avg('tire_temp_rear_l_c') ? number_format($telemetryData->avg('tire_temp_rear_l_c'), 1) . '°C' : '—' }}</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-[10px] text-[#8C96A3] mb-1">Rear Right</div>
                        <div class="bg-[#171B20] border border-white/5 rounded-lg p-4 text-center">
                            <span class="font-display font-black text-2xl text-[#B8E637]">{{ $telemetryData->avg('tire_temp_rear_r_c') ? number_format($telemetryData->avg('tire_temp_rear_r_c'), 1) . '°C' : '—' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fuel & Gearbox Health -->
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6">
                <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#E10600]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Fuel & Power Unit Health
                </h3>
                <canvas id="fuelChart" class="w-full h-56"></canvas>
            </div>
        </div>

        <!-- API Access Code Snippet (Python) -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8 mb-8">
            <h3 class="font-display font-black text-xl text-[#F8FAFC] flex items-center gap-2 mb-2">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                API Access & Data Science Integration
            </h3>
            <p class="text-sm text-[#8C96A3] mb-4">Akses langsung data telemetri waktu-nyata menggunakan Python untuk analisis Machine Learning tingkat lanjut.</p>
            <div class="bg-[#0C0D0E] rounded-lg p-5 border border-white/5 overflow-x-auto shadow-inner">
<pre><code class="text-sm font-mono text-gray-300"><span class="text-pink-400">import</span> requests
<span class="text-pink-400">import</span> pandas <span class="text-pink-400">as</span> pd

<span class="text-[#8C96A3]"># Setup endpoint dan otentikasi API</span>
url = <span class="text-green-300">"https://api.mobil1-rg.com/v1/telemetry/live"</span>
headers = {<span class="text-green-300">"Authorization"</span>: <span class="text-green-300">"Bearer RG_ENG_TOKEN"</span>}

<span class="text-[#8C96A3]"># Mengambil stream data telemetri</span>
response = requests.get(url, headers=headers)
data = response.json()

<span class="text-[#8C96A3]"># Konversi ke Pandas DataFrame untuk analisis performa</span>
df = pd.DataFrame(data[<span class="text-green-300">'telemetry'</span>])
<span class="text-cyan-400">print</span>(df.describe())
</code></pre>
            </div>
        </div>

        <!-- Active Car Setups -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-display font-black text-xl text-[#F8FAFC] flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#B8E637]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4.82V3a2 2 0 114 0v1.18M4.93 4.93a1 1 0 011.42 0L8 6.54l1.46-1.46a1 1 0 111.42 1.42L9.41 8.5l1.46 1.46a1 1 0 11-1.42 1.42L8 9.41l-1.46 1.46a1 1 0 01-1.95-.7V6.54L4.93 6.35a1 1 0 010-1.42z"/></svg>
                    Active Setup Configurations — Season 2026
                </h3>
                <a href="{{ route('enterprise.car-setup') }}" class="px-4 py-2 rounded text-xs font-mono font-bold tracking-wider uppercase bg-[#181B1F] border border-white/10 text-white hover:border-[#E10600] transition-colors">
                    Buka Configurator
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($activeSetups as $setup)
                <div class="bg-[#171A1E] border border-white/5 rounded-xl p-5">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-display font-bold text-sm text-[#F8FAFC]">{{ $setup->setup_name }}</h4>
                        <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-[#E10600]/10 text-[#E10600] border border-[#E10600]/30">
                            {{ $setup->circuit_name }}
                        </span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 font-mono text-xs">
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Front Wing:</span>
                            <span class="text-cyan-400 font-bold">{{ $setup->front_wing_angle }}°</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Rear Wing:</span>
                            <span class="text-cyan-400 font-bold">{{ $setup->rear_wing_angle }}°</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Drag Coeff:</span>
                            <span class="text-[#F4B63D] font-bold">{{ $setup->drag_coefficient }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Aero Load:</span>
                            <span class="text-cyan-400 font-bold">{{ $setup->aerodynamic_load }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Downforce:</span>
                            <span class="text-emerald-400 font-bold">{{ $setup->downforce_rating }}/10</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Score:</span>
                            <span class="text-[#B8E637] font-bold">{{ $setup->setup_rating }}/100</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-8 text-[#8C96A3]">No active setups configured for this season.</div>
                @endforelse
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@if($telemetryData && $telemetryData->isNotEmpty())
@php
    $telemetryJson = json_encode($telemetryData->map(fn($t) => [
        'speed' => $t->speed_kmh,
        'rpm' => $t->engine_rpm,
        'throttle' => $t->throttle_percent,
        'brake' => $t->brake_percent,
        'gear' => $t->gear,
        'fuel' => $t->fuel_remaining_liters,
        'timestamp' => $t->timestamp_ms
    ]));
@endphp
<script id="telemetry-data" type="application/json">
    {!! $telemetryJson !!}
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const telemetry = JSON.parse(document.getElementById('telemetry-data').textContent);

    // Speed & RPM Chart
    new Chart(document.getElementById('speedRpmChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: telemetry.map(t => t.timestamp),
            datasets: [
                {
                    label: 'Speed (km/h)',
                    data: telemetry.map(t => t.speed),
                    borderColor: '#B8E637',
                    tension: 0.3,
                    yAxisID: 'y',
                    fill: false,
                },
                {
                    label: 'RPM',
                    data: telemetry.map(t => t.rpm / 100),
                    borderColor: '#1A8FFF',
                    tension: 0.3,
                    yAxisID: 'y1',
                    fill: false,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { labels: { color: '#8C96A3' } } },
            scales: {
                y: { type: 'linear', position: 'left', ticks: { color: '#8C96A3' }, grid: { color: 'rgba(255,255,255,0.03)' } },
                y1: { type: 'linear', position: 'right', ticks: { color: '#8C96A3' }, grid: { display: false } },
                x: { ticks: { display: false }, grid: { display: false } }
            }
        }
    });

    // Brake & Throttle Chart
    new Chart(document.getElementById('inputChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: telemetry.map(t => t.timestamp),
            datasets: [
                {
                    label: 'Throttle (%)',
                    data: telemetry.map(t => t.throttle),
                    borderColor: '#38C172',
                    tension: 0.3,
                },
                {
                    label: 'Brake (%)',
                    data: telemetry.map(t => t.brake),
                    borderColor: '#E5484D',
                    tension: 0.3,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { labels: { color: '#8C96A3' } } },
            scales: {
                y: { min: 0, max: 100, ticks: { color: '#8C96A3' }, grid: { color: 'rgba(255,255,255,0.03)' } },
                x: { ticks: { display: false }, grid: { display: false } }
            }
        }
    });

    // Fuel Consumption Chart
    new Chart(document.getElementById('fuelChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: telemetry.map(t => 'Lap ' + t.gear),
            datasets: [{
                label: 'Fuel Remaining (L)',
                data: telemetry.map(t => t.fuel),
                backgroundColor: 'rgba(225, 72, 77, 0.7)',
                borderColor: '#E5484D',
                barThickness: 10,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { labels: { color: '#8C96A3' } } },
            scales: {
                y: { min: 0, max: 100, ticks: { color: '#8C96A3' }, grid: { color: 'rgba(255,255,255,0.03)' } },
                x: { ticks: { display: false }, grid: { display: false } }
            }
        }
    });
});
</script>
@endif
@endpush
