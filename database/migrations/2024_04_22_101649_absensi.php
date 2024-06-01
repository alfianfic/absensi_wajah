<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Gaji
        Schema::create("absensi", function (Blueprint $table) {
            $table->id('id_absensi')->primary();
            $table->unsignedBigInteger('id_user');
            $table->integer('alpha')->unsigned()->default("0");
            $table->integer('sakit')->unsigned()->default("0");
            // $table->date('tanggal')->nullable()->default("0000-00-00");
            $table->date('tanggal')->nullable()->default(DB::raw('CURRENT_DATE'));
            $table->time('jam_kedatangan')->nullable()->default("00:00:00");
            $table->time('jam_pulang')->nullable()->default("00:00:00");
            $table->float('jam_lembur')->nullable()->default("0.0");
            $table->float("jam_perhari")->nullable()->default("0.0");
            $table->string("status_lembur")->default("0");


            $table->foreign('id_user')->references('id')->on('karyawan')->onDelete('cascade');
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
