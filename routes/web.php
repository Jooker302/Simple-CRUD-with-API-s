<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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



Route::post('store',[DataController::class,'store']);

Route::get('display',[DataController::class,'show']);

Route::get('/',[DataController::class,'show']);

Route::get('delete/{id}',[DataController::class,'destroy']);

Route::get('edit/{id}',[DataController::class,'edit']);

Route::post('update/{id}',[DataController::class,'update']);