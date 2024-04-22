<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //TAMBAH DATA USER
        DB::table('users')->insert([
            [
            'nik' => '00001',
            'nama' => 'ADMIN',
            'role' => '1',
            'password' => '1',
            'jenis_kelamin' => 'P',
            'alamat' => 'kdr'
            ],
            [
            'nik' => '00002',
            'nama' => 'TESTER',
            'role' => '0',
            'password' => '1',
            'jenis_kelamin' => 'P',
            'alamat' => 'mlg'
            ],
            [
            'nik' => '00003',
            'nama' => 'PEGAWAI',
            'role' => '1',
            'password' => '1',
            'jenis_kelamin' => 'P',
            'alamat' => 'sby'
            ]]
        );
    }
}
