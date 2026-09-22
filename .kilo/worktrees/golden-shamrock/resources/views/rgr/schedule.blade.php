@extends('layouts.rgr-premium')

@section('title', 'Race Schedule 2026 — Rey Gilang Racing')
@section('meta_description', 'Full 2026 Formula 1 race calendar for Rey Gilang Racing.')

@push('styles')
<style>
.schedule-hero-grid { position:absolute; inset:0; background-image:linear-gradient(rgba(184,230,55,0.03) 1px, transparent 1px),linear-gradient(90deg, rgba(184,230,55,0.03) 1px, transparent 1px); background-size:60px 60px; }
.race-card { position:relative; background:#171B20; border:1px solid rgba(255,255,255,0.06); border-radius:12px; transition:all 0.4s cubic-bezier(0.23,1,0.32,1); overflow:hidden; }
.race-card::before { content:''; position:absolute; top:0; left:0; width:3px; height:0; background:#B8E637; transition:height 0.4s ease; }
.race-card:hover { border-color:rgba(184,230,55,0.2); transform:translateX(6px); box-shadow:0 20px 60px rgba(0,0,0,0.5); }
.race-card:hover::before { height:100%; }
.race-card.next-race { border-color:rgba(184,230,55,0.25); }
.race-card.next-race::before { height:100%; }
.race-card.finished { opacity:0.5; }
.race-card.finished:hover { opacity:0.75; }
.next-pill { font-family:'Albert Sans',sans-serif; font-size:0.6rem; font-weight:700; letter-spacing:0.15em; text-transform:uppercase; padding:0.2rem 0.6rem; color:#111315; background:#B8E637; border-radius:6px; display:inline-block; }
.status-pill-up { font-family:'Sora',sans-serif; font-size:0.6rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; padding:0.2rem 0.6rem; color:#B8E637; border:1px solid rgba(184,230,55,0.35); background:rgba(184,230,55,0.08); border-radius:6px; display:inline-block; }
.status-pill-done { font-family:'Sora',sans-serif; font-size:0.6rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; padding:0.2rem 0.6rem; color:#8C96A3; border:1px solid rgba(255,255,255,0.08); background:rgba(255,255,255,0.03); border-radius:6px; display:inline-block; }
.round-num { font-family:'Albert Sans',sans-serif; font-size:0.7rem; font-weight:700; color:#8C96A3; min-width:2.2rem; text-align:center; }
.race-name { font-family:'Albert Sans',sans-serif; font-weight:600; font-size:0.95rem; color:#F8FAFC; }
.circuit-name { font-family:'Sora',sans-serif; font-size:0.72rem; color:#8C96A3; }
.race-date-text { font-family:'Sora',sans-serif; font-size:0.78rem; font-weight:600; color:#D2D6DC; }
.mini-countdown { font-family:'JetBrains Mono',monospace; font-weight:700; font-size:0.72rem; color:#B8E637; }
</style>
@endpush

@section('content')
{{-- Hero --}}
<section class="position-relative" style="padding-top:130px;padding-bottom:60px;overflow:hidden;">
    <div class="schedule-hero-grid"></div>
    <div class="max-w-7xl mx-auto px-6 position-relative">
        <p class="section-eyebrow mb-4">FIA Formula 1 World Championship</p>
        <h1 class="display-title mb-4">2026 Calendar</h1>
        <p style="font-family:'Sora',sans-serif;font-size:1rem;color:#D2D6DC;">
            {{ ($upcoming->count() ?? 0) }} races remaining · {{ ($finished->count() ?? 0) }} completed
        </p>
    </div>
</section>

{{-- Schedule --}}
<section class="pb-24" id="schedule-list">
    <div class="max-w-5xl mx-auto px-6">
        @if($upcoming->count() > 0)
        <div class="mb-16">
            <div class="d-flex align-items-center gap-4 mb-6">
                <p class="section-eyebrow mb-0">Upcoming Races</p>
                <div class="flex-fill" style="height:1px;background:rgba(184,230,55,0.08);"></div>
                <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">{{ $upcoming->count() }} events</span>
            </div>
            <div class="d-flex flex-column gap-3">
                @foreach($upcoming as $race)
                @php $isNext = $nextRace && $nextRace->id === $race->id; @endphp
                <div class="race-card p-4 {{ $isNext ? 'next-race' : '' }}" data-reveal id="race-{{ $race->id }}">
                    @if($isNext)
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="next-pill">Next Race</span>
                        <span class="mini-countdown" id="mini-cd-{{ $race->id }}">calculating...</span>
                    </div>
                    @endif
                    <div class="d-flex align-items-center gap-3">
                        <span class="round-num" style="color:rgba(184,230,55,0.4);">R{{ $race->round_number ?? '—' }}</span>
                        <div style="width:1px;align-self:stretch;background:rgba(184,230,55,0.08);"></div>
                        <div class="flex-fill min-w-0">
                            <p class="race-name">{{ $race->grand_prix_name }}</p>
                            <p class="circuit-name mt-1">{{ $race->circuit_name }} · {{ $race->country }}</p>
                        </div>
                        <div class="d-none d-sm-block text-end">
                            <p class="race-date-text">{{ $race->race_date->format('d M') }}</p>
                            <p style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;">{{ $race->race_date->format('Y') }}</p>
                        </div>
                        <span class="{{ $isNext ? 'next-pill' : 'status-pill-up' }} d-none d-sm-inline-block">{{ $isNext ? 'Next' : 'Upcoming' }}</span>
                    </div>
                    @if($isNext)
                    <div class="mt-3 pt-3 d-flex gap-4" style="border-top:1px solid rgba(184,230,55,0.08);">
                        @if($race->practice1_date)
                        <div><p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">P1</p><p class="fw-medium" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">{{ $race->practice1_date->format('d M · H:i') }}</p></div>
                        @endif
                        @if($race->qualifying_date)
                        <div><p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Quali</p><p class="fw-medium" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#F8FAFC;">{{ $race->qualifying_date->format('d M · H:i') }}</p></div>
                        @endif
                        <div><p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">Race</p><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#B8E637;">{{ $race->race_date->format('d M · H:i') }}</p></div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($finished->count() > 0)
        <div>
            <div class="d-flex align-items-center gap-4 mb-6">
                <p class="section-eyebrow mb-0" style="color:#8C96A3!important;">Completed</p>
                <div class="flex-fill" style="height:1px;background:rgba(255,255,255,0.06);"></div>
                <span style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">{{ $finished->count() }} events</span>
            </div>
            <div class="d-flex flex-column gap-2">
                @foreach($finished as $race)
                <div class="race-card finished p-3" data-reveal id="race-done-{{ $race->id }}">
                    <div class="d-flex align-items-center gap-3">
                        <span class="round-num">R{{ $race->round_number ?? '—' }}</span>
                        <div style="width:1px;align-self:stretch;background:rgba(255,255,255,0.06);"></div>
                        <div class="flex-fill min-w-0">
                            <p class="race-name" style="text-decoration:line-through;font-size:0.85rem;color:#D2D6DC;">{{ $race->grand_prix_name }}</p>
                            <p class="circuit-name">{{ $race->circuit_name }}</p>
                        </div>
                        <p style="font-family:'Sora',sans-serif;font-size:0.7rem;color:#8C96A3;" class="d-none d-sm-block">{{ $race->race_date->format('d M Y') }}</p>
                        <span class="status-pill-done">Finished</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
(function() {
    @if($nextRace && $nextRace->is_upcoming)
    const raceTimestamp = {{ $nextRace->race_date->timestamp * 1000 }};
    const el = document.getElementById('mini-cd-{{ $nextRace->id }}');
    if (!el) return;
    function pad(n) { return String(n).padStart(2,'0'); }
    function tickMini() {
        const diff = Math.max(0, Math.floor((raceTimestamp - Date.now()) / 1000));
        const d = Math.floor(diff / 86400);
        const h = Math.floor((diff % 86400) / 3600);
        const m = Math.floor((diff % 3600) / 60);
        const s = diff % 60;
        el.textContent = d + 'd ' + pad(h) + 'h ' + pad(m) + 'm ' + pad(s) + 's';
        if (diff > 0) setTimeout(tickMini, 1000);
    }
    tickMini();
    @endif
})();
</script>
@endpush