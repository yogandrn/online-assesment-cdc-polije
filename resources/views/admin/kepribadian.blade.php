@extends('admin.main')

@section('container')

<div class="container-fluid py-4">
    <div class="card mb-4">
        <div class="card-body px-0 pt-0 pb-2">
            <table id="myTable" class="table table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Berita</th>
                        <th>Kategori Berita</th>
                        <th>Nama Media</th>
                        <th>Tanggal Berita</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection