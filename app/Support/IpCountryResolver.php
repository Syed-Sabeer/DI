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

        if ($headerCountry && strtoupper($headerCountry) !== 'XX') {
            $countryCode = strtoupper($headerCountry);
            $countryName = Country::where('code', $countryCode)->value('name');
            return ['ip' => $ip, 'country' => $countryName ?: $countryCode];
        }

        if (! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            return ['ip' => $ip, 'country' => 'Unknown'];
        }

        $country = Cache::remember('ip-country:'.$ip, now()->addDays(30), function () use ($ip) {
            try {
                $response = Http::connectTimeout(2)->timeout(3)->get(
                    'http://ip-api.com/json/'.urlencode($ip),
                    ['fields' => 'status,country']
                );

                return $response->successful() && $response->json('status') === 'success'
                    ? ($response->json('country') ?: 'Unknown')
                    : 'Unknown';
            } catch (\Throwable $error) {
                Log::warning('IP country lookup failed', ['ip' => $ip, 'message' => $error->getMessage()]);
                return 'Unknown';
            }
        });

        return ['ip' => $ip, 'country' => $country];
    }
}
