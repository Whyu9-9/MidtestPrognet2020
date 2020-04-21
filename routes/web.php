<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('playstations', 'PlaystationController');

Route::get('/sewa/{id}', 'PlaystationController@sewa')->name('playstations.sewa');

Route::post('/sewa/{id}', 'PlaystationController@sewa_store');

Route::resource('games', 'GameController');

Route::resource('rents', 'SewaController');

Route::resource('rent_details', 'SewaDetailController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
