@extends('layouts.rgr-premium')

@section('title', 'Team Radio Communications Archive — Mobil 1 Team RG')
@section('meta_description', 'Transkrip dan arsip audio radio pit wall resmi antara engineer dan pembalap Mobil 1 Team RG.')

@section('content')
<div class="min-h-screen bg-[#0C0D0E] pt-32 pb-24 text-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-10 pb-6 border-b border-white/10">
            <span class="inline-block px-3 py-1 text-xs font-bold font-mono tracking-wider uppercase bg-[#E10600]/20 text-[#E10600] border border-[#E10600]/30 rounded mb-2">
                PIT-WALL COMMUNICATIONS
            </span>
            <h1 class="font-display font-black text-3xl md:text-5xl text-[#F8FAFC] tracking-tight">
                TEAM RADIO ARCHIVE
            </h1>
            <p class="text-sm md:text-base text-[#8C96A3] mt-2 max-w-3xl">
                Transkrip resmi komunikasi radio antara Chief Race Engineer, Pit Wall Strategist, dan pembalap Mobil 1 Team RG selama sesi balapan.
            </p>
        </div>

        <div class="space-y-4">
            @foreach($messages as $msg)
            <div class="bg-[#141619] border border-white/10 rounded-xl p-5 hover:border-white/20 transition-all flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-[#1A1D21] border border-white/10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/></svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs font-mono font-bold text-amber-400">LAP {{ $msg->lap_number }}</span>
                            <span class="text-zinc-600">•</span>
                            <span class="text-xs font-mono text-zinc-300 font-bold">{{ $msg->sender }} ➔ {{ $msg->recipient }}</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-white/5 border border-white/10 text-zinc-400 uppercase">{{ $msg->category }}</span>
                        </div>
                        <p class="text-sm text-white font-mono bg-[#1A1D21] px-3 py-2 rounded border border-white/5">
                            "{{ $msg->message_text }}"
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3 shrink-0">
                    <span class="text-xs font-mono text-zinc-500">{{ $msg->created_at->diffForHumans() }}</span>
                    <button class="px-3 py-1.5 bg-white/5 hover:bg-white/10 border border-white/10 rounded text-xs font-mono text-zinc-300 flex items-center gap-1.5 transition-colors">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/></svg>
                        Play Audio ({{ $msg->audio_duration_sec }}s)
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection