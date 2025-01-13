<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $primaryKey = 'kembali_id';
    protected $table = 'tm_pengembalian';
    protected $fillable = [
        'kembali_id',
        'pb_id',
        'user_id',
        'kembali_tgl',
        'kembali_sts'
    ];
}
