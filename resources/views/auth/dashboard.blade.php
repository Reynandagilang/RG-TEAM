@extends('layouts.rgr-premium')

@section('title', 'VIP Dashboard — Mobil 1 Team RG')
@section('meta_description', 'Pusat Akreditasi Fans VIP Mobil 1 Team RG. Lihat tiket Paddock Club Anda dan pantau telemetri tim secara langsung.')

@push('styles')
<style>
/* Holographic Paddock Pass */
.hologram-pass {
    background: linear-gradient(135deg, #171B20 0%, #20252C 50%, #171B20 100%);
    border: 1px solid rgba(184,230,55,0.2);
    border-radius: 12px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 30px 80px rgba(0,0,0,0.3);
}
.hologram-pass::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(90deg, transparent, rgba(184,230,55,0.04) 50%, transparent);
    transform: translateX(-100%);
    animation: holoShine 4s infinite linear;
    pointer-events: none;
}
@keyframes holoShine {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* Dial Gauge */
.dial-gauge {
    position: relative;
    width: 100px;
    height: 100px;
}
.dial-track { fill:none; stroke:rgba(255,255,255,0.06); stroke-width:8; }
.dial-value { fill:none; stroke:#B8E637; stroke-width:8; stroke-linecap:round; transition:stroke-dashoffset 0.3s ease; }
.dial-value.rpm { stroke:#38C172; }
.dial-value.tyre { stroke:#F4B63D; }
.dial-value.fuel { stroke:#E5484D; }

/* Panel grid overlay */
.panel-grid-overlay {
    background-size: 20px 20px;
    background-image: linear-gradient(to right, rgba(255,255,255,0.02) 1px, transparent 1px),
                      linear-gradient(to bottom, rgba(255,255,255,0.02) 1px, transparent 1px);
}

/* QR code simulation */
.qr-grid {
    display: flex; flex-wrap: wrap; gap: 2px;
}
.qr-grid div {
    width: 6px; height: 6px;
}
</style>
@endpush

@section('content')
<div class="relative min-h-screen pt-28 pb-20 panel-grid-overlay" style="background:#111315;" x-data="pitwallSimulator()">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Flash Success Alert --}}
        @if(session('success'))
        <div class="mb-8 p-4 rounded-lg flex items-center gap-3 text-sm" style="background:rgba(56,193,114,0.08);border:1px solid rgba(56,193,114,0.2);color:#38C172;">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        {{-- Welcome Banner --}}
        <div class="m1-card p-8 mb-10 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="absolute inset-0 pointer-events-none" style="background:linear-gradient(135deg,rgba(184,230,55,0.04) 0%,transparent 50%);"></div>
            <div class="relative z-10">
                <span class="section-eyebrow mb-2">VIP MEMBERSHIP HUB</span>
                <h1 class="display-title" style="font-size:clamp(1.5rem,3.5vw,2.5rem);">Halo, {{ strtoupper(Auth::user()->name) }}</h1>
                <p class="text-xs text-muted font-body mt-1">
                    {{ Auth::user()->email }} &middot;
                    <span style="color:#38C172;font-weight:700;">Inner Circle VIP</span>
                </p>
            </div>
            <div class="flex items-center gap-3 relative z-10">
                <a href="{{ route('paddock.club') }}" class="btn-m1-primary text-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                    Pesan Tiket VIP Baru
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-m1-ghost text-xs">Keluar Akun</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Left: Tickets & VIP Passes --}}
            <div class="lg:col-span-1 space-y-6">
                <div>
                    <h2 class="section-eyebrow mb-2">Tiket & Akreditasi VIP</h2>
                    <p class="text-xs text-muted mb-4">Akses Paddock Pass digital Anda untuk sirkuit terkait.</p>
                </div>

                @if($tickets->isEmpty())
                <div class="m1-card p-8 text-center">
                    <div class="text-3xl mb-3">🎫</div>
                    <p class="text-sm text-muted font-body mb-3">Anda belum memiliki reservasi tiket Paddock Club VIP.</p>
                    <a href="{{ route('paddock.club') }}" class="btn-m1-ghost text-xs">Beli tiket perdana Anda sekarang</a>
                </div>
                @else
                <div class="space-y-4">
                    @foreach($tickets as $ticket)
                    <div class="m1-card p-5 relative overflow-hidden" x-data="{ openPass: false }">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="m1-badge text-[0.55rem]">{{ strtoupper($ticket->ticket_tier) }}</span>
                                <h3 class="font-display font-bold text-base text-heading mt-2 leading-snug">{{ $ticket->event_name }}</h3>
                                <p class="text-[0.6rem] text-muted font-mono mt-1">KODE: {{ $ticket->booking_code }}</p>
                            </div>
                            <span class="m1-badge text-[0.5rem]" style="background:rgba(56,193,114,0.12);color:#38C172;border-color:rgba(56,193,114,0.25);">ACTIVE</span>
                        </div>

                        <div style="border-top:1px solid rgba(255,255,255,0.06);" class="pt-4 flex items-center justify-between">
                            <div class="text-[0.6rem] text-muted font-body">
                                <div>Jumlah: <span class="text-heading font-bold">{{ $ticket->quantity }} Tiket</span></div>
                                <div class="mt-0.5">Total: <span class="font-bold" style="color:#B8E637;">Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</span></div>
                            </div>
                            <button @click="openPass = true" class="btn-m1-ghost text-[0.6rem] py-1.5 px-3">Tampilkan Pass</button>
                        </div>

                        {{-- Holographic Digital Pass Modal --}}
                        <div x-show="openPass" class="fixed inset-0 z-50 flex items-center justify-center p-6" style="background:rgba(17,19,21,0.85);backdrop-filter:blur(12px);display:none;" x-transition>
                            <div class="w-full max-w-sm hologram-pass p-6 relative" @click.away="openPass = false">

                                {{-- Logo header --}}
                                <div class="flex items-center justify-between" style="border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:1rem;margin-bottom:1.5rem;">
                                    <span class="font-display font-black tracking-widest text-lg text-heading">RG <span style="color:#B8E637;">RACING</span></span>
                                    <span class="text-[0.55rem] font-ui tracking-widest font-bold px-2.5 py-1 rounded" style="color:#38C172;background:rgba(56,193,114,0.1);border:1px solid rgba(56,193,114,0.2);">VIP PADDOCK</span>
                                </div>

                                {{-- Ticket holder details --}}
                                <div class="space-y-4 mb-6">
                                    <div>
                                        <p class="text-[0.5rem] text-muted uppercase tracking-widest font-bold font-ui">BALAPAN</p>
                                        <p class="font-display font-bold text-heading text-lg">{{ $ticket->event_name }}</p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-[0.5rem] text-muted uppercase tracking-widest font-bold font-ui">PEMEGANG TIKET</p>
                                            <p class="text-xs text-heading font-body font-bold">{{ Auth::user()->name }}</p>
                                        </div>
                                        <div>
                                            <p class="text-[0.5rem] text-muted uppercase tracking-widest font-bold font-ui">PAKET VIP</p>
                                            <p class="text-xs font-display font-bold uppercase" style="color:#B8E637;">{{ $ticket->ticket_tier }} TIER</p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-[0.5rem] text-muted uppercase tracking-widest font-bold font-ui">KODE BOOKING</p>
                                            <p class="text-xs text-heading font-mono font-bold">{{ $ticket->booking_code }}</p>
                                        </div>
                                        <div>
                                            <p class="text-[0.5rem] text-muted uppercase tracking-widest font-bold font-ui">SEAT / SUITE</p>
                                            <p class="text-xs font-display font-bold" style="color:#38C172;">SUITE-{{ rand(10, 99) }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Holographic QR simulation --}}
                                <div class="p-4 rounded-lg flex items-center gap-4 mb-6" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);">
                                    <div style="background:#fff;padding:4px;border-radius:4px;width:64px;height:64px;flex-shrink:0;">
                                        <div class="qr-grid">
                                            @for ($k = 0; $k < 80; $k++)
                                                <div style="background:{{ rand(0,1) ? '#111315' : 'transparent' }};"></div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-[0.55rem] text-heading font-mono tracking-wider font-bold">KODE AKSES AKTIF</p>
                                        <p class="text-[0.5rem] text-muted font-body mt-1 leading-relaxed">Pindai kode QR ini di gerbang masuk VIP Paddock sirkuit resmi.</p>
                                    </div>
                                </div>

                                <button @click="openPass = false" class="btn-m1-primary w-full justify-center text-xs">Tutup Akses Pass</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Right: Telemetry Simulator --}}
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <h2 class="section-eyebrow mb-2">Race Control & Pit-Wall Simulator</h2>
                    <p class="text-xs text-muted mb-4">Uji interaktif telemetry mobil Mobil 1 Team RG secara real-time langsung dari ruang kemudi garasi.</p>
                </div>

                <div class="m1-card-elevated p-6 relative overflow-hidden">
                    <div class="absolute inset-0 pointer-events-none" style="background:linear-gradient(135deg,rgba(184,230,55,0.03) 0%,transparent 50%);"></div>

                    {{-- Simulator Header --}}
                    <div class="flex items-center justify-between mb-6 relative z-10" style="border-bottom:1px solid rgba(255,255,255,0.06);padding-bottom:1rem;">
                        <div class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full" style="background:#B8E637;animation:ping 1s cubic-bezier(0,0,0.2,1) infinite;"></span>
                            <span class="text-xs font-ui tracking-widest text-heading font-bold uppercase">LIVE TELEMETRY: CAR #22 (RUSSELL)</span>
                        </div>
                        <span class="m1-badge text-[0.55rem]" style="background:rgba(56,193,114,0.12);color:#38C172;border-color:rgba(56,193,114,0.25);">
                            <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span>
                            DRS ZONE ACTIVE
                        </span>
                    </div>

                    {{-- GAUGE DIALS --}}
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center mb-8 relative z-10">
                        {{-- Speed --}}
                        <div class="flex flex-col items-center">
                            <div class="dial-gauge mb-3">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <circle class="dial-track" cx="50" cy="50" r="40" />
                                    <circle class="dial-value" cx="50" cy="50" r="40"
                                            :stroke-dasharray="251.2"
                                            :stroke-dashoffset="251.2 - (251.2 * (speed / 380))" />
                                </svg>
                                <span class="absolute inset-0 flex items-center justify-center font-display font-black text-heading text-lg" x-text="speed">0</span>
                            </div>
                            <span class="text-[0.55rem] text-muted font-ui tracking-widest uppercase font-bold">KECEPATAN (KM/H)</span>
                        </div>

                        {{-- RPM --}}
                        <div class="flex flex-col items-center">
                            <div class="dial-gauge mb-3">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <circle class="dial-track" cx="50" cy="50" r="40" />
                                    <circle class="dial-value rpm" cx="50" cy="50" r="40"
                                            :stroke-dasharray="251.2"
                                            :stroke-dashoffset="251.2 - (251.2 * (rpm / 15000))" />
                                </svg>
                                <span class="absolute inset-0 flex items-center justify-center font-display font-black text-heading text-sm" x-text="(rpm/1000).toFixed(1) + 'k'">0</span>
                            </div>
                            <span class="text-[0.55rem] text-muted font-ui tracking-widest uppercase font-bold">MESIN (RPM)</span>
                        </div>

                        {{-- Tyre Temp --}}
                        <div class="flex flex-col items-center">
                            <div class="dial-gauge mb-3">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <circle class="dial-track" cx="50" cy="50" r="40" />
                                    <circle class="dial-value tyre" cx="50" cy="50" r="40"
                                            :stroke-dasharray="251.2"
                                            :stroke-dashoffset="251.2 - (251.2 * (tyreTemp / 140))" />
                                </svg>
                                <span class="absolute inset-0 flex items-center justify-center font-display font-black text-heading text-lg" x-text="tyreTemp">0</span>
                            </div>
                            <span class="text-[0.55rem] text-muted font-ui tracking-widest uppercase font-bold">SUHU BAN (&deg;C)</span>
                        </div>

                        {{-- Fuel --}}
                        <div class="flex flex-col items-center">
                            <div class="dial-gauge mb-3">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <circle class="dial-track" cx="50" cy="50" r="40" />
                                    <circle class="dial-value fuel" cx="50" cy="50" r="40"
                                            :stroke-dasharray="251.2"
                                            :stroke-dashoffset="251.2 - (251.2 * (fuel / 110))" />
                                </svg>
                                <span class="absolute inset-0 flex items-center justify-center font-display font-black text-heading text-lg" x-text="fuel.toFixed(0)">0</span>
                            </div>
                            <span class="text-[0.55rem] text-muted font-ui tracking-widest uppercase font-bold">BAHAN BAKAR (KG)</span>
                        </div>
                    </div>

                    {{-- STATUS MESSAGES --}}
                    <div class="relative z-10 p-4 rounded-lg mb-6" style="background:rgba(17,19,21,0.6);border:1px solid rgba(255,255,255,0.06);">
                        <p class="text-[0.55rem] font-ui text-muted tracking-wider uppercase font-bold mb-1">RACE STATUS & LOGS</p>
                        <p class="text-xs text-heading font-mono" x-text="logMessage">&gt; Telemetri online. Menunggu komando pit-wall...</p>

                        <div x-show="pitstopTimer > 0" class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center gap-2" style="display:none;">
                            <span class="text-[0.6rem] font-ui font-bold" style="color:#B8E637;">PIT STOP:</span>
                            <span class="font-display font-black text-lg" style="color:#B8E637;" x-text="pitstopTimer.toFixed(1) + 's'">0.0s</span>
                        </div>
                    </div>

                    {{-- INTERACTIVE BUTTONS --}}
                    <div class="flex flex-wrap gap-3 relative z-10">
                        <button @click="accelerate()" class="btn-m1-primary text-xs flex-1 justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            Geber Gas (Akselerasi)
                        </button>
                        <button @click="toggleDrs()" class="btn-m1-ghost text-xs flex-1 justify-center" :class="drsActive ? 'bg-[rgba(56,193,114,0.08)] !border-[#38C172] !text-[#38C172]' : ''">
                            <span x-text="drsActive ? 'Matikan DRS' : 'Nyalakan DRS'">Nyalakan DRS</span>
                        </button>
                        <button @click="performPitstop()" class="btn-m1-ghost text-xs flex-1 justify-center" :disabled="pitstopTimer > 0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                            Panggil Masuk Pit Stop
                        </button>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<style>
@keyframes ping {
    75%, 100% { transform:scale(2); opacity:0; }
}
</style>
@endsection

@push('scripts')
<script>
function pitwallSimulator() {
    return {
        speed: 280,
        rpm: 10500,
        tyreTemp: 92,
        fuel: 85,
        drsActive: false,
        pitstopTimer: 0,
        logMessage: '> Menuju Tikungan 12 Monza (Parabolica). Grip optimal.',
        interval: null,

        init() {
            this.interval = setInterval(() => {
                if (this.pitstopTimer > 0) return;

                let speedDiff = (Math.random() - 0.5) * 6;
                this.speed = Math.floor(Math.max(120, Math.min(372, this.speed + speedDiff)));

                let rpmDiff = (Math.random() - 0.5) * 800;
                this.rpm = Math.floor(Math.max(8000, Math.min(14500, this.rpm + rpmDiff)));

                let tempDiff = (Math.random() - 0.5) * 1.5;
                this.tyreTemp = Math.floor(Math.max(80, Math.min(115, this.tyreTemp + tempDiff)));

                this.fuel = Math.max(0, this.fuel - 0.05);

                if (this.speed > 340) {
                    this.logMessage = '> Mobil berada di batas kecepatan puncak! DRS memotong hambatan udara.';
                } else if (this.speed < 180) {
                    this.logMessage = '> Pengereman keras di tikungan lambat. Ban mengalami tekanan grip lateral.';
                } else {
                    this.logMessage = '> Akselerasi stabil di lintasan lurus. Aliran aerodinamis sasis optimal.';
                }
            }, 1000);
        },

        accelerate() {
            if (this.pitstopTimer > 0) return;
            this.speed = Math.min(365, this.speed + 35);
            this.rpm = Math.min(14900, this.rpm + 2500);
            this.tyreTemp = Math.min(118, this.tyreTemp + 5);
            this.logMessage = '> Gas ditekan maksimal! Unit daya menyalurkan 1000 daya kuda penuh.';
        },

        toggleDrs() {
            if (this.pitstopTimer > 0) return;
            this.drsActive = !this.drsActive;
            if (this.drsActive) {
                this.speed = Math.min(378, this.speed + 25);
                this.logMessage = '> Flap DRS dibuka! Mengurangi gaya hambat aerodinamis belakang untuk kecepatan garis lurus.';
            } else {
                this.logMessage = '> Flap DRS ditutup kembali sebelum pengereman masuk tikungan.';
            }
        },

        performPitstop() {
            if (this.pitstopTimer > 0) return;
            this.speed = 80;
            this.rpm = 4000;
            this.tyreTemp = 65;
            this.logMessage = '> Memasuki pit-lane sirkuit. Kecepatan dibatasi 80 km/h.';

            this.pitstopTimer = 2.1;
            let countdown = setInterval(() => {
                this.pitstopTimer = Math.max(0, this.pitstopTimer - 0.1);
                if (this.pitstopTimer <= 0) {
                    clearInterval(countdown);
                    this.tyreTemp = 100;
                    this.speed = 120;
                    this.rpm = 9500;
                    this.logMessage = '> Pit stop sukses! Ban baru terpasang dalam 2,1 detik. Kembali ke lintasan!';
                }
            }, 100);
        }
    }
}
</script>
@endpush
