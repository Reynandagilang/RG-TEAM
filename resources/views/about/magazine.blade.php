@extends('layouts.rgr-premium')

@section('title', 'RGR Magazine - Edisi Digital')
@section('meta_description', 'Baca majalah eksklusif M1TRG Magazine edisi bulanan yang membahas analisis mendalam teknis dan profil pembalap.')

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">Publications</span>
            <h1 class="display-title mt-4 max-w-4xl">RGR Magazine</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Majalah digital bulanan eksklusif yang membedah riset teknologi aerodinamika markas M1TRG Jakarta, strategi pit-stop, dan galeri foto sirkuit.
            </p>
        </div>
    </section>

    {{-- Magazine Issues --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">
            {{-- Featured --}}
            <div class="m1-card-elevated p-8 flex flex-col justify-between md:col-span-2 border-[#B8E637]/30" data-reveal>
                <div>
                    <span class="m1-badge mb-3">Edisi Spesial: Desain & Interaktivitas</span>
                    <h3 class="font-display font-bold text-3xl text-[#F8FAFC] mb-4">Formula Sukses Web Motorsport Modern</h3>
                    <div class="grid md:grid-cols-2 gap-8 text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        <div>
                            <h4 class="font-display font-bold text-[#F8FAFC] text-base mb-2">1. Tampilan: Pilih Tailwind CSS dibanding Bootstrap</h4>
                            <p class="text-sm">
                                Website balap itu butuh visual yang agresif, modern, dan unik. Kalau pakai Bootstrap, tampilan websitemu bakal kelihatan kaku dan mirip website kantoran atau portal berita. Dengan Tailwind, kamu bisa bikin transisi animasi yang halus (misal: efek hover saat foto pembalap disorot), desain kartu yang estetik, dan tata letak (layout) grid foto galeri yang dinamis dengan sangat mudah.
                            </p>
                            <p class="text-sm mt-2 italic text-[#B8E637]">
                                Contoh Kasus: Kamu bisa bikin tagline tim dengan efek gradasi warna neon khas racing hanya dengan beberapa baris kelas Tailwind.
                            </p>
                        </div>
                        <div>
                            <h4 class="font-display font-bold text-[#F8FAFC] text-base mb-2">2. Interaktivitas: Gunakan Vue.js untuk Efek Canggih</h4>
                            <p class="text-sm">
                                Untuk website tim balap, Laravel polosan (+ Blade Template) sudah lebih dari cukup. Tapi kalau kamu mau websitemu terasa super premium tanpa loading putar-putar saat pindah halaman, Vue.js adalah jodoh terbaik buat Laravel. Di website tim balap, Vue.js bakal keren banget buat menangani fitur interaktif seperti:
                            </p>
                            <ul class="list-disc pl-4 text-sm mt-2 space-y-1 text-[#D2D6DC]">
                                <li><strong class="text-[#F8FAFC]">Countdown Timer:</strong> Hitung mundur otomatis menuju hari balapan secara real-time.</li>
                                <li><strong class="text-[#F8FAFC]">Live Race Results:</strong> Klasemen poin atau hasil balapan yang bisa difilter berdasarkan tahun atau sirkuit tanpa perlu refresh halaman web.</li>
                                <li><strong class="text-[#F8FAFC]">Galeri Foto Pop-up:</strong> Buka foto-aksi motor/mobil di sirkuit dengan efek lightbox yang mulus dan ringan.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn-m1-primary text-xs w-fit">Baca Edisi Digital (PDF)</a>
            </div>

            <div class="m1-card p-8 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="m1-badge mb-3">EDISI JUNI 2026</span>
                    <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-4">Merah Laser & Kecepatan Mutakhir</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Membahas secara mendalam transisi visual ke tema Championship Laser, perolehan podium ganda di kejuaraan, dan rahasia sasis hibrida di trek lurus Spa-Francorchamps.
                    </p>
                </div>
                <a href="#" class="btn-m1-primary text-xs w-fit">Baca Edisi Digital (PDF)</a>
            </div>

            <div class="m1-card p-8 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="m1-badge mb-3">EDISI MEI 2026</span>
                    <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-4">Mastering Wet Weather Setup</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Bagaimana para insinyur M1TRG merancang peta distribusi daya baterai listrik (MGU-K) pada lintasan basah ekstrim untuk mencegah ban mengalami slip.
                    </p>
                </div>
                <a href="#" class="btn-m1-primary text-xs w-fit">Baca Edisi Digital (PDF)</a>
            </div>

            <div class="m1-card p-8 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="m1-badge-muted mb-3">EDISI APRIL 2026</span>
                    <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-4">Pusat Aerodinamika & Terowongan Angin Baru</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Mengupas tuntas peresmian fasilitas pengujian aerodinamika terowongan angin baru M1TRG di Jakarta Utara, serta kelebihannya dalam mensimulasikan turbulensi udara belakang.
                    </p>
                </div>
                <a href="#" class="btn-m1-ghost text-xs w-fit">Arsip Majalah</a>
            </div>

            <div class="m1-card p-8 flex flex-col justify-between" data-reveal>
                <div>
                    <span class="m1-badge-muted mb-3">EDISI MARET 2026</span>
                    <h3 class="font-display font-bold text-2xl text-[#F8FAFC] mb-4">Inovasi Bahan Bakar Bio & Tenaga V6</h3>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Menyelidiki masa depan e-fuel Pertamax Turbo dan bagaimana kolaborasi teknis ini berhasil menjaga performa kompresi tinggi mesin V6 Turbo Hibrida F1 RGR.
                    </p>
                </div>
                <a href="#" class="btn-m1-ghost text-xs w-fit">Arsip Majalah</a>
            </div>
        </div>
    </section>

</div>
@endsection
