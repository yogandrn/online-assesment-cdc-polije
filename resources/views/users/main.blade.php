
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">
  <link rel="icon" type="image/png" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">
  
  <title>
    {{$title}}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Font Awesome Icons -->
  {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
  <!-- Nucleo Icons -->
  <link href="{{url('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{url('/assets/css/blk-design-system.css?v=1.0.0')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ url('/assets/css/blk-design-system.css')}}">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{url('/assets/demo/demo.css')}}" rel="stylesheet" />
  <style>
    .text {
      color: #00081d;
    }
  </style>
</head>

<body class="index-page">
  <!-- Navbar -->
  @include('users.navbar')

  <!-- End Navbar -->
  <div class="wrapper">
    <!-- content -->
    @yield('container')
    <!-- end content -->
    <!-- footer -->
    @include('users.footer')
    <!-- end footer -->
  </div>
  <!--   Core JS Files   -->
  <script src="{{url('/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{url('/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{url('/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{url('/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{url('/assets/js/plugins/bootstrap-switch.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{url('/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="{{url('/assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{url('/assets/js/plugins/moment.min.js')}}"></script>
  <script src="{{url('/assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{url('/assets/demo/demo.js')}}"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{url('/assets/js/blk-design-system.min.js?v=1.0.0')}}" type="text/javascript"></script>
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
</body>

</html>
