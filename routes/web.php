<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThingSpeakController;
use App\Http\Controllers\DataActualController;
use App\Http\Controllers\dummyController;
use App\Http\Controllers\TensorFlowController;
use App\Http\Controllers\apidummyController;
use App\Http\Controllers\apipredictController;
use App\Http\Controllers\TensorFlowModelController;

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

// routes/web.php

//model
// Route::get('/tensorflow-model', 'App\Http\Controllers\TensorFlowController@serveModel');
// Route::get('/tensorflow-weight', 'App\Http\Controllers\TensorFlowController@serveWeight');

Route::get('/ml-model/{file}', function ($file) {
    $path = public_path("ml-model/{$file}");
    return response()->file($path);
});

// Route::get('/tensorflow', [TensorFlowController::class, 'servejson']);
// Route::get('/group1-shard1of1.bin', [TensorFlowController::class, 'servebin']);
// Route::get('/model', function () {
//     return response()->file('ml-model/model.json');
// });
// Route::get('/group1-shard1of1.bin ', function () {
//     return response()->file('ml-model/group1-shard1of1.bin');
// });

// Route::get('/tensor','App\Http\Controllers\TensorFlowController@carbon');

Route::get('/tensor', function () {
    return view('tensorflow');
});

Route::get('/test', function () {
    return view('test');
});



Route::get('/tult_actual', [DataActualController::class, 'index']);

Route::get('/dummy', [dummyController::class, 'index']);

Route::get('/data-actual', [ThingSpeakController::class, 'fetchDataFromThingSpeak']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/tensorflow', function () {
    return view('tensorflow.index');
});
Route::get('/servejson', [TensorFlowModelController::class, 'servejson']);
