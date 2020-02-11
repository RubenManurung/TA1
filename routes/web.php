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


Route::get('/tentang', 'TentangController@index')->name('tentang');
Route::get('/kontak', 'KontakController@index')->name('kontak');

//kriteria
Route::prefix('/kriteria')->group(function ()
{
Route::get('/', 'KriteriaController@index')->name('kriteria');
Route::get('/tambah', 'KriteriaController@create')->name('kriteria.tambah');
    Route::post('/tambah', 'KriteriaController@store')->name('kriteria.simpan');
    Route::get('/edit/{id}', 'KriteriaController@edit')->name('kriteria.edit');
    Route::post('/edit/{id}', 'KriteriaController@update')->name('kriteria.update');
    Route::post('/hapus/{id}', 'KriteriaController@destroy')->name('kriteria.hapus');
});

//Mahasiswa
Route::prefix('/mahasiswa')->group(function ()
{
    Route::get('/', 'MahasiswaController@index')->name('mahasiswa');
    Route::get('/tambah', 'MahasiswaController@create')->name('mahasiswa.tambah');
    Route::post('/tambah', 'MahasiswaController@store')->name('mahasiswa.simpan');
    Route::get('/edit/{id}', 'MahasiswaController@edit')->name('mahasiswa.edit');
    Route::post('/edit/{id}', 'MahasiswaController@update')->name('mahasiswa.update');
    Route::post('/hapus/{id}', 'MahasiswaController@destroy')->name('mahasiswa.hapus');
});