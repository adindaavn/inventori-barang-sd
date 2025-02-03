<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PeminjamanBarang extends Model
{
    protected $primaryKey = 'pbd_id';
    protected $table = 'td_peminjaman_barang';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'pbd_id',
        'pb_id',
        'br_kode',
        'pbd_tgl',
        'pbd_sts'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $pb_id = $model->pb_id;

            $lastId = DB::table('td_peminjaman_barang')
            ->where('pbd_id', 'like', "$pb_id%")
            ->orderBy('pbd_id', 'desc')
            ->value('pbd_id');

            $lastNumber = $lastId ? intval(substr($lastId, strlen($pb_id))) : 0;

            $newNumber = $lastNumber + 1;

            $model->pbd_id = sprintf("%s%03d", $pb_id, $newNumber);
        });
    }
}
