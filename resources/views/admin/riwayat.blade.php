@extends('admin.main')

@section('container')

<div class="container-fluid py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="font-size: 12px">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Pilihan Tes</th>
                                        <th>Waktu Tes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($questions as $item)
                                    <tr>
                                        <td>{{$loop -> iteration}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="javascript:;" class="text-info font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="" data-original-title="Detail Riwayat">
                                                Detail
                                            </a>

                                            <a class="text-secondary font-weight-bold text-xs">
                                                |
                                            </a>

                                            <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusmodal{{ $item->id }}" data-original-title="Hapus Riwayat">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                @foreach($questions as $item)
                                <div class="modal fade" id="hapusmodal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <form method="POST" action="{{url('admin/kepribadiandestroy/'.$item->id)}}">
                                                    @csrf
                                                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Pernyataan</h5>

                                            </div>
                                            <div class="modal-body">
                                                <H6>Apakah Anda Yakin Ingin Menghapus Data Ini?</H6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-danger border-0 pe-3 ps-3">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection