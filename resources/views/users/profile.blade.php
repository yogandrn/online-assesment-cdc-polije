@extends('users.layout-profile')

@section('container')

<div class="container">
  <div class="container row justify-content-around " style="margin-top: 3rem; margin-bottom: 4rem;">
    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 container rounded shadow-lg  my-4 "  style="background-color: #fff;">
      <div class="row rounded-top px-3 py-2" style="background-color: #c6c6c6;">
        {{-- Foto user  --}}
       <div class="d-flex" style="">
        <i class="bi bi-gear-fill" style="font-size: 1.7rem; color:#00081d; align-self: center;"></i>
        <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>Akun Saya</strong></p>
       </div>
      </div>
      <br>
      <div class="px-2">
        {{-- Data diri user  --}}
        <p style="color: #00081d; text-align: ; font-size: 1.1em; font-weight: bold;"><strong>{{ auth()->user()->nama }}</strong></p>
        <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->nim }}</p>
        <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->email }}</p>
        <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->no_telp }}</p>
        <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->perguruan_tinggi }}</p>
        <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->jurusan }}</p>
        <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->program_studi }}</p>
        {{-- <div class=" mt-3 mb-3" style="border:1px solid #929292;"></div> --}}
    <a href="/users/profile/{{auth()->user()->id}}/edit" class="btn btn-primary w-100 mb-3 mt-3" style="font-size: 1.05rem;"><i class="bi bi-pencil-square" ></i> Edit</a>
      </div>
    </div>
    <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 container rounded shadow-lg pb-4 my-4" style="background-color: #fff;">
      {{-- <img src="{{url('/assets/img/personality.png')}}" alt="Personality" class="img-fluid w-50"> --}}
      <div class="row rounded-top px-3 py-2" style="background-color: #c6c6c6;">
        {{-- Foto user  --}}
       <div class="d-flex" style="">
        <i class="bi bi-slack" style="font-size: 1.6rem; color:#00081d; align-self: center;"></i>
        <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>Riwayat Tes</strong></p>
       </div>
      </div>
      <br>
      <div class="row justify-content-around px-4">
        <div class="col-lg-5 col-md-12 px-4 py-3 img-raised rounded my-3" style="border: 2px solid #25407e; max-width: 80%;">
          <a href="/users/gayakepribadian/histories" class="" >
            <h4 style="color: #00081d; text-align: center; " class="mt-2 mb-3">Gaya Kepribadian</h4>

            <img src="{{url('/assets/img/personality.png')}}" alt="Gaya Kepribadian" class="img-fluid w-50 img-center mb-3">
            <a href="/users/gayakepribadian/histories" class="btn btn-dark w-100">Lihat Riwayat Tes</a>
          </a> 
        </div>
        <div class="col-lg-5 col-md-12 px-4 py-3 img-raised rounded my-3" style="border: 2px solid #25407e; max-width: 80%;">
          <a href="/users/minatkarir/histories" class="" >
            <h4 style="color: #00081d; text-align: center; " class="mt-2 mb-3">Minat Karir</h4>

            <img src="{{url('/assets/img/career.png')}}" alt="Minat Karir" class="img-fluid w-50 img-center mb-3">
            <a href="/users/minatkarir/histories" class="btn btn-dark w-100">Lihat Riwayat Tes</a>
          </a> 
        </div>

      </div>
    </div>
  </div>
</div>
@include('sweetalert::alert')
@endsection