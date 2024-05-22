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
        Schema::create('izin', function (Blueprint $table) {
            $table->string("id_izin")->primary()->unique();
            $table->unsignedBigInteger('id_user');
            $table->string("file_izin");
            $table->boolean("status")->default(0);
            $table->dateTime("tgl");

            $table->foreign('id_user')->references('id')->on('karyawan'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin');
    }
};
