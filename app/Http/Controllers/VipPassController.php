<?php

namespace App\Http\Controllers;

use App\Models\VipPass;
use App\Models\Order;
use App\Models\RaceSchedule;
use App\Services\QrCodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;

class VipPassController extends Controller
{
    /**
     * List all VipPasses belonging to the authenticated user.
     */
    public function index()
    {
        $vipPasses = VipPass::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('vip-pass.index', compact('vipPasses'));
    }

    /**
     * Show a single VipPass with QR code.
     */
    public function show(VipPass $vipPass)
    {
        // Authorisation – ensure the user owns the pass
        if ($vipPass->user_id !== Auth::id()) {
            abort(403);
        }

        $qrService = new QrCodeService();
        $qrImage   = $qrService->generate($vipPass->qr_token);
        $qrBase64  = base64_encode($qrImage);

        return view('vip-pass.show', compact('vipPass', 'qrBase64'));
    }

    /**
     * Download the VipPass as a PDF.
     */

    /**
     * Show VIP Pass in a popup/modal.
     * This will be used for digital ticket page.
     */
    public function showPopup(VipPass $vipPass)
    {
        if ($vipPass->user_id !== Auth::id()) {
            abort(403);
        }
        $qrService = new QrCodeService();
        $qrImage   = $qrService->generate($vipPass->qr_token);
        $qrBase64  = base64_encode($qrImage);
        // Return a view designed to be displayed inside a modal.
        return view('vip-pass.popup', compact('vipPass', 'qrBase64'));
    }

    /**
     * Generate a new VipPass for a given order and race schedule.
     * Called after a successful paddock ticket booking.
     */
/**
 * Generate a new VipPass for a given order (optional) and race schedule.
 * Called after a successful paddock ticket booking.
 */
public function generate(?int $orderId, int $raceScheduleId)
{
    // Resolve race schedule
    $race = RaceSchedule::findOrFail($raceScheduleId);

    // Resolve user and optional order
    if ($orderId !== null) {
        $order   = Order::findOrFail($orderId);
        $userId  = $order->user_id;
        $orderId = $order->id;
    } else {
        $userId  = Auth::id();
        $orderId = null;
    }

    $token = Str::random(32);

    return VipPass::create([
        'user_id'          => $userId,
        'order_id'         => $orderId,
        'race_schedule_id' => $race->id,
        'qr_token'         => $token,
        'issued_at'        => now(),
        // optional expiry – 30 days after issue
        'expires_at'       => now()->addDays(30),
        'status'           => 'active',
    ]);
}
}
