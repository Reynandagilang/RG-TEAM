@extends('layouts.rgr-premium')

@section('title', 'WRC Rally Division — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi World Rally Championship dengan dukungan pabrikan Toyota Gazoo Racing.')

@push('styles')
<style>
.wrc-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(229,72,77,0.03) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(229,72,77,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
}
</style>
@endpush

@section('content')
<div class="min-h-screen" style="background:#111315;">

    {{-- Hero Section --}}
    <section class="position-relative" style="padding-top:130px;padding-bottom:60px;overflow:hidden;">
        <div class="wrc-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 position-relative">
            <p class="section-eyebrow mb-4" style="color:#E5484D!important;">WRC RALLY DIVISION</p>
            <h1 class="display-title mb-4">World Rally Championship</h1>
            <p class="section-subtitle" style="max-width:600px;">
                Menaklukkan jalur salju ekstrem, lumpur tebal, dan kerikil terjal di seluruh penjuru dunia. Bermitra resmi dengan Toyota Gazoo Racing untuk menyuplai sasis hybrid penakluk reli dunia.
            </p>
        </div>
    </section>

    {{-- Key Stats --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="d-flex justify-content-between align-items-start gap-4 mb-12 flex-wrap">
                <div>
                    <p class="section-eyebrow" style="color:#E5484D!important;">DIVISION STATS</p>
                    <h2 class="section-title-std mt-2">Rally Dominance</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#E5484D;font-family:'Albert Sans',sans-serif;">10</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">WRC Titles</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Akumulasi gelar juara dunia Kalle Rovanperä (2) + Sébastien Ogier (8)</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#E5484D;font-family:'Albert Sans',sans-serif;">500 HP</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Hybrid Max Power</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">1.6L Turbo + Motor listrik 100kW</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#E5484D;font-family:'Albert Sans',sans-serif;">122</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Total Rally Wins</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Kemenangan etape global WRC sepanjang karier pembalap kami</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Car & Drivers --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2" style="color:#E5484D!important;">RALLY1 ARMADA</p>
            <h2 class="section-title-std mb-10">Line-Up WRC</h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Car Specs --}}
                <div class="m1-card-elevated p-5 d-flex flex-column">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block" style="background:rgba(229,72,77,0.12)!important;color:#E5484D!important;border-color:rgba(229,72,77,0.25)!important;">CAR #69 · TOYOTA</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Toyota GR Yaris Rally1</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2rem;color:#E5484D;">#69</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;">1.6L Direct Injection Turbo + Motor Listrik 100kW · 500 HP · Torsi instan di putaran rendah.</p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <h4 class="fw-bold mb-2" style="font-family:'Albert Sans',sans-serif;font-size:0.78rem;color:#F8FAFC;">SPESIFIKASI SASIS:</h4>
                            <div style="font-family:'JetBrains Mono',monospace;font-size:0.72rem;color:#8C96A3;">
                                <p class="mb-1">Struktur: Spaceframe Baja & Karbon</p>
                                <p class="mb-1">Transmisi: 5-speed Sequential AWD</p>
                                <p>Ban: Pirelli P Zero / Scorpion</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kalle Rovanperä --}}
                <div class="m1-card-elevated p-5 d-flex flex-column">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block" style="background:rgba(229,72,77,0.12)!important;color:#E5484D!important;border-color:rgba(229,72,77,0.25)!important;">RALLY DRIVER · FINLANDIA</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Kalle Rovanperä</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2rem;color:#E5484D;">#69</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">
                            Juara dunia WRC termuda sepanjang sejarah. Terkenal dengan kemampuannya mengendalikan mobil di kecepatan tinggi pada lintasan licin bersalju.
                        </p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <div class="d-flex justify-content-between mb-2" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Podium WRC:</span>
                                <span class="fw-bold" style="color:#F8FAFC;">24 Kali</span>
                            </div>
                            <div class="d-flex justify-content-between" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Gelar Dunia:</span>
                                <span class="fw-bold" style="color:#E5484D;">2 Kali (2022, 2023)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sébastien Ogier --}}
                <div class="m1-card-elevated p-5 d-flex flex-column">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block" style="background:rgba(229,72,77,0.12)!important;color:#E5484D!important;border-color:rgba(229,72,77,0.25)!important;">RALLY DRIVER · PRANCIS</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Sébastien Ogier</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2rem;color:#E5484D;">#17</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">
                            Legenda hidup olahraga reli dunia dengan 8 gelar juara dunia. Memiliki gaya mengemudi yang rapi, efisien, dan sangat taktis.
                        </p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <div class="d-flex justify-content-between mb-2" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Podium WRC:</span>
                                <span class="fw-bold" style="color:#F8FAFC;">98 Kali</span>
                            </div>
                            <div class="d-flex justify-content-between" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Gelar Dunia:</span>
                                <span class="fw-bold" style="color:#E5484D;">8 Kali</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Hybrid Boost Simulator --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;" x-data="wrcHybridSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="m1-card-elevated p-6 position-relative overflow-hidden">
                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between gap-4 mb-4 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                    <div>
                        <p class="section-eyebrow" style="color:#E5484D!important;">RALLY HYBRID TELEMETRY</p>
                        <h3 class="section-title-std" style="font-size:clamp(1.2rem,2.5vw,1.6rem);">Simulator Hybrid Boost WRC</h3>
                    </div>
                    <span class="m1-badge" style="background:rgba(229,72,77,0.12)!important;color:#E5484D!important;border-color:rgba(229,72,77,0.25)!important;">RALLY1 HYBRID UNIT</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 align-items-center">
                    <div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.82rem;color:#D2D6DC;line-height:1.65;">
                            Mobil Rally1 modern dibekali motor listrik 100 kW yang melepaskan daya dorong hybrid otomatis saat akselerasi. Tekan tombol gas untuk mensimulasikan dorongan hybrid!
                        </p>
                        <button @mousedown="pressThrottle()" @mouseup="releaseThrottle()" @touchstart="pressThrottle()" @touchend="releaseThrottle()" class="btn-m1-primary w-100 justify-content-center select-none mt-3" style="background:#E5484D!important;border-color:#E5484D!important;color:#F8FAFC!important;">
                            TAHAN PEDAL GAS (Hybrid Boost)
                        </button>
                        <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;">*Tahan klik mouse untuk melepaskan daya dorong hybrid.</p>
                    </div>
                    <div class="m1-glass p-4 d-flex flex-column justify-content-between" style="min-height:160px;">
                        <div>
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:0.75rem;">TELEMETRI SASIS</p>
                            <div class="d-flex justify-content-between mb-2" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">RPM:</span>
                                <span class="fw-bold" style="color:#F8FAFC;" x-text="rpm">2,200 RPM</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Tenaga:</span>
                                <span class="fw-bold" style="color:#F8FAFC;" x-text="hp">380 HP</span>
                            </div>
                            <div class="d-flex justify-content-between" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Motor Listrik:</span>
                                <span class="fw-bold" :style="boostActive ? 'color:#E5484D' : 'color:#8C96A3'" x-text="boostStatus">Regenerasi (0 kW)</span>
                            </div>
                        </div>
                        <div class="mt-3 pt-2" style="border-top:1px solid rgba(255,255,255,0.06);font-family:'JetBrains Mono',monospace;font-size:0.75rem;color:#E5484D;" x-text="stageStatus">
                            &gt; Siap meluncur di etape...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Gallery --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2" style="color:#E5484D!important;">GALLERY</p>
            <h2 class="section-title-std mb-8">WRC Action Gallery</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">RALLY SWEDEN SNOW</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Rally Sweden Snow Drift</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">GR Yaris Rally1 meluncur melintasi tumpukan salju ekstrem di Umeå.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">MONTE CARLO</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Monte Carlo Hairpin Descent</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Ogier menuruni lereng aspal basah pegunungan Alpen dengan presisi.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">FINLAND JUMP</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Finland Colin's Crest Jump</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Rovanperä melompati bukit kerikil di etape tercepat WRC Finland.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sponsors --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2" style="color:#E5484D!important;">DIVISION PARTNERS</p>
            <h2 class="section-title-std mb-8">WRC Series Sponsors</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @php
                    $wrcSponsors = ['Pertamina Lubricants', 'G-Shock (Casio)', 'Pirelli Indonesia', 'Ohlins Indonesia', 'Oakley Indonesia'];
                @endphp
                @foreach($wrcSponsors as $name)
                    <div class="m1-card p-4 d-flex flex-column align-items-center justify-content-center text-center" style="min-height:100px;">
                        <span class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">{{ $name }}</span>
                        <span class="mt-2 fw-bold text-uppercase" style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#E5484D;letter-spacing:0.12em;">WRC Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function wrcHybridSimulator() {
    return {
        boostActive: false,
        rpm: '2,200 RPM',
        hp: '380 HP',
        boostStatus: 'Regenerasi Daya (0 kW)',
        stageStatus: '> Siap meluncur di etape...',
        timer: null,
        pressThrottle() {
            this.boostActive = true;
            this.rpm = '6,800 RPM';
            this.hp = '500 HP (Power Maksimum)';
            this.boostStatus = 'DEPLOI HYBRID AKTIF (+100 kW)';
            this.stageStatus = '> AKSELERASI PENUH: Melompati bukit kerikil!';
        },
        releaseThrottle() {
            this.boostActive = false;
            this.rpm = '2,200 RPM';
            this.hp = '380 HP';
            this.boostStatus = 'Regenerasi Daya (Braking)';
            this.stageStatus = '> Deselerasi: Mengisi ulang baterai hybrid.';
        }
    }
}
</script>
@endpush