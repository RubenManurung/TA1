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

Route::get('sawPage','Controller@sawPage');

Route::get('/Penilaian', 'Controller@Penilaian');

Route::get('/Perhitungan', 'Controller@Perhitungan');

Route::get('/Skkm', 'SKKMController@Skkm');

Route::get('Kriteria/route_tambah_krt_saw', 'KriteriaController@route_tambah_krt_saw');
Route::post('Kriteria/store_kriteria','KriteriaController@store_kriteria');
Route::get('/Kriteria/edit_kriteria/{id}', 'KriteriaController@edit_kriteria');
Route::put('/Kriteria/update_kriteria/{id}','KriteriaController@update_kriteria');
Route::get('/Kriteria/hapus_kriteria/{id}', 'KriteriaController@hapus_kriteria');
Route::get('/Mahasiswa', 'Controller@Mahasiswa');


Route::get('Skkm/route_tambah_skkm', 'SKKMController@route_tambah_skkm');
Route::post('Skkm/store_skkm','SKKMController@store_skkm');
Route::get('/Skkm/edit_skkm/{id}', 'SKKMController@edit_skkm');
Route::put('/Skkm/update_skkm/{id}','SKKMController@update_skkm');
Route::get('/Skkm/hapus_skkm/{id}', 'SKKMController@hapus_skkm');

Route::put('/skkm','SKKMController@update_skkm');
