@extends('users.main')

@section('container')

<div class="container" style="margin-top: 3rem; margin-bottom: 5rem">
  <div class="container px-4 py-3" style="background-color: #fff">
    <h3 class="text-center text">Riwayat Tes Minat Karir</h3>
    <div class="table-responsive">
      <table class="table " >
        <thead>
          <tr>
            <th class="text">#</th>
            <th class="text">Waktu Tes</th>
            <th class="text">Tersedia Kembali</th>
            <th class="text">Jenis Tes</th>
            <th class="text">Lihat Detail</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($hasil as $item)
          <tr>
            <td class="text">{{ $loop->iteration }}</td>
            <td class="text">{{ \Carbon\Carbon::parse($item['test']['started_at'])->format('d
              M Y - H:i:s') }}</td>
            <td class="text">{{ \Carbon\Carbon::parse($item['test']['started_at'])->addDays(90)->format('d
              M Y - H:i:s') }}</td>
            <td class="text">{{ $item['test']['jenis_test'] }}</td>
            <td class="text text-center">
              <a href="/users/minatkarir/result/{{ $item['test_token'] }}"  class="btn btn-info">Lihat Detail</a>
            </td>
          </tr>
          
          @empty 
            <p class="text">Belum ada riwayat tes</p>
          @endforelse
        </tbody>

      </table>
    </div>
  </div>
</div>

@endsection