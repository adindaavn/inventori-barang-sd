<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            [
                'no_siswa' => '2',
                'nama_siswa' => 'mei',
                'kls_siswa' => '11 MPLB',
            ],
            [
                'no_siswa' => '3',
                'nama_siswa' => 'ayu',
                'kls_siswa' => '12 RPL',
            ],
            [
                'no_siswa' => '5',
                'nama_siswa' => 'putri',
                'kls_siswa' => '12 RPL',
            ],
            [
                'no_siswa' => '7',
                'nama_siswa' => 'adinda',
                'kls_siswa' => '12 RPL',
            ],
            [
                'no_siswa' => '9',
                'nama_siswa' => 'dimas',
                'kls_siswa' => '10 TJKT',
            ],
            [
                'no_siswa' => '12',
                'nama_siswa' => 'al',
                'kls_siswa' => '11 AKKUL',
            ]
        ];
        DB::table('tr_siswa')->insert($siswa);
    }
}
