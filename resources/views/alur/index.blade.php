@extends('layouts.app')
<?php use App\Alur; ?>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck">
                <div class="card">
                    <!-- <div class="card-header">
                        <h3 class="float-left">Hasil Analisa</h3>
                    </div> -->

                    <div class="card-body" hidden>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    @foreach($kriteria as $krit)
                                        <th class="text-center">{{$krit->nama}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($mahasiswa))
                                    @foreach($mahasiswa as $data)
                                        <tr>
                                            <td>{{$data->nama}}</td>
                                            @foreach($data->nilai_kriteria as $nilai_kriteria)
                                                <td>{{$nilai_kriteria->nama}}</td>
                                            @endforeach
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

                        <div class="table-responsive" >
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    @foreach($kriteria as $krit)
                                        <th class="text-center">{{$krit->kode}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($mahasiswa))
                                    @foreach($mahasiswa as $data)
                                        <tr>
                                            <td>{{$data->kode}}</td>
                                            @foreach($data->nilai_kriteria as $nilai_kriteria)
                                                <td>{{$nilai_kriteria->nilai}}</td>
                                            @endforeach
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

            <div class="col-md-12 card-deck mt-4" hidden>
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Normalisasi</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <?php $bobot = [] ?>
                                    @foreach($kriteria as $krit)
                                        <?php $bobot[$krit->id] = $krit->bobot ?>
                                        <th class="text-center">{{$krit->kode}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($mahasiswa))
                                    <?php $rangking = []; ?>
                                    @foreach($mahasiswa as $data)
                                        <tr>
                                            <td>{{$data->kode}}</td>
                                            <?php $total = 0;?>
                                            @foreach($data->nilai_kriteria as $nilai_kriteria)
                                                @if($nilai_kriteria->kriteria->atribut == 'cost')
                                                    <?php $normalisasi = ($kode_krit[$nilai_kriteria->kriteria->id]/$nilai_kriteria->nilai); ?>
                                                @elseif($nilai_kriteria->kriteria->atribut == 'benefit')
                                                    <?php $normalisasi = ($nilai_kriteria->nilai/$kode_krit[$nilai_kriteria->kriteria->id]); ?>
                                                @endif
                                                    <?php $total = $total+($bobot[$nilai_kriteria->kriteria->id]*$normalisasi);?>
                                                    <td>{{$normalisasi}}</td>
                                            @endforeach
                                            <?php $rangking[] = [
                                                'kode'  => $data->kode,
                                                'nama'  => $data->nama,
                                                'total' => $total
                                            ]; ?>
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
            <div class="col-md-12 card-deck mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Ranking</h3>
                    </div>
                    <div class="card-body" >
                        {{ csrf_field() }}
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Total</th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                usort($rangking, function($a, $b)
                                {
                                    return $a['total']<=>$b['total'];
                                });
                                rsort($rangking);
                                $a = 1;
                                        foreach ($rangking as $data) {
                                            # code...
                                            $alur = new Alur();
                                            $alur->kode = $data['kode'];
                                            $alur->nama = $data['nama'];
                                            $alur->total= $data['total'];

                                        $alur->save();
                                
                                                
                                            
                                        }
                                ?>
                                    @foreach($rangking as $t)
                                        <tr >
                                            <td>{{$t['kode']}}</td>
                                            <td>{{$t['nama']}}</td>
                                            <td>{{$t['total']}}</td>
                                            <td>{{$a++}}</td>                       
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection