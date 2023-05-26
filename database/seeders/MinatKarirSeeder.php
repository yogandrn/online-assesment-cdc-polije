<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinatKarirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('minat_karir')->insert([
            [
                'name' => 'Realistic',
                'description' => 'Tipe ini memiliki kecenderungan berorientasi pada penerapan yang teratur dan sistematis. Kamu menyukai tugas-tugas yang konkrit, praktis, mengutamakan keterampilan fisik, kekuatan otot dan keahlian tertentu  dengan kemampuan yang cenderung individual, tidak menyukai pekerjaan yang melibatkan orang banyak, atau bekerja secara team serta banyak menggunakan kemampuan komunikasi. Memiliki keterampilan sosial yang kurang baik, dan kurang peka dengan lingkungan sekitar atau orang lain, sehingga pekerjaan yang berkaitan dengan orang lain akan kamu hindari.',
                'saran_karir' => 'Pekerjaan di bidang teknik, bidang penelitian seperti ahli mesin, ahli komputer, ahli kelistrikan, dan arsitek.'
            ],
            [
                'name' => 'Investigative',
                'description' => 'Pada tipe ini kamu memiliki kecenderungan untuk memilih pekerjaan yang bersifat akademik dan intelektual. Kamu akan menyukai tugas-tugas yang abstrak, membutuhkan intelegensi dan kreativitas yang tinggi. Kriteria keberhasilan pekerjaan buat kamu adalah bersifat objektif dan dapat diukur. Sehingga tipe ini juga dikenal sebagai “Pemikir”',
                'saran_karir' => 'ahli fisika, ahli biologi, antropologi, pekerjaan penelitian, guru  ilmu IPA, dosen, peneliti, dokter, bidan, perawat, psikolog, desainer, dll.'
            ],
            [
                'name' => 'Artistic',
                'description' => 'Tipe kepribadian ini memiliki kecenderungan untuk menjalin hubungan dengan orang lain secara tidak langsung, dan juga mengalami kesulitan untuk menyesuaikan diri. Kamu akan menyukai tugas-tugas yang berkaitan dengan hal-hal yang membutuhkan interpretasi atau kreasi melalui perasaan dan imajinasi.<br/>Kamu bisa sangat menghindari pekerjaan yang menuntut keteraturan, dan rutinitas, lebih menyukai pekerjaan yang tanpa jam kerja dan menjalin hubungan atau bersosial dan berhubungan dengan menciptakan karya seni atau kreatifitas atau hal-hal yang membuat orang lain bahagia dengan ide-ide yang dimiliki.',
                'saran_karir' => 'content creator, pemusik, pencipta lagu, pelukis, dan   desain grafis, tata rias, desain panggung, pembuat taman, dll.'
            ],
            [
                'name' => 'Social',
                'description' => 'Sesuai dengan namanya, tipe kepribadian yang satu ini dikenal sebagai “Penolong”. Tipe ini memiliki kecenderungan untuk membantu dan mementingkan orang lain. Sangat menyukai pekerjaan yang berhubungan dengan orang lain dan membantu orang lain. Kemampuan bersosialisasi dan berkomunikasi  merupakan kelebihan yang dimiliki.<br/>Tipe pekerjaan yang kamu sukai tentunya pekerjaan yang berhubungan langsung dengan orang lain dan kegiatan kemanusiaan.',
                'saran_karir' => 'konselor, guru, pekerja sosial, dan pekerjaan lain yang sejenis.'
            ],
            [
                'name' => 'Enterprising',
                'description' => 'Tipe kepribadian ini adalah tipe yang paling menyukai kegiatan membujuk dan mempengaruhi orang lain. Sangat pandai dalam mengajak, menawarkan, dan merayu lawan bicaramu. Kelebihanmu adalah kamu mampu menyampaikan sesuatu secara efektif dan menarik, hingga dapat mempengaruhi orang lain.<br/>Tipe pekerjaan yang sesuai dengan kepribadian ini adalah pekerjaan yang berkaitan dengan kegiatan yang menggunakan kemampuan verbal untuk mengarahkan dan mempengaruhi orang lain.',
                'saran_karir' => 'pedagang, marketing, politikus, manajer perusahaan, MC, penyiar radio, pengisis suara film dll.'
            ],
            [
                'name' => 'Conventional',
                'description' => 'Tipe kepribadian ini cenderung menyukai kegiatan yang teratur dan terorganisir. Menyukai pekerjaan yang rutin dan teratur setiap harinya dengan jadwal dan aturan yang telah ditetapkan.<br/>Tipe pekerjaan yang cocok untuk kamu adalah pekerjaan kantoran yang membutuhkan ketelitian, terorganisir dengan baik, dan bersifat terorganisir.',
                'saran_karir' => 'pegawai kantor, penjaga kasir, statistika, pegawai bank, dan pekerjaan lain yang sejenis.'
            ],
        ]);
    }
}
