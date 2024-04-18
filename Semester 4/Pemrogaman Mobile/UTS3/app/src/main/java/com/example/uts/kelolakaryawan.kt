package com.example.uts

import android.app.Activity
import android.content.Intent
import android.os.Bundle
import android.widget.ArrayAdapter
import androidx.appcompat.app.AppCompatActivity
import com.example.uts.databinding.ActivityKelolakaryawanBinding
import com.example.uts.tambahkaryawan

class kelolakaryawan : AppCompatActivity() {
    private lateinit var binding: ActivityKelolakaryawanBinding
    private lateinit var employeeList: MutableList<String>
    private lateinit var adapter: ArrayAdapter<String>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityKelolakaryawanBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // Inisialisasi daftar karyawan dan adapter
        employeeList = mutableListOf()
        adapter = ArrayAdapter(this, android.R.layout.simple_list_item_1, employeeList)
        binding.listViewEmployees.adapter = adapter

        // Menangani klik tombol tambah karyawan
        binding.btnAddkar.setOnClickListener {
            startActivityForResult(Intent(this, tambahkaryawan::class.java), ADD_EMPLOYEE_REQUEST)
        }
    }

    // Menangani hasil dari aktivitas tambahkaryawan
    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        super.onActivityResult(requestCode, resultCode, data)
        if (requestCode == ADD_EMPLOYEE_REQUEST && resultCode == Activity.RESULT_OK) {
            // Dapatkan data karyawan dari intent
            val nama = data?.getStringExtra("nama")
            val alamat = data?.getStringExtra("alamat")
            val hp = data?.getStringExtra("hp")
            val jenisKelamin = data?.getStringExtra("jenis_kelamin")

            // Tambahkan data karyawan ke daftar
            val newEmployee = "Nama: $nama, Alamat: $alamat, HP: $hp, Jenis Kelamin: $jenisKelamin"
            employeeList.add(newEmployee)

            // Perbarui tampilan daftar karyawan
            adapter.notifyDataSetChanged()
        }
    }

    companion object {
        private const val ADD_EMPLOYEE_REQUEST = 1
    }
}
