package com.example.uts

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ArrayAdapter
import android.widget.Toast
import com.example.uts.databinding.ActivityTambahkaryawanBinding

class tambahkaryawan : AppCompatActivity() {

    private lateinit var binding: ActivityTambahkaryawanBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityTambahkaryawanBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // Data daftar alamat
        val alamatList = listOf("Kediri", "Jombang", "Malang","Nganjuk")

        // Buat adapter untuk Spinner
        val adapter = ArrayAdapter(this, android.R.layout.simple_spinner_item, alamatList)
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)

        // Atur adapter ke Spinner
        binding.spAlamatKaryawan.adapter = adapter

        binding.smpntbh.setOnClickListener {
            val nama = binding.TInamatmbh.text.toString()
            val alamat = binding.spAlamatKaryawan.selectedItem.toString()
            val hp = binding.TIhptbh.text.toString()
            val jenisKelamin = when (binding.radioGroup.checkedRadioButtonId) {
                binding.rblakitmbh.id -> "Laki - Laki"
                binding.rbwanitatmbh.id -> "Perempuan"
                else -> ""
            }
            if (nama.isNotEmpty() && alamat.isNotEmpty() && hp.isNotEmpty() && jenisKelamin.isNotEmpty()) {
                val intent = Intent()
                intent.putExtra("nama", nama)
                intent.putExtra("alamat", alamat)
                intent.putExtra("hp", hp)
                intent.putExtra("jenis_kelamin", jenisKelamin)
                setResult(RESULT_OK, intent)
                finish()
            } else {
                Toast.makeText(this, "Lengkapi semua field!", Toast.LENGTH_SHORT).show()
            }
        }

    }
}
