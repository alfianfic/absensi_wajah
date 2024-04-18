package com.example.uts

import android.app.Activity
import android.content.Intent
import android.os.Bundle
import android.view.View
import android.widget.ArrayAdapter
import androidx.appcompat.app.AppCompatActivity
import com.example.uts.databinding.ActivityEditprofileBinding
import com.example.uts.R
import android.widget.Toast



class editprofile : AppCompatActivity(), View.OnClickListener {

    private lateinit var binding: ActivityEditprofileBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityEditprofileBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // Inisialisasi data untuk AutoCompleteTextView
        val namaList = listOf("Fandi", "Anfi", "Zul", "Jun","Viota")
        val namaAdapter = ArrayAdapter(this, android.R.layout.simple_dropdown_item_1line, namaList)
        binding.actvNama.setAdapter(namaAdapter)

        // Inisialisasi data untuk Spinner
        val alamatList = listOf("Kediri", "Jombang", "Malang")
        val alamatAdapter = ArrayAdapter(this, android.R.layout.simple_spinner_item, alamatList)
        alamatAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
        binding.spAlamatPengguna.adapter = alamatAdapter

        // Mendaftarkan listener klik pada tombol upload
        binding.btnuplprofile.setOnClickListener(this)

    }

    override fun onClick(v: View?) {
        when(v?.id){
            R.id.btnuplprofile ->{
                // Membuat intent untuk membuka galeri
                val intentGaleri = Intent()
                intentGaleri.type = "image/*"
                intentGaleri.action = Intent.ACTION_GET_CONTENT
                startActivityForResult(Intent.createChooser(intentGaleri,"Pilih Gambar ..."), PICK_IMAGE_REQUEST)
                Toast.makeText(this, "Foto berhasil diunggah!", Toast.LENGTH_SHORT).show()
            }
        }
    }

    // Menangani hasil dari aktivitas pemilihan gambar
    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        super.onActivityResult(requestCode, resultCode, data)
        if (requestCode == PICK_IMAGE_REQUEST && resultCode == Activity.RESULT_OK && data != null && data.data != null) {
            // Mendapatkan URI gambar yang dipilih
            val imageUri = data.data

            // Menampilkan gambar di ImageView
            binding.profileImageView.setImageURI(imageUri)
        }
    }

    companion object {
        private const val PICK_IMAGE_REQUEST = 1
    }
}
