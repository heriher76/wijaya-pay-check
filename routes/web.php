<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAppsController;

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function() {

	Route::get('/', 'WelcomeController@map' )->name('welcome');

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/index', 'UserController@index')->name('user');

	Route::get('/masyarakat', 'MasyarakatController@index')->name('masyarakat');

	Route::get('/user-baru', 'UserController@indexUserBaru')->name('user-baru');

	Route::post('/user-baru/confirm/{id}', 'UserController@confirmUser');

	Route::delete('/user-baru/{id}', 'UserController@destroyUserBaru');

	Route::get('/admins', 'UserAdminController@index')->name('admin-index');

	Route::get('/admins/create', 'UserAdminController@create');

	Route::post('/admins', 'UserAdminController@store')->name('admins_add');
	
	Route::get('/admins/{id}', 'UserAdminController@edit')->name('admins_add');

	Route::put('/admins/{id}', 'UserAdminController@update')->name('admins_update');

	Route::delete('/admins/{id}', 'UserAdminController@destroy')->name('admins_delete');
	////

	Route::get('/user_apps', 'UserAppsController@index')->name('user_apps');

	Route::get('/user_apps/create', 'UserAppsController@create');

	Route::post('/user_apps', 'UserAppsController@store')->name('user_apps_add');
	
	Route::get('/user_apps/{id}', 'UserAppsController@edit')->name('user_apps_add');

	Route::put('/user_apps/{id}', 'UserAppsController@update')->name('user_apps_update');

	Route::delete('/user_apps/{id}', 'UserAppsController@destroy')->name('user_apps_delete');

	// Route::get('/user_apps/edit', 'UserAppsController@edit')->name('user_apps');

	Route::get('/laporan','LaporanController@index')->name('laporan');

	Route::get('/laporan_darurat','LaporanDarurat@map')->name('laporan_darurat');

	Route::get('/laporan_masyarakat','LaporanMasyarakat@map')->name('laporan_masyarakat');

	Route::get('laporan_darurat/direction', 'LaporanDarurat@direction');

	Route::get('/news', 'NewsController@index')->name('news');
	
	Route::get('/news/create', 'NewsController@create');
	Route::post('/news', 'NewsController@store');
	Route::get('/news/{id}', 'NewsController@edit');
	Route::put('/news/{id}', 'NewsController@update');
	Route::delete('/news/{id}', 'NewsController@destroy');
});
