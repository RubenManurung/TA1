<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Kriteria;
use App\SKKM;
use App\Mahasiswa;
use App\DimPenilaian;
use App\AdakRegistrasi;
use App\DimxDim;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('homepage');
    }

    public function test(){

      $dimx_dim = DimPenilaian::selectRaw("
      askm_dim_penilaian.akumulasi_skor,
      askm_dim_penilaian.dim_id,
      askm_dim_penilaian.ta,
      askm_dim_penilaian.sem_ta");
        $query = AdakRegistrasi::selectRaw("dimx_dim.nama,adak_registrasi.ta,adak_registrasi.nr AS IPK, adak_registrasi.sem_ta, adak_registrasi.nr, p.akumulasi_skor")

            ->join('dimx_dim', 'dimx_dim.dim_id', 'adak_registrasi.dim_id')
            ->leftJoin(\DB::raw("(" . $dimx_dim->toSql() . ") as p"), function ($query) {
                $query->on('p.dim_id', '=', 'adak_registrasi.dim_id');
                $query->on('p.ta', '=', 'adak_registrasi.ta');
                $query->on('p.sem_ta', '=', 'adak_registrasi.sem_ta');
            })

            ->orderBy('dimx_dim.nama','asc')
            ->get();


      $tahun = AdakRegistrasi::selectRaw("
      adak_registrasi.dim_id,
      adak_registrasi.ta,
      askm_dim_penilaian.akumulasi_skor,
      adak_registrasi.nr,
      adak_registrasi.sem_ta")
      ->join('askm_dim_penilaian',
      'askm_dim_penilaian.ta','=','adak_registrasi.ta')
      ->where("adak_registrasi.sem_ta","=",1)
      ->groupBy('adak_registrasi.ta')
      ->get();
      // $ipk = DimPenilaian::where("sem_ta","=",2)->get();

      // $count = AdakRegistrasi::max("nr");

      $tfn = [
        "Very High"=>[7,9,9],
        "High"=>[5,7,9],
        "Average"=>[3,5,7],
        "Low"=>[1,3,5],
        "Very Low"=>[1,1,3]
      ];


      return view("seleksi_awal_ft",['semua'=>$query,'tahun'=>$tahun,'tfn'=>$tfn]);
    }


    public function sawPage()
    {
        $kriteria_saw = kriteria::all();
        $data = $this->Mahasiswa();

        return view('sawPage', ['krt' => $data], ['vdata' => $kriteria_saw]);
    }

    public function Kriteria()
    {
      $kriteria_saw = kriteria::all();
      $data = $this->Mahasiswa();
      return view('sawPage',['krt'=>$data,'vdata'=>$kriteria_saw]);
    }

    public function Penilaian()
    {
      $kriteria_saw = kriteria::all();
      $kriteria_s_a_w = DimPenilaian::selectRaw("
      askm_dim_penilaian.akumulasi_skor,
      askm_dim_penilaian.dim_id,
      askm_dim_penilaian.ta,
      askm_dim_penilaian.sem_ta");
        $query = AdakRegistrasi::selectRaw("dimx_dim.nama,adak_registrasi.ta,adak_registrasi.nr AS IPK, adak_registrasi.sem_ta, adak_registrasi.nr, p.akumulasi_skor")
            ->join('dimx_dim', 'dimx_dim.dim_id', 'adak_registrasi.dim_id')
            ->leftJoin(\DB::raw("(" . $kriteria_s_a_w->toSql() . ") as p"), function ($query) {
                $query->on('p.dim_id', '=', 'adak_registrasi.dim_id');
                $query->on('p.ta', '=', 'adak_registrasi.ta');
                $query->on('p.sem_ta', '=', 'adak_registrasi.sem_ta');
            })
            ->orderBy('dimx_dim.nama','asc')
            ->groupBy('dimx_dim.dim_id')
            ->get();
              // dd(array_search('Ruben Manurung', $query));
            // dd($query[0]);
        $arrayNilaiAkhir = array();
        $arrayMahasiswa = array();

        $max = (float)$query[0]['IPK'];
        $min = $query[0]['akumulasi_skor'];
        foreach($query as $data){
            if($data['IPK'] > $max){ $max = $data['IPK'];}
            if($data['akumulasi_skor'] < $min){ $min = $data['akumulasi_skor'];}
        }
        foreach ($query as $item) {
            $normalisasi = number_format(($item['IPK'] / $max), 2);
            if($min>0){
                $normali = number_format(($min / $item['akumulasi_skor']), 2);
            }else{
                $normali = 0;
            }

            $total = number_format((float)((0.5 * $normalisasi) + (0.5 *$normali)), 2);

            $arrayNilaiAkhir[] = $total;
        }
        foreach ($query as $item) {
            $arrayMahasiswa[] = $item;
        }

        $combineData = array_combine($arrayNilaiAkhir, $arrayMahasiswa);
        krsort($combineData);
        $krt = array_slice($combineData, 0, 20);

        return view('sawPage', ['vdata' => $kriteria_saw])->with(compact('krt'));
    }


    public function Perhitungan()
    {
        $kriteria_saw = kriteria::all();
        $data = $this->Mahasiswa();
        return view('sawPage', ['krt' => $data], ['vdata' => $kriteria_saw]);
    }
    public function Mahasiswa()
    {
      $kriteria_saw = kriteria::all();
      $kriteria_s_a_w = DimPenilaian::selectRaw("
      askm_dim_penilaian.akumulasi_skor,
      askm_dim_penilaian.dim_id,
      askm_dim_penilaian.ta,
      askm_dim_penilaian.sem_ta");
        $query = AdakRegistrasi::selectRaw("dimx_dim.nama,adak_registrasi.ta,adak_registrasi.nr AS IPK, adak_registrasi.sem_ta, adak_registrasi.nr, p.akumulasi_skor")

            ->join('dimx_dim', 'dimx_dim.dim_id', 'adak_registrasi.dim_id')
            ->leftJoin(\DB::raw("(" . $kriteria_s_a_w->toSql() . ") as p"), function ($query) {
                $query->on('p.dim_id', '=', 'adak_registrasi.dim_id');
                $query->on('p.ta', '=', 'adak_registrasi.ta');
                $query->on('p.sem_ta', '=', 'adak_registrasi.sem_ta');
            })

            ->orderBy('dimx_dim.nama','asc')
            ->groupBy('dimx_dim.dim_id')
            ->get();

        return view('sawPage', ['krt' => $query], ['vdata' => $kriteria_saw]);
    }

    public function Skkm()
    {
        $kriteria_saw = kriteria::all();
        $kriteria_s_a_w = DimPenilaian::selectRaw("
      askm_dim_penilaian.akumulasi_skor,
      askm_dim_penilaian.dim_id,
      askm_dim_penilaian.ta,
      askm_dim_penilaian.sem_ta");
        $query = AdakRegistrasi::selectRaw("skkm.id AS skkm_id,skkm.skkm, dimx_dim.dim_id, dimx_dim.nama,adak_registrasi.ta,(SUM(adak_registrasi.nr)/2) AS IPK, adak_registrasi.sem_ta, adak_registrasi.nr, p.akumulasi_skor")
            ->join('dimx_dim', 'dimx_dim.dim_id', 'adak_registrasi.dim_id')
            ->leftJoin('skkm', 'skkm.dim_id', 'dimx_dim.dim_id')
            ->leftJoin(\DB::raw("(" . $kriteria_s_a_w->toSql() . ") as p"), function ($query) {
                $query->on('p.dim_id', '=', 'adak_registrasi.dim_id');
                $query->on('p.ta', '=', 'adak_registrasi.ta');
                $query->on('p.sem_ta', '=', 'adak_registrasi.sem_ta');
            })
            ->groupBy('dimx_dim.dim_id')
            ->get();

        $arrayNilaiAkhir = array();
        $arrayMahasiswa = array();
        $arraySkkm = array();

        $max = (float)$query[0]['IPK'];
        $min = $query[0]['akumulasi_skor'];
        foreach($query as $data){
            if($data['IPK'] > $max){ $max = $data['IPK'];}
            if($data['akumulasi_skor'] < $min){ $min = $data['akumulasi_skor'];}
        }

        foreach ($query as $item) {
            $normalisasi = number_format(($item['IPK'] / $max), 2);
            if($min>0){
                $normali = number_format(($min / $item['akumulasi_skor']), 2);
            }else{
                $normali = 0;
            }

            $total = number_format((float)((0.5 * $normalisasi) + (0.5 *$normali)), 2);

            $arrayNilaiAkhir[] = $total;

            $hasilSeleksiSkkm = number_format((float)((0.5 * $total) + (0.5 *$item['skkm'])), 2);
            $arraySkkm[] = $hasilSeleksiSkkm;
        }

        foreach ($query as $item) {
            $arrayMahasiswa[] = $item;
        }

        $combineData = array_combine($arrayNilaiAkhir, $arrayMahasiswa);
        //$combineDataSkkm = array_combine($arraySkkm, $combineData);
        //dd($arrayNilaiAkhir);
        //dd($arrayMahasiswa);
        //dd($arraySkkm);
        // dd($arraySkkm);
        // die();
        krsort($combineData);

        $krt = array_slice($combineData, 0, 20);
        // print_r($krt);
        // die();
        //dd($krt);
        //die();
        return view('sawPage', ['vdata' => $kriteria_saw])->with(compact('krt'));
    }

}
