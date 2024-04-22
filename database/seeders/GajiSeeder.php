<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //GAJI SEEDER
        DB::table('gaji')->insert([
            [
            'id' => '00001',
            'nama' => 'PEGAWAI2',
            'absensi' => '0',
            'nominal' => 30000,
            ],
            [
            'id' => '00002',
            'nama' => 'PEGAWAI1',
            'absensi' => '1',
            'nominal' => 20000,
            ],
            [
            'id' => '00003',
            'nama' => 'PAGAWAI3',
            'absensi' => '1',
            'nominal' => 10000,
            ],
            ]
        );
    }
}
