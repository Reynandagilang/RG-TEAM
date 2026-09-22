@extends('layouts.rgr-premium')

@section('title', 'Sponsor & Partner Portal & FIA Cost Cap — Mobil 1 Team RG')
@section('meta_description', 'Portal kemitraan B2B, audit regulasi finansial FIA Cost Cap 2026, metrik Brand Media Value (BMV), dan simulator ROI eksposur Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-6 border-b border-white/10 gap-4">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="inline-block px-3 py-1 text-xs font-bold font-mono tracking-wider uppercase bg-[#E10600]/20 text-[#E10600] border border-[#E10600]/30 rounded">
                        FINANCIAL & SPONSORSHIP PORTAL
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded text-xs font-mono bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        FIA AUDIT STATUS: COMPLIANT
                    </span>
                </div>
                <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC] tracking-tight">
                    FIA COST CAP & SPONSOR ROI HUB
                </h1>
                <p class="text-sm md:text-base text-[#8C96A3] mt-2 max-w-3xl">
                    Sistem pemantauan kepatuhan regulasi finansial FIA Cost Cap Season 2026, analisis Brand Media Value (BMV), kalkulator ROI penempatan aerodinamika, serta repositori aset korporat tim.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('enterprise.logistics') }}" class="px-4 py-2.5 rounded text-xs font-mono font-bold tracking-wider uppercase bg-[#181B1F] border border-white/10 text-white hover:border-[#E10600] transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#E10600]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                    Pindah ke Logistics Hub
                </a>
            </div>
        </div>

        <!-- Metric KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-red-600/5 rounded-full blur-2xl pointer-events-none"></div>
                <div class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-2">FIA BASE COST CAP (2026)</div>
                <div class="text-2xl lg:text-3xl font-black font-mono text-[#F8FAFC]">
                    ${{ number_format($totalCapLimit, 0) }}
                </div>
                <div class="text-xs text-[#8C96A3] mt-2 flex items-center gap-1">
                    <span class="text-emerald-400 font-bold">24 Races</span> Indexed Cap
                </div>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 relative overflow-hidden">
                <div class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-2">ACTUAL SPENT TO DATE</div>
                <div class="text-2xl lg:text-3xl font-black font-mono text-amber-400">
                    ${{ number_format($totalActualSpent, 0) }}
                </div>
                <div class="w-full bg-white/10 h-1.5 rounded-full mt-3 overflow-hidden">
                    <div class="bg-amber-400 h-full rounded-full" style="width: {{ round(($totalActualSpent / max(1, $totalCapLimit)) * 100) }}%"></div>
                </div>
                <div class="text-[11px] font-mono text-[#8C96A3] mt-1.5 flex justify-between">
                    <span>Used: {{ round(($totalActualSpent / max(1, $totalCapLimit)) * 100, 1) }}%</span>
                    <span>Committed: ${{ number_format($totalCommitted / 1000000, 1) }}M</span>
                </div>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 relative overflow-hidden">
                <div class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-2">CAP HEADROOM (REMAINING)</div>
                <div class="text-2xl lg:text-3xl font-black font-mono text-emerald-400">
                    ${{ number_format($remainingCap, 0) }}
                </div>
                <div class="text-xs text-emerald-400/90 mt-2 flex items-center gap-1 font-mono">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Zero Breach Risk Projected
                </div>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 relative overflow-hidden">
                <div class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-2">TOTAL BRAND MEDIA VALUE (BMV)</div>
                <div class="text-2xl lg:text-3xl font-black font-mono text-[#E10600]">
                    ${{ number_format($totalMediaValue, 0) }}
                </div>
                <div class="text-xs text-[#8C96A3] mt-2 flex items-center gap-1 font-mono">
                    <span class="text-white font-bold">{{ number_format($totalImpressions / 1000000, 1) }}M</span> Global Impressions
                </div>
            </div>
        </div>

        <!-- Section 1: FIA Financial Regulations Breakdown -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8 mb-12">
            <div class="flex flex-col md:flex-row md:items-center justify-between pb-6 border-b border-white/10 gap-4 mb-6">
                <div>
                    <h2 class="text-xl font-black tracking-tight flex items-center gap-2.5">
                        <span class="w-2.5 h-2.5 rounded-sm bg-[#E10600]"></span>
                        AUDIT ANGGARAN FIA COST CAP 2026
                    </h2>
                    <p class="text-xs font-mono text-[#8C96A3] mt-1">
                        Sesuai FIA Financial Regulations Articles 4.1 – 4.3 (Exclusions, Capital Expenditure Cap & Operating Pool)
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-white/5 border border-white/10 text-xs font-mono text-zinc-300 rounded">
                        Audited by: Deloitte Motorsport Advisory
                    </span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b border-white/10 text-xs font-mono uppercase text-[#8C96A3]">
                            <th class="py-3 px-4">Kategori Anggaran</th>
                            <th class="py-3 px-4">Alokasi Plafon (USD)</th>
                            <th class="py-3 px-4">Realisasi Pengeluaran</th>
                            <th class="py-3 px-4">Komitmen Pembelian</th>
                            <th class="py-3 px-4">Kepatuhan FIA</th>
                            <th class="py-3 px-4">Catatan Regulasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 font-mono text-xs">
                        @foreach($costCaps as $cap)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-4 px-4 font-bold text-white font-sans text-sm">
                                {{ $cap->category }}
                            </td>
                            <td class="py-4 px-4 text-zinc-300">
                                ${{ number_format($cap->budget_limit_usd, 0) }}
                            </td>
                            <td class="py-4 px-4 font-bold text-amber-400">
                                ${{ number_format($cap->actual_spent_usd, 0) }}
                                <span class="text-[10px] text-zinc-500 font-normal ml-1">
                                    ({{ round(($cap->actual_spent_usd / max(1, $cap->budget_limit_usd)) * 100) }}%)
                                </span>
                            </td>
                            <td class="py-4 px-4 text-zinc-400">
                                ${{ number_format($cap->committed_usd, 0) }}
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold uppercase {{ $cap->compliance_status === 'compliant' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30' : 'bg-red-500/10 text-red-400 border border-red-500/30' }}">
                                    {{ $cap->compliance_status }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-[#8C96A3] font-sans text-xs max-w-xs">
                                {{ $cap->notes }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section 2: Sponsorship Exposure & Brand Media Value (BMV) Engine -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- Left: Exposure Log -->
            <div class="lg:col-span-2 bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
                <div class="flex items-center justify-between pb-6 border-b border-white/10 mb-6">
                    <div>
                        <h2 class="text-xl font-black tracking-tight flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-sm bg-amber-400"></span>
                            LAPORAN EKSPOSUR & VALUASI MEDIA MITRA
                        </h2>
                        <p class="text-xs font-mono text-[#8C96A3] mt-1">
                            Tracking Brand Media Value (BMV) melalui algoritma computer vision broadcast
                        </p>
                    </div>
                </div>

                <div class="space-y-4">
                    @foreach($exposures as $exp)
                    <div class="bg-[#1A1D21] border border-white/5 rounded-lg p-4 hover:border-white/20 transition-all">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded bg-[#20242A] flex items-center justify-center font-black font-display text-sm text-[#E10600] border border-white/10">
                                    {{ substr($exp->brand_name, 0, 2) }}
                                </div>
                                <div>
                                    <h4 class="font-bold text-white text-base leading-tight">{{ $exp->brand_name }}</h4>
                                    <span class="text-xs text-[#8C96A3] font-mono">{{ $exp->event_name }} • {{ $exp->car_placement }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-base font-mono font-bold text-emerald-400">
                                    +${{ number_format($exp->media_value_usd, 0) }}
                                </div>
                                <span class="text-[11px] font-mono text-zinc-500">ROI: <strong class="text-white">{{ $exp->roi_percentage }}%</strong></span>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-2 pt-3 border-t border-white/5 font-mono text-xs text-zinc-400">
                            <div>
                                <span class="text-[10px] text-zinc-500 block uppercase">On-Screen Time</span>
                                <strong class="text-white">{{ $exp->screen_time_seconds }} Detik</strong>
                            </div>
                            <div>
                                <span class="text-[10px] text-zinc-500 block uppercase">Global Impressions</span>
                                <strong class="text-white">{{ number_format($exp->broadcast_impressions) }}</strong>
                            </div>
                            <div>
                                <span class="text-[10px] text-zinc-500 block uppercase">Placement Zone</span>
                                <span class="text-amber-400 font-semibold truncate block">{{ $exp->car_placement }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: Interactive Sponsorship Placement ROI Simulator -->
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8 flex flex-col justify-between" x-data="{
                placement: 'sidepod',
                racesCount: 12,
                rates: {
                    front_wing: { cpm: 32, weight: 1.4, name: 'Front Wing Endplate' },
                    sidepod: { cpm: 45, weight: 2.1, name: 'Sidepod Bodywork & Radiator' },
                    halo: { cpm: 50, weight: 2.5, name: 'Cockpit Halo (Driver Cam)' },
                    rear_wing: { cpm: 40, weight: 1.8, name: 'Rear Wing Main Flap' }
                },
                calcBMV() {
                    let r = this.rates[this.placement];
                    return Math.round(this.racesCount * 58000000 * (r.cpm / 1000) * (r.weight / 10));
                }
            }">
                <div>
                    <h3 class="text-lg font-black tracking-tight mb-1 text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#E10600]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        SIMULATOR ROI SPONSOR
                    </h3>
                    <p class="text-xs text-[#8C96A3] mb-6">Hitung proyeksi Brand Media Value untuk paket kemitraan balap Mobil 1 Team RG.</p>

                    <div class="space-y-4 text-xs font-mono">
                        <div>
                            <label class="block text-zinc-400 mb-1.5 uppercase tracking-wider">Zona Penempatan Livery</label>
                            <select x-model="placement" class="w-full bg-[#1A1D21] border border-white/10 rounded px-3 py-2 text-white font-sans focus:border-[#E10600] focus:outline-none">
                                <option value="halo">Cockpit Halo (Onboard TV Exposure Tertinggi)</option>
                                <option value="sidepod">Sidepod Bodywork (Profile Lateral & Paddock)</option>
                                <option value="front_wing">Front Wing Endplate (Battles & Start Grid)</option>
                                <option value="rear_wing">Rear Wing Flap (Chase Cam Focus)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-zinc-400 mb-1.5 uppercase tracking-wider">Durasi Kemitraan Seri Balap: <span class="text-white font-bold" x-text="racesCount + ' Grand Prix'"></span></label>
                            <input type="range" min="4" max="24" step="1" x-model="racesCount" class="w-full accent-[#E10600] bg-white/10 rounded h-1.5 cursor-pointer">
                            <div class="flex justify-between text-[10px] text-zinc-500 mt-1">
                                <span>4 Races (Regional)</span>
                                <span>24 Races (Full Season)</span>
                            </div>
                        </div>

                        <div class="bg-[#1A1D21] border border-white/10 rounded-lg p-4 mt-6">
                            <span class="text-[11px] text-[#8C96A3] uppercase block mb-1">Estimasi Brand Media Value (BMV)</span>
                            <div class="text-2xl font-black font-mono text-emerald-400" x-text="'$' + new Intl.NumberFormat().format(calcBMV())">
                                $2,450,000
                            </div>
                            <p class="text-[10px] text-zinc-500 mt-1">Berdasarkan 58 juta penonton rata-rata per race weekend F1 Global Broadcast.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-white/10 mt-6">
                    <a href="mailto:partnerships@mobil1rg.racing?subject=Inquiry%20Kemitraan%20Sponsorship" class="block w-full text-center py-3 bg-[#E10600] hover:bg-[#c00500] text-white font-bold text-xs uppercase tracking-wider rounded transition-colors shadow-lg shadow-red-600/20">
                        Ajukan Proposal Kemitraan
                    </a>
                </div>
            </div>
        </div>

        <!-- Section 3: B2B Asset Library & Corporate Press Downloads -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
            <h3 class="text-lg font-black tracking-tight text-white mb-2 flex items-center gap-2">
                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20"/></svg>
                PORTAL DOKUMEN & BRAND KIT RESMI
            </h3>
            <p class="text-xs text-[#8C96A3] mb-6">Aset beresolusi tinggi, vector livery guideline, dan panduan hak cipta untuk mitra terdaftar.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs font-mono">
                <div class="bg-[#1A1D21] border border-white/5 rounded-lg p-4 flex items-center justify-between">
                    <div>
                        <div class="font-bold text-white text-sm font-sans">Team Livery Vector Pack</div>
                        <span class="text-zinc-500 text-[11px]">AI, EPS, SVG (54.2 MB)</span>
                    </div>
                    <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded text-[10px] text-zinc-300">Download</span>
                </div>

                <div class="bg-[#1A1D21] border border-white/5 rounded-lg p-4 flex items-center justify-between">
                    <div>
                        <div class="font-bold text-white text-sm font-sans">FIA Financial Audit Certificate</div>
                        <span class="text-zinc-500 text-[11px]">Official Signed PDF (3.8 MB)</span>
                    </div>
                    <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded text-[10px] text-zinc-300">Download</span>
                </div>

                <div class="bg-[#1A1D21] border border-white/5 rounded-lg p-4 flex items-center justify-between">
                    <div>
                        <div class="font-bold text-white text-sm font-sans">Driver Portrait Press Kit</div>
                        <span class="text-zinc-500 text-[11px]">RAW & TIFF Formats (148 MB)</span>
                    </div>
                    <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded text-[10px] text-zinc-300">Download</span>
                </div>

                <div class="bg-[#1A1D21] border border-white/5 rounded-lg p-4 flex items-center justify-between">
                    <div>
                        <div class="font-bold text-white text-sm font-sans">VIP Paddock Guest Guide</div>
                        <span class="text-zinc-500 text-[11px]">Hospitality & Pass Protocol</span>
                    </div>
                    <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded text-[10px] text-zinc-300">Download</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
