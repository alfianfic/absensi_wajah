package com.example.uts

import android.content.Intent
import android.graphics.Color
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.Menu
import android.view.MenuItem
import android.view.View
import androidx.fragment.app.FragmentTransaction
import com.example.uts.databinding.ActivityMainBinding
import com.google.android.material.bottomnavigation.BottomNavigationView

class MainActivity : AppCompatActivity(),BottomNavigationView.OnNavigationItemSelectedListener {

    private lateinit var binding: ActivityMainBinding
    lateinit var fragjadwal : fragment_jadwal
    lateinit var fragprofile : fragment_profile
    lateinit var fragDash: fragment_dash
    lateinit var ft : FragmentTransaction

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.navView.setOnNavigationItemSelectedListener(this)
        fragjadwal = fragment_jadwal()
        fragprofile = fragment_profile()
        fragDash = fragment_dash()
    }

    override fun onNavigationItemSelected(item: MenuItem): Boolean {
        when (item.itemId) {
            R.id.navigation_Jadwal -> {
                ft = supportFragmentManager.beginTransaction()
                ft.replace(R.id.nav_host_fragment_activity_main, fragjadwal).commit()
                binding.navHostFragmentActivityMain.visibility = View.VISIBLE
            }
            R.id.navigation_profile -> {
                ft = supportFragmentManager.beginTransaction()
                ft.replace(R.id.nav_host_fragment_activity_main, fragprofile).commit()
                binding.navHostFragmentActivityMain.visibility = View.VISIBLE
            }
            R.id.navigation_Dash-> {
                ft = supportFragmentManager.beginTransaction()
                ft.replace(R.id.nav_host_fragment_activity_main, fragDash).commit()
                binding.navHostFragmentActivityMain.visibility = View.VISIBLE
            }
            R.id.navigation_home -> binding.navHostFragmentActivityMain.visibility = View.GONE
        }
        return true
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.menu_option, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        when (item.itemId) {
            R.id.menuLogout -> {
                // Panggil fungsi logout di sini
                logoutUser()
                return true
            }
            else -> return super.onOptionsItemSelected(item)
        }
    }

    private fun logoutUser() {
        val intent = Intent(this, LoginActivity::class.java)
        intent.flags = Intent.FLAG_ACTIVITY_CLEAR_TASK or Intent.FLAG_ACTIVITY_NEW_TASK
        startActivity(intent)
        finish()
    }



}