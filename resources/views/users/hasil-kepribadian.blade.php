
@extends('users.main')

  @section('container')
  <div class="row justify-content-center mx-auto px-4" style="margin-top: 3rem; ">
    <div class="col-xl-9 col-lg-9 col-md-10 col-sm-11 px-5 py-4 border rounded shadow-lg" style="background-color: #fff;margin-bottom: 4rem;">
        <br>
        <h3 style="color: #00081d" class="text-center"><strong>Hasil Tes Kepribadian </strong></h3>
        <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
        <div class="row justify-content-between">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Waktu Pelaksanaan : {{\Carbon\Carbon::parse($hasil['test']['started_at'])->format('d M Y H:i:s');}}</p>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-0"></div>
          <div class="col-lg-5 col-md-5 col-sm-6">
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Durasi Test : {{$hasil['durasi_test']}}</p>
          </div>
        </div>
        <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
        <div class="row justify-content-start">
          <div class="col-lg-2 col-md-2 col-sm-3">
            @if ($hasil->user->foto != null) 
              <a href="{{ url('/' . $hasil->user->foto) }}" target="_blank" rel="noopener noreferrer"><img src="{{url('/' . $hasil->user->foto)}}" alt="{{ $hasil->user->nama }}" class="img-fluid mb-2 img-center" style="max-width: 8rem">  </a>
            @else
              <img src="{{url('/assets/img/user/photos/default-user.jpg')}}" alt="{{ $hasil->user->nama }}" class="img-fluid mb-2 img-center" style="max-height: 8rem">
            @endif
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9">
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Nama Lengkap : {{$hasil['user']['nama']}}</p>
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Alamat Email : {{$hasil['user']['email']}}</p>
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Nomor Telepon : {{$hasil['user']['no_telp']}}</p>
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Asal Instansi : {{$hasil['user']['perguruan_tinggi']}}</p>
            {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Fakultas / Jurusan : {{$hasil['user']['jurusan']}}</p>  --}}
            {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Program Studi : {{$hasil['user']['program_studi']}}</p>  --}}
          </div>
        </div>
        <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
          <div class="row justify-content-around">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            </div>
          </div>
          <h6 style="color: #00081d; font-size: 1.2rem;">{{ $hasil['kepribadian']['name'] }}</h6>
          {{-- Hasil kepribadian --}}
          <div class="progress-container">
              <span class="progress-badge" style="color:#00081d; font-size: 0.8rem">Presentase</span>
              <div class="progress">
                  <div class="progress-bar progress-bar-warning" role="progressbar" arial-valuenow="{{ $hasil['tingkat'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$hasil['tingkat']}}%;">
                      <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{$hasil['tingkat']}} %</strong></span>
                  </div>
              </div>
          </div>
          
          <p style="color: #00081d; font-size: 1rem">{!! $hasil['kepribadian']['description'] !!}</p>
          <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
          <p style="color: #00081d; font-size: 1rem">Karir yang disarankan : <strong>{!! $hasil['kepribadian']['saran_karir'] !!}</strong></p><br>
          <div class="row justify-content-center">
            <a href="/users/gayakepribadian/print/{{$hasil->test_token}}" target="_blank" rel="noopener noreferrer" class="btn btn-dark d-block mx-auto" role="button">Unduh PDF</a>
          </div>
      </div>
    </div>
    <br>
    <br>
    
@endsection
