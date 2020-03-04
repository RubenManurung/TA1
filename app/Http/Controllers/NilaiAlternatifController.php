<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\NilaiKriteria;
use App\Kriteria;
use Illuminate\Http\Request;
use DB;
class NilaiAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $kriteria = Kriteria::all();
        $mahasiswa = Mahasiswa::all();
        return view('nilai_alternatif.index',[
            'kriteria'      => $kriteria,
            'mahasiswa'    => $mahasiswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kriteria = Kriteria::all();
        return view('nilai_alternatif.tambah',['master_kriteria' => $kriteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $data = array_values($request->except('_token'));
//        $data = Crip::find($data);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nilai_kriteria()->sync($data);
        return redirect(route('mahasiswa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectednilai_kriteria = DB::table('nilai_alternatif')
                            ->select('nilai_kriteria_id')
                            ->where('alternatif_id',$id)
                            ->get();
        $kriteria = Kriteria::all();
        $arraynilai_kriteria = [];
        foreach ($selectednilai_kriteria as $a) {
                $arraynilai_kriteria[] = $a->nilai_kriteria_id;
        }
        return view('nilai_alternatif.edit',[
            'master_kriteria'   => $kriteria,
            'selected_nilai_kriteria'     => $arraynilai_kriteria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array_values($request->except('_token'));
//        $data = Crip::find($data);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nilai_kriteria()->sync($data);
        return redirect(route('nilai_alternatif'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
