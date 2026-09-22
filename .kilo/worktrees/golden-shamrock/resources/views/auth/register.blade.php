@extends('layouts.rgr-premium')

@section('title', 'Daftar Paddock Club — Mobil 1 Team RG')
@section('meta_description', 'Buat akun VIP Paddock Club Mobil 1 Team RG.')

@section('content')
<div class="min-h-[calc(100vh-100px)] flex flex-col lg:flex-row bg-[#111315]">
    {{-- Left Column --}}
    <div class="lg:w-1/2 relative bg-[#171B20] flex flex-col justify-between p-8 lg:p-16 overflow-hidden border-r border-white/10 min-h-[360px] lg:min-h-auto">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,rgba(184,230,55,0.15),transparent_60%)] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:32px_32px] pointer-events-none"></div>
        
        <div class="relative z-10">
            <span class="m1-badge mb-4">JOIN THE INNER CIRCLE</span>
            <h1 class="display-title text-3xl lg:text-5xl mt-2 mb-4">REGISTER FOR<br><span class="text-[#B8E637]">VIP ACCESS</span></h1>
            <p class="text-[#8C96A3] text-sm lg:text-base max-w-md font-body leading-relaxed">
                Akses pemesanan VIP Paddock Club, Garasi Tim, dan lounge eksklusif di seluruh kejuaraan dunia.
            </p>
        </div>

        <div class="relative z-10 my-8 lg:my-12 p-6 rounded-xl bg-[#20252C]/80 border border-white/10 backdrop-blur-md">
            <div class="flex items-center gap-3 mb-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#B8E637] animate-ping"></span>
                <span class="font-mono text-xs text-[#B8E637] uppercase tracking-wider font-bold">PADDOCK CLUB TICKETING</span>
            </div>
            <p class="italic text-sm text-[#F8FAFC] font-body">"Exclusive access to the heart of international motorsport."</p>
            <p class="text-xs text-[#8C96A3] mt-2 font-display font-semibold uppercase tracking-wider">— Mobil 1 Team RG Enterprise</p>
        </div>

        <div class="relative z-10 flex items-center justify-between text-xs text-[#8C96A3] pt-4 border-t border-white/10">
            <span>OFFICIAL REGISTRATION</span>
            <span class="text-[#B8E637] font-mono font-bold">INSTANT VERIFICATION</span>
        </div>
    </div>

    {{-- Right Column --}}
    <div class="lg:w-1/2 flex items-center justify-center p-6 lg:p-12 relative">
        <div class="w-full max-w-md m1-glass p-8 lg:p-10 shadow-2xl relative">
            <div class="mb-8">
                <span class="text-[0.68rem] font-display font-bold text-[#B8E637] tracking-widest uppercase block mb-1">M1TRG VIP ACCESS</span>
                <h2 class="font-display font-black text-2xl text-[#F8FAFC] uppercase tracking-tight">DAFTAR AKUN FANS</h2>
                <p class="text-xs text-[#8C96A3] mt-1 font-body">Isi formulir pendaftaran di bawah ini.</p>
            </div>

            @if($errors->any())
            <div class="p-4 mb-6 bg-[#E5484D]/10 border border-[#E5484D]/30 rounded-lg text-xs text-[#E5484D]">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-display font-bold text-[#F8FAFC] uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" required value="{{ old('name') }}"
                           class="m1-input" placeholder="Masukkan nama lengkap">
                </div>

                <div>
                    <label class="block text-xs font-display font-bold text-[#F8FAFC] uppercase tracking-wider mb-1.5">Alamat Email</label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                           class="m1-input font-mono" placeholder="nama@domain.com">
                </div>

                <div>
                    <label class="block text-xs font-display font-bold text-[#F8FAFC] uppercase tracking-wider mb-1.5">Kata Sandi</label>
                    <input type="password" name="password" required
                           class="m1-input font-mono" placeholder="Minimal 8 karakter">
                </div>

                <div>
                    <label class="block text-xs font-display font-bold text-[#F8FAFC] uppercase tracking-wider mb-1.5">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" required
                           class="m1-input font-mono" placeholder="Ketik ulang kata sandi">
                </div>

                <button type="submit" class="w-full btn-m1-primary py-3.5 mt-2 text-xs">
                    DAFTAR SEKARANG &rarr;
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-white/10 text-center text-xs text-[#8C96A3]">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="text-[#B8E637] font-bold hover:underline ml-1">Masuk Sekarang &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection
