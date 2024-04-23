<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }
    public function kelola_karyawan()
    {
        return view('admin.kel_karyawan');
    }
    public function tambah_karyawan()
    {
        return view('admin.tambah_karyawan');
    }
    public function edit_karyawan()
    {
        return view('admin.edit_karyawan');
    }
    public function validasi_izin()
    {
        return view('admin.val_izin');
    }
    public function absensi()
    {
        return view('admin.absensi');
    }
    public function menu_jadwal()
    {
        return view('admin.jadwal');
    }
    public function kelola_jadwal()
    {
        return view('admin.kel_jadwal');
    }
    public function menu_gaji()
    {
        return view('admin.gaji');
    }
    public function gaji_lembur()
    {
        return view('admin.gaji_lembur');
    }
}