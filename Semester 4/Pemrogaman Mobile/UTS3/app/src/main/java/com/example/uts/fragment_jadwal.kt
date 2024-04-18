package com.example.uts

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.fragment.app.Fragment
import com.example.uts.MainActivity
import com.example.uts.R

class fragment_jadwal: Fragment() {
    lateinit var thisParent: MainActivity

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        thisParent = requireActivity() as MainActivity
        return inflater.inflate(R.layout.frag_jadwal, container, false)
    }
}