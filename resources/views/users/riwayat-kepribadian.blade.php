@extends('users.main')

@section('container')

    <div class="container" style="margin-top: 3rem; margin-bottom: 5rem;">
        
        <div class="container px-4 py-3" style="background-color: #fff;">
            <h3 class="text-center text">Riwayat Tes Gaya Kepribadian</h3>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th></th>
                </thead>
                <tbody>

                </tbody>
            </table>
            @forelse ($hasil as $item)
                <div class="row  rounded shadow-lg px-4 py-3" style="">
                    <div class="col-8">
                        <p class="text">{{ \Carbon\Carbon::parse($item['test']['started_at'])->format('d M Y') }}</p>
                    </div>
                    <div class="col-4"></div>
                </div>
            @empty
                
            @endforelse

        </div>

    </div>

@endsection