@extends('layouts.rgr-premium')

@section('title', 'Kabar & Berita Tim RGR')
@section('meta_description', 'Berita terbaru, analisis teknis pasca-balap, dan rilis pers resmi langsung dari tim pit-wall Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#111315]">

    {{-- Hero --}}
    <section class="relative pt-36 pb-20 overflow-hidden grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-[#B8E637]/05 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="section-eyebrow">Media Hub</span>
            <h1 class="display-title mt-4 max-w-4xl">Latest News</h1>
            <p class="section-subtitle mt-4 max-w-2xl">
                Semua artikel resmi, wawancara pembalap, rilis teknis sasis, dan laporan hasil akhir sirkuit.
            </p>
        </div>
    </section>

    {{-- Articles Grid --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles as $art)
                <article class="m1-card-elevated p-6 flex flex-col justify-between" data-reveal>
                    <div>
                        <span class="m1-badge mb-3">{{ $art->category }}</span>
                        <h3 class="font-display font-bold text-lg text-[#F8FAFC] mb-3 leading-tight">{{ $art->title }}</h3>
                        <p class="text-sm text-[#D2D6DC] leading-relaxed font-body mb-6">
                            {{ $art->summary }}
                        </p>
                    </div>
                    <div class="border-t border-[rgba(255,255,255,0.06)] pt-4 flex justify-between items-center text-sm text-[#8C96A3]">
                        <span>{{ $art->author }}</span>
                        <span>{{ \Carbon\Carbon::parse($art->published_at)->format('d M Y') }}</span>
                    </div>
                </article>
            @empty
            <div class="m1-card p-12 text-center">
                <p class="text-[#8C96A3] text-sm">Belum ada artikel berita yang dipublikasikan.</p>
            </div>
            @endforelse
            </div>
        </div>
    </section>

</div>
@endsection
