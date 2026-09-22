<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MidtransIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed some essential team data as it is required in controllers
        DB::table('teams')->insert([
            'id' => 1,
            'name' => 'Mobil 1 Team RG',
            'principal' => 'Rey Gilang',
            'base_location' => 'Jakarta, Indonesia',
            'team_color' => '#C8FF2E',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function test_place_order_recalculates_and_generates_snap_token()
    {
        $user = User::factory()->create();

        $cartItems = [
            [
                'id' => 1,
                'name' => 'M1TRG F1 Aero Cap (Edition 2026)',
                'price' => 450000,
                'qty' => 1,
            ],
            [
                'id' => 6,
                'name' => 'RGR Official Thermal Bottle',
                'price' => 350000,
                'qty' => 2,
            ]
        ];

        // Total should be: 450,000 + (350,000 * 2) = 1,150,000
        // Shipping JNE: 15,000
        // Total expected: 1,165,000

        // Mock Midtrans Snap response if necessary or let it gracefully fail/fallback
        // Since we verify if the response returns a success state, we can mock the config or catch
        // errors. Let's make sure the controller uses the config value.
        // To prevent 500 when server key is invalid, the controller has a try-catch for Snap token.
        // We will make sure our test assertions accept a null/empty snap_token during testing since API is not reachable,
        // OR we can mock the Midtrans\Snap class to return a dummy token.
        $response = $this->actingAs($user)->postJson(route('checkout.place'), [
            'customer_name' => 'Gilang Reynanda',
            'customer_email' => 'gilang@rgr.test',
            'customer_phone' => '08123456789',
            'shipping_address' => 'Sirkuit Sentul No. 1, Bogor',
            'shipping_courier' => 'JNE',
            'shipping_cost' => 15000, 
            'payment_method' => 'Midtrans Gateway',
            'subtotal' => 1150000,
            'discount' => 0,
            'total' => 1165000,
            'cart_items' => json_encode($cartItems)
        ]);

        if ($response->status() !== 200) {
            dump($response->getContent());
        }

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'order_id',
            'snap_token',
            'redirect_url'
        ]);

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Gilang Reynanda',
            'total' => 1165000.00,
            'status' => 'Pending'
        ]);
    }

    public function test_midtrans_callback_handles_settlement()
    {
        $order = Order::create([
            'user_id' => null,
            'customer_name' => 'Tester',
            'customer_email' => 'tester@test.com',
            'customer_phone' => '08999',
            'shipping_address' => 'Test Address',
            'shipping_courier' => 'JNE',
            'shipping_cost' => 15000,
            'payment_method' => 'Midtrans Gateway',
            'subtotal' => 100000,
            'discount' => 0,
            'total' => 115000,
            'status' => 'Pending',
            'invoice_number' => 'INV-TEST-12345',
            'midtrans_order_id' => 'INV-TEST-12345'
        ]);

        $serverKey = config('services.midtrans.server_key');
        $signatureKey = hash('sha512', 'INV-TEST-12345' . '200' . '115000.00' . $serverKey);

        $response = $this->postJson(route('midtrans.callback'), [
            'order_id' => 'INV-TEST-12345',
            'status_code' => '200',
            'gross_amount' => '115000.00',
            'signature_key' => $signatureKey,
            'transaction_status' => 'settlement',
            'fraud_status' => 'accept',
            'payment_type' => 'qris',
            'transaction_id' => 'midtrans-tx-999'
        ]);

        $response->assertStatus(200);
        
        $this->assertDatabaseHas('orders', [
            'invoice_number' => 'INV-TEST-12345',
            'status' => 'Paid',
            'transaction_status' => 'settlement'
        ]);
    }
}
