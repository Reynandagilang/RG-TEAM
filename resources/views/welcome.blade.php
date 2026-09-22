@extends('layouts.rgr-premium')

@section('title', 'Mobil 1 Team RG | Official Motorsport')
@section('meta_description', 'Official website of Mobil 1 Team RG, a professional motorsport team competing in F1, WEC, IMSA, and more.')

@section('content')
<div class="min-h-screen d-flex flex-column align-items-center justify-content-center text-center" style="background:#111315;">
    <div class="mb-4">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width:80px;height:80px;background:#20252C;border:1px solid rgba(184,230,55,0.2);">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#B8E637" stroke-width="1.5">
                <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
        </div>
    </div>
    <h1 class="display-title mb-3" style="font-size:clamp(1.8rem,4vw,3rem);">Mobil 1 Team RG</h1>
    <p class="section-subtitle mb-4">Redirecting to main page...</p>
    <div class="d-flex gap-1">
        <div style="width:8px;height:8px;border-radius:50%;background:#B8E637;animation:bounce 1.4s ease-in-out infinite;"></div>
        <div style="width:8px;height:8px;border-radius:50%;background:#B8E637;animation:bounce 1.4s ease-in-out infinite 0.2s;"></div>
        <div style="width:8px;height:8px;border-radius:50%;background:#B8E637;animation:bounce 1.4s ease-in-out infinite 0.4s;"></div>
    </div>
    <script>window.location.replace('/');</script>
    <meta http-equiv="refresh" content="0;url=/">
</div>
<style>
@keyframes bounce { 0%,80%,100% { transform:scale(0.6); opacity:0.4; } 40% { transform:scale(1); opacity:1; } }
</style>
@endsection