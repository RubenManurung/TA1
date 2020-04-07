@extends('template')
@section('title', 'Fuzzy Topsis')
@section('intro-header')
<header class="intro-header text-black">

</header>
@endsection
  <br><br><br><br>
<div class="container">
  <h4>Edit Kriteria</h4>
    <form method="post" action="/Kriteria/update_kriteria/{{ $vdata['id'] }}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <table>
        <tr>
          <td>Kode Kriteria</td>
          <td>
            <input class="form-control" placeholder="Kode Kriteria" type="text" onkeyup="isi_otomatis()" name="kode" value="{{ $vdata->kode}}">
            @if($errors->has('kode'))
            <div class="text-danger">
              {{$errors->first('kode')}}
            </div>
            @endif
          </td>
        </tr>
        <tr>
          <td>Kriteria</td>
          <td>
            <input class="form-control" placeholder="Nama Kriteria" type="text" name="nama" value="{{ $vdata->nama }}">
            @if($errors->has('nama'))
            <div class="text-danger">
              {{$errors->first('nama')}}
            </div>
            @endif
          </td>
        </tr>
        <tr>
          <td>Nilai Attribut</td>
          <td>
            <select class="form-control" placeholder="Nilai Atribut" name="atribut" value="{{ $vdata->atribut }}">
              <option value="Benefit">Benefit</option>
              <option value="Cost">Cost</option>
            </select>
            @if($errors->has('atribut'))
            <div class="text-danger">
              {{$errors->first('atribut')}}
            </div>
            @endif
          </td>
        </tr>
        <tr>
          <td>Bobot</td>
          <td>
            <input class="form-control" placeholder="Bobot Kriteria" type="text" name="bobot" value="{{ $vdata->bobot }}">
            @if($errors->has('bobot'))
            <div class="text-danger">
              {{$errors->first('bobot')}}
            </div>
            @endif
          </td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>
            <textarea class="form-control" placeholder="Keterangan Kriteria" name="keterangan" rows="4" cols="40" value="{{ $vdata->keterangan }}"></textarea>
            @if($errors->has('keterangan'))
            <div class="text-danger">
              {{$errors->first('keterangan')}}
            </div>
            @endif
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <button type="submit" value="simpan">SIMPAN</button>
          </td>
        </tr>
      </table>
    </form>
</div>
