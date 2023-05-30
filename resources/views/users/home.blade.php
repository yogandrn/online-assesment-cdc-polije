@extends('users.main')

@section('container')

<!-- Card Menu -->
    <div class="section section-examples" data-background-color="black">
        <img src="{{ url('assets/img/path1.png')}}" class="path">
        <div class="container">
          <div class="content-center brand">
            <p style="text-align: center;">This is Our Services</p>
            <p style="text-align: center;">Get to Know Your Personality</p>
          </div>
        </div>
        <div class="space-20"></div>
        <br></br>
        <div class="container text-center">
          <div class="row">
            <div class="col-sm-6">
              <a href="examples/Gaya Kepribadian">
                <img src="{{url('assets/img/kepribadian.jpg')}}" alt="Image" class="img-raised" width="350">
              </a>
              <br></br>
              <a href="/users/gayakepribadian" class="btn btn-warning">Tes Gaya Kepribadian</a>
              {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                Test Gaya Kepribadian
              </button> --}}
              <!-- <a href="examples/landing-page.html" class="btn btn-simple btn-primary btn-round">Test Gaya Kepribadian</a> -->
            </div>
            <div class="col-sm-6">
              <a href="examples/Minat Karir">
                <img src="{{ url('assets/img/minatkarir.jpg')}}" alt="Image" class="img-raised" width="350">
              </a>
              <br></br>
              {{-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modalku">
                Test Minat Karir
              </button> --}}
              <a href="/users/minatkarir" class="btn btn-warning">Tes Minat Karir</a>

              <!-- <a href="examples/profile-page.html" class="btn btn-simple btn-primary btn-round">Test Minat Karir</a> -->
            </div>
          </div>
        </div>
    </div>    

    <!-- isi popup -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header justify-content-center">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
              <h4 class="title title-up">WARNING!!</h4>
            </div>
            <div class="modal-body">
              <p><b>Apakah kamu berada dalam situasi yang tenang?</b></p>
              <p>Untuk hasil optimal, kamu harus mengerjakan setiap soal dalam kondisi stamina yang fit dan pikiran fokus. Situasi tenang akan mendukung pikiran kamu untuk fokus. Pastikan pula kamu tidak sedang mengerjakan aktivitas lain saat mengerjakan asesmen ini.
              </p>
              
              <p><b>Apakah saluran internet kamu lancar?</b></p>
              <P>Setiap soal memiliki waktu pengerjaannya sendiri. Koneksi internet yang lancar akan mendukung kamu untuk mengerjakan soal dengan tepat dan hasilnya pun akan valid.</P>
              <p><b>•	Apakah kamu fokus untuk mengerjakan asesmen ini tanpa ada aktivitas lainnya?</b></p>
            </div>
            <div class="modal-footer">
              <a href="/users/gayakepribadian"><button type="button" class="btn btn-default">Lanjut</button></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
    </div>
    <!-- endpopup -->
    <div class="modal fade" id="Modalku" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header justify-content-center">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
              <h4 class="title title-up">WARNING!!</h4>
            </div>
            <div class="modal-body">
              <p><b>Apakah kamu berada dalam situasi yang tenang?</b></p>
              <p>Untuk hasil optimal, kamu harus mengerjakan setiap soal dalam kondisi stamina yang fit dan pikiran fokus. Situasi tenang akan mendukung pikiran kamu untuk fokus. Pastikan pula kamu tidak sedang mengerjakan aktivitas lain saat mengerjakan asesmen ini.
              </p>
              
              <p><b>Apakah saluran internet kamu lancar?</b></p>
              <P>Setiap soal memiliki waktu pengerjaannya sendiri. Koneksi internet yang lancar akan mendukung kamu untuk mengerjakan soal dengan tepat dan hasilnya pun akan valid.</P>
              <p><b>•	Apakah kamu fokus untuk mengerjakan asesmen ini tanpa ada aktivitas lainnya?</b></p>
            </div>
            <div class="modal-footer">
              <a href="/users/minatkarir"><button type="button" class="btn btn-default">Lanjut</button></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
    </div>




@endsection


  <!-- Modal -->
  <div class="modal fade" id="modal-kepribadian" tabindex="0" role="dialog" aria-labelledby="modal-kepribadian-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-kepribadian-label">Warning!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p><b>Apakah kamu berada dalam situasi yang tenang?</b></p>
            <p>Untuk hasil optimal, kamu harus mengerjakan setiap soal dalam kondisi stamina yang fit dan pikiran fokus. Situasi tenang akan mendukung pikiran kamu untuk fokus. Pastikan pula kamu tidak sedang mengerjakan aktivitas lain saat mengerjakan asesmen ini.
            </p>
            
            <p><b>Apakah saluran internet kamu lancar?</b></p>
            <p>Setiap soal memiliki waktu pengerjaannya sendiri. Koneksi internet yang lancar akan mendukung kamu untuk mengerjakan soal dengan tepat dan hasilnya pun akan valid.</p>
            <p><b>•	Apakah kamu fokus untuk mengerjakan asesmen ini tanpa ada aktivitas lainnya?</b></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="/users/minatkarir" type="button" class="btn btn-warning"></a>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
