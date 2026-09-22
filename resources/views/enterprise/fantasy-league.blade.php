@extends('layouts.rgr-premium')

@section('title', 'F1 Fantasy League — Kelola Tim Fantasy — Mobil 1 Team RG')
@section('meta_description', 'Ikuti F1 Fantasy League resmi Mobil 1 Team RG. Draft pembalap, kelola anggaran, dan kompetisikan tim fantasy Anda.')

@section('content')
@php
    $userTeamJson = $userTeam ? $userTeam->toJson() : 'null';
    $pricesJson = json_encode($prices);
    $budgetJson = json_encode($budgetSummary);
    $standingsJson = json_encode($standings);
@endphp

<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]"
     x-data="fantasyApp()"
     x-init="init()"
     x-cloak
     data-user-team='{{ $userTeamJson }}'
     data-prices='{{ $pricesJson }}'
     data-budget='{{ $budgetJson }}'
     data-standings='{{ $standingsJson }}'>
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-6 border-b border-white/10 gap-4">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="inline-block px-3 py-1 text-xs font-bold font-mono tracking-wider uppercase bg-[#B8E637]/20 text-[#B8E637] border border-[#B8E637]/30 rounded">
                        FANTASY LAB
                    </span>
                    @auth
                    <span class="text-xs text-cyan-400 font-mono">• Selamat datang, {{ Auth::user()->name }}</span>
                    @else
                    <span class="text-xs text-cyan-400 font-mono">• <a href="{{ route('fan.login') }}" class="underline">Login</a> untuk bergabung</span>
                    @endauth
                </div>
                <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC] tracking-tight">
                    F1 FANTASY LEAGUE
                </h1>
                <p class="text-sm md:text-base text-[#8C96A3] mt-2 max-w-3xl">
                    Draft tim fantasy Anda, kelola anggaran, dan kompetisikan di liga eksklusif Mobil 1 Team RG.
                </p>
            </div>
        </div>

        <!-- Budget & Roster Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12" x-show="userTeam">
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 text-center">
                <span class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-1 block">Budget Remaining</span>
                <span class="font-display font-black text-2xl text-emerald-400" x-text="formatCurrency(budget.remaining)"></span>
                <div class="w-full bg-white/5 h-1.5 rounded-full mt-2 overflow-hidden">
                    <div class="bg-gradient-to-r from-[#B8E637] to-[#38C172] h-full rounded-full transition-all"
                         :style="`width: ${budget.usage_percent}%`"></div>
                </div>
                <span class="text-[10px] text-[#8C96A3] font-mono mt-1" x-text="budget.usage_percent + '%' + ' used'"></span>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 text-center">
                <span class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-1 block">Poin Total</span>
                <span class="font-display font-black text-2xl text-[#B8E637]" x-text="userTeam.total_points"></span>
                <span class="text-[10px] text-[#8C96A3] font-mono block mt-1" x-text="userTeam.avg_points > 0 ? userTeam.avg_points + ' avg/race' : ''"></span>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 text-center">
                <span class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-1 block">Posisi Liga</span>
                <span class="font-display font-black text-2xl" :style="`color: ${userTeam.tier_color || '#8C96A3'}`"
                      x-text="userTeam.league_position ? '#' + userTeam.league_position : '—'">
                </span>
                <span class="text-[10px] text-[#8C96A3] font-mono block mt-1" x-text="userTeam.race_count + ' races played'"></span>
            </div>

            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 text-center">
                <span class="text-xs font-mono text-[#8C96A3] uppercase tracking-wider mb-1 block">Pembalap Draft</span>
                <span class="font-display font-black text-2xl text-[#F4B63D]" x-text="userTeam.drivers_selected ? Object.keys(userTeam.drivers_selected).length : 0"></span>
                <span class="text-[10px] text-[#8C96A3] font-mono block mt-1">0/5 drafted</span>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex gap-2 mb-8 border-b border-white/10 overflow-x-auto">
            <button @click="activeTab = 'draft'"
                    :class="activeTab === 'draft' ? 'border-[#B8E637] text-[#B8E637]' : 'border-transparent text-[#8C96A3]'"
                    class="pb-3 px-4 font-mono text-sm font-bold transition-all border-b-2">
                Draft Pembalap
            </button>
            <button @click="activeTab = 'my-team'"
                    :class="activeTab === 'my-team' ? 'border-[#B8E637] text-[#B8E637]' : 'border-transparent text-[#8C96A3]'"
                    class="pb-3 px-4 font-mono text-sm font-bold transition-all border-b-2">
                Tim Saya
            </button>
            <button @click="activeTab = 'standings'"
                    :class="activeTab === 'standings' ? 'border-[#B8E637] text-[#B8E637]' : 'border-transparent text-[#8C96A3]'"
                    class="pb-3 px-4 font-mono text-sm font-bold transition-all border-b-2">
                Klasemen Liga
            </button>
            <button @click="activeTab = 'rules'"
                    :class="activeTab === 'rules' ? 'border-[#B8E637] text-[#B8E637]' : 'border-transparent text-[#8C96A3]'"
                    class="pb-3 px-4 font-mono text-sm font-bold transition-all border-b-2">
                Aturan & Scoring
            </button>
        </div>

        <!-- DRAFT TAB -->
        <div x-show="activeTab === 'draft'" x-transition>
            @if(!Auth::check())
                <div class="text-center py-16">
                    <p class="text-[#8C96A3] mb-4">Anda harus <a href="{{ route('fan.login') }}" class="text-[#B8E637] font-bold">login</a> untuk mengakses Fantasy League.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <template x-for="driver in prices" :key="driver.id">
                        <div class="bg-[#141619] border border-white/10 rounded-xl p-5 relative transition-all hover:border-white/20"
                             :class="isDrafted(driver.driver_id) ? 'border-[#1A8FFF]/40 bg-[#1A8FFF]/5' : ''">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-[#1A1D21] flex items-center justify-center overflow-hidden border-2"
                                     :style="`border-color: ${driver.team?.team_color || '#8C96A3'}`">
                                    <span class="font-display font-black text-sm" :style="`color: ${driver.team?.team_color || '#B8E637'}`">
                                        <template x-if="driver.driver?.formatted_number">
                                            <span x-text="driver.driver.formatted_number"></span>
                                        </template>
                                        <template x-if="!driver.driver?.formatted_number">
                                            <span x-text="'#' + driver.id"></span>
                                        </template>
                                    </span>
                                </div>
                                <div>
                                    <div class="font-bold text-sm text-[#F8FAFC]" x-text="driver.driver?.name || 'Loading...'">Driver Name</div>
                                    <div class="text-xs text-[#8C96A3]" x-text="driver.team?.name || driver.driver?.team_name || 'Team'"></div>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mb-3">
                                <span class="font-mono text-sm text-[#B8E637] font-bold" x-text="formatCurrency(driver.price_millions * 1000000)"></span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold"
                                      :class="getValueClass(driver.value_rating)"
                                      x-text="driver.value_rating"></span>
                            </div>

                            <div class="h-1.5 bg-white/5 rounded-full overflow-hidden mb-3">
                                <div class="h-full rounded-full transition-all"
                                     :class="driver.popularity_percent > 70 ? 'bg-[#F4B63D]' : (driver.popularity_percent > 40 ? 'bg-[#1A8FFF]' : 'bg-emerald-400')"
                                     :style="`width: ${driver.popularity_percent}%`"></div>
                            </div>
                            <div class="text-[10px] text-[#8C96A3] font-mono" x-text="driver.popularity_percent + '% dipilih'"></div>

                            <button @click="draftDriver(driver.driver_id)"
                                    :disabled="isDrafted(driver.driver_id) || isRosterFull()"
                                    :class="isDrafted(driver.driver_id)
                                        ? 'bg-red-500/10 text-red-400 border-red-500/30 cursor-not-allowed'
                                        : 'hover:bg-[#B8E637] hover:text-[#111315]'"
                                    class="w-full py-2 mt-2 rounded text-xs font-mono font-bold border transition-all">
                                <span x-text="isDrafted(driver.driver_id) ? 'SUDAH DRAFT' : (isRosterFull() ? 'ROSTER FULL' : 'DRAFT')"></span>
                            </button>
                        </div>
                    </template>
                </div>
            @endif
        </div>

        <!-- MY TEAM TAB -->
        <div x-show="activeTab === 'my-team'" x-transition>
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-display font-black text-xl text-[#F8FAFC] flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#B8E637]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                        TIM FANTASY ANDA
                    </h3>
                    <span class="px-3 py-1 bg-[#B8E637]/10 text-[#B8E637] border border-[#B8E637]/30 rounded text-xs font-mono font-bold">
                        <span x-text="userTeam.budget_remaining + 'M'"></span> Tersisa
                    </span>
                </div>

                <div x-show="userTeam.drivers_selected && userTeam.drivers_selected.length > 0" class="space-y-4">
                    <template x-for="(driverId, index) in (userTeam.drivers_selected || [])" :key="driverId">
                        <div class="bg-[#171A1E] border border-white/5 rounded-lg p-4 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <span class="font-mono text-xs text-[#8C96A3]" x-text="index + 1"></span>
                                <div class="w-10 h-10 rounded-full bg-[#1A1D21] flex items-center justify-center border-2 border-[#B8E637]/30">
                                    <span class="font-display font-black text-sm text-[#B8E637]" x-text="getDriverNumber(driverId)"></span>
                                </div>
                                <div>
                                    <div class="font-bold text-[#F8FAFC]" x-text="getDriverName(driverId)"></div>
                                    <div class="text-xs text-[#8C96A3]" x-text="getDriverTeam(driverId)"></div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="font-mono text-sm text-[#F4B63D] font-bold" x-text="formatCurrency(getDriverPrice(driverId) * 1000000)"></span>
                                <button @click="dropDriver(driverId)"
                                        class="px-3 py-1 bg-red-500/10 text-red-400 border border-red-500/30 rounded text-xs font-mono font-bold hover:bg-red-500/20 transition-colors">
                                    Drop
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

                <div x-show="!userTeam.drivers_selected || userTeam.drivers_selected.length === 0" class="text-center py-12">
                    <div class="text-[#8C96A3] font-mono">Anda belum memiliki pembalap draft.</div>
                    <button @click="activeTab = 'draft'"
                            class="mt-4 px-4 py-2 btn-m1-primary text-xs">
                        Draft Pembalap Sekarang
                    </button>
                </div>
            </div>
        </div>

        <!-- STANDINGS TAB -->
        <div x-show="activeTab === 'standings'" x-transition>
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
                <h3 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#F4B63D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M3 5l1 1 1-1M3 5l1-1 1 1M5 3V4M5 3l1 1M4 4h.01M12 17v.01M12 17l3-3 3 3m-3-3l-3 3-3-3"/></svg>
                    KLASEMEN FANTASY LEAGUE 2026
                </h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm font-mono">
                        <thead>
                            <tr class="text-[#8C96A3] border-b border-white/10">
                                <th class="pb-3">#</th>
                                <th class="pb-3">Manajer</th>
                                <th class="pb-3">Tim</th>
                                <th class="pb-3">Poin</th>
                                <th class="pb-3">Races</th>
                                <th class="pb-3">Avg/Race</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5" x-init="standings = @js($standings)">
                            <template x-for="(team, index) in standings" :key="team.id">
                                <tr class="hover:bg-white/[0.02]">
                                    <td class="py-3">
                                        <span class="font-bold text-[#B8E637]" x-text="index + 1"></span>
                                    </td>
                                    <td class="py-3 font-bold text-[#F8FAFC]" x-text="team.user_name"></td>
                                    <td class="py-3 text-cyan-400" x-text="team.team_name"></td>
                                    <td class="py-3 font-black" :style="`color: ${team.league_position <= 3 ? '#B8E637' : '#F8FAFC'}`"
                                          x-text="team.total_points"></td>
                                    <td class="py-3 text-zinc-400" x-text="team.race_count"></td>
                                    <td class="py-3 text-zinc-400" x-text="team.avg_points_per_race.toFixed(1)"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <div x-show="standings.length === 0" class="text-center py-8 text-[#8C96A3]">
                    No fantasy teams registered yet. Be the first to create one!
                </div>
            </div>
        </div>

        <!-- RULES TAB -->
        <div x-show="activeTab === 'rules'" x-transition>
            <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
                <h3 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#1A8FFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042a1 1 0 0 1 .969.736l.031.199v1h1a1 1 0 0 1 .117 1.993L13.05 8h-1v3.969a1 1 0 0 1-1.937.117l-.063-.054v-3.054l-.005-.063A1 1 0 0 1 12 9.042V8z"/></svg>
                    ATURAN FANTASY LEAGUE
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div class="bg-[#171A1E] border border-white/5 rounded-lg p-5">
                            <h4 class="font-bold text-[#F8FAFC] mb-2">Budget & Draft</h4>
                            <ul class="text-xs text-[#8C96A3] space-y-1">
                                <li>• Budget total: <strong class="text-[#F8FAFC]">$100.0M</strong></li>
                                <li>• Draft maksimal: <strong class="text-[#F8FAFC]">5 pembalap</strong></li>
                                <li>• Harga pembalap bervariasi berdasarkan performa</li>
                                <li>• Anda dapat drop & draft ulang 2x per race weekend</li>
                            </ul>
                        </div>
                        <div class="bg-[#171A1E] border border-white/5 rounded-lg p-5">
                            <h4 class="font-bold text-[#F8FAFC] mb-2">Scoring System</h4>
                            <ul class="text-xs text-[#8C96A3] space-y-1">
                                <li>• Posisi 1-10: <strong class="text-[#F8FAFC]">25-1 point</strong> (F1 standard)</li>
                                <li>• Fastest Lap: <strong class="text-[#F8FAFC]">+1 point</strong></li>
                                <li>• Grid gain (per posisi): <strong class="text-[#F8FAFC]">+0.5 point</strong></li>
                                <li>• Bonus poin jika masuk points: <strong class="text-[#F8FAFC]">+2 point</strong></li>
                                <li>• Penalti DNF: <strong class="text-red-400">-5 point</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-[#171A1E] border border-white/5 rounded-lg p-5">
                            <h4 class="font-bold text-[#F8FAFC] mb-2">Transfer Market</h4>
                            <ul class="text-xs text-[#8C96A3] space-y-1">
                                <li>• Transfer window terbuka setiap Selasa-Senin</li>
                                <li>• Maksimal 2 transfer per race weekend</li>
                                <li>• Free agent: driver dengan harga $0</li>
                                <li>• Price changes terjadi setelah setiap Grand Prix</li>
                            </ul>
                        </div>
                        <div class="bg-[#171A1E] border border-white/5 rounded-lg p-5">
                            <h4 class="font-bold text-[#F8FAFC] mb-2">Weekly Bench</h4>
                            <ul class="text-xs text-[#8C96A3] space-y-1">
                                <li>• 3 pembalap di bangku cadar (tidak masuk starting 5)</li>
                                <li>• Ganti starter dengan cadar maksimal 1x per race</li>
                                <li>• Cadar tidak menghitung poin kecuali diganti ke starting 5</li>
                                <li>• Auto-skip: jika starter tidak ada, cadar otomatis masuk</li>
                            </ul>
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
    Alpine.data('fantasyApp', () => ({
        userTeam: null,
        prices: [],
        budget: {},
        standings: [],
        activeTab: 'draft',

        init() {
            this.userTeam = JSON.parse(this.$el.dataset.userTeam || 'null');
            this.prices = JSON.parse(this.$el.dataset.prices || '[]');
            this.budget = JSON.parse(this.$el.dataset.budget || '{}');
            this.standings = JSON.parse(this.$el.dataset.standings || '[]');
            if (this.userTeam) {
                this.budget = {
                    total: this.userTeam.budget_total,
                    used: this.userTeam.budget_used,
                    remaining: this.userTeam.budget_total - this.userTeam.budget_used,
                    usage_percent: this.userTeam.budget_usage_percent
                };
            }
        },

        isDrafted(driverId) {
            if (!this.userTeam || !this.userTeam.drivers_selected) return false;
            return this.userTeam.drivers_selected.includes(parseInt(driverId));
        },

        isRosterFull() {
            if (!this.userTeam || !this.userTeam.drivers_selected) return false;
            return this.userTeam.drivers_selected.length >= 5;
        },

        async draftDriver(driverId) {
            if (!this.userTeam || this.isRosterFull()) return;

            try {
                const res = await fetch(`/enterprise/fantasy/draft/${driverId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                    }
                });
                const data = await res.json();

                if (data.success) {
                    // Update local state
                    this.userTeam.budget_used = this.userTeam.budget_total - data.remaining;
                    if (!this.userTeam.drivers_selected) this.userTeam.drivers_selected = [];
                    this.userTeam.drivers_selected.push(parseInt(driverId));
                    this.budget.remaining = data.remaining;
                    this.budget.usage_percent = (this.userTeam.budget_used / this.userTeam.budget_total) * 100;
                } else {
                    alert(data.message);
                }
            } catch(e) {
                console.error('Draft failed:', e);
                alert('Draft gagal. Silakan coba lagi.');
            }
        },

        async dropDriver(driverId) {
            try {
                const res = await fetch(`/enterprise/fantasy/drop/${driverId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                    }
                });
                const data = await res.json();

                if (data.success) {
                    const idx = this.userTeam.drivers_selected.indexOf(parseInt(driverId));
                    if (idx > -1) this.userTeam.drivers_selected.splice(idx, 1);
                    this.budget.remaining = data.remaining;
                    this.budget.usage_percent = (this.userTeam.budget_used / this.userTeam.budget_total) * 100;
                } else {
                    alert(data.message);
                }
            } catch(e) {
                console.error('Drop failed:', e);
                alert('Drop gagal. Silakan coba lagi.');
            }
        },

        getDriverName(driverId) {
            const p = this.prices.find(x => x.driver_id == driverId);
            return p?.driver?.name || p?.driver_name || 'Unknown';
        },

        getDriverTeam(driverId) {
            const p = this.prices.find(x => x.driver_id == driverId);
            return p?.driver?.team?.name || 'Unknown Team';
        },

        getDriverPrice(driverId) {
            const p = this.prices.find(x => x.driver_id == driverId);
            return p?.price_millions || 0;
        },

        getDriverNumber(driverId) {
            const p = this.prices.find(x => x.driver_id == parseInt(driverId));
            return p?.driver?.formatted_number || p?.driver?.permanent_number || '#';
        },

        getValueClass(rating) {
            const classes = {
                'Bargain': 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30',
                'Fair': 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/30',
                'Average': 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/30',
                'Overpriced': 'bg-red-500/10 text-red-400 border border-red-500/30',
            };
            return classes[rating] || 'bg-zinc-500/10 text-zinc-400 border border-zinc-500/30';
        },

        formatCurrency(value) {
            if (value >= 1000000) {
                return '$' + (value / 1000000).toFixed(1) + 'M';
            }
            if (value >= 1000) {
                return '$' + (value / 1000).toFixed(1) + 'K';
            }
            return '$' + value.toFixed(0);
        }
    }));
});
</script>
@endpush
