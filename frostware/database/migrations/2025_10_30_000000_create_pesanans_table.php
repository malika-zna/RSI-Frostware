<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('idPesanan');
            $table->string('statusProduksi');
            $table->date('waktuPengiriman');
            $table->string('keteranganSelesai')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};
