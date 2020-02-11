@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Mahasiswa</h2>
                        {{--<form action="" class="form-inline float-right">--}}
                        {{--<div class="form-group">--}}
                        {{--<input type="text" name="q" placeholder="Carilah sesuatu" class="form-control" value="{{request('q')?request('q'):''}}">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<button type="refresh" class="btn btn-danger">Refresh</button>--}}
                        {{--</div>--}}
                        <div class="float-right">
                            <a href="{{route('mahasiswa.tambah')}}" class="btn btn-success">Tambah</a>
                        </div>
                        {{--</form>--}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">IPK</th>
                                    <th class="text-center">Nilai Perilaku</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($mahasiswa))
                                    @foreach($mahasiswa as $data)
                                        <tr>
                                            <td>{{$data->kode}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->ipk}}</td>
                                            <td>{{$data->nilaiperilaku}}</td>
                                            <td class="text-center">
                                                <form action="{{route('mahasiswa.hapus',['id' => $data->id])}}" method="POST">
                                                    @csrf                                                    
                                                    <a href="{{route('mahasiswa.edit',['id' => $data->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
