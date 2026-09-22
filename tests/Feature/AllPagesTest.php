<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AllPagesTest extends TestCase
{
    /**
     * Test all main public routes return 200 OK
     */
    public function test_all_public_pages_load(): void
    {
        $publicRoutes = [
            '/',
            '/car-specs',
            '/drivers',
            '/partners',
            '/f1-division',
            '/paddock-club',
            '/race-schedule',
            '/standings',
            '/login',
            '/register',
            '/about/corporate',
            '/about/sustainability',
            '/about/media-centre',
            '/about/academy',
            '/about/news',
            '/about/magazine',
            '/about/history',
            '/about/achievements',
            '/about/partnership',
            '/about/join-us',
            '/endurance',
            '/nascar',
            '/gt-world-challenge/europe',
            '/gt-world-challenge/asia',
            '/shop',
            '/shop/checkout',
            '/indycar',
            '/wrc',
            '/fim-ewc',
            '/formula-e',
            '/fan/login',
            '/fan/register',
            '/sitemap.xml',
            '/enterprise/live-race-center',
            '/enterprise/statistics-center',
            '/enterprise/team-museum',
            '/enterprise/sponsor-portal',
            '/enterprise/logistics-hub',
            '/enterprise/engineering-dashboard',
            '/enterprise/membership',
            '/enterprise/race-strategy',
            '/enterprise/driver-analytics',
            '/enterprise/car-setup',
            '/enterprise/fantasy-league',
            '/enterprise/team-radio',
            '/enterprise/weather-center',
            '/enterprise/race-results',
            '/api/v1/drivers',
            '/api/v1/schedule',
            '/api/v1/team',
            '/api/v1/telemetry',
        ];

        $failed = [];
        foreach ($publicRoutes as $url) {
            try {
                $response = $this->get($url);
                if ($response->status() !== 200) {
                    $failed[$url] = [
                        'status' => $response->status(),
                        'exception' => $response->exception ? $response->exception->getMessage() . ' at ' . $response->exception->getFile() . ':' . $response->exception->getLine() : null,
                    ];
                }
            } catch (\Throwable $e) {
                $failed[$url] = $e->getMessage();
            }
        }

        $this->assertEmpty($failed, "Failed routes: " . json_encode($failed, JSON_PRETTY_PRINT));
    }
}
