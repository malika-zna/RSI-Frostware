<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id('idRole');
            $table->string('role')->unique();
        });

        DB::table('role')->insert([
            ['role' => 'pelanggan'],
            ['role' => 'resepsionis'],
            ['role' => 'manajer'],
            ['role' => 'driver'],
            ['role' => 'pj produksi'],
            ['role' => 'pj keuangan'],
            ['role' => 'pj pemeliharaan'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
