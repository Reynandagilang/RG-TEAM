@extends('layouts.rgr-premium')

@section('title', 'Pusat Media & Siaran Pers — Mobil 1 Team RG')
@section('meta_description', 'Akses unduhan siaran pers resmi, foto resolusi tinggi, dan informasi kontak media tim Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">Media Hub</span>
            <h1 class="display-title mt-4 max-w-4xl">Media Centre</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Akses cepat bagi jurnalis untuk memperoleh aset digital resmi, logo tim, siaran pers kejuaraan, dan informasi kontak koordinator hubungan media.
            </p>
        </div>
    </section>

    {{-- Info Cards --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">
            <div class="m1-card-elevated p-8" data-reveal>
                <span class="m1-badge mb-4">PRESS RELEASES</span>
                <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-4">Layanan Siaran Pers</h3>
                <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                    Kami menyediakan pembaruan berkala mengenai jalannya musim kompetisi F1, ketahanan Le Mans, serta reli dunia kepada jurnalis terdaftar. Hubungi kami untuk konpers eksklusif.
                </p>
                <a href="{{ route('about.news') }}" class="btn-m1-primary text-xs">Lihat Rilis Berita</a>
            </div>

            <div class="m1-card-elevated p-8" data-reveal>
                <span class="m1-badge mb-4">CONTACT</span>
                <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-4">Hubungan Media & Humas</h3>
                <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                    Pertanyaan wawancara eksklusif, pengajuan akreditasi sirkuit, dan permintaan konpers tim dapat dialamatkan langsung ke:
                </p>
                <div class="space-y-3 text-sm">
                    <p class="text-[#F8FAFC]">Surel: <span class="text-[#B8E637] font-medium">media@mobil1teamrg.co.id</span></p>
                    <p class="text-[#F8FAFC]">Telepon: <span class="text-[#B8E637] font-medium">+62 21 8899 7766</span></p>
                    <p class="text-[#8C96A3]">Office: Area Paddock Sirkuit Internasional Sentul, Bogor, Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Media Kit Area --}}
    <section class="pb-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="m1-card-elevated p-8"
                 x-data="{ password: '', unlocked: false, errorMsg: '', checkPassword() { if (this.password === 'M1TRG2026') { this.unlocked = true; this.errorMsg = ''; } else { this.errorMsg = 'Password salah! Hubungi Media Relations untuk mendapatkan akses.'; this.unlocked = false; } } }"
                 data-reveal>

                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8">
                    <div class="max-w-xl space-y-4">
                        <span class="m1-badge">SECURE LOGISTICS</span>
                        <h3 class="font-display font-black text-2xl text-[#F8FAFC]">Media Kit Download Area</h3>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                            Halaman ini dilindungi kata sandi khusus untuk jurnalis terakreditasi FIA / IMI. Dapatkan dokumen rilis livery sasis resmi, foto resolusi tinggi pembalap, dan panduan brand.
                        </p>

                        <div x-show="!unlocked" class="space-y-3 pt-2">
                            <div class="flex flex-wrap gap-3 items-center">
                                <input type="password"
                                       x-model="password"
                                       @keydown.enter="checkPassword()"
                                       placeholder="Masukkan Password Media..."
                                       class="m1-input w-64">
                                <button @click="checkPassword()" class="btn-m1-primary text-xs">
                                    Buka Akses
                                </button>
                            </div>
                            <p class="text-xs text-[#8C96A3] italic">Password default untuk demonstrasi: <strong class="text-[#B8E637]">M1TRG2026</strong></p>
                            <p x-show="errorMsg" x-text="errorMsg" class="text-xs text-[#E5484D] font-semibold mt-1"></p>
                        </div>
                    </div>

                    <div class="lg:w-[450px] shrink-0 w-full" x-show="unlocked" x-transition>
                        <div class="bg-[rgba(56,193,114,0.08)] border border-[rgba(56,193,114,0.2)] p-5 rounded-xl space-y-4">
                            <div class="flex items-center gap-2 text-[#38C172] text-xs font-bold uppercase tracking-wider">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                Akses Terbuka
                            </div>
                            <div class="space-y-2.5">
                                <a href="#" class="flex items-center justify-between p-3 bg-[#20252C] border border-[rgba(255,255,255,0.08)] rounded-xl text-sm text-[#F8FAFC] hover:bg-[#282E37] transition-colors">
                                    <span>Livery Mobil Balap 2026 (Hi-Res PNG)</span>
                                    <span class="text-[#B8E637] font-bold">&darr; 42 MB</span>
                                </a>
                                <a href="#" class="flex items-center justify-between p-3 bg-[#20252C] border border-[rgba(255,255,255,0.08)] rounded-xl text-sm text-[#F8FAFC] hover:bg-[#282E37] transition-colors">
                                    <span>Roster & Biografi Pembalap (PDF)</span>
                                    <span class="text-[#B8E637] font-bold">&darr; 8.4 MB</span>
                                </a>
                                <a href="#" class="flex items-center justify-between p-3 bg-[#20252C] border border-[rgba(255,255,255,0.08)] rounded-xl text-sm text-[#F8FAFC] hover:bg-[#282E37] transition-colors">
                                    <span>Kit Logo Resmi Mobil 1 Team RG (SVG/EPS)</span>
                                    <span class="text-[#B8E637] font-bold">&darr; 15.6 MB</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
