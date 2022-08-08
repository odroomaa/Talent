<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:sanctum')->resource('posts',PostController::class);
//Route::POST('posts',[\App\Http\Controllers\PostController::class,'store']);
Route::POST('/register',[\App\Http\Controllers\AuthController::class,'register']);
Route::POST('/login',[\App\Http\Controllers\AuthController::class,'login']);
Route::middleware('auth:sanctum')->post('/logout',[\App\Http\Controllers\AuthController::class,'logout']);