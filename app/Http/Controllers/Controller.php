<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Kriteria;
use App\SKKM;
use App\Mahasiswa;
use App\DimPenilaian;
use App\AdekRegistrasi;
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

    public function Skkm()
    {
        $skkm_ = skkm::all();
        $skkm__ = DimPenilaian::selectRaw("
      askm_dim_penilaian.akumulasi_skor,
      askm_dim_penilaian.dim_id,
      askm_dim_penilaian.ta,
      askm_dim_penilaian.sem_ta");
        $query = AdekRegistrasi::selectRaw("dimx_dim.nama, skkm.skkm, adak_registrasi.ta,(SUM(adak_registrasi.nr)/4) AS IPK, adak_registrasi.sem_ta, adak_registrasi.nr, p.akumulasi_skor")
            ->join('dimx_dim', 'dimx_dim.dim_id', 'adak_registrasi.dim_id')
            ->join('skkm', 'skkm.dim_id', 'adak_registrasi.dim_id')
            ->leftJoin(\DB::raw("(" . $skkm__->toSql() . ") as p"), function ($query) {
                $query->on('p.dim_id', '=', 'adak_registrasi.dim_id');
                $query->on('p.dim_id', '=', 'skkm.dim_id');
                $query->on('p.ta', '=', 'adak_registrasi.ta');
                $query->on('p.sem_ta', '=', 'adak_registrasi.sem_ta');
            })
            ->orderBy('dimx_dim.dim_id', 'desc')
            ->orderBy('adak_registrasi.ta', 'asc')
            ->orderBy('adak_registrasi.sem_ta', 'asc')
            ->groupBy('dimx_dim.dim_id')
            ->get();
        return view('sawPage', ['krt' => $query], ['vdata' => $skkm_]);
    }


    public function Penilaian()
    {
        $kriteria_saw = kriteria::all();
        $kriteria_s_a_w = DimPenilaian::selectRaw("
      askm_dim_penilaian.akumulasi_skor,
      askm_dim_penilaian.dim_id,
      askm_dim_penilaian.ta,
      askm_dim_penilaian.sem_ta");
        $query = AdekRegistrasi::selectRaw("dimx_dim.nama,adak_registrasi.ta,(SUM(adak_registrasi.nr)/4) AS IPK, adak_registrasi.sem_ta, adak_registrasi.nr, p.akumulasi_skor")
            ->join('dimx_dim', 'dimx_dim.dim_id', 'adak_registrasi.dim_id')
            ->leftJoin(\DB::raw("(" . $kriteria_s_a_w->toSql() . ") as p"), function ($query) {
                $query->on('p.dim_id', '=', 'adak_registrasi.dim_id');
                $query->on('p.ta', '=', 'adak_registrasi.ta');
                $query->on('p.sem_ta', '=', 'adak_registrasi.sem_ta');
            })
            ->groupBy('dimx_dim.dim_id')
            ->get();

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
            $normali = number_format(($min / $item['akumulasi_skor']), 2);

            $total = number_format((float)((0.5 * $normalisasi) + (0.5 *$normali)), 2);

            $arrayNilaiAkhir[] = $total;
        }

        foreach ($query as $item) {
            $arrayMahasiswa[] = $item;
        }

        $krt = array_combine($arrayNilaiAkhir, $arrayMahasiswa);

        krsort($krt);
//        dd($arrayResult);

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
        $query = AdekRegistrasi::selectRaw("dimx_dim.nama,adak_registrasi.ta,(SUM(adak_registrasi.nr)/4) AS IPK, adak_registrasi.sem_ta, adak_registrasi.nr, p.akumulasi_skor")
            ->join('dimx_dim', 'dimx_dim.dim_id', 'adak_registrasi.dim_id')
            ->leftJoin(\DB::raw("(" . $kriteria_s_a_w->toSql() . ") as p"), function ($query) {
                $query->on('p.dim_id', '=', 'adak_registrasi.dim_id');
                $query->on('p.ta', '=', 'adak_registrasi.ta');
                $query->on('p.sem_ta', '=', 'adak_registrasi.sem_ta');


            })
            ->orderBy('dimx_dim.dim_id', 'desc')
            ->orderBy('adak_registrasi.ta', 'asc')
            ->orderBy('adak_registrasi.sem_ta', 'asc')
            ->groupBy('dimx_dim.dim_id')
            ->get();

        return view('sawPage', ['krt' => $query], ['vdata' => $kriteria_saw]);
    }

}
