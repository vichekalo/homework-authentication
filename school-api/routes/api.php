<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
//Public toutes (user)
Route::get('users',[UserController::class,'index']);
Route::get('users/{id}',[UserController::class,'show']);
//Private
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('users',[UserController::class,'store']);
    Route::put('users/{id}',[UserController::class,'update']);
    Route::delete('users/{id}',[UserController::class,'destroy']);
});


/// Post
Route::get('posts',[PostController::class,'index']);
Route::get('posts/{id}',[PostController::class,'show']);
//Private
Route::post('posts',[PostController::class,'store']);
Route::put('posts/{id}',[PostController::class,'update']);
Route::delete('posts/{id}',[PostController::class,'destroy']);


