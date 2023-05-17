<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'Yoga Andrian',
            'email' => 'yogandrn@gmail.com',
            'no_telp' => '08976863864',
            'nim' => 'e41201747',
            'jenis_kandidat' => 'Mahasiswa',
            'jenjang' => 'D4/S1',
            'jurusan' => 'Teknologi Informasi',
            'program_studi' => 'Teknik Informatika',
            'password' => bcrypt('password'),

        ]);

        User::create([
            'nama' => 'Admin CDC',
            'email' => 'admin@gmail.com',
            'no_telp' => '0858550993221',
            'nim' => 'e4120000',
            'jenis_kandidat' => 'Administrator',
            'jenjang' => 'D4/S1',
            'jurusan' => 'Teknologi Informasi',
            'program_studi' => 'Teknik Informatika',
            'roles' => 'ADMIN',
            'password' => Hash::make('admin123'),

        ]);

        Test::create([
            'judul_kuisioner' => 'Gaya Kepribadian'
        ]);

        Test::create([
            'judul_kuisioner' => 'Minat Karir',
        ]);

        Question::create([
            'id_kuisioner' => 1,
            'pertanyaan' => 'Apa yang paling kamu inginkan ?',
        ]);
        
        Question::create([
            'id_kuisioner' => 1,
            'pertanyaan' => 'Apa yang paling kamu benci ?',
        ]);

        Answer::create([
            'id_pertanyaan' => 1,
            'jawaban' => 'Uang',
            'bobot' => 9,
        ]);

        Answer::create([
            'id_pertanyaan' => 1,
            'jawaban' => 'Puan',
            'bobot' => 3,
        ]);

        Answer::create([
            'id_pertanyaan' => 1,
            'jawaban' => 'Jabatan',
            'bobot' => 7,
        ]);

        Answer::create([
            'id_pertanyaan' => 2,
            'jawaban' => 'Skripsi',
            'bobot' => 9,
        ]);

        Answer::create([
            'id_pertanyaan' => 2,
            'jawaban' => 'PKI',
            'bobot' => 3,
        ]);

        Answer::create([
            'id_pertanyaan' => 2,
            'jawaban' => 'Project',
            'bobot' => 7,
        ]);

    }
}
