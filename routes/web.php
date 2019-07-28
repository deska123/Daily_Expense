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
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('verify', function() {
  return view('auth/verify');
});

Route::get('transportation', 'TransportationController@index')->middleware('verified');

Route::get('vehicle_type', 'VehicleTypeController@index')->middleware('verified');
Route::get('vehicle_type/create', 'VehicleTypeController@create')->middleware('verified');
Route::get('vehicle_type/{vehicle_type}', 'VehicleTypeController@show')->middleware('verified');
Route::post('vehicle_type/store', 'VehicleTypeController@store')->middleware('verified');
Route::get('vehicle_type/{vehicle_type}/edit', 'VehicleTypeController@edit')->middleware('verified');
Route::patch('vehicle_type/{vehicle_type}', 'VehicleTypeController@update')->middleware('verified');
Route::delete('vehicle_type/{vehicle_type}', 'VehicleTypeController@destroy')->middleware('verified');
