package com.example.uts

import android.content.Intent
import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.uts.databinding.ActivityLoginBinding

class LoginActivity : AppCompatActivity() {

    private lateinit var binding: ActivityLoginBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val username = binding.username
        val password = binding.password
        val login = binding.login

        login.setOnClickListener {
            val enteredUsername = username.text.toString()
            val enteredPassword = password.text.toString()
            if (enteredUsername == "a" && enteredPassword == "a") {
                val intent = Intent(this, MainActivity::class.java)
                Toast.makeText(this, "Login Sebagai Karyawan!", Toast.LENGTH_SHORT).show()
                startActivity(intent)
                finish()
                true
            } else if (enteredUsername == "admin" && enteredPassword == "admin"){
                val intent = Intent(this, homeadmin::class.java)
                Toast.makeText(this, "Login Sebagai Admin!", Toast.LENGTH_SHORT).show()
                startActivity(intent)
                finish()
                true
            } else {
                showLoginFailed("Login Failed")
            }
        }
    }
    private fun showLoginFailed(errorMessage: String) {
        Toast.makeText(applicationContext, errorMessage, Toast.LENGTH_SHORT).show()
    }

}
