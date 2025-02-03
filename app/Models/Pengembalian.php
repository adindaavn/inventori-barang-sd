<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Pengembalian extends Model
{
    protected $primaryKey = 'kembali_id';
    protected $table = 'tm_pengembalian';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'kembali_id',
        'pb_id',
        'user_id',
        'kembali_tgl',
        'kembali_sts'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $model->user_id = Auth::id();
            $model->kembali_sts = '0';
            $model->kembali_tgl = now();

            $tahun = date('Y', strtotime($model->kembali_tgl));
            $bulan = date('m', strtotime($model->kembali_tgl));

            // Ambil ID transaksi terakhir yang sesuai tahun dan bulan
            $lastId = DB::table('tm_pengembalian')
                ->where('kembali_id', 'like', "KB$tahun$bulan%")
                ->orderBy('kembali_id', 'desc')
                ->value('kembali_id');

            // Jika ada ID terakhir, ambil nomor urutnya
            $lastNumber = $lastId ? intval(substr($lastId, 8)) : 0;

            // Tambahkan 1 untuk nomor urut baru
            $newNumber = $lastNumber + 1;

            // Format pb_id baru
            $model->kembali_id = sprintf("KB%s%s%04d", $tahun, $bulan, $newNumber); // 4 digit leading zero
        });
    }
}
