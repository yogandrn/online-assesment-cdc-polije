<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">
    <link rel="icon" type="image/png" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap-4.6.css')}}">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}

    <title>{{$title}}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');

        body {
            font-family: 'Inter',  Arial, Helvetica, sans-serif;
        }

        .progress {
            width: 100%;
            height: 1.5rem;
            border: 1px solid #616161;
            border-radius: 0.35rem;
            background-color: #ececec;
        }

        .progress-bar {
            height: 1.5rem;
            border-radius: 0.35rem;
            background-color: #414141;
        }
    </style>
</head>

<body>
<div class="container">
    <div class=" border border-dark mt-4 mx-auto px-4 py-3">
        <h4 class="text-center">Hasil Test Kepribadian</h4>
    </div>
    <div class=" border border-dark my-3 mx-auto px-4 py-3">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <p style="color: #00081d; text-align:left; font-size: 1rem;" >Waktu Pelaksanaan : {{\Carbon\Carbon::parse($hasil['test']['started_at'])->format('d M Y H:i:s');}}</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-0"></div>
            <div class="col-lg-5 col-md-5 col-sm-6">
              <p style="color: #00081d; text-align:left; font-size: 1rem;" >Durasi Test : {{$hasil['durasi_test']}}</p>
            </div>
          </div>
    </div>
    <div class=" border border-dark my-3 mx-auto px-4 pb-3 pt-3">
        <div class="row justify-content-start">
            <div class="col-lg-2 col-md-2 col-sm-3">
              @if ($hasil->user->foto != null) 
                <a href="{{ url('/' . $hasil->user->foto) }}" target="_blank" rel="noopener noreferrer"><img src="{{url('/' . $hasil->user->foto)}}" alt="{{ $hasil->user->nama }}" class="img-fluid mb-2 img-center" style="max-width: 8rem">  </a>
              @else
                <img src="{{url('/assets/img/user/photos/default-user.jpg')}}" alt="{{ $hasil->user->nama }}" class="img-fluid mb-2 img-center" style="max-height: 8rem">
              @endif
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
              <p style="color: #00081d; text-align:left; font-size: 1rem; line-height: 1" >Nama Lengkap : {{$hasil['user']['nama']}}</p>
              <p style="color: #00081d; text-align:left; font-size: 1rem; line-height: 1" >Alamat Email : {{$hasil['user']['email']}}</p>
              <p style="color: #00081d; text-align:left; font-size: 1rem; line-height: 1" >Nomor Telepon : {{$hasil['user']['no_telp']}}</p>
              <p style="color: #00081d; text-align:left; font-size: 1rem; line-height: 1" >Asal Instansi : {{$hasil['user']['perguruan_tinggi']}}</p>
              {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Fakultas / Jurusan : {{$hasil['user']['jurusan']}}</p>  --}}
              {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Program Studi : {{$hasil['user']['program_studi']}}</p>  --}}
            </div>
          </div>
    </div>
    <div class=" border border-dark my-3 mx-auto px-4 py-3">
          <div class="row justify-content-around">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            </div>
          </div>
          <h6 style="color: #00081d; font-size: 1.2rem;">{{ $hasil['kepribadian']['name'] }}</h6>
          {{-- Hasil kepribadian --}}
          <div class="progress-container">
            <div class="row justify-content-between">
                <div class="col-3">
                    <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Prosentase</span>

                </div>
                <div class="col-3 text-right">
                    <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{$hasil['tingkat']}} %</strong></span>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width: {{ $hasil['tingkat'] . '%' }}"></div>
            </div>
          </div>
          <br>
          <p style="color: #00081d; font-size: 1rem">{!! $hasil['kepribadian']['description'] !!}</p>
          <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
          <p style="color: #00081d; font-size: 1rem">Karir yang disarankan : <strong>{!! $hasil['kepribadian']['saran_karir'] !!}</strong></p><br>
      </div>
    </div>
</div>
</body>
<script type="text/javascript">
    window.print();
</script>
</html>