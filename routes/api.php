<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apidummycontroller;
use App\Http\Controllers\apipredictcontroller;
use App\Http\Controllers\HistorisController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('dummy',apidummycontroller::class);
Route::apiResource('predict',apipredictcontroller::class);
Route::put('predict', [apipredictcontroller::class, 'update']);
Route::apiResource('historis',HistorisController::class);
// Route::post('/dummy',[apidummycontroller::class,'store']);