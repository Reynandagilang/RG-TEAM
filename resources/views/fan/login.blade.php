@extends('layouts.rgr-premium')

@section('title', 'Fan Zone Login — Mobil 1 Team RG')

@section('content')
<div class="min-h-[calc(100vh-100px)] flex flex-col lg:flex-row bg-[#111315]">
    {{-- Left Column: Visual Branding --}}
    <div class="lg:w-1/2 relative bg-[#171B20] flex flex-col justify-between p-8 lg:p-16 overflow-hidden border-r border-white/10 min-h-[360px] lg:min-h-auto">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,rgba(184,230,55,0.15),transparent_60%)] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:32px_32px] pointer-events-none"></div>
        
        <div class="relative z-10">
            <span class="m1-badge mb-4">PADDOCK ENTERPRISE PORTAL</span>
            <h1 class="display-title text-3xl lg:text-5xl mt-2 mb-4">ENTER THE<br><span class="text-[#B8E637]">INNER CIRCLE</span></h1>
            <p class="text-[#8C96A3] text-sm lg:text-base max-w-md font-body leading-relaxed">
                Akses eksklusif ke telemetry data, VIP Paddock Club reservations, dan liga prediksi balap resmi Mobil 1 Team RG.
            </p>
        </div>

        <div class="relative z-10 my-8 lg:my-12 p-6 rounded-xl bg-[#20252C]/80 border border-white/10 backdrop-blur-md">
            <div class="flex items-center gap-3 mb-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#B8E637] animate-ping"></span>
                <span class="font-mono text-xs text-[#B8E637] uppercase tracking-wider font-bold">2026 RACE TELEMETRY LIVE</span>
            </div>
            <p class="italic text-sm text-[#F8FAFC] font-body">"Speed is a given. Precision is our craft. Excellence is non-negotiable."</p>
            <p class="text-xs text-[#8C96A3] mt-2 font-display font-semibold uppercase tracking-wider">— Rey Gilang, Team Principal</p>
        </div>

        <div class="relative z-10 flex items-center justify-between text-xs text-[#8C96A3] pt-4 border-t border-white/10">
            <span>FIA F1 WORLD CHAMPIONSHIP</span>
            <span class="text-[#B8E637] font-mono font-bold">10 DIVISIONS ACTIVE</span>
        </div>
    </div>

    {{-- Right Column: Glass Form Card --}}
    <div class="lg:w-1/2 flex items-center justify-center p-6 lg:p-12 relative">
        <div class="w-full max-w-md m1-glass p-8 lg:p-10 shadow-2xl relative">
            <div class="mb-8">
                <span class="text-[0.68rem] font-display font-bold text-[#B8E637] tracking-widest uppercase block mb-1">M1TRG MEMBER ACCESS</span>
                <h2 class="font-display font-black text-2xl text-[#F8FAFC] uppercase tracking-tight">MASUK FAN ZONE</h2>
                <p class="text-xs text-[#8C96A3] mt-1 font-body">Masukkan email dan password terdaftar Anda.</p>
            </div>

            @if($errors->any())
            <div class="p-4 mb-6 bg-[#E5484D]/10 border border-[#E5484D]/30 rounded-lg text-xs text-[#E5484D]">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('fan.login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-display font-bold text-[#F8FAFC] uppercase tracking-wider mb-2">Alamat Email</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                           class="m1-input font-mono" placeholder="nama@domain.com">
                </div>

                <div>
                    <label for="password" class="block text-xs font-display font-bold text-[#F8FAFC] uppercase tracking-wider mb-2">Kata Sandi</label>
                    <input type="password" name="password" id="password" required
                           class="m1-input font-mono" placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 cursor-pointer text-[#8C96A3] hover:text-[#F8FAFC]">
                        <input type="checkbox" name="remember" class="accent-[#B8E637] rounded">
                        Ingat Saya
                    </label>
                    <a href="#" class="text-[#B8E637] hover:underline font-semibold">Lupa Sandi?</a>
                </div>

                <button type="submit" class="w-full btn-m1-primary py-3.5 mt-2 text-xs">
                    MASUK PADDOCK PORTAL &rarr;
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-white/10 text-center text-xs text-[#8C96A3]">
                Belum menjadi anggota? 
                <a href="{{ route('fan.register') }}" class="text-[#B8E637] font-bold hover:underline ml-1">Daftar Sekarang &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection
