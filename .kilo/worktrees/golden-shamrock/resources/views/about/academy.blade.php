@extends('layouts.rgr-premium')

@section('title', 'RGR Driver Academy — Mobil 1 Team RG')
@section('meta_description', 'Membina talenta masa depan motorsport. Temukan jajaran pembalap muda berbakat di Mobil 1 Team RG Driver Academy.')

@section('content')
<div class="min-h-screen bg-[#111315]" x-data="academySimulator()">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10" data-reveal>
            <span class="section-eyebrow">Program Talenta Muda</span>
            <h1 class="display-title mt-4 max-w-4xl">RGR Driver Academy</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Menemukan, menguji, dan mempersiapkan generasi penerus juara dunia Formula 1. Kami membimbing pembalap muda dari gokart hingga kursi jet darat kelas utama.
            </p>
        </div>
    </section>

    {{-- Academy Drivers --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6 mb-20">
            <h2 class="font-display font-bold text-2xl text-[#F8FAFC] mb-8" data-reveal>Line-up Pembalap Akademi 2026</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="m1-card-elevated p-7 relative overflow-hidden" data-reveal>
                    <div class="absolute top-0 left-0 w-1 h-full bg-[#B8E637] opacity-30"></div>
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <span class="m1-badge mb-2">FORMULA 2</span>
                            <h3 class="font-display font-bold text-lg text-[#F8FAFC] mt-1">Arvid Lindblad</h3>
                            <p class="text-sm text-[#8C96A3] font-ui tracking-wider mt-0.5">Inggris / Swedia &middot; Usia 18</p>
                        </div>
                        <span class="font-display font-black text-2xl text-[#B8E637]">#12</span>
                    </div>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Pemenang termuda Grand Prix Macau F4 2023. Memiliki gaya berkendara agresif dengan kemampuan menyalip yang mengagumkan di sirkuit jalan raya sempit.
                    </p>
                    <div class="border-t border-[rgba(255,255,255,0.06)] pt-4 flex justify-between text-center text-sm">
                        <div>
                            <p class="text-[#8C96A3] font-ui tracking-wider uppercase text-xs">Menang F3</p>
                            <p class="font-display font-bold text-[#F8FAFC] mt-0.5">4 Kali</p>
                        </div>
                        <div>
                            <p class="text-[#8C96A3] font-ui tracking-wider uppercase text-xs">Podium</p>
                            <p class="font-display font-bold text-[#F8FAFC] mt-0.5">9 Kali</p>
                        </div>
                        <div>
                            <p class="text-[#8C96A3] font-ui tracking-wider uppercase text-xs">Poin Karir</p>
                            <p class="font-display font-bold text-[#F8FAFC] mt-0.5">113 Poin</p>
                        </div>
                    </div>
                </div>

                <div class="m1-card-elevated p-7 relative overflow-hidden" data-reveal>
                    <div class="absolute top-0 left-0 w-1 h-full bg-[#B8E637] opacity-30"></div>
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <span class="m1-badge mb-2">FORMULA 3</span>
                            <h3 class="font-display font-bold text-lg text-[#F8FAFC] mt-1">Kean Nakamura-Berta</h3>
                            <p class="text-sm text-[#8C96A3] font-ui tracking-wider mt-0.5">Jepang / Inggris &middot; Usia 18</p>
                        </div>
                        <span class="font-display font-black text-2xl text-[#B8E637]">#08</span>
                    </div>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Juara Dunia Gokart OK FIA 2021. Nakamura-Berta terkenal karena keahlian balapnya yang super presisi dalam mengelola degradasi ban di cuaca panas.
                    </p>
                    <div class="border-t border-[rgba(255,255,255,0.06)] pt-4 flex justify-between text-center text-sm">
                        <div>
                            <p class="text-[#8C96A3] font-ui tracking-wider uppercase text-xs">Juara Kart</p>
                            <p class="font-display font-bold text-[#F8FAFC] mt-0.5">2 Gelar</p>
                        </div>
                        <div>
                            <p class="text-[#8C96A3] font-ui tracking-wider uppercase text-xs">Podium F4</p>
                            <p class="font-display font-bold text-[#F8FAFC] mt-0.5">7 Kali</p>
                        </div>
                        <div>
                            <p class="text-[#8C96A3] font-ui tracking-wider uppercase text-xs">Lap Tercepat</p>
                            <p class="font-display font-bold text-[#F8FAFC] mt-0.5">3 Lap</p>
                        </div>
                    </div>
                </div>

                <div class="m1-card-elevated p-7 relative overflow-hidden" data-reveal>
                    <div class="absolute top-0 left-0 w-1 h-full bg-[#B8E637] opacity-30"></div>
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <span class="m1-badge mb-2">GOKART OK-J</span>
                            <h3 class="font-display font-bold text-lg text-[#F8FAFC] mt-1">Enzo Tarnvanichkul</h3>
                            <p class="text-sm text-[#8C96A3] font-ui tracking-wider mt-0.5">Thailand &middot; Usia 16</p>
                        </div>
                        <span class="font-display font-black text-2xl text-[#B8E637]">#54</span>
                    </div>
                    <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                        Pemenang Kejuaraan Karting Dunia FIA OK Junior 2022. Salah satu talenta Asia paling menjanjikan yang saat ini sedang mempersiapkan debut balap sasis tunggal.
                    </p>
                    <div class="border-t border-[rgba(255,255,255,0.06)] pt-4 flex justify-between text-center text-sm">
                        <div>
                            <p class="text-[#8C96A3] font-ui tracking-wider uppercase text-xs">Gelar Kart</p>
                            <p class="font-display font-bold text-[#F8FAFC] mt-0.5">1 Gelar</p>
                        </div>
                        <div>
                            <p class="text-[#8C96A3] font-ui tracking-wider uppercase text-xs">Kemenangan</p>
                            <p class="font-display font-bold text-[#F8FAFC] mt-0.5">18 Kali</p>
                        </div>
                        <div>
                            <p class="text-[#8C96A3] font-ui tracking-wider uppercase text-xs">Pole Position</p>
                            <p class="font-display font-bold text-[#F8FAFC] mt-0.5">12 Kali</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Interactive Simulator --}}
        <div class="max-w-7xl mx-auto px-6">
            <div class="m1-card-elevated p-8 relative overflow-hidden" data-reveal>
                <div class="absolute inset-0 bg-gradient-to-br from-[#B8E637]/03 to-transparent pointer-events-none"></div>

                <div class="flex flex-col md:flex-row items-start justify-between gap-6 border-b border-[rgba(255,255,255,0.06)] pb-4 mb-6">
                    <div>
                        <span class="text-xs font-ui tracking-widest text-[#B8E637] font-bold uppercase">AKSELERATOR EVALUASI PEMBALAP</span>
                        <h2 class="font-display font-bold text-2xl text-[#F8FAFC] mt-1">Simulator Tes Fisik & Kognitif Akademi</h2>
                    </div>
                    <span class="m1-badge">SIMULATOR AKTIF</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                    <div class="space-y-5">
                        <div>
                            <label class="text-xs font-ui text-[#8C96A3] uppercase tracking-wider block mb-1.5">PILIH EVALUASI PEMBALAP</label>
                            <select x-model="selectedId" class="m1-input uppercase tracking-wider text-sm">
                                <option value="arvid">Arvid Lindblad (F2)</option>
                                <option value="kean">Kean Nakamura-Berta (F3)</option>
                                <option value="enzo">Enzo Tarnvanichkul (Gokart)</option>
                            </select>
                        </div>

                        <button @click="runSimulation()" class="btn-m1-primary text-xs w-full justify-center" :disabled="testing">
                            <span x-text="testing ? 'Menjalankan Tes Kognitif...' : 'Mulai Evaluasi Pembalap'">Mulai Evaluasi Pembalap</span>
                        </button>
                    </div>

                    <div class="bg-[#171B20] border border-[rgba(255,255,255,0.06)] p-6 rounded-xl min-h-[160px] flex flex-col justify-between">
                        <div>
                            <p class="text-xs font-ui text-[#8C96A3] tracking-wider uppercase mb-3">HASIL EVALUASI TELEMETRI FISIK</p>
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm font-mono">
                                    <span class="text-[#8C96A3]">Waktu Reaksi:</span>
                                    <span class="text-[#F8FAFC] font-bold" x-text="reactionTime">0.00s</span>
                                </div>
                                <div class="flex justify-between text-sm font-mono">
                                    <span class="text-[#8C96A3]">Toleransi G-Force:</span>
                                    <span class="text-[#F8FAFC] font-bold" x-text="gForce">0.0G</span>
                                </div>
                                <div class="flex justify-between text-sm font-mono">
                                    <span class="text-[#8C96A3]">Akurasi Kemudi:</span>
                                    <span class="text-[#F8FAFC] font-bold" x-text="accuracy">0%</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-[rgba(255,255,255,0.06)] text-sm font-mono text-[#B8E637] font-bold" x-text="statusMessage">
                            &gt; Menunggu sinyal untuk memulai evaluasi fisik...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function academySimulator() {
    return {
        selectedId: 'arvid',
        testing: false,
        reactionTime: '0.00s',
        gForce: '0.0G',
        accuracy: '0%',
        statusMessage: '> Menunggu sinyal untuk memulai evaluasi fisik...',

        runSimulation() {
            this.testing = true;
            this.reactionTime = 'Menghitung...';
            this.gForce = 'Menghitung...';
            this.accuracy = 'Menghitung...';
            this.statusMessage = '> Mengkalibrasi superkomputer simulasi kognitif...';

            setTimeout(() => {
                if (this.selectedId === 'arvid') {
                    this.reactionTime = '0.14s (Luar Biasa)';
                    this.gForce = '5.4G (Sangat Tinggi)';
                    this.accuracy = '98.5%';
                    this.statusMessage = '> EVALUASI SUKSES: Tingkat kebugaran siap untuk tes lintasan F1 nyata!';
                } else if (this.selectedId === 'kean') {
                    this.reactionTime = '0.16s (Sangat Baik)';
                    this.gForce = '4.8G (Tinggi)';
                    this.accuracy = '97.2%';
                    this.statusMessage = '> EVALUASI SUKSES: Rekomendasi program pengembangan fisik lanjutan.';
                } else {
                    this.reactionTime = '0.19s (Baik)';
                    this.gForce = '3.5G (Normal)';
                    this.accuracy = '94.8%';
                    this.statusMessage = '> EVALUASI SUKSES: Talenta gokart potensial untuk promosi ke Formula 4.';
                }
                this.testing = false;
            }, 1800);
        }
    }
}
</script>
@endpush
