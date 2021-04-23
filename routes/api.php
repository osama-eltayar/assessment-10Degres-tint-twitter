<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\TweetController;
use App\Http\Controllers\Api\UserFollowerController;
use App\Http\Controllers\Utilities\ReportController;
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

Route::post('login',[LoginController::class, 'login']) ;
Route::post('register',[RegisterController::class,'register']) ;

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('tweets', TweetController::class)->only('store') ;
    Route::apiResource('users.followers', UserFollowerController::class)->only('store') ;
});

Route::prefix('reports')->group(function (){
    Route::get('user-actions',[ReportController::class,'downloadUserActions']);
});




