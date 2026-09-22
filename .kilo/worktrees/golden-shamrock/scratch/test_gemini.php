<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$g = new App\Services\GeminiService();
$res = $g->generateContent('Halo, berikan salam singkat untuk tim balap Mobil 1 Team RG!');
echo "HASIL RESPONS GEMINI API:\n" . ($res ?? 'Gagal mengambil respons API.');
