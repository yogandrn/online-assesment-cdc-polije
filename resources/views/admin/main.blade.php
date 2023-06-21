<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">
    <link rel="icon" type="image/png" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">

    <title>{{ $title }}</title>

    <!-- CSS only -->
    <link href="{{url('assets/administration/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo_polije.png" />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="{{url('assets/administration/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{url('assets/administration/css/nucleo-svg.css')}}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link id="admintyle" href="{{url('assets/administration/css/style.css?v=2.0.2')}}" rel="stylesheet" />

    <!-- Vendors -->
    <link rel="stylesheet" href="{{ url('assets/administration/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ url('assets/administration/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

    {{-- Link Chart Js  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">

    {{-- <style>
        .chart-container {
            padding: 0.5rem 1.6rem;
            margin: 0 auto;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 4px 8px rgba(0,0,0, 0.35);
            border-radius: 10px;
            max-height: 6rem;
            height: 12rem;
            width: 50% !important;
            max-width: 70%;
        }

        .chart-container h2 .chart-heading {
            text-align: center;
            text-transform: uppercase;
            padding-bottom: 0.8rem;
            color: #000;
        }
    </style> --}}
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <!-- Sidenav -->
    @include('admin.sidenav')

    <main class="main-content position-relative border-radius-lg ">
        <!-- <div class="main-content position-relative max-height-vh-100 h-100"> -->

        <!-- Navbar -->
        @include('admin.navbar')

        <!-- Content -->
        @yield('container')

        <!-- Footer -->
        @include('admin.footer')
        </div>
        <!-- </main> -->
    </main>

    <!--   Core JS Files   -->
    <script src="{{url('assets/administration/js/core/popper.min.js')}}"></script>
    <script src="{{url('assets/administration/js/core/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/administration/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{url('assets/administration/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{url('assets/administration/js/plugins/chartjs.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->

    <!-- Datatable -->
    <script src="{{url('assets/administration/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/administration/js/plugins/datatables.init.js')}}"></script>

    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
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
    <script src="{{url('assets/administration/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>