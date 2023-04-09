<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('deneme',[PostController::class,'index']);

Route::post('deneme',[PostController::class,'store']);

Route::get('deneme/{id}',[PostController::class,'show']);

Route::post('deneme/{id}',[PostController::class,'update']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

