<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckAPI;

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

Route::get('data',[CheckAPI::class,'getdata']);

Route::post('add',[CheckAPI::class,'adddata']);

Route::post('delete/{id}',[CheckAPI::class,'delete']);

Route::post('update/{id}',[CheckAPI::class,'update']);



