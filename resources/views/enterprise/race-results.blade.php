@extends('layouts.rgr-premium')

@section('title', 'Historical Race Results & Grand Prix Classification — Mobil 1 Team RG')
@section('meta_description', 'Arsip lengkap hasil balapan Formula 1, posisi finis, perolehan poin, dan putaran tercepat Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-10 pb-6 border-b border-white/10">
            <span class="inline-block px-3 py-1 text-xs font-bold font-mono tracking-wider uppercase bg-[#E10600]/20 text-[#E10600] border border-[#E10600]/30 rounded mb-2">
                HISTORICAL CLASSIFICATION
            </span>
            <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC] tracking-tight">
                RACE RESULTS ARCHIVE
            </h1>
            <p class="text-sm md:text-base text-[#8C96A3] mt-2 max-w-3xl">
                Arsip hasil Grand Prix resmi, posisi finis, selisih waktu lap tercepat, dan statistik poin kejuaraan dunia.
            </p>
        </div>

        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs font-mono">
                    <thead>
                        <tr class="text-zinc-500 border-b border-white/10 pb-3">
                            <th class="py-3 px-4">GRAND PRIX</th>
                            <th class="py-3 px-4">POS</th>
                            <th class="py-3 px-4">DRIVER</th>
                            <th class="py-3 px-4">TEAM</th>
                            <th class="py-3 px-4">GRID</th>
                            <th class="py-3 px-4">FASTEST LAP</th>
                            <th class="py-3 px-4">POINTS</th>
                            <th class="py-3 px-4">STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($results as $r)
                        <tr class="hover:bg-white/[0.02]">
                            <td class="py-3 px-4 font-bold text-white font-sans">{{ $r->grand_prix_name }}</td>
                            <td class="py-3 px-4 font-bold {{ $r->position == 1 ? 'text-[#E10600]' : 'text-white' }}">P{{ $r->position }}</td>
                            <td class="py-3 px-4 font-bold text-white">{{ $r->driver_name }}</td>
                            <td class="py-3 px-4 text-zinc-400">{{ $r->team_name }}</td>
                            <td class="py-3 px-4 text-zinc-500">P{{ $r->grid_position ?? '—' }}</td>
                            <td class="py-3 px-4 text-cyan-400">{{ $r->fastest_lap_time ?? '—' }}</td>
                            <td class="py-3 px-4 text-emerald-400 font-bold">+{{ $r->points_earned }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $r->finish_status === 'Finished' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30' : 'bg-red-500/10 text-red-400 border border-red-500/30' }}">
                                    {{ $r->finish_status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $results->links() }}
            </div>
        </div>
    </div>
</div>
@endsection