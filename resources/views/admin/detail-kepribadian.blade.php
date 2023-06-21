@extends('admin.main')

@section('container')

<div class="container-fluid py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
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
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Persentase</span>
                                </div>
                                <div class="col-3 text-end">
                                    <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{$hasil['tingkat']}} %</strong></span>
                                </div>
                            </div>
                            <div class="progress" style="width: 100%; height: 1.5rem; border: 1px solid #3d5faf; border-radius: 0.35rem; background-color: #ececec; margin-bottom: 0.4rem;">
                                <div class="progress-bar" style="width: {{$hasil['tingkat'] . '%'}};height: 1.5rem; border-radius: 0.35rem; background-color: #3d5faf;"></div>
                            </div>
                        </div>
                        
                        <p style="color: #00081d; font-size: 0.9rem">{!! $hasil['kepribadian']['description'] !!}</p>
                        <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                        <p style="color: #00081d; font-size: 1rem">Karir yang disarankan : <strong>{!! $hasil['kepribadian']['saran_karir'] !!}</strong></p><br>
                        <div class="mt-2 mb-4" style="border: 0.2px solid #818181;"></div>
                        <button class="btn btn-danger d-block mx-auto" data-bs-toggle="modal" data-bs-target="#hapusmodal{{ $hasil->test->id }}">Hapus Data</button>
                    </div>
                    </div>
                    <br>
                    <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusmodal{{ $hasil->test->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{url('admin/riwayatdestroy/'.$hasil->test->id)}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Riwayat Tes User</h5>
                </div>
                <div class="modal-body">
                    <H6>Apakah Anda Yakin Ingin Menghapus Data Ini?</H6>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="type" value="Gaya Kepribadian">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-danger border-0 pe-3 ps-3">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('sweetalert::alert')

@endsection