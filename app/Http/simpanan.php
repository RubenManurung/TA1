<?php

namespace App\Http\Controllers;

use App\Alur;
use App\Mahasiswa;
use App\Kriteria;
use Illuminate\Http\Request;

class AlurController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $mahasiswa = Mahasiswa::all();
        $alur = Alur::orderBy('total', 'DESC')->get();
        
        $kode_krit = [];
        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id] = [];
            foreach ($mahasiswa as $al)
            {
                foreach ($al->nilai_kriteria as $nilai_kriteria)
                {
                        if ($nilai_kriteria->kriteria->id == $krit->id)
                        {
                            $kode_krit[$krit->id][] = $nilai_kriteria->nilai;
                        }
                }
            }

            if ($krit->atribut == 'cost')
            {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } elseif ($krit->atribut == 'benefit')
            {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        };
        
//        return json_encode($kode_krit);
        return view('alur.index',compact('alur'),[
            'kriteria'      => $kriteria,
            'mahasiswa'    => $mahasiswa,
            'kode_krit'     => $kode_krit
        ]);
    }
//cobacoba
public function create()
    {
        return view('alur.tambah');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $saveAlur = Alur::create($request->all());
        if (!$saveAlur) {
            return back();
        }
        return redirect(route('alur'));
    }


    private function validator(array $data)
    {
        return Validator::make($data,[
            'skkm'     => 'required'
        ]);
    }





    //awal
    public function peringkat()
    {
        $alur = Alur::orderBy('total', 'DESC')->get();
        return view ('alur.index', compact('alur'));
    }
}