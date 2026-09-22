@extends('layouts.rgr-premium')

@section('title', 'Fan Dashboard — Mobil 1 Team RG')
@section('meta_description', 'Dasbor eksklusif fans Mobil 1 Team RG — prediksi, leaderboard, pencapaian, dan profil anggota.')

@push('styles')
<style>
.achievement-card {
    background:#171B20; border:1px solid rgba(255,255,255,0.06); border-radius:12px;
    padding:1rem; text-align:center; transition:all 0.3s ease;
}
.achievement-card:hover {
    border-color:rgba(184,230,55,0.3);
    transform:translateY(-2px);
    box-shadow:0 10px 30px rgba(0,0,0,0.4);
}
.achievement-icon {
    width:44px; height:44px; border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    margin:0 auto 0.5rem;
    font-size:1.2rem;
}
.stat-card {
    background:#20252C; border:1px solid rgba(255,255,255,0.08); border-radius:12px;
    padding:1.25rem; text-align:center; transition:all 0.3s ease;
}
.stat-card:hover {
    border-color:rgba(184,230,55,0.2);
    transform:translateY(-2px);
}
.member-badge {
    width:64px; height:64px;
    display:flex; align-items:center; justify-content:center;
    font-family:'Albert Sans',sans-serif; font-weight:900;
    font-size:1.5rem; color:#F8FAFC; text-transform:uppercase;
    position:relative; flex-shrink:0;
}
.activity-feed { max-height:300px; overflow-y:auto; }
.activity-feed::-webkit-scrollbar { width:3px; }
.activity-feed::-webkit-scrollbar-thumb { background:#B8E637; border-radius:3px; }
</style>
@endpush

@section('content')
<div class="min-h-screen py-28" style="background:#111315;">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Alerts --}}
        @if(session('success'))
        <div class="mb-6 p-4 rounded-lg flex items-center gap-3 text-sm" style="background:rgba(56,193,114,0.08);border:1px solid rgba(56,193,114,0.2);color:#38C172;">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        @if($errors->any())
        <div class="mb-6 p-4 rounded-lg flex items-center gap-3 text-sm" style="background:rgba(229,72,77,0.08);border:1px solid rgba(229,72,77,0.2);color:#E5484D;">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ $errors->first() }}</span>
        </div>
        @endif

        {{-- Hero Member Section --}}
        <div class="m1-card p-8 mb-10 relative overflow-hidden">
            <div class="absolute inset-0 pointer-events-none" style="background:linear-gradient(135deg,rgba(184,230,55,0.04) 0%,transparent 50%);"></div>
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-5">
                    <div class="member-badge" style="background:{{ $user->avatar_color }};clip-path:polygon(50% 0%, 100% 28%, 100% 72%, 50% 100%, 0% 72%, 0% 28%);">
                        {{ substr($user->name, 0, 2) }}
                    </div>
                    <div>
                        <div class="flex items-center gap-3 mb-1">
                            <span class="section-eyebrow" style="font-size:0.65rem;">M1TRG MEMBER</span>
                            @php
                                $tier = $user->points >= 150 ? 'Titanium' : ($user->points >= 80 ? 'Gold Pass' : ($user->points >= 30 ? 'Silver Pass' : 'Bronze Pass'));
                                $tierClass = $user->points >= 150 ? 'm1-badge' : ($user->points >= 80 ? 'm1-badge-gold' : 'm1-badge-muted');
                            @endphp
                            <span class="{{ $tierClass }}" style="font-size:0.55rem;">{{ $tier }}</span>
                        </div>
                        <h1 class="display-title" style="font-size:clamp(1.5rem,3vw,2.2rem);">{{ $user->name }}</h1>
                        <p class="text-xs font-mono text-muted mt-1">ID: #M1-{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }} &middot; Bergabung: {{ $user->created_at->format('M Y') }}</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="stat-card min-w-[110px]">
                        <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider font-bold">Poin Fans</p>
                        <p class="font-display font-black text-2xl mt-1" style="color:#B8E637;">{{ $user->points }}</p>
                    </div>
                    <div class="stat-card min-w-[110px]">
                        <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider font-bold">Prediksi</p>
                        <p class="font-display font-black text-2xl mt-1 text-heading">{{ $predictions->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            <div class="stat-card">
                <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider font-bold">Peringkat</p>
                <p class="font-display font-black text-xl mt-1 text-heading">#{{ $user->rank ?? '-' }}</p>
            </div>
            <div class="stat-card">
                <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider font-bold">Akurasi</p>
                <p class="font-display font-black text-xl mt-1 text-heading">
                    @php
                        $total = $predictions->count();
                        $correct = $predictions->where('status', 'correct')->count();
                        $accuracy = $total > 0 ? round(($correct / $total) * 100) : 0;
                    @endphp
                    {{ $accuracy }}%
                </p>
            </div>
            <div class="stat-card">
                <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider font-bold">Benar</p>
                <p class="font-display font-black text-xl mt-1" style="color:#38C172;">{{ $correct }}</p>
            </div>
            <div class="stat-card">
                <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider font-bold">Streak</p>
                <p class="font-display font-black text-xl mt-1 text-heading">{{ $user->streak ?? 0 }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Left: Profile Settings & Achievements --}}
            <div class="lg:col-span-1 space-y-6">

                {{-- Profile Settings --}}
                <div class="m1-card p-6">
                    <h3 class="font-display font-bold text-lg text-heading mb-1">Kustomisasi Profil</h3>
                    <p class="text-xs text-muted mb-5">Ubah identitas paddock dan pilih pembalap favorit Anda.</p>

                    <form action="{{ route('fan.profile.update') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold block mb-1.5">Nama Tampilan</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" required class="m1-input text-sm">
                        </div>

                        <div>
                            <label for="avatar_color" class="text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold block mb-1.5">Warna Badge Profil</label>
                            <select name="avatar_color" id="avatar_color" required class="m1-select text-sm">
                                <option value="#B8E637" @selected($user->avatar_color == '#B8E637')>Laser Green (#B8E637)</option>
                                <option value="#00A3E0" @selected($user->avatar_color == '#00A3E0')>Cyan Racing (#00A3E0)</option>
                                <option value="#F4B63D" @selected($user->avatar_color == '#F4B63D')>Gold Secondary (#F4B63D)</option>
                                <option value="#111315" @selected($user->avatar_color == '#111315')>Carbon Black (#111315)</option>
                                <option value="#E5484D" @selected($user->avatar_color == '#E5484D')>Danger Red (#E5484D)</option>
                            </select>
                        </div>

                        <div>
                            <label for="favorite_driver_id" class="text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold block mb-1.5">Pembalap Favorit</label>
                            <select name="favorite_driver_id" id="favorite_driver_id" class="m1-select text-sm">
                                <option value="">-- Pilih Pembalap --</option>
                                @foreach($drivers as $d)
                                    <option value="{{ $d->id }}" @selected($user->favorite_driver_id == $d->id)>
                                        #{{ $d->permanent_number }} {{ $d->name }} ({{ $d->category }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn-m1-primary w-full justify-center text-xs">Simpan Perubahan</button>
                    </form>
                </div>

                {{-- Achievements --}}
                <div class="m1-card p-6">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="font-display font-bold text-lg text-heading">Pencapaian</h3>
                        <span class="m1-badge-muted text-[0.55rem]">{{ isset($achievements) ? $achievements->count() : 0 }} diraih</span>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        @forelse($achievements ?? [] as $ach)
                        <div class="achievement-card">
                            <div class="achievement-icon" style="background:rgba(184,230,55,0.1);">
                                {{ $ach->icon ?? '🏆' }}
                            </div>
                            <p class="text-[0.65rem] font-bold text-heading font-display">{{ $ach->name }}</p>
                            <p class="text-[0.55rem] text-muted mt-0.5">{{ $ach->description ?? '' }}</p>
                        </div>
                        @empty
                        <div class="col-span-2 text-center py-6">
                            <p class="text-2xl mb-2">🏁</p>
                            <p class="text-xs text-muted">Belum ada pencapaian. Ikuti prediksi dan aktif di komunitas untuk membuka badge!</p>
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>

            {{-- Right: Predictions, Leaderboard, Activity --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Predictions --}}
                <div class="m1-card p-6">
                    <h3 class="font-display font-bold text-lg text-heading mb-1">Liga Prediksi Paddock</h3>
                    <p class="text-xs text-muted mb-5">Tebak pembalap M1TRG yang akan memenangkan GP berikutnya. Tebakan benar = +50 Poin Fans!</p>

                    @if($upcomingRaces->count() > 0)
                        <form action="{{ route('fan.predict') }}" method="POST" class="p-5 rounded-lg mb-6" style="background:rgba(184,230,55,0.03);border:1px solid rgba(184,230,55,0.12);">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="race_schedule_id" class="text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold block mb-1.5">Pilih Balapan</label>
                                    <select name="race_schedule_id" id="race_schedule_id" required class="m1-select text-sm">
                                        @foreach($upcomingRaces as $race)
                                            <option value="{{ $race->id }}">
                                                {{ $race->grand_prix_name }} ({{ $race->race_date->format('d M Y') }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="driver_id" class="text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold block mb-1.5">Prediksi Pemenang</label>
                                    <select name="driver_id" id="driver_id" required class="m1-select text-sm">
                                        @foreach($drivers as $d)
                                            <option value="{{ $d->id }}">#{{ $d->permanent_number }} {{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn-m1-primary text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Kunci Prediksi Saya
                            </button>
                        </form>
                    @else
                        <div class="p-5 rounded-lg text-center text-xs text-muted mb-6" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);">
                            Tidak ada balapan mendatang yang tersedia untuk diprediksi saat ini.
                        </div>
                    @endif

                    {{-- Prediction History --}}
                    <h4 class="font-display font-bold text-sm text-heading mb-4">Riwayat Prediksi</h4>
                    @if($predictions->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left font-mono">
                                <thead>
                                    <tr style="border-bottom:1px solid rgba(255,255,255,0.06);" class="text-muted text-[0.6rem] uppercase tracking-wider">
                                        <th class="py-2.5 pr-4">Balapan</th>
                                        <th class="py-2.5 pr-4">Tanggal</th>
                                        <th class="py-2.5 pr-4">Prediksi</th>
                                        <th class="py-2.5 pr-4">Status</th>
                                        <th class="py-2.5 text-right">Poin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($predictions as $p)
                                        <tr style="border-bottom:1px solid rgba(255,255,255,0.04);" class="hover:bg-[rgba(255,255,255,0.02)]">
                                            <td class="py-3 pr-4 font-display font-bold text-heading">{{ $p->grand_prix_name }}</td>
                                            <td class="py-3 pr-4 text-muted">{{ \Carbon\Carbon::parse($p->race_date)->format('d-m-Y') }}</td>
                                            <td class="py-3 pr-4 text-heading font-bold">#{{ $p->permanent_number }} {{ $p->driver_name }}</td>
                                            <td class="py-3 pr-4">
                                                @if($p->status == 'correct')
                                                    <span class="m1-badge" style="background:rgba(56,193,114,0.12);color:#38C172;border-color:rgba(56,193,114,0.25);">BENAR</span>
                                                @elseif($p->status == 'incorrect')
                                                    <span class="m1-badge-danger">SALAH</span>
                                                @else
                                                    <span class="m1-badge-gold">PENDING</span>
                                                @endif
                                            </td>
                                            <td class="py-3 text-right font-bold text-heading">+{{ $p->points_awarded }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="py-8 text-center text-xs text-muted">
                            Anda belum memasukkan prediksi. Mulai tebak pemenang di atas!
                        </div>
                    @endif
                </div>

                {{-- Leaderboard --}}
                <div class="m1-card p-6">
                    <h3 class="font-display font-bold text-lg text-heading mb-1">Papan Peringkat Fans</h3>
                    <p class="text-xs text-muted mb-5">Para anggota dengan poin tertingdi di komunitas M1TRG.</p>
                    <div class="space-y-2">
                        @forelse($leaderboard ?? [] as $idx => $lb)
                        <div class="flex items-center justify-between p-3 rounded-lg transition-colors" style="background:{{ $lb->id == $user->id ? 'rgba(184,230,55,0.06)' : 'transparent' }};border:1px solid {{ $lb->id == $user->id ? 'rgba(184,230,55,0.15)' : 'transparent' }};">
                            <div class="flex items-center gap-3">
                                <span class="w-6 text-center font-display font-black text-sm" style="color:{{ $idx == 0 ? '#F4B63D' : ($idx == 1 ? '#8C96A3' : ($idx == 2 ? '#E5484D' : 'text-muted')) }};">{{ $idx + 1 }}</span>
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-[0.6rem] font-black font-display text-heading" style="background:{{ $lb->avatar_color ?? '#20252C' }};">
                                    {{ substr($lb->name, 0, 2) }}
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-heading font-display">{{ $lb->name }}</p>
                                    <p class="text-[0.6rem] text-muted font-mono">{{ $lb->points }} pts</p>
                                </div>
                            </div>
                            @if($idx == 0)
                            <span class="m1-badge-gold text-[0.5rem]" style="padding:0.15rem 0.5rem;">#1</span>
                            @elseif($idx == 1)
                            <span class="m1-badge-muted text-[0.5rem]" style="padding:0.15rem 0.5rem;">#2</span>
                            @elseif($idx == 2)
                            <span class="m1-badge-danger text-[0.5rem]" style="padding:0.15rem 0.5rem;">#3</span>
                            @endif
                        </div>
                        @empty
                        <div class="py-8 text-center text-xs text-muted">Belum ada data leaderboard.</div>
                        @endforelse
                    </div>
                </div>

                {{-- Recent Activity --}}
                <div class="m1-card p-6">
                    <h3 class="font-display font-bold text-lg text-heading mb-1">Aktivitas Terbaru</h3>
                    <p class="text-xs text-muted mb-5">Riwayat aktivitas terbaru Anda di komunitas M1TRG.</p>
                    <div class="activity-feed space-y-3">
                        @forelse($activities ?? [] as $act)
                        <div class="flex items-start gap-3 p-3 rounded-lg" style="background:rgba(255,255,255,0.02);">
                            <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs flex-shrink-0" style="background:rgba(184,230,55,0.1);">
                                {{ $act->icon ?? '•' }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-heading font-display font-bold">{{ $act->title }}</p>
                                <p class="text-[0.65rem] text-muted">{{ $act->description }}</p>
                                <p class="text-[0.55rem] text-muted font-mono mt-0.5">{{ $act->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="py-8 text-center text-xs text-muted">
                            Belum ada aktivitas terbaru. Mulai berinteraksi dengan fitur komunitas!
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
