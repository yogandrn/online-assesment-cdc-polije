<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">
    <link rel="icon" type="image/png" sizes="76x76" href="{{url('/assets/img/logo_polije.png')}}">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>{{$title}}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');

        body {
            font-family: 'Inter',  Arial, Helvetica, sans-serif;
        }

        .progress {
            width: 100%;
            height: 1.5rem;
            border: 1px solid #3d5faf;
            border-radius: 0.35rem;
            background-color: #ececec;
            margin-bottom: 0.4rem;
        }

        .progress-bar {
            height: 1.5rem;
            border-radius: 0.35rem;
            background-color: #3d5faf;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class=" border border-dark mt-4 mx-auto px-4 py-3">
            <div class="row justify-content-center">
                <div class="col-2">
                    <img src="{{url('/assets/img/logo_polije.png')}}" alt="Logo Polije" class="img-fluid img-center" style="max-width: 4.5rem;align-self: center;">
                </div>
                <div class="col-9">
                    <h4 class="text-center">Hasil Test Minat Karir</h4>
                    <p class="text-center"><em>Online Personal Assesment Test</em> | CDC POLIJE</p>
                </div>
                <div class="col-1">
                </div>
            </div>
        </div>
        <div class=" border border-dark my-3 mx-auto px-4 py-3">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <p style="color: #00081d; text-align:left; font-size: 1rem;" >Waktu Pelaksanaan : {{\Carbon\Carbon::parse($test_data['test']['started_at'])->format('d M Y H:i:s');}}</p>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-0"></div>
                <div class="col-lg-5 col-md-5 col-sm-6">
                  <p style="color: #00081d; text-align:left; font-size: 1rem;" >Durasi Test : {{$test_data['durasi_test']}}</p>
                </div>
              </div>
        </div>
        <div class=" border border-dark my-3 mx-auto px-4 py-3">
            <div class="row justify-content-start">
                <div class="col-lg-2 col-md-2 col-sm-3">
                  @if ($test_data->user->foto != null) 
                    <a href="{{ url('/' . $test_data->user->foto) }}" target="_blank" rel="noopener noreferrer"><img src="{{url('/' . $test_data->user->foto)}}" alt="{{ $test_data->user->nama }}" class="img-fluid mb-2 img-center" style="max-width: 8rem">  </a>
                  @else
                    <img src="{{url('/assets/img/user/photos/default-user.jpg')}}" alt="{{ $test_data->user->nama }}" class="img-fluid mb-2 img-center" style="max-height: 8rem">
                  @endif
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                  <p style="color: #00081d; text-align:left; font-size: 1rem; line-height: 1;" >Nama Lengkap : {{$test_data['user']['nama']}}</p>
                  <p style="color: #00081d; text-align:left; font-size: 1rem; line-height: 1;" >Alamat Email : {{$test_data['user']['email']}}</p>
                  <p style="color: #00081d; text-align:left; font-size: 1rem; line-height: 1;" >Nomor Telepon : {{$test_data['user']['no_telp']}}</p>
                  <p style="color: #00081d; text-align:left; font-size: 1rem; line-height: 1;" >Asal Instansi : {{$test_data['user']['perguruan_tinggi'] ?? 'Tidak Diketahui'}}</p>
                  {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Fakultas / Jurusan : {{$test_data['user']['jurusan']}}</p>  --}}
                  {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Program Studi : {{$test_data['user']['program_studi']}}</p>  --}}
                </div>
              </div>
        </div>
        <div class=" border border-dark my-3 mx-auto px-4 py-3">
            {{-- Hasil tertinggi pertama  --}}
            <div class="rounded px-4 py-4" style="border: 1px solid #00081d; margin-bottom: 2rem;">
                <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[0]['minat_karir']['name'] }}</h6>
                <div class="progress-container">
                    <div class="row justify-content-between">
                        <div class="col-3">
                            <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Prosentase</span>
                        </div>
                        <div class="col-3 text-right">
                            <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{intval($hasil[0]['point']) * 10}} %</strong></span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: {{$hasil[0]['point'] * 10 . '%'}}"></div>
                    </div>
                </div>
                <p style="color: #00081d; font-size: 0.96rem;">{!! $hasil[0]['minat_karir']['description'] !!}</p>
                <div class="mt-3 mb-3" style="border: 0.2px solid #818181;"></div>
                <p style="color: #00081d; font-size: 1.08rem; ">Karir yang disarankan : <strong>{{ $hasil[0]['minat_karir']['saran_karir'] }}</strong></p>
              </div>

            {{-- Hasil Kedua tertinggi  --}}
            <div class="rounded px-4 py-4" style="border: 1px solid #00081d; margin-bottom: 2rem;">
                <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[1]['minat_karir']['name'] }}</h6>
                <div class="progress-container">
                    <div class="row justify-content-between">
                        <div class="col-3">
                            <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Prosentase</span>
                        </div>
                        <div class="col-3 text-right">
                            <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{intval($hasil[1]['point']) * 10}} %</strong></span>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: {{$hasil[1]['point'] * 10 . '%'}}"></div>
                    </div>
                </div>
                <p style="color: #00081d; font-size: 0.96rem;">{!! $hasil[0]['minat_karir']['description'] !!}</p>
                <div class="mt-3 mb-3" style="border: 0.2px solid #818181;"></div>
                <p style="color: #00081d; font-size: 1.08rem; ">Karir yang disarankan : <strong>{{ $hasil[1]['minat_karir']['saran_karir'] }}</strong></p>
              </div>
              
              @if ($hasil[1]['point'] == $hasil[2]['point'])
                {{-- Hasil Ketiga tertinggi  --}}
                <div class="rounded px-4 py-4" style="border: 1px solid #00081d; margin-bottom: 2rem;">
                    <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[2]['minat_karir']['name'] }}</h6>
                    <div class="progress-container">
                        <div class="row justify-content-between">
                            <div class="col-3">
                                <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Prosentase</span>
                            </div>
                            <div class="col-3 text-right">
                                <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{intval($hasil[2]['point']) * 10}} %</strong></span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{$hasil[2]['point'] * 10 . '%'}}"></div>
                        </div>
                    </div>
                    <p style="color: #00081d; font-size: 0.96rem;">{!! $hasil[0]['minat_karir']['description'] !!}</p>
                    <div class="mt-3 mb-3" style="border: 0.2px solid #818181;"></div>
                    <p style="color: #00081d; font-size: 1.08rem; ">Karir yang disarankan : <strong>{{ $hasil[2]['minat_karir']['saran_karir'] }}</strong></p>
                  </div>
              @else
                 <div></div> 
              @endif
        </div>
    </div>
</body>
<script type="text/javascript">
    window.print();
</script>
</html>