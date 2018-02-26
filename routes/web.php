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

Route::get('/spa/{any}', 'SpaController@index')->where('any', '.*')->middleware('auth');
Route::get('/spa', 'SpaController@index')->middleware('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->middleware('auth');

Route::get('/classroom/{any}', 'SpaController@classroom')->where('any', '.*')->middleware('auth');
Route::get('/classroom', 'SpaController@classroom')->middleware('auth');


Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
