<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Gaji
        Schema::create("gaji",function (Blueprint $table){
            $table->string('id_gaji')->unique();
            $table->unsignedBigInteger('nama_karyawan');
            $table->string('absensi');
            $table->integer('nominal');

            $table->foreign('nama_karyawan')->references('id')->on('karyawan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
