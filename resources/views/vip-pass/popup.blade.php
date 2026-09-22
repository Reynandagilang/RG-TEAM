@extends('layouts.rgr-premium')

@section('title', 'VIP Pass Popup')
@section('content')
<div class="p-6 bg-[#111315] text-[#F8FAFC]">
    <h2 class="text-xl font-bold mb-4">VIP Pass</h2>
    @include('vip-pass.show')
</div>
@endsection

