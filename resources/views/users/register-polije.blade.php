<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo_polije.png">
  <title>
    {{ $title }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{url('assets/login/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{url('assets/login/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{url('assets/login/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{url('assets/login/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
  <!-- <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
        Argon Dashboard 2
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/profile.html">
              <i class="fa fa-user opacity-6  me-1"></i>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/sign-up.html">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/sign-in.html">
              <i class="fas fa-key opacity-6  me-1"></i>
              Sign In
            </a>
          </li>
        </ul>
        <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <a href="https://www.creative-tim.com/product/argon-dashboard" class="btn btn-sm mb-0 me-1 bg-gradient-light">Free Download</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
  <!-- End Navbar -->
  <main class="main-content mt-0">
    
  </main>

  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-40 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('/assets/login/img/career.jpg'); ">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center mx-auto">
            <h1 class="text-white mb-2 mt-3">Welcome!</h1>
            <p class="text-lead text-white">Isi data diri Anda untuk membuat akun baru di Online Assessment Test CDC Polije</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-8 col-lg-9 col-md-9 mx-auto">
          @if (session()->has('success'))
                  <div class="alert alert-success alert-dismissable fade show justify-content-between" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close" style="text-align: end"></button>
                  </div>
              @endif
              @if (session()->has('registerError'))
                  <div class="alert alert-danger alert-dismissable fade show justify-content-between" role="alert">
                    {{session('registerError')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="text-align: end; display:inline-flex; "></button>
                  </div>
              @endif
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Register Now</h5>
            </div>
    
            <div class="card-body">
              <form role="form" method="post" action="/register">
                @csrf
                <div class="mb-3">
                  <label for="jenis_kandidat">Jenis Kandidat</label>
                  <select name="jenis_kandidat" id="jenis_kandidat" aria-label="jenis_kandidat" class="form-control">
                    <option value="Mahasiswa Polije" selected>Mahasiswa Polije</option>
                    <option value="Alumni Polije">Alumni Polije</option>
                  </select>
                </div>
                
                <input type="hidden" name="perguruan_tinggi" value="Politeknik Negeri Jember">
                
                
                <div class="mb-3">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" aria-label="Name" value="{{old('nama')}}" name="nama" id="nama" required >
                  @error('nama')
                    <div class="invalid-feedback text-start" >{{$message}}</div>
                  @enderror
                </div>

                {{-- Nim dan Jenjang  --}}
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="mb-3">
                      <label for="nim">Nim</label>
                      <input type="text" class="form-control @error('nim') is-invalid @enderror" placeholder="Nim" aria-label="Nim" name="nim" id="nim" value="{{old('nim')}}" required minlength="4" maxlength="10">
                      @error('nim')
                        <div class="invalid-feedback text-start" >{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="mb-3" id="input-jenjang">
                      <label for="jenjang">Jenjang</label>
                      <select name="jenjang" id="jenjang" aria-label="jenjang" class="form-control">
                        <option value="D4/S1" selected>D4/S1</option>
                        <option value="D3">D3</option>
                        <option value="D2">D2</option>
                        <option value="D1">D1</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6 col-md-12" >
                  </div>
                  <div class="col-lg-6 col-md-12" >
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12" id="select-jurusan">
                    <div class="mb-3">
                      <label for="jurusan">Jurusan</label>
                      <select name="jurusan" id="jurusan" aria-label="jurusan" class="form-control" style="width: 100%">
                        <option value="Produksi Pertanian" selected>Produksi Pertanian</option>
                        <option value="Teknologi Pertanian">Teknologi Pertanian</option>
                        <option value="Peternakan">Peternakan</option>
                        <option value="Manajemen Agribisnis">Manajemen Agribisnis</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Bahasa, Komunikasi & Pariwisata">Bahasa, Komunikasi & Pariwisata</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Teknik">Teknik</option>
                      </select>
                    </div>

                  </div>
                  <div class="col-lg-6 col-md-12" id="select-prodi">
                    <div class="mb-3">
                      <label for="program_studi">Program Studi</label>
  
                      <select name="program_studi" id="program_studi" aria-label="program_studi" class="form-control">
                        <option value="Teknik Informatika" selected>Teknik Informatika</option>
                        <option value="Manajemen Informatika">Manajemen Informatika</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                        <option value="Teknik Informatika - Bondowoso">Teknik Informatika - Bondowoso</option>
                        <option value="Teknik Informatika - Nganjuk">Teknik Informatika - Nganjuk</option>
                        <option value="Teknik Informatika - Sidoarjo">Teknik Informatika - Sidoarjo</option>
                        <option value="Teknik Informatika - Internasional">Teknik Informatika - Internasional</option>
                        <option value="Manajemen Informatika - Internasional">Manajemen Informatika - Internasional</option>
                        <option value="Teknik Komputer - Internasional">Teknik Komputer - Internasional</option>
                        <option value="Manajemen Informasi Kesehatan">Manajemen Informasi Kesehatan</option>
                        <option value="Gizi Klinik">Gizi Klinik</option>
                        <option value="Promosi Kesehatan">Promosi Kesehatan</option>
                        <option value="Teknik Energi Terbarukan">Teknik Energi Terbarukan</option>
                        <option value="Mesin Otomotif">Mesin Otomotif</option>
                        <option value="Teknologi Rekayasa Mekatronika">Teknologi Rekayasa Mekatronika</option>
                        <option value="Produksi Tanaman Perkebukan">Produksi Tanaman Perkebukan</option>
                        <option value="Tanaman Hortikultura">Tanaman Hortikultura</option>
                        <option value="Teknik Produksi Benih">Teknik Produksi Benih</option>
                        <option value="Teknik Produksi Tanaman Pangan">Teknik Produksi Tanaman Pangan</option>
                        <option value="Budidaya Tanaman Perkebunan">Budidaya Tanaman Perkebunan</option>
                        <option value="Pengelolaan Perkebunan Kopi">Pengelolaan Perkebunan Kopi</option>
                        <option value="Keteknikan Pertanian">Keteknikan Pertanian</option>
                        <option value="Teknologi Industri Pangan">Teknologi Industri Pangan</option>
                        <option value="Teknologi Rekayasa Pangan">Teknologi Rekayasa Pangan</option>
                        <option value="Teknologi Industri Pangan - Bondowoso">Teknologi Industri Pangan - Bondowoso</option>
                        <option value="Produksi Ternak">Produksi Ternak</option>
                        <option value="Manajemen Bisnis Unggas">Manajemen Bisnis Unggas</option>
                        <option value="Teknologi Pakan Ternak">Teknologi Pakan Ternak</option>
                        <option value="Manajemen Agribisnis">Manajemen Agribisnis</option>
                        <option value="Manajemen Agroindustri">Manajemen Agroindustri</option>
                        <option value="Akuntansi Sektor Publik">Akuntansi Sektor Publik</option>
                        <option value="Manjemen Pemasaran Internasional">Manjemen Pemasaran Internasional</option>
                        <option value="Manjemen Agribisnis - Bondowoso">Manjemen Agribisnis - Bondowoso</option>
                        <option value="Manjemen Agribisnis - Nganjuk">Manjemen Agribisnis - Nganjuk</option>
                        <option value="Manjemen Agroindustri - Sidoarjo">Manjemen Agroindustri - Sidoarjo</option>
                        <option value="Manjemen Agroindustri - Internasional">Manjemen Agroindustri - Internasional</option>
                        <option value="Agribisnis S2">Agribisnis S2</option>
                        <option value="Bahasa Inggris Terapan">Bahasa Inggris Terapan</option>
                        <option value="Destinasi Pariwisata">Destinasi Pariwisata</option>
                        
                      </select>
                    </div>

                  </div>
                </div>

             
                
                {{-- Email dan No. Telp  --}}
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="mb-3">
                      <label for="email">Email</label>
                      <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" name="email" id="email" value="{{old('email')}}" required minlength="4" maxlength="255">
                      @error('email')
                        <div class="invalid-feedback text-start" >{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="mb-3">
                      <label for="no_telp">Nomor Telepon</label>
                      <input type="tel" class="form-control no_telp" placeholder="No. Telp" aria-label="No. Telp" name="no_telp" id="no_telp" value="{{old('no_telp')}}" required minlength="9" maxlength="15">
                      @error('no_telp')
                      <div class="invalid-feedback text-start" >{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" name="password" id="password" required minlength="8" maxlength="255">
                  @error('password')
                  <div class="invalid-feedback text-start" >{{$message}}</div>
                  @enderror
                </div>
          
                <div class="form-check form-check-info text-start">
                  <input class="form-check-input" type="checkbox" value="" id="agree" name="agree" required>
                  <label class="form-check-label" for="agree">
                    I agree the <a href="" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" role="button">Sign up</button>
                </div>
                <p class="text-sm mt-3 mb-0">Already have an account? <a href="/login" class="text-dark font-weight-bolder">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <!-- <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Company
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Team
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Pricing
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div> -->
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Soft by JTI ASIK Team.
          </p>
        </div>
      </div>
    </div>
  </footer>

  @include('sweetalert::alert')
  
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="{{url('assets/login/js/core/popper.min.js')}}"></script>
  <script src="{{url('assets/login/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('assets/login/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('assets/login/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#jenis_kandidat').on('change', function() {
        if (this.value == 'Umum') {
          $('#input-nim').hide();
          $('#select-prodi').hide();
          $('#select-jurusan').hide();
          $('#input-jurusan').show();
          $('#input-prodi').show();
          $('#input-ptn').show();
        } else {
          $('#input-nim').show()
          $('#select-prodi').show()
          $('#select-jurusan').show()
          $('#input-jurusan').hide();
          $('#input-prodi').hide();
          $('#input-ptn').hide();
        }
      })
    })
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{url('assets/login/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>