
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/logo_polije.png">
  <title>
    Online Test Assessment CDC Polije
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ url('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ url('/assets/css/blk-design-system.css?v=1.0.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ url('/assets/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="index-page">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent" color-on-scroll="dark">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/blk-design-system/index.html" rel="tooltip" title="Designed and Coded by JTI ASIK Tim" data-placement="bottom" target="_blank">
          <span>CDC Polije •</span> Online Personal Test
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                Welcome •
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Message us on Whatsapp" data-placement="bottom" href="https://wa.me/+628113591500" target="https://wa.me/+628113591500">
              <i class="fab fa-whatsapp"></i>
              <p class="d-lg-none d-xl-none">Whatsapp</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://web.facebook.com/jpc.polije?_rdc=1&_rdr" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Linkedin" data-placement="bottom" href="https://www.linkedin.com/in/job-placement-center-ab33a61a4/" target="_blank">
              <i class="fab fa-linkedin"></i>
              <p class="d-lg-none d-xl-none">Linkedin</p>
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="fa fa-cogs d-lg-none d-xl-none"></i> Services
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <!-- <a href="https://demos.creative-tim.com/blk-design-system/docs/1.0/getting-started/overview.html" class="dropdown-item">
              </a> -->
              <a href="/users/gayakepribadian" class="dropdown-item">
                <i class="tim-icons icon-bullet-list-67"></i>Gaya Kepribadian
              </a>
              <a href="/users/minatkarir" class="dropdown-item">
                <i class="tim-icons icon-image-02"></i>Minat Karir
              </a>
            </div>
          </li>
          <li class="nav-item p-0 d-sm-block">
            <a class="nav-link btn btn-warning d-lg-block px-4 py-2" href="/login" data-placement="bottom">
              Login
            </a>
          </li>

          {{-- @auth      
            <li class="nav-item">
              <form action="/logout" method="post">
                @csrf
              <button type="submit" class="nav-link btn btn-default d-none d-lg-block"role="button">Logout</button></form>
            </li>
          @else
          <li class="nav-item">
            <a class="nav-link btn btn-warning d-none d-lg-block px-4 py-2" href="/login">
              Login
            </a>
          </li>
          @endauth --}}

        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header header-filter">
      <!-- <div class="squares square1"></div> -->
      <!-- <div class="squares square2"></div> -->
      <div class="squares square3"></div>
      <div class="squares square4"></div>
      <div class="squares square5"></div>
      <div class="squares square6"></div>
      <div class="squares square7"></div>
      <div class="container">
        <div class="content-center  row justify-content-center">
              <div class="col-xl-8 col-lg 8 col-md-9 col-sm-12">
              <h2 class="font-weight-bold" style="color: white; font-size: 3.6rem;">Welcome</h2>
              <h3 class="mx-3">Selamat Datang pengguna fasilitas layanan <em>Online Personal Test</em> CDC Polije.</h3>
              <a href="#about" class="btn btn-warning btn-sm px-5 py-3" data-target="#about" role="button">
                About us
              </a>
            </div>
            
          </div>
      </div>
    </div>

    <div class="section" id="about">
          <div class="container">
            <div class="title" >
              {{-- <h3>About us</h3> --}}
            </div>
            <div class="row justify-content-between align-items-center">
              <div class="col-lg-5 mb-5 mb-lg-0 ">
                <h1 class="text-white font-weight-light">Online Personal Test</h1>
                <p class="text-white mt-4">Layanan ini merupakan salah satu bagian dari pusat karir milik CDC Polije,
                  saat ini kami memiliki layanan untuk personal test Gaya Kepribadian dan Test Minat Karir. Keduanya dapat
                   membantu pengguna untuk mengetahui kecenderungan bidang karir yang sesuai dengan diri pribadi  .</p>
                <!-- <a href="./docs/1.0/components/alerts.html" class="btn btn-warning mt-4"></a> -->
              </div>
              <div class="col-lg-6">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <!-- indicators -->
                  <ol class="carousel-indicators">
                    @foreach ($slides as $index => $slide)
                      <li data-target="#carouselExampleControls" data-slide-to="{{ $index }}" @if ($index == 0) class="active" @endif></li>
                    @endforeach
                  </ol>
                  <div class="carousel-inner">
                    @foreach ($slides as $index => $slide)
                      <div class="carousel-item @if ($index === 0) active @endif" id="carousel-item">
                        <img class="d-block w-100" src="{{ asset('assets/img/' . $slide['image']) }}" alt="{{ $slide['caption'] }}" class="carousel-image">
                        <!-- <div class="carousel-caption">
                            <h3>{{ $slide['caption'] }}</h3>
                        </div> -->
                      </div>
                    @endforeach
                    <!-- <div class="carousel-item active">
                      <img class="d-block w-100" src="assets/login/img/carousel-1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="assets/login/img/carousel-2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="assets/login/img/carousel-3.jpg" alt="Third slide">
                    </div> -->
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <i class="tim-icons icon-minimal-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <i class="tim-icons icon-minimal-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
    </div>
    <!-- footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h4 class="title">CDC Polije• Online Personal Assessment Test</h4>
            <h5>Gedung Pasca Sarjana Lt 1 <br>Jl. Mastrip 164 Jember, Indonesia</h5>
          </div>
          <div class="col-md-3"></div>
          
          <div class="col-md-2">
            <h4 class="title">Follow us:</h4>
            <div class="btn-wrapper profile">
              <a target="_blank" href="https://wa.me/+628113591500" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-whatsapp"></i>
              </a>
              <a target="_blank" href="https://web.facebook.com/jpc.polije?_rdc=1&_rdr" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Like us">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a target="_blank" href="https://www.linkedin.com/in/job-placement-center-ab33a61a4/" class="btn btn-icon btn-neutral  btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-linkedin"></i>
              </a>
            </div>
          </div>
          <div class="col-md-2">
          <h4 class="title">Back to CDC:</h4>
              <div class="btn-wrapper back">
                <a target="_blank" href="https://pusatkarir.polije.ac.id/ " class="btn btn-icon btn-neutral  btn-round btn-simple" data-toggle="tooltip" data-original-title="go back to cdc">
                  <i class="fab fa-telegram"></i>
                </a>
              </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="/assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="/assets/js/plugins/moment.min.js"></script>
  <script src="/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="/assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      blackKit.initDatePicker();
      blackKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
  <script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 3000 // Interval waktu dalam milidetik (misalnya, 3000 untuk 3 detik)
        });
    });
</script>
</body>

</html>
