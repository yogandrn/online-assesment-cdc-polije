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
                                <tbody>
                                    @foreach($karir as $item)
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

                                            <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#hapusmodal{{ $item->id }}" data-original-title="Hapus user">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @foreach($karir as $item)
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editmodal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editmodalLabel">Edit Pernyataan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{url('admin/minatkarirupdate/'.$item->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Pernyataan</label>
                                                                <textarea class="form-control" name="pernyataan" id="pernyataan" type="text">{{ $item->pernyataan }}</textarea>
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
                                <div class="modal fade" id="hapusmodal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <form method="POST" action="{{url('admin/minatkarirdestroy/'.$item->id)}}">
                                                    @csrf
                                                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Pernyataan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- Modal -->
<!-- Tambah Modal -->
<div class="modal fade" id="tambahmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahmodalLabel">Tambah Pernyataan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/minatkarirstore/')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Pernyataan</label>
                                <textarea class="form-control" name="pernyataan" id="pernyataan" type="text" required></textarea>
                                <input type="text" id="minat_karir_id" class="form-control" name="minat_karir_id" value="6" hidden>
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
@endsection