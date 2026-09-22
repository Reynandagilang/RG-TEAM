@extends('layouts.rgr-premium')

@section('title', 'Keberlanjutan & Nol Karbon')
@section('meta_description', 'Komitmen tim Mobil 1 Team RG terhadap kelestarian lingkungan dan target Net Zero Carbon 2030.')

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#38C172]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">Environment</span>
            <h1 class="display-title mt-4 max-w-4xl">Sustainability</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Kecepatan tanpa mengorbankan masa depan. Mobil 1 Team RG berkomitmen penuh mewujudkan Net Zero Carbon pada tahun 2030 di seluruh aktivitas operasional.
            </p>
        </div>
    </section>

    {{-- Initiative Grid --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="m1-card-elevated p-8 relative overflow-hidden" data-reveal>
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#38C172]/05 rounded-bl-full pointer-events-none"></div>
                    <span class="m1-badge mb-4">EFUEL TECHNOLOGY</span>
                    <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-4">Bahan Bakar Hibrida 100% Berkelanjutan</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Melalui kolaborasi erat dengan mitra teknis kami Pertamax Turbo, divisi F1 M1TRG mengembangkan formulasi bahan bakar sintetis e-fuel ramah lingkungan generasi terbaru yang memangkas emisi CO2 hingga 85%.
                    </p>
                </div>

                <div class="m1-card-elevated p-8 relative overflow-hidden" data-reveal>
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#38C172]/05 rounded-bl-full pointer-events-none"></div>
                    <span class="m1-badge mb-4">ZERO EMISSION HQ</span>
                    <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-4">Markas Logistik Nol Emisi</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Pusat perancangan teknologi M1TRG di Jakarta ditenagai penuh oleh jaringan sel surya mandiri dan sistem pengelolaan air bersiklus tertutup (closed-loop) untuk meminimalkan limbah industri.
                    </p>
                </div>

                <div class="m1-card-elevated p-8 relative overflow-hidden" data-reveal>
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#38C172]/05 rounded-bl-full pointer-events-none"></div>
                    <span class="m1-badge mb-4">CARBON RECYCLING</span>
                    <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-4">Daur Ulang Serat Karbon</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Kami mendaur ulang 100% limbah sasis serat karbon yang rusak pasca-tabrakan sirkuit. Serat karbon bekas ini diolah kembali menjadi komponen simulator latihan balap akademi serta furnitur markas tim.
                    </p>
                </div>

                <div class="m1-card-elevated p-8 relative overflow-hidden" data-reveal>
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#38C172]/05 rounded-bl-full pointer-events-none"></div>
                    <span class="m1-badge mb-4">GREEN LOGISTICS</span>
                    <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-4">Kemitraan Logistik Hijau</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">
                        Bekerja sama dengan penyedia logistik global untuk meminimalkan penerbangan kargo udara. Kami memprioritaskan kargo laut dan menggunakan armada truk bertenaga listrik/bio-fuel selama musim balap berlangsung.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Commitment Bar --}}
    <section class="pb-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="m1-glass p-10 text-center relative overflow-hidden" data-reveal>
                <div class="absolute inset-0 bg-gradient-to-r from-[#38C172]/03 via-transparent to-[#B8E637]/03 pointer-events-none"></div>
                <span class="m1-badge mb-4 relative z-10">NET ZERO 2030</span>
                <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-3 relative z-10">Komitmen Kami untuk Masa Depan</h3>
                <p class="text-sm text-[#D2D6DC] max-w-2xl mx-auto leading-relaxed font-body relative z-10">
                    Mobil 1 Team RG adalah salah satu dari sedikit tim balap independen yang secara sukarela menerapkan standar ESG ketat dari FIA. Kami percaya inovasi berkelanjutan bukanlah hambatan, melainkan percepatan menuju kemenangan yang bertanggung jawab.
                </p>
            </div>
        </div>
    </section>

</div>
@endsection
