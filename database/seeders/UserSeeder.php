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
            'nim' => 'E41201747',
            'jenis_kandidat' => 'Mahasiswa Polije',
            'jenjang' => 'D4',
            'perguruan_tinggi' => 'Politeknik Negeri Jember',
            'jurusan' => 'Teknologi Informasi',
            'program_studi' => 'Teknik Informatika',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nama' => 'Deni Catur Kusumawati',
            'email' => 'denicatur@gmail.com',
            'no_telp' => '085760634264',
            'nim' => 'E41201756',
            'jenis_kandidat' => 'Alumni Polije',
            'jenjang' => 'D4',
            'perguruan_tinggi' => 'Politeknik Negeri Jember',
            'jurusan' => 'Teknologi Informasi',
            'program_studi' => 'Teknik Informatika',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nama' => 'Bagas Andi',
            'email' => 'bagas.andi@gmail.com',
            'no_telp' => '085904618542',
            'nim' => 'E41201756',
            'jenis_kandidat' => 'Umum',
            'jenjang' => 'S1',
            'perguruan_tinggi' => 'Universitas Muhammadiyah Jember',
            'jurusan' => 'Fakultas Teknik',
            'program_studi' => 'Teknik Informatika',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nama' => 'Admin CDC',
            'email' => 'admin@gmail.com',
            'no_telp' => '0858550993221',
            'nim' => null,
            'jenis_kandidat' => 'Administrator',
            'jenjang' => '-',
            'jurusan' => '-',
            'program_studi' => '-',
            'roles' => 'ADMIN',
            'password' => Hash::make('admin123'),
        ]);
    }
}
