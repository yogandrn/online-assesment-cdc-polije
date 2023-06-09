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
      <form role="form" method="post" action="/register" id="">
        @csrf
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
              <h5>Daftar Sekarang</h5>
            </div>
    
            <div class="card-body">
                <div class="mb-3">
                  <label for="jenis_kandidat">Pilih Kandidat - Mahasiswa / Alumni</label>
                  <select name="jenis_kandidat" id="jenis_kandidat" aria-label="jenis_kandidat" class="form-control custom-select">
                    <option value="Alumni Polije" selected>Alumni Polije</option>
                    <option value="Mahasiswa Polije" >Mahasiswa Polije</option>
                  </select>
                </div>
                
                <input type="hidden" name="perguruan_tinggi" value="Politeknik Negeri Jember">
                
                
                <div class="mb-3">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" aria-label="Name" value="{{old('nama')}}" name="nama" id="nama" required onchange="validate()">
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
                        <option value="S2 Magister Terapan" selected>S2 Magister Terapan</option>
                        <option value="D4" selected>D4</option>
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
                        <option value="Bahasa, Komunikasi dan Pariwisata">Bahasa, Komunikasi dan Pariwisata</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Teknik">Teknik</option>
                        <option value="Bisnis">Bisnis</option>
                      </select>
                    </div>
                    
                  </div>
                  <div class="col-lg-6 col-md-12" id="select-prodi">
                    <div class="mb-3">
                      <label for="program_studi">Program Studi</label>
                      
                      <select name="program_studi" id="program_studi" aria-label="program_studi" class="form-control">
                        <option value="Produksi Tanaman Hortikultura" selected>Produksi Tanaman Hortikultura</option>
                        <option value="Produksi Tanaman Perkebunan">Produksi Tanaman Perkebunan</option>
                        <option value="Teknik Produksi Benih">Teknik Produksi Benih</option>
                        <option value="Teknologi Produksi Tanaman Pangan">Teknologi Produksi Tanaman Pangan</option>
                        <option value="Budidaya Tanaman Perkebunan">Budidaya Tanaman Perkebunan</option>
                        <option value="Pengelolaan Perkebunan Kopi">Pengelolaan Perkebunan Kopi</option>
                        
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
                      <input type="tel" class="form-control @error('no_telp') is-invalid @enderror" placeholder="No. Telp" aria-label="No. Telp" name="no_telp" id="no_telp" value="{{old('no_telp')}}" required minlength="9" maxlength="15">
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
                  <div class="invalid-feedback text-start" >{{  $message}}</div>
                  @enderror
                </div>
          
                <div class="form-check form-check-info text-start">
                  <input class="form-check-input" type="checkbox" value="" id="agree" name="agree" required>
                  <label class="form-check-label" for="agree">
                    Saya menyutujui syarat dan ketentuan yang berlaku
                    {{-- Saya menyutujui <a href="" class="text-dark font-weight-bolder">Syarat dan Ketentuan</a> yang berlaku --}}
                  </label>
                </div>
                <div class="text-center">
                  <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#example">
                    Daftar
                  </button>
                </div>
                <p class="text-sm mt-3 mb-0">Sudah mempunyai akun? <a href="/login" class="text-dark font-weight-bolder">Login</a></p>
              </div>
            </div>
          </div>
        </div>
      
        {{-- Modal Konfirmasi Data  --}}
        <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleLabel">Konfirmasi Data</h5>
              {{-- <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close" style="color: brown"><i class="tim-icons icon-simple-remove"></i></button> --}}
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin semua data sudah benar ?</p>
              <p>Data yang Anda masukkan tidak akan bisa dirubah.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      
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

  {{-- @include('sweetalert::alert') --}}
  
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="{{url('assets/login/js/core/popper.min.js')}}"></script>
  <script src="{{url('assets/login/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('assets/login/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('assets/login/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
        
        function validate() {
          let nama = document.getElementById('nama');
          let value = nama.value;
          console.log(value);

          
        }

        $('#nama').change(function () {
          let nama = $(this).val();
          if (nama.length < 4 && nama.length > 50) {
            $(this).addClass('is-invalid');
          }
        });

          // Menangkap perubahan pada select jurusan
          $('#jurusan').change(function() {
              let jurusan = $(this).val();
              
              // Kosongkan opsi program studi saat memilih jurusan baru
              $('#program_studi').empty();
              
              // Ambil data program studi sesuai dengan jurusan yang dipilih
              if (jurusan === 'Produksi Pertanian') {
                  // Opsi program studi untuk jurusan 1
                  $('#program_studi').append('<option value="Produksi Tanaman Hortikultura" selected>Produksi Tanaman Hortikultura</option>');
                  $('#program_studi').append('<option value="Produksi Tanaman Perkebunan">Produksi Tanaman Perkebunan</option>');
                  $('#program_studi').append('<option value="Teknik Produksi Benih">Teknik Produksi Benih</option>');
                  $('#program_studi').append('<option value="Teknologi Produksi Tanaman Pangan">Teknologi Produksi Tanaman Pangan</option>');
                  $('#program_studi').append('<option value="Budidaya Tanaman Perkebunan">Budidaya Tanaman Perkebunan</option>');
                  $('#program_studi').append('<option value="Pengelolaan Perkebunan Kopi">Pengelolaan Perkebunan Kopi</option>');
                  // Tambahkan opsi program studi lainnya untuk jurusan 1
              } else if (jurusan === 'Teknologi Pertanian') {
                $('#program_studi').append('<option value="Keteknikan Pertanian" selected>Keteknikan Pertanian</option>');
                $('#program_studi').append('<option value="Teknologi Industri Pangan">Teknologi Industri Pangan</option>');
                $('#program_studi').append('<option value="Teknologi Rekayasa Pangan">Teknologi Rekayasa Pangan</option>');
                
              } else if (jurusan === 'Peternakan') {
                $('#program_studi').append('<option value="Produksi Ternak">Produksi Ternak</option>');
                $('#program_studi').append('<option value="Manajemen Bisnis Unggas">Manajemen Bisnis Unggas</option>');
                $('#program_studi').append('<option value="Teknologi Pakan Ternak">Teknologi Pakan Ternak</option>');
                
              } else if (jurusan === 'Manajemen Agribisnis') {
                $('#program_studi').append('<option value="Manajemen Agribisnis - PSDKU Bondowoso" selected>Manajemen Agribisnis - PSDKU Bondowoso</option>');
                $('#program_studi').append('<option value="Manajemen Agribisnis - PSDKU Nganjuk">Manajemen Agribisnis - PSDKU Nganjuk</option>');
                $('#program_studi').append('<option value="Manajemen Agroindustri - PSDKU Sidoarjo">Manajemen Agroindustri - PSDKU Sidoarjo</option>');
                $('#program_studi').append('<option value="Manajemen Agroindustri - Internasional">Manajemen Agroindustri - Internasional</option>');
                $('#program_studi').append('<option value="S2 Agribisnis">S2 Agribisnis</option>');
                
              }  else if (jurusan === 'Teknologi Informasi') {
                $('#program_studi').append('<option value="Teknik Komputer" selected>Teknik Komputer</option>');
                $('#program_studi').append('<option value="Manajemen Informatika">Manajemen Informatika</option>');
                $('#program_studi').append('<option value="Teknik Informatika">Teknik Informatika</option>');
                $('#program_studi').append('<option value="Teknik Komputer - Internasional">Teknik Komputer - Internasional</option>');
                $('#program_studi').append('<option value="Manajemen Informatika - Internasional">Manajemen Informatika</option>');
                $('#program_studi').append('<option value="Teknik Informatika - Internasional">Teknik Informatika</option>');
                $('#program_studi').append('<option value="Teknik Informatika - PSDKU Bondowoso">Teknik Informatika - PSDKU Bondowoso</option>');
                $('#program_studi').append('<option value="Teknik Informatika - PSDKU Nganjuk">Teknik Informatika - PSDKU Nganjuk</option>');
                $('#program_studi').append('<option value="Teknik Informatika - PSDKU Sidoarjo">Teknik Informatika - PSDKU Sidoarjo</option>');

              } else if (jurusan === 'Bahasa, Komunikasi dan Pariwisata') {
                  // Opsi program studi untuk jurusan 2
                $('#program_studi').append('<option value="Bahasa Inggris" selected>Bahasa Inggris</option>');
                $('#program_studi').append('<option value="Destinasi Pariwisata">Destinasi Pariwisata</option>');
              }  else if (jurusan === 'Kesehatan') {
                $('#program_studi').append('<option value="Manajemen Informasi Kesehatan" selected>Manajemen Informasi Kesehatan</option>');
                $('#program_studi').append('<option value="Gizi Klinik">Gizi Klinik</option>');
                $('#program_studi').append('<option value="Promosi Kesehatan">Promosi Kesehatan</option>');
                
              }  else if (jurusan === 'Teknik') {
                $('#program_studi').append('<option value="Teknik Energi Terbarukan" selected>Teknik Energi Terbarukan</option>');
                $('#program_studi').append('<option value="Mesin Otomotif">Mesin Otomotif</option>');
                $('#program_studi').append('<option value="Teknologi Rekayasa Mekatronika">Teknologi Rekayasa Mekatronika</option>');
                
              } else if (jurusan === 'Bisnis') {
                $('#program_studi').append('<option value="Akuntansi Sektor Publik" selected>Akuntansi Sektor Publik</option>');
                $('#program_studi').append('<option value="Manajemen Pemasaran Internasional">Manajemen Pemasaran Internasional</option>');

              }
          });
      });


    let form = document.getElementById('myForm');

    // Tambahkan event listener untuk event 'submit'
    form.addEventListener('submit', function(event) {
        // Mencegah form submit secara default
        event.preventDefault();

        // Lakukan validasi manual pada form
        if (form.checkValidity() === false) {
            event.stopPropagation();
        }

        // Tandai form sebagai sudah divalidasi
        form.classList.add('was-validated');
    }, false);
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