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
Route::get('/cars/add', 'CarsController@add')->name('cars.add');
Route::post('/cars/add', 'Api\CarsController@add');
Route::get('/cars/edit/{id}', 'CarsController@edit')->name('cars.edit');
Route::post('/cars/edit/{id}', 'Api\CarsController@edit');

Route::post('/file/upload', 'FileController@upload')->name('upload');
Route::any('/files', 'FileController@files')->name('files');