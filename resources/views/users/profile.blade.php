@extends('users.layout-profile')

@section('container')

<div class="container">
  <div class="row justify-content-center " style="margin-top: 3rem; margin-bottom: 4rem;">
    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12  my-3 w-100">
      <div class="rounded shadow-lg bg-w mb-3 ">
        <div class=" rounded-top px-3 py-2" style="background-color: #c6c6c6;">
          <div class="d-flex" style="">
            <i class="bi bi-gear-fill" style="font-size: 1.7rem; color:#00081d; align-self: center;"></i>
            <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>Akun Saya</strong></p>
          </div>
        </div>
        <br>
        <div class="px-4">
          {{-- Foto user  --}}
          @if (auth()->user()->foto != null) 
            <a href="{{ url('/' . auth()->user()->foto) }}" target="_blank" rel="noopener noreferrer"><img src="{{url('/' . auth()->user()->foto)}}" alt="{{ auth()->user()->nama }}" class="img-thumbnail mb-2 img-center rounded-circle" style="max-width: 10rem">  </a>
          @else
            <img src="{{url('/assets/img/user/photos/default-user.jpg')}}" alt="{{ auth()->user()->nama }}" class="img-thumbnail mb-2 img-center rounded-circle" style="max-height: 10rem">
          @endif
          {{-- Data diri user  --}}
          <p style="color: #00081d; text-align: ; font-size: 1.1em; font-weight: bold;"><strong>{{ auth()->user()->nama }}</strong></p>
          <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->nim }}</p>
          <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->email }}</p>
          <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->no_telp }}</p>
          <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->perguruan_tinggi }}</p>
          <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->jurusan }}</p>
          <p style="color: #00081d; text-align: ; font-size: 1.05em;">{{ auth()->user()->program_studi }}</p>

          <a href="/users/profile/{{auth()->user()->id}}/edit" class="btn btn-info w-100 mt-2 mb-3 " style="font-size: 1.05rem;"><i class="bi bi-pencil-square" ></i> Edit</a>

        </div>
      </div>
    </div>

    <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12  pb-4 my-3" >
      <div class="rounded bg-w shadow-lg mb-3 w-100">
        <div class="rounded-top px-3 py-2" style="background-color: #c6c6c6;">
          {{-- Foto user  --}}
         <div class="d-flex" style="">
          <i class="bi bi-puzzle-fill" style="font-size: 1.65rem; color:#00081d; align-self: center;"></i>
          <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>Riwayat Tes</strong></p>
         </div>
        </div>
        <br>
        <div class="row justify-content-around px-4 pb-4">
          <div class="col-lg-5 col-md-12 px-4 py-3 img-raised rounded my-3" style="border: 2px solid #25407e; max-width: 80%;">
            <a href="/users/gayakepribadian/histories" class="" >
              <h4 style="color: #00081d; text-align: center; " class="mt-2 mb-3">Gaya Kepribadian</h4>
              <h1 class="text-xl font-weight-bold text-center" style="color: #212529; font-size: 5rem;">{{$gaya_kepribadian}}</h1>
              {{-- <img src="{{url('/assets/img/personality.png')}}" alt="Gaya Kepribadian" class="img-fluid w-50 img-center mb-3"> --}}
              <a href="/users/gayakepribadian/histories" class="btn btn-dark w-100">Lihat Riwayat Tes</a>
            </a> 
          </div>
          <div class="col-lg-5 col-md-12 px-4 py-3 img-raised rounded my-3" style="border: 2px solid #25407e; max-width: 80%;">
            <a href="/users/minatkarir/histories" class="" >
              <h4 style="color: #00081d; text-align: center; " class="mt-2 mb-3">Minat Karir</h4>
              <h1 class="text-xl font-weight-bold text-center" style="color: #212529; font-size: 5rem;">{{$minat_karir}}</h1>
              {{-- <img src="{{url('/assets/img/career.png')}}" alt="Minat Karir" class="img-fluid w-50 img-center mb-3"> --}}
              <a href="/users/minatkarir/histories" class="btn btn-dark w-100">Lihat Riwayat Tes</a>
            </a> 
          </div>
      </div>

      </div>
    </div>
  </div>
</div>
@include('sweetalert::alert')
@endsection