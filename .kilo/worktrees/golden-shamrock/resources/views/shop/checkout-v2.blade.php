@extends('layouts.rgr-premium')

@section('title', 'Secure Checkout — Mobil 1 Team RG')
@section('meta_description', 'Proses checkout aman Mobil 1 Team RG. Dapatkan merchandise premium dan akses eksklusif dengan pembayaran terenkripsi.')

@push('styles')
<style>
.step-indicator { display:flex; align-items:center; gap:0; }
.step-item { display:flex; align-items:center; gap:0.5rem; position:relative; }
.step-circle { width:32px; height:32px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-family:'Albert Sans',sans-serif; font-weight:800; font-size:0.75rem; border:2px solid rgba(255,255,255,0.1); background:#171B20; color:#8C96A3; transition:all 0.3s ease; flex-shrink:0; }
.step-circle.active { border-color:#B8E637; background:#B8E637; color:#111315; }
.step-circle.completed { border-color:#38C172; background:#38C172; color:#fff; }
.step-connector { height:2px; flex:1; min-width:40px; margin:0 8px; background:rgba(255,255,255,0.08); }
.step-connector.active { background:#B8E637; }
.step-connector.completed { background:#38C172; }
.step-label { font-family:'Albert Sans',sans-serif; font-size:0.62rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#8C96A3; }
.step-label.active { color:#F8FAFC; }
.step-label.completed { color:#38C172; }
.summary-scroll::-webkit-scrollbar { width:3px; }
.summary-scroll::-webkit-scrollbar-thumb { background:#B8E637; border-radius:3px; }
.courier-card { background:#171B20; border:2px solid rgba(255,255,255,0.06); border-radius:12px; padding:1rem; cursor:pointer; transition:all 0.25s ease; }
.courier-card:hover { border-color:rgba(184,230,55,0.3); background:#20252C; }
.courier-card.selected { border-color:#B8E637; background:rgba(184,230,55,0.06); box-shadow:0 0 20px rgba(184,230,55,0.1); }
</style>
@endpush

@section('content')
<div class="min-h-screen py-28" style="background:#111315;" x-data="checkoutV2System()" x-init="initCheckout()">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="mb-10">
            <span class="section-eyebrow">M1TRG SECURE CHECKOUT</span>
            <h1 class="section-title-std mt-3">Proses Pembayaran</h1>
            <p class="section-subtitle mt-1">Lengkapi data Anda untuk menyelesaikan pesanan</p>
        </div>

        {{-- Progress Steps --}}
        <div class="mb-10">
            <div class="step-indicator">
                <template x-for="(step, idx) in steps" :key="idx">
                    <div class="step-item flex-1">
                        <div class="flex items-center gap-2">
                            <div :class="'step-circle ' + (step.status === 'completed' ? 'completed' : step.status === 'active' ? 'active' : '')" x-text="idx + 1"></div>
                            <span :class="'step-label ' + (step.status === 'completed' ? 'completed' : step.status === 'active' ? 'active' : '')" x-text="step.label"></span>
                        </div>
                        <div x-show="idx < steps.length - 1" :class="'step-connector ' + (step.status === 'completed' ? 'completed' : '')"></div>
                    </div>
                </template>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            {{-- Left: Form Sections --}}
            <div class="lg:col-span-7 space-y-6">

                {{-- Step 1: Shipping Information --}}
                <div class="m1-card-elevated p-8" x-data="{ open: true }">
                    <div class="flex items-center justify-between cursor-pointer" @click="open = !open">
                        <div class="flex items-center gap-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full text-xs font-black font-display" style="background:rgba(184,230,55,0.12);color:#B8E637;border:1px solid rgba(184,230,55,0.25);">1</span>
                            <h2 class="font-display font-bold text-lg text-heading">Informasi Pengiriman</h2>
                        </div>
                        <svg class="w-5 h-5 text-muted transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div x-show="open" class="mt-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold mb-1.5 block">Nama Penerima</label>
                                <input type="text" x-model="customerName" required class="m1-input text-sm" placeholder="Nama lengkap">
                            </div>
                            <div>
                                <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold mb-1.5 block">Nomor Telepon / WhatsApp</label>
                                <input type="text" x-model="customerPhone" required class="m1-input text-sm font-mono" placeholder="08xxxxxxxxxx">
                            </div>
                        </div>
                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold mb-1.5 block">Alamat Email</label>
                            <input type="email" x-model="customerEmail" required class="m1-input text-sm font-mono" placeholder="email@domain.com">
                        </div>
                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold mb-1.5 block">Alamat Lengkap Pengiriman</label>
                            <textarea x-model="shippingAddress" required rows="2" class="m1-textarea text-sm" placeholder="Nama jalan, nomor rumah, kelurahan, kecamatan, kota, kode pos..."></textarea>
                        </div>
                    </div>
                </div>

                {{-- Step 2: Courier Selection --}}
                <div class="m1-card-elevated p-8" x-data="{ open: true }">
                    <div class="flex items-center justify-between cursor-pointer" @click="open = !open">
                        <div class="flex items-center gap-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full text-xs font-black font-display" style="background:rgba(184,230,55,0.12);color:#B8E637;border:1px solid rgba(184,230,55,0.25);">2</span>
                            <h2 class="font-display font-bold text-lg text-heading">Ekspedisi Balap</h2>
                        </div>
                        <svg class="w-5 h-5 text-muted transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div x-show="open" class="mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="courier-card" :class="shippingCourier === 'JNE' ? 'selected' : ''">
                                <input type="radio" name="courier" value="JNE" x-model="shippingCourier" @change="updateShippingCost()" class="sr-only">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-bold text-heading uppercase tracking-wider">JNE Logistics</span>
                                    <div class="w-4 h-4 rounded-full border-2 flex items-center justify-center" :class="shippingCourier === 'JNE' ? 'border-primary' : 'border-[rgba(255,255,255,0.15)]'">
                                        <div x-show="shippingCourier === 'JNE'" class="w-2 h-2 rounded-full bg-primary"></div>
                                    </div>
                                </div>
                                <p class="text-[0.65rem] text-muted font-body">Pengiriman Reguler (3-5 Hari)</p>
                                <p class="font-mono text-sm font-bold mt-3" style="color:#B8E637;">Rp 15.000</p>
                            </label>
                            <label class="courier-card" :class="shippingCourier === 'DHL' ? 'selected' : ''">
                                <input type="radio" name="courier" value="DHL" x-model="shippingCourier" @change="updateShippingCost()" class="sr-only">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-bold text-heading uppercase tracking-wider">DHL Express Air</span>
                                    <div class="w-4 h-4 rounded-full border-2 flex items-center justify-center" :class="shippingCourier === 'DHL' ? 'border-primary' : 'border-[rgba(255,255,255,0.15)]'">
                                        <div x-show="shippingCourier === 'DHL'" class="w-2 h-2 rounded-full bg-primary"></div>
                                    </div>
                                </div>
                                <p class="text-[0.65rem] text-muted font-body">Pengiriman Udara (1-2 Hari)</p>
                                <p class="font-mono text-sm font-bold mt-3" style="color:#B8E637;">Rp 95.000</p>
                            </label>
                            <label class="courier-card" :class="shippingCourier === 'FedEx' ? 'selected' : ''">
                                <input type="radio" name="courier" value="FedEx" x-model="shippingCourier" @change="updateShippingCost()" class="sr-only">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-bold text-heading uppercase tracking-wider">FedEx Priority</span>
                                    <div class="w-4 h-4 rounded-full border-2 flex items-center justify-center" :class="shippingCourier === 'FedEx' ? 'border-primary' : 'border-[rgba(255,255,255,0.15)]'">
                                        <div x-show="shippingCourier === 'FedEx'" class="w-2 h-2 rounded-full bg-primary"></div>
                                    </div>
                                </div>
                                <p class="text-[0.65rem] text-muted font-body">Kurir Prioritas Sirkuit (Instant)</p>
                                <p class="font-mono text-sm font-bold mt-3" style="color:#B8E637;">Rp 120.000</p>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Step 3: Coupon / Promo --}}
                <div class="m1-card-elevated p-8" x-data="{ open: true }">
                    <div class="flex items-center justify-between cursor-pointer" @click="open = !open">
                        <div class="flex items-center gap-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full text-xs font-black font-display" style="background:rgba(184,230,55,0.12);color:#B8E637;border:1px solid rgba(184,230,55,0.25);">3</span>
                            <h2 class="font-display font-bold text-lg text-heading">Kode Promo</h2>
                        </div>
                        <svg class="w-5 h-5 text-muted transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div x-show="open" class="mt-6">
                        <p class="text-xs text-muted mb-4">Masukkan kode promo untuk mendapatkan potongan harga khusus.</p>
                        <div class="flex gap-3">
                            <input type="text" x-model="promoInput" class="m1-input text-sm flex-1" placeholder="Masukkan kode promo">
                            <button @click="applyPromo()" type="button" class="btn-m1-secondary text-xs px-6">Gunakan</button>
                        </div>
                        <div class="mt-3 flex items-center gap-2">
                            <template x-if="appliedDiscount > 0">
                                <span class="m1-badge">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                                    <span x-text="appliedPromoName + ' (' + (appliedDiscount*100) + '% OFF)'"></span>
                                </span>
                            </template>
                            <span x-show="promoError" class="text-xs font-bold" style="color:#E5484D;" x-text="promoError"></span>
                        </div>
                    </div>
                </div>

                {{-- Step 4: Payment --}}
                <div class="m1-card-elevated p-8" x-data="{ open: true }">
                    <div class="flex items-center justify-between cursor-pointer" @click="open = !open">
                        <div class="flex items-center gap-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full text-xs font-black font-display" style="background:rgba(184,230,55,0.12);color:#B8E637;border:1px solid rgba(184,230,55,0.25);">4</span>
                            <h2 class="font-display font-bold text-lg text-heading">Pembayaran</h2>
                        </div>
                        <svg class="w-5 h-5 text-muted transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div x-show="open" class="mt-6">
                        <div class="p-5 rounded-lg mb-6" style="background:rgba(184,230,55,0.04);border:1px solid rgba(184,230,55,0.12);">
                            <div class="flex items-center gap-3 mb-3">
                                <svg class="w-5 h-5 flex-shrink-0" style="color:#B8E637;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                <span class="text-sm font-bold text-heading font-display uppercase tracking-wider">Transaksi Aman dengan Midtrans Snap</span>
                            </div>
                            <p class="text-xs text-muted leading-relaxed">
                                Pembayaran Anda akan diproses secara aman menggunakan teknologi enkripsi Midtrans Snap. Pilih metode pembayaran: Kartu Kredit, Virtual Account (BCA, Mandiri, BNI, BRI), QRIS/Gopay, atau Alfamart/Indomaret.
                            </p>
                        </div>

                        <button type="submit" class="btn-m1-primary w-full justify-center text-sm py-4" :disabled="loading" @click="submitOrder()">
                            <span x-show="!loading">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                Bayar Sekarang & Selesaikan Order
                            </span>
                            <span x-show="loading">
                                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                Memproses Pembayaran...
                            </span>
                        </button>
                    </div>
                </div>

            </div>

            {{-- Right: Sticky Order Summary --}}
            <div class="lg:col-span-5 lg:sticky lg:top-28">
                <div class="m1-card-elevated p-6">
                    <div class="flex items-center justify-between mb-5" style="border-bottom:1px solid rgba(255,255,255,0.06);padding-bottom:1rem;">
                        <h3 class="font-display font-bold text-lg text-heading">Ringkasan Pesanan</h3>
                        <span class="m1-badge text-[0.55rem]" x-text="cart.length + ' item'"></span>
                    </div>

                    {{-- Cart Items --}}
                    <div class="divide-y divide-[rgba(255,255,255,0.06)] max-h-[260px] overflow-y-auto mb-5 pr-1 summary-scroll">
                        <template x-for="item in cart" :key="item.id + (item.customInfo || '')">
                            <div class="py-3 flex justify-between items-start gap-3 text-xs">
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-heading truncate font-display" x-text="item.name"></p>
                                    <p class="text-[0.6rem] text-muted font-mono" x-show="item.customInfo" x-text="item.customInfo"></p>
                                    <p class="text-muted font-mono mt-0.5" x-text="'Rp ' + formatPrice(item.price) + ' x ' + item.qty"></p>
                                </div>
                                <span class="font-mono font-bold text-heading flex-shrink-0" x-text="'Rp ' + formatPrice(item.price * item.qty)"></span>
                            </div>
                        </template>
                    </div>

                    {{-- Coupon --}}
                    <div class="mb-5" style="border-top:1px solid rgba(255,255,255,0.06);padding-top:1rem;">
                        <label class="text-[0.58rem] font-ui text-muted uppercase tracking-wider font-bold block mb-1.5">Kode Promo</label>
                        <div class="flex gap-2">
                            <input type="text" x-model="promoInput" class="m1-input text-xs py-2" placeholder="Masukkan kode">
                            <button @click="applyPromo()" type="button" class="btn-m1-secondary text-xs py-2 px-4">Pakai</button>
                        </div>
                        <p class="text-[0.6rem] mt-1 font-bold" style="color:#38C172;" x-show="appliedDiscount > 0" x-text="'Kupon ' + appliedPromoName + ' aktif (-' + (appliedDiscount*100) + '%)'"></p>
                    </div>

                    {{-- Totals --}}
                    <div class="space-y-2.5 text-sm" style="border-top:1px solid rgba(255,255,255,0.06);padding-top:1rem;">
                        <div class="flex justify-between font-mono text-muted">
                            <span>Subtotal</span>
                            <span x-text="'Rp ' + formatPrice(getSubtotal())"></span>
                        </div>
                        <div class="flex justify-between font-mono" style="color:#38C172;" x-show="appliedDiscount > 0">
                            <span>Diskon Promo</span>
                            <span x-text="'-Rp ' + formatPrice(getDiscountAmount())"></span>
                        </div>
                        <div class="flex justify-between font-mono text-muted">
                            <span>Ongkos Kirim</span>
                            <span x-text="'Rp ' + formatPrice(shippingCost)"></span>
                        </div>
                        <div class="flex justify-between font-mono font-bold text-heading pt-3 text-base" style="border-top:1px dashed rgba(255,255,255,0.06);">
                            <span>Total Pembayaran</span>
                            <span style="color:#B8E637;" x-text="'Rp ' + formatPrice(getTotal())"></span>
                        </div>
                    </div>

                    {{-- Payment Methods Icons --}}
                    <div class="mt-6 pt-4" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <p class="text-[0.55rem] text-muted font-ui uppercase tracking-wider text-center font-bold">Didukung oleh</p>
                        <div class="flex justify-center gap-3 mt-2">
                            <span class="text-[0.55rem] font-mono text-muted uppercase tracking-widest" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:4px;padding:0.25rem 0.5rem;">Visa</span>
                            <span class="text-[0.55rem] font-mono text-muted uppercase tracking-widest" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:4px;padding:0.25rem 0.5rem;">MC</span>
                            <span class="text-[0.55rem] font-mono text-muted uppercase tracking-widest" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:4px;padding:0.25rem 0.5rem;">BCA</span>
                            <span class="text-[0.55rem] font-mono text-muted uppercase tracking-widest" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:4px;padding:0.25rem 0.5rem;">QRIS</span>
                            <span class="text-[0.55rem] font-mono text-muted uppercase tracking-widest" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:4px;padding:0.25rem 0.5rem;">GoPay</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
function checkoutV2System() {
    return {
        steps: [
            { label: 'Pengiriman', status: 'active' },
            { label: 'Kurir', status: '' },
            { label: 'Promo', status: '' },
            { label: 'Pembayaran', status: '' }
        ],
        cart: [],
        customerName: "{{ Auth::check() ? Auth::user()->name : '' }}",
        customerEmail: "{{ Auth::check() ? Auth::user()->email : '' }}",
        customerPhone: '',
        shippingAddress: '',
        shippingCourier: 'JNE',
        shippingCost: 15000,
        paymentMethod: 'Simulasi Visa/CC',

        // Promos
        promoInput: '',
        appliedDiscount: 0,
        appliedPromoName: '',
        promoError: '',

        loading: false,

        initCheckout() {
            const raw = localStorage.getItem('rgr_cart');
            if (raw) {
                try { this.cart = JSON.parse(raw); } catch(e) { this.cart = []; }
            }
            if (this.cart.length === 0) {
                alert('Keranjang belanja Anda kosong, silakan pilih produk terlebih dahulu.');
                window.location.href = "{{ route('shop') }}";
            }
        },

        updateShippingCost() {
            if (this.shippingCourier === 'JNE') this.shippingCost = 15000;
            else if (this.shippingCourier === 'DHL') this.shippingCost = 95000;
            else if (this.shippingCourier === 'FedEx') this.shippingCost = 120000;
        },

        applyPromo() {
            this.promoError = '';
            let code = this.promoInput.trim().toUpperCase();
            if (code === 'RGR2026') {
                this.appliedDiscount = 0.20;
                this.appliedPromoName = 'RGR2026';
            } else if (code === 'INDOPRIDE') {
                this.appliedDiscount = 0.15;
                this.appliedPromoName = 'INDOPRIDE';
            } else if (code === 'LASER10') {
                this.appliedDiscount = 0.10;
                this.appliedPromoName = 'LASER10';
            } else {
                this.promoError = 'Kode kupon promo tidak valid!';
                this.appliedDiscount = 0;
                this.appliedPromoName = '';
            }
        },

        getSubtotal() {
            return this.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        },

        getDiscountAmount() {
            return this.getSubtotal() * this.appliedDiscount;
        },

        getTotal() {
            return this.getSubtotal() - this.getDiscountAmount() + this.shippingCost;
        },

        formatPrice(val) {
            return new Intl.NumberFormat('id-ID').format(val);
        },

        submitOrder() {
            this.loading = true;

            let csrfElement = document.querySelector('meta[name="csrf-token"]');
            let csrfToken = csrfElement ? csrfElement.getAttribute('content') : '';

            let formData = new FormData();
            formData.append('customer_name', this.customerName);
            formData.append('customer_email', this.customerEmail);
            formData.append('customer_phone', this.customerPhone);
            formData.append('shipping_address', this.shippingAddress);
            formData.append('shipping_courier', this.shippingCourier);
            formData.append('shipping_cost', this.shippingCost);
            formData.append('payment_method', 'Midtrans Gateway');
            formData.append('promo_code', this.appliedPromoName);
            formData.append('subtotal', this.getSubtotal());
            formData.append('discount', this.getDiscountAmount());
            formData.append('total', this.getTotal());
            formData.append('cart_items', JSON.stringify(this.cart));

            fetch('{{ route("checkout.place") }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                this.loading = false;
                if (data.success && data.snap_token) {
                    window.snap.pay(data.snap_token, {
                        onSuccess: (result) => {
                            localStorage.removeItem('rgr_cart');
                            window.dispatchEvent(new CustomEvent('storage'));
                            window.location.href = data.redirect_url;
                        },
                        onPending: (result) => {
                            localStorage.removeItem('rgr_cart');
                            window.dispatchEvent(new CustomEvent('storage'));
                            window.location.href = data.redirect_url;
                        },
                        onError: (result) => {
                            alert('Pembayaran gagal dilakukan. Silakan coba kembali.');
                        },
                        onClose: () => {
                            window.location.href = data.redirect_url;
                        }
                    });
                } else {
                    alert(data.message || 'Gagal memproses pesanan.');
                }
            })
            .catch(err => {
                this.loading = false;
                console.error(err);
                alert('Terjadi kesalahan koneksi.');
            });
        }
    }
}
</script>
@endsection
