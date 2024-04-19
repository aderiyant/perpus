<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'namalengkap' => 'aderiyanto',
            'username' => '271101',
            'password' => '12345',
            'kelas' => 'xii',
            'level' => 'admin',
            
        ]);
    }
}
