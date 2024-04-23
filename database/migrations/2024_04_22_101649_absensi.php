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
            $table->integer('alpha')->unsigned();
            $table->integer('ijin')->unsigned();
            $table->integer('sakit')->unsigned();
            $table->time('jam_kedatangan')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->time('jam_lembur')->nullable();

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
