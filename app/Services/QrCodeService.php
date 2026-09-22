<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeService
{
    /**
     * Generate a PNG QR code image string (binary) for the given token.
     */
    public function generate(string $token): string
    {
        // Return raw PNG binary data (can be base64‑encoded by caller)
        return QrCode::format('png')->size(300)->generate($token);
    }
}

