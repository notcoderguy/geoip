<?php

use App\Http\Controllers\GeoIPController as GeoIP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return response()->json([
        "message" => "Welcome to the GeoIP API!",
        "version" => "1.0.0",
        "License" => "MIT",
        "website" => "https://geoip.in",
        "documentation" => "https://geoip.in/docs",
        "github" => "https://github.com/notcoderguy/geoip",
        "author" => "https://notcoderguy.com",
    ]);
})->name("api");

Route::middleware('throttle:10,1')->group(function () {
    Route::get("/detect", [GeoIP::class,"auto"])->name("auto");
    Route::get('/detect/{ip}', [GeoIP::class, 'detect'])->name ('detect');
});
