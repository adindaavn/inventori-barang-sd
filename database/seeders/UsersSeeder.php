<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tm_user')->insert([
            'user_id' => '0',
            'user_nama' => 'rei',
            'user_pass' => Hash::make('naoi'), // Hash password
            'user_hak' => 'SU',
            'user_sts' => '1'
        ]);
    }
}
