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

Auth::routes(['register' => false]);

Route::get('/set_locale/{locale}', 'LanguageController@set')->name('set_locale');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/', function () {
		return view('welcome');
	});
	Route::resource('/companies', 'CompanyController')->except(['show']);
	Route::resource('/employees', 'EmployeeController')->except(['show']);
});
