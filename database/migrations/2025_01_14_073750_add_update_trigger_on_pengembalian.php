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
        DB::unprepared("
            CREATE TRIGGER `update_pinjaman`
            AFTER INSERT ON `tm_pengembalian`
            FOR EACH ROW
            BEGIN
                -- Update tabel td_peminjaman_barang
                UPDATE td_peminjaman_barang
                SET pbd_sts = '0' 
                WHERE pb_id = NEW.pb_id; 
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `update_pinjaman`');
    }
};
