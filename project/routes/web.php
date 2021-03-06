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
Route::post('login-api', 'Auth\LoginController@loginAPI');
Route::post('register-api', 'Auth\RegisterController@registerAPI');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/games', 'GameController@getAllGames')->name('games');
Route::get('/game/{id}', 'GameController@show')->name('games.show');
Route::post('/games/store', 'GameController@store')->name('games.store');
Route::get('/states', 'AddressController@getStates')->name('states');
