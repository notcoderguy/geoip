<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeoIp2\Database\Reader;

class GeoIP extends Controller
{
    public function index(Request $request)
    {
        try {
            $ip = $request->header('X-Forwarded-For') ?:'8.8.8.8';
            $ASNReader = new Reader(env("ASN_DB_PATH"));
            $cityReader = new Reader(env("CITY_DB_PATH"));
            
            $ASNRecord = $ASNReader->asn($ip)->jsonSerialize();
            $cityRecord = $cityReader->city($ip)->jsonSerialize();

            $data = [
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

            return view("app",[
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return view('app',['Error'=> $e->getMessage()]);
        }
    }

    public function docs()
    {
        return view('docs');
    }

    public function detect($ip)
    {
        try {
            $ASNReader = new Reader(env("ASN_DB_PATH"));
            $cityReader = new Reader(env("CITY_DB_PATH"));
            
            $ASNRecord = $ASNReader->asn($ip)->jsonSerialize();
            $cityRecord = $cityReader->city($ip)->jsonSerialize();
            
            $data = [
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

            return response()->json([
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'Error'=> $e->getMessage(),
                ],500);
        }
    }

    public function auto(Request $request)
    {
        try {
            $ip = $request->header('X-Forwarded-For') ?:'8.8.8.8';
            $ASNReader = new Reader(env("ASN_DB_PATH"));
            $cityReader = new Reader(env("CITY_DB_PATH"));
            
            $ASNRecord = $ASNReader->asn($ip)->jsonSerialize();
            $cityRecord = $cityReader->city($ip)->jsonSerialize();
            
            $data = [
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

            return response()->json([
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'Error'=> $e->getMessage(),
                ],500);
        }
    }
}
