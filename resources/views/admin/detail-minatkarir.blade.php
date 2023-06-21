@extends('admin.main')

@section('container')

<div class="container-fluid py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
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
                  <p style="color: #00081d; text-align:left; font-size: 1rem;" >Asal Instansi : {{$test_data['user']['perguruan_tinggi'] ?? 'Tidak Diketahui'}}</p>
                  {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Fakultas / Jurusan : {{$test_data['user']['jurusan']}}</p>  --}}
                  {{-- <p style="color: #00081d; text-align:left; font-size: 1rem;" >Program Studi : {{$test_data['user']['program_studi']}}</p>  --}}
                </div>
              </div>
            {{-- <div class="mt-4 mb-1" style="border: 0.2px solid #818181;"></div> --}}
            {{-- Dummy Form untuk mengambil value by id dalam javascript  --}}
            {{-- <form action="" method="post">
              <input type="hidden" name="realistic" id="realistic" value="{{$test_data['detail'][0]['point'] * 10}}">
              <input type="hidden" name="investigative" id="investigative" value="{{$test_data['detail'][1]['point'] * 10}}">
              <input type="hidden" name="artistic" id="artistic" value="{{$test_data['detail'][2]['point'] * 10}}">
              <input type="hidden" name="social" id="social" value="{{$test_data['detail'][3]['point'] * 10}}">
              <input type="hidden" name="enterprise" id="enterprise" value="{{$test_data['detail'][4]['point'] * 10}}">
              <input type="hidden" name="conventional" id="conventional" value="{{$test_data['detail'][5]['point'] * 10}}">
            </form> --}}
            {{-- Diagram semua kepribadian  --}}
              {{-- <div class="row justify-content-center px-3">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                  <div class="chart-container w-100">
                    <h6 class="chart-heading mt-3 font-weight-bold" style="color: #00081d; text-align: center; font-size: 1rem;">
                      Diagram Minat Karir
                    </h6>
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div> --}}
            <div class="mt-4 mb-1" style="border: 0.2px solid #818181;"></div>
            <p  style="color: #606060; text-align:left; " >*Berikut adalah hasil dari jenis kepribadian yang menonjol pada diri anda beserta dengan saran karir yang sesuai.</p>
            <br>

            <div class="row justify-content-around">
                @if ($hasil[1]['point'] == $hasil[2]['point'])
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="rounded px-4 py-4" style="border: 1px solid #00081d; margin-bottom: 2rem;">
                            <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[0]['minat_karir']['name'] }}</h6>
                            <div class="progress-container">
                                <div class="row justify-content-between">
                                    <div class="col-3">
                                        <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Persentase</span>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{intval($hasil[0]['point']) * 10}} %</strong></span>
                                    </div>
                                </div>
                                <div class="progress" style="width: 100%; height: 1.5rem; border: 1px solid #3d5faf; border-radius: 0.35rem; background-color: #ececec; margin-bottom: 0.4rem;">
                                    <div class="progress-bar" style="width: {{$hasil[0]['point'] * 10 . '%'}};height: 1.5rem; border-radius: 0.35rem; background-color: #3d5faf;"></div>
                                </div>
                            </div>
                            <p style="color: #00081d; font-size: 0.9rem;">{!! $hasil[0]['minat_karir']['description'] !!}</p>
                            <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                            <p style="color: #00081d; font-size: 1.0rem; ">Karir yang disarankan : <strong>{{ $hasil[0]['minat_karir']['saran_karir'] }}</strong></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    {{-- Hasil Kedua tertinggi  --}}
                    <div class="rounded px-4 py-4" style=" border: 1px solid #00081d; margin-bottom: 2rem;">
                        <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[1]['minat_karir']['name'] }}</h6>
                        <div class="progress-container">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Persentase</span>
                                </div>
                                <div class="col-3 text-end">
                                    <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{intval($hasil[1]['point']) * 10}} %</strong></span>
                                </div>
                            </div>
                            <div class="progress" style="width: 100%; height: 1.5rem; border: 1px solid #3d5faf; border-radius: 0.35rem; background-color: #ececec; margin-bottom: 0.4rem;">
                                <div class="progress-bar" style="width: {{$hasil[1]['point'] * 10 . '%'}};height: 1.5rem; border-radius: 0.35rem; background-color: #3d5faf;"></div>
                            </div>
                        </div>
                        <p style="color: #00081d; font-size: 0.9rem;">{!! $hasil[1]['minat_karir']['description'] !!}</p>
                        <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                        <p style="color: #00081d; font-size: 1.0rem; ">Karir yang disarankan : <strong>{{ $hasil[1]['minat_karir']['saran_karir'] }}</strong></p>
                      </div>
                    </div>
                    {{-- Hasil Ketiga Tertinggi  --}}
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="rounded px-4 py-4" style=" border: 1px solid #00081d; margin-bottom: 2rem;">
                            <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[2]['minat_karir']['name'] }}</h6>
                            <div class="progress-container">
                                <div class="row justify-content-between">
                                    <div class="col-3">
                                        <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Persentase</span>
                                    </div>
                                    <div class="col-3 text-end">
                                        <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{intval($hasil[2]['point']) * 10}} %</strong></span>
                                    </div>
                                </div>
                                <div class="progress" style="width: 100%; height: 1.5rem; border: 1px solid #3d5faf; border-radius: 0.35rem; background-color: #ececec; margin-bottom: 0.4rem;">
                                    <div class="progress-bar" style="width: {{$hasil[2]['point'] * 10 . '%'}};height: 1.5rem; border-radius: 0.35rem; background-color: #3d5faf;"></div>
                                </div>
                            </div>
                            <p style="color: #00081d; font-size: 0.9rem;">{!! $hasil[2]['minat_karir']['description'] !!}</p>
                            <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                            <p style="color: #00081d; font-size: 1.0rem; ">Karir yang disarankan : <strong>{{ $hasil[2]['minat_karir']['saran_karir'] }}</strong></p>
                          </div>
                    </div>
                @else
                    {{-- Hasil tertinggi pertama  --}}
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="rounded px-4 py-4" style="border: 1px solid #00081d; margin-bottom: 2rem;">
                        <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[0]['minat_karir']['name'] }}</h6>
                        <div class="progress-container">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Persentase</span>
                                </div>
                                <div class="col-3 text-end">
                                    <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{intval($hasil[0]['point']) * 10}} %</strong></span>
                                </div>
                            </div>
                            <div class="progress" style="width: 100%; height: 1.5rem; border: 1px solid #3d5faf; border-radius: 0.35rem; background-color: #ececec; margin-bottom: 0.4rem;">
                                <div class="progress-bar" style="width: {{$hasil[0]['point'] * 10 . '%'}};height: 1.5rem; border-radius: 0.35rem; background-color: #3d5faf;"></div>
                            </div>
                        </div>
                        <p style="color: #00081d; font-size: 0.9rem;">{!! $hasil[0]['minat_karir']['description'] !!}</p>
                        <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                        <p style="color: #00081d; font-size: 1.0rem; ">Karir yang disarankan : <strong>{{ $hasil[0]['minat_karir']['saran_karir'] }}</strong></p>
                    </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    {{-- Hasil Kedua tertinggi  --}}
                    <div class="rounded px-4 py-4" style=" border: 1px solid #00081d; margin-bottom: 2rem;">
                        <h6 style="color: #00081d; font-size: 1.2rem">{{ $hasil[1]['minat_karir']['name'] }}</h6>
                        <div class="progress-container">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <span class="progress-badge" style="color:#00081d; font-size: 0.9rem">Persentase</span>
                                </div>
                                <div class="col-3 text-end">
                                    <span class="progress-value" style="color:#00081d; font-size: 0.9rem"><strong>{{intval($hasil[1]['point']) * 10}} %</strong></span>
                                </div>
                            </div>
                            <div class="progress" style="width: 100%; height: 1.5rem; border: 1px solid #3d5faf; border-radius: 0.35rem; background-color: #ececec; margin-bottom: 0.4rem;">
                                <div class="progress-bar" style="width: {{$hasil[1]['point'] * 10 . '%'}};height: 1.5rem; border-radius: 0.35rem; background-color: #3d5faf;"></div>
                            </div>
                        </div>
                        <p style="color: #00081d; font-size: 0.9rem;">{!! $hasil[1]['minat_karir']['description'] !!}</p>
                        <div class="mt-4 mb-4" style="border: 0.2px solid #818181;"></div>
                        <p style="color: #00081d; font-size: 1.0rem; ">Karir yang disarankan : <strong>{{ $hasil[1]['minat_karir']['saran_karir'] }}</strong></p>
                    </div>
                </div>
                
                @endif
            </div>
            <div class="mt-2 mb-4" style="border: 0.2px solid #818181;"></div>
            <button class="btn btn-danger d-block mx-auto" data-bs-toggle="modal" data-bs-target="#hapusmodal{{ $test_data->test->id }}">Hapus Data</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusmodal{{ $test_data->test->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{url('admin/riwayatdestroy/'.$test_data->test->id)}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Riwayat Tes User</h5>
                </div>
                <div class="modal-body">
                    <H6>Apakah Anda Yakin Ingin Menghapus Data Ini?</H6>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="type" value="Minat Karir">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-danger border-0 pe-3 ps-3">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('sweetalert::alert')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
{{-- <script src="{{url('/assets/js/Chart.js')}}"></script> --}}
{{-- <script type="text/javascript" src="{{url('/assets/js/minatkarir.js')}}"></script> --}}

@endsection