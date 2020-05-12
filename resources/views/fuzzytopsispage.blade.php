@extends('template')
@section('title', 'Fuzzy Topsis')
@section('intro-header')

  <!-- Header -->
  <header class="intro-header text-black">

  </header>
  <!-- END : Header -->
@endsection

  <!-- Main -->
  <br><br><br><br>
  <div class="container">
  <!-- <h1>Fuzzy Topsis</h1> -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('MahasiswaFT') }}" role="tab">Data Mahasiswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('PenilaianFT') }}" role="tab">Data Penilaian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('PerhitunganFT') }}" role="tab">Data Perhitungan</a>
      </li>
    </ul>

  <div class="tab-pane {{ request()->is('MahasiswaFT') ? 'active': null }}" href="{{ url('MahasiswaFT') }}" role="tabpanel">
    <h3>Mahasiswa</h3>
    <a href="#" class="btn btn-info btn-md">Seleksi Awal</a>
      <table class="table table-striped table-hover">
        <th>No</th>
        <th>Nama</th>
        <th>Nilai IPK</th>
        <th>Nilai Prilaku</th>
        <th>ta</th>
        <th>sem_ta</th>
        <th>Nilai IPK FT</th>
        <th>Nilai Prilaku FT</th>
          <tr>
            <?php $no=1; ?>
            <?php if (is_array($krt_ft) || is_object($krt_ft)){ ?>
            @foreach( $krt_ft as $dt_mhs)
            <td><?php echo($no++); ?></td>
            <td>{{ $dt_mhs['nama'] }}</td>
              <td>{{ $dt_mhs['nr'] }}</td>
              <td>{{ $dt_mhs['akumulasi_skor'] }}</td>
              <td>{{ $dt_mhs['ta']}}</td>
              <td>{{ $dt_mhs['sem_ta']}}</td>


            <td>
              <?php
              $IPK = number_format($dt_mhs['nr']);
               if ( $IPK  >=3.3 &&  $IPK <=4) {
               	echo "VeryHigh";
               }
               else if(  $IPK>=2.5 &&  $IPK <= 3.2){
               echo "High";
               }
               else if( $IPK >=1.7 &&  $IPK <= 2.4){
               echo "Average";
               }
               else if( $IPK >=0.9 &&  $IPK <=1.6){
               echo "Low";
               }
               else if( $IPK >=0.0 &&  $IPK <=0.8){
               echo "VeryLow";
               }
               else{
               	echo"IPK tidak lebih dari 4 dan tidak boleh negatif";
               }
               ?>
            </td>
            <td>
              <?php
              $prilaku = number_format($dt_mhs['akumulasi_skor']);
               if ( $prilaku  >=21 &&  $prilaku <=100) {
                echo "VeryHigh";
               }
               else if(  $prilaku>=16 &&  $prilaku <= 20){
               echo "High";
               }
               else if( $prilaku >=11 &&  $prilaku <= 15){
               echo "Average";
               }
               else if( $prilaku >=6 &&  $prilaku <=10){
               echo "Low";
               }
               else if( $prilaku >=0 &&  $prilaku <=5){
               echo "VeryLow";
               }
               else{
                echo"Prilaku tidak lebih dari 100 dan tidak boleh negatif";
               }
               ?>
            </td>
          </tr>
          @endforeach
        <?php } ?>
        </table>
  </div>

  <!-- <div class="tab-pane {{ request()->is('PenilaianFT') ? 'active': null }}" href="{{ url('PenilaianFT') }}" role="tabpanel">
    <h3>Penilaian</h3>
    <table class="table table-striped table-hover">
      <th>No</th>
      <th>Nama</th>
      <th>Nilai IPK</th>
      <th>Nilai Prilaku</th>
      <th>ta</th>
      <th>sem_ta</th>
      <th>Nilai IPK FT</th>
      <th>Nilai Prilaku FT</th>
        <tr>
          <?php $no=1; ?>
          <?php if (is_array($krt_ft) || is_object($krt_ft)){ ?>
          @foreach( $krt_ft as $dt_mhs)
          <td><?php echo($no++); ?></td>
          <td>{{ $dt_mhs['nama'] }}</td>
            <td>{{ $dt_mhs['nr'] }}</td>
            <td>{{ $dt_mhs['akumulasi_skor'] }}</td>
            <td>{{ $dt_mhs['ta']}}</td>
            <td>{{ $dt_mhs['sem_ta']}}</td>


          <td>
            <?php
            $IPK = number_format($dt_mhs['nr']);
             if ( $IPK  >=3.3 &&  $IPK <=4) {
              echo "VeryHigh";
             }
             else if(  $IPK>=2.5 &&  $IPK <= 3.2){
             echo "High";
             }
             else if( $IPK >=1.7 &&  $IPK <= 2.4){
             echo "Average";
             }
             else if( $IPK >=0.9 &&  $IPK <=1.6){
             echo "Low";
             }
             else if( $IPK >=0.0 &&  $IPK <=0.8){
             echo "VeryLow";
             }
             else{
              echo"IPK tidak lebih dari 4 dan tidak boleh negatif";
             }
             ?>
          </td>
          <td>
            <?php
            $prilaku = number_format($dt_mhs['akumulasi_skor']);
             if ( $prilaku  >=21 &&  $prilaku <=100) {
              echo "VeryHigh";
             }
             else if(  $prilaku>=16 &&  $prilaku <= 20){
             echo "High";
             }
             else if( $prilaku >=11 &&  $prilaku <= 15){
             echo "Average";
             }
             else if( $prilaku >=6 &&  $prilaku <=10){
             echo "Low";
             }
             else if( $prilaku >=0 &&  $prilaku <=5){
             echo "VeryLow";
             }
             else{
              echo"Prilaku tidak lebih dari 100 dan tidak boleh negatif";
             }
             ?>
          </td>
        </tr>
        @endforeach
      <?php } ?>
            <button type="button" name="button">SELEKSI</button>
      </table>
  </div> -->
</div>
  </div>
</body>
