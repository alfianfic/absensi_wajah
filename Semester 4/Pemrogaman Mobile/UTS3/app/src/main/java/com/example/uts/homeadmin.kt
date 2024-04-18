package com.example.uts

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.LayoutInflater
import com.example.uts.databinding.ActivityHomeadminBinding

class homeadmin : AppCompatActivity() {
    private  lateinit var binding: ActivityHomeadminBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityHomeadminBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val kelkaryawan = binding.btnkelkar
        val keljadwal = binding.btnkeljadwal
        val kelizin = binding.btnvalizin

        kelkaryawan.setOnClickListener {
            val intent = Intent(this,kelolakaryawan::class.java)
            startActivity(intent)
            true
        }

        keljadwal.setOnClickListener {
            val intent = Intent(this,jadwalkerja::class.java)
            startActivity(intent)
            true
        }

        kelizin.setOnClickListener {
            val intent = Intent(this,validasiizin::class.java)
            startActivity(intent)
            true
        }
    }
}