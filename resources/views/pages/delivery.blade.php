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
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fas fa-tools text-lg opacity-10" aria-hidden="true"></i>
                </div>
                <xspan class="mx-3 fs-4">{{ $title }}</xspan>
            </div>
        </div>
    </div>
    <!-- End Card Title -->

    <!-- Orderan Baru -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Orderan Baru</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">No.</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">ID Service</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Nama User</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Nomor Telepon</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Lokasi</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Kendala</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            @php
                            $nomer = 1;
                            @endphp
                            <tbody>
                                @foreach ($datadelivery as $data)
                                <tr>
                                    <!-- NO -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$nomer ++}}.</p>
                                    </td>

                                    <!-- ID Delivery Service -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->id}}</p>
                                    </td>

                                    <!-- Nama User -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->user->fullname}}</p>
                                    </td>

                                    <!-- Nomor Telepon -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->user->phone_number}}</p>
                                    </td>

                                    <!-- Lokasi -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->location->address}}</p>
                                    </td>

                                    <!-- Kendala -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->detail_problem}}</p>
                                    </td>

                                    <!-- Action -->
                                    <td class="align-middle text-center text-sm">
                                        <button type="button" class="btn btn-success text-xs font-weight mb-0" data-bs-toggle="modal" data-bs-target="#modalnew-{{$data->id}}">
                                            Terima & Proses
                                        </button>
                                        <button type="button" class="btn btn-danger text-xs font-weight mb-0" data-bs-toggle="modal" data-bs-target="#tolakmodal-{{$data->id}}">
                                            Tolak
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if (count($datadelivery) == 0)
                        <small class="d-flex justify-content-center py-2 text-dark"><i class="far fa-times-circle py-1"></i> &nbsp Data kosong</small>
                        @endif

                        @if ($datadelivery->total() > 10)
                        <nav>
                            <ul class="pagination d-flex justify-content-end mt-3">
                                {{-- Previous Page Link --}}
                                @if ($datadelivery->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $datadelivery->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                </li>
                                @endif

                                <li class="page-item active"><a class="page-link" href="#">{{ $datadelivery->currentPage() }}</a></li>

                                {{-- Next Page Link --}}
                                @if ($datadelivery->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $datadelivery->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
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

    <!-- Button Tolak -->
    @foreach ($datadelivery as $data)
    <div class="modal fade" id="tolakmodal-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Yakin Hapus Data?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('tolak/'.$data->id)}}" method="POST">
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

    <!-- Data Proses -->
    <div class="row">
        <div class="col-md-7">
            <div class="card scroll">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Proses</h6>
                </div>
                @foreach ($datadelivery2 as $dataperjalanan)
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">{{$dataperjalanan->user->fullname}}</h6>
                                <span class="mb-2 text-xs">ID Service: <span class="text-dark font-weight-bold ms-sm-2">{{$dataperjalanan->id}}</span></span>
                                <span class="mb-2 text-xs">No. Telepon: <span class="text-dark font-weight-bold ms-sm-2">{{$dataperjalanan->user->phone_number}}</span></span>
                                <span class="mb-2 text-xs">Lokasi: <span class="text-dark ms-sm-2 font-weight-bold">{{$dataperjalanan->location->address}}</span></span>
                                <span class="mb-2 text-xs">Kendala: <span class="text-dark ms-sm-2 font-weight-bold">{{$dataperjalanan->detail_problem}}</span></span>
                                <span class="text-xs">Nama Mekanik: <span class="text-dark ms-sm-2 font-weight-bold">{{$dataperjalanan->mechanic}}</span></span>
                            </div>
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalcancel-{{$dataperjalanan->id}}"><i class="far fa-times-circle me-2"></i>Cancel</a>
                                <a class="btn btn-link text-success px-3 mb-0" data-bs-toggle="modal" data-bs-target="#modalselesai-{{$dataperjalanan->id}}"><i class="far fa-check-circle me-2" aria-hidden="true"></i>Selesai</a>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Data Selesai -->
        <div class="col-md-5">
            <div class="card h-100 mb-4 w-auto scroll">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Selesai</h6>
                        </div>
                    </div>
                </div>
                @php
                $nomer= 1;
                @endphp
                @foreach ($datadelivery3 as $selesai)
                <div class="card-body pt-4 p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">No: {{$nomer ++}}.</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{$selesai->user->fullname}}</h6>
                                    <span class="mb-2 text-xs">ID Service: <span class="text-dark font-weight-bold ms-sm-2">{{$selesai->id}}</span></span>
                                    <span class="mb-2 text-xs">No. Telepon: <span class="text-dark font-weight-bold ms-sm-2">{{$selesai->user->phone_number}}</span></span>
                                    <span class="mb-2 text-xs">Lokasi: <span class="text-dark ms-sm-2 font-weight-bold">{{$selesai->location->address}}</span></span>
                                    <span class="mb-2 text-xs">Kendala: <span class="text-dark ms-sm-2 font-weight-bold">{{$selesai->detail_problem}}</span></span>
                                    <span class="text-xs">Nama Mekanik: <span class="text-dark ms-sm-2 font-weight-bold">{{$selesai->mechanic}}</span></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge badge-sm bg-gradient-success">Selesai</span>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Data Tolak -->
        <div class="col-md-8">
            <div class="card h-100 mb-4 scroll">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Tolak</h6>
                        </div>
                    </div>
                </div>
                @php
                $nomer= 1;
                @endphp
                @foreach ($datadelivery4 as $tolak)
                <div class="card-body pt-4 p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">No: {{$nomer ++}}.</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-times"></i></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{$tolak->user->fullname}}</h6>
                                    <span class="mb-2 text-xs">ID Service: <span class="text-dark font-weight-bold ms-sm-2">{{$tolak->id}}</span></span>
                                    <span class="mb-2 text-xs">No. Telepon: <span class="text-dark font-weight-bold ms-sm-2">{{$tolak->user->phone_number}}</span></span>
                                    <span class="mb-2 text-xs">Lokasi: <span class="text-dark ms-sm-2 font-weight-bold">{{$tolak->location->address}}</span></span>
                                    <span class="mb-2 text-xs">Kendala: <span class="text-dark ms-sm-2 font-weight-bold">{{$tolak->detail_problem}}</span></span>
                                    <span class="text-xs">Nama Mekanik: <span class="text-dark ms-sm-2 font-weight-bold">{{$tolak->mechanic}}</span></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach ($datadelivery as $data)
<div class="modal fade" id="modalnew-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Terima & Proses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('terima/'.$data->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">ID Delivery Service</label>
                                <input class="form-control" type="text" value="{{$data->id}}" aria-label="Isinya" disabled readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama User</label>
                                <input class="form-control" type="text" value="{{$data->user->fullname}}" aria-label="Isinya" disabled readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Momor Telepon</label>
                                <input class="form-control" type="text" value="{{$data->user->phone_number}}" aria-label="Isinya" disabled readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Lokasi</label>
                                <input class="form-control" type="text" value="{{$data->location->address}}" aria-label="Isinya" disabled readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kendala</label>
                                <input class="form-control" type="text" value="{{$data->detail_problem}}" aria-label="Isinya" disabled readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Status</label>
                                <input class="form-control" type="text" name="status2" value="perjalanan" aria-label="Isinya" disabled readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Mekanik</label>
                                <div class="input-group mb-3">
                                    <select class="form-select" name="mechanic" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        @foreach ($mechanic as $datam)
                                        <option value="{{$datam->fullname}}">{{$datam->fullname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Terima & Proses</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Perjalanan - Selesai -->
@foreach ($datadelivery2 as $datadelivery2)
<div class="modal fade" id="modalselesai-{{$datadelivery2->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('dselesai/'.$datadelivery2->id)}}" method="POST">
                    {{ csrf_field() }}
                    Apakah Pesanan {{$datadelivery2->user->fullname}} Sudah Selesai?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Iya</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Perjalanan - Tolak -->
<div class="modal fade" id="modalcancel-{{$datadelivery2->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('tolak/'.$datadelivery2->id)}}" method="POST">
                    {{ csrf_field() }}
                    Apakah Pesanan {{$datadelivery2->user->fullname}} Di Cancel?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Iya</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection