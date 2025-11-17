<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetsTable extends Migration
{
    public function up()
    {
        // Tabel daftar aset
        Schema::create('daftar_aset', function (Blueprint $table) {
            $table->id('id_aset');
            $table->string('nama_aset');
            $table->date('tanggal_beli');
            $table->string('status'); // baik, rusak, sedang diperbaiki.
            $table->timestamps();
        });

        // Tabel log aktivitas
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aset');
            $table->string('nama_aset');
            $table->text('riwayat_update');
            $table->text('catatan')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_aset')->references('id_aset')->on('daftar_aset')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_aktivitas');
        Schema::dropIfExists('daftar_aset');
    }
}