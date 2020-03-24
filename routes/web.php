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

Route::get('/', 'Controller@index');
Route::get('/Kriteria', 'Controller@Kriteria');
Route::get('/hasilsaw', 'HasilSAWController@index')->name('hasilsaw');
Route::get('sawPage','Controller@sawPage');
Route::get('Kriteria/route_tambah_krt_saw', 'Controller@route_tambah_krt_saw');
Route::post('Kriteria/store_kriteria','Controller@store_kriteria');
Route::get('/Kriteria/edit_kriteria/{id}', 'KriteriaController@edit_kriteria');
Route::put('/Kriteria/update_kriteria/{id}','KriteriaController@update_kriteria');
Route::get('/Kriteria/hapus_kriteria/{id}', 'KriteriaController@hapus_kriteria');
Route::get('/Mahasiswa', 'MahasiswaController@Mahasiswa');


