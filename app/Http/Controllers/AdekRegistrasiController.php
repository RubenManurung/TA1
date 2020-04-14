<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AdekRegistrasi;
use Session;
use App\Exports\AdekRegistrasiExport;
use App\Imports\AdekRegistrasiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AdekRegistrasiController extends Controller
{
  public function index()
{
  $adak_regis = AdekRegistrasi::paginate(10);
  return view('adak_registrasi',['adak_registrasi'=>$adak_regis]);
}
public function export_excel()
{
  return Excel::download(new AdekRegistrasiExport, 'adak_registrasi.xlsx');
}

public function import_excel(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_excell',$nama_file);

		// import data
		Excel::import(new AdekRegistrasiImport, public_path('/file_excell/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/adak_registrasi');
	}
}