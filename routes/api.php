<?php

use App\Http\Controllers\GeoIP;
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
        "documentation" => "https://geoip.notcoderguy.com/docs",
        "github" => "https://github.com/notcoderguy/geoip",
        "author" => "https://notcoderguy.com",
    ]);
})->name("api");
Route::get("/detect", [GeoIP::class,"auto"])->name("auto");
Route::get('/detect/{ip}', [GeoIP::class, 'detect'])->name ('detect');
