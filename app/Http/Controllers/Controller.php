<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Kriteria;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
      return view('homepage');
    }
    public function sawPage()
    {
      $kriteria_ = kriteria::all();
      $kriteria__ = DB::table('dimx_dim')
      ->join('askm_dim_penilaian','askm_dim_penilaian.dim_id','=','dimx_dim.dim_id')
      ->join('adak_registrasi','adak_registrasi.dim_id','=','askm_dim_penilaian.dim_id')
      ->select('dimx_dim.nama','adak_registrasi.nr','askm_dim_penilaian.akumulasi_skor','adak_registrasi.ta' ,'adak_registrasi.sem_ta')
      ->get();
  
    return view('sawPage',['krt'=>$kriteria__],['vdata'=>$kriteria_]);
    }
    public function Kriteria()
    {
      $kriteria_ = kriteria::all();
      $kriteria__ = DB::table('dimx_dim')
      ->join('askm_dim_penilaian','askm_dim_penilaian.dim_id','=','dimx_dim.dim_id')
      ->join('adak_registrasi','adak_registrasi.dim_id','=','askm_dim_penilaian.dim_id')
      ->select('dimx_dim.nama','adak_registrasi.nr','askm_dim_penilaian.akumulasi_skor','adak_registrasi.ta' ,'adak_registrasi.sem_ta')
      ->get();
  
    return view('sawPage',['krt'=>$kriteria__],['vdata'=>$kriteria_]);
    }
    public function route_tambah_krt_saw(){
      return view('/tambah_kriteria');
    }
    public function store_kriteria(Request $request){
      $kriteria_ = kriteria::all();
      $this->validate($request,[
        'kode'=>'required',
        'nama'=>'required',
        'atribut'=>'required',
        'bobot'=>'required',
        'keterangan'=>'required'
      ]);
  
      kriteria::create([
        'kode'=>$request->kode,
        'nama'=>$request->nama,
        'atribut'=>$request->atribut,
        'bobot'=>$request->bobot,
        'keterangan'=>$request->keterangan
      ]);
      $kriteria__ = DB::table('dimx_dim')
      ->join('askm_dim_penilaian','askm_dim_penilaian.dim_id','=','dimx_dim.dim_id')
      ->join('adak_registrasi','adak_registrasi.dim_id','=','askm_dim_penilaian.dim_id')
      ->select('dimx_dim.nama','adak_registrasi.nr','askm_dim_penilaian.akumulasi_skor','adak_registrasi.ta' ,'adak_registrasi.sem_ta')
      ->get();
  
    return view('sawPage',['krt'=>$kriteria__],['vdata'=>$kriteria_]);
    }
}
