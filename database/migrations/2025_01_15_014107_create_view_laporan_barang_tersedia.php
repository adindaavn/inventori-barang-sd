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
            CREATE VIEW barang_tersedia AS
            SELECT 
                a.br_kode, 
                a.br_nama,
                a.jns_brg_kode,
                b.jns_brg_nama,
                a.br_sts,
                a.br_tgl_terima
            FROM tm_barang_inventaris a 
            LEFT JOIN tr_jenis_barang b ON a.jns_brg_kode = b.jns_brg_kode
            WHERE a.br_kode NOT IN (
                SELECT c.br_kode FROM td_peminjaman_barang c WHERE c.pbd_sts = 1
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS barang_tersedia;");
    }
};
