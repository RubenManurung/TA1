@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Mahasiswa</h2>
                        <div class="float-right">
                            <a href="{{route('mahasiswa.tambah')}}" class="btn btn-success">Tambah</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Nama</th>
                                    @foreach($kriteria as $krit)
                                        <th class="text-center">{{$krit->nama}}</th>
                                    @endforeach
                                    <th class="text-center" style="width:5%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($mahasiswa))
                                    @foreach($mahasiswa as $data)
                                        <tr>
                                            <td>{{$data->kode}}</td>
                                            <td>{{$data->nama}}</td>
                                            @foreach($data->nilai_kriteria as $nilai_kriteria)
                                                <td>{{$nilai_kriteria->nilai}}</td>
                                            @endforeach
                                            <td class="text-center">
                                                    <a href="{{route('nilai_alternatif.edit',['id' => $data->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
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