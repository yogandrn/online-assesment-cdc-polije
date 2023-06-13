@extends('admin.main')

@section('container')

<div class="container-fluid py-4">
    <div class="content-body">
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
                                <table id="example" class="" style="font-size: 12px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Kandidat</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Jenjang</th>
                                            <th>Jurusan</th>
                                            <th>Program Studi</th>
                                            <th>No. Tlp</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($users as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop -> iteration}}</td>
                                            <td>{{$item -> jenis_kandidat}}</td>
                                            <td>{{$item -> nim}}</td>
                                            <td>{{$item -> nama}}</td>
                                            <td>{{$item -> jenjang}}</td>
                                            <td>{{$item -> jurusan}}</td>
                                            <td>{{$item -> program_studi}}</td>
                                            <td>{{$item -> no_telp}}</td>
                                            <td>{{$item -> email}}</td>
                                            <td>
                                                <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editmodal" data-original-title="Edit user">
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
                                    @foreach($users as $item)

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tambahmodalLabel">Edit Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="row g-3">

                                                        <div class="col-md-4">
                                                            <label for="jenis_kandidat" class="form-label">Jenis Kandidat</label>
                                                            <select id="jenis_kandidat" class="form-select">
                                                                <option value="Alumni Polije" selected>Alumni Polije</option>
                                                                <option value="Mahasiswa Polije">Mahasiswa Polije</option>
                                                                <option value="Admin">Admin</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label for="nim" class="form-label">NIM</label>
                                                            <input type="text" class="form-control" id="nim">
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="nama" class="form-label">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="nama">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="jenjang" class="form-label">Jenjang</label>
                                                            <select id="jenjang" class="form-select">
                                                                <option value="S2 Magister Terapan" selected>S2 Magister Terapan</option>
                                                                <option value="D4" selected>D4</option>
                                                                <option value="D3">D3</option>
                                                                <option value="D2">D2</option>
                                                                <option value="D1">D1</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi</label>
                                                            <input type="text" class="form-control" id="perguruan_tinggi">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="jurusan" class="form-label">Jurusan</label>
                                                            <select id="jurusan" class="form-select">
                                                                <option value="Produksi Pertanian" selected>Produksi Pertanian</option>
                                                                <option value="Teknologi Pertanian">Teknologi Pertanian</option>
                                                                <option value="Peternakan">Peternakan</option>
                                                                <option value="Manajemen Agribisnis">Manajemen Agribisnis</option>
                                                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                                                                <option value="Bahasa, Komunikasi & Pariwisata">Bahasa, Komunikasi & Pariwisata</option>
                                                                <option value="Kesehatan">Kesehatan</option>
                                                                <option value="Teknik">Teknik</option>
                                                                <option value="Bisnis">Bisnis</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="program_studi" class="form-label">Program Studi</label>
                                                            <select id="program_srtudi" class="form-select">
                                                                <option value="Teknik Informatika" selected>Teknik Informatika</option>
                                                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                                                                <option value="Teknik Komputer">Teknik Komputer</option>
                                                                <option value="Teknik Informatika - PSDKU Bondowoso">Teknik Informatika -PSDKU Bondowoso</option>
                                                                <option value="Teknik Informatika - PSDKU Nganjuk">Teknik Informatika -PSDKU Nganjuk</option>
                                                                <option value="Teknik Informatika - PSDKU Sidoarjo">Teknik Informatika -PSDKU Sidoarjo</option>
                                                                <option value="Teknik Informatika - Internasional">Teknik Informatika - Internasional</option>
                                                                <option value="Manajemen Informatika - Internasional">Manajemen Informatika - Internasional</option>
                                                                <option value="Teknik Komputer - Internasional">Teknik Komputer - Internasional</option>
                                                                <option value="Manajemen Informasi Kesehatan">Manajemen Informasi Kesehatan</option>
                                                                <option value="Gizi Klinik">Gizi Klinik</option>
                                                                <option value="Promosi Kesehatan">Promosi Kesehatan</option>
                                                                <option value="Teknik Energi Terbarukan">Teknik Energi Terbarukan</option>
                                                                <option value="Mesin Otomotif">Mesin Otomotif</option>
                                                                <option value="Teknologi Rekayasa Mekatronika">Teknologi Rekayasa Mekatronika</option>
                                                                <option value="Produksi Tanaman Perkebukan">Produksi Tanaman Perkebukan</option>
                                                                <option value="Tanaman Hortikultura">Tanaman Hortikultura</option>
                                                                <option value="Teknik Produksi Benih">Teknik Produksi Benih</option>
                                                                <option value="Teknik Produksi Tanaman Pangan">Teknik Produksi Tanaman Pangan</option>
                                                                <option value="Budidaya Tanaman Perkebunan">Budidaya Tanaman Perkebunan</option>
                                                                <option value="Pengelolaan Perkebunan Kopi">Pengelolaan Perkebunan Kopi</option>
                                                                <option value="Keteknikan Pertanian">Keteknikan Pertanian</option>
                                                                <option value="Teknologi Industri Pangan">Teknologi Industri Pangan</option>
                                                                <option value="Teknologi Rekayasa Pangan">Teknologi Rekayasa Pangan</option>
                                                                <option value="Teknologi Industri Pangan - PSDKU Bondowoso">Teknologi Industri Pangan - PSDKU Bondowoso</option>
                                                                <option value="Produksi Ternak">Produksi Ternak</option>
                                                                <option value="Manajemen Bisnis Unggas">Manajemen Bisnis Unggas</option>
                                                                <option value="Teknologi Pakan Ternak">Teknologi Pakan Ternak</option>
                                                                <option value="Manajemen Agribisnis">Manajemen Agribisnis</option>
                                                                <option value="Manajemen Agroindustri">Manajemen Agroindustri</option>
                                                                <option value="Akuntansi Sektor Publik">Akuntansi Sektor Publik</option>
                                                                <option value="Manjemen Pemasaran Internasional">Manjemen Pemasaran Internasional</option>
                                                                <option value="Manjemen Agribisnis -PSDKU Bondowoso">Manjemen Agribisnis -PSDKU Bondowoso</option>
                                                                <option value="Manjemen Agribisnis -PSDKU Nganjuk">Manjemen Agribisnis -PSDKU Nganjuk</option>
                                                                <option value="Manjemen Agroindustri -PSDKU Sidoarjo">Manjemen Agroindustri -PSDKU Sidoarjo</option>
                                                                <option value="Manjemen Agroindustri - Internasional">Manjemen Agroindustri - Internasional</option>
                                                                <option value="S2 Agribisnis">S2 Agribisnis</option>
                                                                <option value="Bahasa Inggris Terapan">Bahasa Inggris Terapan</option>
                                                                <option value="Destinasi Pariwisata">Destinasi Pariwisata</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="foto" class="form-label">Foto</label>
                                                            <input class="form-control" type="file" id="foto">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="no_telp" class="form-label">No Telepon</label>
                                                            <input type="text" class="form-control" id="no_telp">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="url_linkedin" class="form-label">Url LinkedIn</label>
                                                            <input type="text" class="form-control" id="url_linkedin">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="password">
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="hapusmodal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <form method="POST" action="{{url('admin/userdestroy/'.$item->id)}}">
                                                        @csrf
                                                        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
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
</div>

<!-- Modal -->
<!-- Tambah Modal -->
<div class="modal fade" id="tambahmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahmodalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">

                    <div class="col-md-4">
                        <label for="jenis_kandidat" class="form-label">Jenis Kandidat</label>
                        <select id="jenis_kandidat" class="form-select">
                            <option value="Alumni Polije" selected>Alumni Polije</option>
                            <option value="Mahasiswa Polije">Mahasiswa Polije</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim">
                    </div>

                    <div class="col-12">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama">
                    </div>

                    <div class="col-md-4">
                        <label for="jenjang" class="form-label">Jenjang</label>
                        <select id="jenjang" class="form-select">
                            <option value="S2 Magister Terapan" selected>S2 Magister Terapan</option>
                            <option value="D4" selected>D4</option>
                            <option value="D3">D3</option>
                            <option value="D2">D2</option>
                            <option value="D1">D1</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi</label>
                        <input type="text" class="form-control" id="perguruan_tinggi">
                    </div>

                    <div class="col-md-4">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select id="jurusan" class="form-select">
                            <option value="Produksi Pertanian" selected>Produksi Pertanian</option>
                            <option value="Teknologi Pertanian">Teknologi Pertanian</option>
                            <option value="Peternakan">Peternakan</option>
                            <option value="Manajemen Agribisnis">Manajemen Agribisnis</option>
                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                            <option value="Bahasa, Komunikasi & Pariwisata">Bahasa, Komunikasi & Pariwisata</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Teknik">Teknik</option>
                            <option value="Bisnis">Bisnis</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="program_studi" class="form-label">Program Studi</label>
                        <select id="program_srtudi" class="form-select">
                            <option value="Teknik Informatika" selected>Teknik Informatika</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                            <option value="Teknik Informatika - PSDKU Bondowoso">Teknik Informatika -PSDKU Bondowoso</option>
                            <option value="Teknik Informatika - PSDKU Nganjuk">Teknik Informatika -PSDKU Nganjuk</option>
                            <option value="Teknik Informatika - PSDKU Sidoarjo">Teknik Informatika -PSDKU Sidoarjo</option>
                            <option value="Teknik Informatika - Internasional">Teknik Informatika - Internasional</option>
                            <option value="Manajemen Informatika - Internasional">Manajemen Informatika - Internasional</option>
                            <option value="Teknik Komputer - Internasional">Teknik Komputer - Internasional</option>
                            <option value="Manajemen Informasi Kesehatan">Manajemen Informasi Kesehatan</option>
                            <option value="Gizi Klinik">Gizi Klinik</option>
                            <option value="Promosi Kesehatan">Promosi Kesehatan</option>
                            <option value="Teknik Energi Terbarukan">Teknik Energi Terbarukan</option>
                            <option value="Mesin Otomotif">Mesin Otomotif</option>
                            <option value="Teknologi Rekayasa Mekatronika">Teknologi Rekayasa Mekatronika</option>
                            <option value="Produksi Tanaman Perkebukan">Produksi Tanaman Perkebukan</option>
                            <option value="Tanaman Hortikultura">Tanaman Hortikultura</option>
                            <option value="Teknik Produksi Benih">Teknik Produksi Benih</option>
                            <option value="Teknik Produksi Tanaman Pangan">Teknik Produksi Tanaman Pangan</option>
                            <option value="Budidaya Tanaman Perkebunan">Budidaya Tanaman Perkebunan</option>
                            <option value="Pengelolaan Perkebunan Kopi">Pengelolaan Perkebunan Kopi</option>
                            <option value="Keteknikan Pertanian">Keteknikan Pertanian</option>
                            <option value="Teknologi Industri Pangan">Teknologi Industri Pangan</option>
                            <option value="Teknologi Rekayasa Pangan">Teknologi Rekayasa Pangan</option>
                            <option value="Teknologi Industri Pangan - PSDKU Bondowoso">Teknologi Industri Pangan - PSDKU Bondowoso</option>
                            <option value="Produksi Ternak">Produksi Ternak</option>
                            <option value="Manajemen Bisnis Unggas">Manajemen Bisnis Unggas</option>
                            <option value="Teknologi Pakan Ternak">Teknologi Pakan Ternak</option>
                            <option value="Manajemen Agribisnis">Manajemen Agribisnis</option>
                            <option value="Manajemen Agroindustri">Manajemen Agroindustri</option>
                            <option value="Akuntansi Sektor Publik">Akuntansi Sektor Publik</option>
                            <option value="Manjemen Pemasaran Internasional">Manjemen Pemasaran Internasional</option>
                            <option value="Manjemen Agribisnis -PSDKU Bondowoso">Manjemen Agribisnis -PSDKU Bondowoso</option>
                            <option value="Manjemen Agribisnis -PSDKU Nganjuk">Manjemen Agribisnis -PSDKU Nganjuk</option>
                            <option value="Manjemen Agroindustri -PSDKU Sidoarjo">Manjemen Agroindustri -PSDKU Sidoarjo</option>
                            <option value="Manjemen Agroindustri - Internasional">Manjemen Agroindustri - Internasional</option>
                            <option value="S2 Agribisnis">S2 Agribisnis</option>
                            <option value="Bahasa Inggris Terapan">Bahasa Inggris Terapan</option>
                            <option value="Destinasi Pariwisata">Destinasi Pariwisata</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="foto">
                    </div>

                    <div class="col-md-6">
                        <label for="no_telp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_telp">
                    </div>

                    <div class="col-md-6">
                        <label for="url_linkedin" class="form-label">Url LinkedIn</label>
                        <input type="text" class="form-control" id="url_linkedin">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection