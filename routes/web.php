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

Route::get('/', function () {
	return view('welcome');
});








Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('/staff', 'userController');
	Route::resource('/warga', 'WargaController');
	Route::resource('/surat', 'SuratController');
	Route::resource('/jadwal', 'JadwalController');
	Route::resource('/user', 'userController');
	Route::resource('/about', 'aboutController');
	Route::resource('/dash', 'dashboardController');
});

Route::get('/home', 'HomeController@index')->name('home');
