<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //TAMBAH DATA USER
        DB::table('karyawan')->insert(
        [
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
            'nama' => 'ANFI',
            'role' => '3',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'L',
            'alamat' => 'sby',
            'shift' => 'M'
            ]
            ,
            [
            'nik' => '00004',
            'nama' => 'ZUL',
            'role' => '3',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'L',
            'alamat' => 'sby',
            'shift' => 'M'
            ]
            ,
            [
            'nik' => '00005',
            'nama' => 'FANDI',
            'role' => '3',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'L',
            'alamat' => 'sby',
            'shift' => 'M'
            ]
            ,
            [
            'nik' => '00006',
            'nama' => 'JUN',
            'role' => '3',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'L',
            'alamat' => 'sby',
            'shift' => 'M'
            ]
            ,
            [
            'nik' => '00007',
            'nama' => 'VIOTA',
            'role' => '3',
            'password' => Hash::make('1'),
            'jenis_kelamin' => 'L',
            'alamat' => 'sby',
            'shift' => 'M'
            ]
        ]
        );
        $namaIDs = DB::table('karyawan')->pluck('id');

        //TAMBAH DATA GAJI
        DB::table('absensi')->insert([
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,10) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,5)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,6)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,6)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,6)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,6)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,6)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
            [
            'id_user' => random_int(3,7),
            'alpha' => 0,
            'tanggal' => "2024-".random_int(1,6)."-".random_int(1,28),
            'sakit' => 0,
            'jam_pulang' => random_int(01,22) .':'. random_int(01,59) . ':' . 00,
            ],
        ]
        );
        $gajiIDs = DB::table('absensi')->pluck('id_absensi');
        // echo($gajiIDs);
        // GAJI SEEDER
        // DB::table('absensi')->insert([
        //     [
        //     'id_user' => 3,
        //     ],
        //     ]
        // );
    }
}
