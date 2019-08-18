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

Route::resource('expense', 'ExpenseController');
Route::resource('others', 'OthersController');
Route::resource('goods', 'GoodsController');
Route::resource('shops', 'ShopsController');
Route::resource('transportation', 'TransportationController');
Route::resource('vehicle_type', 'VehicleTypeController');

Route::get('users', 'UsersController@index');
Route::get('users/{users}', 'UsersController@show');
Route::post('users/{users}/approve', 'UsersController@change_approval');
