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
                                        <th>Pertanyaan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($carrier as $item)
                                <tbody>
                                    <tr>
                                        <td>{{$loop -> iteration}}</td>
                                        <td>{{$item -> pertanyaan}}</td>
                                        <td>
                                            <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editmodal" data-original-title="Edit user">
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
                <h5 class="modal-title" id="tambahmodalLabel">Tambah Data Gaya Kepribadian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Pertanyaan</label>
                                <textarea class="form-control" name="pertanyaan_kepribadian" id="pertanyaan_kepribadian" type="text" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jawaban</label>
                                <textarea class="form-control" name="jawaban_kepribadian" id="jawaban_kepribadian" type="text" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Bobot/Nilai</label>
                                <input class="form-control" name="nilai_kepribadian" id="nilai_kepribadian" type="text" required></input>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodalLabel">Edit Data Gaya Kepribadian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Pertanyaan</label>
                                <textarea class="form-control" name="pertanyaan_kepribadian" id="pertanyaan_kepribadian" type="text" value=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jawaban</label>
                                <textarea class="form-control" name="jawaban_kepribadian" id="jawaban_kepribadian" type="text" value=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Bobot/Nilai</label>
                                <input class="form-control" name="nilai_kepribadian" id="nilai_kepribadian" type="text" value=""></input>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
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
