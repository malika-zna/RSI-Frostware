<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('idPesanan');
            $table->foreignId('idPelanggan');
            $table->date('tanggalPesan');
            $table->date('tanggalKirim');
            $table->string('alamatKirim');
            $table->integer('jumlahBalok');
            $table->decimal('totalHarga');
            $table->enum('status', [
                'Belum Diverifikasi',
                'Diterima',
                'Ditolak',
                'Selesai Diproduksi',
                'Siap Dikirim',
                'Selesai'
            ])->default('Belum Diverifikasi');
            $table->string('keteranganPenolakan')->nullable();

            $table->foreign('idPelanggan')->references('idAkun')->on('akun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
