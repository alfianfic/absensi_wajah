<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Izin;
use App\Models\Gaji;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahKaryawan = User::count();
        $jumlahsuratizin = Izin::count();
        $jumlahpresensi = Absensi::count();
        return view('admin.dashboard',compact('jumlahpresensi','jumlahKaryawan','jumlahsuratizin'));
    }

    public function profiledit()
    {
        return view('admin.profil');
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:14',
        ]);

        $user->nama = $request->nama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->save();

        return redirect()->route('profil.edit')->with('success', 'Profil berhasil diperbarui');
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
            'shift' => 'required|in:P,M',
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
        $karyawan = User::findOrFail($id);
        return view('admin.edit_karyawan', compact('karyawan'));
    }

    public function update_karyawan(Request $request, $id){
        $request->validate([
            'nik' => 'required|unique:karyawan,nik,'.$id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:15',
            'authentifikasi_wajah' => 'nullable|file|image|max:2048',
            'role' => 'required|in:1,3',
            'bekerja' => 'required|boolean',
            'shift' => 'required|in:P,M',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $karyawan = User::findOrFail($id);
        $karyawan->nik = $request->nik;
        $karyawan->nama = $request->nama;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->role = $request->role;
        $karyawan->bekerja = $request->bekerja;
        $karyawan->shift = $request->shift;

        if ($request->hasFile('authentifikasi_wajah')) {
            // Handle file upload
            $file = $request->file('authentifikasi_wajah');
            $path = $file->store('public/authentifikasi_wajah');
            $karyawan->authentifikasi_wajah = $path;
        }

        if ($request->password) {
            $karyawan->password = bcrypt($request->password);
        }

        $karyawan->save();

        return redirect()->route('kelola_karyawan')->with('success', 'Karyawan updated successfully');
        }


    // public function edit_presensi($id)
    // {
    //     $presensi = User::findOrFail($id);
    //     return view('admin.edit_presensi', compact('presensi'));
    // }
    public function presensi()
    {
        $absensiRecords = Absensi::with('user')->get();
        return view('admin.absensi', compact('absensiRecords'));
    }
    public function edit_presensi($id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('admin.edit_presensi', compact('absensi'));
    }

    // Method to handle the update
    public function update_presensi(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'alpha' => 'required|integer',
            'sakit' => 'required|integer',
            'jam_kedatangan' => 'required',
            'jam_pulang' => 'required',
            // 'jam_perhari' => 'required',
            'status_lembur' => 'required',
            'jam_lembur' => 'nullable|integer',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect('/presensi')->with('success', 'Presensi updated successfully');
    }

    public function delete_karyawan($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        return redirect('/kelola_karyawan')->with('success', 'Karyawan berhasil dihapus');
    }



    public function validasi_izin()
    {
        $izinList = Izin::with('user')->get();
        return view('admin.val_izin',compact('izinList'));
    }

    public function validasiIzin(Request $request, $id)
    {
        $izin = Izin::findOrFail($id);
        $status = $request->input('status'); // 1 untuk diterima, 0 untuk ditolak

        if ($status == 1) {
            $izin->status = 1;
            $izin->save();

            // Update tabel absensi
            Absensi::create([
                'id_user' => $izin->id_user,
                'tanggal' => $izin->tgl,
                'sakit' => 8,
            ]);
        } else {
            $izin->status = 0;
            $izin->save();

            // Update tabel absensi
            Absensi::create([
                'id_user' => $izin->id_user,
                'tanggal' => $izin->tgl,
                'alpha' => 8,
            ]);
        }

        return redirect('/validasi_izin')->with('success', 'Surat izin berhasil divalidasi.');
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
        $users = Gaji::with('user')->get();
        return view('admin.gaji',compact('users')
        // return view('admin.gaji',['users' => $users,
        // 'karyawan' => $karyawan
    // ]
    );
    }

    public function gaji_lembur()
    {
        return view('admin.gaji_lembur');
    }
}

