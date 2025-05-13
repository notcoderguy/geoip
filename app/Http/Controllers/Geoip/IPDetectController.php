<?php

namespace App\Http\Controllers\Geoip;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Exception;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class IPDetectController extends Controller
{
    private function getCloudflareClientIP()
    {
        if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            return $_SERVER['HTTP_CF_CONNECTING_IP'];
        }

        return $_SERVER['REMOTE_ADDR'];
    }

    public function detect(Request $request, $ip = null)
    {
        try {
            $ip = $ip ?: $this->getCloudflareClientIP() ?: '8.8.8.8';
            $cacheKey = 'geoip_data_'.$ip;

            if ($cachedData = Redis::get($cacheKey)) {
                return response()->json(json_decode($cachedData, true));
            }

            $asnReader = new Reader(storage_path('app/private/mmdb/asn.mmdb'));
            $cityReader = new Reader(storage_path('app/private/mmdb/city.mmdb'));

            $asnData = $asnReader->asn($ip)->jsonSerialize();
            $cityData = $cityReader->city($ip)->jsonSerialize();

            $countryCode = $cityData['country']['iso_code'] ?? $cityData['registered_country']['iso_code'] ?? null;
            $country = $countryCode ? Country::where('code', $countryCode)->first() : null;

            $data = [
                'IP' => $asnData['ip_address'],
                'ASN' => [
                    'number' => $asnData['autonomous_system_number'] ?? 'Unknown',
                    'organization' => $asnData['autonomous_system_organization'] ?? 'Unknown',
                ],
                'city' => [
                    'name' => $cityData['city']['names']['en'] ?? 'Unknown',
                    'postal' => $cityData['postal']['code'] ?? 'Unknown',
                    'location' => [
                        'latitude' => $cityData['location']['latitude'] ?? 'Unknown',
                        'longitude' => $cityData['location']['longitude'] ?? 'Unknown',
                    ],
                ],
                'country' => [
                    'name' => $cityData['country']['names']['en'] ?? $cityData['registered_country']['names']['en'] ?? 'Unknown',
                    'ISO' => $countryCode ?? 'Unknown',
                ],
                'continent' => [
                    'name' => $cityData['continent']['names']['en'] ?? 'Unknown',
                    'code' => $cityData['continent']['code'] ?? 'Unknown',
                ],
                'language' => $country ? json_decode($country->language, true) : 'Unknown',
                'currency' => $country ? json_decode($country->currency, true) : 'Unknown',
            ];

            Redis::setex($cacheKey, 3600, json_encode($data));

            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
