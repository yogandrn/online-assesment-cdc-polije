@extends('users.main')

@section('container')
    <div class="section container text-center col-md-9 col-lg-8 col-xl-8 col-sm-10 px-4">
        <h2>Tes Minat Karir</h2>
        <div class="" style="border: 0.4px solid #adaaaa; height: 1px"></div><br>
        <p style="font-size: 1.2rem; font-weight: bold;">Mohon Perhatian !!</p>
        <p>Tes Minat Karir ini sebagai perkiraan untuk memberikan gambaran umum tentang minat dan preferensi karir.Hasil tes ini bersifat perkiraan atau estimasi saja karena minat karir adalah hal yang kompleks dan dipengaruhi oleh banyak faktor, termasuk minat pribadi, keterampilan, nilai-nilai, dan pengalaman hidup.Tes ini tidak bertujuan untuk memberikan keputusan pasti hanya sebagai panduan tambahan dalam proses pengambilan keputusan karir. Untuk mengetahui secara lebih detail anda harus berkonsultasi ke profesional atau psikolog.</p>
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
            <h6 style="font-size: 1.08rem;">Available at : {{ $available_at}}</h6>
            <a role="button" href="/users/minatkarir/histories" class="btn btn-secondary">Lihat Riwayat Tes</a>
        @endif

    </div>

    {{-- Modal Popup Test  --}}
  <div class="modal fade" id="modal-minatkarir" tabindex="-1" aria-labelledby="modal-minatkarirLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-minatkarirLabel">Warning!</h4>
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
        <br>
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

@endsection
