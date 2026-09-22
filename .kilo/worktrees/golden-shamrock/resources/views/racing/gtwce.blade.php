@extends('layouts.rgr-premium')

@section('title', 'GT World Challenge Europe — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi GT World Challenge Europe. Kompetisi balap mobil sport GT3 terbaik di sirkuit legendaris Eropa.')

@push('styles')
<style>
.gt-hero-grid {
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
        <div class="gt-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 position-relative">
            <p class="section-eyebrow mb-4">GT3 DIVISION EUROPE</p>
            <h1 class="display-title mb-4">GT World Challenge Europe</h1>
            <p class="section-subtitle" style="max-width:600px;">
                Persaingan ketat mobil sport kelas GT3 di sirkuit legendaris Eropa. Mobil 1 Team RG menurunkan tiga unit armada tangguh berspesifikasi balap ketahanan terbaik.
            </p>
        </div>
    </section>

    {{-- Format & Circuits --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 align-items-start">
                <div class="m1-card-elevated p-5">
                    <span class="m1-badge mb-2 d-inline-block">FORMAT KOMPETISI</span>
                    <h3 class="fw-bold mt-2 mb-3" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">Sprint & Endurance Cup</h3>
                    <p style="font-family:'Sora',sans-serif;font-size:0.78rem;color:#D2D6DC;line-height:1.65;">
                        Seri regional tertua dan paling kompetitif. Balapan dibagi menjadi <strong>Sprint Cup</strong> (1 jam) dan <strong>Endurance Cup</strong> (3 jam+).
                    </p>
                </div>
                <div class="md:col-span-2">
                    <p class="mb-2" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">KALENDER SIRKUIT</p>
                    <h3 class="fw-bold mb-4" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#F8FAFC;">Arena Balap Legendaris</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Spa-Francorchamps (Belgia)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Rumah CrowdStrike 24 Hours of Spa, balapan 24 jam GT3 terbesar di dunia.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Monza (Italia)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Sirkuit super cepat yang menguji top speed maksimal GT3.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Paul Ricard / Magny-Cours</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Arena balapan ketahanan malam hari (night race) di Prancis.</p>
                        </div>
                        <div class="m1-card p-4">
                            <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Nürburgring (Jerman)</h4>
                            <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;">Sirkuit teknis legendaris yang menguji ketahanan fisik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cars & Drivers --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2">ARMADA GT3</p>
            <h2 class="section-title-std mb-10">Line-Up GTWCE</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- #99 PRO --}}
                <div class="m1-card-elevated p-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block">PRO CLASS · #99</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">Mercedes-AMG GT3 Evo</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:1.8rem;color:#B8E637;">#99</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.75rem;color:#D2D6DC;">V8 6.3L Naturally Aspirated · 550 HP · Downforce tinggi & pengereman stabil.</p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <h4 class="fw-bold mb-2" style="font-family:'Albert Sans',sans-serif;font-size:0.75rem;color:#F8FAFC;">LINE-UP:</h4>
                            <p class="fw-bold mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Jules Gounon <span style="color:#8C96A3;font-weight:400;font-size:0.72rem;">(Prancis)</span></p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.68rem;color:#8C96A3;">Spesialis trek basah, Juara Spa 24 Jam 3x.</p>
                            <p class="fw-bold mt-2 mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Raffaele Marciello <span style="color:#8C96A3;font-weight:400;font-size:0.72rem;">(Swiss)</span></p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.68rem;color:#8C96A3;">Pakar kualifikasi dengan gaya menyalip agresif.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">6</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podium</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">14</p>
                        </div>
                    </div>
                </div>

                {{-- #88 GOLD --}}
                <div class="m1-card-elevated p-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block" style="background:rgba(244,181,61,0.12)!important;color:#F4B63D!important;border-color:rgba(244,181,61,0.25)!important;">GOLD CUP · #88</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">Mercedes-AMG GT3 Evo</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:1.8rem;color:#F4B63D;">#88</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.75rem;color:#D2D6DC;">V8 6.3L Naturally Aspirated · 6-Speed Sequential · Torsi melimpah di rpm rendah.</p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <h4 class="fw-bold mb-2" style="font-family:'Albert Sans',sans-serif;font-size:0.75rem;color:#F8FAFC;">LINE-UP:</h4>
                            <p class="fw-bold mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Maro Engel <span style="color:#8C96A3;font-weight:400;font-size:0.72rem;">(Jerman)</span></p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.68rem;color:#8C96A3;">Veteran Nürburgring dengan konsistensi lap tinggi.</p>
                            <p class="fw-bold mt-2 mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Luca Stolz <span style="color:#8C96A3;font-weight:400;font-size:0.72rem;">(Jerman)</span></p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.68rem;color:#8C96A3;">Ahli manajemen ban Pirelli dan pembalap taktis.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">3</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podium</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">8</p>
                        </div>
                    </div>
                </div>

                {{-- #77 BRONZE --}}
                <div class="m1-card-elevated p-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="m1-badge mb-2 d-inline-block" style="background:rgba(56,193,114,0.12)!important;color:#38C172!important;border-color:rgba(56,193,114,0.25)!important;">BRONZE CUP · #77</span>
                                <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#F8FAFC;">Aston Martin Vantage GT3</h3>
                            </div>
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:1.8rem;color:#38C172;">#77</span>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.75rem;color:#D2D6DC;">V8 4.0L Twin-Turbo · 535 HP · Lincah di tikungan cepat (high speed corner).</p>
                        <div class="pt-3 mt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                            <h4 class="fw-bold mb-2" style="font-family:'Albert Sans',sans-serif;font-size:0.75rem;color:#F8FAFC;">LINE-UP:</h4>
                            <p class="fw-bold mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Valentino Rossi <span style="color:#8C96A3;font-weight:400;font-size:0.72rem;">(Italia)</span></p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.68rem;color:#8C96A3;">Legenda MotoGP 9x juara dunia, bintang GT3.</p>
                            <p class="fw-bold mt-2 mb-0" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">Maxime Martin <span style="color:#8C96A3;font-weight:400;font-size:0.72rem;">(Belgia)</span></p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.68rem;color:#8C96A3;">Spesialis ketahanan legendaris.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Kemenangan</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">2</p>
                        </div>
                        <div class="text-center flex-fill">
                            <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podium</p>
                            <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">5</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tyre Simulator --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;" x-data="tyreSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="m1-card-elevated p-6 position-relative overflow-hidden">
                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between gap-4 mb-4 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                    <div>
                        <p class="section-eyebrow">TYRE DATA STRATEGY</p>
                        <h3 class="section-title-std" style="font-size:clamp(1.2rem,2.5vw,1.6rem);">Kalkulator Tekanan Ban & Suhu Trek</h3>
                    </div>
                    <span class="m1-badge" style="background:rgba(56,193,114,0.12)!important;color:#38C172!important;border-color:rgba(56,193,114,0.25)!important;">OPTIMAL GRIP WINDOW</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 align-items-center">
                    <div>
                        <div class="mb-3">
                            <label class="d-block mb-1" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.1em;text-transform:uppercase;">KONDISI TREK</label>
                            <select x-model="trackCondition" class="w-100" style="background:#111315;border:1px solid rgba(255,255,255,0.1);padding:0.6rem 0.75rem;font-family:'Sora',sans-serif;font-size:0.78rem;color:#F8FAFC;border-radius:8px;">
                                <option value="dry_hot">Panas Kering (Aspal 42°C)</option>
                                <option value="dry_cool">Dingin Kering (Aspal 18°C)</option>
                                <option value="wet">Basah / Hujan (Aspal 14°C)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="d-block mb-1" style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.1em;text-transform:uppercase;">SENYAWA BAN PIRELLI</label>
                            <select x-model="tyreCompound" class="w-100" style="background:#111315;border:1px solid rgba(255,255,255,0.1);padding:0.6rem 0.75rem;font-family:'Sora',sans-serif;font-size:0.78rem;color:#F8FAFC;border-radius:8px;">
                                <option value="slick_hard">Slick Keras (P Zero DHF)</option>
                                <option value="slick_soft">Slick Lunak (P Zero DHE)</option>
                                <option value="rain">Cinturato Hujan (WH)</option>
                            </select>
                        </div>
                        <button @click="calculateTyrePressure()" class="btn-m1-primary w-100 justify-content-center">Hitung Tekanan Ban Target (PSI)</button>
                    </div>
                    <div class="m1-glass p-4 d-flex flex-column justify-content-between" style="min-height:160px;">
                        <div>
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:0.75rem;">TEKANAN BAN OPTIMAL</p>
                            <div class="d-flex justify-content-between mb-2" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Tekanan Dingin:</span>
                                <span class="fw-bold" style="color:#F8FAFC;" x-text="coldPressure">0.0 PSI</span>
                            </div>
                            <div class="d-flex justify-content-between" style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;">
                                <span style="color:#8C96A3;">Target Panas:</span>
                                <span class="fw-bold" style="color:#38C172;" x-text="hotPressure">0.0 PSI</span>
                            </div>
                        </div>
                        <div class="mt-3 pt-2" style="border-top:1px solid rgba(255,255,255,0.06);font-family:'JetBrains Mono',monospace;font-size:0.75rem;color:#B8E637;" x-text="tyreStatus">
                            &gt; Siap menghitung tekanan ban ideal GT3...
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
            <h2 class="section-title-std mb-8">GTWCE Action Gallery</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">SPA 24H DAWN</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Spa 24h Dawn Ascent</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">AMG GT3 #99 melintasi Eau Rouge saat fajar menyingsing.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">MONZA CHICANE</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Monza Chicane Battle</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Rossi melakukan pengereman keras di chicane pertama Monza.</p>
                </div>
                <div class="m1-card p-3">
                    <div class="d-flex align-items-center justify-content-center mb-3" style="height:180px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:8px;">
                        <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;">NÜRBURGRING PIT</span>
                    </div>
                    <h4 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.9rem;color:#F8FAFC;">Nürburgring Pit Stop Wet</h4>
                    <p style="font-family:'Sora',sans-serif;font-size:0.72rem;color:#8C96A3;line-height:1.6;">Kru mekanik bersiap mengganti ke ban hujan untuk AMG #88.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sponsors --}}
    <section class="py-16 border-top" style="border-color:rgba(255,255,255,0.06)!important;">
        <div class="max-w-7xl mx-auto px-6">
            <p class="section-eyebrow mb-2">DIVISION PARTNERS</p>
            <h2 class="section-title-std mb-8">GTWCE Series Sponsors</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @php
                    $gtwceSponsors = ['Bank BCA', 'Pirelli Indonesia', 'Ohlins Indonesia', 'Brembo', 'Puma Motorsport'];
                @endphp
                @foreach($gtwceSponsors as $name)
                    <div class="m1-card p-4 d-flex flex-column align-items-center justify-content-center text-center" style="min-height:100px;">
                        <span class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">{{ $name }}</span>
                        <span class="mt-2 fw-bold text-uppercase" style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#B8E637;letter-spacing:0.12em;">GTWCE Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function tyreSimulator() {
    return {
        trackCondition: 'dry_hot',
        tyreCompound: 'slick_hard',
        coldPressure: '0.0 PSI',
        hotPressure: '0.0 PSI',
        tyreStatus: '> Siap menghitung tekanan ban ideal GT3...',
        calculateTyrePressure() {
            if (this.trackCondition === 'dry_hot') {
                if (this.tyreCompound === 'slick_hard') {
                    this.coldPressure = '18.5 PSI'; this.hotPressure = '26.8 PSI';
                    this.tyreStatus = '> Grip optimal di panas. Hindari over-inflated.';
                } else {
                    this.coldPressure = '17.8 PSI'; this.hotPressure = '27.2 PSI';
                    this.tyreStatus = '> Senyawa lunak cepat panas. Mulai tekanan rendah.';
                }
            } else if (this.trackCondition === 'dry_cool') {
                this.coldPressure = '20.2 PSI'; this.hotPressure = '26.5 PSI';
                this.tyreStatus = '> Udara dingin butuh tekanan awal lebih tinggi.';
            } else {
                this.coldPressure = '22.5 PSI'; this.hotPressure = '29.0 PSI';
                this.tyreStatus = '> Tekanan tinggi pada ban hujan untuk buang genangan.';
            }
        }
    }
}
</script>
@endpush