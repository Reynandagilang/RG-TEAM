@extends('layouts.rgr-premium')

@section('title', 'Pesanan Sukses — Mobil 1 Team RG Fan Shop')
@section('meta_description', 'Detail invoice pesanan merchandise resmi Mobil 1 Team RG.')

@push('styles')
<style>
.barcode-sim {
    background-image: repeating-linear-gradient(90deg, #8C96A3, #8C96A3 2px, transparent 2px, transparent 6px);
    height: 40px; width: 100%; max-width: 300px; margin: 0 auto;
}
.success-check {
    width: 72px; height: 72px; border-radius: 50%;
    background: rgba(56,193,114,0.12);
    border: 2px solid rgba(56,193,114,0.3);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 1.5rem;
}
.success-check svg {
    width: 36px; height: 36px;
    stroke: #38C172;
}
</style>
@endpush

@section('content')
<div class="min-h-screen pt-32 pb-20" style="background:#111315;">
    <div class="max-w-3xl mx-auto px-6">

        {{-- Success Header --}}
        <div class="text-center mb-10">
            <div class="success-check">
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
            </div>
            <span class="section-eyebrow justify-center mb-3">ORDER CONFIRMED</span>
            <h1 class="section-title-std text-center">Terima Kasih Atas Pesanan Anda!</h1>
            <p class="section-subtitle mt-2 max-w-md mx-auto text-center">Pesanan Anda telah berhasil disimpan secara persisten di database tim Mobil 1 Team RG.</p>
        </div>

        {{-- Invoice Card --}}
        <div class="m1-card-elevated p-8 space-y-6">

            {{-- Header: Invoice Number & Date --}}
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4" style="border-bottom:1px solid rgba(255,255,255,0.06);padding-bottom:1.5rem;">
                <div>
                    <p class="text-[0.6rem] font-ui text-muted uppercase tracking-wider font-bold">NOMOR INVOICE</p>
                    <p class="font-mono text-base font-bold text-heading mt-1">{{ $order->invoice_number }}</p>
                </div>
                <div class="text-left md:text-right">
                    <p class="text-[0.6rem] font-ui text-muted uppercase tracking-wider font-bold">TANGGAL PEMBELIAN</p>
                    <p class="text-xs font-mono text-heading mt-1">{{ $order->created_at->format('d M Y - H:i') }} WIB</p>
                </div>
            </div>

            {{-- Customer & Shipping Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" style="border-bottom:1px solid rgba(255,255,255,0.06);padding-bottom:1.5rem;">
                <div>
                    <h4 class="font-display font-bold text-xs text-heading uppercase tracking-wider mb-3">Detail Pelanggan</h4>
                    <div class="space-y-1.5 font-mono text-xs text-muted">
                        <p><span class="text-muted">Nama:</span> <span class="text-heading font-bold">{{ $order->customer_name }}</span></p>
                        <p><span class="text-muted">Email:</span> <span class="text-heading font-bold">{{ $order->customer_email }}</span></p>
                        <p><span class="text-muted">HP:</span> <span class="text-heading font-bold">{{ $order->customer_phone }}</span></p>
                    </div>
                </div>
                <div>
                    <h4 class="font-display font-bold text-xs text-heading uppercase tracking-wider mb-3">Pengiriman & Pembayaran</h4>
                    <div class="space-y-1.5 font-mono text-xs text-muted">
                        <p><span class="text-muted">Kurir:</span> <span class="text-heading font-bold">{{ $order->shipping_courier }}</span></p>
                        <p><span class="text-muted">Metode:</span> <span class="text-heading font-bold">{{ $order->payment_method }}</span></p>
                        <p><span class="text-muted">Alamat:</span> <span class="text-heading font-bold leading-normal">{{ $order->shipping_address }}</span></p>
                    </div>
                </div>
            </div>

            {{-- Items Ordered --}}
            <div>
                <h4 class="font-display font-bold text-xs text-heading uppercase tracking-wider mb-4">Daftar Merchandise</h4>
                <div class="divide-y divide-[rgba(255,255,255,0.06)]" style="border-top:1px solid rgba(255,255,255,0.06);border-bottom:1px solid rgba(255,255,255,0.06);">
                    @foreach($order->items as $item)
                    <div class="py-3 flex justify-between items-center text-xs font-mono">
                        <div>
                            <p class="font-bold text-heading">{{ $item->product_name }}</p>
                            @if($item->custom_info)
                            <p class="text-[0.6rem] text-muted mt-0.5">{{ $item->custom_info }}</p>
                            @endif
                            <p class="text-muted mt-1">Rp {{ number_format($item->price, 0, ',', '.') }} x {{ $item->qty }}</p>
                        </div>
                        <span class="font-bold text-heading">Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Total Summary --}}
            <div class="space-y-2 text-sm font-mono" style="border-bottom:1px solid rgba(255,255,255,0.06);padding-bottom:1.5rem;">
                <div class="flex justify-between text-muted">
                    <span>Subtotal:</span>
                    <span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                </div>
                @if($order->discount > 0)
                <div class="flex justify-between" style="color:#38C172;">
                    <span>Potongan ({{ $order->promo_code }}):</span>
                    <span>-Rp {{ number_format($order->discount, 0, ',', '.') }}</span>
                </div>
                @endif
                <div class="flex justify-between text-muted">
                    <span>Biaya Pengiriman:</span>
                    <span>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between font-bold text-heading pt-3 text-base" style="border-top:1px dashed rgba(255,255,255,0.06);">
                    <span>TOTAL PEMBAYARAN:</span>
                    <span style="color:#B8E637;">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                    <span class="text-xs text-muted">STATUS PEMBAYARAN:</span>
                    @if($order->status == 'Paid')
                        <span class="m1-badge" style="background:rgba(56,193,114,0.12);color:#38C172;border-color:rgba(56,193,114,0.25);">Lunas / Settlement</span>
                    @elseif($order->status == 'Pending')
                        <span class="m1-badge-gold">Menunggu Pembayaran</span>
                    @elseif($order->status == 'Expired')
                        <span class="m1-badge-danger">Kedaluwarsa</span>
                    @elseif($order->status == 'Cancelled')
                        <span class="m1-badge-muted">Dibatalkan</span>
                    @else
                        <span class="m1-badge-muted">{{ $order->status }}</span>
                    @endif
                </div>
            </div>

            {{-- Midtrans Snap pay button if pending --}}
            @if($order->status == 'Pending' && $order->snap_token)
            <div class="p-6 rounded-lg text-center space-y-4" style="background:rgba(244,182,61,0.05);border:1px solid rgba(244,182,61,0.2);">
                <p class="text-sm text-heading font-body">Pembayaran Anda belum diselesaikan. Klik tombol di bawah untuk melanjutkan pembayaran.</p>
                <button type="button" onclick="payNow()" class="btn-m1-secondary text-xs px-8 py-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Bayar Sekarang via Midtrans
                </button>
            </div>
            <script>
                function payNow() {
                    window.snap.pay('{{ $order->snap_token }}', {
                        onSuccess: function(result) { window.location.reload(); },
                        onPending: function(result) { window.location.reload(); },
                        onError: function(result) { alert('Pembayaran gagal dilakukan. Silakan coba kembali.'); }
                    });
                }
            </script>
            @endif

            {{-- Barcode & Return Button --}}
            <div class="text-center pt-4 space-y-4">
                <div class="barcode-sim opacity-40"></div>
                <p class="text-[0.6rem] font-mono text-muted tracking-widest">{{ strtoupper($order->invoice_number) }}</p>
                <div class="pt-4 flex justify-center gap-3">
                    <a href="{{ route('shop') }}" class="btn-m1-ghost text-xs">Kembali ke Toko</a>
                    @if($order->status == 'Paid')
                        <span class="btn-m1-primary text-xs cursor-default" style="background:#38C172;border-color:#38C172;color:#fff;box-shadow:none;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                            LUNAS
                        </span>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
