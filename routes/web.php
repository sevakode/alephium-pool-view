<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\FarmerController::class, 'index']);
Route::get('/stats', [\App\Http\Controllers\BotController::class, 'statsPool']);
Route::get('/stats/{address}', [\App\Http\Controllers\BotController::class, 'stats']);
Route::get('/history/{address}', [\App\Http\Controllers\BotController::class, 'history']);

Route::get('/balance/{address}', [\App\Http\Controllers\FarmerController::class, 'balance']);
Route::get('/farmer/{address}', [\App\Http\Controllers\FarmerController::class, 'show']);
