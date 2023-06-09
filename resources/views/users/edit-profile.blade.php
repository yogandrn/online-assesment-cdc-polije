@extends('users.layout-profile')

@section('container')
<div class="container">

    <div class="row justify-content-center mt-4">

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
                  <button type="button" class="close " data-dismiss="alert" aria-label="Close" style="text-align: end"><i class="tim-icons icon-simple-remove"></i></button>
                </div>
            @endif
            @if (session()->has('update-error'))
                <div class="alert alert-danger alert-dismissable fade show justify-content-between mb-1" role="alert">
                  {{session('update-error')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="text-align: end; display:inline-flex; "><i class="tim-icons icon-simple-remove"></i></button>
                </div>
            @endif
          </div>
          <form action="/users/profile/update/{{ $user->id }}" enctype="multipart/form-data" method="post" class="px-3 py-3">
            @csrf
            <input type="hidden" name="email" value="{{$user->email}}">
            {{-- Input Nama Lengkap  --}}
            <div class="form-group mb-3 ">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" aria-label="Nama Lengkap" id="nama" name="nama" required value="{{ $user->nama }}"  readonly>
              @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
            </div>
  
            {{-- Input No. Telp   --}}
            <div class="form-group mb-3 ">
              <label for="no_telp" class="form-label">Nomor Telepon</label>
              <input type="tel" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Nomor Telepon" aria-label="Nomor Telepon" id="no_telp" name="no_telp" required value="{{ $user->no_telp }}" minlength="9" maxlength="15">
              @error('no_telp') <div class="invalid-feedback">{{$message}}</div> @enderror
            </div>
  
            {{-- Input Perguruan Tinggi --}}
            <div class="form-group mb-3 ">
              <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi</label>
              <input type="text" class="form-control @error('perguruan_tinggi') is-invalid @enderror" placeholder="Perguruan Tinggi" aria-label="Perguruan Tinggi" id="perguruan_tinggi" name="perguruan_tinggi" required value="{{ $user->perguruan_tinggi }}" minlength="4" maxlength="100" readonly>
              @error('perguruan_tinggi') <div class="invalid-feedback">{{$message}}</div> @enderror
            </div>
            
            <div class="row">
              @if ($user->nim != null)
              {{-- Input Nim  --}}
              <div class="col">
                <div class="form-group mb-3 ">
                  <label for="nim" class="form-label @error('nim') is-invalid @enderror">NIM/NPM</label>
                  <input type="text" class="form-control" placeholder="Nim atau Npm" aria-label="Nim atau Npm" id="nim" name="nim" value="{{ $user->nim }}" minlength="4" maxlength="15" readonly>
                  @error('nim') <div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
              </div>
              @else
                  <div class=""></div>
              @endif
              {{-- Input Jenjang  --}}
              <div class="col">
                <div class="form-group mb-3">
                  <label for="jenjang" class="form-label">Jenjang</label>
                  <input type="text" class="form-control" name="jenjang" id="jenjang" value="{{$user->jenjang}}" readonly>
                </div>
              </div>
            </div>
    
            <div class="row">
              {{-- Input Jurusan / Fakultas  --}}
              <div class="col-6">
                <div class="form-group mb-3 ">
                  <label for="jurusan" class="form-label">Jurusan/Fakultas</label>
                  <input type="text" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Jurusan/Fakultas" aria-label="Jurusan/Fakultas" id="jurusan" name="jurusan" required value="{{ $user->jurusan }}" minlength="4" maxlength="99" readonly>
                  @error('jurusan') <div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
              </div>
              
              {{-- Input Prodi  --}}
              <div class="col-6">
                <div class="form-group mb-3 ">
                  <label for="program_studi" class="form-label">Program Studi</label>
                  <input type="text" class="form-control @error('program_studi') is-invalid @enderror" placeholder="Program Studi" aria-label="Program Studi" id="program_studi" name="program_studi" required value="{{ $user->program_studi }}" minlength="4" maxlength="99" readonly>
                  @error('program_studi') <div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
              </div>
            </div>
  
            {{-- Input URL LinkedIn --}}
            <div class="form-group mb-3 ">
              <label for="url_linkedin" class="form-label">URL LinkedIn</label>
              <input type="text" class="form-control @error('url_linkedin') is-invalid @enderror" placeholder="URL LinkedIn" aria-label="URL LinkedIn" id="url_linkedin" name="url_linkedin" value="{{ $user->url_linkedin }}" minlength="6" maxlength="255">
              @error('url_linkedin') <div class="invalid-feedback">{{$message}}</div> @enderror
            </div>
  
            <button type="submit" class="btn btn-info ml-auto d-block">Simpan</button>
  
          </form>
        </div>

        
      </div>


      <div class="col-lg-4 col-md-4 col-sm-12 my-3 ">

        <div class=" rounded shadow-lg bg-w mb-4" style="max-width: 100%">
          <div class=" rounded-top px-3 py-2" style="background-color: #c6c6c6;">
            <div class="d-flex" style="">
              <i class="bi bi-person-video" style="font-size: 1.7rem; color:#00081d; align-self: center;"></i>
              <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>Foto Profil</strong></p>
            </div>
          </div>
          <div class="bg-w py-3 px-4 rounded shadow-lg text-center">
            @if (session()->has('update-photo-error'))
              <div class="alert alert-danger alert-dismissable fade show justify-content-between mb-1" role="alert">
                {{session('update-photo-error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="text-align: end; display:inline-flex; "><i class="tim-icons icon-simple-remove"></i></button>
              </div>
            @endif
            <form action="/users/profile/{{$user->id}}/upload/photo" method="post" entype="multipart/form-data">
              @csrf
              @if ($user->foto != null) 
                <a href="{{ url('/' . $user->foto) }}" target="_blank" rel="noopener noreferrer"><img src="{{url('/' . $user->foto)}}" alt="{{ $user->nama }}" class="img-thumbnail mb-2 img-center rounded-circle" style="max-width: 10rem">  </a>
              @else
                <img src="{{url('/assets/img/user/photos/default-user.jpg')}}" alt="{{ $user->nama }}" class="img-thumbnail mb-2 img-center rounded-circle" style="max-height: 10rem">
              @endif
              {{-- <input type="file" name="foto" id="foto" class="form-control"> --}}
              <button type="button" class="btn btn-dark " data-toggle="modal" data-target="#modal-foto">Ubah Foto</button>
            </form>
          </div>
        </div>
        
        {{--  Foto Ijazah  --}}
        <div class=" rounded shadow-lg bg-w mb-4" style="max-width: 100%">
          <div class=" rounded-top px-3 py-2" style="background-color: #c6c6c6;">
            <div class="d-flex" style="">
              <i class="bi bi-person-vcard-fill" style="font-size: 1.7rem; color:#00081d; align-self: center;"></i>
              <p style="color: #00081d; text-align: ; font-size: 1.25em; align-self: center;" class="ml-3"><strong>Ijazah atau KTM</strong></p>
            </div>
          </div>
          <div class="bg-w py-3 px-4 rounded shadow-lg text-center">
            <form action="/users/profile/{{$user->id}}/upload/ijazah" method="post" entype="multipart/form-data">
              @csrf
              <label for="ijazah" class="form-label">Ijazah atau KTM</label>
              @if ($user->ijazah != null) 
                <a href="{{ url('/' . $user->ijazah) }}" target="_blank" rel="noopener noreferrer"><img src="{{url('/'.$user->ijazah)}}" alt="Ijazah/KTM" class="img-thumbnail mb-2 img-center" style="max-widht: 100%">  </a>
              @else
                <img src="{{url('/assets/img/user/ijazah/default-ktm.png')}}" alt="Ijazah/KTM" class="img-thumbnail mb-2 img-center " style="max-width: 100%">
                @endif
              <button type="button" class="btn btn-dark " data-toggle="modal" data-target="#modal-ijazah">Ubah file</button>
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
      <form action="/users/profile/{{$user->id}}/upload/photo" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-upload-foto-label">Foto Profil</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="tim-icons icon-simple-remove"></i></span>
            </button>
        </div>
        <div class="modal-body">
            {{-- <p><b>Unggah Ijazah atau Kartu Tanda Mahasiswa</b></p>   --}}
            @if ($user->foto != null) 
              <img id="image-profile" src="{{url('/' .$user->foto)}}" alt="{{$user->nama}}" class="img-fluid mb-2 img-center " style="max-height: 100%;">  
            @else
              <img id="image-profile" src="{{url('/assets/img/user/photos/default-user.jpg')}}" alt="{{$user->nama}}" class="img-fluid mb-2 img-center " style="max-width: 100%">
            @endif
            <input type="file" name="foto" id="foto" class="form-control" onchange="previewFoto(event)" accept=".jpg, .jpeg, .png">
            <label class="mt-2">Unggah file .jpg, .jpeg, atau .png maximal 1MB</label>
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
    <div class="modal-content px-3 pt-2 pb-3">
      <form action="/users/profile/{{$user->id}}/upload/ijazah" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-upload-ijazah-label">Ijazah atau KTM</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="tim-icons icon-simple-remove"></i></span>
            </button>
        </div>
        <div class="modal-body">
            {{-- <p><b>Unggah Ijazah atau Kartu Tanda Mahasiswa</b></p>   --}}
            @if ($user->ijazah != null) 
              <img id="image-ijazah" src="{{url($user->ijazah)}}" alt="Ijazah/KTM" class="img-fluid mb-2 img-center " style="max-height: 100%;">  
            @else
              <img id="image-ijazah" src="{{url('/assets/img/user/ijazah/default-ktm.png')}}" alt="Ijazah/KTM" class="img-fluid mb-2 img-center " style="max-width: 100%">
            @endif
            <input type="file" name="ijazah" id="ijazah" class="form-control" onchange="previewIjazah(event)" accept=".jpg, .jpeg, .png">
            <label class="mt-2">Unggah file .jpg, .jpeg, atau .png maximal 1MB</label>
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
      <form action="/users/profile/{{$user->id}}/upload/ktp" method="post" enctype="multipart/form-data">
        @csrf
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

<script>
  function previewIjazah(event) {
  let input = event.target;
  let reader = new FileReader();

  reader.onload = function () {
    let imagePreview = document.getElementById('image-ijazah');
    imagePreview.src = reader.result;
  };

  reader.readAsDataURL(input.files[0]);
  }
  
  function previewFoto(event) {
  let input = event.target;
  let reader = new FileReader();

  reader.onload = function () {
    let imagePreview = document.getElementById('image-profile');
    imagePreview.src = reader.result;
  };

  reader.readAsDataURL(input.files[0]);
}
</script>

@include('sweetalert::alert')
@endsection