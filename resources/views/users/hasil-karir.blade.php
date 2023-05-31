@extends('users.main')

@section('container')

    <div class="row justify-content-center mx-auto " style="margin-top: 3rem; ">
        <div class="col-xl-9 col-lg-9 col-md-10 px-5 py-4 border rounded shadow-lg" style="background-color: #fff;margin-bottom: 4rem;">
            <br>
            <h3 style="color: #00081d" class="text-center"><strong>Hasil Tes Minat Karir </strong></h3>
            <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Waktu Pelaksanaan : {{\Carbon\Carbon::parse($test_data['started_at'])->format('d M Y H:i:s');}}</p>
            <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Nama Lengkap : {{$test_data['user']['nama']}}</p>
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Alamat Email : {{$test_data['user']['email']}}</p>
            <p style="color: #00081d; text-align:left; font-size: 1rem;" >Nomor Telepon : {{$test_data['user']['no_telp']}}</p>
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