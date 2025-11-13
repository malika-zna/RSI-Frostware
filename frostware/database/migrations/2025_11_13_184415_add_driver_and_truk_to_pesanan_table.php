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
        Schema::table('pesanan', function (Blueprint $table) {
            // Tambahkan kolom untuk driver, terhubung ke tabel 'akun'
            $table->foreignId('idDriver')->nullable()->after('keteranganPenolakan')
                  ->constrained('akun', 'idAkun') // Referensi ke idAkun di tabel akun
                  ->onDelete('set null');

            // Tambahkan kolom untuk aset (truk), terhubung ke tabel 'asets'
            $table->foreignId('idAset')->nullable()->after('idDriver')
                  ->constrained('asets') // Referensi ke id di tabel asets
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign(['idDriver']);
            $table->dropForeign(['idAset']);
            $table->dropColumn(['idDriver', 'idAset']);
        });
    }
};
