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
        <a class="nav-link {{ request()->is('Skkm') ? 'active': null }}" href="{{ url('Skkm') }}" role="tab">SKKM</a>
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
            <a href="{{ url('/route_tambah_krt_saw') }}">
              <img class="img-fluid" alt="Responsive image" src="template_madan/images/iconplus.png">
              Tambah Data
            </a>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; ?>
        <?php
        if (is_array($vdata) || is_object($vdata) ){ ?>
        @foreach($vdata as $kriteria)
        <tr>
          <td><?php echo($i++); ?></td>
          <td>{{$kriteria['kode']}}</td>
          <td>{{$kriteria['nama']}}</td>
          <td>{{$kriteria['atribut']}}</td>
          <td>{{$kriteria['bobot']}}</td>
          <td>{{$kriteria['keterangan']}}</td>
          <td>
            <a href="/edit_kriteria/{{ $kriteria['id'] }}">
              <img style="width:10%; height: auto;" alt="Responsive image" src="template_madan/images/edit.png">
            </a>
            <a href="/hapus_kriteria/{{ $kriteria['id'] }}">
              <img style="width:10%; height: auto;" src="template_madan/images/delete.png" alt="Responsive image">
            </a>
          </td>
          <td>
            <?php
              if($kriteria['atribut'] == "Benefit"){
                echo "VeryHigh";
                }
                else if($kriteria['atribut'] == "Cost"){
                echo "Very Low";
                }
                else{
                echo "Kriteria tidak tersedia";
                }
             ?>
          </td>
        </tr>
        @endforeach
      <?php } ?>
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
        <th>ta</th>
        <th>sem_ta</th>
          <tr>
           <?php $no=1; ?>
           <?php if (is_array($krt) || is_object($krt)){ ?>
           @foreach ($krt as $dt_mhs)
           <td><?php echo($no++); ?></td>
            <td>{{ $dt_mhs['nama'] }}</td>
              <td>{{ $dt_mhs['IPK'] }}</td>
              <td>{{ $dt_mhs['akumulasi_skor'] }}</td>
              <td>{{ $dt_mhs['ta']}}</td>
              <td>{{ $dt_mhs['sem_ta'] }}</td>
          </tr>
@endforeach
<?php } ?>
        </table>
        
  </div>



<!-- Tab panes -->
<div class="tab-pane {{ request()->is('Skkm') ? 'active': null }}" href="{{ url('Skkm') }}" role="tabpanel">
    <h3>Data SKKM</h3>
      <table class="table">
        <th>No</th>
        <th>Nama</th>
        <th>SKKM</th>
        <th>Aksi</th>
        <tr>
           <?php $no=1; ?>
           <?php if (is_array($krt) || is_object($krt)){ ?>
           @foreach ($krt as $dt_mhs)
           <td><?php echo($no++); ?></td>
            <td>{{ $dt_mhs['nama'] }}</td>
            <td>{{ $dt_mhs['skkm'] }}</td>
              <td class="text-center"><a href="Skkm/edit_skkm/{{ $dt_mhs['id'] }}" class="btn btn-sm btn-warning">Edit</a></td>
          </tr>
          @endforeach
<?php } ?> 
        </table>
  </div>



  <div class="tab-pane {{ request()->is('Penilaian') ? 'active': null }}" href="{{ url('Penilaian') }}" role="tabpanel">
    <h3>Normalisasi</h3>
      <table class="table">
        <th>No</th>
        <th>Nama</th>
        <th>Nilai IPK</th>
        <th>Nilai Perilaku</th>
        <th>Nilai</th>
        <th>SKKM</th>
          <tr>


          

          <?php $no=1; ?>
          
           <?php if (is_array($krt) || is_object($krt)){ 
             $max = (float)$krt[0]['IPK'];
             $min = $krt[0]['akumulasi_skor'];
             foreach($krt as $data){
                if($data['IPK'] > $max){ $max = $data['IPK'];}
                if($data['akumulasi_skor'] < $min){ $min = $data['akumulasi_skor'];}
             }
             
            ?>
           @foreach ($krt as $dt_mhs)
           <td><?php echo($no++); ?></td>
            <td>{{ $dt_mhs['nama'] }}</td>
              <td>
              <?php 
              $normalisasi = number_format(($dt_mhs['IPK'] / $max), 2); 
              ?>
              {{$normalisasi}}
              </td>
              <td>
              <?php $normali = number_format(( $min / $dt_mhs['akumulasi_skor'] ), 2);
               ?>
              {{$normali}}
              </td>
              <td>
              <?php 
              $total = number_format(((0.5 * $normalisasi) + (0.5 *$normali)), 2);
              ?>
              {{$total}}
              </td>
              <td><form  method="POST">
               @csrf
                  <a href="{{url('Skkm')}}" class="btn btn-sm btn-info">Tambah SKKM</a>
               </form>
              </td>
          </tr>
          @endforeach
<?php } ?>

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
