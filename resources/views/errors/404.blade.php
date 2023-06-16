<!DOCTYPE html>
<html>
<head>
    <title>Error 404 - Page Not Found</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">
    <link rel="icon" type="image/png" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap-4.6.css')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
        body {
            font-family: 'Poppins',  Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body style="background-color: #fff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-sm-9">
                <div class="text-center " style="margin-top: 8rem;">
                    {{-- <h1 class="display-4 font-weight-bold text-white">404</h1> --}}
                    <img src="{{url('/assets/img/404.png')}}" alt="Not Found" width="360px">
                    <h2 class="text">Tidak Ditemukan</h2>
                    <p>Mohon maaf, halaman yang Anda cari tidak dapat ditemukan.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>