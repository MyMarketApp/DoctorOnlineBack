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

Route::prefix('User')->group(function(){
    Route::post('add', 'Api\UserController@add');
    Route::get('types', 'Api\UserTypeController@all');
    Route::get('genders', 'Api\UserGenderController@all');
    Route::post('update', 'Api\UserController@update');
    Route::post('login', 'Api\UserController@login');
    Route::get('{email}/verify', 'Api\UserController@verify');
});