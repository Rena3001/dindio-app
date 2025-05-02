<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CloudflareController extends Controller
{
    public function fetchAnalytics()
    {
        $token = env('CLOUDFLARE_API_TOKEN');
        $baseUrl = env('CLOUDFLARE_API_BASE');
        
        // 1. Zoneları çək
        $zonesResponse = Http::withToken($token)
            ->get("{$baseUrl}/zones");

        // Zoneları çəkməkdə problem varsa, səhv mesajı qaytarırıq
        if (!$zonesResponse->successful()) {
            Log::error('Failed to fetch zones', ['response' => $zonesResponse->json()]);
            return response()->json(['error' => 'Zoneları çəkmək olmadı'], 500);
        }

        $zones = $zonesResponse->json()['result'];
        $data = [];

        // 2. Hər zona üçün GraphQL sorğusu ilə statistik məlumatları çək
        foreach ($zones as $zone) {
            $zoneId = $zone['id'];
            $zoneName = $zone['name'];

            // GraphQL sorğusunu qururuq
            $query = [
                'query' => '
                    query {
                        viewer {
                            zones(filter: {zoneTag: "' . $zoneId . '"}) {
                                analytics {
                                    requests
                                    bandwidth
                                    topCountries {
                                        country
                                        requests
                                    }
                                    topBrowsers {
                                        browser
                                        requests
                                    }
                                }
                            }
                        }
                    }
                '
            ];

            // GraphQL sorğusunu göndəririk
            $analyticsResponse = Http::withToken($token)
                ->post("{$baseUrl}/graphql", $query);

            // Əgər Analytics məlumatını çəkməkdə problem varsa, əlavə edirik
            if (!$analyticsResponse->successful()) {
                Log::error('Failed to fetch analytics for zone', ['zone' => $zoneName, 'response' => $analyticsResponse->json()]);
                $data[] = [
                    'zone' => $zoneName,
                    'error' => 'Analytics məlumatı alınmadı',
                    'details' => $analyticsResponse->json(),
                ];
                continue;
            }

            // Cavabı yoxlayırıq və məlumatı alırıq
            $analyticsData = $analyticsResponse->json();
            if (isset($analyticsData['data']['viewer']['zones'][0]['analytics'])) {
                $analytics = $analyticsData['data']['viewer']['zones'][0]['analytics'];

                // Yalnız mövcud olan məlumatları əlavə edirik
                $data[] = [
                    'zone' => $zoneName,
                    'requests' => $analytics['requests'] ?? 0,
                    'bandwidth' => $analytics['bandwidth'] ?? 0,
                    'country_stats' => $analytics['topCountries'] ?? [],
                    'browser_stats' => $analytics['topBrowsers'] ?? [],
                ];
            } else {
                $data[] = [
                    'zone' => $zoneName,
                    'error' => 'Analytics məlumatı mövcud deyil',
                    'details' => $analyticsData,
                ];
            }
        }

        return response()->json($data);
    }
}
