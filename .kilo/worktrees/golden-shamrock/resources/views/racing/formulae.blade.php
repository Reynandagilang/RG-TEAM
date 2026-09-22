@extends('layouts.rgr-premium')

@section('title', 'ABB FIA Formula E World Championship — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi Formula E. Kejuaraan dunia balap mobil listrik jalanan bergengsi bermesin Nissan e-4ORCE.')

@push('styles')
<style>
.fe-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(56,193,114,0.03) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(56,193,114,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
}
</style>
@endpush

@section('content')
<div class="min-h-screen" style="background:#111315;">

    {{-- Hero --}}
    <section class="position-relative" style="padding-top:130px;padding-bottom:60px;overflow:hidden;">
        <div class="fe-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 position-relative">
            <p class="section-eyebrow mb-4" style="color:#38C172!important;">FORMULA E DIVISION</p>
            <h1 class="display-title mb-4">ABB FIA Formula E</h1>
            <p class="section-subtitle" style="max-width:600px;">
                Masa depan balap listrik jalan raya perkotaan. Mengandalkan efisiensi energi regeneratif puncak dan mesin Nissan e-4ORCE Powertrain Gen3 terbaru.
            </p>
        </div>
    </section>

    {{-- Key Stats --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="d-flex justify-content-between align-items-start gap-4 mb-12 flex-wrap">
                <div>
                    <p class="section-eyebrow" style="color:#38C172!important;">GEN3 STATS</p>
                    <h2 class="section-title-std mt-2">Electric Performance</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#38C172;font-family:'Albert Sans',sans-serif;">350 kW</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Peak Power Output</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">470 HP · Nissan e-4ORCE Powertrain Gen3</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#38C172;font-family:'Albert Sans',sans-serif;">40%+</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Energy Regeneration</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Energi dipulihkan selama pengereman regeneratif</p>
                </div>
                <div class="m1-card p-6">
                    <p class="text-xl fw-bold" style="color:#38C172;font-family:'Albert Sans',sans-serif;">840 kg</p>
                    <p class="text-muted" style="font-family:'Sora',sans-serif;font-size:0.85rem;color:#8C96A3;">Minimum Weight</p>
                    <p class="mt-2" style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">Sasis Carbon Fiber Monocoque · Hankook iON Race</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Circuits --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 align-items-start">
                <div class="m1-card-elevated p-5">
                    <span class="m1-badge mb-2 d-inline-block" style="background:rgba(56,193,114,0.12)!important;color:#38C172!important;border-color:rgba(56,193,114,0.25)!important;">TEKNOLOGI LISTRIK</span>
                    <h3 class="fw-bold mt-2 mb-3" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Gen3 & Nissan e-4ORCE</h3>
                    <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">
                        Formula E Gen3 adalah jet darat listrik paling efisien di dunia. Dengan motor listrik depan dan belakang yang mampu memulihkan lebih dari 40% energi selama pengereman, mobil ini menyemburkan daya hingga 350kW (470 HP) tanpa emisi.
                    </p>
                </div>
                <div class="md:col-span-2">
                    <p class="mb-2" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">SIRKUIT JALANAN UTAMA</p>
                    <h3 class="fw-bold mb-4" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#F8FAFC;">Eprix Street Circuits</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Diriyah (Arab Saudi)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Balapan malam di sirkuit warisan UNESCO yang cepat dan menantang.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Tokyo Street (Jepang)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Sirkuit perkotaan pertama di Jepang melingkari Tokyo Big Sight.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Monaco Eprix</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Trek legendaris dengan strategi Attack Mode untuk menyalip.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">London ExCeL</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Sirkuit unik semi-indoor/semi-outdoor di pusat pameran London.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Drivers --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2" style="color:#38C172!important;">ROSTER DRIVER</p>
            <h2 class="section-title-std mb-10">Formula E Line-Up</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="m1-card-elevated p-5">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <span class="m1-badge mb-2 d-inline-block" style="background:rgba(56,193,114,0.12)!important;color:#38C172!important;border-color:rgba(56,193,114,0.25)!important;">GEN3 · #22</span>
                            <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.3rem;color:#F8FAFC;">FE Gen3 Nissan</h3>
                        </div>
                        <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.2rem;color:#38C172;">#22</span>
                    </div>
                    <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;">Nissan e-4ORCE · 350 kW (470 HP) · Carbon Fiber Monocoque · Hankook iON Race.</p>
                    <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.8rem;color:#F8FAFC;">Spesifikasi Aero:</p>
                        <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Sayap delta dengan hambatan aerodinamika minimum untuk slipstream dan pengereman regeneratif.</p>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Bobot</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">840 kg</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Regenerasi</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#38C172;">&gt; 40%</p>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    @foreach($drivers as $driver)
                    <div class="m1-card-elevated p-5 mb-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block" style="background:rgba(56,193,114,0.12)!important;color:#38C172!important;border-color:rgba(56,193,114,0.25)!important;">RACE DRIVER</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.3rem;color:#F8FAFC;">{{ $driver->name }}</h3>
                                <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#8C96A3;">{{ $driver->country }} (#{{ $driver->permanent_number }})</p>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.2rem;color:#38C172;">#{{ $driver->permanent_number }}</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">{{ $driver->bio }}</p>
                        <div class="d-flex gap-4 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <div class="text-center flex-fill">
                                <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podium FE</p>
                                <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">{{ $driver->podiums }}</p>
                            </div>
                            <div class="text-center flex-fill">
                                <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Poin Karir</p>
                                <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">{{ number_format($driver->career_points) }}</p>
                            </div>
                            <div class="text-center flex-fill">
                                <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Lisensi</p>
                                <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#38C172;">Platinum</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>
@endsection