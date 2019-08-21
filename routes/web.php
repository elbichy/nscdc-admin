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

Route::get('/', 'LandingController@index')->name('landing');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/redeployment/today', 'DashboardController@today')->name('redeployment_today');

Route::group(['prefix' => 'redeployment'], function () {
	Route::get('/all', 'RedeploymentController@index')->name('redeployment_all');
	Route::get('/get_all', 'RedeploymentController@redeployments')->name('redeployment_get_all');

	Route::get('/create', 'RedeploymentController@create')->name('redeployment_create');
	Route::post('/store', 'RedeploymentController@store')->name('redeployment_store');
	Route::get('/{redeployment}/edit', 'RedeploymentController@edit')->name('redeployment_edit');
	Route::patch('/{redeployment}/update', 'RedeploymentController@update')->name('redeployment_update');
	Route::delete('/{redeployment}/delete', 'RedeploymentController@destroy')->name('redeployment_delete');

	Route::get('/{redeployment}/download', 'RedeploymentController@download')->name('redeployment_download');
});