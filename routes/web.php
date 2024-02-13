<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThingSpeakController;

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


Route::get('/data-actual', [ThingSpeakController::class, 'fetchDataFromThingSpeak']);
Route::get('/', function () {
    return view('welcome');
});
