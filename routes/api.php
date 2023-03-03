<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;

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
Route::group(['prefix'=>'dish','as'=>'dish.'], function() {
    Route::post('/create', [DishController::class,'store']);
    Route::get('/read/{id}', [DishController::class,'show']);
    Route::match(['post', 'put'], '/update/{id}', [DishController::class,'update']);
    Route::match(['get', 'delete'], '/delete/{id}', [DishController::class,'destroy']);
});
