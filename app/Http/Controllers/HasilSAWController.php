<?php

namespace App\Http\Controllers;

use App\HasilSAW;
use App\Mahasiswa;
use App\Kriteria;
use Illuminate\Http\Request;

class HasilSAWController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $mahasiswa = Mahasiswa::all();
        
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
        return view('hasilsaw.index',[
            'kriteria'      => $kriteria,
            'mahasiswa'    => $mahasiswa,
            'kode_krit'     => $kode_krit
        ]);
    }

}