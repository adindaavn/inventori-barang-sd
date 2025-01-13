<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Peminjaman extends Model
{
    protected $primaryKey = 'pb_id';
    protected $table = 'tm_peminjaman';
    public $incrementing = false;
    protected $fillable = [
        'pb_id',
        'user_id',
        'pb_tgl',
        'pb_no_siswa',
        'pb_nama_siswa',
        'pb_harus_kembali_tgl',
        'pb_stat'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Tahun dan Bulan saat ini
            $tahun = date('Y');
            $bulan = date('m');

            // Ambil ID transaksi terakhir yang sesuai tahun dan bulan
            $lastId = DB::table('tm_peminjaman')
            ->where('pb_id', 'like', "PJ$tahun$bulan%")
            ->orderBy('pb_id', 'desc')
            ->value('pb_id');

            // Jika ada ID terakhir, ambil nomor urutnya
            $lastNumber = $lastId ? intval(substr($lastId, 8)) : 0;

            // Tambahkan 1 untuk nomor urut baru
            $newNumber = $lastNumber + 1;

            // Format pb_id baru
            $model->pb_id = sprintf("PJ%s%s%04d", $tahun, $bulan, $newNumber); // 4 digit leading zero
        });
    }
}
