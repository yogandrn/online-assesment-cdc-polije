<?php

namespace Database\Seeders;

use App\Models\Kepribadian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KepribadianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kepribadian::create([
            'name' => 'High Conscientiousness',
            'description' => "Anda memiliki kepribadian Conscientiousness tinggi. <br> Dimensi kepribadian conscientiousness merupakan sifat teratur dan berhati-hati yang ada dalam diri seseorang. Individu dengan nilai conscientiousness tinggi digambarkan sebagai seseorang yang cenderung berhati-hati dalam melakukan suatu tindakan, penuh pertimbangan dalam mengambil keputusan, memiliki disiplin diri yang tinggi, penuh tanggung jawab, sangat teratur, berorientasi pada hasil pekerjaan yang optimal, dan dapat diandalkan dalam pekerjaannya.",
            'saran_karir' => "Petugas administrasi, pekerja kantoran, pegawai bank, dan manager.",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Kepribadian::create([
            'name' => 'Low-Conscientiousness',
            'description' => "Anda memiliki kepribadian Conscientiousness yang rendah. <br> individu dengan nilai conscientiousness rendah digambarkan sebagai individu yang cenderung kurang berhati-hati dalam menyelesaikan pekerjaan, cenderung terburu-buru baik dalam bertindak atau mengambil keputusan, cenderung kurang teratur, kurang bisa bertanggung jawab, hasil pekerjaan apa adanya, dan kurang dapat diandalkan dalam melakukan pekerjaan.",
            'saran_karir' => "seniman, desainer grafis, penulis, musisi, pemandu wisata, fotografer, videografer, marketing",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
