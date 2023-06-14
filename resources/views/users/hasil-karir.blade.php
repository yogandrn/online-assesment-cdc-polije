@extends('users.main')

@section('container')

    <div class="row justify-content-center mx-auto px-4" style="margin-top: 3rem; ">
        <div class="col-xl-9 col-lg-9 col-md-10 col-sm-11 px-5 py-4 border rounded shadow-lg" style="background-color: #fff;margin-bottom: 4rem;">
            <br>
            <h3 style="color: #00081d" class="text-center"><strong>Hasil Tes Minat Karir </strong></h3>
            <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <p style="color: #00081d; text-align:left; font-size: 1rem;" >Waktu Pelaksanaan : {{\Carbon\Carbon::parse($test_data['test']['started_at'])->format('d M Y H:i:s');}}</p>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-0"></div>
                <div class="col-lg-5 col-md-5 col-sm-6">
                  <p style="color: #00081d; text-align:left; font-size: 1rem;" >Durasi Test : {{$test_data['durasi_test']}}</p>
                </div>
              </div>
            <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
            <div class="row justify-content-start">
                <div class="col-lg-2 col-md-2 col-sm-3">
                  @if ($test_data->user->foto != null) 
                    <a href="{{ url('/' . $test_data->user->foto) }}" target="_blank" rel="noopener noreferrer"><img src="{{url('/' . $test_data->user->foto)}}" alt="{{ $test_data->user->nama }}" class="img-fluid mb-2 img-center" style="max-width: 8rem">  </a>
                  @else
                    <img src="{{url('/assets/img/user/photos/default-user.jpg')}}" alt="{{ $test_data->user->nama }}" class="img-fluid mb-2 img-center" style="max-height: 8rem">
                  @endif
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                  <p style="color: #00081d; text-align:left; font-size: 1rem;" >Nama Lengkap : {{$test_data['user']['nama']}}</p>
                  <p style="color: #00081d; text-align:left; font-size: 1rem;" >Alamat Email : {{$test_data['user']['email']}}</p>
                  <p style="color: #00081d; text-align:left; font-size: 1rem;" >Nomor Telepon : {{$test_data['user']['no_telp']}}</p>
                  <p style="color: #00081d; text-align:left; font-size: 1rem;" >Asal Instansi : {{$test_data['user']['perguruan_tinggi']}}</p>
                  {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Fakultas / Jurusan : {{$test_data['user']['jurusan']}}</p>  --}}
                  {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Program Studi : {{$test_data['user']['program_studi']}}</p>  --}}
                </div>
              </div>
            <div class="mt-4 mb-1" style="border: 0.2px solid #818181;"></div>
            {{-- Diagram semua kepribadian  --}}
              <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                  <div class="chart-container w-100">
                    <h2 class="chart-heading" style="color: #00081d;">
                      Diagram Kepribadian
                    </h2>
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
            {{-- <div class="row justify-content-center " style="height: 16rem; max-height: 16rem;">
              <div class="col-1 rounded-top" style="height: 100%; align-self:baseline;"></div> 
              <div class="col-1 rounded-top" style="background-color: #449196;height: {{$test_data['detail'][0]['point'] * 10}}%; align-self:baseline;"></div>
              <div class="col-1 rounded-top" style="background-color: #bd6a6a;height: {{$test_data['detail'][1]['point'] * 10}}%; align-self:baseline;"></div>
              <div class="col-1 rounded-top" style="background-color: #55a36a;height: {{$test_data['detail'][2]['point'] * 10}}%; align-self:baseline;"></div>
              <div class="col-1 rounded-top" style="background-color: #a39755;height: {{$test_data['detail'][3]['point'] * 10}}%; align-self:baseline;"></div>
              <div class="col-1 rounded-top" style="background-color: #8355a3;height: {{$test_data['detail'][4]['point'] * 10}}%; align-self:baseline;"></div>
              <div class="col-1 rounded-top" style="background-color: #8c443b;height: {{$test_data['detail'][5]['point'] * 10}}%; align-self:baseline;"></div>
              <div class="col-1 rounded-top" style="height: 100%; align-self:baseline;"></div>
            </div> --}}
            <div class="mt-4 mb-1" style="border: 0.2px solid #818181;"></div>
            <p  style="color: #606060; text-align:left; " >*Berikut adalah hasil dari 2 jenis kepribadian yang menonjol pada diri anda beserta dengan saran karir yang sesuai.</p>
            <br>

            {{-- Hasil tertinggi pertama  --}}
            <div class="rounded px-4 py-4" style="border: 1px solid #00081d; margin-bottom: 2rem;">
                <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[0]['minat_karir']['name'] }}</h6>
                <div class="progress-container">
                    <span class="progress-badge" style="color:#00081d; font-size:0.8rem;">Persentase </span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" arial-valuenow="{{ intval($hasil[0]['point']) * 10 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{intval($hasil[0]['point']) * 10}}%;">
                            <span class="progress-value" style="color:#00081d; font-size:0.9rem;"><strong>{{intval($hasil[0]['point']) * 10}} %</strong></span>
                        </div>
                    </div>
                </div>
                <p style="color: #00081d; font-size: 1.08rem;">{!! $hasil[0]['minat_karir']['description'] !!}</p>
                <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                <p style="color: #00081d; font-size: 1.08rem; ">Karir yang disarankan : <strong>{{ $hasil[0]['minat_karir']['saran_karir'] }}</strong></p>
              </div>

            {{-- Hasil Kedua tertinggi  --}}
            <div class="rounded px-4 py-4" style="border: 1px solid #00081d; margin-bottom: 2rem;">
                <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[1]['minat_karir']['name'] }}</h6>
                <div class="progress-container">
                    <span class="progress-badge" style="color:#00081d; font-size:0.8rem;">Persentase </span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" arial-valuenow="{{ intval($hasil[1]['point']) * 10 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{intval($hasil[1]['point']) * 10}}%;">
                            <span class="progress-value" style="color:#00081d; font-size:0.9rem;"><strong>{{intval($hasil[1]['point']) * 10}} %</strong></span>
                        </div>
                    </div>
                </div>
                <p style="color: #00081d; font-size: 1.08rem;">{!! $hasil[0]['minat_karir']['description'] !!}</p>
                <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                <p style="color: #00081d; font-size: 1.08rem; ">Karir yang disarankan : <strong>{{ $hasil[1]['minat_karir']['saran_karir'] }}</strong></p>
              </div>
              
              @if ($hasil[1]['point'] == $hasil[2]['point'])
                {{-- Hasil Ketiga tertinggi  --}}
                <div class="rounded px-4 py-4" style="border: 1px solid #00081d; margin-bottom: 2rem;">
                    <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[2]['minat_karir']['name'] }}</h6>
                    <div class="progress-container">
                        <span class="progress-badge" style="color:#00081d; font-size:0.8rem;">Persentase </span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" arial-valuenow="{{ intval($hasil[2]['point']) * 10 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{intval($hasil[2]['point']) * 10}}%;">
                                <span class="progress-value" style="color:#00081d; font-size:0.9rem;"><strong>{{intval($hasil[2]['point']) * 10}} %</strong></span>
                            </div>
                        </div>
                    </div>
                    <p style="color: #00081d; font-size: 1.08rem;">{!! $hasil[0]['minat_karir']['description'] !!}</p>
                    <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                    <p style="color: #00081d; font-size: 1.08rem; ">Karir yang disarankan : <strong>{{ $hasil[2]['minat_karir']['saran_karir'] }}</strong></p>
                  </div>
              @else
                 <div></div> 
              @endif

              <div class="row justify-content-center">
                <a href="/users/minatkarir/print/{{$test_data->test_token}}" target="_blank" rel="noopener noreferrer" class="btn btn-dark d-block mx-auto" role="button">Unduh PDF</a>
              </div>
        </div>
        </div>
        <br>
        <br>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  {{-- <script src="{{url('/assets/js/Chart.js')}}"></script> --}}
  <script>
    let ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Realistic', 'Investigative', 'Artistic', 'Social', 'Enterprise', 'Conventional'],
            datasets: [{
                label: 'Persentase (%)',
                data: [70, 60, 20, 10, 30, 70],
                backgroundColor: [
                  'rgba(210, 180, 140, 0.8)',
                  'rgba(128, 128, 0, 0.8)',
                  'rgba(204, 85, 0, 0.8)',
                  'rgba(183, 65, 14, 0.8)',
                  'rgba(204, 204, 0, 0.8)',
                  'rgba(138, 154, 91, 0.8)'
                ],
                borderColor: [
                  'rgba(210, 180, 140, 1)',
                  'rgba(128, 128, 0, 1)',
                  'rgba(204, 85, 0, 1)',
                  'rgba(183, 65, 14, 1)',
                  'rgba(204, 204, 0, 1)',
                  'rgba(138, 154, 91, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
            categoryPercentage: 0.8,
            barPercentage: 0.9
        }]
            }
        }
    });
    </script>
    
@endsection