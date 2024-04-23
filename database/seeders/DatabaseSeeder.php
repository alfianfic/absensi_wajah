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
            'alamat' => 'kdr'
            ],
            [
            'nik' => '00002',
            'nama' => 'OWNER',
            'role' => '2',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'P',
            'alamat' => 'mlg'
            ],
            [
            'nik' => '00003',
            'nama' => 'PEGAWAI',
            'role' => '3',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'P',
            'alamat' => 'sby'
            ]]
        );
        $namaIDs = DB::table('karyawan')->pluck('id');

        //TAMBAH DATA GAJI
        DB::table('absensi')->insert([
            [
            'id_gaji' => 'GJ021',
            'nama' => $namaIDs[0],
            'keterangan' => "Kosong",
            'alpha' => 0,
            'ijin' => 0,
            'sakit' => 0,
            ],
            [
            'id_gaji' => 'GJ001',
            'nama' => $namaIDs[2],
            'keterangan' => "Kosong",
            'alpha' => 0,
            'ijin' => 0,
            'sakit' => 0,
            ],
            [
            'id_gaji' => 'GJ031',
            'nama' => $namaIDs[1],
            'keterangan' => "Kosong",
            'alpha' => 0,
            'ijin' => 0,
            'sakit' => 0,
            ],
        ]
        );
        $gajiIDs = DB::table('absensi')->pluck('id_gaji');
        // echo($gajiIDs);
        // GAJI SEEDER
        DB::table('gaji')->insert([
            [
            'id_gaji' => '00001',
            'nama_karyawan' => $namaIDs[0],
            'absensi' => $gajiIDs[0],
            'nominal' => 30000,
            ],
            [
            'id_gaji' => '00002',
            'nama_karyawan' => $namaIDs[1],
            'absensi' => $gajiIDs[1],
            'nominal' => 20000,
            ],
            [
            'id_gaji' => '00003',
            'nama_karyawan' => $namaIDs[1],
            'absensi' => $gajiIDs[2],
            'nominal' => 10000,
            ],
            ]
        );
    }
}
