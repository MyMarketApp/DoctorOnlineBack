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
    Route::get('find/{id}', 'Api\UserController@find');
    Route::get('genders', 'Api\UserGenderController@all');
    Route::post('update', 'Api\UserController@update');
    Route::post('updateExpoPushToken', 'Api\UserController@updateExpoPushToken');
    Route::post('login', 'Api\UserController@login');
    Route::get('{email}/verify', 'Api\UserController@verify');
    Route::get('{id}/profiles', 'Api\UserController@profiles');
});

Route::prefix('Patient')->group(function(){
    Route::post('add', 'Api\PatientController@add');
    Route::post('update', 'Api\PatientController@update');
    Route::get('all', 'Api\PatientController@all');
});

Route::prefix('Doctor')->group(function(){
    Route::post('add', 'Api\DoctorController@add');
    Route::post('update', 'Api\DoctorController@update');
    Route::get('all', 'Api\DoctorController@all');
    Route::get('{id}/schedules', 'Api\DoctorController@schedules');
    Route::get('top', 'Api\DoctorController@top');
    Route::get('{id}/appointments', 'Api\DoctorController@appointments');
    Route::post('try', 'Api\DoctorController@try');
});

Route::prefix('Specialty')->group(function(){
    Route::get('all', 'Api\SpecialtyController@all');
    Route::get('{id}/doctors', 'Api\SpecialtyController@doctors');
});

Route::prefix('Schedule')->group(function(){
    Route::get('all', 'Api\ScheduleController@all');
    Route::post('add', 'Api\ScheduleController@add');
});

Route::prefix('Appointment')->group(function(){
    Route::post('update', 'Api\AppointmentController@update');
    Route::post('add', 'Api\AppointmentController@add');
    Route::get('all', 'Api\AppointmentController@all');
});