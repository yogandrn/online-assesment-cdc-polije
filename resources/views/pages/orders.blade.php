@extends('pages.main')

<div class="min-height-300 bg-primary position-absolute w-100"></div>

@section('container')
<div class="container-fluid py-4">

    @if (session('diky_success'))
    <div class="alert alert-success">
        {{ session('diky_success') }}
    </div>
    @endif

    <!-- Card Title -->
    <div class="card mb-3">
        <div class="card-body p-3 fw-bold text-dark d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                    <i class="fas fa-tools text-lg opacity-10" aria-hidden="true"></i>
                </div>
                <xspan class="mx-3 fs-4">{{ $title }}</xspan>
            </div>
        </div>
    </div>
    <!-- End Card Title -->

    <!-- Data New -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Orderan Masuk</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">No.</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Bukti Pembayaran</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Nama Pembeli</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Nomor Telepon</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Alamat</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Total Pembayaran</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>

                            @php
                            $nomer = 1;
                            @endphp
                            @foreach ($dataorders as $data)
                            <tbody>
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$nomer ++}}.</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{'Gambar'}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->user->fullname}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->user->phone_number}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">
                                            @if ($data->location != null)
                                            {{$data->location->address}}
                                            @else
                                            id: {{$data->id}}, Alamat tidak ditemukan
                                            @endif
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">Rp.{{$data->total_payment}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <button type="button" class="btn btn-success btn-sm text-xs mb-0 px-3" data-bs-toggle="modal" data-bs-target="#terimamodal-{{$data->id}}">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm text-xs mb-0 px-3" data-bs-toggle="modal" data-bs-target="#tolakmodal-{{$data->id}}">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button type="button" class="btn btn-info btn-sm text-xs mb-0 px-3" data-bs-toggle="modal" data-bs-target="#listOrderan-{{$data->id}}">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                        @if (count($dataorders) == 0)
                        <small class="d-flex justify-content-center py-2 text-dark"><i class="far fa-times-circle py-1"></i> &nbsp Data kosong</small>
                        @endif

                        @if ($dataorders->total() > 10)
                        <nav>
                            <ul class="pagination d-flex justify-content-end mt-3">
                                {{-- Previous Page Link --}}
                                @if ($dataorders->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataorders->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                </li>
                                @endif

                                <li class="page-item active"><a class="page-link" href="#">{{ $dataorders->currentPage() }}</a></li>

                                {{-- Next Page Link --}}
                                @if ($dataorders->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataorders->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                </li>
                                @else
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                </li>
                                @endif
                            </ul>
                        </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Terima Modal -->
    @foreach ($dataorders as $data)
    <div class="modal fade" id="terimamodal-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="{{url('terimaorder/'.$data->id)}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Terima Pesanan?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('tolak/'.$data->id)}}" method="POST">
                            {{ csrf_field() }}
                            Terima Pesanan Atas Nama {{ $data->user->fullname }} ?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Terima</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
            </form>
        </div>
    </div>
    @endforeach

    <!-- Tolak Modal -->
    @foreach ($dataorders as $data)
    <div class="modal fade" id="tolakmodal-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin Tolak Pesanan?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('tolakorder/'.$data->id)}}" method="POST">
                        {{ csrf_field() }}
                        Apakah anda Menolak Pesanan {{ $data->user->fullname }} ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tolak</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($dataorders as $data)
    <!-- List Orderan Modal -->
    <div class="modal fade" id="listOrderan-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamBackdropLabel">Daftar Orderan {{$data->user->fullname}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-xxs font-weight-bolder">No.</th>
                                <th class="text-center text-uppercase text-xxs font-weight-bolder">Nama Produk</th>
                                <th class="text-center text-uppercase text-xxs font-weight-bolder">Quantity</th>
                            </tr>
                        </thead>

                        @php
                        $nomer = 1;
                        @endphp
                        <tbody>
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{$nomer ++}}.</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{$data->user->fullname}}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{$data->quantity}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="row">
        <!-- Data Proses -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Sedang Dikemas</h6>
                </div>
                @foreach ($dataorders0 as $data)
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">{{ $data->user->fullname }}</h6>
                                <span class="mb-2 text-xs">No. Telepon: <span class="text-dark font-weight-bold ms-sm-2">{{$data->user->phone_number}}</span></span>
                                <span class="mb-2 text-xs">Alamat: <span class="text-dark ms-sm-2 font-weight-bold">
                                        @if ($data->location != null)
                                        {{$data->location->address}}
                                        @else
                                        id: {{$data->id}}, Alamat tidak ditemukan
                                        @endif
                                    </span></span>
                                <span class="mb-2 text-xs">Total Pembayaran: <span class="text-dark ms-sm-2 font-weight-bold">Rp.{{$data->total_payment}}</span></span>
                            </div>
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-info text-gradient px-3 mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#lihatpesanan-{{$data->id}}"><i class="fas fa-list me-2"></i>Lihat</a>
                                <a class="btn btn-link text-success px-3 mb-0" data-bs-toggle="modal" data-bs-target="#kirimorder-{{$data->id}}"><i class="fas fa-truck me-2" aria-hidden="true"></i>Kirim</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Data List dikemas -->
                <div class="modal fade" id="lihatPesanan-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dynamBackdropLabel">Daftar Orderan {{ $data->user->fullname }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-xxs font-weight-bolder">No.</th>
                                            <th class="text-center text-uppercase text-xxs font-weight-bolder">Nama Produk</th>
                                            <th class="text-center text-uppercase text-xxs font-weight-bolder">Quantity</th>
                                        </tr>
                                    </thead>

                                    @php
                                    $nomer = 1;
                                    @endphp
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{$nomer ++}}.</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{$data->user->fullname}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{$data->quantity}}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kirim -->
                <div class="modal fade" id="kirimorder-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Masukkan Nomor Resi {{$data->user->fullname}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('kirimorder/'.$data->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <label for="shipping"><span class="text-danger">*</span> Pengirim</label>
                                        <select class="form-select" id="shipping" name="shipping" required>
                                            <option selected value="" selected hidden>Pilih jenis pengiriman</option>
                                            <option value="Cash On Delivery (COD)">Cash On Delivery (COD)</option>
                                            <option value="JNT">JNT</option>
                                            <option value="JNE">JNE</option>
                                            <option value="Pos Indonesia">Pos Indonesia</option>
                                            <option value="Sicepat">Sicepat</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_resi">Nomor Resi</label>
                                        <input type="text" id="no_resi" name="no_resi" class="form-control">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

                @if(count($dataorders0) == 0)
                <div class="card-body pt-4 p-3">
                    <p>Data Kosong!!</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Data Dikirim -->
        <div class="col-md-5">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Dikirim</h6>
                        </div>
                    </div>
                </div>
                @foreach ($dataorders1 as $data)
                <div class="card-body pt-3 p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-info"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{$data->user->fullname}}</h6>
                                    <span class="mb-2 text-xs">No. Telepon: <span class="text-dark font-weight-bold ms-sm-2">{{$data->user->phone_number}}</span></span>
                                    <span class="mb-2 text-xs">Alamat: <span class="text-dark ms-sm-2 font-weight-bold">
                                            @if ($data->location != null)
                                            {{$data->location->address}}
                                            @else
                                            id: {{$data->id}}, Alamat tidak ditemukan
                                            @endif
                                        </span></span>
                                    <span class="mb-2 text-xs">Total Pembayaran: <span class="text-dark ms-sm-2 font-weight-bold">Rp.{{$data->total_payment}}</span></span>
                                    <span class="mb-2 text-xs">Expedisi: <span class="text-dark ms-sm-2 font-weight-bold">{{$data->shipping}}</span></span>
                                    <span class="mb-2 text-xs">No Resi: <span class="text-dark ms-sm-2 font-weight-bold">{{$data->no_resi}}</span></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge badge-sm bg-gradient-warning">DIKIRIM</span>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach

                @if(count($dataorders0) == 0)
                <div class="card-body pt-4 p-3">
                    <p>Data Kosong!!</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Data Diterima -->
        <div class="col-md-8">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Pesanan Diterima</h6>
                        </div>
                    </div>
                </div>
                @php
                $nomer= 1;
                @endphp
                @foreach ($dataorders2 as $data)
                <!-- Newest -->
                <div class="card-body pt-4 p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">No: {{$nomer ++}}.</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{ $data->user->fullname }}</h6>
                                    <span class="mb-2 text-xs">No. Telepon: <span class="text-dark font-weight-bold ms-sm-2">{{$data->user->phone_number}}</span></span>
                                    <span class="mb-2 text-xs">Alamat: <span class="text-dark ms-sm-2 font-weight-bold">
                                            @if ($data->location != null)
                                            {{$data->location->address}}
                                            @else
                                            id: {{$data->id}}, Alamat tidak ditemukan
                                            @endif
                                        </span></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge badge-sm bg-gradient-success">Diterima</span>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach

                @if(count($dataorders0) == 0)
                <div class="card-body pt-4 p-3">
                    <p>Data Kosong!!</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Data Ditolak -->
        <div class="col-md-8">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Ditolak/Dibatalkan</h6>
                        </div>
                    </div>
                </div>
                @php
                $nomer= 1;
                @endphp
                @foreach ($dataorders3 as $data)
                <div class="card-body pt-4 p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">No: {{$nomer ++}}.</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-times"></i></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{$data->user->fullname}}</h6>
                                    <span class="mb-2 text-xs">No. Telepon: <span class="text-dark font-weight-bold ms-sm-2">{{$data->user->phone_number}}</span></span>
                                    <span class="mb-2 text-xs">Alamat: <span class="text-dark ms-sm-2 font-weight-bold">
                                            @if ($data->location != null)
                                            {{$data->location->address}}
                                            @else
                                            id: {{$data->id}}, Alamat tidak ditemukan
                                            @endif
                                        </span></span>
                                    <span class="mb-2 text-xs">Total Pembayaran: <span class="text-dark ms-sm-2 font-weight-bold">Rp.{{$data->total_payment}}</span></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge badge-sm bg-gradient-danger">{{ $data->status }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach

                @if(count($dataorders0) == 0)
                <div class="card-body pt-4 p-3">
                    <p>Data Kosong!!</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>





@endsection