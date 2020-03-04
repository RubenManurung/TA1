<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswas]);
    }

    public function create()
    {
        return view('mahasiswa.tambah');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $saveMahasiswa = Mahasiswa::create($request->all())->id;
        if (!$saveMahasiswa) {
            return back();
        }
        return redirect(route('mahasiswa.tambah',['id' => $saveMahasiswa]));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit',['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, $id)
    {
        $updateMahasiswa = Mahasiswa::where('id',$id)
                ->update($request->except(['_token']));
        if (!$updateMahasiswa) {
            return back();
        }
        return redirect(route('mahasiswa'));
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::destroy($id);
        return redirect(route('mahasiswa'));
    }

    private function validator(array $data)
    {
        return Validator::make($data,[
            'kode' => 'required',
            'nama' => 'required',
            'keterangan' => 'required'
        ]);
    }

}
