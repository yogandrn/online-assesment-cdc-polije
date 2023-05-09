@extends('pages.main')
<div class="min-height-300 bg-primary position-absolute w-100"></div>

@section('container')
@if (session('diky_success'))
<div class="alert alert-success">
    {{ session('diky_success') }}
</div>
@endif

@if (session('diky_hapus'))
<div class="alert alert-success">
    {{ session('diky_hapus') }}
</div>
@endif
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">

            <!-- Card Title -->
            <div class="card mb-3">
                <div class="card-body p-3 fw-bold text-dark d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                            <i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                        <xspan class="mx-3 fs-4">{{ $title }}</xspan>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-sl bg-gradient-info shadow-info btn-sl w-100 mt-1 mb-0" data-bs-toggle="modal" data-bs-target="#tambahData"> <i class="fas fa-plus-circle text-white text-sm opacity-10"></i> &nbsp Tambah Data</button>
                    </div>
                </div>
            </div>
            <!-- End Card Title -->

            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">No.</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Produk</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Kategori</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Harga</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $nomer = 1;
                                @endphp
                                @foreach ($dataproduk as $dp)
                                <tr>
                                    <!-- NO -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $nomer++ }}.</p>
                                    </td>

                                    <!-- Produk -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $dp->product_name }}</p>
                                    </td>

                                    <!-- Kategori -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $dp->product_category }}</p>
                                    </td>

                                    <!-- Harga -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $dp->price }}</p>
                                    </td>

                                    <!-- Action -->
                                    <td class="align-middle text-center text-sm">
                                        <a href="javascript:;" class="text-info font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#galerymodal-{{$dp->id}}" data-original-title="Galery">
                                            Galery
                                        </a>

                                        <a class="text-secondary font-weight-bold text-xs">
                                            |
                                        </a>

                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editmodal-{{$dp->id}}" data-original-title="Edit user">
                                            Edit
                                        </a>

                                        <a class="text-secondary font-weight-bold text-xs">
                                            |
                                        </a>

                                        <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusmodal-{{$dp->id}}" data-original-title="Hapus user">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            </tbody>

                            @foreach ($datagaleriproduk->where('product_id', $dp->id) as $data)
                            <!-- Galery Modal -->
                            <div class="modal fade" id="galerymodal-{{$data->id}}" data-bs-backdrop=" static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Galery Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ url($data->url) }}" alt="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                        </table>
                        <nav>
                            <ul class="pagination d-flex justify-content-end">
                                {{-- Previous Page Link --}}
                                @if ($dataproduk->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataproduk->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                </li>
                                @endif

                                <li class="page-item active"><a class="page-link" href="#">{{ $dataproduk->currentPage() }}</a></li>

                                {{-- Next Page Link --}}
                                @if ($dataproduk->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataproduk->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                </li>
                                @else
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Tambah Data Modal -->
<div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <form action="{{ url('/data_produk/upload') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Produk</label>
                                <input class="form-control" name="product_name" id="product_name" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kategori</label>
                                <input class="form-control" name="product_category" id="product_category" type="text" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Harga</label>
                                <input class="form-control" name="price" id="price" type="text" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Stock</label>
                                <input class="form-control" name="Stock" id="Stock" type="text" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto" class="form-control-label">Foto</label>
                                <input class="form-control" name="file" id="file" type="file" accept="image/png, image/jpeg, image/jpg" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="upload" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
@foreach ($dataproduk as $data)
<div class="modal fade" id="editmodal-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('editp/'.$data->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">ID</label>
                                <input class="form-control" type="text" id="id_produk" readonly name="id_produk" value="{{$data->id}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Produk</label>
                                <input class="form-control" type="text" id="produk" name="produk" value="{{$data->product_name}}">
                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto Produk</label>
                            <input class="form-control" type="text" id="id_produk" name="id_produk" value="Isinya">
                        </div>
                    </div> --}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Harga</label>
                                <input class="form-control" type="text" id="harga" name="harga" value="{{$data->price}}">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Hapus Modal -->
@foreach ($dataproduk as $data)
<div class="modal fade" id="hapusmodal-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Yakin Hapus Data?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('hapusp/'.$data->id)}}" method="POST">
                    {{ csrf_field() }}
                    Apakah anda ingin menghapus data ID : {{ $data->id }} | Produk : {{ $data->product_name }} | Harga : {{ $data->price }}?
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