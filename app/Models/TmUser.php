<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmUser extends Model
{
    protected $primaryKey = 'user_id';
    protected $table = 'tm_user';
    protected $fillable = [
        'user_id',
        'user_nama',
        'user_pass',
        'user_hak',
        'user_sts'
    ];
}
