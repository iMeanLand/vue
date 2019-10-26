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

Route::get('/home', 'CarsController@index')->name('home');
Route::get('/cars', 'CarsController@index')->name('cars');
Route::get('/cars/attach/{car}/wheel/{wheel}', 'CarsController@attachWheel');
Route::get('/cars/detach/{car}/wheel/{wheel}', 'CarsController@detachWheel');
Route::get('/cars/detach/{car}/wheel/{wheel}', 'CarsController@detachWheel');
Route::post('/cars', 'Api\CarsController@index');