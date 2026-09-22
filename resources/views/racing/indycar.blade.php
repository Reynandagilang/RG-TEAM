@extends('layouts.rgr-premium')

@section('title', 'IndyCar Series — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi NTT IndyCar Series dengan kemitraan pabrikan legendaris Arrow McLaren.')

@push('styles')
<style>
.indy-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(244,181,61,0.03) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(244,181,61,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
}
</style>
@endpush

@section('content')
<div class="min-h-screen" style="background:#111315;">

    {{-- Hero Section --}}
    <section class="position-relative" style="padding-top:130px;padding-bottom:60px;overflow:hidden;">
        <div class="indy-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 position-relative">
            <p class="section-eyebrow mb-4" style="color:#F4B63D!important;">INDYCAR DIVISION</p>
            <h1 class="display-title mb-4">NTT IndyCar Series</h1>
            <p class="section-subtitle" style="max-width:600px;">
                Kecepatan ekstrem roda terbuka di sirkuit jalan raya dan sirkuit oval Amerika Serikat. Bermitra erat dengan Arrow McLaren sebagai penyuplai sasis Dallara IR-18 dan dukungan teknis balap.
            </p>
        </div>
    </section>

    {{-- Key Stats --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="d-flex justify-content-between align-items-start gap-4 mb-12 flex-wrap">
                <div>
                    <p class="section-eyebrow" style="color:#F4B63D!important;">DIVISION STATS</p>
                    <h2 class="section-title-std mt-2">Open-Wheel Power</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#F4B63D;font-family:'Albert Sans',sans-serif;">700 HP</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Hybrid V6 Output</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Chevrolet 2.2L Twin-Turbo V6 dengan sistem hybrid</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#F4B63D;font-family:'Albert Sans',sans-serif;">380 km/h</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Rekor Kecepatan Oval</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Pato O'Ward di Indianapolis Motor Speedway</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#F4B63D;font-family:'Albert Sans',sans-serif;">15</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Total Kemenangan Seri</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Akumulasi kemenangan pembalap Arrow McLaren M1TRG</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Drivers & Cars --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2" style="color:#F4B63D!important;">ARMADA DALLARA</p>
            <h2 class="section-title-std mb-10">Line-Up IndyCar</h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Car #5 --}}
                <div class="m1-card-elevated p-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block" style="background:rgba(244,181,61,0.12)!important;color:#F4B63D!important;border-color:rgba(244,181,61,0.25)!important;">CAR #5 · CHEVROLET</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Dallara IR-18 McLaren</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2rem;color:#F4B63D;">#5</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">Mesin: Chevrolet 2.2L Twin-Turbo V6 (Hybrid) · Tenaga: 700 HP · Karakteristik: Kecepatan tinggi (high speed speedway package).</p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.78rem;color:#F8FAFC;">PEMBALAP UTAMA:</h4>
                            <p class="fw-bold mt-2 mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Pato O'Ward <span style="color:#8C96A3;font-weight:400;font-size:0.78rem;">(Meksiko)</span></p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Bintang muda eksplosif, spesialis manuver agresif di sirkuit oval.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">7</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podium</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">21</p>
                        </div>
                    </div>
                </div>

                {{-- Car #6 --}}
                <div class="m1-card-elevated p-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block" style="background:rgba(244,181,61,0.12)!important;color:#F4B63D!important;border-color:rgba(244,181,61,0.25)!important;">CAR #6 · CHEVROLET</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Dallara IR-18 McLaren</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2rem;color:#F4B63D;">#6</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">Mesin: Chevrolet 2.2L Twin-Turbo V6 (Hybrid) · Transmisi: 6-speed Sequential · Karakteristik: Downforce jalan raya.</p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.78rem;color:#F8FAFC;">PEMBALAP UTAMA:</h4>
                            <p class="fw-bold mt-2 mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Nolan Siegel <span style="color:#8C96A3;font-weight:400;font-size:0.78rem;">(AS)</span></p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Pembalap muda California, dipromosikan berkat performa impresifnya.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">0</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podium</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">2</p>
                        </div>
                    </div>
                </div>

                {{-- Car #7 --}}
                <div class="m1-card-elevated p-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block" style="background:rgba(244,181,61,0.12)!important;color:#F4B63D!important;border-color:rgba(244,181,61,0.25)!important;">CAR #7 · CHEVROLET</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Dallara IR-18 McLaren</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2rem;color:#F4B63D;">#7</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">Mesin: Chevrolet 2.2L Twin-Turbo V6 (Hybrid) · Tenaga: 700 HP · Karakteristik: Taktis untuk jalan raya perkotaan.</p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.78rem;color:#F8FAFC;">PEMBALAP UTAMA:</h4>
                            <p class="fw-bold mt-2 mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Alexander Rossi <span style="color:#8C96A3;font-weight:400;font-size:0.78rem;">(AS)</span></p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Juara Indianapolis 500 2016, pembalap kawakan dengan taktik solid.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">8</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podium</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">28</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Push-to-Pass Simulator --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;" x-data="p2pSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="m1-card-elevated p-6 position-relative overflow-hidden">
                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between gap-4 mb-4 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                    <div>
                        <p class="section-eyebrow" style="color:#F4B63D!important;">PUSH-TO-PASS SIMULATOR</p>
                        <h3 class="section-title-std" style="font-size:clamp(1.2rem,2.5vw,1.6rem);">Simulator Peningkatan Tenaga IndyCar</h3>
                    </div>
                    <span class="m1-badge" style="background:rgba(244,181,61,0.12)!important;color:#F4B63D!important;border-color:rgba(244,181,61,0.25)!important;">HYBRID OVERTAKE SYSTEM</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 align-items-center">
                    <div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.82rem;color:#D2D6DC;line-height:1.65;">
                            NTT IndyCar Series menggunakan sistem Push-to-Pass untuk memberikan dorongan tenaga ekstra instan sebesar 60 HP selama durasi terbatas (maksimal 200 detik per balapan) guna memudahkan manuver menyalip.
                        </p>
                        <div class="d-flex gap-3 mt-3">
                            <button @click="triggerP2P()" :disabled="p2pActive" class="btn-m1-primary flex-fill justify-content-center">
                                <span x-text="p2pActive ? 'Dorongan Aktif!' : 'Aktifkan Push-to-Pass'"></span>
                            </button>
                            <button @click="resetP2P()" class="btn-m1-ghost">Reset</button>
                        </div>
                    </div>
                    <div class="m1-glass p-4 d-flex flex-column justify-content-between" style="min-height:160px;">
                        <div>
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:0.75rem;">TELEMETRI INSTAN</p>
                            <div class="d-flex justify-content-between mb-2" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Tenaga Mesin:</span>
                                <span class="fw-bold" style="color:#F8FAFC;" x-text="enginePower">640 HP</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Kecepatan Puncak:</span>
                                <span class="fw-bold" style="color:#F8FAFC;" x-text="topSpeed">365 km/jam</span>
                            </div>
                            <div class="d-flex justify-content-between" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Sisa P2P:</span>
                                <span class="fw-bold" style="color:#F4B63D;" x-text="timeLeft + ' Detik'">200</span>
                            </div>
                        </div>
                        <div class="mt-3 pt-2" style="border-top:1px solid rgba(255,255,255,0.06);font-family:'JetBrains Mono',monospace;font-size:0.75rem;color:#F4B63D;" x-text="simStatus">
                            &gt; Siap meluncurkan dorongan tenaga...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Gallery --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2" style="color:#F4B63D!important;">GALLERY</p>
            <h2 class="section-title-std mb-8">IndyCar Action Gallery</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">INDY 500 QUALIFYING</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Indy 500 Qualy Hotlap</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Pato O'Ward mencatatkan rata-rata kecepatan 233 mph di Indianapolis.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">DETROIT PIT STOP</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Detroit Pit Lane Action</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Kru mekanik mengganti ban dan menyesuaikan sayap depan Dallara.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">ROAD AMERICA</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Road America Battle</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Siegel memaksimalkan Push-to-Pass untuk merebut posisi di trek lurus.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sponsors --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2" style="color:#F4B63D!important;">DIVISION PARTNERS</p>
            <h2 class="section-title-std mb-8">IndyCar Series Sponsors</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @php
                    $indySponsors = ['Bank BCA', 'Telkomsel Flash', 'Pirelli Indonesia', 'Ohlins Indonesia', 'Brembo'];
                @endphp
                @foreach($indySponsors as $name)
                    <div class="m1-card p-4 d-flex flex-column align-items-center justify-content-center text-center" style="min-height:100px;">
                        <span class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">{{ $name }}</span>
                        <span class="mt-2 fw-bold text-uppercase" style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#F4B63D;letter-spacing:0.12em;">IndyCar Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function p2pSimulator() {
    return {
        p2pActive: false,
        enginePower: '640 HP',
        topSpeed: '365 km/jam',
        timeLeft: 200,
        simStatus: '> Siap meluncurkan dorongan tenaga...',
        timer: null,
        triggerP2P() {
            if (this.timeLeft <= 0) { this.simStatus = '> Dorongan habis!'; return; }
            this.p2pActive = true;
            this.enginePower = '700 HP (+60 HP Boost)';
            this.topSpeed = '380 km/jam';
            this.simStatus = '> DORONGAN PUSH-TO-PASS AKTIF!';
            this.timer = setInterval(() => {
                if (this.timeLeft > 0) this.timeLeft--;
                else this.resetP2P();
            }, 1000);
        },
        resetP2P() {
            clearInterval(this.timer);
            this.p2pActive = false;
            this.enginePower = '640 HP';
            this.topSpeed = '365 km/jam';
            this.simStatus = '> Sistem kembali ke setelan daya standar.';
        }
    }
}
</script>
@endpush