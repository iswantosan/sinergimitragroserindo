<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::post('/process', [HomeController::class, 'process']);
Route::get('/rajaongkir', [HomeController::class, 'rajaOngkir']);
Route::get('/kota', [HomeController::class, 'kota']);
Route::get('/weight', [HomeController::class, 'weight']);