<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Kriteria;
use DB;

class KriteriaController extends Controller
{
    
    
    public function edit_kriteria($id){
        $kriteria_ = kriteria::find($id);
        return view('edit_kriteria',['vdata'=>$kriteria_]);
      }

      public function update_kriteria(Request $request, $id){
        $this->validate($request,[
          'kode'=>'required',
          'nama'=>'required',
          'atribut'=>'required',
          'bobot'=>'required',
          'keterangan'=>'required'
        ]);
    
        $kriteria_ = kriteria::find($id);
        $kriteria_->kode = $request->kode;
        $kriteria_->nama = $request->nama;
        $kriteria_->atribut = $request->atribut;
        $kriteria_->bobot = $request->bobot;
        $kriteria_->keterangan = $request->keterangan;
    
        $kriteria_->save();
        $kriteria__ = DB::table('dimx_dim')
      ->join('askm_dim_penilaian','askm_dim_penilaian.dim_id','=','dimx_dim.dim_id')
      ->join('adak_registrasi','adak_registrasi.dim_id','=','askm_dim_penilaian.dim_id')
      ->select('dimx_dim.nama','adak_registrasi.nr','askm_dim_penilaian.akumulasi_skor','adak_registrasi.ta' ,'adak_registrasi.sem_ta')
      ->get();
  
    return view('sawPage',['krt'=>$kriteria__],['vdata'=>$kriteria_]);
      }

      public function hapus_kriteria($id){
        $kriteria_ = kriteria::find($id);
        $kriteria__ = DB::table('dimx_dim')
        ->join('askm_dim_penilaian','askm_dim_penilaian.dim_id','=','dimx_dim.dim_id')
        ->join('adak_registrasi','adak_registrasi.dim_id','=','askm_dim_penilaian.dim_id')
        ->select('dimx_dim.nama','adak_registrasi.nr','askm_dim_penilaian.akumulasi_skor','adak_registrasi.ta' ,'adak_registrasi.sem_ta')
        ->get();
    
        if(($kriteria_ != null)&& ($kriteria__ != null)) {
          $kriteria_->delete();
         
  
    return view('sawPage',['krt'=>$kriteria__],['vdata'=>$kriteria_]);
        }
        
    
        return view('sawPage',['krt'=>$kriteria__],['vdata'=>$kriteria_]);
      }

}
