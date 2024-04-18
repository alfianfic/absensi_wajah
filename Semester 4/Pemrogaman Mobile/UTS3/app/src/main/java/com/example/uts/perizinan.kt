package com.example.uts

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.uts.databinding.ActivityPerizinanBinding
import android.view.ContextMenu
import android.view.MenuItem
import android.view.View
import android.widget.Toast
import androidx.appcompat.app.AlertDialog
import com.google.android.material.snackbar.Snackbar

class perizinan : AppCompatActivity() {
    private lateinit var binding: ActivityPerizinanBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityPerizinanBinding.inflate(layoutInflater)
        setContentView(binding.root)

        registerForContextMenu(binding.contextmenu)
    }

    override fun onCreateContextMenu(
        menu: ContextMenu?,
        v: View?,
        menuInfo: ContextMenu.ContextMenuInfo?
    ) {
        super.onCreateContextMenu(menu, v, menuInfo)
        menuInflater.inflate(R.menu.menu_context, menu)
    }

    override fun onContextItemSelected(item: MenuItem): Boolean {
        when (item?.itemId){
            R.id.menuCopy ->{
                Toast.makeText(this,"Copy", Toast.LENGTH_SHORT).show()
                return true
            }
            R.id.menuPaste->{
                var snackbar = Snackbar.make(binding.root,"Paste", Snackbar.LENGTH_SHORT)
                snackbar.show()
                return true
            }else->{
            Toast.makeText(this,"Tidak Ada Yang Dipilih", Toast.LENGTH_SHORT).show()
            return false
        }
        }
        return super.onContextItemSelected(item)
    }
}