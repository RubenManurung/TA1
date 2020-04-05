@extends('template')
@section('title', 'Edit SKKM')
@section('intro-header')
<header class="intro-header text-black">

</header>
@endsection
  <br><br><br><br>
<div class="container">
  <h4>Edit SKKM</h4>
    <form method="post" action="/SKKM/update_skkm/{{ $vdata['id'] }}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
        <tr>
          <td>SKKM</td>
          <td>
            <input class="form-control" placeholder="SKKM" type="text" name="skkm" value="{{ $vdata['skkm'] }}">
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
            <textarea class="form-control" placeholder="Keterangan Kriteria" name="keterangan" rows="4" cols="40" value="{{ $vdata['keterangan'] }}"></textarea>
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
