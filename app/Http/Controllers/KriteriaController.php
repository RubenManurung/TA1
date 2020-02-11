<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use Illuminate\Support\Facades\Validator;

class KriteriaController extends Controller
{
    
    public function index(Request $req)
    {
    	$data = Kriteria::all();
    	return view('kriteria.index',['kriteria'=> $data]);
    }

    public function create()
    {
        return view('kriteria.tambah');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $saveKriteria = Kriteria::create($request->all());
        if (!$saveKriteria) {
            return back();
        }
        return redirect(route('kriteria'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit',['data' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $updateData = Kriteria::where('id',$id)
                        ->update($request->except('_token'));
        if (!$updateData) {
            return back();
        }
        return redirect(route('kriteria'));
    }

     public function destroy($id)
    {
        $find = Kriteria::destroy($id);
        return redirect(route('kriteria'));
    }

    private function validator(array $data)
    {
        return Validator::make($data,[
            'kode'      => 'required|unique:kriteria',
            'kriteria'      => 'required',
            'atribut'   => 'required',
            'bobot'     => 'required',
            'keterangan'     => 'required'
        ]);
    }
}
