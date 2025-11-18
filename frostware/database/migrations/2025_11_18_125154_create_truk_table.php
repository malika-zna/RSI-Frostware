<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('truk', function (Blueprint $table) {
            $table->id('idTruk');
            $table->string('nama'); // Misal: Mitsubishi L300
            $table->string('platNomor')->unique();
            $table->integer('kapasitas')->default(0); // Kapasitas balok es
            $table->enum('status', ['Tersedia', 'Sedang Mengirim', 'Perbaikan'])->default('Tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('truk');
    }
};
