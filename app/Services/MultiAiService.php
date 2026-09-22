<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MultiAiService
{
    /**
     * Send prompt to Groq API (Ultra Fast Sub-second Latency AI).
     */
    public function askGroq(string $prompt): ?string
    {
        $apiKey = config('services.groq.api_key');
        $model = config('services.groq.model', 'llama-3.3-70b-versatile');

        if (empty($apiKey)) {
            Log::warning('Groq API Key (GROQ_API_KEY) is not set in .env.');
            return null;
        }

        try {
            $response = Http::withToken($apiKey)
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => $model,
                    'messages' => [
                        ['role' => 'system', 'content' => 'Anda adalah AI Asisten Real-time Telemetri & Strategi Balap untuk Mobil 1 Team RG.'],
                        ['role' => 'user', 'content' => $prompt]
                    ],
                    'temperature' => 0.7
                ]);

            if ($response->successful()) {
                return $response->json()['choices'][0]['message']['content'] ?? null;
            }

            Log::error('Groq API Error: ' . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error('Groq Exception: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Send prompt to OpenAI API (ChatGPT / GPT-4o).
     */
    public function askOpenAI(string $prompt): ?string
    {
        $apiKey = config('services.openai.api_key');
        $model = config('services.openai.model', 'gpt-4o-mini');

        if (empty($apiKey)) {
            Log::warning('OpenAI API Key (OPENAI_API_KEY) is not set in .env.');
            return null;
        }

        try {
            $response = Http::withToken($apiKey)
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => $model,
                    'messages' => [
                        ['role' => 'user', 'content' => $prompt]
                    ]
                ]);

            if ($response->successful()) {
                return $response->json()['choices'][0]['message']['content'] ?? null;
            }

            Log::error('OpenAI API Error: ' . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error('OpenAI Exception: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Send prompt to DeepSeek API.
     */
    public function askDeepSeek(string $prompt): ?string
    {
        $apiKey = config('services.deepseek.api_key');
        $model = config('services.deepseek.model', 'deepseek-chat');

        if (empty($apiKey)) {
            Log::warning('DeepSeek API Key (DEEPSEEK_API_KEY) is not set in .env.');
            return null;
        }

        try {
            $response = Http::withToken($apiKey)
                ->post('https://api.deepseek.com/chat/completions', [
                    'model' => $model,
                    'messages' => [
                        ['role' => 'user', 'content' => $prompt]
                    ]
                ]);

            if ($response->successful()) {
                return $response->json()['choices'][0]['message']['content'] ?? null;
            }

            Log::error('DeepSeek API Error: ' . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error('DeepSeek Exception: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Smart Router: Tries Groq first (fastest), falls back to Gemini, then OpenAI.
     */
    public function askFastestAvailable(string $prompt): ?string
    {
        // 1. Try Groq (Sub-second real-time response)
        $groqRes = $this->askGroq($prompt);
        if ($groqRes) return $groqRes;

        // 2. Fallback to Gemini 2.0 Flash
        $geminiService = new GeminiService();
        $geminiRes = $geminiService->generateContent($prompt);
        if ($geminiRes) return $geminiRes;

        // 3. Fallback to OpenAI
        return $this->askOpenAI($prompt);
    }
}
