<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bukus')->insert([
            'id' => '1',
            'kodebuku' => 'DD23245',
            'judul' => 'abcd',
            'pengarang' => 'adjhdhsa',
            'status' => 'tersedia',
        ]);
    }
}
