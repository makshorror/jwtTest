<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::group(['namespace' => 'App\Http\Controllers\Fruits', 'prefix' => 'fruits'], function () {
            Route::get('/', 'IndexController');
        });
    });




});

Route::group(['namespace' => 'App\Http\Controllers\Users', 'prefix' => 'users'], function () {
    Route::post('/', 'StoreController');
});

