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
            # No need to use the country database, but it's here if you want it.
            # $countryReader = new Reader(env("COUNTRY_DB_PATH"));
            $ASNRecord = $ASNReader->asn($ip);
            $cityRecord = $cityReader->city($ip);

            # $countryRecord = $countryReader->country($ip);
            return view("app",[
                'ASN' => $ASNRecord->jsonSerialize(),
                'City'=> $cityRecord->jsonSerialize(),
                # 'Country'=> $countryRecord,
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
            # No need to use the country database, but it's here if you want it.
            # $countryReader = new Reader(env("COUNTRY_DB_PATH"));
            $ASNRecord = $ASNReader->asn($ip);
            $cityRecord = $cityReader->city($ip);
            # $countryRecord = $countryReader->country($ip);

            # Conver City Records to JSON in a unique way
            $cityRecord = $cityReader->city($ip);


            return response()->json([
                'ASN' => $ASNRecord,
                'City'=> $cityRecord,
                # 'Country'=> $countryRecord,
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
            # No need to use the country database, but it's here if you want it.
            # $countryReader = new Reader(env("COUNTRY_DB_PATH"));
            $ASNRecord = $ASNReader->asn($ip);
            $cityRecord = $cityReader->city($ip);
            # $countryRecord = $countryReader->country($ip);

            return response()->json([
                'ASN' => $ASNRecord,
                'City'=> $cityRecord,
                # 'Country'=> $countryRecord,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'Error'=> $e->getMessage(),
                ],500);
        }
    }
}
