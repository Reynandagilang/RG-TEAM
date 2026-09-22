@extends('layouts.rgr-premium')

@section('title', 'Struktur Korporat Tim | Mobil 1 Team RG')
@section('meta_description', 'Tata kelola korporat, dewan direksi, kepemimpinan tim, dan struktur manajemen Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">About Us</span>
            <h1 class="display-title mt-4 max-w-4xl">Corporate Structure</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Di balik kecepatan mobil di lintasan, terdapat organisasi manajemen kelas dunia yang dirancang untuk efisiensi taktis maksimal.
            </p>
        </div>
    </section>

    {{-- Executive Leadership --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center gap-3 mb-10">
                <span class="w-1 h-6 bg-[#B8E637] rounded-full"></span>
                <h2 class="font-display font-bold text-xl text-[#F8FAFC] uppercase tracking-widest">Executive Leadership</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-7" data-reveal>
                    <span class="m1-badge mb-3">FOUNDER & TEAM PRINCIPAL</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3">Rey Gilang</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Memimpin visi strategis teknis dan operasional harian seluruh tim di markas Jakarta serta memandu komunikasi pit-wall di setiap seri balapan.
                    </p>
                </div>
                <div class="m1-card p-7" data-reveal>
                    <span class="m1-badge mb-3">CHIEF TECHNICAL OFFICER</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3">Adrian Newey Jr.</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Bertanggung jawab penuh atas divisi aerodinamika, integrasi mesin hibrida Mercedes-AMG, dan pengembangan inovasi sasis serat karbon terbaru.
                    </p>
                </div>
                <div class="m1-card p-7" data-reveal>
                    <span class="m1-badge mb-3">CHIEF FINANCIAL OFFICER</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3">Elena Rostova</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Mengelola kepatuhan batas anggaran tahunan (FIA cost cap) senilai $135 juta dan merancang strategi pendanaan kemitraan sponsor global.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Racing Operations & Engineering --}}
    <section class="py-20 border-t border-[rgba(255,255,255,0.06)]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center gap-3 mb-10">
                <span class="w-1 h-6 bg-[#F4B63D] rounded-full"></span>
                <h2 class="font-display font-bold text-xl text-[#F8FAFC] uppercase tracking-widest">Racing Operations & Engineering</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card-elevated p-7" data-reveal>
                    <span class="m1-badge-gold mb-3">HEAD OF RACE OPERATIONS</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3">Sarah Sterling</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Mengelola logistik global, kru pit-stop, pengujian simulator, dan kepatuhan peraturan FIA di semua divisi kejuaraan.
                    </p>
                </div>
                <div class="m1-card-elevated p-7" data-reveal>
                    <span class="m1-badge-gold mb-3">HEAD OF AERODYNAMICS</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3">Dr. Hiroshi Tanaka</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Mengawasi pengujian terowongan angin (wind tunnel) mandiri tim dan merancang aerodinamika kolong sasis Venturi untuk downforce ekstrem.
                    </p>
                </div>
                <div class="m1-card-elevated p-7" data-reveal>
                    <span class="m1-badge-gold mb-3">CHIEF INFORMATION OFFICER</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3">Anindya Surya</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Bertanggung jawab atas infrastruktur superkomputer, transmisi telemetri sasis real-time dari sirkuit ke markas besar Jakarta, dan pertahanan siber data balap.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Talent & ESG Strategy --}}
    <section class="py-20 border-t border-[rgba(255,255,255,0.06)]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center gap-3 mb-10">
                <span class="w-1 h-6 bg-[#B8E637] rounded-full"></span>
                <h2 class="font-display font-bold text-xl text-[#F8FAFC] uppercase tracking-widest">Talent & ESG Strategy</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="m1-card p-7" data-reveal>
                    <span class="m1-badge mb-3">HEAD OF DRIVER DEVELOPMENT (ACADEMY)</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3">Marcus Ericsson</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Memimpin pencarian bakat pembalap muda berbakat global dan merancang modul latihan di simulator performa tinggi M1TRG Driver Academy.
                    </p>
                </div>
                <div class="m1-card p-7" data-reveal>
                    <span class="m1-badge mb-3">DIRECTOR OF SUSTAINABILITY & ESG</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3">Clara Vandermeer</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Merintis program efisiensi bahan bakar bio-fuel netral karbon dan memimpin aksi nol emisi logistik (Net Zero 2030) seluruh unit operasional tim.
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
