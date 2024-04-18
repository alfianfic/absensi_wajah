package com.example.uts

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import android.content.Intent
import com.example.uts.databinding.FragDashBinding

class fragment_dash : Fragment() {
    private var _binding: FragDashBinding? = null
    private val binding get() = _binding!!

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragDashBinding.inflate(inflater, container, false)
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        // Menambahkan listener klik pada tombol edtbtn
        binding.btnuploadizin.setOnClickListener {
            // Ketika tombol diklik, beralih ke activity_editprofile.xml
            val intent = Intent(activity,perizinan::class.java)
            startActivity(intent)
        }

        binding.btnlihatgaji.setOnClickListener {
            // Ketika tombol diklik, beralih ke activity_editprofile.xml
            val intent = Intent(activity,salarykaryawan::class.java)
            startActivity(intent)
        }

    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }


}
