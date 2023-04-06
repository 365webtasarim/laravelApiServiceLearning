<?php


use App\Http\Controllers\Api\PostsController;
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

Route::prefix('posts')->namespace('Api')->group(function(){

    Route::get('/', [PostsController::class, 'index']);
    Route::get('/{id}', [PostsController::class, 'show']);
    Route::post('/', [PostsController::class, 'store']);
    Route::put('/{id}', [PostsController::class, 'update']);
    Route::delete('/{id}', [PostsController::class, 'destroy']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
