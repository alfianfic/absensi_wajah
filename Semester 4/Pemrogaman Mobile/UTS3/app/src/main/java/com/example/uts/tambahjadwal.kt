package com.example.uts

import android.app.DatePickerDialog
import android.app.Dialog
import android.app.TimePickerDialog
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.ArrayAdapter
import android.widget.DatePicker
import android.widget.TimePicker
import android.widget.Toast
import com.example.uts.databinding.ActivityTambahjadwalBinding
import java.util.Calendar

class tambahjadwal : AppCompatActivity(),View.OnClickListener {

    private lateinit var binding : ActivityTambahjadwalBinding
    var tahun = 0
    var bulan = 0
    var hari = 0
    var jam = 0
    var menit = 0
    val namaList = arrayOf("Fandi","Cahya","Ahmad" )
    lateinit var adapter: ArrayAdapter<String>


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityTambahjadwalBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // Buat adapter untuk Spinner
        adapter = ArrayAdapter(this, android.R.layout.simple_spinner_item, namaList)
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)

        binding.spnamajadwal.adapter = adapter


        val cal: Calendar = Calendar.getInstance()

        tahun = cal.get(Calendar.YEAR)
        bulan = cal.get(Calendar.MONTH) + 1
        hari = cal.get(Calendar.DAY_OF_MONTH)
        jam = cal.get(Calendar.HOUR_OF_DAY) // Menggunakan HOUR_OF_DAY agar sesuai dengan format 24 jam
        menit = cal.get(Calendar.MINUTE)

        binding.txDateTime.text = "MASUK TGL $hari,$bulan,$tahun"

        binding.dp.init(tahun, bulan, hari,ubahTanggal)
        binding.tgljadwal.setOnClickListener(this)

        binding.tp.setIs24HourView(true)
        binding.tp.setOnTimeChangedListener(ubahJam)
        binding.jammasuk.setOnClickListener(this)

//        START
        binding.simpanJ.setOnClickListener {
            val namaj = binding.spnamajadwal.selectedItem.toString()
            val tglj = binding.txDateTime.text.toString()
            if (namaj.isNotEmpty() && tglj.isNotEmpty()) {
                val intent = Intent()
                intent.putExtra("namaj", namaj)
                intent.putExtra("tglj", tglj)
                setResult(RESULT_OK, intent)
                finish()
            } else {
                Toast.makeText(this, "Lengkapi semua field!", Toast.LENGTH_SHORT).show()
            }
        }
//        END

    }

    override fun onClick(v: View?) {
        when (v?.id) {
            R.id.tgljadwal -> {
                if (binding.dp.visibility == View.GONE) {
                    binding.dp.visibility = View.VISIBLE
                    binding.tp.visibility = View.GONE // Menyembunyikan TimePicker ketika DatePicker ditampilkan
                } else {
                    binding.dp.visibility = View.GONE
                }
            }
            R.id.jammasuk ->{
                if (binding.tp.visibility == View.GONE){
                    binding.tp.visibility = View.VISIBLE
                    binding.dp.visibility = View.GONE // Menyembunyikan DatePicker ketika TimePicker ditampilkan
                } else {
                    binding.tp.visibility = View.GONE
                }
            }
            R.id.tgljadwal -> showDialog(10)
            R.id.jammasuk -> showDialog(20)
        }
    }

    var ubahJam = TimePicker.OnTimeChangedListener { view, hourOfDay, minute ->
        binding.txDateTime.text = "tanggal kerja $hari,Bulan $bulan, $tahun, Jam Masuk $hourOfDay:$minute "

        jam = hourOfDay
        menit = minute
    }

    var ubahTanggal = DatePicker.OnDateChangedListener { view, year, monthOfYear, dayOfMonth ->
        binding.txDateTime.text = "Tanggal Kerja $dayOfMonth,Bulan ${monthOfYear + 1},$year, jam Masuk $jam:$menit"


        tahun = year
        bulan = monthOfYear + 1
        hari = dayOfMonth
    }
    var ubahTanggalDialog = DatePickerDialog.OnDateSetListener { view, year, month, dayOfMonth ->
        binding.txDateTime.text = "Tanggal Kerja $dayOfMonth,Bulan ${month+1}, $year, jam Masuk $jam:$menit"
        tahun = year
        bulan = month + 1
        hari = dayOfMonth
    }

    var ubahJamDialog = TimePickerDialog.OnTimeSetListener { view, hourOfDay, minute ->
        binding.txDateTime.text = "Hari Ini Tanggal $hari,Bulan $bulan, $tahun, Jam Masuk $hourOfDay:$minute "

        jam = hourOfDay
        menit = minute
    }
    override fun onCreateDialog(id: Int): Dialog {
        when (id) {
            10 -> DatePickerDialog(this, ubahTanggalDialog, tahun, bulan , hari) // Mengurangi 1 pada bulan karena DatePickerDialog indeks bulan dimulai dari 0
            20 -> TimePickerDialog(this, ubahJamDialog, jam, menit, true) // Menggunakan true langsung sebagai argumen untuk is24HourView
        }
        return super.onCreateDialog(id)
    }
}