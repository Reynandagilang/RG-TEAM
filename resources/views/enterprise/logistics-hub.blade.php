@extends('layouts.rgr-premium')

@section('title', 'Global Motorsport Logistics & Freight Operations Hub — Mobil 1 Team RG')
@section('meta_description', 'Pusat operasi logistik global Mobil 1 Team RG. Pelacakan kargo udara Boeing 777F, kontainer maritim, armada truk paddock, dan manifest suku cadang kritis.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-6 border-b border-white/10 gap-4">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="inline-block px-3 py-1 text-xs font-bold font-mono tracking-wider uppercase bg-[#E10600]/20 text-[#E10600] border border-[#E10600]/30 rounded">
                        GLOBAL FREIGHT OPERATIONS
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded text-xs font-mono bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                        LIVE SATELLITE DISPATCH
                    </span>
                </div>
                <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC] tracking-tight">
                    MOTORSPORT LOGISTICS HUB
                </h1>
                <p class="text-sm md:text-base text-[#8C96A3] mt-2 max-w-3xl">
                    Pelacakan armada logistik balap internasional, pergerakan kargo udara (Air Freight Charter), kontainer maritim, serta manifest suku cadang kritis (Power Unit, Spare Chassis, Aerodynamics).
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('enterprise.sponsor-portal') }}" class="px-4 py-2.5 rounded text-xs font-mono font-bold tracking-wider uppercase bg-[#181B1F] border border-white/10 text-white hover:border-[#E10600] transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Lihat FIA Cost Cap & Sponsor Hub
                </a>
            </div>
        </div>

        <!-- Metric KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 relative overflow-hidden">
                <div class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-2">ACTIVE FREIGHT MISSIONS</div>
                <div class="text-3xl font-black font-mono text-cyan-400">
                    {{ $activeShipmentsCount }} Active
                </div>
                <div class="text-xs text-[#8C96A3] mt-2 flex items-center gap-1 font-mono">
                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span> Air, Sea & Road Freight
                </div>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 relative overflow-hidden">
                <div class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-2">TOTAL FREIGHT TONNAGE</div>
                <div class="text-3xl font-black font-mono text-[#F8FAFC]">
                    {{ number_format($totalFreightWeight / 1000, 2) }} <span class="text-lg text-zinc-500 font-sans">Ton</span>
                </div>
                <div class="text-xs text-zinc-400 mt-2 font-mono">
                    {{ number_format($totalFreightWeight, 0) }} kg Tracked Gross
                </div>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 relative overflow-hidden">
                <div class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-2">CUSTOMS CLEARANCE RATE</div>
                <div class="text-3xl font-black font-mono text-emerald-400">
                    100.0%
                </div>
                <div class="text-xs text-emerald-400/90 mt-2 flex items-center gap-1 font-mono">
                    ATA Carnet Validated & Sealed
                </div>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 relative overflow-hidden">
                <div class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-2">NEXT PADDOCK DELIVERY ETA</div>
                <div class="text-3xl font-black font-mono text-[#E10600]">
                    T - 06:00:00
                </div>
                <div class="text-xs text-zinc-400 mt-2 font-mono">
                    Marina Bay Street Circuit, SG
                </div>
            </div>
        </div>

        <!-- Global Active Shipments Timeline -->
        <div class="space-y-8 mb-12">
            @foreach($shipments as $shipment)
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8 relative overflow-hidden">
                <!-- Top Header Row -->
                <div class="flex flex-col lg:flex-row lg:items-center justify-between pb-6 border-b border-white/10 gap-4 mb-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-[#1A1D21] border border-white/10 flex items-center justify-center shrink-0">
                            @if(str_contains(strtolower($shipment->transport_mode), 'air'))
                            <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            @elseif(str_contains(strtolower($shipment->transport_mode), 'sea') || str_contains(strtolower($shipment->transport_mode), 'maritime'))
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            @else
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                            @endif
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-mono text-xs font-bold text-cyan-400">{{ $shipment->tracking_code }}</span>
                                <span class="text-zinc-600">•</span>
                                <span class="font-mono text-xs text-zinc-400">{{ $shipment->vessel_or_flight_number }}</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-black text-white">{{ $shipment->transport_mode }}</h3>
                            <div class="text-xs text-[#8C96A3] mt-1 font-mono flex items-center gap-2">
                                <span>{{ $shipment->origin }}</span>
                                <span class="text-[#E10600]">➔</span>
                                <span class="text-white font-bold">{{ $shipment->destination_circuit }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="text-right font-mono">
                            <span class="text-[10px] text-zinc-500 uppercase block">Estimated Arrival (ETA)</span>
                            <span class="text-sm font-bold text-white">{{ $shipment->estimated_arrival->format('d M Y — H:i T') }}</span>
                        </div>
                        <span class="px-3 py-1 rounded text-xs font-mono font-bold uppercase {{ $shipment->status === 'in_transit' ? 'bg-amber-500/10 text-amber-400 border border-amber-500/30' : ($shipment->status === 'customs_cleared' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/30' : 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30') }}">
                            {{ str_replace('_', ' ', $shipment->status) }}
                        </span>
                    </div>
                </div>

                <!-- Progress Bar & Status Waypoints -->
                <div class="mb-8">
                    <div class="flex justify-between text-xs font-mono mb-2">
                        <span class="text-zinc-400">Dispatched: {{ $shipment->departure_time->format('d M H:i') }}</span>
                        <span class="font-bold text-cyan-400">{{ $shipment->progress_percent }}% Waypoint Traversed</span>
                    </div>
                    <div class="w-full bg-[#1A1D21] h-2.5 rounded-full overflow-hidden border border-white/5">
                        <div class="bg-gradient-to-r from-blue-600 via-cyan-400 to-emerald-400 h-full rounded-full transition-all duration-500" style="width: {{ $shipment->progress_percent }}%"></div>
                    </div>
                </div>

                <!-- Cargo Manifest Table -->
                <div class="bg-[#171A1E] rounded-lg p-5 border border-white/5">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-xs font-mono uppercase tracking-wider text-zinc-400 font-bold flex items-center gap-2">
                            <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            Manifest Suku Cadang Kritis Terdaftar
                        </h4>
                        <span class="text-[11px] font-mono text-zinc-500">{{ $shipment->items->count() }} Komponen Tercatat</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs font-mono">
                            <thead>
                                <tr class="text-zinc-500 border-b border-white/5 pb-2">
                                    <th class="pb-2 font-normal">NAMA KOMPONEN</th>
                                    <th class="pb-2 font-normal">KATEGORI</th>
                                    <th class="pb-2 font-normal">SERIAL NUMBER</th>
                                    <th class="pb-2 font-normal">QTY</th>
                                    <th class="pb-2 font-normal">BERAT (KG)</th>
                                    <th class="pb-2 font-normal">STATUS REGULASI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @foreach($shipment->items as $item)
                                <tr class="hover:bg-white/[0.01]">
                                    <td class="py-3 font-sans font-bold text-white text-sm">
                                        {{ $item->item_name }}
                                    </td>
                                    <td class="py-3 text-cyan-400">
                                        {{ $item->category }}
                                    </td>
                                    <td class="py-3 text-zinc-400">
                                        {{ $item->serial_number }}
                                    </td>
                                    <td class="py-3 text-white font-bold">
                                        x{{ $item->quantity }}
                                    </td>
                                    <td class="py-3 text-zinc-300">
                                        {{ number_format($item->weight_kg, 1) }} kg
                                    </td>
                                    <td class="py-3">
                                        @if($item->is_hazardous_lithium)
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] bg-red-500/10 text-red-400 border border-red-500/30">
                                            UN 3480 Dangerous Lithium Class 9
                                        </span>
                                        @else
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                            FIA Standard Approved
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection