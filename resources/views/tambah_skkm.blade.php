@extends('template')
@section('title', 'SKKM')
@section('intro-header')
<header class="intro-header text-black">

</header>
@endsection
<br><br><br><br>
<div class="container">


<h4>Tambah SKKM</h4>
    <form method="post" action="/SKKM/store_skkm">
    {{ method_field('POST') }}
{{csrf_field()}}
      <table>
        <tr>
          <td>SKKM</td>
          <td>
            <input class="form-control" placeholder="SKKM" type="text" name="skkm">
            @if($errors->has('skkm'))
            <div class="text-danger">
              {{$errors->first('skkm')}}
            </div>
            @endif
          </td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>
            <textarea class="form-control" placeholder="Keterangan SKKM" name="keterangan" rows="4" cols="40"></textarea>
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
