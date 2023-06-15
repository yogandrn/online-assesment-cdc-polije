
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
    .chart {
      width: 90%;
      max-width: 90%;
      height: 20rem;
      max-height: 20rem;
      /* border: 1px solid #ccc; */
      display: flex;
      /* flex-direction: column-reverse; */
    }

    .bar {
      align-self: baseline;
      /* flex-grow: 1; */
      width: 25%;
      background-color: #2196F3;
      margin: 0 1.5rem;
    }
    /* .chart {
      width: 200px;
      height: 200px;
      border: 1px solid #ccc;
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
    }

    .bar {
      width: 20px;
      background-color: #2196F3;
      display: flex;
      justify-content: center;
    }

    .fill {
      width: 100%;
      background-color: #2196F3;
    } */
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

  <!-- Modal untuk Logout-->
  <div class="modal fade" id="modal-logout" tabindex="0" role="dialog" aria-labelledby="modal-logout-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-logout-label">Log Out</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="tim-icons icon-simple-remove"></i></span>
            </button>
        </div>
        <div class="modal-body">
          <p><b>Apakah Anda yakin ingin logout ?</b></p>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
          <form action="/logout" method="post">
            @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
      </div>
    </div>
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
