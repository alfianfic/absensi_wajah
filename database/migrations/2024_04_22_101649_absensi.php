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
        Schema::create("absensi", function (Blueprint $table) {
            $table->string('id_absensi')->unique()->primary();
            $table->unsignedBigInteger('id_user');
            $table->integer('alpha')->unsigned();
            $table->integer('sakit')->unsigned();
            $table->date('tanggal')->nullable();
            $table->time('jam_kedatangan')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->time('jam_lembur')->nullable();
            $table->float("jam_perhari")->nullable();
            $table->string("status_lembur")->default("0");


            $table->foreign('id_user')->references('id')->on('karyawan'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
