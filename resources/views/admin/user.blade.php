@extends('admin.main')

@section('container')

<div class="container-fluid py-4">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
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
</div>
@endsection