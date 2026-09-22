@extends('layouts.rgr-premium')

@section('title', 'Divisi NASCAR Cup Series — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi NASCAR Cup Series. Mengendarai Next-Gen Chevrolet Camaro V8 di sirkuit oval supercepat Amerika Serikat.')

@push('styles')
<style>
.nascar-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(184,230,55,0.03) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(184,230,55,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
}
</style>
@endpush

@section('content')
<div class="min-h-screen" style="background:#111315;">

    {{-- Hero Section --}}
    <section class="position-relative" style="padding-top:130px;padding-bottom:60px;overflow:hidden;">
        <div class="nascar-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 position-relative">
            <p class="section-eyebrow mb-4">STOCK CAR DIVISION</p>
            <h1 class="display-title mb-4">NASCAR Cup Series</h1>
            <p class="section-subtitle" style="max-width:600px;">
                Deru mesin naturally aspirated V8 5.86 Liter. Mobil 1 Team RG menantang batas aerodinamis slipstream di sirkuit oval legendaris Amerika seperti Daytona dan Talladega.
            </p>
        </div>
    </section>

    {{-- Key Stats --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="d-flex justify-content-between align-items-start gap-4 mb-12 flex-wrap">
                <div>
                    <p class="section-eyebrow">DIVISION STATS</p>
                    <h2 class="section-title-std mt-2">V8 Dominance</h2>
                </div>
                <a href="#" class="btn-m1-secondary">Full Stats</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#B8E637;font-family:'Albert Sans',sans-serif;">670 HP</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Short Track Power</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Tenaga V8 terbatas restrictor plate di superspeedway (510 HP)</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#B8E637;font-family:'Albert Sans',sans-serif;">338 km/h</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Peak Speed (Pack Drafting)</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Slipstream grup maksimal di Talladega Superspeedway</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#B8E637;font-family:'Albert Sans',sans-serif;">31°</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Banking Angle</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Kemiringan tikungan ekstrem di Daytona dan Talladega</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Drivers & Cars --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2">PEMBALAP & ARMADA V8</p>
            <h2 class="section-title-std mb-10">Line-Up NASCAR</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kyle Larson --}}
                <div class="m1-card-elevated p-6">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <span class="m1-badge mb-2 d-inline-block">CAR NO. 24</span>
                            <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#F8FAFC;">Kyle Larson</h3>
                            <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Amerika Serikat · Usia 32</p>
                        </div>
                        <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.5rem;color:#B8E637;">#24</span>
                    </div>
                    <div class="mb-4 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                        <p class="text-uppercase mb-1" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">SPESIFIKASI MOBIL</p>
                        <p class="fw-bold mb-1" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Next-Gen Chevrolet Camaro ZL1 V8</p>
                        <p style="font-family:'Sora',sans-serif;font-size:0.75rem;color:#8C96A3;">V8 Naturally Aspirated 5.86L · 670 HP (Short Track) / 510 HP (Superspeedway)</p>
                    </div>
                    <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">
                        Juara NASCAR Cup Series 2021 dan ahli lintasan tanah liat (dirt track). Larson terkenal dengan gaya membalap menyerang di garis terluar pagar pembatas sirkuit oval.
                    </p>
                    <div class="d-flex gap-4 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">27</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Pole</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">18</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Top 10</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">164</p>
                        </div>
                    </div>
                </div>

                {{-- Chase Elliott --}}
                <div class="m1-card-elevated p-6">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <span class="m1-badge mb-2 d-inline-block">CAR NO. 48</span>
                            <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#F8FAFC;">Chase Elliott</h3>
                            <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Amerika Serikat · Usia 29</p>
                        </div>
                        <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.5rem;color:#B8E637;">#48</span>
                    </div>
                    <div class="mb-4 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                        <p class="text-uppercase mb-1" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">SPESIFIKASI MOBIL</p>
                        <p class="fw-bold mb-1" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Next-Gen Chevrolet Camaro ZL1 V8</p>
                        <p style="font-family:'Sora',sans-serif;font-size:0.75rem;color:#8C96A3;">V8 Naturally Aspirated 5.86L · 5-Speed Sequential Xtrac</p>
                    </div>
                    <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">
                        Juara NASCAR Cup Series 2020 dan pembalap terpopuler pilihan fans selama enam tahun berturut-turut. Elliott adalah spesialis road course (sirkuit non-oval) terkemuka.
                    </p>
                    <div class="d-flex gap-4 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">19</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Pole</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">12</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Top 10</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">152</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Oval Strategy Simulator --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;" x-data="ovalSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="m1-card-elevated p-6 position-relative overflow-hidden">
                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between gap-4 mb-4 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                    <div>
                        <p class="section-eyebrow">STRATEGY CALCULATOR</p>
                        <h3 class="section-title-std" style="font-size:clamp(1.2rem,2.5vw,1.6rem);">Kalkulator Kecepatan Tikungan Oval</h3>
                    </div>
                    <span class="m1-badge" style="background:rgba(244,181,61,0.12)!important;color:#F4B63D!important;border-color:rgba(244,181,61,0.25)!important;">SLIPSTREAM SIMULATION</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 align-items-center">
                    <div>
                        <div class="mb-3">
                            <label class="d-block mb-1" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.1em;text-transform:uppercase;">PILIH SIRKUIT OVAL</label>
                            <select x-model="selectedCircuit" class="w-100" style="background:#111315;border:1px solid rgba(255,255,255,0.1);padding:0.6rem 0.75rem;font-family:'Sora',sans-serif;font-size:0.78rem;color:#F8FAFC;border-radius:8px;">
                                <option value="daytona">Daytona Superspeedway (31°)</option>
                                <option value="talladega">Talladega Superspeedway (33°)</option>
                                <option value="bristol">Bristol Motor Speedway (26°)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="d-block mb-1" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.1em;text-transform:uppercase;">STRATEGI DRAFTING</label>
                            <select x-model="draftingMode" class="w-100" style="background:#111315;border:1px solid rgba(255,255,255,0.1);padding:0.6rem 0.75rem;font-family:'Sora',sans-serif;font-size:0.78rem;color:#F8FAFC;border-radius:8px;">
                                <option value="single">Mobil Tunggal (Single Car Run)</option>
                                <option value="tandem">Drafting Tandem (2 Mobil)</option>
                                <option value="pack">Balapan Grup Besar (Pack)</option>
                            </select>
                        </div>
                        <button @click="calculateSpeed()" class="btn-m1-primary w-100 justify-content-center">Hitung Kecepatan Maksimum</button>
                    </div>
                    <div class="m1-glass p-4 d-flex flex-column justify-content-between" style="min-height:160px;">
                        <div>
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:0.75rem;">HASIL SIMULASI</p>
                            <div class="d-flex justify-content-between mb-2" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">G-Force Tikungan:</span>
                                <span class="fw-bold" style="color:#F8FAFC;" x-text="gForce">0.0G</span>
                            </div>
                            <div class="d-flex justify-content-between" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Kecepatan Puncak:</span>
                                <span class="fw-bold" style="color:#B8E637;" x-text="peakSpeed">0 km/h</span>
                            </div>
                        </div>
                        <div class="mt-3 pt-2" style="border-top:1px solid rgba(255,255,255,0.06);font-family:'JetBrains Mono',monospace;font-size:0.75rem;color:#B8E637;" x-text="simStatus">
                            &gt; Siap menghitung aerodinamika...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Gallery --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2">GALLERY</p>
            <h2 class="section-title-std mb-8">NASCAR Action Gallery</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">DAYTONA 500 DRAFTING PACK</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Daytona 500 Drafting Pack</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Grup besar mobil Next-Gen membalap rapat berurutan di Daytona Superspeedway.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">BRISTOL NIGHT RACE</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Bristol Pit Road Action</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Kru mekanik mengganti ban kanan dan melakukan pengisian bahan bakar ekstrim.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">TALLADEGA THREE-WIDE</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Talladega Three-Wide Finish</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Pertarungan sengit tiga mobil sejajar menjelang garis finish Talladega.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sponsors --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2">DIVISION PARTNERS</p>
            <h2 class="section-title-std mb-8">NASCAR Series Sponsors</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @php
                    $nascarSponsors = ['Bank Mandiri', 'Pertamina Lubricants', 'Pirelli Indonesia', 'Brembo', 'Puma Motorsport'];
                @endphp
                @foreach($nascarSponsors as $name)
                    <div class="m1-card p-4 d-flex flex-column align-items-center justify-content-center text-center" style="min-height:100px;">
                        <span class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">{{ $name }}</span>
                        <span class="mt-2 fw-bold text-uppercase" style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#B8E637;letter-spacing:0.12em;">NASCAR Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function ovalSimulator() {
    return {
        selectedCircuit: 'daytona',
        draftingMode: 'single',
        gForce: '0.0G',
        peakSpeed: '0 km/h',
        simStatus: '> Siap menghitung aerodinamika...',
        calculateSpeed() {
            if (this.selectedCircuit === 'daytona') {
                if (this.draftingMode === 'single') {
                    this.gForce = '2.8G'; this.peakSpeed = '312 km/h';
                    this.simStatus = '> Hambatan angin normal. Kecepatan dibatasi restrictor plate.';
                } else if (this.draftingMode === 'tandem') {
                    this.gForce = '3.1G'; this.peakSpeed = '328 km/h';
                    this.simStatus = '> Slipstream tandem mengurangi pusaran udara belakang.';
                } else {
                    this.gForce = '3.5G'; this.peakSpeed = '338 km/h';
                    this.simStatus = '> Dorongan turbulensi paket balap mendorong akselerasi ekstrem!';
                }
            } else if (this.selectedCircuit === 'talladega') {
                if (this.draftingMode === 'single') {
                    this.gForce = '2.9G'; this.peakSpeed = '315 km/h';
                    this.simStatus = '> Lintasan lurus superlebar memberikan ruang slipstream optimal.';
                } else if (this.draftingMode === 'tandem') {
                    this.gForce = '3.2G'; this.peakSpeed = '331 km/h';
                    this.simStatus = '> Pengurangan tekanan hambatan udara (drag).';
                } else {
                    this.gForce = '3.6G'; this.peakSpeed = '342 km/h';
                    this.simStatus = '> Slipstream grup maksimal di kemiringan 33 derajat!';
                }
            } else {
                this.gForce = '4.2G'; this.peakSpeed = '210 km/h';
                this.simStatus = '> Short track ekstrem. G-Force lateral tinggi.';
            }
        }
    }
}
</script>
@endpush