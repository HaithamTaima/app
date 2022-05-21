<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('auth/register',[\App\Http\Controllers\Api\Auth\RegisterController::class,'register']);
Route::post('auth/login',[\App\Http\Controllers\Api\Auth\RegisterController::class,'login']);

Route::group(['prefix'=>'v2','middleware'=>'auth:api'],function (){
    Route::resource('posts',\App\Http\Controllers\Api\PostController::class);
    Route::resource('interests',\App\Http\Controllers\Api\InterestController::class);
    Route::get('users/',[\App\Http\Controllers\Api\UsersController::class,'index']);

    Route::get('users/{id}',[\App\Http\Controllers\Api\UsersController::class,'show']);
});
