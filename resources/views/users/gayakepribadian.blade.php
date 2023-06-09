@extends('users.main')

@section('container')

    <div class="section container text-center col-md-9 col-lg-8 col-xl-8 col-sm-10 px-4">
        <h2>Tes Gaya Kepribadian</h2>
        <div class="" style="border: 0.4px solid #adaaaa; height: 1px"></div>
        <br>
        <p style="font-size: 1.2rem; font-weight: bold;">Mohon Perhatian !!</p>
        <p>Tes Gaya Kepribadian ini akan memberikan gambaran seberapa tinggi tingkat kepribadian Concientiousnes yang anda miliki, kepribadian tersebut dapat membantu anda mengetahui gambaran karakter anda. Tes ini tidak bisa dianggap sepenuhnya valid karena kepribadian seseorang dapat dipengaruhi oleh konteks dan situasi tertentu. Hasil tes bisa jadi terasa kurang tepat atau berbeda dengan tes lain. Untuk mengetahui secara lebih detail anda harus berkonsultasi ke profesional atau psikolog</p>
        <br>
        <div class="" style="border: 0.4px solid #adaaaa; height: 1px"></div>
        <br>
        
        @if ($is_available == 'true')
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-kepribadian">
                Mulai
            </button>      
        @else
        <h6 style="font-size: 1.08rem;">Kamu sudah melakukan tes. Tes ini bisa dilakukan dalam 90 hari lagi.</h6>
        <h6 style="font-size: 1.08rem;">Available at : {{ $available_at}}</h6>
        <a role="button" href="/users/gayakepribadian/histories" class="btn btn-secondary">Lihat Riwayat Tes</a>
        @endif
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="modal-kepribadian" tabindex="0" role="dialog" aria-labelledby="modal-kepribadian-label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title text-center" id="modal-kepribadian-label">Warning!</h4>
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
            <form action="/users/gayakepribadian/start" method="post">
              @csrf
                  <button type="submit" class="btn btn-info">Mulai Tes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    

@endsection    


