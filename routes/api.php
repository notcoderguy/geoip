<?php

use App\Http\Controllers\Geoip\IPDetectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the GeoIP API!',
        'version' => '0.2.0',
        'License' => 'Unlicense',
        'website' => 'https://geoip.in',
        'documentation' => 'https://docs.geoip.in/',
        'github' => 'https://github.com/notcoderguy/geoip',
        'author' => 'https://notcoderguy.com',
    ]);
})->name('api');

Route::middleware('throttle:10,1')->group(function () {
    Route::get('/detect', [IPDetectController::class, 'detect'])->name('auto');
    Route::get('/detect/{ip}', [IPDetectController::class, 'detect'])->name('detect');
});
