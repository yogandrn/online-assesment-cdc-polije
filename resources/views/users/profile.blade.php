@extends('users.main')

@section('container')
<div class="container">
<section class="section">
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
                        <label2e>Email address</label>
                        <input type="email" class="form-control" placeholder="mike@email.com" disabled>
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
                        <input type="text" id="nim"class="form-control" value="Mike" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Jenjang</label>
                        <input type="text" id="" class="form-control" value="Nim" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Ijazah/KTM</label>
                    </div>
                    <input type="file" class="form-control" placeholder="With Font Awesome Icons">
                    </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Url Linkedin</label>
                        <input type="url" class="form-control" value="CreativeTim">
                      </div>
                    </div>
                    
                  </div>
                  <button type="submit" class="btn btn-primary btn-round float-right" rel="tooltip" data-original-title="Can't wait for your message" data-placement="right">Send text</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-coin ">
              <div class="card-header">
                <img src="../assets/img/mike.jpg" class="img-center img-fluid rounded-circle">
                <h4 class="title">{{auth()->user()->nama}}</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
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
                    <button type="submit" class="btn btn-simple btn-primary btn-icon btn-round float-right"><i class="tim-icons icon-send"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</section>
</div>
@endsection