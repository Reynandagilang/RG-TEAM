@extends('layouts.rgr-premium')

@section('title', 'Armada Balap — Spesifikasi Teknis Fleet RGR')
@section('meta_description', 'Spesifikasi teknis lengkap untuk armada multi-disiplin Mobil 1 Team RG: Mesin F1, Hypercar, Prototipe Hibrida, GT3, dan GTP.')

@section('content')

<section class="relative min-h-[65vh] flex items-end overflow-hidden pt-24 pb-20" style="background:#111315">
    <div class="absolute inset-0 opacity-[0.03]"
         style="background-image:linear-gradient(rgba(184,230,55,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(184,230,55,0.03) 1px, transparent 1px); background-size:60px 60px">
    </div>
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[900px] h-[450px] pointer-events-none"
         style="background:radial-gradient(ellipse, rgba(184,230,55,0.06) 0%, transparent 65%)">
    </div>
    <div class="absolute left-0 right-0 h-[2px] pointer-events-none"
         style="background:linear-gradient(90deg, transparent, rgba(184,230,55,0.25), transparent); animation: sScan 5s linear infinite">
    </div>
    <div class="absolute left-0 top-0 bottom-0 w-[3px] hidden lg:block"
         style="background:linear-gradient(180deg,transparent,#B8E637 30%,#B8E637 70%,transparent)">
    </div>

    <div class="max-w-7xl mx-auto px-6 w-full pt-24">
        <div class="max-w-3xl">
            <div class="section-eyebrow mb-4">Armada Multi-Disiplin &middot; Rincian Teknis</div>
            <h1 class="section-title-std mb-6">Mesin Balap</h1>
            <p class="font-['Sora'] text-[#D2D6DC] text-xl leading-relaxed mb-8">
                Lima kategori. Lima kejuaraan. Sepuluh mesin balap yang dirancang hingga batas maksimal regulasi masing-masing kelas.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#fleet" class="btn-m1-primary" id="btn-view-fleet">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    Jelajahi Armada
                </a>
                <a href="{{ route('home') }}" class="btn-m1-ghost" id="btn-back-home">&larr; Kembali</a>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes sScan { 0%{top:-2px} 100%{top:100%} }
</style>

<section class="border-y border-[rgba(184,230,55,0.08)] py-4" style="background:#111315">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-[rgba(184,230,55,0.08)]">
            @php
            $statPills = [
                ['val' => $fleetStats['total_cars'] ?? 10, 'label' => 'Total Mobil'],
                ['val' => $fleetStats['max_hp'] ?? 1050, 'label' => 'HP Maksimal'],
                ['val' => $fleetStats['max_speed'] ?? 372, 'label' => 'Kec. Puncak km/jam'],
                ['val' => $fleetStats['categories'] ?? 5, 'label' => 'Kategori'],
            ];
            @endphp
            @foreach($statPills as $pill)
            <div class="py-5 px-6 text-center">
                <p class="font-['Albert_Sans'] font-black text-[2.2rem] leading-none text-[#B8E637]">{{ $pill['val'] }}</p>
                <p class="font-['Albert_Sans'] text-[0.65rem] font-bold tracking-[0.22em] uppercase text-[#8C96A3] mt-1">{{ $pill['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 relative" style="background:#111315" id="fleet">
    <div class="absolute inset-0 pointer-events-none"
         style="background:radial-gradient(ellipse at 50% 50%,rgba(184,230,55,0.02) 0%,transparent 60%)">
    </div>

    <div class="max-w-7xl mx-auto px-6 relative">

        <div class="text-center mb-12">
            <div class="section-eyebrow justify-center mb-3">Data Teknis</div>
            <h2 class="section-title-std mb-4">Rincian Rekayasa</h2>
            <p class="font-['Sora'] text-[#8C96A3] max-w-lg mx-auto text-sm">Pilih kategori untuk melihat lembar spesifikasi teknis lengkap dari setiap mobil.</p>
        </div>

        <div class="flex flex-wrap gap-2 justify-center mb-12" id="fleet-tabs" role="tablist" aria-label="Kategori Mobil Balap">
            @foreach($categories as $i => $cat)
            <button class="px-6 py-3 font-['Albert_Sans'] text-xs font-bold tracking-wider uppercase rounded transition-all duration-300 {{ $i === 0 ? 'bg-[#B8E637] text-[#111315]' : 'text-[#8C96A3] border border-[rgba(255,255,255,0.06)] hover:text-[#F8FAFC]' }}"
                    id="tab-{{ strtolower($cat) }}"
                    role="tab"
                    aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                    aria-controls="panel-{{ strtolower($cat) }}"
                    data-cat="{{ $cat }}"
                    aria-label="Tampilkan mobil kategori {{ $cat }}">
                {{ $cat }}
            </button>
            @endforeach
        </div>

        @foreach($categories as $catKey)
        @php
            $catCars = $fleetGrouped->get($catKey, collect());
            $meta    = $categoryMeta[$catKey] ?? [];
            $color   = $meta['color'] ?? '#B8E637';
            $colorRgb = implode(',', sscanf($color, '#%02x%02x%02x') ?: [184, 230, 55]);
        @endphp

        <div id="panel-{{ strtolower($catKey) }}"
             role="tabpanel"
             aria-labelledby="tab-{{ strtolower($catKey) }}"
             class="{{ $loop->first ? 'block' : 'hidden' }}">

            <div class="mb-8 p-6 rounded" style="background:#171B20; border:1px dashed rgba(255,255,255,0.06)">
                <div class="flex flex-wrap items-center gap-4 mb-3">
                    <span class="font-['Albert_Sans'] font-black text-2xl" style="color:{{ $color }}">{{ $catKey }}</span>
                    <span class="text-[#8C96A3] text-sm font-['Albert_Sans'] tracking-wide">{{ $meta['championship'] ?? '' }}</span>
                </div>
                <p class="text-[#D2D6DC] leading-relaxed font-['Sora'] text-sm">{{ $meta['description'] ?? '' }}</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($catCars as $car)
                @php
                $carColorRgb = $colorRgb;
                @endphp
                <div class="m1-card-elevated relative overflow-hidden transition-all duration-400 hover:-translate-y-1" id="car-spec-{{ $car->id }}"
                     style="--hover-border: {{ $color }}">
                    <span class="absolute right-[-1rem] top-1/2 -translate-y-1/2 font-['Albert_Sans'] font-black text-[14rem] leading-none pointer-events-none select-none"
                          style="color:rgba({{ $colorRgb }},0.04)">{{ $car->car_number }}</span>

                    <div class="p-7 relative z-10">
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-['Albert_Sans'] font-black text-2xl" style="color:{{ $color }}">#{{ $car->car_number }}</span>
                                    <span class="text-[#8C96A3] text-xs font-['Albert_Sans']">{{ $car->category }}</span>
                                </div>
                                <h3 class="text-[#F8FAFC] font-['Albert_Sans'] font-bold text-xl leading-tight">{{ $car->model_name }}</h3>
                                @if($car->championship)
                                <p class="text-[#8C96A3] text-xs font-['Albert_Sans'] mt-1">{{ $car->championship }}</p>
                                @endif
                            </div>
                            @if($car->class_entry)
                            <span class="m1-badge text-xs" style="color:{{ $color }}; border-color:{{ $color }}33; background:{{ $color }}11">
                                {{ $car->class_entry }}
                            </span>
                            @endif
                        </div>

                        <div class="mb-5 space-y-[1px]">
                            @foreach([
                                ['label' => 'Unit Tenaga',    'val' => $car->power_unit,   'accent' => true],
                                ['label' => 'Sasis',          'val' => $car->chassis,       'accent' => false],
                                ['label' => 'Output Daya',    'val' => ($car->power_hp ? number_format($car->power_hp) . ' HP' : '—'), 'accent' => true],
                                ['label' => 'Kec. Maksimal',  'val' => ($car->top_speed ? $car->top_speed . ' km/jam' : '—'), 'accent' => true],
                                ['label' => 'Bobot',          'val' => ($car->weight ? $car->weight . ' kg' : '—'), 'accent' => false],
                                ['label' => 'Kapasitas BBM',  'val' => ($car->fuel_capacity ? $car->fuel_capacity . ' L' : '—'), 'accent' => false],
                                ['label' => 'Pemasok Ban',    'val' => ($car->tyre_supplier ?? '—'), 'accent' => false],
                            ] as $row)
                            <div class="flex justify-between items-center py-3 border-b border-[rgba(255,255,255,0.04)] gap-4">
                                <span class="font-['Albert_Sans'] text-[0.72rem] font-semibold tracking-wider uppercase text-[#8C96A3] flex-shrink-0">{{ $row['label'] }}</span>
                                <span class="{{ $row['accent'] ? 'font-['JetBrains_Mono'] text-xs font-bold' : 'text-sm font-medium text-[#F8FAFC]' }} text-right"
                                      style="{{ $row['accent'] ? 'color:'.$color : '' }}">
                                    {{ $row['val'] ?? '—' }}
                                </span>
                            </div>
                            @endforeach
                        </div>

                        @php
                            $speedPct = $car->top_speed ? min(100, round(($car->top_speed / 380) * 100)) : 70;
                            $powerPct = $car->power_hp  ? min(100, round(($car->power_hp  / 1200) * 100)) : 70;
                        @endphp
                        <div class="space-y-3 mb-5">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-[#8C96A3] text-xs font-['Albert_Sans'] tracking-widest uppercase">Kecepatan Puncak</span>
                                    <span class="text-xs font-['Albert_Sans'] font-bold" style="color:{{ $color }}">{{ $speedPct }}%</span>
                                </div>
                                <div class="h-1 rounded overflow-hidden" style="background:rgba(255,255,255,0.06)">
                                    <div class="h-full rounded perf-fill" data-pct="{{ $speedPct }}"
                                         style="width:{{ $speedPct }}%; background:linear-gradient(90deg,{{ $color }},rgba({{ $colorRgb }},0.5))"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-[#8C96A3] text-xs font-['Albert_Sans'] tracking-widest uppercase">Keluaran Tenaga</span>
                                    <span class="text-xs font-['Albert_Sans'] font-bold" style="color:{{ $color }}">{{ $powerPct }}%</span>
                                </div>
                                <div class="h-1 rounded overflow-hidden" style="background:rgba(255,255,255,0.06)">
                                    <div class="h-full rounded perf-fill" data-pct="{{ $powerPct }}"
                                         style="width:{{ $powerPct }}%; background:linear-gradient(90deg,{{ $color }},rgba({{ $colorRgb }},0.5))"></div>
                                </div>
                            </div>
                        </div>

                        @if($car->aerodynamics_desc)
                        <div class="pt-4 border-t border-[rgba(255,255,255,0.06)]">
                            <p class="section-eyebrow mb-2">Aerodinamika</p>
                            <p class="text-[#D2D6DC] text-sm leading-relaxed font-['Sora']">{{ $car->aerodynamics_desc }}</p>
                        </div>
                        @endif

                        @if($car->livery_sponsor)
                        <div class="mt-4 pt-4 border-t border-[rgba(255,255,255,0.06)] flex items-center gap-3">
                            <span class="text-[#8C96A3] text-xs font-['Albert_Sans'] uppercase tracking-widest">Sponsor Utama Livery</span>
                            <span class="font-['Albert_Sans'] font-bold text-sm tracking-widest" style="color:{{ $color }}">{{ $car->livery_sponsor }}</span>
                        </div>
                        @endif

                    </div>
                </div>
                @endforeach
            </div>

        </div>
        @endforeach

        @if($technicalPartners->count() > 0)
        <div class="mt-20 pt-16 border-t border-[rgba(184,230,55,0.08)]">
            <div class="section-eyebrow mb-3 justify-center">Mitra Teknis pada Livery Mobil</div>
            <h3 class="section-title-std text-center mb-8">Penempatan Sponsor</h3>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach($technicalPartners as $tp)
                <div class="px-6 py-3 rounded border transition-all duration-300 hover:border-[#B8E637]/30"
                     style="background:rgba(23,27,32,0.5); border-color:rgba(255,255,255,0.06)">
                    <span class="font-['Albert_Sans'] font-bold text-sm tracking-widest text-[#8C96A3] hover:text-[#B8E637] transition-colors uppercase">{{ $tp->name }}</span>
                </div>
                @endforeach
            </div>
            <p class="text-[#8C96A3] text-sm text-center mt-5 max-w-lg mx-auto font-['Sora']">
                Penjenamaan mitra teknis muncul pada zona bodi mobil yang telah ditentukan di kelima kategori balap, dialokasikan sesuai dengan nilai eksposur kejuaraan.
            </p>
        </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
document.querySelectorAll('[data-cat]').forEach(btn => {
    btn.addEventListener('click', function() {
        const cat = this.getAttribute('data-cat');

        document.querySelectorAll('[data-cat]').forEach(b => {
            b.classList.remove('bg-[#B8E637]', 'text-[#111315]');
            b.classList.add('text-[#8C96A3]', 'border', 'border-[rgba(255,255,255,0.06)]', 'hover:text-[#F8FAFC]');
            b.setAttribute('aria-selected', 'false');
        });
        document.querySelectorAll('[id^="panel-"]').forEach(p => {
            p.classList.add('hidden');
            p.classList.remove('block');
        });

        this.classList.remove('text-[#8C96A3]', 'border', 'border-[rgba(255,255,255,0.06)]', 'hover:text-[#F8FAFC]');
        this.classList.add('bg-[#B8E637]', 'text-[#111315]');
        this.setAttribute('aria-selected', 'true');
        const panel = document.getElementById('panel-' + cat.toLowerCase());
        if (panel) { panel.classList.remove('hidden'); panel.classList.add('block'); }
    });
});

const barObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.querySelectorAll('.perf-fill').forEach(b => b.style.transform = 'translateX(0)');
            barObs.unobserve(e.target);
        }
    });
}, { threshold: 0.2 });

document.querySelectorAll('[id^="panel-"]').forEach(p => barObs.observe(p));

document.querySelectorAll('.perf-fill').forEach(b => b.style.transform = 'translateX(-100%)');
setTimeout(() => {
    document.querySelectorAll('#panel-f1 .perf-fill, #panel-hypercar .perf-fill').forEach(b => b.style.transform = 'translateX(0)');
}, 600);
</script>
@endpush
@endsection