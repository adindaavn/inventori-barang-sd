<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisBarang extends Model
{
    protected $primaryKey = 'jns_brg_kode';
    protected $table = 'tr_jenis_barang';
    public $incrementing = false; 
    protected $keyType = 'string';
    protected $fillable = [
        'jns_brg_kode',
        'jns_brg_nama'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            // Ambil kode terakhir dari tabel
            $lastKode = DB::table('tr_jenis_barang')
            ->where('jns_brg_kode', 'like', "JB%")
            ->orderBy('jns_brg_kode', 'desc')
            ->value('jns_brg_kode');

            // Jika ada kode terakhir, ambil nomor urutnya
            $lastNumber = $lastKode ? intval(substr($lastKode, 3)) : 0;

            // Tambahkan 1 untuk nomor urut baru
            $newNumber = $lastNumber + 1;

            // Format br_kode baru
            $model->jns_brg_kode = sprintf("JB%03d", $newNumber); // 4 digit leading zero
        });
    }
}
