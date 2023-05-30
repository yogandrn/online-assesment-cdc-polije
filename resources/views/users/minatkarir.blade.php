@extends('users.main')

@section('container')
    <div class="section container text-center col-md-9 col-lg-8 col-xl-8 col-sm-10">
        <h2>Tes Minat Karir</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea exercitationem, odio beatae iste nulla sapiente, amet recusandae voluptate a enim adipisci! Doloribus possimus officiis et!</p>
        <br>
        <div class="" style="border: 0.4px solid #adaaaa; height: 1px"></div>
        <br>

        {{-- // jika tes bisa diakses --}}
        @if ($is_available == 'true') 
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-minatkarir">
                Mulai
            </button>     
        {{-- // jika sudah pernah tes   --}}
        @else
            <h6 style="font-size: 1.08rem;">Kamu sudah melakukan tes. Tes ini bisa dilakukan dalam 90 hari lagi.</h6>
            <h6 style="font-size: 1.08rem;">{{ $available_at}}</h6>
        @endif

    </div>

@endsection


  <!-- Modal -->
  <div class="modal fade" id="modal-minatkarir" tabindex="0" role="dialog" aria-labelledby="modal-minatkarir-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-minatkarir-label">Warning!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="tim-icons icon-simple-remove"></i></span>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <form action="/users/minatkarir/start" method="post">
            @csrf
                <button type="submit" class="btn btn-info">Mulai Tes</button>
            </form>
        </div>
      </div>
    </div>
  </div>