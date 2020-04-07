@extends('template')
@section('title', 'Kriteria')
@section('intro-header')
<header class="intro-header text-black">

</header>
@endsection
<br><br><br><br>
<div class="container">


<h4>Tambah Kriteria</h4>
    <form method="post" action="/Skkm/store_skkm">
    {{ method_field('POST') }}
{{csrf_field()}}
      <table>
        <tr>
          <td>DIM</td>
          <td>
            <input class="form-control" placeholder="dim" type="text" onkeyup="isi_otomatis()" name="dim_id">
            @if($errors->has('dim_id'))
            <div class="text-danger">
              {{$errors->first('dim_id')}}
            </div>
            @endif
          </td>
        </tr>
        <tr>
          <td>SKKM</td>
          <td>
            <input class="form-control" placeholder="skkm" type="text" name="skkm">
            @if($errors->has('skkm'))
            <div class="text-danger">
              {{$errors->first('skkm')}}
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
