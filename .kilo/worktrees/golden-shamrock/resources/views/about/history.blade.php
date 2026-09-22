@extends('layouts.rgr-premium')

@section('title', 'Tentang Kami — Mobil 1 Team RG')
@section('meta_description', 'Profil resmi, sejarah, visi-misi, serta filosofi kampanye warna hitam-emas-merah tim balap independen Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">Company Profile</span>
            <h1 class="display-title mt-4 max-w-4xl">Tentang Kami</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Kisah dedikasi, kemandirian tim privat, dan tekad murni untuk mendefinisikan ulang batas performa motorsport global.
            </p>
        </div>
    </section>

    {{-- Storytelling --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 items-start">
                <div class="lg:col-span-2 space-y-8">
                    <h2 class="font-display font-black text-4xl lg:text-5xl text-[#F8FAFC] tracking-tight leading-tight">Menolak Menjadi Pelengkap Grid</h2>
                    <div class="text-base text-[#D2D6DC] leading-relaxed font-body space-y-6 max-w-[65ch]">
                        <p>
                            <strong class="text-[#F8FAFC] font-semibold">Mobil 1 Team RG</strong> berdiri sebagai antitesis dari tim pabrikan beranggaran tak terbatas. Kami memulai segalanya dari garasi riset independen kecil di Senayan pada 2018. Diprakarsai oleh Rey Gilang, target kami sejak hari pertama adalah membuktikan bahwa presisi rekayasa dan rasa lapar akan podium dapat menaklukkan dominasi korporasi di lintasan balap dunia.
                        </p>
                        <p>
                            Jalan kami bukanlah jalan pintas. Kami memilih membangun kemandirian profesional, menguji batas ketahanan mekanis, dan memformulasikan strategi balap berbasis analisis telemetri real-time. Bagi kami, balapan adalah sains yang dijalankan dengan nyali.
                        </p>
                        <p>
                            Melalui kolaborasi teknis strategis dengan mitra global di ajang Formula 1, WEC Hypercar, hingga WRC, kami memadukan mesin hibrida berkinerja tinggi dengan determinasi kru pit-wall kami. Kami tidak turun ke sirkuit sekadar untuk mengisi barisan start—kami bertarung untuk memimpin balapan.
                        </p>
                    </div>

                    <div class="p-8 border-l-2 border-l-[#B8E637] bg-[#171B20]/40 relative" data-reveal>
                        <span class="absolute top-4 right-6 text-6xl text-[#B8E637]/10 font-serif leading-none">“</span>
                        <p class="text-[#D2D6DC] text-base italic leading-relaxed font-body max-w-[60ch]">
                            Kami lahir dari semangat privateer yang menolak berkompromi. Identitas hitam kami melambangkan ketangguhan operasional, sementara aksen emas premium merayakan target podium utama di setiap akhir pekan balapan. Warna merah pada angka satu adalah representasi visual dari api ambisi kami yang tidak pernah padam.
                        </p>
                    </div>
                </div>

                {{-- Brand Color Philosophy --}}
                <div class="space-y-6 lg:border-l lg:border-[rgba(255,255,255,0.06)] lg:pl-10">
                    <h3 class="font-display font-bold text-lg text-[#F8FAFC] uppercase tracking-wider">Filosofi Warna Tim</h3>
                    <p class="text-sm text-[#8C96A3] leading-relaxed font-body">Identitas visual kami mencerminkan api ambisi, ketahanan mekanis, dan kemewahan target podium teratas.</p>

                    <div class="space-y-4">
                        <div class="m1-card p-4 flex items-start gap-4" data-reveal>
                            <span class="w-12 h-12 flex items-center justify-center font-display font-black text-xs rounded bg-[#111315] text-[#F8FAFC] border border-[rgba(255,255,255,0.15)] shrink-0">BK</span>
                            <div>
                                <h4 class="text-xs font-display font-bold text-[#F8FAFC] uppercase tracking-wide">Hitam (Ketangguhan)</h4>
                                <p class="text-xs text-[#8C96A3] leading-normal mt-1">Melambangkan kedisiplinan operasional manajemen tim dan kekuatan rekayasa mekanik murni di dalam garasi privat kami.</p>
                            </div>
                        </div>

                        <div class="m1-card p-4 flex items-start gap-4" data-reveal>
                            <span class="w-12 h-12 flex items-center justify-center font-display font-black text-xs rounded bg-[#F4B63D] text-[#111315] border border-[#F4B63D] shrink-0">GL</span>
                            <div>
                                <h4 class="text-xs font-display font-bold text-[#F8FAFC] uppercase tracking-wide">Emas (Podium Tertinggi)</h4>
                                <p class="text-xs text-[#8C96A3] leading-normal mt-1">Representasi visual premium dari target tunggal kami di setiap balapan: berdiri tegak merebut piala di podium nomor satu.</p>
                            </div>
                        </div>

                        <div class="m1-card p-4 flex items-start gap-4" data-reveal>
                            <span class="w-12 h-12 flex items-center justify-center font-display font-black text-xs rounded bg-[#B8E637] text-[#111315] border border-[#B8E637] shrink-0">RD</span>
                            <div>
                                <h4 class="text-xs font-display font-bold text-[#F8FAFC] uppercase tracking-wide">Merah Mobil 1 (Api Ambisi)</h4>
                                <p class="text-xs text-[#8C96A3] leading-normal mt-1">Simbol dari api semangat membara, determinasi pantang menyerah, dan performa pelumasan motorsport kelas dunia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Milestones Timeline --}}
    <section class="py-20 border-t border-[rgba(255,255,255,0.06)]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-3">
                    <span class="w-1 h-6 bg-[#B8E637] rounded-full"></span>
                    <h2 class="font-display font-bold text-2xl text-[#F8FAFC]">Linimasa Sejarah Tim</h2>
                </div>
                <div class="w-8 h-0.5 bg-[#B8E637]"></div>
            </div>

            <div class="space-y-6">
                <div class="m1-card-elevated p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-4xl text-[#B8E637] md:w-28 block shrink-0 leading-none">2018</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-1">Pendirian Garasi Riset Senayan</h4>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">Rey Gilang mendirikan divisi riset teknik balap kecil di Senayan, Jakarta, berfokus pada dinamika suspensi dan rekayasa komponen serat karbon lokal.</p>
                    </div>
                </div>

                <div class="m1-card-elevated p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-4xl text-[#B8E637] md:w-28 block shrink-0 leading-none">2019</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-1">Dominasi Karting Nasional</h4>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">Tim gokart junior M1TRG mendominasi kelas senior di sirkuit Sentul, melahirkan bibit pembalap muda pertama untuk program pembinaan akademi.</p>
                    </div>
                </div>

                <div class="m1-card-elevated p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-4xl text-[#B8E637] md:w-28 block shrink-0 leading-none">2020</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-1">Kemenangan Le Mans Virtual E-Sports</h4>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">Mendirikan divisi simulator profesional saat pandemi global, menyabet podium utama di ajang ketahanan 24 Hours of Le Mans Virtual.</p>
                    </div>
                </div>

                <div class="m1-card-elevated p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-4xl text-[#B8E637] md:w-28 block shrink-0 leading-none">2022</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-1">Debut Kejuaraan Dunia Ketahanan FIA WEC</h4>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">Mengekspansi program balap ke sirkuit internasional kelas LMP2, langsung mencatatkan podium pertama tim di sirkuit ketahanan Spa-Francorchamps.</p>
                    </div>
                </div>

                <div class="m1-card-elevated p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-4xl text-[#B8E637] md:w-28 block shrink-0 leading-none">2024</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-1">Juara Dunia WEC Kelas Hypercar</h4>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">Menyabet mahkota juara dunia konstruktor kelas utama Hypercar menggunakan purwarupa M1TRG Valkyrie-H setelah kemenangan legendaris Le Mans 24 Jam.</p>
                    </div>
                </div>

                <div class="m1-card-elevated p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-4xl text-[#B8E637] md:w-28 block shrink-0 leading-none">2025</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-1">Masuk ke Grid Formula 1</h4>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">Memperoleh lisensi konstruktor utama F1 dari FIA, menggandeng Mercedes-AMG sebagai mitra penyedia mesin hibrida berkinerja tinggi.</p>
                    </div>
                </div>

                <div class="m1-card-elevated p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-4xl text-[#B8E637] md:w-28 block shrink-0 leading-none">2026</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-[#F8FAFC] mb-1">Ekspansi Global 7 Seri Kejuaraan</h4>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body">Melakukan perluasan operasi tim di ajang NASCAR Cup Series, NTT IndyCar Series, FIA World Rally Championship (WRC), dan GT World Challenge global.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Office Locations --}}
    <section class="py-20 border-t border-[rgba(255,255,255,0.06)]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <span class="section-eyebrow">Global Operations</span>
                <h2 class="font-display font-bold text-2xl text-[#F8FAFC] mt-4">Lokasi Markas & Kantor</h2>
                <div class="w-8 h-0.5 bg-[#B8E637] mt-3"></div>
                <p class="text-sm text-[#8C96A3] leading-relaxed max-w-2xl mt-3">Operasional Mobil 1 Team RG dijalankan dari dua basis strategis yang menghubungkan jantung teknis domestik dengan koridor bisnis motorsport Eropa.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="m1-card p-7" data-reveal>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-10 h-10 flex items-center justify-center bg-[#B8E637] text-[#111315] font-display font-black text-xs rounded">HQ</span>
                        <div>
                            <h3 class="font-display font-bold text-base text-[#F8FAFC]">Kantor Utama (Main Headquarters)</h3>
                            <span class="text-[0.62rem] font-ui tracking-widest text-[#B8E637] uppercase font-bold">Markas Pusat Global — Jantung Operasional</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mb-4 text-sm text-[#D2D6DC] font-body">
                        <span>📍</span>
                        <span>Area Paddock Sirkuit Internasional Sentul, Bogor, Indonesia</span>
                    </div>

                    <div class="space-y-3">
                        <div class="m1-card-elevated p-3 flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded font-mono font-bold text-[0.6rem] shrink-0">01</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-[#F8FAFC]">Pusat Rekayasa Mesin (Main Workshop)</h5>
                                <p class="text-xs text-[#8C96A3] leading-relaxed mt-0.5">Tempat perakitan, modifikasi, dan perawatan rutin mobil/motor balap secara fisik.</p>
                            </div>
                        </div>
                        <div class="m1-card-elevated p-3 flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded font-mono font-bold text-[0.6rem] shrink-0">02</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-[#F8FAFC]">Gudang Logistik Utama</h5>
                                <p class="text-xs text-[#8C96A3] leading-relaxed mt-0.5">Menyimpan unit kendaraan, ban cadangan, alat ukur telemetri, dan suplai pelumas utama dari Mobil 1.</p>
                            </div>
                        </div>
                        <div class="m1-card-elevated p-3 flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded font-mono font-bold text-[0.6rem] shrink-0">03</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-[#F8FAFC]">Pusat Latihan Pebalap</h5>
                                <p class="text-xs text-[#8C96A3] leading-relaxed mt-0.5">Markas bagi pebalap untuk latihan fisik, simulasi taktik, serta evaluasi langsung di lintasan sirkuit Sentul (Track Day).</p>
                            </div>
                        </div>
                        <div class="m1-card-elevated p-3 flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded font-mono font-bold text-[0.6rem] shrink-0">04</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-[#F8FAFC]">Manajemen Domestik</h5>
                                <p class="text-xs text-[#8C96A3] leading-relaxed mt-0.5">Mengurus pendaftaran kejuaraan nasional/Asia, hubungan media lokal, dan operasional situs web resmi tim.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m1-card p-7" data-reveal>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-10 h-10 flex items-center justify-center bg-[#20252C] text-[#F8FAFC] font-display font-black text-xs rounded border border-[rgba(255,255,255,0.08)]">EU</span>
                        <div>
                            <h3 class="font-display font-bold text-base text-[#F8FAFC]">Kantor Cabang Internasional (European Hub)</h3>
                            <span class="text-[0.62rem] font-ui tracking-widest text-[#B8E637] uppercase font-bold">Kantor Perwakilan Eropa — Pintu Gerbang Internasional</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mb-4 text-sm text-[#D2D6DC] font-body">
                        <span>📍</span>
                        <span>Frankfurt Airport Center / Nürburgring Area, Jerman</span>
                    </div>

                    <div class="space-y-3">
                        <div class="m1-card-elevated p-3 flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded font-mono font-bold text-[0.6rem] shrink-0">01</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-[#F8FAFC]">Jembatan Balapan Eropa (European Race Gateway)</h5>
                                <p class="text-xs text-[#8C96A3] leading-relaxed mt-0.5">Pusat koordinasi logistik saat berkompetisi atau uji coba di sirkuit legendaris Eropa seperti Nürburgring, Spa-Francorchamps, atau Monza.</p>
                            </div>
                        </div>
                        <div class="m1-card-elevated p-3 flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded font-mono font-bold text-[0.6rem] shrink-0">02</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-[#F8FAFC]">Hub Bisnis & Sponsor Global</h5>
                                <p class="text-xs text-[#8C96A3] leading-relaxed mt-0.5">Tempat pertemuan bisnis tatap muka dengan manajemen Mobil 1 Global, G-SHOCK Eropa, atau brand multinasional lainnya untuk negosiasi kontrak sponsorship.</p>
                            </div>
                        </div>
                        <div class="m1-card-elevated p-3 flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded font-mono font-bold text-[0.6rem] shrink-0">03</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-[#F8FAFC]">Jalur Cepat Komponen FIA (Fast-Track Logistics)</h5>
                                <p class="text-xs text-[#8C96A3] leading-relaxed mt-0.5">Mempermudah pembelian, pengiriman, dan pengurusan bea cukai suku cadang balap bersertifikasi FIA (suspensi Ohlins, rem Brembo) langsung dari pabrikan Eropa.</p>
                            </div>
                        </div>
                        <div class="m1-card-elevated p-3 flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-[#B8E637]/10 text-[#B8E637] rounded font-mono font-bold text-[0.6rem] shrink-0">04</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-[#F8FAFC]">Rekrutmen Talenta Internasional</h5>
                                <p class="text-xs text-[#8C96A3] leading-relaxed mt-0.5">Mempermudah penyewaan jasa insinyur balap (Race Engineer) atau ahli strategi sirkuit lokal Eropa secara jangka pendek (freelance) saat balapan berlangsung.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
