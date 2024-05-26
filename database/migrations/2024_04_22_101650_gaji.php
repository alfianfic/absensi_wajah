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
        Schema::create("gaji", function (Blueprint $table) {
            $table->string('id_gaji')->unique();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('karyawan');
            $table->integer('jam_kerja_bulan');
            $table->integer('bulan')->nullable();
            $table->integer('tahun')->nullable();
            $table->integer("total_gaji")->nullable();

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
