@extends('admin.main')

@section('container')

<div class="container-fluid py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-icon btn-3 btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahmodal" data-original-title="Tambah">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Tambah</span>
                        </button>
                        <div class="table-responsive">
                            <table id="example" class="display" style="font-size: 12px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pernyataan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($questions as $item)
                                <tbody>
                                    <tr>
                                        <td>{{$loop -> iteration}}</td>
                                        <td>{{$item -> pernyataan}}</td>
                                        <td>
                                            <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editmodal{{ $item->id }}" data-original-title="Edit user">
                                                Edit
                                            </a>

                                            <a class="text-secondary font-weight-bold text-xs">
                                                |
                                            </a>

                                            <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusmodal" data-original-title="Hapus user">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editmodal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editmodalLabel">Edit Pernyataan Gaya Kepribadian</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{url('admin/kepribadianupdate/'.$item->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Pernyataan</label>
                                                                <textarea class="form-control" name="input_pernyataan_kepribadian" id="pernyataan_kepribadian" type="text">{{ $item->pernyataan }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <H6>Apakah Anda Yakin Ingin Menghapus Data Ini?</H6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form method="POST" action="{{url('admin/kepribadiandestroy/', $item->id) }}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    @method('DELETE')
                                                    <button class="btn bg-danger border-0 pe-3 ps-3">Hapus</button>
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

<!-- Modal -->
<!-- Tambah Modal -->
<div class="modal fade" id="tambahmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahmodalLabel">Tambah Pernyataan Gaya Kepribadian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Pernyataan</label>
                                <textarea class="form-control" name="input_pernyataan_kepribadian" id="pernyataan_kepribadian" type="text"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>



<!-- Hapus Modal -->
<div class="modal fade" id="hapusmodal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="hapusmodal" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Hapus Data</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-fat-remove ni-3x"></i>
                    <h6 class="text-gradient text-danger mt-4">Apakah Anda yakin untuk menghapus data ini?</h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Hapus</button>
            </div>
        </div>
    </div>
</div>
@endsection