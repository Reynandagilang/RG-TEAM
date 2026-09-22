@extends('layouts.rgr-premium')

@section('title', 'Museum & Hall of Fame — Mobil 1 Team RG')
@section('meta_description', 'Museum digital interaktif, koleksi piala, sejarah evolusi mobil balap, dan Hall of Fame Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-10 pb-6 border-b border-white/10">
            <div class="flex items-center gap-3 mb-2">
                <span class="m1-badge">HERITAGE & LEGACY</span>
                <span class="text-xs text-[#F4B63D] font-mono">• EST. 2020 • 5 CONSTRUCTOR TITLES</span>
            </div>
            <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC]">TEAM MUSEUM & HALL OF FAME</h1>
            <p class="text-sm text-[#8C96A3] mt-2 max-w-3xl">Jelajahi sejarah kejayaan, koleksi mobil legendaris, piala kemenangan, dan evolusi livery M1TRG melalui porselin interaktif 3D.</p>
        </div>

        <!-- Interactive Timeline -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8 mb-12">
            <h2 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-sm bg-cyan-400"></span>
                Interactive Team Timeline
            </h2>

            <div class="relative">
                <!-- Timeline line -->
                <div class="absolute left-1/2 transform -translate-x-px h-full w-0.5 bg-gradient-to-b from-[#B8E637] via-[#1A8FFF] to-transparent"></div>

                <div class="space-y-12">
                    <!-- Milestone 1 -->
                    <div class="relative flex items-center">
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 rounded-full bg-[#B8E637] border-4 border-[#0C0D0E] z-10"></div>
                        <div class="w-1/2 pr-8 text-right">
                            <span class="text-xs font-mono text-[#B8E637]">2020</span>
                            <h3 class="font-display font-bold text-lg text-[#F8FAFC]">Founding & Debut Season</h3>
                            <p class="text-xs text-[#8C96A3] mt-1">Mobil 1 Team RG officially founded. AG-20X chassis debuts at the Monaco Grand Prix.</p>
                        </div>
                        <div class="w-1/2 pl-8">
                            <div class="bg-[#1A1D21] border border-white/5 rounded-lg aspect-square flex items-center justify-center">
                                <span class="font-display font-black text-3xl text-[#B8E637]/20">AG-20X</span>
                            </div>
                        </div>
                    </div>

                    <!-- Milestone 2 -->
                    <div class="relative flex items-center">
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 rounded-full bg-[#1A8FFF] border-4 border-[#0C0D0E] z-10"></div>
                        <div class="w-1/2 pr-8 text-right">
                            <div class="bg-[#1A1D21] border border-white/5 rounded-lg aspect-square flex items-center justify-center">
                                <span class="font-display font-black text-3xl text-[#1A8FFF]/20">🏆</span>
                            </div>
                        </div>
                        <div class="w-1/2 pl-8">
                            <span class="text-xs font-mono text-[#1A8FFF]">2022</span>
                            <h3 class="font-display font-bold text-lg text-[#F8FAFC]">First Constructor Title</h3>
                            <p class="text-xs text-[#8C96A3] mt-1">Clinched first-ever FIA Constructor Championship with AG-22X platform. 20 podiums, 7 pole positions.</p>
                        </div>
                    </div>

                    <!-- Milestone 3 -->
                    <div class="relative flex items-center">
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 rounded-full bg-[#F4B63D] border-4 border-[#0C0D0E] z-10"></div>
                        <div class="w-1/2 pr-8 text-right">
                            <span class="text-xs font-mono text-[#F4B63D]">2024</span>
                            <h3 class="font-display font-bold text-lg text-[#F8FAFC]">Hybrid Power Unit Partnership</h3>
                            <p class="text-xs text-[#8C96A3] mt-1">Announced partnership with Antigravity Power for V6 hybrid power units. AG-24X-H achieves 98% efficiency in energy recovery.</p>
                        </div>
                        <div class="w-1/2 pl-8">
                            <div class="bg-[#1A1D21] border border-white/5 rounded-lg aspect-square flex items-center justify-center">
                                <span class="font-display font-black text-3xl text-[#F4B63D]/20">🔋</span>
                            </div>
                        </div>
                    </div>

                    <!-- Milestone 4 -->
                    <div class="relative flex items-center">
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 rounded-full bg-emerald-400 border-4 border-[#0C0D0E] z-10"></div>
                        <div class="w-1/2 pr-8 text-right">
                            <div class="bg-[#1A1D21] border border-white/5 rounded-lg aspect-square flex items-center justify-center">
                                <span class="font-display font-black text-3xl text-emerald-400/20">2026</span>
                            </div>
                        </div>
                        <div class="w-1/2 pl-8">
                            <span class="text-xs font-mono text-emerald-400">2026</span>
                            <h3 class="font-display font-bold text-lg text-[#F8FAFC]">Triple Championship Year</h3>
                            <p class="text-xs text-[#8C96A3] mt-1">Secured Driver, Constructor, and Rising Star Academy titles simultaneously — the team's greatest year.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trophy Collection -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8 mb-12">
            <h2 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-sm bg-[#F4B63D]"></span>
                Trophy Room & Achievements
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Trophy 1 -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-2 bg-[#1A1D21] border-2 border-[#B8E637]/30 rounded-full flex items-center justify-center group-hover:border-[#B8E637] transition-all group-hover:shadow-lg group-hover:shadow-[#B8E637]/20">
                        <span class="text-3xl">🏆</span>
                    </div>
                    <div class="font-bold text-[#F8FAFC] text-sm">2× Constructor</div>
                    <div class="text-[10px] text-[#8C96A3] font-mono uppercase">2022, 2024</div>
                </div>

                <!-- Trophy 2 -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-2 bg-[#1A1D21] border-2 border-[#F4B63D]/30 rounded-full flex items-center justify-center group-hover:border-[#F4B63D] transition-all group-hover:shadow-lg group-hover:shadow-[#F4B63D]/20">
                        <span class="text-3xl">🥇</span>
                    </div>
                    <div class="font-bold text-[#F8FAFC] text-sm">1× Driver Champion</div>
                    <div class="text-[10px] text-[#8C96A3] font-mono uppercase">2024</div>
                </div>

                <!-- Trophy 3 -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-2 bg-[#1A1D21] border-2 border-cyan-400/30 rounded-full flex items-center justify-center group-hover:border-cyan-400 transition-all group-hover:shadow-lg group-hover:shadow-cyan-400/20">
                        <span class="text-3xl">🏅</span>
                    </div>
                    <div class="font-bold text-[#F8FAFC] text-sm">18× Podiums</div>
                    <div class="text-[10px] text-[#8C96A3] font-mono uppercase">2020-2026</div>
                </div>

                <!-- Trophy 4 -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-2 bg-[#1A1D21] border-2 border-emerald-400/30 rounded-full flex items-center justify-center group-hover:border-emerald-400 transition-all group-hover:shadow-lg group-hover:shadow-emerald-400/20">
                        <span class="text-3xl">🏅</span>
                    </div>
                    <div class="font-bold text-[#F8FAFC] text-sm">7× Pole Positions</div>
                    <div class="text-[10px] text-[#8C96A3] font-mono uppercase">Fastest Quali</div>
                </div>
            </div>
        </div>

        <!-- Car Evolution Gallery -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8 mb-12">
            <h2 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-sm bg-[#1A8FFF]"></span>
                Evolusi Mobil (2020 – 2026)
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['AG-20X', '2020', 'Carbon-Titanium Monocoque', '#20252C'],
                    ['AG-22X', '2022', 'Honeycomb Composite Aero', '#282E37'],
                    ['AG-24X-H', '2024', 'Hybrid Power Integration', '#171B20'],
                    ['AG-26X', '2026', 'Active Aero & DRS Gen-3', '#20252C'],
                ] as $car)
                <div class="bg-[#171A1E] border border-white/5 rounded-xl p-5 hover:border-[#B8E637]/30 transition-all">
                    <div class="text-center mb-3">
                        <span class="font-display font-black text-xl text-[#B8E637]">{{ $car[0] }}</span>
                        <span class="text-xs text-[#8C96A3] font-mono block">{{ $car[1] }} Season</span>
                    </div>
                    <div class="h-32 bg-[#1A1D21] rounded-lg border border-white/5 mb-3 flex items-center justify-center">
                        <span class="font-display font-black text-3xl text-[#B8E637]/10">{{ $car[0] }}</span>
                    </div>
                    <div class="space-y-1 font-mono text-xs">
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Chassis:</span>
                            <span class="text-[#F8FAFC]">{{ $car[2] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#8C96A3]">Status:</span>
                            <span class="text-emerald-400">Active</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Hall of Fame -- Drivers -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
            <h2 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-sm bg-[#E10600]"></span>
                Hall of Fame — Driver Legends
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach([
                    ['Alexandre Silva', '#44', 'Brazil', '12 Podiums, 2022 Champion', '#B8E637'],
                    ['Kaito Tanaka', '#19', 'Japan', '8 Podiums, 2024 Rookie of Year', '#1A8FFF'],
                    ['Rey Gilang', '#62', 'Indonesia', 'Team Academy Product, 2026 Breakthrough', '#F4B63D'],
                ] as $driver)
                <div class="bg-[#171A1E] border border-white/5 rounded-xl p-6 text-center">
                    <div class="w-16 h-16 rounded-full bg-[#20252C] border-2 border-[#B8E637]/30 mx-auto mb-3 flex items-center justify-center">
                        <span class="font-display font-black text-xl text-[#B8E637]">{{ $driver[1] }}</span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-[#F8FAFC]">{{ $driver[0] }}</h3>
                    <p class="text-xs text-[#8C96A3] mb-2">{{ $driver[2] }}</p>
                    <p class="text-[10px] font-mono text-zinc-400">{{ $driver[3] }}</p>
                    <div class="mt-3 pt-2 border-t border-white/5">
                        <span class="px-2.5 py-0.5 rounded text-[10px] font-mono" :style="`background: rgba(255,255,255,0.03)`">
                            <span class="text-[#B8E637] font-bold">★ Legend</span>
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
