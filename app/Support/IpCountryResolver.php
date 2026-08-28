<?php

namespace App\Support;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IpCountryResolver
{
    public static function resolve(Request $request): array
    {
        $ip = $request->ip();
        $headerCountry = $request->header('CF-IPCountry') ?: $request->header('X-Country-Code');

        $headerCountryName = null;
        if ($headerCountry && strtoupper($headerCountry) !== 'XX') {
            $countryCode = strtoupper($headerCountry);
            $headerCountryName = Country::where('code', $countryCode)->value('name') ?: $countryCode;
        }

        if (! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            return ['ip' => $ip, 'country' => $headerCountryName ?: 'Unknown', 'state' => 'Unknown', 'city' => 'Unknown', 'area' => 'Unknown'];
        }

        $location = Cache::remember('ip-location-v2:'.$ip, now()->addDays(30), function () use ($ip) {
            try {
                $response = Http::connectTimeout(2)->timeout(3)->get(
                    'http://ip-api.com/json/'.urlencode($ip),
                    ['fields' => 'status,country,regionName,city,district,zip']
                );

                if (! $response->successful() || $response->json('status') !== 'success') return null;
                return [
                    'country' => $response->json('country') ?: 'Unknown',
                    'state' => $response->json('regionName') ?: 'Unknown',
                    'city' => $response->json('city') ?: 'Unknown',
                    'area' => $response->json('district') ?: ($response->json('zip') ?: 'Unknown'),
                ];
            } catch (\Throwable $error) {
                Log::warning('IP country lookup failed', ['ip' => $ip, 'message' => $error->getMessage()]);
                return null;
            }
        });

        return array_merge(['ip' => $ip], $location ?: ['country' => $headerCountryName ?: 'Unknown', 'state' => 'Unknown', 'city' => 'Unknown', 'area' => 'Unknown']);
    }
}
