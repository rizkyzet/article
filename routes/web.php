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

Route::get('/', 'ArtikelController@index')->name('artikel.index');
Route::get('/artikel/{artikel}', 'ArtikelController@show')->name('artikel.show');
Route::get('/artike/create', 'ArtikelController@create')->name('artikel.create');
Route::post('/artikel/store', 'ArtikelController@store')->name('artikel.store');
Route::delete('/artikel/{artikel}', 'ArtikelController@destroy')->name('artikel.delete');
