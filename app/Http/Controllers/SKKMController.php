<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SKKM;
use App\DimPenilaian;
use App\AdekRegistrasi;
use App\Http\Controllers\Controller;
use DB;

class SKKMController extends Controller
{

  public function route_tambah_skkm(){
    return view('/tambah_skkm');
  }

  // public function store_skkm(Request $request){
  //   $data = new Controller();
  //   $data->Mahasiswa();
  //   $skkm_ = skkm::all();
  //   $this->validate($request,[
  //     'dim_id'=>'required',
  //     'skkm'=>'required'
  //   ]);

  //   skkm::create([
  //     'dim_id'=>$request->dim_id,
  //     'skkm'=>$request->skkm
  //   ]);

  //   return view('sawPage',['vdata'=>$skkm_,'krt'=>$data]);
  // }

  public function store_skkm(Request $request){
    
    $this->validate($request,[
      'skkm'=>'required'
    ]);

    $dim = DB::table('dimx_dim')
         ->where('id_mhs', '=', $request->get('dimx_dim'))
          ->value('dim_id');

      $skkm_ = new SKKM;
      $skkm_->id_mhs = $dim->dim_id;
      $skkm_->skkm = $request->input('skkm');

      $skkm_->save();
    
      return redirect('/sawPage')->with('success', "Data Saved");
    
  }
  public function update_skkm(Request $request, $id){
   
    $this->validate($request,[
      'skkm'=>'required'
    ]);

      $skkm_ = SKKM::find($id);
      $skkm_->skkm = $request->skkm;

      $skkm_->save();
    
      return redirect('/sawPage')->with('success', "Data Updated");
    
  }
  public function edit_skkm($id){
    $skkm_ = skkm::find($id);
    $data = new Controller();
    $data->Mahasiswa();
    return view('/edit_skkm',['vdata'=>$skkm_,'krt'=>$data]);
  }

  public function hapus_skkm($id){
    $data = new Controller();
    $data->Mahasiswa();
    $skkm_ = skkm::find($id);
    if(($skkm_ != null) && ($data != null )) {
      $skkm_->delete();
        return view('sawPage',['vdata'=>$skkm_,'krt'=>$data]);
    }

    return view('sawPage',['vdata'=>$skkm_,'krt'=>$data]);
  }
}
