<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function beranda()
    {
        return view('pegawai.home');
    }
    public function absensi()
    {
        return view('pegawai.absen');
    }
    public function gaji()
    {
        return view('pegawai.gaji');
    }
    public function izin()
    {
        $users = DB::select('select * from IZIN');
        return view('pegawai.izin',[
            'users' => $users,
        ]);
    }
}
