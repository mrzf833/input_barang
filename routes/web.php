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

Route::get('/barang_by_kodisi/{kondisi}','barang\InputBarang@index')->name('barang.index');
Route::get('/input_barang','barang\InputBarang@create')->name('barang.create');
Route::post('/input_barang','barang\InputBarang@store')->name('barang.store');
Route::get('/barang/edit/{id}/{kondisi}','barang\InputBarang@edit')->name('barang.edit.kondisi');
Route::match(['put','patch'],'/barang/edit/{id}/{kondisi}','barang\InputBarang@update')->name('barang.update');
Route::delete('/barang/delete/{id}','barang\InputBarang@destroy')->name('barang.destroy');
