<?php

namespace App\Http\Controllers;

use App\NilaiKriteria;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NilaiKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $kriteria   = Kriteria::all();
        $nilai_kriterias      = collect([]);
        if ($req->k)
        {
            $nilai_kriterias = Kriteria::find($req->k)->nilai_kriteria;
        }
        return view('nilai_kriteria.index',[
            'kriteria'  => $kriteria,
            'nilai_kriterias'     => $nilai_kriterias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        return view('nilai_kriteria.tambah',['kriteria' => $kriteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $kriteria = Kriteria::find($request->kriteria);
        $savenilai_kriteria = $kriteria->nilai_kriteria()->create($request->except(['_token','kriteria']));
        if (!$savenilai_kriteria)
        {
            return back();
        }
        return redirect(route('nilai_kriteria'));
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
        $kriteria   = Kriteria::all();
        $nilai_kriteria       = NilaiKriteria::find($id);
        return view('nilai_kriteria.edit',[
            'kriteria'  => $kriteria,
            'nilai_kriteria'     => $nilai_kriteria,
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
        $krit = Kriteria::find((int) $request->kriteria);
        $nilai_kriteria = NilaiKriteria::find($id);
        $updated = $nilai_kriteria->update($request->except(['_token','kriteria']));
        if ($updated)
        {
            $nilai_kriteria->kriteria()->associate($krit)->save();
            return redirect(route('nilai_kriteria')."?k=".$request->kriteria);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai_kriteria = NilaiKriteria::destroy($id);
        return back();
    }

    private function validator(array $data)
    {
        return Validator::make($data,[
            'kriteria'      => 'required',
            'nama'     => 'required',
            'nilai'    => 'required'
        ]);
    }
}