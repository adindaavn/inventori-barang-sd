<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangInventaris extends Model
{
    protected $primaryKey = 'br_kode';
    protected $table = 'tm_barang_inventaris';
    public $incrementing = false;
    protected $keyType = 'string';
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
            $model->user_id = Auth::id();

            $model->br_tgl_entry = now();

            $tahun =  date('Y', strtotime($model->br_tgl_terima));

            $lastKode = DB::table('tm_barang_inventaris')
            ->where('br_kode', 'like', "INV$tahun%")
            ->orderBy('br_kode', 'desc')
            ->value('br_kode');

            $lastNumber = $lastKode ? intval(substr($lastKode, 7)) : 0;

            $newNumber = $lastNumber + 1;

            $model->br_kode = sprintf("INV%s%04d", $tahun, $newNumber);
        });
    }
}
