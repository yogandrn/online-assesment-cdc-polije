@extends('users.main')

@section('container')

    <div class="section container text-center col-md-9 col-lg-8 col-xl-8 col-sm-10 px-4">
        <h2>Tes Gaya Kepribadian</h2>
        <div class="" style="border: 0.4px solid #adaaaa; height: 1px"></div>
        <br>
        <p style="font-size: 1.2rem; font-weight: bold;">Perhatian !!</p>
        <p>Tes Gaya Kepribadian ini akan memberikan gambaran seberapa tinggi tingkat kepribadian Concientiousnes yang Anda miliki, kepribadian tersebut dapat membantu Anda mengetahui gambaran karakter Anda. Tes ini tidak bisa dianggap sepenuhnya valid karena kepribadian seseorang dapat dipengaruhi oleh konteks dan situasi tertentu. Hasil tes bisa jadi terasa kurang tepat atau berbeda dengan tes lain. Untuk mengetahui secara lebih detail Anda harus berkonsultasi ke profesional atau psikolog</p>
        <br>
        <div class="" style="border: 0.4px solid #adaaaa; height: 1px"></div>
        <br>
        
        @if ($is_available == 'true')
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-info">
                Mulai
            </button>      
        @else
        <h6 style="font-size: 1.08rem;">Anda sudah melakukan tes. Tes ini bisa dilakukan 14 hari kemudian.</h6>
        <h6 style="font-size: 1.08rem;">Available at : {{ $available_at}}</h6>
        <a role="button" href="/users/gayakepribadian/histories" class="btn btn-secondary">Lihat Riwayat Tes</a>
        @endif
    </div>

  {{-- Modal Petunjuk Test  --}}
  <div class="modal fade" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-info-label">Petunjuk Tes</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="tim-icons icon-simple-remove"></i></span>
            </button>
        </div>
        <div class="modal-body">
          <p>• Tes Gaya Kepribadian ini berisi 30 pernyataan yang harus Anda berikan pilihan jawaban <strong>"Ya"</strong> untuk yang sesuai dengan diri Anda dan <strong>"Tidak"</strong> untuk yang tidak sesuai dengan diri Anda.</p>
          <p>• Tes berikut diperkirakan membutuhkan waktu sekitar 5 menit untuk Anda selesaikan.</p>
          <p>• Apabila Anda tidak memberikan pilihan jawaban terhadap pernyataan yang ada, maka sistem secara otomatis memberikan jawaban <strong>"Tidak"</strong>. </p>
          {{-- <ol style="list-style: true;list-style-type: disc; list-style-color: #00081d">
            <li>
              <p>Tes Minat Karir ini berisi 60 pernyataan yang harus Anda berikan pilihan jawaban "Ya" untuk yang sesuai dengan diri Anda dan "Tidak" untuk yang tidak sesuai dengan diri Anda.</p>
            </li>
            <li>
              <p>Tes berikut diperkirakan membutuhkan waktu sekitar 10 menit untuk Anda selesaikan.</p>
            </li>
            <li>
              <p>Apabila Anda tidak memberikan pilihan jawaban terhadap pernyataan yang ada, maka sistem secara otomatis memberikan jawaban "Tidak". </p>
            </li>
          </ol> --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-info" id="btn-next" data-toggle="modal" data-target="#modal-start" data-dismiss="modal">Lanjutkan</button>
      </div>
      </div>
    </div>
  </div>  

  {{-- Modal Start Test  --}}
  <div class="modal fade" id="modal-start" tabindex="-1" role="dialog" aria-labelledby="modal-start-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="modal-start-label">Warning!</h4>
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
          <br>
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



