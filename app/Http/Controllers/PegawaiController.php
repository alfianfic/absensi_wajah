<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function beranda()
    {
        return view('pegawai.home');
    }
    public function izin()
    {
        return view('pegawai.izin');
    }
    public function jadwal()
    {
        return view('pegawai.jadwal');
    }
    public function gaji()
    {
        return view('pegawai.gaji');
    }
}
