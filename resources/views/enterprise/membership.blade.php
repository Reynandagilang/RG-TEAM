@extends('layouts.rgr-premium')

@section('title', 'Keanggotaan Eksklusif Fans — Mobil 1 Team RG')
@section('meta_description', 'Program tingkatan keanggotaan eksklusif Bronze, Silver, Gold, Platinum, hingga VIP Paddock Club. Dapatkan akses paddock, merchandise, dan pengalaman balap tak tertandingan.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-10 pb-6 border-b border-white/10">
            <div class="flex items-center gap-3 mb-2">
                <span class="m1-badge">MEMBERSHIP PORTAL</span>
                <span class="text-xs text-[#F4B63D] font-mono">• 5 TIERS • 12.000+ MEMBERS</span>
            </div>
            <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC]">MEMBERSHIP TIERS & REWARDS</h1>
            <p class="text-sm text-[#8C96A3] mt-2 max-w-3xl">
                Bergabunglah dengan komunitas penggemar terelite Mobil 1 Team RG. Dapatkan akses paddock eksklusif, merchandise terbatas, 
                konten di balik layar, dan pengalaman tak terlupakan di sirkuit balap.
            </p>
        </div>

        <!-- Membership Tier Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-12">

            <!-- Bronze -->
            <div class="bg-[#141619] border border-[#CD7F32]/30 rounded-xl p-6 text-center relative overflow-hidden">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-[#CD7F32]"></div>
                <div class="w-14 h-14 rounded-full bg-[#CD7F32]/10 flex items-center justify-center mx-auto mb-3 border-2 border-[#CD7F32]/30">
                    <span class="text-2xl">🥉</span>
                </div>
                <h3 class="font-display font-black text-lg text-[#CD7F32] mb-1">BRONZE</h3>
                <div class="font-display font-black text-2xl text-[#CD7F32] mb-3">$29<span class="text-xs text-[#8C96A3]">/yr</span></div>
                <ul class="space-y-1.5 text-xs text-[#8C96A3] font-mono mb-4">
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Digital membership card</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Early merch access</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Team news newsletter</li>
                    <li class="flex items-center justify-center gap-1 text-red-400"><span>✗</span> Paddock pass</li>
                </ul>
                <button class="btn-m1-ghost text-xs w-full py-2">Get Bronze</button>
            </div>

            <!-- Silver -->
            <div class="bg-[#141619] border border-[#C0C0C0]/30 rounded-xl p-6 text-center relative overflow-hidden transform hover:scale-105 transition-transform">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-[#C0C0C0]"></div>
                <div class="w-14 h-14 rounded-full bg-[#C0C0C0]/10 flex items-center justify-center mx-auto mb-3 border-2 border-[#C0C0C0]/30">
                    <span class="text-2xl">🥈</span>
                </div>
                <h3 class="font-display font-black text-lg text-[#C0C0C0] mb-1">SILVER</h3>
                <div class="font-display font-black text-2xl text-[#C0C0C0] mb-3">$79<span class="text-xs text-[#8C96A3]">/yr</span></div>
                <ul class="space-y-1.5 text-xs text-[#8C96A3] font-mono mb-4">
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> All Bronze benefits</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Exclusive wallpapers</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> 10% merch discount</li>
                    <li class="flex items-center justify-center gap-1 text-red-400"><span>✗</span> Paddock pass</li>
                </ul>
                <button class="btn-m1-secondary text-xs w-full py-2">Get Silver</button>
            </div>

            <!-- Gold (Featured) -->
            <div class="bg-[#141619] border-2 border-[#B8E637] rounded-xl p-6 text-center relative overflow-hidden transform scale-105 shadow-xl shadow-[#B8E637]/10">
                <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 bg-[#B8E637] text-[#111315] px-3 py-0.5 rounded-full text-[10px] font-mono font-black uppercase">
                    RECOMMENDED
                </div>
                <div class="w-16 h-16 rounded-full bg-[#B8E637]/10 flex items-center justify-center mx-auto mb-3 border-2 border-[#B8E637]">
                    <span class="text-3xl">🥇</span>
                </div>
                <h3 class="font-display font-black text-lg text-[#B8E637] mb-1">GOLD</h3>
                <div class="font-display font-black text-2xl text-[#B8E637] mb-3">$149<span class="text-xs text-[#8C96A3]">/yr</span></div>
                <ul class="space-y-1.5 text-xs text-[#8C96A3] font-mono mb-4">
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> All Silver benefits</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Exclusive livestreams</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> 20% merch discount</li>
                    <li class="flex items-center justify-center gap-1 text-red-400"><span>✗</span> Paddock pass</li>
                </ul>
                <button class="btn-m1-primary text-xs w-full py-2">Get Gold</button>
            </div>

            <!-- Platinum -->
            <div class="bg-[#141619] border border-[#F4B63D]/30 rounded-xl p-6 text-center relative overflow-hidden">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-[#F4B63D]"></div>
                <div class="w-14 h-14 rounded-full bg-[#F4B63D]/10 flex items-center justify-center mx-auto mb-3 border-2 border-[#F4B63D]/30">
                    <span class="text-2xl">💎</span>
                </div>
                <h3 class="font-display font-black text-lg text-[#F4B63D] mb-1">PLATINUM</h3>
                <div class="font-display font-black text-2xl text-[#F4B63D] mb-3">$299<span class="text-xs text-[#8C96A3]">/yr</span></div>
                <ul class="space-y-1.5 text-xs text-[#8C96A3] font-mono mb-4">
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> All Gold benefits</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Behind-the-scenes content</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Virtual meet &amp; greet</li>
                    <li class="flex items-center justify-center gap-1 text-red-400"><span>✗</span> Paddock pass</li>
                </ul>
                <button class="btn-m1-secondary text-xs w-full py-2">Get Platinum</button>
            </div>

            <!-- VIP Paddock Club -->
            <div class="bg-gradient-to-b from-[#E10600]/10 to-[#E10600]/5 border-2 border-[#E10600]/50 rounded-xl p-6 text-center relative overflow-hidden">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-[#E10600]"></div>
                <div class="w-16 h-16 rounded-full bg-[#E10600]/20 flex items-center justify-center mx-auto mb-3 border-2 border-[#E10600]">
                    <span class="text-3xl">🏁</span>
                </div>
                <h3 class="font-display font-black text-lg text-[#E10600] mb-1">VIP PADDOCK CLUB</h3>
                <div class="font-display font-black text-2xl text-[#E10600] mb-3">$999<span class="text-xs text-[#8C96A3]">/event</span></div>
                <ul class="space-y-1.5 text-xs text-[#8C96A3] font-mono mb-4">
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Paddock 3-day pass</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Pit lane walk</li>
                    <li class="flex items-center justify-center gap-1"><span class="text-emerald-400">✓</span> Meet drivers</li>
                    <li class="flex items-center justify-center gap-1 text-emerald-400"><span>✓</span> Gourmet hospitality</li>
                </ul>
                <button class="btn-m1-danger text-xs w-full py-2">Book Now</button>
            </div>
        </div>

        <!-- Digital Membership Card Preview -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8 mb-12">
            <h2 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-sm bg-cyan-400"></span>
                Digital Membership Card Preview
            </h2>

            <div class="flex justify-center">
                <div class="relative w-80 h-44 bg-gradient-to-br from-[#171B20] to-[#20252C] border border-[#B8E637]/30 rounded-2xl overflow-hidden">
                    <!-- Card background pattern -->
                    <div class="absolute inset-0 opacity-5">
                        <div class="absolute inset-0" style="background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(184,230,55,0.03) 10px, rgba(184,230,55,0.03) 20px);"></div>
                    </div>

                    <!-- Chip strip -->
                    <div class="absolute top-0 left-0 right-0 h-6 bg-gradient-to-r from-[#B8E637] to-[#E10600]"></div>

                    <div class="h-full p-5 flex flex-col justify-between relative z-10">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded bg-[#20252C] border border-[#B8E637]/30 flex items-center justify-center">
                                    <span class="font-display font-black text-xs text-[#B8E637]">M1TRG</span>
                                </div>
                                <div>
                                    <div class="font-display font-black text-sm text-[#F8FAFC]">MOBIL 1 TEAM RG</div>
                                    <div class="text-[10px] text-[#8C96A3] font-mono">GOLD MEMBER • 2026</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="font-display font-black text-sm text-[#B8E637]">ID #M1RG-2026-GOLD</div>
                                <div class="text-[10px] text-[#8C96A3] font-mono">MEMBER SINCE 2024</div>
                            </div>
                        </div>

                        <!-- QR Code placeholder -->
                        <div class="flex items-end justify-between">
                            <div class="w-16 h-16 bg-[#1A1D21] border border-white/10 rounded-lg flex items-center justify-center">
                                <div class="w-10 h-10 grid grid-2x2 gap-[2px]">
                                    <div class="w-3 h-3 bg-[#B8E637]"></div>
                                    <div class="w-3 h-3 bg-white/20"></div>
                                    <div class="w-3 h-3 bg-white/20"></div>
                                    <div class="w-3 h-3 bg-[#B8E637]"></div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-xs font-mono text-[#8C96A3]">BENEFITS</div>
                                <div class="text-[10px] text-emerald-400 font-mono">● 20% Merch Discount</div>
                                <div class="text-[10px] text-emerald-400 font-mono">● Exclusive Livestream</div>
                            </div>
                        </div>
                    </div>

                    <!-- Holographic strip -->
                    <div class="absolute bottom-0 left-0 right-0 h-3 bg-gradient-to-r from-transparent via-[#B8E637]/30 to-transparent"></div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-[#141619] border border-white/10 rounded-xl p-6 md:p-8">
            <h2 class="font-display font-black text-xl text-[#F8FAFC] mb-6 flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-sm bg-[#1A8FFF]"></span>
                Frequently Asked Questions
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-[#171A1E] border border-white/5 rounded-lg p-4">
                    <h4 class="font-bold text-[#F8FAFC] text-sm mb-2">Bagaimana cara klaim paddock pass?</h4>
                    <p class="text-xs text-[#8C96A3]">Paddock pass dikirimkan via email 72 jam sebelum GP. Anda akan menerima QR code digital di membership portal.</p>
                </div>
                <div class="bg-[#171A1E] border border-white/5 rounded-lg p-4">
                    <h4 class="font-bold text-[#F8FAFC] text-sm mb-2">Apakah bisa upgrade tier setelah berlangganan?</h4>
                    <p class="text-xs text-[#8C96A3]">Ya, Anda bisa upgrade kapan saja dengan membayar selisih. Downgrade hanya berlaku di akhir masa langganan.</p>
                </div>
                <div class="bg-[#171A1E] border border-white/5 rounded-lg p-4">
                    <h4 class="font-bold text-[#F8FAFC] text-sm mb-2">Member dapatkan merchandise kapan?</h4>
                    <p class="text-xs text-[#8C96A3]">Silver+ members dapat akses merchandise eksklusif 1 minggu sebelum rilis umum. Gratis on Gold+ tiers.</p>
                </div>
                <div class="bg-[#171A1E] border border-white/5 rounded-lg p-4">
                    <h4 class="font-bold text-[#F8FAFC] text-sm mb-2">Bisa cancel kapan saja?</h4>
                    <p class="text-xs text-[#8C96A3]">Ya, pembatalan bisa dilakukan kapan saja. Penggunaan hingga akhir masa langganan tetap berlaku.</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
