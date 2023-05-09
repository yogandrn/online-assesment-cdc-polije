@extends('pages.main')
<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('assets/img/ilustrasi.webp'); background-position-y: 60%; background-position-x: 50%;">
    <span class="mask bg-primary opacity-6"></span>
</div>
@section('container')
@foreach ($dataadmin as $data)
<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->fullname }}&background=random&rounded=true" alt="profile_image" class="w-100">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ Auth::user()->fullname }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{ Auth::user()->roles }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('diky_success'))
<div class="alert alert-success">
    {{ session('diky_success') }}
</div>
@endif
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <form action="{{url('editprofil/'.Auth::user()->id)}}" method="POST">
                            {{ csrf_field() }}
                            <p class="mb-0">Edit Profile</p>
                    </div>
                </div>

                <div class="card-body">
                    <p class="text-uppercase text-sm">User Information</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">ID</label>
                                <input class="form-control" id="id" name="id" type="text" readonly value="{{ Auth::user()->id }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">ROLE</label>
                                <input class="form-control" type="text" id="roles" name="roles" readonly value="{{ Auth::user()->roles }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email</label>
                                <input class="form-control" type="email" id="email" name="email" readonly value="{{ Auth::user()->email }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Full name</label>
                                <input class="form-control" type="text" id="fullname" name="fullname" value="{{ Auth::user()->fullname }}">
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">

                    <p class="text-uppercase text-sm">Contact Information</p>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Phone Number</label>
                                    <input class="form-control" type="text" id="phone_number" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Address</label>
                                <input class="form-control" type="text" id="alamat" name="alamat" value="{{ Auth::user()->alamat }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kecamatan</label>
                                <input class="form-control" type="text" id="kecamatan" name="kecamatan" value="{{ Auth::user()->kecamatan }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kabupaten</label>
                                <input class="form-control" type="text" id="kabupaten" name="kabupaten" value="{{ Auth::user()->kabupaten }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Postal code</label>
                                <input class="form-control" type="text" id="kpos" name="kpos" value="{{ Auth::user()->kpos }}">
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-primary btn-sm ms-auto mt-3">Save</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection