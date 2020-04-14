<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Kriteria;
use App\DimPenilaian;
use App\AdekRegistrasi;
use DB;

class PageController extends Controller
{
    public function index()
    {
      $data = $this->Kriteria();
      $data = $this->Mahasiswa();
      return view('homepage',['krt_ft'=>$data,'vdata'=>$data]);
    }
    public function fuzzytopsisPage()
    {
      $kriteria_ft = kriteria::all();
      $data = $this->Mahasiswa();
      return view('fuzzytopsisPage',['krt_ft'=>$data,'vdata'=>$kriteria_ft]);
    }
    public function Perbandingan(){
      return view('perbandingan');
    }

    public function Kriteria()
    {
      $kriteria_ft = kriteria::all();
      $data = $this->Mahasiswa();
      return view('fuzzytopsisPage',['krt_ft'=>$data,'vdata'=>$kriteria_ft]);
    }

    public function MahasiswaFT()
    {
      $kriteria_ft = kriteria::all();
      $kriteria_f_t = DimPenilaian::selectRaw("
      askm_dim_penilaian.akumulasi_skor,
      askm_dim_penilaian.dim_id,
      askm_dim_penilaian.ta,
      askm_dim_penilaian.sem_ta");
        $query = AdekRegistrasi::selectRaw("dimx_dim.nama,adak_registrasi.ta,(SUM(adak_registrasi.nr)/2) AS IPK, adak_registrasi.sem_ta, adak_registrasi.nr, p.akumulasi_skor")
            ->join('dimx_dim', 'dimx_dim.dim_id', 'adak_registrasi.dim_id')
            ->leftJoin(\DB::raw("(" . $kriteria_f_t->toSql() . ") as p"), function ($query) {
                $query->on('p.dim_id', '=', 'adak_registrasi.dim_id');
                $query->on('p.ta', '=', 'adak_registrasi.ta');
                $query->on('p.sem_ta', '=', 'adak_registrasi.sem_ta');
            })
            ->where('adak_registrasi.sem_ta','=','1', 'AND', '2')
            ->orderBy('dimx_dim.dim_id', 'desc')
            ->orderBy('adak_registrasi.ta', 'asc')
            ->orderBy('adak_registrasi.sem_ta', 'asc')
            ->groupBy('dimx_dim.dim_id')
            ->get();
      return view('fuzzytopsisPage',['krt_ft'=>$query,'vdata'=>$kriteria_ft]);
    }

    public function PenilaianFT()
    {
      $kriteria_ft = kriteria::all();
      $kriteria_f_t = DimPenilaian::selectRaw("
                         askm_dim_penilaian.akumulasi_skor,
                         askm_dim_penilaian.dim_id,
                         askm_dim_penilaian.ta,
                         askm_dim_penilaian.sem_ta");
        $query = AdekRegistrasi::selectRaw("dimx_dim.nama,adak_registrasi.ta, adak_registrasi.sem_ta, adak_registrasi.nr, p.akumulasi_skor")
                 ->join('dimx_dim','dimx_dim.dim_id','adak_registrasi.dim_id')
                 ->leftJoin(\DB::raw("(" . $kriteria_f_t->toSql() . ") as p"),function ($query) {
                     $query->on('p.dim_id','=','adak_registrasi.dim_id');
                     $query->on('p.ta','=','adak_registrasi.ta');
                     $query->on('p.sem_ta','=','adak_registrasi.sem_ta');
                 })
                 ->orderBy('dimx_dim.dim_id','desc')
                 ->orderBy('adak_registrasi.ta','asc')
                 ->orderBy('adak_registrasi.sem_ta','asc')
                 ->get();
      return view('fuzzytopsisPage',['krt_ft'=>$query,'vdata'=>$kriteria_ft]);
    }

    public function PerhitunganFT(){
      $kriteria_ft = kriteria::all();
      $data = $this->Mahasiswa();
      return view('fuzzytopsisPage',['krt_ft'=>$data,'vdata'=>$kriteria_ft]);
    }

    public function edit_ft(){
      $kriteria_ft = kriteria::all();
      return view('fuzzytopsisPage',['vdata'=>$kriteria_ft]);
    }
}
