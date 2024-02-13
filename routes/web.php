<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThingSpeakController;
use App\Http\Controllers\DataActualController;
use App\Http\Controllers\dummyController;

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


Route::get('/tult_actual', [DataActualController::class, 'index']);
Route::get('/dummy', [dummyController::class, 'index']);
Route::get('/data-actual', [ThingSpeakController::class, 'fetchDataFromThingSpeak']);
Route::get('/', function () {
    return view('welcome');
});
