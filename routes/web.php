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

Route::get('hasilsaw', 'HasilSAWController@index');
Route::post('/alur/index', 'HasilSAWController@tambah')->name('hasilsaw.tambah');
Route::post('/alur/index', 'HasilSAWController@save')->name('hasilsaw.save');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/alur','AlurController@index')->name('alur');

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


//Route module for nilai_kriteria
Route::prefix('/nilai_kriteria')->group(function ()
{
    Route::get('/', 'NilaiKriteriaController@index')->name('nilai_kriteria');
    Route::get('/tambah', 'NilaiKriteriaController@create')->name('nilai_kriteria.tambah');
    Route::post('/tambah', 'NilaiKriteriaController@store')->name('nilai_kriteria.simpan');
    Route::get('/edit/{id}', 'NilaiKriteriaController@edit')->name('nilai_kriteria.edit');
    Route::post('/edit/{id}', 'NilaiKriteriaController@update')->name('nilai_kriteria.update');
    Route::post('/hapus/{id}', 'NilaiKriteriaController@destroy')->name('nilai_kriteria.hapus');
});

//nilai alternatif
Route::prefix('/nilai_alternatif')->group(function ()
{
    Route::get('/', 'NilaiAlternatifController@index')->name('nilai_alternatif');
    Route::get('/tambah', 'NilaiAlternatifController@create')->name('nilai_alternatif.tambah');
    Route::post('/tambah', 'NilaiAlternatifController@store')->name('nilai_alternatif.simpan');
    Route::get('/edit/{id}', 'NilaiAlternatifController@edit')->name('nilai_alternatif.edit');
    Route::post('/edit/{id}', 'NilaiAlternatifController@update')->name('nilai_alternatif.update');
    Route::post('/hapus/{id}', 'NilaiAlternatifController@destroy')->name('nilai_alternatif.hapus');
});
