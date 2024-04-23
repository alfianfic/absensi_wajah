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
        Schema::create("absensi",function (Blueprint $table){
            $table->string('id_gaji')->unique();
            $table->unsignedBigInteger('nama');
            $table->string('keterangan');
            $table->integer('alpha');
            $table->integer('ijin');
            $table->integer('sakit');
            $table->time('jam_kedatangan');
            $table->time('jam_pulang');
            $table->time('jam_lembur');

            $table->foreign('nama')->references('id')->on('karyawan');
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
