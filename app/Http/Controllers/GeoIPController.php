<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeoIp2\Database\Reader;
use Exception;

class GeoIPController extends Controller
{
    // Refactor to use a single method for IP data fetching to DRY up the code
    private function getIpData($ip)
    {
        $ASNReader = new Reader(env("ASN_DB_PATH"));
        $cityReader = new Reader(env("CITY_DB_PATH"));

        $ASNRecord = $ASNReader->asn($ip)->jsonSerialize();
        $cityRecord = $cityReader->city($ip)->jsonSerialize();

        return [
            'IP' => $ASNRecord['ip_address'],
            'ASN' => [
                'number' => $ASNRecord['autonomous_system_number'] ?? 'Unknown',
                'organization' => $ASNRecord['autonomous_system_organization'] ?? 'Unknown',
            ],
            'city'=> [
                'name' => $cityRecord['city']['names']['en'] ?? 'Unknown',
                'postal' => $cityRecord['postal']['code'] ?? 'Unknown',
                'location' => [
                    'latitude' => $cityRecord['location']['latitude'] ?? 'Unknown',
                    'longitude' => $cityRecord['location']['longitude'] ?? 'Unknown',
                ],
            ],
            'country'=> [
                'name' => $cityRecord['country']['names']['en'] ?? $cityRecord['registered_country']['names']['en'] ?? 'Unknown',
                'ISO' => $cityRecord['country']['iso_code'] ?? $cityRecord['registered_country']['iso_code'] ?? 'Unknown',
            ],
            'continent'=> [
                'name' => $cityRecord['continent']['names']['en'] ?? 'Unknown',
                'code' => $cityRecord['continent']['code'] ?? 'Unknown',
            ],
        ];
    }

    public function index(Request $request)
    {
        try {
            $ip = $request->header('X-Forwarded-For') ?: env('CUSTOM_IP', '8.8.8.8');
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

