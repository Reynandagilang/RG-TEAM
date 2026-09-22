@extends('layouts.rgr-premium')

@section('title', 'Bergabung Bersama Tim | Mobil 1 Team RG')
@section('meta_description', 'Buka karir motorsport impian Anda. Temukan lowongan insinyur aerodinamika, mekanik pit-stop, dan staf operasional RGR.')

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">Careers</span>
            <h1 class="display-title mt-4 max-w-4xl">Join Our Team</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Membangun masa depan motorsport bersama. Mobil 1 Team RG membuka kesempatan karir bagi talenta terbaik dunia untuk bergabung dalam divisi teknik dan operasional balap.
            </p>
        </div>
    </section>

    {{-- Job Listings --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">
            <div class="m1-card-elevated p-8 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="m1-badge mb-3">DIVISI TEKNIK & AERODINAMIKA</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3 mt-1">Senior CFD Aerodynamicist</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Menganalisis dan mengoptimalkan aliran udara sasis Venturi ground-effect menggunakan superkomputer simulasi tingkat lanjut di markas tim M1TRG Jakarta.
                    </p>
                </div>
                <a href="#" class="btn-m1-primary text-xs w-fit">Lamar Sekarang</a>
            </div>

            <div class="m1-card-elevated p-8 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="m1-badge mb-3">DIVISI DATA & TELEMETRI</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3 mt-1">Race Systems Software Engineer</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Merancang, menguji, dan memelihara infrastruktur telemetri real-time 5G antara pit-wall sirkuit dengan ruang kontrol teknik pusat RGR.
                    </p>
                </div>
                <a href="#" class="btn-m1-primary text-xs w-fit">Lamar Sekarang</a>
            </div>

            <div class="m1-card-elevated p-8 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="m1-badge mb-3">DIVISI OPERASIONAL BALAP</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3 mt-1">Kru Mekanik Pit-Stop</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Bertanggung jawab atas presisi pengerjaan penggantian ban, dongkrak mobil, dan penyesuaian sudut sayap depan di sirkuit dalam target waktu di bawah 2.0 detik.
                    </p>
                </div>
                <a href="#" class="btn-m1-primary text-xs w-fit">Lamar Sekarang</a>
            </div>

            <div class="m1-card-elevated p-8 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="m1-badge mb-3">DIVISI HUMAS & PEMASARAN</span>
                    <h3 class="font-display font-bold text-xl text-[#F8FAFC] mb-3 mt-1">Koordinator Hubungan Fans & VIP Paddock</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Mengelola kampanye keterlibatan komunitas pendukung global, meluncurkan buletin majalah digital, dan mengoordinasikan layanan VIP Paddock Club di lokasi sirkuit.
                    </p>
                </div>
                <a href="#" class="btn-m1-primary text-xs w-fit">Lamar Sekarang</a>
            </div>
        </div>
    </section>

    {{-- Why Join --}}
    <section class="pb-20 border-t border-[rgba(255,255,255,0.06)] pt-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10 text-center">
                <span class="section-eyebrow">Benefits</span>
                <h2 class="section-title-std mt-4 text-[#F8FAFC]">Mengapa Bergabung dengan M1TRG?</h2>
                <div class="w-8 h-0.5 bg-[#B8E637] mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-6 text-center" data-reveal>
                    <span class="text-3xl font-display font-black text-[#B8E637] block mb-2">01</span>
                    <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-2">Lingkungan Global</h4>
                    <p class="text-sm text-[#8C96A3] leading-relaxed font-body">Bekerja di 7 seri kejuaraan dunia dengan perjalanan ke sirkuit legendaris di 4 benua.</p>
                </div>
                <div class="m1-card p-6 text-center" data-reveal>
                    <span class="text-3xl font-display font-black text-[#B8E637] block mb-2">02</span>
                    <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-2">Teknologi Kelas 1</h4>
                    <p class="text-sm text-[#8C96A3] leading-relaxed font-body">Akses ke superkomputer, simulator F1, dan terowongan angin tercanggih di Asia Tenggara.</p>
                </div>
                <div class="m1-card p-6 text-center" data-reveal>
                    <span class="text-3xl font-display font-black text-[#B8E637] block mb-2">03</span>
                    <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-2">Pengembangan Karir</h4>
                    <p class="text-sm text-[#8C96A3] leading-relaxed font-body">Program pelatihan berkelanjutan, sertifikasi FIA, dan jalur cepat menuju posisi kepemimpinan teknis.</p>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
