<?php

use App\Console\Commands\DownloadMmdbDatabases;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('geoip:download-mmdb', function () {
    $this->call(DownloadMmdbDatabases::class);
})->purpose('Download MMDB databases from MaxMind');

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');
