<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Yoga Andrian',
            'email' => 'yogandrn@gmail.com',
            'no_telp' => '08976863864',
            'nim' => 'e41201747',
            'jenis_kandidat' => 'Mahasiswa Polije',
            'jenjang' => 'D4/S1',
            'jurusan' => 'Teknologi Informasi',
            'program_studi' => 'Teknik Informatika',
            'password' => Hash::make('password'),
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
    }
}
