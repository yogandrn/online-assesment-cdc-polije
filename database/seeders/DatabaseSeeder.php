<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'jenis_kandidat' => 'mahasiswa',
            'jenjang' => 'D4/Sarjana Terapan',
            'jurusan' => 'Teknologi Informasi',
            'program_studi' => 'Teknik Informatika',
            'password' => bcrypt('password'),

        ]);

    }
}
