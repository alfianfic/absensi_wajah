<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //TAMBAH DATA USER
        DB::table('karyawan')->insert([
            [
            'nik' => '00001',
            'nama' => 'ADMIN',
            'role' => '1',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'P',
            'alamat' => 'kdr',
            'shift' => 'P'


            ],
            [
            'nik' => '00002',
            'nama' => 'OWNER',
            'role' => '2',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'P',
            'alamat' => 'mlg',
            'shift' => 'P']
            ,
            [
            'nik' => '00003',
            'nama' => 'PEGAWAI',
            'role' => '3',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'L',
            'alamat' => 'sby',
            'shift' => 'M'
            ]]
        );
        $namaIDs = DB::table('karyawan')->pluck('id');

        //TAMBAH DATA GAJI
        DB::table('absensi')->insert([
            [
            'id_user' => $namaIDs[0],
            'alpha' => 0,
            'sakit' => 0,
            ],
            [
            'id_user' => $namaIDs[2],
            'alpha' => 0,
            'sakit' => 0,
            ],
            [
            'id_user' => $namaIDs[1],
            'alpha' => 0,
            'sakit' => 0,
            ],
        ]
        );
        $gajiIDs = DB::table('absensi')->pluck('id_absensi');
        // echo($gajiIDs);
        // GAJI SEEDER
        DB::table('gaji')->insert([
            [
            'id_gaji' => '00001',
            'id_user' => $namaIDs[0],
            'jam_kerja_bulan' => 200,
            ],
            [
            'id_gaji' => '00002',
            'id_user' => $namaIDs[0],
            'jam_kerja_bulan' => 200,
            ],
            [
            'id_gaji' => '00003',
            'id_user' => $namaIDs[0],
            'jam_kerja_bulan' => 200,
            ],
            ]
        );
    }
}
