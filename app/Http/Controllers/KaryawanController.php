<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function home()
    {
        return view('karyawan.home');
    }
    public function izin()
    {
        return view('karyawan.izin');
    }
    public function jadwal()
    {
        return view('karyawan.jadwal');
    }
    public function gaji()
    {
        return view('karyawan.gaji');
    }
}
