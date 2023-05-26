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
            'name' => 'Conscientiousness',
            'description' => "Kepribadian ini adalah salah satu dimensi dari kepribadian big-five. Individu yang tinggi pada dimensi ini cenderung teratur, terorganisasi, ambisius, fokus pada pencapaian, dan disiplin. Orang yang mendapat skor tinggi dalam dimensi kepribadian ini memiliki sifat yang optimis, stabil secara emosional , terorganisir, berorientasi pada detail, dan baik dalam perencanaan.<br/>Conscientiousness, dengan kata lain sungguh-sungguh dalam melakukan tugas, bertanggung jawab, dapat diandalkan, menyukai keteraturan dan kedisiplinan. Di dalam kehidupan sehari-hari mereka tampil sebagai seorang yang hadir tepat waktu, berprestasi, teliti, dan suka melakukan pekerjaan hingga tuntas. Hal-hal yang akan mereka lakukan cenderung dipikirkan terlebih dahulu secara matang dan well organized. Ketika dihadapkan pada suatu tugas atau pekerjaan, mereka yang berkepribadian ini juga lebih mudah untuk fokus dalam menyelesaikannya sehingga rela untuk menomorduakan kesenangan pribadi dan patuh.",
            'saran_karir' => "Akuntan, Manager, Pegawai Kantoran, Pegawai Bank, Pegawai BUMN, PNS"
        ]);
        Kepribadian::create([
            'name' => 'Non-Conscientiousness',
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta sed maiores saepe, perspiciatis hic fugiat, nesciunt optio beatae sint dolore inventore cupiditate ab omnis veritatis.<br/>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta sed maiores saepe, perspiciatis hic fugiat, nesciunt optio beatae sint dolore inventore cupiditate ab omnis veritatis.",
            'saran_karir' => "Seniman, Konten Kreator"
        ]);
    }
}
