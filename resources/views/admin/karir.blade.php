@extends('admin.main')

@section('container')

<div class="container-fluid py-4">
    <div class="content-body">
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
                                            <th>Pertanyaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($carrier as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop -> iteration}}</td>
                                            <td>{{$item -> pertanyaan}}</td>
                                            <td>System Architect</td>
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