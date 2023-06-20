@extends('admin.main')
@section('container')
@foreach($data as $data)
<div class="container-fluid py-4">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($data->jenis_kandidat == 'Administrator')
                            <form action="{{url('admin/userupdate', $data->id)}}" method="POST" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <div class="col-md-4">
                                    <label for="jenis_kandidat2" class="form-label">Jenis Kandidat</label>
                                    <select id="jenis_kandidat2" class="form-select" name="jenis_kandidat">
                                        <option value="{{$data->jenis_kandidat}}" selected>{{$data->jenis_kandidat}}</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="nama2" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{$data->nama}}" name="nama">
                                </div>
                                <div class="col-md-6">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="foto" name="foto">
                                </div>

                                <div class="col-md-6">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" value="{{$data->no_telp}}" name="no_telp">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{$data->email}}" name="email">
                                </div>

                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" value="{{$data->password}}" id="password" name="password">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>

                            @elseif ($data->jenis_kandidat == 'Umum')
                            <form action="{{url('admin/userupdate', $data->id)}}" method="POST" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <div class="col-md-4">
                                    <label for="jenis_kandidat2" class="form-label">Jenis Kandidat</label>
                                    <select id="jenis_kandidat2" class="form-select" name="jenis_kandidat">
                                        <option value="{{$data->jenis_kandidat}}" selected>{{$data->jenis_kandidat}}</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="nama2" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{$data->nama}}" id="nama2" name="nama">
                                </div>

                                <div class="col-md-4" id="inputjenjang">
                                    <label for="jenjang" class="form-label">Jenjang</label>
                                    <input type="text" class="form-control" value="{{$data->jenjang}}" id="jenjang" name="jenjang">
                                </div>

                                <div class="col-md-6" id="inputperting">
                                    <label for="perguruan_tinggi2" class="form-label">Perguruan Tinggi</label>
                                    <input type="text" class="form-control" value="{{$data->perguruan_tinggi}}" id="perguruan_tinggi2" name="perguruan_tinggi">
                                </div>

                                <div class="col-md-6" id="injur">
                                    <label for="jurusanumum" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" value="{{$data->jurusan}}" id="jurusanumum" name="jurusan">
                                </div>

                                <div class="col-md-6" id="inpro">
                                    <label for="prodiumum" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" value="{{$data->program_studi}}" id="prodiumum" name="program_studi">
                                </div>

                                <div class="col-md-6">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="foto" name="foto">
                                </div>

                                <div class="col-md-6">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" value="{{$data->no_telp}}" id="no_telp" name="no_telp">
                                </div>

                                <div class="col-md-6" id="inputlinkedin">
                                    <label for="url_linkedin" class="form-label">Url LinkedIn</label>
                                    <input type="text" class="form-control" value="{{$data->url_linkedin}}" id="url_linkedin" name="url_linkedin">
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{$data->email}}" id="email" name="email">
                                </div>

                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" value="{{$data->password}}" id="password" name="password">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>

                            @else
                            <form action="{{url('admin/userupdate', $data->id)}}" method="POST" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <div class="col-md-4">
                                    <label for="jenis_kandidat2" class="form-label">Jenis Kandidat</label>
                                    <select id="jenis_kandidat2" class="form-select" name="jenis_kandidat">
                                        <option value="{{$data->jenis_kandidat}}" selected>{{$data->jenis_kandidat}}</option>
                                    </select>
                                </div>

                                <div class="col-md-2" id="tes">
                                    <label for="nim2" class="form-label">NIM</label>
                                    <input type="text" class="form-control" value="{{$data->nim}}" id="nim2" name="nim">
                                </div>

                                <div class="col-12">
                                    <label for="nama2" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{$data->nama}}" id="nama2" name="nama">
                                </div>

                                <div class="col-md-4" id="inputjenjang">
                                    <label for="jenjang" class="form-label">Jenjang</label>
                                    <input type="text" class="form-control" value="{{$data->jenjang}}" id="jenjang" name="jenjang">
                                </div>

                                <div class="col-md-6" id="inputperting">
                                    <label for="perguruan_tinggi2" class="form-label">Perguruan Tinggi</label>
                                    <input type="text" class="form-control" value="{{$data->perguruan_tinggi}}" id="perguruan_tinggi2" name="perguruan_tinggi">
                                </div>

                                <div class="col-md-6" id="jur">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <select id="jurusan" class="form-select" onchange="myFunction(event)">
                                        <option value="{{$data->jurusan}}" selected>{{$data->jurusan}}</option>
                                        <option value="Produksi Pertanian">Produksi Pertanian</option>
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

                                <div class="col-md-6" id="pro">
                                    <label for="program_studi" class="form-label">Program Studi</label>
                                    <select id="program_srtudi" class="form-select" onchange="myFunction2(event)">
                                        <option value="{{$data->program_studi}}" selected>{{$data->program_studi}}</option>
                                        <option value="Teknik Informatika">Teknik Informatika</option>
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

                                <div class="col-md-6" id="injur">
                                    <label for="jurusanumum" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" value="{{$data->jurusan}}" id="jurusanumum" readonly name="jurusan">
                                </div>

                                <div class="col-md-6" id="inpro">
                                    <label for="prodiumum" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" value="{{$data->program_studi}}" id="prodiumum" readonly name="program_studi">
                                </div>

                                <div class="col-md-6">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="foto" name="foto">
                                </div>

                                <div class="col-md-6">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" value="{{$data->no_telp}}" id="no_telp" name="no_telp">
                                </div>

                                <div class="col-md-6" id="inputlinkedin">
                                    <label for="url_linkedin" class="form-label">Url LinkedIn</label>
                                    <input type="text" class="form-control" value="{{$data->url_linkedin}}" id="url_linkedin" name="url_linkedin">
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{$data->email}}" id="email" name="email">
                                </div>

                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" value="{{$data->password}}" id="password" name="password">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction(event) {
        console.log(event.target.value)

        if (event.target.value === "Produksi Pertanian") {
            document.getElementById("jurusanumum").value = "Produksi Pertanian";
        } else if (event.target.value === "Teknologi Pertanian") {
            document.getElementById("jurusanumum").value = "Teknologi Pertanian";
        } else if (event.target.value === "Peternakan") {
            document.getElementById("jurusanumum").value = "Peternakan";
        } else if (event.target.value === "Manajemen Agribisnis") {
            document.getElementById("jurusanumum").value = "Manajemen Agribisnis";
        } else if (event.target.value === "Teknologi Informasi") {
            document.getElementById("jurusanumum").value = "Teknologi Informasi";
        } else if (event.target.value === "Bahasa, Komunikasi & Pariwisata") {
            document.getElementById("jurusanumum").value = "Bahasa, Komunikasi & Pariwisata";
        } else if (event.target.value === "Kesehatan") {
            document.getElementById("jurusanumum").value = "Kesehatan";
        } else if (event.target.value === "Teknik") {
            document.getElementById("jurusanumum").value = "Teknik";
        } else if (event.target.value === "Bisnis") {
            document.getElementById("jurusanumum").value = "Bisnis";
        }
    };

    function myFunction2(event) {
        console.log(event.target.value)

        if (event.target.value === "Teknik Informatika") {
            document.getElementById("prodiumum").value = "Teknik Informatika";
        } else if (event.target.value === "Manajemen Informatika") {
            document.getElementById("prodiumum").value = "Manajemen Informatika";
        } else if (event.target.value === "Teknik Komputer") {
            document.getElementById("prodiumum").value = "Teknik Komputer";
        } else if (event.target.value === "Teknik Informatika - PSDKU Bondowoso") {
            document.getElementById("prodiumum").value = "Teknik Informatika - PSDKU Bondowoso";
        } else if (event.target.value === "Teknik Informatika - PSDKU Nganjuk") {
            document.getElementById("prodiumum").value = "Teknik Informatika - PSDKU Nganjuk";
        } else if (event.target.value === "Teknik Informatika - PSDKU Sidoarjo") {
            document.getElementById("prodiumum").value = "Teknik Informatika - PSDKU Sidoarjo";
        } else if (event.target.value === "Teknik Informatika - Internasional") {
            document.getElementById("prodiumum").value = "Teknik Informatika - Internasional";
        } else if (event.target.value === "Manajemen Informatika - Internasional") {
            document.getElementById("prodiumum").value = "Manajemen Informatika - Internasional";
        } else if (event.target.value === "Teknik Komputer - Internasional") {
            document.getElementById("prodiumum").value = "Teknik Komputer - Internasional";
        } else if (event.target.value === "Manajemen Informasi Kesehatan") {
            document.getElementById("prodiumum").value = "Manajemen Informasi Kesehatan";
        } else if (event.target.value === "BisGizi Kliniknis") {
            document.getElementById("prodiumum").value = "Gizi Klinik";
        } else if (event.target.value === "Promosi Kesehatan") {
            document.getElementById("prodiumum").value = "Promosi Kesehatan";
        } else if (event.target.value === "Teknik Energi Terbarukan") {
            document.getElementById("prodiumum").value = "Teknik Energi Terbarukan";
        } else if (event.target.value === "Mesin Otomotif") {
            document.getElementById("prodiumum").value = "Mesin Otomotif";
        } else if (event.target.value === "Teknologi Rekayasa Mekatronika") {
            document.getElementById("prodiumum").value = "Teknologi Rekayasa Mekatronika";
        } else if (event.target.value === "Produksi Tanaman Perkebukan") {
            document.getElementById("prodiumum").value = "Produksi Tanaman Perkebukan";
        } else if (event.target.value === "Tanaman Hortikultura") {
            document.getElementById("prodiumum").value = "Tanaman Hortikultura";
        } else if (event.target.value === "Teknik Produksi Benih") {
            document.getElementById("prodiumum").value = "Teknik Produksi Benih";
        } else if (event.target.value === "Teknik Produksi Tanaman Pangan") {
            document.getElementById("prodiumum").value = "Teknik Produksi Tanaman Pangan";
        } else if (event.target.value === "Budidaya Tanaman Perkebunan") {
            document.getElementById("prodiumum").value = "Budidaya Tanaman Perkebunan";
        } else if (event.target.value === "Pengelolaan Perkebunan Kopi") {
            document.getElementById("prodiumum").value = "Pengelolaan Perkebunan Kopi";
        } else if (event.target.value === "Keteknikan Pertanian") {
            document.getElementById("prodiumum").value = "Keteknikan Pertanian";
        } else if (event.target.value === "Teknologi Industri Pangan") {
            document.getElementById("prodiumum").value = "Teknologi Industri Pangan";
        } else if (event.target.value === "Teknologi Industri Pangan - PSDKU Bondowoso") {
            document.getElementById("prodiumum").value = "Teknologi Industri Pangan - PSDKU Bondowoso";
        } else if (event.target.value === "Produksi Ternak") {
            document.getElementById("prodiumum").value = "Produksi Ternak";
        } else if (event.target.value === "Manajemen Bisnis Unggas") {
            document.getElementById("prodiumum").value = "Manajemen Bisnis Unggas";
        } else if (event.target.value === "Teknologi Pakan Ternak") {
            document.getElementById("prodiumum").value = "Teknologi Pakan Ternak";
        } else if (event.target.value === "Manajemen Agribisnis") {
            document.getElementById("prodiumum").value = "Manajemen Agribisnis";
        } else if (event.target.value === "Manajemen Agroindustri") {
            document.getElementById("prodiumum").value = "Manajemen Agroindustri";
        } else if (event.target.value === "Akuntansi Sektor Publik") {
            document.getElementById("prodiumum").value = "Akuntansi Sektor Publik";
        } else if (event.target.value === "Manjemen Pemasaran Internasional") {
            document.getElementById("prodiumum").value = "Manjemen Pemasaran Internasional";
        } else if (event.target.value === "Manjemen Agribisnis -PSDKU Bondowoso") {
            document.getElementById("prodiumum").value = "Manjemen Agribisnis -PSDKU Bondowoso";
        } else if (event.target.value === "Manjemen Agribisnis -PSDKU Nganjuk") {
            document.getElementById("prodiumum").value = "Manjemen Agribisnis -PSDKU Nganjuk";
        } else if (event.target.value === "Manjemen Agroindustri -PSDKU Sidoarjo") {
            document.getElementById("prodiumum").value = "Manjemen Agroindustri -PSDKU Sidoarjo";
        } else if (event.target.value === "Manjemen Agroindustri - Internasional") {
            document.getElementById("prodiumum").value = "Manjemen Agroindustri - Internasional";
        } else if (event.target.value === "S2 Agribisnis") {
            document.getElementById("prodiumum").value = "S2 Agribisnis";
        } else if (event.target.value === "Bahasa Inggris Terapan") {
            document.getElementById("prodiumum").value = "Bahasa Inggris Terapan";
        } else if (event.target.value === "Destinasi Pariwisata") {
            document.getElementById("prodiumum").value = "Destinasi Pariwisata";
        }
    };
</script>
@endforeach
@endsection