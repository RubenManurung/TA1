<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Kriteria;
use DB;

class MahasiswaController extends Controller
{
    public function Mahasiswa()
    {
      $kriteria_ = kriteria::all();
      $kriteria__ = DB::table('dimx_dim')
      ->join('askm_dim_penilaian','askm_dim_penilaian.dim_id','=','dimx_dim.dim_id')
      ->join('adak_registrasi','adak_registrasi.dim_id','=','askm_dim_penilaian.dim_id')
      ->select('dimx_dim.nama','adak_registrasi.nr','askm_dim_penilaian.akumulasi_skor','adak_registrasi.ta' ,'adak_registrasi.sem_ta')
      ->get();
  
    return view('sawPage',['krt'=>$kriteria__],['vdata'=>$kriteria_]);
  }
}
