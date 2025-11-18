<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetsTable extends Migration
{
    public function up()
    {
        // Tabel daftar aset
        Schema::create('daftarAset', function (Blueprint $table) {
            $table->string('idAset')->primary();
            $table->string('namaAset');
            $table->date('tanggalBeli');
            $table->string('status'); // baik, rusak, sedang diperbaiki.
            $table->timestamps();
        });

        // Tabel log aktivitas
        Schema::create('logAktivitas', function (Blueprint $table) {
            $table->id();
            $table->string('idAset');
            $table->string('namaAset');
            $table->text('riwayatUpdate');
            $table->text('catatan')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('idAset')->references('idAset')->on('daftarAset')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('logAktivitas');
        Schema::dropIfExists('daftarAset');
    }
}