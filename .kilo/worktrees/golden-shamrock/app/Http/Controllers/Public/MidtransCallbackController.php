<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Get raw request body or payload
        $payload = $request->getContent();
        $notification = json_decode($payload, true);

        if (!$notification) {
            Log::error('Midtrans Callback: Empty or invalid JSON payload.');
            return response()->json(['message' => 'Invalid payload'], 400);
        }

        // 2. Validate Signature Key to ensure the request is officially from Midtrans
        $orderId = $notification['order_id'] ?? null;
        $statusCode = $notification['status_code'] ?? null;
        $grossAmount = $notification['gross_amount'] ?? null;
        $serverKey = config('services.midtrans.server_key');
        $signatureKey = $notification['signature_key'] ?? null;

        $localSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        if ($localSignature !== $signatureKey) {
            Log::warning("Midtrans Callback: Signature mismatch for order ID: {$orderId}. Request signature: {$signatureKey}, Expected: {$localSignature}");
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        // 3. Verify order existence in DB
        // Extract invoice number from order_id (Midtrans order ID has suffix sometimes like -INV-...)
        // Let's search by invoice_number or midtrans_order_id
        $order = Order::where('invoice_number', $orderId)
            ->orWhere('midtrans_order_id', $orderId)
            ->first();

        if (!$order) {
            Log::error("Midtrans Callback: Order not found in database for ID: {$orderId}");
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Validate gross amount to prevent amount tampering
        if (doubleval($order->total) != doubleval($grossAmount)) {
            Log::error("Midtrans Callback: Gross amount mismatch for order {$order->id}. Order total: {$order->total}, Callback gross amount: {$grossAmount}");
            return response()->json(['message' => 'Gross amount mismatch'], 400);
        }

        // 4. Determine new transaction & order status based on Midtrans status
        $transactionStatus = $notification['transaction_status'] ?? 'pending';
        $fraudStatus = $notification['fraud_status'] ?? null;
        $paymentType = $notification['payment_type'] ?? null;
        $transactionId = $notification['transaction_id'] ?? null;

        $newOrderStatus = 'Pending';
        $newTransactionStatus = $transactionStatus;

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                $newOrderStatus = 'Pending';
            } else if ($fraudStatus == 'accept') {
                $newOrderStatus = 'Paid';
            }
        } else if ($transactionStatus == 'settlement') {
            $newOrderStatus = 'Paid';
        } else if ($transactionStatus == 'pending') {
            $newOrderStatus = 'Pending';
        } else if ($transactionStatus == 'deny') {
            $newOrderStatus = 'Failed';
        } else if ($transactionStatus == 'expire') {
            $newOrderStatus = 'Expired';
        } else if ($transactionStatus == 'cancel') {
            $newOrderStatus = 'Cancelled';
        } else if ($transactionStatus == 'refund') {
            $newOrderStatus = 'Refunded';
        }

        // 5. Update Order status in database
        $updateData = [
            'transaction_status' => $newTransactionStatus,
            'fraud_status' => $fraudStatus,
            'payment_method' => $paymentType ?? $order->payment_method,
            'transaction_id' => $transactionId ?? $order->transaction_id,
            'status' => $newOrderStatus
        ];

        if ($newOrderStatus == 'Paid') {
            $updateData['paid_at'] = now();
        } else if ($newOrderStatus == 'Expired') {
            $updateData['expired_at'] = now();
        }

        $order->update($updateData);

        Log::info("Midtrans Callback: Successfully processed order ID: {$orderId}. Status updated to: {$newOrderStatus}");

        return response()->json(['message' => 'Callback processed successfully']);
    }
}
