package com.example.uts

import android.app.Activity
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ArrayAdapter
import com.example.uts.databinding.ActivityJadwalkerjaBinding
import java.util.zip.Inflater

class jadwalkerja : AppCompatActivity() {
    private lateinit var binding: ActivityJadwalkerjaBinding
    private lateinit var employeeList: MutableList<String>
    private lateinit var adapter: ArrayAdapter<String>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityJadwalkerjaBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val tmbhjadwal = binding.btntbhjadwal

        employeeList = mutableListOf()
        adapter = ArrayAdapter(this, android.R.layout.simple_list_item_1, employeeList)
        binding.lvjadwalkerja.adapter = adapter

        tmbhjadwal.setOnClickListener {
            startActivityForResult(Intent(this, tambahjadwal::class.java), ADD_EMPLOYEE_REQUEST
            )
        }
    }

    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        super.onActivityResult(requestCode, resultCode, data)
        if (requestCode == ADD_EMPLOYEE_REQUEST && resultCode == Activity.RESULT_OK) {
            // Dapatkan data Jadwal Kerja dari intent
            val nama = data?.getStringExtra("namaj")
            val alamat = data?.getStringExtra("tglj")

            // Tambahkan data Jadwal ke daftar
            val newEmployee = "Nama: $nama, Jadwal Kerja: $alamat"
            employeeList.add(newEmployee)

            // Perbarui tampilan daftar karyawan
            adapter.notifyDataSetChanged()
        }
    }

    companion object {
        private const val ADD_EMPLOYEE_REQUEST = 1
    }

}