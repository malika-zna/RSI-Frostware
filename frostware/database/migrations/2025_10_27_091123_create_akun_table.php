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
        Schema::create('akun', function (Blueprint $table) {
            $table->id('idAkun'); // otomatis bigint + primary + auto increment
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('nomorTelepon')->unique();
            $table->string('password');
            $table->foreignId('idRole');

            $table->foreign('idRole')->references('idRole')->on('role')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
