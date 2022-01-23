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

Route::get('/', function () {

    return view('welcome');

});
Route::get('/pool_rev', [\App\Http\Controllers\BlockController::class, 'forDay']);
Route::get('/shares_day', [\App\Http\Controllers\ShareController::class, 'forDayPool']);
Route::get('/shares_hour', [\App\Http\Controllers\ShareController::class, 'forHourPool']);
Route::match(['get', 'post'], '/bot', [\App\Http\Controllers\BotController::class, 'init']);
