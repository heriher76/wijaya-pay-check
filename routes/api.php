<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;;

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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('edit', 'API\UserController@edit');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/my', 'API\UserController@my');
    Route::post('/emergency_report', 'API\EmergencyReportController@postEmergencyReport');
    Route::post('/masyarakat_report', 'API\MasyarakatReportController@postMasyarakatReport');
    Route::post('/report', 'API\Report@postReport');
    Route::get('/history-report', 'API\Report@history');
    Route::post('/node', 'API\NodeController@postNode');

    Route::get('/user_apps', 'API\ApiUserAppsController@index');
    Route::get('/user_apps/{id}', 'API\ApiUserAppsController@show');
    Route::get('/user_admin', 'API\ApiUserAdminController@index');
    Route::get('/user_admin/{id}', 'API\ApiUserAdminController@show');

    Route::get('/news', 'API\ApiNewsController@index');
    Route::get('/news/{id}', 'API\ApiNewsController@show');
});

Route::get('/getBestRoute', 'API\ResultController@getBestRoute');
Route::post('/getBestPositionController', 'API\BestPositionPersonelControlle@getBestPositionController');