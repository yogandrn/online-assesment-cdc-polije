<?php

namespace Database\Seeders;

use App\Models\PernyataanKepribadian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PernyataanKepribadianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya selalu memiliki daftar tugas yang harus saya selesaikan setiap hari.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya disiplin dalam bekerja.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya merasa tidak puas jika hasil kerja saya tidak memenuhi standar.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya selalu berusaha untuk mengikuti jadwal dan tenggat waktu yang telah ditetapkan.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya selalu mengatur jadwal kegiatan sehari-hari.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya merasa terganggu jika jadwal saya tidak teratur.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya memiliki kebiasaan memperhatikan detail kecil dalam pekerjaan dan aktivitas sehari-hari.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya menyelesaikan tugas sesuai jadwal.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya terbiasa menyimpan catatan sebagai referensi.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya merasa tidak nyaman jika tugas yang diberikan tidak jelas atau tidak terstruktur.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya selalu berusaha mendapatkan hasil yang maksimal dalam pekerjaan.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya akan berpegang pada komitmen dan janji yang telah saya buat.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya cenderung berpikir panjang dan mempertimbangkan semua faktor sebelum membuat keputusan.'
        ]);
        PernyataanKepribadian::create([
            'pernyataan' => 'Saya merasa bangga ketika menyelesaikan pekerjaan dengan baik.'
        ]);
    }
}
