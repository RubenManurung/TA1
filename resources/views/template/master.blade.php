<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">Pemilihan Mahasiswa Teladan IT Del</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbar-Responsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="nav justify-content-center" id="navbarResponsive">
          <center>
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/saw">SAW</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/fuzzy_topsis">Fuzzy Topsis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/perbandingan">Perbandingan</a>
              </li>
            </ul>
          </center>
      </div>
    </div>
  </nav>
    </header>
    <hr>
    <br><br>

    {{-- Bagian Konten --}}
    <div class="container"><br>
      <h3> @yield('judul_halaman') </h3>
      @yield('konten')
    </div>


    <br><br>
    <hr>
    <footer class="py-5 bg-info">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Pemilihan Mahasiswa Teladan IT Del 2020</p>
          </div>
    </footer>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js">

    </script>
  </body>
</html>