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

Route::get('/home', 'HomeController@index')->name('home');

// Resource routes could be used instead

Route::group(['prefix' => 'vehicles', 'middleware' => 'admin'], function (){
    Route::get('/', ['as' => 'vehicles', 'uses' => 'VehiclesController@index']);
    Route::post('create', ['as' => 'vehicles.create', 'uses' => 'VehiclesController@create']);
    Route::post('edit/{id}', ['as' => 'vehicles.edit', 'uses' => 'VehiclesController@edit']);
    Route::post('delete/{id}', ['as' => 'vehicles.delete', 'uses' => 'VehiclesController@delete']);
});

Route::group(['prefix' => 'rates', 'middleware' => 'admin'], function (){
   Route::get('/', ['as' => 'fuel.rates', 'uses' => 'FuelRatesController@index']);
   Route::post('/create', ['as' => 'fuel.rates.create', 'uses' => 'FuelRatesController@create']);
    Route::post('edit/{id}', ['as' => 'fuel.rates.edit', 'uses' => 'FuelRatesController@edit']);
    Route::post('delete/{id}', ['as' => 'fuel.rates.delete', 'uses' => 'FuelRatesController@delete']);
});

Route::group(['prefix' => 'users', 'middleware' => 'admin'], function() {
    Route::get('/', ['as' => 'users', 'uses' => 'AdminController@index']);
    Route::post('{id}', ['as' => 'users.show', 'uses' => 'AdminController@showReports']);
});

Route::group(['prefix' => 'reports', 'middleware' => 'user'], function (){
    Route::get('/', ['as' => 'reports', 'uses' => 'TravelReportsController@index']);
    Route::post('/create', ['as' => 'reports.create', 'uses' => 'TravelReportsController@create']);
    Route::post('edit/{id}', ['as' => 'reports.edit', 'uses' => 'TravelReportsController@edit']);
    Route::post('delete/{id}', ['as' => 'reports.delete', 'uses' => 'TravelReportsController@delete']);
});

