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
Route::get('/logout', 'Auth\LoginController@logout');

Route::resource('siswas','SiswaController');

Route::get('/home', 'HomeController@index')->name('home');

//laporan 
Route::get('/laporan','LaporanController@index')->name('laporan');
Route::get('/laporan/cari','LaporanController@cari');
Route::get('/laporan/print','LaporanController@print')->name('laporanprint');
