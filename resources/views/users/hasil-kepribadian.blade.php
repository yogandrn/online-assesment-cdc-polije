
@extends('users.main')

  @section('container')
  <div class="row justify-content-center mx-auto " style="margin-top: 3rem; ">
    <div class="col-xl-9 col-lg-9 col-md-10 px-5 py-4 border rounded shadow-lg" style="background-color: #fff;margin-bottom: 4rem;">
        <br>
        <h3 style="color: #00081d" class="text-center"><strong>Hasil Tes Kepribadian </strong></h3>
        <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
        <p style="color: #00081d; text-align:left; font-size: 1rem;" >Waktu Pelaksanaan : {{\Carbon\Carbon::parse($hasil['started_at'])->format('d M Y H:i:s');}}</p>
        <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
        <p style="color: #00081d; text-align:left; font-size: 1rem;" >Nama Lengkap : {{$hasil['user']['nama']}}</p>
        <p style="color: #00081d; text-align:left; font-size: 1rem;" >Alamat Email : {{$hasil['user']['email']}}</p>
        <p style="color: #00081d; text-align:left; font-size: 1rem;" >Nomor Telepon : {{$hasil['user']['no_telp']}}</p>
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
      </div>
    </div>
    <br>
    <br>
    
@endsection
