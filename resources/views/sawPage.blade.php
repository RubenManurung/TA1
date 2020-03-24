@extends('template')
@section('title', 'SAW')
@section('intro-header')
  <!-- Header -->
  <header class="intro-header text-black">

  </header>
  <!-- END : Header -->
@endsection

  <!-- Main -->
  <br><br><br><br>
  <div class="container">
  <h1>SAW</h1>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('Kriteria') ? 'active': null }}" href="{{ url('Kriteria') }}" role="tab">Data Kriteria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('Mahasiswa') ? 'active': null }}" href="{{ url('Mahasiswa') }}" role="tab">Data Mahasiswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('Penilaian') ? 'active': null }}" href="{{ url('Penilaian') }}" role="tab">Data Penilaian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('Perhitungan') ? 'active': null }}" href="{{ url('Perhitungan') }}" role="tab">Third Panel</a>
      </li>
    </ul>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane {{ request()->is('Kriteria') ? 'active': null }}" href="{{ url('Kriteria') }}" role="tabpanel">
    <h3>Data Kriteria</h3>
    <table class="table table-borderless">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Kriteria</th>
          <th>Nama Kriteria</th>
          <th>Nilai Atribut</th>
          <th>Bobot</th>
          <th>Keterangan</th>
          <th>Action</th>
          <th>
            <a href="{{ url('Kriteria/route_tambah_krt_saw') }}">
              <img class="img-fluid" alt="Responsive image" src="template_madan/images/iconplus.png">
              Tambah Data
            </a>
          </th>
        </tr>
      </thead>
      <tbody>
      <?php $nomor=1; ?>
        @foreach($vdata as $kriteria)
        <tr>
          <td><?php echo ($nomor++); ?></td>
          <td>{{ $kriteria['kode'] }}</td>
          <td>{{ $kriteria['nama'] }}</td>
          <td>{{ $kriteria['atribut'] }}</td>
          <td>{{ $kriteria['bobot'] }}</td>
          <td>{{ $kriteria['keterangan'] }}</td>
          <td>
            <a href="/Kriteria/edit_kriteria/{{ $kriteria['id'] }}">
              <img style="width:10%; height: auto;" alt="Responsive image" src="template_madan/images/edit.png">
            </a>
            <a href="/Kriteria/hapus_kriteria/{{ $kriteria['id'] }}">
              <img style="width:10%; height: auto;" src="template_madan/images/delete.png" alt="Responsive image">
            </a>
          </td>
          <td>
            
          </td>
        </tr>
   @endforeach
      </tbody>
    </table>
  </div>


  <div class="tab-pane {{ request()->is('Mahasiswa') ? 'active': null }}" href="{{ url('Mahasiswa') }}" role="tabpanel">
    <h3>Mahasiswa</h3>
      <table class="table">
        <th>No</th>
        <th>Nama</th>
        <th>Nilai IPK</th>
        <th>Nilai Prilaku</th>
        <th>TA</th>
        <th>Sem TA</th>
          <tr>
           <?php $no=1; ?>
           @foreach ($krt as $dt_mhs)
            <td><?php echo($no++) ?></td>
            <td>{{$dt_mhs->nama}}</td>
            <td>{{$dt_mhs->nr}}</td>
            <td>{{$dt_mhs->akumulasi_skor}}</td>
            <td>{{$dt_mhs->ta}}</td>
            <td>{{$dt_mhs->sem_ta}}</td>

          </tr>
@endforeach
        </table>
  </div>

  <div class="tab-pane {{ request()->is('Penilaian') ? 'active': null }}" href="{{ url('Penilaian') }}" role="tabpanel">
    <h3>Penilaian</h3>
      <table class="table">
        <th>No</th>
        <th>Nama</th>
        <th>Nilai IPK</th>
        <th>Nilai Prilaku</th>
          <tr>
            <td>sdasda</td>
            <td>asd</td>
            <td>asd</td>
            <td>asda</td>
          </tr>
          <button type="button" name="button">Seleksi</button>
        </table>
  </div>

  <div class="tab-pane {{ request()->is('Perhitungan') ? 'active': null }}" href="{{ url('Perhitungan') }}" role="tabpanel">
    <h3>Kriteria</h3>
      <table class="table">
        <th>No</th>
        <th>Alternatif</th>
        <th>C01</th>
        <th>C02</th>
        <th>SKKM</th>
          <tr>
            <td>sdasda</td>
            <td>asd</td>
            <td>asd</td>
            <td>asda</td>
            <td>asda</td>
          </tr>
      </table>
      <button type="button" name="button">Seleksi SKKM</button>
  <h4>Hasil Ranking</h4>
    <table class="table">
      <th>No</th>
      <th>Alternatif</th>
      <th>Ranking</th>
        <tr>
          <td>sdasda</td>
          <td>asd</td>
          <td>asd</td>
        </tr>
    </table>
    <span onclick="this.parentElement.style.display='none'"></span>
  </div>
</div>
  </div>
</body>
