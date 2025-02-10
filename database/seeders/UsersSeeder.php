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
        $users = [
            [
                'user_id' => '0',
                'user_nama' => 'rei',
                'user_pass' => Hash::make('naoi'),
                'user_hak' => 'SU',
                'user_sts' => '1',
            ],
            [
                'user_id' => '1',
                'user_nama' => 'hani',
                'user_pass' => Hash::make('pham'),
                'user_hak' => 'user',
                'user_sts' => '1',
            ],
            [
                'user_id' => '2',
                'user_nama' => 'kim',
                'user_pass' => Hash::make('winter'),
                'user_hak' => 'admin',
                'user_sts' => '1',
            ],
        ];
        DB::table('tm_user')->insert($users);
    }
}
