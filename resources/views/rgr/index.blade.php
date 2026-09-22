@extends('layouts.rgr-premium')

@section('title', 'Rey Gilang Racing — Home')
@section('meta_description', 'Rey Gilang Racing — Indonesian Formula 1 Team. Meet our drivers, explore the RGR-26 E Performance, and track our 2026 season.')

@push('styles')
<style>
.hero-section {
    position: relative; min-height: 100vh; display: flex; align-items: center;
    overflow: hidden; background: #0F0F12;
}
.hero-bg-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(184,230,55,0.03) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(184,230,55,0.03) 1px, transparent 1px);
    background-size: 80px 80px; animation: gridMove 20s linear infinite;
}
@keyframes gridMove { 0% { transform: translate(0,0); } 100% { transform: translate(80px,80px); } }
.hero-bg-glow {
    position: absolute; top:20%; left:50%; transform:translateX(-50%);
    width:800px; height:500px;
    background:radial-gradient(ellipse, rgba(184,230,55,0.06) 0%, transparent 70%);
    pointer-events:none;
}
.stat-pill {
    display:flex; flex-direction:column; align-items:center;
    padding:0.85rem 1.25rem;
    border:1px solid rgba(184,230,55,0.15);
    background:rgba(23,27,32,0.7); backdrop-filter:blur(10px);
    border-radius:8px; transition:all 0.3s ease;
}
.stat-pill:hover { border-color:rgba(184,230,55,0.4); transform:translateY(-3px); }
.stat-value { font-family:'Albert Sans',sans-serif; font-weight:800; font-size:1.6rem; line-height:1; color:#B8E637; }
.stat-label { font-family:'Sora',sans-serif; font-size:0.6rem; letter-spacing:0.15em; text-transform:uppercase; color:#8C96A3; margin-top:0.25rem; }

.driver-card {
    position:relative; background:#171B20; border:1px solid rgba(255,255,255,0.06);
    border-radius:12px; overflow:hidden; cursor:pointer;
    transition:all 0.45s cubic-bezier(0.23,1,0.32,1);
}
.driver-card:hover { border-color:rgba(184,230,55,0.25); transform:translateY(-6px); box-shadow:0 25px 60px rgba(0,0,0,0.5); }
.driver-number {
    position:absolute; right:-10px; top:50%; transform:translateY(-50%);
    font-family:'Albert Sans',sans-serif; font-weight:900; font-size:8rem;
    line-height:1; color:rgba(184,230,55,0.04); user-select:none; pointer-events:none;
}
.driver-portrait { width:100%; height:280px; object-fit:cover; object-position:top center; transition:all 0.5s ease; }
.driver-card:hover .driver-portrait { transform:scale(1.03); }
.driver-portrait-placeholder {
    width:100%; height:280px; display:flex; align-items:flex-end; justify-content:center;
    background:linear-gradient(180deg, rgba(184,230,55,0.03) 0%, rgba(184,230,55,0.08) 100%);
    position:relative; overflow:hidden;
}
.countdown-panel {
    position:relative; background:#171B20; border:1px solid rgba(184,230,55,0.12);
    border-radius:12px; overflow:hidden;
}
.countdown-panel::before {
    content:''; position:absolute; top:0; left:0; right:0; height:2px;
    background:linear-gradient(90deg, transparent, #B8E637 30%, #B8E637 70%, transparent);
}
.countdown-digit-box {
    display:flex; flex-direction:column; align-items:center;
    background:rgba(184,230,55,0.04); border:1px solid rgba(184,230,55,0.1);
    border-radius:8px; padding:0.85rem 1rem; min-width:70px;
}
.countdown-num { font-family:'Albert Sans',sans-serif; font-weight:900; font-size:2rem; line-height:1; color:#B8E637; }
.countdown-label { font-family:'Sora',sans-serif; font-size:0.55rem; letter-spacing:0.15em; color:#8C96A3; margin-top:0.25rem; text-transform:uppercase; }

.race-row {
    display:grid; grid-template-columns:auto 1fr auto auto; align-items:center;
    gap:1.25rem; padding:0.85rem 1rem;
    border-bottom:1px solid rgba(255,255,255,0.06); transition:all 0.3s ease;
}
.race-row:hover { background:rgba(184,230,55,0.03); }
.race-row:last-child { border-bottom:none; }
.round-badge { font-family:'Albert Sans',sans-serif; font-size:0.7rem; font-weight:700; color:#8C96A3; min-width:2rem; text-align:center; }
.status-badge {
    font-family:'Sora',sans-serif; font-size:0.6rem; font-weight:700;
    letter-spacing:0.12em; text-transform:uppercase; padding:0.2rem 0.6rem; border-radius:6px;
}
.status-badge.status-upcoming { color:#B8E637; border:1px solid rgba(184,230,55,0.4); background:rgba(184,230,55,0.08); }
.status-badge.status-finished { color:#8C96A3; border:1px solid rgba(255,255,255,0.08); background:rgba(255,255,255,0.03); }
</style>
@endpush

@section('content')
{{-- HERO --}}
<section class="hero-section" id="hero">
    <div class="hero-bg-grid"></div>
    <div class="hero-bg-glow"></div>
    <div class="max-w-7xl mx-auto px-6 w-full pt-[104px]">
        <div class="grid lg:grid-cols-2 gap-16 align-items-center min-vh-100 py-20">
            <div>
                <p class="section-eyebrow mb-4">Formula 1 · Season 2026</p>
                <h1 class="display-title mb-4">Rey Gilang Racing</h1>
                <p class="section-subtitle mb-8" style="max-width:480px;">
                    Indonesian-born. Globally dominant. The RGR-26 E Performance is engineered at the bleeding edge of aerodynamics, power, and precision.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-8">
                    <a href="{{ route('car.specs') }}" class="btn-m1-primary">Explore RGR-26</a>
                    <a href="{{ route('drivers') }}" class="btn-m1-secondary">Meet the Drivers</a>
                </div>
                @if($team)
                <div class="d-flex flex-wrap gap-3">
                    <div class="stat-pill">
                        <span class="stat-value">{{ $team->constructors_titles }}</span>
                        <span class="stat-label">Constructor Titles</span>
                    </div>
                    <div class="stat-pill">
                        <span class="stat-value">{{ $team->drivers_titles }}</span>
                        <span class="stat-label">Driver Titles</span>
                    </div>
                    @if($activeCar)
                    <div class="stat-pill">
                        <span class="stat-value">{{ number_format($activeCar->top_speed) }}</span>
                        <span class="stat-label">Top Speed km/h</span>
                    </div>
                    <div class="stat-pill">
                        <span class="stat-value">{{ number_format($activeCar->power_hp) }}</span>
                        <span class="stat-label">Combined HP</span>
                    </div>
                    @endif
                </div>
                @endif
            </div>
            <div class="position-relative hidden lg:flex align-items-center justify-content-center">
                <div class="d-flex align-items-center justify-content-center position-absolute inset-0">
                    <div class="rounded-circle" style="width:420px;height:420px;border:1px solid rgba(184,230,55,0.1);"></div>
                    <div class="rounded-circle position-absolute" style="width:320px;height:320px;border:1px solid rgba(184,230,55,0.06);"></div>
                </div>
                <div class="position-relative z-10 text-center">
                    <svg viewBox="0 0 800 250" class="w-100" style="max-width:500px;" xmlns="http://www.w3.org/2000/svg">
                        <defs><linearGradient id="bodyGradRgr" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#20252C"/><stop offset="100%" stop-color="#171B20"/></linearGradient></defs>
                        <ellipse cx="400" cy="235" rx="280" ry="12" fill="rgba(184,230,55,0.06)"/>
                        <circle cx="220" cy="200" r="38" fill="#171B20" stroke="#B8E637" stroke-width="1.5" opacity="0.8"/>
                        <circle cx="220" cy="200" r="25" fill="#111315" stroke="rgba(184,230,55,0.3)" stroke-width="1"/>
                        <circle cx="220" cy="200" r="8" fill="#B8E637" opacity="0.5"/>
                        <circle cx="590" cy="200" r="34" fill="#171B20" stroke="#B8E637" stroke-width="1.5" opacity="0.8"/>
                        <circle cx="590" cy="200" r="22" fill="#111315" stroke="rgba(184,230,55,0.3)" stroke-width="1"/>
                        <circle cx="590" cy="200" r="8" fill="#B8E637" opacity="0.5"/>
                        <path d="M180,190 L180,150 Q190,120 240,115 L380,108 Q430,60 510,58 L600,60 Q650,62 680,80 L690,110 L680,150 L180,190 Z" fill="url(#bodyGradRgr)" stroke="rgba(184,230,55,0.15)" stroke-width="0.5"/>
                        <path d="M380,108 Q420,75 480,68 Q510,65 530,70 L560,80 Q540,85 510,90 Q460,100 420,105 Z" fill="#111315" stroke="rgba(184,230,55,0.2)" stroke-width="0.5"/>
                        <path d="M420,75 Q450,55 490,55 Q520,55 540,65" stroke="#B8E637" stroke-width="2" fill="none" opacity="0.6"/>
                        <path d="M200,155 L650,115" stroke="#B8E637" stroke-width="2" fill="none" opacity="0.4"/>
                        <text x="350" y="148" font-family="'Albert Sans',sans-serif" font-weight="900" font-size="16" fill="rgba(184,230,55,0.5)" letter-spacing="3">RGR</text>
                        <rect x="145" y="105" width="52" height="6" rx="1" fill="#20252C" stroke="#B8E637" stroke-width="0.8"/>
                        <rect x="155" y="120" width="32" height="4" rx="1" fill="#20252C" stroke="rgba(184,230,55,0.3)" stroke-width="0.5"/>
                        <path d="M620,170 L695,172 L700,180 L620,182 Z" fill="#20252C" stroke="#B8E637" stroke-width="0.8"/>
                    </svg>
                    <p class="fw-bold mt-2" style="font-family:'Albert Sans',sans-serif;font-size:0.8rem;color:rgba(184,230,55,0.5);letter-spacing:0.2em;">RGR-26 E PERFORMANCE</p>
                </div>
            </div>
        </div>
    </div>
    <div class="position-absolute bottom-0 left-0 right-0" style="height:80px;background:linear-gradient(0deg, #111315 0%, transparent 100%);pointer-events:none;"></div>
</section>

{{-- COUNTDOWN --}}
<section class="py-20" id="countdown" style="background:#111315;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-10 align-items-start">
            @if($nextRace)
            <div>
                <p class="section-eyebrow mb-3">Next Race</p>
                <h2 class="section-title-std mb-4">{{ $nextRace->grand_prix_name }}</h2>
                <div class="d-flex flex-wrap gap-4 mb-6">
                    <div><p style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Circuit</p><p class="fw-medium" style="color:#F8FAFC;">{{ $nextRace->circuit_name }}</p></div>
                    <div><p style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Country</p><p class="fw-medium" style="color:#F8FAFC;">{{ $nextRace->country }}</p></div>
                    <div><p style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Race Date</p><p class="fw-medium" style="color:#F8FAFC;">{{ $nextRace->race_date->format('d M Y · H:i') }} WIB</p></div>
                </div>
                <a href="{{ route('schedule') }}" class="btn-m1-secondary">Full Race Calendar</a>
            </div>
            @else
            <div><p class="section-eyebrow mb-3">Season</p><h2 class="section-title-std">Season 2026</h2><p class="section-subtitle">All races completed.</p></div>
            @endif
            <div class="countdown-panel p-8 lg:p-10">
                @if($nextRace && $nextRace->is_upcoming)
                <p class="section-eyebrow mb-6 text-center justify-content-center">Race Starts In</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap" id="countdown-display">
                    <div class="countdown-digit-box"><span class="countdown-num" id="cd-days">00</span><span class="countdown-label">Days</span></div>
                    <span class="fw-black align-self-center" style="font-family:'Albert Sans',sans-serif;font-size:1.8rem;color:#B8E637;">:</span>
                    <div class="countdown-digit-box"><span class="countdown-num" id="cd-hours">00</span><span class="countdown-label">Hours</span></div>
                    <span class="fw-black align-self-center" style="font-family:'Albert Sans',sans-serif;font-size:1.8rem;color:#B8E637;">:</span>
                    <div class="countdown-digit-box"><span class="countdown-num" id="cd-mins">00</span><span class="countdown-label">Mins</span></div>
                    <span class="fw-black align-self-center" style="font-family:'Albert Sans',sans-serif;font-size:1.8rem;color:#B8E637;">:</span>
                    <div class="countdown-digit-box"><span class="countdown-num" id="cd-secs">00</span><span class="countdown-label">Secs</span></div>
                </div>
                <div class="mt-6 pt-4" style="border-top:1px solid rgba(184,230,55,0.1);">
                    @if($nextRace->qualifying_date)<div class="d-flex justify-content-between mb-2"><span style="font-family:'Sora',sans-serif;font-size:0.7rem;color:#8C96A3;">Qualifying</span><span style="color:#F8FAFC;font-size:0.8rem;">{{ $nextRace->qualifying_date->format('d M · H:i') }}</span></div>@endif
                    @if($nextRace->practice1_date)<div class="d-flex justify-content-between"><span style="font-family:'Sora',sans-serif;font-size:0.7rem;color:#8C96A3;">Practice 1</span><span style="color:#F8FAFC;font-size:0.8rem;">{{ $nextRace->practice1_date->format('d M · H:i') }}</span></div>@endif
                </div>
                @else
                <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height:160px;">
                    <p class="section-eyebrow">Season Wrap</p>
                    <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#F8FAFC;">2026 Campaign Complete</p>
                    <p class="section-subtitle">See you in 2027</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- DRIVERS --}}
<section class="py-24" id="drivers-section" style="background:#111315;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-end mb-12 gap-4">
            <div>
                <p class="section-eyebrow mb-2">2026 Line-Up</p>
                <h2 class="section-title-std">Our Drivers</h2>
            </div>
            <a href="{{ route('drivers') }}" class="btn-m1-secondary">All Profiles</a>
        </div>
        @if($drivers->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($drivers as $index => $driver)
            <div class="driver-card" data-reveal id="driver-card-{{ $driver->id }}">
                <span class="driver-number">{{ $driver->permanent_number }}</span>
                @if($driver->profile_image)
                    <img src="{{ asset('storage/' . $driver->profile_image) }}" alt="{{ $driver->name }}" class="driver-portrait" loading="lazy">
                @else
                    <div class="driver-portrait-placeholder">
                        <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:4rem;color:rgba(184,230,55,0.15);">{{ $driver->permanent_number }}</span>
                    </div>
                @endif
                <div class="p-4 position-relative z-10">
                    <div class="d-flex align-items-start justify-content-between mb-2">
                        <div>
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">{{ $driver->country_code ?? $driver->country }}</p>
                            <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">{{ $driver->name }}</h3>
                        </div>
                        <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#B8E637;">#{{ $driver->permanent_number }}</span>
                    </div>
                    <p style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">{{ $driver->role }}</p>
                    <div class="d-flex gap-3 pt-3 mt-3" style="border-top:1px solid rgba(184,230,55,0.08);">
                        <div><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#B8E637;">{{ $driver->podiums }}</p><p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podiums</p></div>
                        <div><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#B8E637;">{{ number_format($driver->career_points, 0) }}</p><p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Pts Career</p></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 m1-card"><p style="color:#8C96A3;">Driver data is currently unavailable.</p></div>
        @endif
    </div>
</section>

{{-- CAR TEASER --}}
<section class="py-20 position-relative overflow-hidden" id="car-teaser" style="background:#111315;">
    <div class="position-absolute inset-0" style="background:radial-gradient(ellipse at 50% 50%, rgba(184,230,55,0.04) 0%, transparent 65%);"></div>
    <div class="max-w-7xl mx-auto px-6 position-relative">
        <div class="text-center mb-12">
            <p class="section-eyebrow justify-content-center mb-3">2026 Machine</p>
            <h2 class="section-title-std">@if($activeCar) {{ $activeCar->model_name }} @else RGR-26 @endif</h2>
            <p class="section-subtitle" style="max-width:500px;margin:0 auto;">Every millimeter engineered to dominate — a fusion of raw power and surgical aerodynamics.</p>
        </div>
        @if($activeCar)
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            @foreach([
                ['label' => 'Power Unit', 'value' => $activeCar->power_unit],
                ['label' => 'Horsepower', 'value' => number_format($activeCar->power_hp) . ' HP'],
                ['label' => 'Top Speed',  'value' => $activeCar->top_speed . ' km/h'],
                ['label' => 'Weight',     'value' => $activeCar->weight . ' kg'],
            ] as $spec)
            <div class="m1-card p-4 text-center">
                <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#B8E637;margin-bottom:0.25rem;">{{ $spec['value'] }}</p>
                <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">{{ $spec['label'] }}</p>
            </div>
            @endforeach
        </div>
        @endif
        <div class="text-center">
            <a href="{{ route('car.specs') }}" class="btn-m1-primary">Explore Full Car Specs</a>
        </div>
    </div>
</section>

{{-- SCHEDULE STRIP --}}
@if(isset($raceSchedules) && $raceSchedules->isNotEmpty())
<section class="py-20" id="race-strip" style="background:#111315;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="d-flex align-items-end justify-content-between mb-10">
            <div>
                <p class="section-eyebrow mb-2">Calendar</p>
                <h2 class="section-title-std">Race Schedule</h2>
            </div>
            <a href="{{ route('schedule') }}" class="btn-m1-secondary d-none d-sm-inline-flex">Full Calendar</a>
        </div>
        <div class="m1-card overflow-hidden">
            @if(isset($raceSchedules['Upcoming']))
            @foreach($raceSchedules['Upcoming']->take(5) as $race)
            <div class="race-row">
                <span class="round-badge">R{{ $race->round_number ?? '—' }}</span>
                <div>
                    <p class="fw-medium" style="font-size:0.9rem;color:#F8FAFC;">{{ $race->grand_prix_name }}</p>
                    <p style="font-size:0.72rem;color:#8C96A3;margin-top:0.25rem;">{{ $race->circuit_name }}</p>
                </div>
                <p style="font-size:0.72rem;color:#D2D6DC;font-family:'Sora',sans-serif;" class="d-none d-sm-block">{{ $race->race_date->format('d M Y') }}</p>
                <span class="status-badge status-upcoming">Upcoming</span>
            </div>
            @endforeach
            @endif
            @if(isset($raceSchedules['Finished']))
            @foreach($raceSchedules['Finished']->take(3) as $race)
            <div class="race-row" style="opacity:0.55;">
                <span class="round-badge">R{{ $race->round_number ?? '—' }}</span>
                <div>
                    <p style="font-size:0.9rem;color:#D2D6DC;text-decoration:line-through;">{{ $race->grand_prix_name }}</p>
                    <p style="font-size:0.72rem;color:#8C96A3;margin-top:0.25rem;">{{ $race->circuit_name }}</p>
                </div>
                <p style="font-size:0.72rem;color:#8C96A3;font-family:'Sora',sans-serif;" class="d-none d-sm-block">{{ $race->race_date->format('d M Y') }}</p>
                <span class="status-badge status-finished">Finished</span>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif
@endsection

@push('scripts')
<script>
(function() {
    const totalSeconds = {{ $countdownSeconds ?? 0 }};
    if (totalSeconds <= 0) return;
    const raceTime = Date.now() + totalSeconds * 1000;
    const cdDays = document.getElementById('cd-days');
    const cdHours = document.getElementById('cd-hours');
    const cdMins = document.getElementById('cd-mins');
    const cdSecs = document.getElementById('cd-secs');
    if (!cdDays) return;
    function pad(n) { return String(n).padStart(2, '0'); }
    function tick() {
        const diff = Math.max(0, Math.floor((raceTime - Date.now()) / 1000));
        cdDays.textContent = pad(Math.floor(diff / 86400));
        cdHours.textContent = pad(Math.floor((diff % 86400) / 3600));
        cdMins.textContent = pad(Math.floor((diff % 3600) / 60));
        cdSecs.textContent = pad(diff % 60);
        if (diff > 0) requestAnimationFrame(() => setTimeout(tick, 1000));
    }
    tick();
})();
</script>
@endpush