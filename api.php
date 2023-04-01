<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnigaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\BukuController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getmahasiswa',[UnigaController::class,'getmahasiswa']);

Route::get('/getjurusan',[JurusanController::class,'getjurusan']);

Route::get('/getid/{id}',[UnigaController::class,'getid']);

Route::post('/createmahasiswa',[UnigaController::class,'createmahasiswa']);

Route::put('/updatemahasiswa/{id}',[UnigaController::class,'updatemahasiswa']);

Route::delete('/deletemahasiswa/{id}',[UnigaController::class,'deletemahasiswa']);



Route::get('/getbuku',[BukuController::class,'getbuku']);

Route::get('/getid/{id}',[BukuController::class,'getid']);

Route::post('/createbuku',[BukuController::class,'createbuku']);

Route::put('/updatebuku/{id}',[BukuController::class,'updatebuku']);

Route::delete('/deletebuku/{id}',[BukuController::class,'deletebuku']);

