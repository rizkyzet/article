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
Route::get('/artikel/create', 'ArtikelController@create')->name('artikel.create');
Route::get('/artikel/show/{artikel}', 'ArtikelController@show')->name('artikel.show');
Route::post('/artikel/store', 'ArtikelController@store')->name('artikel.store');
Route::delete('/artikel/{artikel}', 'ArtikelController@destroy')->name('artikel.delete');
Route::get('/artikel/edit/{artikel}', 'ArtikelController@edit')->name('artikel.edit');
Route::post('/artikel/update/{artikel}', 'ArtikelController@update')->name('artikel.update');

Route::fallback(function () {
    return abort(404);
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
