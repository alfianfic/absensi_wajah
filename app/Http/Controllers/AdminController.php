<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function kelola_karyawan()
    {
        $karyawan = User::all();
        return view('admin.kel_karyawan', compact('karyawan'));
    }

    public function tambah_karyawan()
    {
        return view('admin.tambah_karyawan');
    }

    public function store_karyawan(Request $request)
    {
        // dd($request);
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'nik' => 'required|unique:karyawan,nik|max:16',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:14',
            'authentifikasi_wajah' => 'nullable|file|mimes:jpg,jpeg,png',
            'role' => 'required|integer',
            'bekerja' => 'required|boolean',
            'password' => 'required|string',
            'shift' => 'required|in:1,2,3',
        ], [
            'nik.required' => 'NIK harus diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nik.max' => 'NIK maksimal 16 karakter',
            'nama.required' => 'Nama harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'no_hp.required' => 'No HP harus diisi',
            'authentifikasi_wajah.required' => 'Authentifikasi wajah harus diisi',
            'role.required' => 'Role harus diisi',
            'bekerja.required' => 'Status bekerja harus diisi',
            'password.required' => 'Password harus diisi',
            'shift.required' => 'Shift harus diisi',
        ]);


        // Upload file jika ada
        if ($request->hasFile('authentifikasi_wajah')) {
            $file = $request->file('authentifikasi_wajah');
            $filename = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');
            $validatedData['authentifikasi_wajah'] = '/storage/' . $filePath;
        }

        // Hash password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Buat data karyawan baru
        $succ = User::create($validatedData);

        // Redirect kembali ke halaman kelola karyawan dengan pesan sukses
        if ($succ){
            return redirect('/kelola_karyawan')->with('success', 'Karyawan berhasil ditambahkan');
        } else {
            return back();
        }
    }


    public function edit_karyawan($id)
    {
        $employee = User::findOrFail($id);
        return view('admin.edit_karyawan', compact('employee'));
    }

    public function edit_presensi($id)
    {
        $presensi = User::findOrFail($id);
        return view('admin.edit_presensi', compact('presensi'));
    }

    public function delete_karyawan($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        return redirect('/kelola_karyawan')->with('success', 'Karyawan berhasil dihapus');
    }

    public function validasi_izin()
    {
        return view('admin.val_izin');
    }

    public function presensi()
    {
        $users = DB::select('select * from absensi');
        return view('admin.absensi',[
            'users' => $users,
        ]);
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

