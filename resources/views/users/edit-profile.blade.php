@extends('users.layout-profile')

@section('container')
<div class="container">

    <div class="container  row justify-content-between mt-4">

      <div class="col-md-8 col-lg-8 col-sm-12 my-3 mr-auto">
        <div class=" rounded shadow-lg bg-w mb-4" style="max-width: 100%">
          <div class=" rounded-top px-3 py-2" style="background-color: #c6c6c6;">
            <div class="d-flex" style="">
              <i class="bi bi-person-circle" style="font-size: 1.7rem; color:#00081d; align-self: center;"></i>
              <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>Data Diri</strong></p>
            </div>
          </div>
          <div class="px-3 mt-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissable fade show justify-content-between mb-1" role="alert">
                  {{session('success')}}
                  <button type="button" class="close " data-bs-dismiss="alert" aria-label="Close" style="text-align: end"><i class="tim-icons icon-simple-remove"></i></button>
                </div>
            @endif
            @if (session()->has('update-error'))
                <div class="alert alert-danger alert-dismissable fade show justify-content-between mb-1" role="alert">
                  {{session('update-error')}}
                  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close" style="text-align: end; display:inline-flex; "><i class="tim-icons icon-simple-remove"></i></button>
                </div>
            @endif
          </div>
          <form action="/users/profile/update/{{ $user->id }}" enctype="multipart/form-data" method="post" class="px-3 py-3">
            @csrf
            <input type="hidden" name="email" value="{{$user->email}}">
            {{-- Input Nama Lengkap  --}}
            <div class="form-group mb-3 ">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" placeholder="Nama Lengkap" aria-label="Nama Lengkap" id="nama" name="nama" required value="{{ $user->nama }}">
            </div>
  
            {{-- Input No. Telp   --}}
            <div class="form-group mb-3 ">
              <label for="no_telp" class="form-label">Nomor Telepon</label>
              <input type="tel" class="form-control" placeholder="Nomor Telepon" aria-label="Nomor Telepon" id="no_telp" name="no_telp" required value="{{ $user->no_telp }}">
            </div>
  
            {{-- Input Perguruan Tinggi --}}
            <div class="form-group mb-3 ">
              <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi</label>
              <input type="text" class="form-control" placeholder="Perguruan Tinggi" aria-label="Perguruan Tinggi" id="perguruan_tinggi" name="perguruan_tinggi" required value="{{ $user->perguruan_tinggi }}">
            </div>
            
            <div class="row">
              {{-- Input Nim  --}}
              <div class="col-6">
                <div class="form-group mb-3 ">
                  <label for="nim" class="form-label">NIM/NPM</label>
                  <input type="text" class="form-control" placeholder="Nim atau Npm" aria-label="Nim atau Npm" id="nim" name="nim" value="{{ $user->nim }}">
                </div>
              </div>
              {{-- Input Jenjang  --}}
              <div class="col-6">
                <div class="form-group mb-3">
                  <label for="jenjang" class="form-label">Jenjang</label>
                  <select class="form-select" aria-label="Jenjang" name="jenjang">
                    <option @if ($user->jenjang == 'D1') selected @endif>D1</option>
                    <option @if ($user->jenjang == 'D2') selected @endif>D2</option>
                    <option @if ($user->jenjang == 'D3') selected @endif>D3</option>
                    <option @if ($user->jenjang == 'D4/S1') selected @endif>D4/S1</option>
                  </select>
                </div>
              </div>
            </div>
    
            <div class="row">
              {{-- Input Jurusan / Fakultas  --}}
              <div class="col-6">
                <div class="form-group mb-3 ">
                  <label for="jurusan" class="form-label">Jurusan/Fakultas</label>
                  <input type="text" class="form-control" placeholder="Jurusan/Fakultas" aria-label="Jurusan/Fakultas" id="jurusan" name="jurusan" required value="{{ $user->jurusan }}">
                </div>
              </div>
              
              {{-- Input Prodi  --}}
              <div class="col-6">
                <div class="form-group mb-3 ">
                  <label for="program_studi" class="form-label">Program Studi</label>
                  <input type="text" class="form-control" placeholder="Program Studi" aria-label="Program Studi" id="program_studi" name="program_studi" required value="{{ $user->program_studi }}">
                </div>
              </div>
            </div>
  
            {{-- Input URL LinkedIn --}}
            <div class="form-group mb-3 ">
              <label for="url_linkedin" class="form-label">URL LinkedIn</label>
              <input type="text" class="form-control" placeholder="URL LinkedIn" aria-label="URL LinkedIn" id="url_linkedin" name="url_linkedin" value="{{ $user->url_linkedin }}">
            </div>
  
            <button type="submit" class="btn btn-info ml-auto d-block">Simpan</button>
  
          </form>
        </div>

        
      </div>


      <div class="col-lg-4 col-md-4 col-sm-12 my-3 ">

        <div class=" rounded shadow-lg bg-w mb-4" style="max-width: 100%">
          <div class=" rounded-top px-3 py-2" style="background-color: #c6c6c6;">
            <div class="d-flex" style="">
              <i class="bi bi-person-circle" style="font-size: 1.7rem; color:#00081d; align-self: center;"></i>
              <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>Foto Profil</strong></p>
            </div>
          </div>
          <div class="bg-w py-3 px-4 rounded shadow-lg">
            <form action="/users/profile/upload/photo" method="post" entype="multipart/form-data">
              @csrf
              @if ($user->foto != null) 
                <img src="{{url($user->foto)}}" alt="{{ $user->nama }}" class="img-fluid mb-2 img-center rounded-center" style="max-height: ">  
              @else
                <img src="{{url('/assets/img/default-user.jpg')}}" alt="{{ $user->nama }}" class="img-thumbnail mb-2 img-center rounded-circle" style="max-height: 10rem">
              @endif
              {{-- <input type="file" name="foto" id="foto" class="form-control"> --}}
              <button type="button" class="btn btn-dark w-100" data-toggle="modal" data-target="#modal-foto">Ubah Foto</button>
            </form>
          </div>
        </div>
        
        {{--  Foto Ijazah  --}}
        <div class=" rounded shadow-lg bg-w mb-4" style="max-width: 100%">
          <div class=" rounded-top px-3 py-2" style="background-color: #c6c6c6;">
            <div class="d-flex" style="">
              <i class="bi bi-person-circle" style="font-size: 1.7rem; color:#00081d; align-self: center;"></i>
              <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>Ijazah atau KTM</strong></p>
            </div>
          </div>
          <div class="bg-w py-3 px-4 rounded shadow-lg">
            <form action="/users/profile/upload/ijazah" method="post" entype="multipart/form-data">
              @csrf
              <label for="ijazah" class="form-label">Ijazah atau KTM</label>
              @if ($user->ijazah != null) 
              <img src="{{url($user->ijazah)}}" alt="Ijazah/KTM" class="img-fluid mb-2 img-center rounded-center" style="max-height: ">  
              @else
                <img src="{{url('/assets/img/ktm-dummy.jpg')}}" alt="Ijazah/KTM" class="img-thumbnail mb-2 img-center " style="max-width: 100%">
                @endif
              <button type="button" class="btn btn-dark w-100" data-toggle="modal" data-target="#modal-foto">Ubah file</button>
            </form>
          </div>
        </div>
        
        {{-- File e-KTP  --}}
        <div class=" rounded shadow-lg bg-w mb-4" style="max-width: 100%">
          <div class=" rounded-top px-3 py-2" style="background-color: #c6c6c6;">
            <div class="d-flex" style="">
              <i class="bi bi-person-circle" style="font-size: 1.7rem; color:#00081d; align-self: center;"></i>
              <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>e-KTP</strong></p>
            </div>
          </div>
          <div class="bg-w py-3 px-4 rounded shadow-lg">
            <form action="/users/profile/upload/ktp" method="post" entype="multipart/form-data">
              @csrf
              <label for="ktp" class="form-label">File e-KTP</label>
              @if ($user->ktp != null) 
                <img src="{{url($user->ktp)}}" alt="e-KTP" class="img-fluid mb-2 img-center rounded-center" style="max-height: ">  
              @else
                <img src="{{url('/assets/img/ktp-dummy.png')}}" alt="e-KTP" class="img-thumbnail mb-2 img-center " style="max-width: 100%">
              @endif
              <button type="button" class="btn btn-dark w-100" data-toggle="modal" data-target="#modal-foto">Ubah file</button>
            </form>
          </div>
        </div>

        
        
      </div>
    </div>
</div>

<!-- Modal Upload Foto -->
<div class="modal fade" id="modal-foto" tabindex="-1" aria-labelledby="modal-fotoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/user/profile/upload/foto" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-upload-foto-label">Foto Profil</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="tim-icons icon-simple-remove"></i></span>
            </button>
        </div>
        <div class="modal-body">
            {{-- <p><b>Unggah Ijazah atau Kartu Tanda Mahasiswa</b></p>   --}}
            @if ($user->foto != null) 
              <img src="{{url($user->foto)}}" alt="Ijazah/KTM" class="img-fluid mb-2 img-center " style="max-height: 100%;">  
            @else
              <img src="{{url('/assets/img/default-user.jpg')}}" alt="Ijazah/KTM" class="img-thumbnail mb-2 img-center " style="max-width: 100%">
            @endif
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-info">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Upload Ijazah -->
<div class="modal fade" id="modal-ijazah" tabindex="-1" aria-labelledby="modal-ijazahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/user/profile/upload/ijazah" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-upload-ijazah-label">Ijazah atau KTM</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="tim-icons icon-simple-remove"></i></span>
            </button>
        </div>
        <div class="modal-body">
            {{-- <p><b>Unggah Ijazah atau Kartu Tanda Mahasiswa</b></p>   --}}
            @if ($user->ijazah != null) 
              <img src="{{url($user->ijazah)}}" alt="Ijazah/KTM" class="img-fluid mb-2 img-center " style="max-height: 100%;">  
            @else
              <img src="{{url('/assets/img/ktm-dummy.jpg')}}" alt="Ijazah/KTM" class="img-thumbnail mb-2 img-center " style="max-width: 100%">
            @endif
            <input type="file" name="ijazah" id="ijazah" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-info">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Upload KTP -->
<div class="modal fade" id="modal-ktp" tabindex="-1" aria-labelledby="modal-ktpLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/user/profile/upload/ktp" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-upload-ktp-label">e-KTP</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="tim-icons icon-simple-remove"></i></span>
            </button>
        </div>
        <div class="modal-body">
            {{-- <p><b>Unggah Ijazah atau Kartu Tanda Mahasiswa</b></p>   --}}
            @if ($user->ktp != null) 
              <img src="{{url($user->ktp)}}" alt="e-KTP" class="img-fluid mb-2 img-center " style="max-height: 100%;">  
            @else
              <img src="{{url('/assets/img/ktp-dummy.png')}}" alt="e-KTP" class="img-thumbnail mb-2 img-center " style="max-width: 100%">
            @endif
            <input type="file" name="ktp" id="ktp" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-info">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal untuk Logout-->
<div class="modal fade" id="modal-upload-ijazah" tabindex="-1" role="dialog" aria-labelledby="modal-upload-ijazah-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/user/profile/upload/ijazah" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-upload-ijazah-label">Ijazah atau KTM</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="tim-icons icon-simple-remove"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <p><b>Apakah Anda yakin ingin logout ?</b></p>  
            @if ($user->ijazah != null) 
              <img src="{{url($user->ijazah)}}" alt="Ijazah/KTM" class="img-fluid mb-2 img-center " style="max-height: 100%;">  
            @else
              <img src="{{url('/assets/img/ktm-dummy.jpg')}}" alt="Ijazah/KTM" class="img-thumbnail mb-2 img-center " style="max-width: 100%">
            @endif
            <input type="file" name="ijazah" id="ijazah" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container">
<!-- <section class="section">
    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h1 class="profile-title text-left">Profile</h1>
              </div>
              <div class="card-body">
                <form entype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" class="form-control" value="Mike">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="mike@email.com" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="001-12321345">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Perguruan Tinggi</label>
                        <input type="text" class="form-control" value="CreativeTim">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" value="CreativeTim">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Program Studi</label>
                        <input type="text" class="form-control" value="CreativeTim">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" id="nim"class="form-control" value="Mike" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Jenjang</label>
                        <input type="text" id="" class="form-control" value="Nim" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Ijazah/KTM</label>
                    </div>
                    <input type="file" class="form-control" >
                    </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Url LinkedIn</label>
                        <input type="url" class="form-control" @if ($user->url_linkedin != null)
                            value="{{ $user->url_linkedin}}"
                        @else value="" @endif  placeholder="Url LinkedIn">
                      </div>
                    </div>
                    
                  </div>
                  <button type="submit" class="btn btn-warning btn-round float-right" rel="tooltip" data-original-title="Can't wait for your message" data-placement="right">Send text</button>
                </form>
              </div>
            </div>
          </div>
          edit foto profile
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-coin ">
              <div class="card-header">
                @if ($user->foto != null)
                  <img src="{{ url($user->foto) }}" class="img-center img-fluid rounded-circle">  
                @else
                  <img src="{{ url('/assets/img/user.png')}}" class="img-center img-fluid rounded-circle" style="background-color: #fff">
                @endif
                <h4 class="title">{{auth()->user()->nama}}</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-warning justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#linkb">
                      Edit
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-subcategories">
                  <div class="tab-pane" id="linkb">
                    <div class="row">
                      <label class="col-sm-4 col-form-label">Ubah Foto</label>
                      <div class="col-sm-9">
                      <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Pilih</label>
                            </div>
                        <input type="file" class="form-control" placeholder="With Font Awesome Icons">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-simple btn-warning btn-icon btn-round float-right"><i class="tim-icons icon-send"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>   
</section> -->
</div>

@endsection