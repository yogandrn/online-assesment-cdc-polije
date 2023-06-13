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
              <div class="row justify-content-center " style="height: 16rem; max-height: 16rem;">
                <div class="col-1 rounded-top" style="height: 100%; align-self:baseline;"></div> 
                <div class="col-1 rounded-top" style="background-color: #449196;height: {{$test_data['detail'][0]['point'] * 10}}%; align-self:baseline;"></div>
                <div class="col-1 rounded-top" style="background-color: #bd6a6a;height: {{$test_data['detail'][1]['point'] * 10}}%; align-self:baseline;"></div>
                <div class="col-1 rounded-top" style="background-color: #55a36a;height: {{$test_data['detail'][2]['point'] * 10}}%; align-self:baseline;"></div>
                <div class="col-1 rounded-top" style="background-color: #a39755;height: {{$test_data['detail'][3]['point'] * 10}}%; align-self:baseline;"></div>
                <div class="col-1 rounded-top" style="background-color: #8355a3;height: {{$test_data['detail'][4]['point'] * 10}}%; align-self:baseline;"></div>
                <div class="col-1 rounded-top" style="background-color: #8c443b;height: {{$test_data['detail'][5]['point'] * 10}}%; align-self:baseline;"></div>
                <div class="col-1 rounded-top" style="height: 100%; align-self:baseline;"></div>
              </div>
            <div class="mt-4 mb-1" style="border: 0.2px solid #818181;"></div>
            <p  style="color: #606060; text-align:left; " >*Berikut adalah hasil dari 2 jenis kepribadian yang menonjol pada diri anda beserta dengan saran karir yang sesuai.</p>
            <br>
            @foreach ($hasil as $item)
            <div class="rounded px-4 py-4" style="border: 1px solid #00081d; margin-bottom: 2rem;">
                
                <h6 style="color: #00081d; font-size: 1.2rem">{{ $item['minat_karir']['name'] }}</h6>
                {{-- Hasil kepribadian --}}
                <div class="progress-container">
                    <span class="progress-badge" style="color:#00081d; font-size:0.8rem;">Persentase </span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" arial-valuenow="{{ intval($item['point']) * 10 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{intval($item['point']) * 10}}%;">
                            <span class="progress-value" style="color:#00081d; font-size:0.9rem;"><strong>{{intval($item['point']) * 10}} %</strong></span>
                        </div>
                    </div>
                </div>
                <p style="color: #00081d; font-size: 1.08rem;">{!! $item['minat_karir']['description'] !!}</p>
                <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                <p style="color: #00081d; font-size: 1.08rem; ">Karir yang disarankan : <strong>{{ $item['minat_karir']['saran_karir'] }}</strong></p>
            </div>
            @endforeach
        </div>
        </div>
        <br>
        <br>

    
    
@endsection