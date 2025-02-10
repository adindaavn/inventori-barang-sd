<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrSiswa extends Model
{
    protected $table = 'tr_siswa';
    protected $primaryKey = 'no_siswa';
    protected $fillable = [
        'nama_siswa',
        'kls_siswa',
    ];
}
