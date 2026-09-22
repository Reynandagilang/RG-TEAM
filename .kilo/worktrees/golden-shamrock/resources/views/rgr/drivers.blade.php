@extends('layouts.rgr-premium')

@section('title', 'Drivers — Rey Gilang Racing')
@section('meta_description', 'Meet the Rey Gilang Racing drivers for the 2026 F1 season.')

@push('styles')
<style>
.drivers-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(184,230,55,0.03) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(184,230,55,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
}
.driver-full-card {
    position: relative; background:#171B20; border:1px solid rgba(255,255,255,0.06);
    border-radius:12px; overflow:hidden;
    transition:all 0.5s cubic-bezier(0.23,1,0.32,1);
}
.driver-full-card:hover { border-color:rgba(184,230,55,0.2); transform:translateY(-4px); box-shadow:0 30px 80px rgba(0,0,0,0.6); }
.driver-bg-number {
    position:absolute; right:-1.5rem; top:50%; transform:translateY(-50%);
    font-family:'Albert Sans',sans-serif; font-weight:900; font-size:14rem;
    line-height:1; color:rgba(184,230,55,0.03); user-select:none; pointer-events:none;
}
.driver-img-area { aspect-ratio:3/4; overflow:hidden; position:relative; background:linear-gradient(180deg, rgba(184,230,55,0.04), transparent); }
.driver-img-area img { width:100%; height:100%; object-fit:cover; object-position:top; transition:all 0.5s ease; }
.driver-full-card:hover .driver-img-area img { transform:scale(1.04); }
.driver-img-placeholder { aspect-ratio:3/4; display:flex; align-items:center; justify-content:center; background:linear-gradient(180deg, rgba(184,230,55,0.04), rgba(0,0,0,0.3)); }
.reserve-card { background:rgba(23,27,32,0.8); border:1px solid rgba(255,255,255,0.06); border-radius:12px; transition:all 0.4s ease; }
.reserve-card:hover { border-color:rgba(184,230,55,0.2); }
</style>
@endpush

@section('content')
{{-- Hero --}}
<section class="position-relative" style="padding-top:130px;padding-bottom:60px;overflow:hidden;">
    <div class="drivers-hero-grid"></div>
    <div class="max-w-7xl mx-auto px-6 position-relative">
        <p class="section-eyebrow mb-4">2026 Driver Lineup</p>
        <h1 class="display-title mb-4">Our Pilots</h1>
        <p class="section-subtitle">The human edge. Two drivers. One mission. The podium.</p>
    </div>
</section>

{{-- Race Drivers --}}
<section class="py-16" id="race-drivers">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-6">
            @foreach($drivers->where('role', 'Race Driver') as $driver)
            <article class="driver-full-card" data-reveal id="driver-profile-{{ $driver->id }}">
                <span class="driver-bg-number">{{ $driver->permanent_number }}</span>
                <div class="grid grid-cols-5">
                    <div class="col-span-2">
                        @if($driver->profile_image)
                        <div class="driver-img-area">
                            <img src="{{ asset('storage/'.$driver->profile_image) }}" alt="{{ $driver->name }}" loading="lazy">
                        </div>
                        @else
                        <div class="driver-img-placeholder">
                            <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:5rem;color:rgba(184,230,55,0.15);">{{ $driver->permanent_number }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="col-span-3 p-6 d-flex flex-column">
                        <div class="mb-4">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <div>
                                    <p style="font-family:'Sora',sans-serif;font-size:0.65rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">{{ $driver->country_code ?? $driver->country }}</p>
                                    <h2 class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:1.6rem;color:#F8FAFC;line-height:1.2;">{{ $driver->name }}</h2>
                                </div>
                                <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:2rem;color:#B8E637;text-shadow:0 0 15px rgba(184,230,55,0.4);">#{{ $driver->permanent_number }}</span>
                            </div>
                            <span class="m1-badge d-inline-block">{{ $driver->role }}</span>
                        </div>
                        <div class="flex-fill d-flex flex-column justify-content-end">
                            <div class="grid grid-cols-2" style="border:1px solid rgba(184,230,55,0.08);border-radius:8px;overflow:hidden;">
                                <div style="padding:0.75rem;border-right:1px solid rgba(184,230,55,0.06);background:rgba(17,19,21,0.5);">
                                    <p class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#B8E637;">{{ $driver->podiums }}</p>
                                    <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Podiums</p>
                                </div>
                                <div style="padding:0.75rem;background:rgba(17,19,21,0.5);">
                                    <p class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:1.5rem;color:#B8E637;">{{ number_format($driver->career_points, 0) }}</p>
                                    <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Career Pts</p>
                                </div>
                                <div style="padding:0.75rem;border-right:1px solid rgba(184,230,55,0.06);border-top:1px solid rgba(184,230,55,0.06);background:rgba(17,19,21,0.5);">
                                    <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1rem;color:#F8FAFC;">{{ $driver->country }}</p>
                                    <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Nationality</p>
                                </div>
                                <div style="padding:0.75rem;border-top:1px solid rgba(184,230,55,0.06);background:rgba(17,19,21,0.5);">
                                    <div class="d-flex align-items-center gap-1"><span style="width:8px;height:8px;border-radius:50%;background:#B8E637;display:inline-block;"></span><p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:0.85rem;color:#B8E637;">Active</p></div>
                                    <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Status</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Reserve Driver --}}
        @php $reserve = $drivers->where('role', 'Reserve')->first(); @endphp
        @if($reserve)
        <div class="mt-12 pt-10" style="border-top:1px solid rgba(184,230,55,0.08);">
            <p class="section-eyebrow mb-4">Reserve Driver</p>
            <div class="reserve-card p-5 d-flex align-items-center gap-6" style="max-width:560px;">
                <span class="fw-black" style="font-family:'Albert Sans',sans-serif;font-size:3.5rem;color:rgba(184,230,55,0.15);">#{{ $reserve->permanent_number }}</span>
                <div class="flex-fill">
                    <p style="font-family:'Sora',sans-serif;font-size:0.6rem;color:#8C96A3;letter-spacing:0.12em;text-transform:uppercase;">{{ $reserve->country_code ?? $reserve->country }}</p>
                    <h3 class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#F8FAFC;">{{ $reserve->name }}</h3>
                    <p style="font-family:'Sora',sans-serif;font-size:0.65rem;color:rgba(184,230,55,0.7);letter-spacing:0.12em;text-transform:uppercase;">Reserve / Test Driver</p>
                </div>
                <div class="text-end">
                    <p class="fw-bold" style="font-family:'Albert Sans',sans-serif;font-size:1.2rem;color:#B8E637;">{{ $reserve->career_points }}</p>
                    <p style="font-family:'Sora',sans-serif;font-size:0.55rem;color:#8C96A3;text-transform:uppercase;letter-spacing:0.12em;">Career Pts</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection