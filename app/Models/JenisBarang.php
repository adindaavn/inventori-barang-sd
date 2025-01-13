<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    protected $primaryKey = 'jns_brg_kode';
    protected $table = 'tr_jenis_barang';
    public $incrementing = false; 
    protected $fillable = [
        'jns_brg_kode',
        'jns_brg_nama'
    ];
}
