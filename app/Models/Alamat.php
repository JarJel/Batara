<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamat';
    protected $primaryKey = 'id_alamat';

    protected $fillable = [
        'id_pengguna',
        'nama_penerima',
        'no_hp',
        'alamat_lengkap',
        'kota',
        'kode_pos',
        'is_default'
    ];
}
