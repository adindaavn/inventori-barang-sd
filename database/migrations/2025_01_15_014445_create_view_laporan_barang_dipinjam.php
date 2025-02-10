<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW barang_dipinjam AS
            SELECT 
                a.br_kode, 
                b.br_nama,
                c.pb_no_siswa,
                c.pb_nama_siswa, 
                c.pb_tgl,
                c.pb_id
            FROM td_peminjaman_barang a
            LEFT JOIN tm_barang_inventaris b ON a.br_kode = b.br_kode
            LEFT JOIN tm_peminjaman c ON a.pb_id = c.pb_id
            WHERE a.pb_id NOT IN ( 
                SELECT d.pb_id FROM tm_pengembalian d
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS barang_dipinjam;");
    }
};
