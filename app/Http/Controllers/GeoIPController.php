<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use GeoIp2\Database\Reader;
use App\Models\Country;
use Exception;

class GeoIPController extends Controller
{
    // Refactor to use a single method for IP data fetching to DRY up the code
    private function getIpData($ip)
    {
        // Define a unique cache key based on the IP address
        $cacheKey = 'geoip_data_' . $ip;

        // Attempt to get the data from Redis directly
        $cachedData = Redis::get($cacheKey);

        // Check if data is already in Redis
        if ($cachedData) {
            // Data is found in Redis, decode it from JSON and return
            return json_decode($cachedData, true);
        } else {
            // Data is not in Redis, fetch it
            $ASNReader = new Reader(env("ASN_DB_PATH"));
            $cityReader = new Reader(env("CITY_DB_PATH"));

            $ASNRecord = $ASNReader->asn($ip)->jsonSerialize();
            $cityRecord = $cityReader->city($ip)->jsonSerialize();

            try {
                if (isset($cityRecord['country']['iso_code'])) {
                    $extracRecord = Country::where('code', $cityRecord['country']['iso_code'])->first();
                } else {
                    $extracRecord = Country::where('code', $cityRecord['registered_country']['iso_code'])->first();
                }
            } catch (Exception $e) {
                $extracRecord = null;
            }

            // Combine and prepare the data
            $data = [
                'IP' => $ASNRecord['ip_address'],
                'ASN' => [
                    'number' => $ASNRecord['autonomous_system_number'] ?? 'Unknown',
                    'organization' => $ASNRecord['autonomous_system_organization'] ?? 'Unknown',
                ],
                'city' => [
                    'name' => $cityRecord['city']['names']['en'] ?? 'Unknown',
                    'postal' => $cityRecord['postal']['code'] ?? 'Unknown',
                    'location' => [
                        'latitude' => $cityRecord['location']['latitude'] ?? 'Unknown',
                        'longitude' => $cityRecord['location']['longitude'] ?? 'Unknown',
                    ],
                ],
                'country' => [
                    'name' => $cityRecord['country']['names']['en'] ?? $cityRecord['registered_country']['names']['en'] ?? 'Unknown',
                    'ISO' => $cityRecord['country']['iso_code'] ?? $cityRecord['registered_country']['iso_code'] ?? 'Unknown',
                ],
                'continent' => [
                    'name' => $cityRecord['continent']['names']['en'] ?? 'Unknown',
                    'code' => $cityRecord['continent']['code'] ?? 'Unknown',
                ],
                'language' => $extracRecord ? json_decode($extracRecord->language, true) : 'Unknown',
                'currency' => $extracRecord ? json_decode($extracRecord->currency, true) : 'Unknown',
            ];

            // Serialize the data to JSON and store in Redis directly
            Redis::setex($cacheKey, 3600, json_encode($data)); // 3600 seconds = 1 hour

            // Return the fetched data
            return $data;
        }
    }

    public function index(Request $request)
    {
        try {
            $ip = $request->header('X-Forwarded-For') ?: env('CUSTOM_IP', '8.8.8.8');

            if ($ip == '') {
                $ip = '8.8.8.8';
            }
            
            $data = $this->getIpData($ip);

            return view("app", ['data' => $data]);
        } catch (Exception $e) {
            return view('app', ['Error' => $e->getMessage()]);
        }
    }

    public function docs()
    {
        return view('docs');
    }

    public function detect($ip)
    {
        try {
            $data = $this->getIpData($ip);

            return response()->json(['data' => $data]);
        } catch (Exception $e) {
            return response()->json(['Error' => $e->getMessage()], 500);
        }
    }

    public function auto(Request $request)
    {
        try {
            $ip = $request->header('X-Forwarded-For') ?: env('CUSTOM_IP', '8.8.8.8');
            $data = $this->getIpData($ip);

            return response()->json(['data' => $data]);
        } catch (Exception $e) {
            return response()->json(['Error' => $e->getMessage()], 500);
        }
    }
}

