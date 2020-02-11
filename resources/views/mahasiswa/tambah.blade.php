@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Tambah Mahasiswa</h2>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('mahasiswa.simpan')}}" method="POST" class="col-md-12">
                                @csrf
                                <div class="form-group">
                                    <label for="kode">Kode <span class="text-danger">*</span></label>
                                    <input type="text" name="kode" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="ipk">IPK <span class="text-danger">*</span></label>
                                    <input type="text" name="ipk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nilaiperilaku">Nilai Perilaku <span class="text-danger">*</span></label>
                                    <input type="text" name="nilaiperilaku" class="form-control">
                                </div>                                
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection