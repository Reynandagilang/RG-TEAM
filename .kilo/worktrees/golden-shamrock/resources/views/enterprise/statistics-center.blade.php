@extends('layouts.rgr-premium')

@section('title', 'Statistics Center — Performa & Rekor Tim — Mobil 1 Team RG')
@section('meta_description', 'Pusat data statistik resmi pembalap, mobil, dan rekor sejarah kemenangan Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#111315] pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-6">

        <div class="mb-10 pb-6 border-b border-white/10">
            <span class="m1-badge mb-2">ANALYTICS HUB</span>
            <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC]">STATISTICS CENTER</h1>
            <p class="text-sm text-[#8C96A3] mt-2">Analisis data performa tim, akumulasi poin musim, dan rekor sejarah kemenangan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="m1-card p-6 text-center">
                <span class="text-xs text-[#8C96A3] font-mono uppercase block mb-1">TOTAL KEMENANGAN (P1)</span>
                <span class="font-display font-black text-4xl text-[#B8E637]">48</span>
            </div>
            <div class="m1-card p-6 text-center">
                <span class="text-xs text-[#8C96A3] font-mono uppercase block mb-1">PODIUM FINISH</span>
                <span class="font-display font-black text-4xl text-[#F8FAFC]">132</span>
            </div>
            <div class="m1-card p-6 text-center">
                <span class="text-xs text-[#8C96A3] font-mono uppercase block mb-1">POLE POSITIONS</span>
                <span class="font-display font-black text-4xl text-[#F4B63D]">36</span>
            </div>
            <div class="m1-card p-6 text-center">
                <span class="text-xs text-[#8C96A3] font-mono uppercase block mb-1">GELAR JUARA DUEL</span>
                <span class="font-display font-black text-4xl text-[#38C172]">5</span>
            </div>
        </div>

    </div>
</div>
@endsection
