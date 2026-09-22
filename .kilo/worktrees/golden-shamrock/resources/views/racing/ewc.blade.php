@extends('layouts.rgr-premium')

@section('title', 'FIM Endurance World Championship (EWC) — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi FIM EWC. Kejuaraan dunia balap ketahanan motor legendaris menggunakan Yamaha YZF-R1.')

@push('styles')
<style>
.ewc-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(184,230,55,0.03) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(184,230,55,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
}
</style>
@endpush

@section('content')
<div class="min-h-screen" style="background:#111315;">

    {{-- Hero --}}
    <section class="position-relative" style="padding-top:130px;padding-bottom:60px;overflow:hidden;">
        <div class="ewc-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 position-relative">
            <p class="section-eyebrow mb-4">FIM EWC DIVISION</p>
            <h1 class="display-title mb-4">FIM Endurance World Championship</h1>
            <p class="section-subtitle" style="max-width:600px;">
                Tantangan ketahanan fisik ekstrem 24 jam di atas roda dua. Mobil 1 Team RG menurunkan motor Yamaha YZF-R1 berspesifikasi pabrikan terbaik untuk menaklukkan Le Mans, Spa, dan Bol d'Or.
            </p>
        </div>
    </section>

    {{-- Key Stats --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="d-flex justify-content-between align-items-start gap-4 mb-12 flex-wrap">
                <div>
                    <p class="section-eyebrow">DIVISION STATS</p>
                    <h2 class="section-title-std mt-2">Two-Wheel Endurance</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#B8E637;font-family:'Albert Sans',sans-serif;">220 HP</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Peak Power</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">998cc Crossplane CP4 Inline-4 · Aluminium Deltabox</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#B8E637;font-family:'Albert Sans',sans-serif;">168 kg</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Dry Weight</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Bodi serat karbon ringan dengan winglets aerodinamika</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#B8E637;font-family:'Albert Sans',sans-serif;">24 L</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Fuel Capacity</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Kapasitas tangki untuk balapan ketahanan 24 jam</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Format & Circuits --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 align-items-start">
                <div class="m1-card-elevated p-5">
                    <span class="m1-badge mb-2 d-inline-block">FORMAT DIVISI MOTOR</span>
                    <h3 class="fw-bold mt-2 mb-3" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Balap Ketahanan 24 Jam</h3>
                    <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">
                        FIM EWC menguji batas absolut manusia dan mesin. Tiga pembalap bergantian mengendarai satu motor selama 24 jam, menghadapi transisi cuaca malam, kelelahan fisik, dan pit stop krusial.
                    </p>
                </div>
                <div class="md:col-span-2">
                    <p class="mb-2" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">SIRKUIT KALENDER</p>
                    <h3 class="fw-bold mb-4" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#F8FAFC;">Arena EWC Terkejam</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Le Mans Bugatti (Prancis)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">24 Heures Motos, balapan pembuka yang dingin dan menuntut rem.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Spa-Francorchamps (Belgia)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Trek supercepat dengan perubahan cuaca Ardennes tidak terprediksi.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Suzuka Circuit (Jepang)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Suzuka 8 Hours legendaris, panas lembab musim panas Jepang.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Paul Ricard (Prancis)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Bol d'Or 24 Hours, trek lurus Mistral 1.8 km menyiksa mesin.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bike & Riders --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2">ROSTER RIDERS</p>
            <h2 class="section-title-std mb-10">Line-Up EWC</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Bike Specs --}}
                <div class="m1-card-elevated p-5 d-flex flex-column">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block">FORMULA EWC · #7</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.3rem;color:#F8FAFC;">Yamaha YZF-R1</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.2rem;color:#B8E637;">#7</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;">998cc Crossplane CP4 Inline-4 · 220 HP · Aluminium Deltabox · Bridgestone EWC Spec.</p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.8rem;color:#F8FAFC;">Spesifikasi Aero:</p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Bodi serat karbon dengan winglets depan untuk stabilitas di 300+ km/jam.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Bobot</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">168 kg</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Kapasitas</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">24 L</p>
                        </div>
                    </div>
                </div>

                {{-- Rider Cards --}}
                <div class="lg:col-span-2">
                    <div class="grid md:grid-cols-3 gap-4">
                        @forelse(($riders ?? collect()) as $rider)
                        <div class="m1-card-elevated p-4 d-flex flex-column">
                            <span class="m1-badge mb-2 d-inline-block">RACE RIDER</span>
                            <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">{{ $rider->name }}</h3>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">{{ $rider->country ?? 'Indonesia' }} (#{{ $rider->permanent_number ?? '7' }})</p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.75rem;color:#D2D6DC;line-height:1.6;" class="mt-2 mb-3 flex-fill">{{ $rider->bio ?? 'Pembalap ketahanan motor resmi Mobil 1 Team RG.' }}</p>
                            <div class="pt-2" style="border-top:1px solid rgba(255,255,255,0.06);">
                                <div class="d-flex justify-content-between" style="font-family:'JetBrains Mono',monospace;font-size:0.68rem;color:#8C96A3;">
                                    <span>Best Lap: <span class="fw-bold" style="color:#F8FAFC;">1:34.850</span></span>
                                    <span>Lisensi: <span class="fw-bold" style="color:#B8E637;">FIA Gold</span></span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-3 text-center py-8">
                            <p class="text-xs text-muted">Data pembalap divisi motor EWC sedang diperbarui.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection