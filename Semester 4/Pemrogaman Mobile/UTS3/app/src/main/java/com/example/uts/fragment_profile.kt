package com.example.uts

import android.content.Intent
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import com.example.uts.databinding.FragProfileBinding
import com.example.uts.databinding.ActivityEditprofileBinding

class fragment_profile : Fragment() {
    private var _binding: FragProfileBinding? = null
    private val binding get() = _binding!!

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragProfileBinding.inflate(inflater, container, false)
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        // Menambahkan listener klik pada tombol edtbtn
        binding.edtbtn.setOnClickListener {
            // Ketika tombol diklik, beralih ke activity_editprofile.xml
            val intent = Intent(activity,editprofile::class.java)
            startActivity(intent)
        }
    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}
