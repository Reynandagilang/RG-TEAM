@extends('layouts.rgr-premium')

@section('title', 'Statistics Center — Performa & Rekor Tim — Mobil 1 Team RG')
@section('meta_description', 'Pusat data statistik resmi pembalap, mobil, dan rekor sejarah kemenangan Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-10 pb-6 border-b border-white/10">
            <div class="flex items-center gap-3 mb-2">
                <span class="m1-badge">ANALYTICS HUB</span>
                <span class="text-xs text-cyan-400 font-mono">• SEASON 2026 • REAL-TIME DATA</span>
            </div>
            <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC]">STATISTICS CENTER</h1>
            <p class="text-sm text-[#8C96A3] mt-2">Analisis data performa tim, akumulasi poin musim, rekor sejarah kemenangan, dan visualisasi chart statistik.</p>
        </div>

        <!-- Season KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 text-center">
                <span class="text-xs text-[#8C96A3] font-mono uppercase block mb-1">TOTAL KEMENANGAN (P1)</span>
                <span class="font-display font-black text-4xl text-[#B8E637]">{{ $seasonStats['total_wins'] }}</span>
            </div>
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 text-center">
                <span class="text-xs text-[#8C96A3] font-mono uppercase block mb-1">PODIUM FINISH</span>
                <span class="font-display font-black text-4xl text-[#F8FAFC]">{{ $seasonStats['podiums'] }}</span>
            </div>
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 text-center">
                <span class="text-xs text-[#8C96A3] font-mono uppercase block mb-1">TOTAL POINTS</span>
                <span class="font-display font-black text-4xl text-cyan-400">{{ number_format($seasonStats['total_points']) }}</span>
            </div>
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 text-center">
                <span class="text-xs text-[#8C96A3] font-mono uppercase block mb-1">WIN RATE</span>
                <span class="font-display font-black text-4xl text-[#F4B63D]">{{ $seasonStats['win_rate'] }}%</span>
                <span class="text-xs text-[#8C96A3] font-mono block mt-1">{{ $seasonStats['total_races'] }} Races Completed</span>
            </div>
        </div>

        <!-- Championship Standings -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8 mb-12">
            <h2 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-sm bg-[#B8E637]"></span>
                Klasemen Dunia 2026 (Driver & Constructor)
            </h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm font-mono">
                    <thead>
                        <tr class="text-[#8C96A3] border-b border-white/10">
                            <th class="pb-3">#</th>
                            <th class="pb-3">Pembalap</th>
                            <th class="pb-3">Tim</th>
                            <th class="pb-3">Poin</th>
                            <th class="pb-3">Menang</th>
                            <th class="pb-3">Podium</th>
                            <th class="pb-3">Avg Pos</th>
                            <th class="pb-3">DNF</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($standings as $standing)
                        <tr class="hover:bg-white/[0.02]" style="{{ $loop->first ? 'background: rgba(184,230,55,0.03)' : '' }}">
                            <td class="py-3 text-[#B8E637] font-black">#{{ $loop->iteration }}</td>
                            <td class="py-3 font-bold text-[#F8FAFC]">{{ $standing->driver_name }}</td>
                            <td class="py-3 text-cyan-400">{{ $standing->team_name }}</td>
                            <td class="py-3 font-bold text-[#F8FAFC]">{{ number_format($standing->total_points) }}</td>
                            <td class="py-3 text-sm">{{ $standing->wins }}</td>
                            <td class="py-3 text-sm">{{ $standing->podiums }}</td>
                            <td class="py-3 text-zinc-400">{{ round($standing->avg_position, 1) }}</td>
                            <td class="py-3 text-red-400">{{ $standing->dnf_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Race Results -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
            <h2 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-sm bg-amber-400"></span>
                Hasil Balapan Terbaru
            </h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs font-mono">
                    <thead>
                        <tr class="text-[#8C96A3] border-b border-white/10">
                            <th class="py-3">Grand Prix</th>
                            <th class="py-3">Pos</th>
                            <th class="py-3">Pembalap</th>
                            <th class="py-3">Tim</th>
                            <th class="py-3">Grid</th>
                            <th class="py-3">Δ Pos</th>
                            <th class="py-3">Fastest Lap</th>
                            <th class="py-3">Poin</th>
                            <th class="py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($recentResults as $r)
                        <tr class="hover:bg-white/[0.02]">
                            <td class="py-3 text-zinc-300">{{ $r->grand_prix_name }}</td>
                            <td class="py-3">
                                <span class="font-bold {{ $r->position == 1 ? 'text-[#E10600]' : ($r->position <= 3 ? 'text-[#F4B63D]' : 'text-zinc-300') }}">
                                    P{{ $r->position }}
                                </span>
                            </td>
                            <td class="py-3 font-bold text-[#F8FAFC]">{{ $r->driver_name }}</td>
                            <td class="py-3 text-cyan-400">{{ $r->team_name }}</td>
                            <td class="py-3 text-zinc-500">P{{ $r->grid_position ?: '—' }}</td>
                            <td class="py-3">
                                @php $delta = $r->grid_position ? $r->grid_position - $r->position : 0; @endphp
                                <span class="{{ $delta > 0 ? 'text-emerald-400' : ($delta < 0 ? 'text-red-400' : 'text-zinc-500') }} font-bold">
                                    {{ $delta > 0 ? '+' . $delta : $delta }}
                                </span>
                            </td>
                            <td class="py-3 text-cyan-400">{{ $r->fastest_lap_time ?: '—' }}</td>
                            <td class="py-3 text-emerald-400 font-bold">{{ $r->points_earned }}</td>
                            <td class="py-3">
                                <span class="px-1.5 py-0.5 rounded text-[10px] {{ $r->finish_status === 'Finished' ? 'bg-emerald-500/10 text-emerald-400' : 'bg-red-500/10 text-red-400' }}">
                                    {{ $r->finish_status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.createElement('canvas');
    ctx.id = 'standingsChart';
    document.querySelector('h2').parentNode.appendChild(ctx);

    new Chart(ctx.getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Alexandre Silva', 'Kaito Tanaka', 'Max Verstappen', 'Charles Leclerc', 'Lando Norris'],
            datasets: [{
                label: 'Total Points',
                data: [285, 192, 312, 241, 178],
                backgroundColor: ['#B8E637', '#B8E637', '#D2D6DC', '#D2D6DC', '#D2D6DC'],
                borderColor: ['#B8E637', '#B8E637', '#D2D6DC', '#D2D6DC', '#D2D6DC'],
                borderWidth: 1,
                barThickness: 24,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                title: { display: false }
            },
            scales: {
                x: { ticks: { color: '#8C96A3' }, grid: { display: false } },
                y: { ticks: { color: '#8C96A3' }, grid: { color: 'rgba(255,255,255,0.03)' } }
            }
        }
    });
});
</script>
@endpush
