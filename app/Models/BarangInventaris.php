<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangInventaris extends Model
{
    protected $primaryKey = 'br_kode';
    protected $table = 'tm_barang_inventaris';
    public $incrementing = false; 
    protected $fillable = [
        'br_kode',
        'jns_brg_kode',
        'user_id',
        'br_nama',
        'br_tgl_terima',
        'br_tgl_entry',
        'br_sts'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Tahun saat ini
            $tahun = date('Y');

            // Ambil kode terakhir dari tabel
            $lastKode = DB::table('tm_barang_inventaris')
            ->where('br_kode', 'like', "INV$tahun%")
            ->orderBy('br_kode', 'desc')
            ->value('br_kode');

            // Jika ada kode terakhir, ambil nomor urutnya
            $lastNumber = $lastKode ? intval(substr($lastKode, 7)) : 0;

            // Tambahkan 1 untuk nomor urut baru
            $newNumber = $lastNumber + 1;

            // Format br_kode baru
            $model->br_kode = sprintf("INV%s%04d", $tahun, $newNumber); // 4 digit leading zero
        });
    }
}
