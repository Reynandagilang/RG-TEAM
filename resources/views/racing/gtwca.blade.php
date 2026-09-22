@extends('layouts.rgr-premium')

@section('title', 'GT World Challenge Asia — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi GT World Challenge Asia. Ajang balap mobil sport GT3 paling prestisius di kawasan Asia Pasifik.')

@push('styles')
<style>
.gta-hero-grid {
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
        <div class="gta-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 position-relative">
            <p class="section-eyebrow mb-4">GT3 DIVISION ASIA</p>
            <h1 class="display-title mb-4">GT World Challenge Asia</h1>
            <p class="section-subtitle" style="max-width:600px;">
                Persaingan balap ketahanan GT3 bergengsi di wilayah Asia Pasifik. Mobil 1 Team RG menurunkan dua armada Porsche 911 GT3 R generasi terbaru untuk merebut mahkota kejuaraan kontinental.
            </p>
        </div>
    </section>

    {{-- Format & Circuits --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 align-items-start">
                <div class="m1-card-elevated p-5">
                    <span class="m1-badge mb-2 d-inline-block">KARAKTERISTIK SERI</span>
                    <h3 class="fw-bold mt-2 mb-3" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Persaingan Asia Pasifik</h3>
                    <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">
                        Seri ini diminati tim dari Asia Tenggara termasuk Indonesia. Didominasi sirkuit modern berstandar F1 dengan cuaca tropis menantang.
                    </p>
                </div>
                <div class="md:col-span-2">
                    <p class="mb-2" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">KALENDER SIRKUIT</p>
                    <h3 class="fw-bold mb-4" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#F8FAFC;">Sirkuit Utama Asia</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Sepang (Malaysia)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Seri pembuka/penutup. Tim regional hafal karakter sirkuit.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Fuji & Suzuka (Jepang)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Dua sirkuit legendaris, tim pabrikan Jepang ikut wildcard.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Chang International (Thailand)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Sirkuit modern super panas, uji fisik dan pendingin mobil.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Mandalika (Indonesia)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Sirkuit Lombok mulai dilirik sebagai tuan rumah seri resmi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cars & Drivers --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2">ARMADA PORSCHE</p>
            <h2 class="section-title-std mb-10">Line-Up GTWCA</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- #55 Pro-Am --}}
                <div class="m1-card-elevated p-5">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <span class="m1-badge mb-2 d-inline-block">PRO-AM CLASS · #55</span>
                            <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.3rem;color:#F8FAFC;">Porsche 911 GT3 R (992)</h3>
                            <p style="font-family:'Sora',sans-serif;font-size:0.75rem;color:#8C96A3;">4.2L Flat-Six NA · 565 HP · Lightweight Aluminium-Steel</p>
                        </div>
                        <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.5rem;color:#B8E637;">#55</span>
                    </div>
                    <div class="pt-3 mb-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <h4 class="fw-bold mb-2" style="font-family:'Albert Sans',sans-serif;font-size:0.78rem;color:#F8FAFC;">PANDUAN PEMBALAP:</h4>
                        <p class="fw-bold mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Rio Haryanto <span style="color:#8C96A3;font-weight:400;font-size:0.75rem;">(Indonesia)</span></p>
                        <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Pembalap kebanggaan Indonesia, mantan bintang F1.</p>
                        <p class="fw-bold mt-2 mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Alessio Picariello <span style="color:#8C96A3;font-weight:400;font-size:0.75rem;">(Belgia)</span></p>
                        <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Pembalap pabrikan Porsche, gelar GT Cup Asia.</p>
                    </div>
                    <div class="d-flex gap-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">4</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podium</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">11</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Pole</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">5</p>
                        </div>
                    </div>
                </div>

                {{-- #66 Silver Cup --}}
                <div class="m1-card-elevated p-5">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <span class="m1-badge mb-2 d-inline-block" style="background:rgba(244,181,61,0.12)!important;color:#F4B63D!important;border-color:rgba(244,181,61,0.25)!important;">SILVER CUP · #66</span>
                            <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.3rem;color:#F8FAFC;">Porsche 911 GT3 R (992)</h3>
                            <p style="font-family:'Sora',sans-serif;font-size:0.75rem;color:#8C96A3;">4.2L Flat-Six NA · 6-Speed Sequential Constant-Mesh</p>
                        </div>
                        <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.5rem;color:#F4B63D;">#66</span>
                    </div>
                    <div class="pt-3 mb-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <h4 class="fw-bold mb-2" style="font-family:'Albert Sans',sans-serif;font-size:0.78rem;color:#F8FAFC;">PANDUAN PEMBALAP:</h4>
                        <p class="fw-bold mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Yifei Ye <span style="color:#8C96A3;font-weight:400;font-size:0.75rem;">(Tiongkok)</span></p>
                        <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Pembalap elit Porsche Asia Pasifik, ahli Shanghai & Suzuka.</p>
                        <p class="fw-bold mt-2 mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Tanart Sathienthirakul <span style="color:#8C96A3;font-weight:400;font-size:0.75rem;">(Thailand)</span></p>
                        <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Berpengalaman di GT Asia Tenggara, mahir manajemen ban.</p>
                    </div>
                    <div class="d-flex gap-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">2</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podium</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">6</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Pole</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- BoP Simulator --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;" x-data="bopSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="m1-card-elevated p-6 position-relative overflow-hidden">
                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between gap-4 mb-4 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                    <div>
                        <p class="section-eyebrow">SUCCESS BALLAST</p>
                        <h3 class="section-title-std" style="font-size:clamp(1.2rem,2.5vw,1.6rem);">Kalkulator Penalti Pit Stop</h3>
                    </div>
                    <span class="m1-badge" style="background:rgba(244,181,61,0.12)!important;color:#F4B63D!important;border-color:rgba(244,181,61,0.25)!important;">GT ASIA REGULATION</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 align-items-center">
                    <div>
                        <div class="mb-3">
                            <label class="d-block mb-1" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.1em;text-transform:uppercase;">POSISI SEBELUMNYA</label>
                            <select x-model="lastPosition" class="w-100" style="background:#111315;border:1px solid rgba(255,255,255,0.1);padding:0.6rem 0.75rem;font-family:'Sora',sans-serif;font-size:0.78rem;color:#F8FAFC;border-radius:8px;">
                                <option value="1">P1</option>
                                <option value="2">P2</option>
                                <option value="3">P3</option>
                                <option value="4">P4 ke bawah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="d-block mb-1" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.1em;text-transform:uppercase;">KELAS</label>
                            <select x-model="driverClass" class="w-100" style="background:#111315;border:1px solid rgba(255,255,255,0.1);padding:0.6rem 0.75rem;font-family:'Sora',sans-serif;font-size:0.78rem;color:#F8FAFC;border-radius:8px;">
                                <option value="pro_am">Pro-Am (#55)</option>
                                <option value="silver">Silver (#66)</option>
                            </select>
                        </div>
                        <button @click="calculatePenalty()" class="btn-m1-primary w-100 justify-content-center">Simulasikan Waktu Pit Stop</button>
                    </div>
                    <div class="m1-glass p-4 d-flex flex-column justify-content-between" style="min-height:160px;">
                        <div>
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:0.75rem;">DURASI MINIMUM PIT</p>
                            <div class="d-flex justify-content-between mb-2" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Tambahan Penalti:</span>
                                <span class="fw-bold" style="color:#B8E637;" x-text="penaltyTime">0 Detik</span>
                            </div>
                            <div class="d-flex justify-content-between" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Total Durasi Wajib:</span>
                                <span class="fw-bold" style="color:#F8FAFC;" x-text="totalPitTime">0 Detik</span>
                            </div>
                        </div>
                        <div class="mt-3 pt-2" style="border-top:1px solid rgba(255,255,255,0.06);font-family:'JetBrains Mono',monospace;font-size:0.75rem;color:#B8E637;" x-text="penaltyStatus">
                            &gt; Siap menghitung regulasi pit-stop...
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
            <h2 class="section-title-std mb-8">GTWCA Action Gallery</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">SUZUKA 10H GT3</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Suzuka 10h GT3 Pack</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Porsche #55 meluncur cepat menuruni tikungan 130R Suzuka.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">FUJI SPEEDWAY</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Fuji Speedway Straight Run</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Yifei Ye memanfaatkan slipstream di lintasan lurus 1.47 km.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">MANDALIKA</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Mandalika Heat Testing</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Kru mengukur suhu ban Porsche #66 pada aspal panas Mandalika.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sponsors --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2">DIVISION PARTNERS</p>
            <h2 class="section-title-std mb-8">GTWCA Series Sponsors</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @php
                    $gtwcaSponsors = ['Bank Mandiri', 'Telkomsel Flash', 'Pirelli Indonesia', 'Brembo', 'Oakley Indonesia'];
                @endphp
                @foreach($gtwcaSponsors as $name)
                    <div class="m1-card p-4 d-flex flex-column align-items-center justify-content-center text-center" style="min-height:100px;">
                        <span class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">{{ $name }}</span>
                        <span class="mt-2 fw-bold text-uppercase" style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#B8E637;letter-spacing:0.12em;">GTWCA Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function bopSimulator() {
    return {
        lastPosition: '1',
        driverClass: 'pro_am',
        penaltyTime: '0 Detik',
        totalPitTime: '0 Detik',
        penaltyStatus: '> Siap menghitung regulasi pit-stop...',
        calculatePenalty() {
            let basePit = this.driverClass === 'pro_am' ? 65 : 75;
            let extra = 0;
            if (this.lastPosition === '1') {
                extra = 15; this.penaltyStatus = '> PENALTI SUKSES MAKSIMAL: +15 detik.';
            } else if (this.lastPosition === '2') {
                extra = 10; this.penaltyStatus = '> PENALTI MODERAT: +10 detik.';
            } else if (this.lastPosition === '3') {
                extra = 5; this.penaltyStatus = '> PENALTI RINGAN: +5 detik.';
            } else {
                extra = 0; this.penaltyStatus = '> TANPA PENALTI: Durasi standar.';
            }
            this.penaltyTime = extra + ' Detik';
            this.totalPitTime = (basePit + extra) + ' Detik';
        }
    }
}
</script>
@endpush