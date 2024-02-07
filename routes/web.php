<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeoIPController as GeoIP;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GeoIP::class,'index'])->name('home');
Route::get('/docs', [GeoIP::class, 'docs'])->name('docs');
