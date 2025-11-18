<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('truk')->insert([
            [
                'nama' => 'Mitsubishi L300',
                'platNomor' => 'N 1234 AB',
                'kapasitas' => 500,
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Isuzu Elf',
                'platNomor' => 'N 5678 CD',
                'kapasitas' => 800,
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Hino Dutro',
                'platNomor' => 'N 9012 EF',
                'kapasitas' => 1000,
                'status' => 'Perbaikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Toyota Hilux',
                'platNomor' => 'N 3456 GH',
                'kapasitas' => 400,
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
