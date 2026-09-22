@extends('layouts.rgr-premium')

@section('title', 'RGR-26 E Performance — Car Specs')
@section('meta_description', 'Explore the full technical specifications of the RGR-26 E Performance — the 2026 Formula 1 machine from Rey Gilang Racing.')

@push('styles')
<style>
.car-hero { position:relative; min-height:70vh; display:flex; align-items:flex-end; overflow:hidden; background:#0F0F12; padding-bottom:80px; }
.car-hero-bg { position:absolute; inset:0; background-image:linear-gradient(rgba(184,230,55,0.03) 1px, transparent 1px),linear-gradient(90deg, rgba(184,230,55,0.03) 1px, transparent 1px); background-size:60px 60px; }
.car-hero-glow { position:absolute; top:30%; left:50%; transform:translateX(-50%); width:900px; height:400px; background:radial-gradient(ellipse, rgba(184,230,55,0.06) 0%, transparent 65%); pointer-events:none; }

.spec-card { position:relative; background:#171B20; border:1px solid rgba(255,255,255,0.06); border-radius:12px; overflow:hidden; transition:all 0.4s cubic-bezier(0.23,1,0.32,1); }
.spec-card::before { content:''; position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg, transparent, #B8E637, transparent); opacity:0.4; transition:opacity 0.4s; }
.spec-card:hover { transform:translateY(-5px); border-color:rgba(184,230,55,0.25); box-shadow:0 25px 60px rgba(0,0,0,0.5); }
.spec-card:hover::before { opacity:1; }

.spec-row { display:flex; justify-content:space-between; align-items:center; padding:0.85rem 0; border-bottom:1px solid rgba(255,255,255,0.06); gap:1rem; transition:background 0.2s; }
.spec-row:last-child { border-bottom:none; }
.spec-key { font-family:'Sora',sans-serif; font-size:0.72rem; color:#8C96A3; text-transform:uppercase; letter-spacing:0.08em; flex-shrink:0; }
.spec-val { font-family:'Albert Sans',sans-serif; font-size:0.85rem; font-weight:500; color:#F8FAFC; text-align:right; }
.spec-val.highlighted { color:#B8E637; font-weight:700; }

.blueprint-card { position:relative; background:rgba(17,19,21,0.8); border:1px solid rgba(184,230,55,0.12); border-radius:12px; overflow:hidden; }
.blueprint-grid { position:absolute; inset:0; background-image:linear-gradient(rgba(184,230,55,0.05) 1px, transparent 1px),linear-gradient(90deg, rgba(184,230,55,0.05) 1px, transparent 1px); background-size:30px 30px; pointer-events:none; }
.scan-line { position:absolute; left:0; right:0; height:2px; background:linear-gradient(90deg, transparent, rgba(184,230,55,0.4), transparent); animation:scanLine 4s linear infinite; pointer-events:none; }
@keyframes scanLine { 0% { top:-2px; } 100% { top:100%; } }

.tab-btn { font-family:'Albert Sans',sans-serif; font-weight:700; font-size:0.78rem; letter-spacing:0.12em; text-transform:uppercase; padding:0.65rem 1.25rem; border:1px solid rgba(255,255,255,0.08); color:#8C96A3; background:transparent; cursor:pointer; border-radius:8px; transition:all 0.3s ease; }
.tab-btn:hover { color:#B8E637; border-color:rgba(184,230,55,0.3); }
.tab-btn.active { color:#111315; background:#B8E637; border-color:#B8E637; }

.perf-bar-track { height:4px; background:rgba(184,230,55,0.1); border-radius:2px; overflow:hidden; }
.perf-bar-fill { height:100%; border-radius:2px; background:linear-gradient(90deg, #B8E637, rgba(184,230,55,0.6)); transform:translateX(-100%); transition:transform 1.2s cubic-bezier(0.23,1,0.32,1); }
.perf-bar-fill.animated { transform:translateX(0); }

.icon-box { width:44px; height:44px; display:flex; align-items:center; justify-content:center; border:1px solid rgba(184,230,55,0.2); border-radius:8px; flex-shrink:0; background:rgba(184,230,55,0.05); }
</style>
@endpush

@section('content')
{{-- HERO --}}
<section class="car-hero">
    <div class="car-hero-bg"></div>
    <div class="car-hero-glow"></div>
    <div class="max-w-7xl mx-auto px-6 w-full pt-[104px]">
        <div class="grid lg:grid-cols-2 gap-12 align-items-center">
            <div>
                <p class="section-eyebrow mb-4">2026 Constructor · Technical Breakdown</p>
                <h1 class="display-title mb-2">@if($car) {{ $car->model_name }} @else RGR-26 @endif</h1>
                <p class="section-subtitle mb-6">E Performance</p>
                @if($car)
                <div class="d-flex flex-wrap gap-4 mb-6">
                    <div class="d-flex align-items-center gap-2">
                        <div style="width:4px;height:28px;background:#B8E637;"></div>
                        <div><p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Power</p><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;color:#F8FAFC;">{{ number_format($car->power_hp) }} HP</p></div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div style="width:4px;height:28px;background:#B8E637;"></div>
                        <div><p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Top Speed</p><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;color:#F8FAFC;">{{ $car->top_speed }} km/h</p></div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div style="width:4px;height:28px;background:#B8E637;"></div>
                        <div><p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Weight</p><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;color:#F8FAFC;">{{ $car->weight }} kg</p></div>
                    </div>
                </div>
                @endif
                <div class="d-flex gap-3">
                    <a href="#tech-specs" class="btn-m1-primary">View Specs</a>
                    <a href="{{ route('home') }}" class="btn-m1-secondary">← Back</a>
                </div>
            </div>
            <div class="blueprint-card p-6 position-relative">
                <div class="blueprint-grid"></div>
                <div class="scan-line"></div>
                <div class="position-relative z-10">
                    <svg viewBox="0 0 800 300" class="w-100" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="400" cy="280" rx="300" ry="10" fill="rgba(184,230,55,0.05)"/>
                        <circle cx="210" cy="240" r="48" fill="none" stroke="#B8E637" stroke-width="1.5" opacity="0.6"/>
                        <circle cx="210" cy="240" r="32" fill="none" stroke="#B8E637" stroke-width="0.8" opacity="0.35"/>
                        <circle cx="210" cy="240" r="8" fill="rgba(184,230,55,0.25)"/>
                        <circle cx="600" cy="240" r="42" fill="none" stroke="#B8E637" stroke-width="1.5" opacity="0.6"/>
                        <circle cx="600" cy="240" r="28" fill="none" stroke="#B8E637" stroke-width="0.8" opacity="0.35"/>
                        <circle cx="600" cy="240" r="8" fill="rgba(184,230,55,0.25)"/>
                        <path d="M175,230 L175,182 Q185,148 240,140 L385,130 Q438,75 520,70 L610,72 Q658,75 688,98 L700,135 L690,182 L175,230 Z" fill="rgba(184,230,55,0.06)" stroke="#B8E637" stroke-width="1" opacity="0.7"/>
                        <path d="M385,130 Q428,90 492,82 Q525,78 548,85 L575,97 Q550,104 515,110 Q462,120 425,125 Z" fill="rgba(184,230,55,0.04)" stroke="#B8E637" stroke-width="1" opacity="0.6"/>
                        <path d="M425,88 Q462,62 505,62 Q535,62 558,74" stroke="#B8E637" stroke-width="2.5" fill="none" opacity="0.8"/>
                        <line x1="175" y1="190" x2="700" y2="140" stroke="rgba(184,230,55,0.12)" stroke-width="0.5" stroke-dasharray="8,8"/>
                        <rect x="140" y="132" width="55" height="7" rx="1" fill="rgba(184,230,55,0.08)" stroke="#B8E637" stroke-width="1" opacity="0.7"/>
                        <rect x="152" y="148" width="35" height="5" rx="1" fill="rgba(184,230,55,0.04)" stroke="#B8E637" stroke-width="0.8" opacity="0.6"/>
                        <path d="M628,205 L712,208 L718,218 L628,222 Z" fill="rgba(184,230,55,0.06)" stroke="#B8E637" stroke-width="1" opacity="0.7"/>
                        <path d="M632,198 L710,201 L714,205 L632,205 Z" fill="rgba(184,230,55,0.04)" stroke="#B8E637" stroke-width="0.8" opacity="0.6"/>
                        <text x="420" y="175" font-family="'Albert Sans',sans-serif" font-weight="900" font-size="18" fill="rgba(184,230,55,0.2)" letter-spacing="4">RGR-26</text>
                    </svg>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:rgba(184,230,55,0.5);letter-spacing:0.15em;text-transform:uppercase;">Technical Blueprint View</p>
                        <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;">Scale 1:50</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PERFORMANCE BARS --}}
<section class="py-16" style="border-top:1px solid rgba(184,230,55,0.08);border-bottom:1px solid rgba(184,230,55,0.08);background:#111315;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-0" data-reveal>
            @foreach([
                ['label' => 'Top Speed',       'value' => ($car->top_speed ?? 372).' km/h', 'pct' => 95],
                ['label' => '0–100 km/h',      'value' => '< 2.5s',                          'pct' => 98],
                ['label' => 'Downforce',        'value' => '4800+ N',                          'pct' => 87],
                ['label' => 'Braking',          'value' => '< 15m',                            'pct' => 95],
                ['label' => 'Cornering G',      'value' => '6.5G',                             'pct' => 91],
                ['label' => 'Power Output',     'value' => ($car->power_hp ?? 1050).' HP',    'pct' => 100],
            ] as $i => $perf)
            <div class="px-3 py-5 text-center" style="border-right:1px solid rgba(184,230,55,0.06);">
                <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.1rem;color:#B8E637;margin-bottom:0.25rem;">{{ $perf['value'] }}</p>
                <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;margin-bottom:0.5rem;">{{ $perf['label'] }}</p>
                <div class="perf-bar-track"><div class="perf-bar-fill" data-width="{{ $perf['pct'] }}" style="width:{{ $perf['pct'] }}%;"></div></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TECH SPECS --}}
<section class="py-24 position-relative" id="tech-specs" style="background:#111315;">
    <div class="position-absolute inset-0" style="background:radial-gradient(ellipse at 50% 50%, rgba(184,230,55,0.03) 0%, transparent 60%);"></div>
    <div class="max-w-7xl mx-auto px-6 position-relative">
        <div class="text-center mb-12">
            <p class="section-eyebrow justify-content-center mb-3">Full Technical Data</p>
            <h2 class="section-title-std">Engineering Breakdown</h2>
        </div>
        <div class="d-flex flex-wrap gap-2 mb-8 justify-content-center" id="spec-tabs">
            @foreach($techSpecs as $key => $group)
            <button class="tab-btn {{ $loop->first ? 'active' : '' }}" id="tab-{{ $key }}" data-tab="{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" aria-controls="panel-{{ $key }}">{{ $group['title'] }}</button>
            @endforeach
        </div>
        @foreach($techSpecs as $key => $group)
        <div class="{{ $loop->first ? '' : 'd-none' }}" id="panel-{{ $key }}" data-reveal>
            <div class="grid lg:grid-cols-2 gap-6">
                <div class="spec-card p-6">
                    <div class="d-flex align-items-center gap-3 mb-6">
                        <div class="icon-box">
                            <svg class="w-5 h-5" style="color:#B8E637;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                @if($group['icon'] === 'bolt')
                                <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                @elseif($group['icon'] === 'wrench')
                                <path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>
                                @elseif($group['icon'] === 'wind')
                                <path d="M9.59 4.59A2 2 0 1111 8H2m10.59 11.41A2 2 0 1014 16H2m15.73-8.27A2.5 2.5 0 1119.5 12H2"/>
                                @else
                                <circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/><path d="M12 2v4M12 18v4M2 12h4M18 12h4"/>
                                @endif
                            </svg>
                        </div>
                        <div>
                            <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Technical Data</p>
                            <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">{{ $group['title'] }}</h3>
                        </div>
                    </div>
                    @foreach($group['specs'] as $spec)
                    <div class="spec-row">
                        <span class="spec-key">{{ $spec['label'] }}</span>
                        <span class="spec-val {{ $group['color'] === 'cyan' ? 'highlighted' : '' }}">{{ $spec['value'] }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="spec-card p-6 d-flex flex-column justify-content-between">
                    <div>
                        <p class="section-eyebrow mb-3">Engineering Notes</p>
                        @if($key === 'aerodynamics' && $car->aerodynamics_notes)
                            <p style="font-family:'Sora',sans-serif;font-size:0.82rem;color:#D2D6DC;line-height:1.65;">{{ $car->aerodynamics_notes }}</p>
                        @elseif($key === 'chassis' && $car->suspension_notes)
                            <p style="font-family:'Sora',sans-serif;font-size:0.82rem;color:#D2D6DC;line-height:1.65;">{{ $car->suspension_notes }}</p>
                        @elseif($key === 'powertrain')
                            <p style="font-family:'Sora',sans-serif;font-size:0.82rem;color:#D2D6DC;line-height:1.65;">The RGR-HP2026 Hybrid V6 combines a turbocharged 1.6-litre V6 ICE with a dual-motor hybrid system. Energy harvested under braking is deployed instantaneously for seamless power delivery.</p>
                        @else
                            <p style="font-family:'Sora',sans-serif;font-size:0.82rem;color:#D2D6DC;line-height:1.65;">Every parameter optimized for championship performance across all circuit types through relentless wind-tunnel development and CFD simulations.</p>
                        @endif
                    </div>
                    <div class="mt-6 pt-4" style="border-top:1px solid rgba(184,230,55,0.08);">
                        @if($key === 'powertrain')
                            <div class="d-flex align-items-center gap-3">
                                <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.5rem;color:#B8E637;text-shadow:0 0 20px rgba(184,230,55,0.4);">{{ $car->power_hp ?? 1050 }}</span>
                                <div><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">Combined HP</p><p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;letter-spacing:0.15em;text-transform:uppercase;">ICE + ERS Output</p></div>
                            </div>
                        @elseif($key === 'chassis')
                            <div class="d-flex align-items-center gap-3">
                                <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.5rem;color:#F8FAFC;">{{ $car->weight ?? 798 }}</span>
                                <div><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">Kilograms</p><p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;letter-spacing:0.15em;text-transform:uppercase;">Minimum Race Weight</p></div>
                            </div>
                        @elseif($key === 'aerodynamics')
                            <div class="d-flex align-items-center gap-3">
                                <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.5rem;color:#B8E637;text-shadow:0 0 20px rgba(184,230,55,0.4);">4800+</span>
                                <div><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">Newtons</p><p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;letter-spacing:0.15em;text-transform:uppercase;">Downforce at 250 km/h</p></div>
                            </div>
                        @else
                            <div class="d-flex align-items-center gap-3">
                                <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2.5rem;color:#B8E637;text-shadow:0 0 20px rgba(184,230,55,0.4);">{{ $car->top_speed ?? 372 }}</span>
                                <div><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">km/h</p><p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;letter-spacing:0.15em;text-transform:uppercase;">Top Speed Record</p></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- DRIVERS CTA --}}
<section class="py-20 position-relative overflow-hidden" style="background:#111315;">
    <div class="position-absolute inset-0" style="background:radial-gradient(ellipse at 50% 50%, rgba(184,230,55,0.04) 0%, transparent 70%);"></div>
    <div class="max-w-7xl mx-auto px-6 text-center position-relative">
        <p class="section-eyebrow justify-content-center mb-3">Behind the Wheel</p>
        <h2 class="section-title-std">The Pilots</h2>
        <p class="section-subtitle mb-6" style="max-width:400px;margin:0 auto 1.5rem;">Meet the drivers who push the RGR-26 to its absolute limit every race weekend.</p>
        <a href="{{ route('drivers') }}" class="btn-m1-primary">Meet Our Drivers</a>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.querySelectorAll('[data-tab]').forEach(function(btn) {
    btn.addEventListener('click', function() {
        const tabKey = this.getAttribute('data-tab');
        document.querySelectorAll('[data-tab]').forEach(function(b) { b.classList.remove('active'); b.setAttribute('aria-selected','false'); });
        document.querySelectorAll('[id^="panel-"]').forEach(function(p) { p.classList.add('d-none'); p.classList.remove('d-block'); });
        this.classList.add('active'); this.setAttribute('aria-selected','true');
        const panel = document.getElementById('panel-' + tabKey);
        if (panel) { panel.classList.remove('d-none'); panel.classList.add('d-block'); }
    });
});
const perfBars = document.querySelectorAll('.perf-bar-fill');
const barObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('animated'); barObserver.unobserve(entry.target); } });
}, { threshold: 0.3 });
perfBars.forEach(bar => { bar.style.width = bar.getAttribute('data-width') + '%'; bar.style.transform = 'translateX(-100%)'; barObserver.observe(bar); });
</script>
@endpush