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
Route::resource('products-ajax','ProductAjaxController');

Route::get('events','EventController@index')->name('events.index');

Route::get('events/add','EventController@add')->name('events.add');
Route::post('events/store','EventController@store')->name('events.store');

Route::get('events/edit/{id}','EventController@edit')->name('events.edit');
Route::put('events/update/{id}','EventController@update')->name('events.update');

Route::delete('events/{id}','EventController@destroy')->name('events.destroy');

