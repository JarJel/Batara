<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilToko extends Model
{
    protected $table = 'profil_toko';
    protected $primaryKey = 'id_profil_toko';
    public $timestamps = false;

    protected $fillable = [
        'id_toko',
        'deskripsi',
        'alamat_toko',
        'nomor_telepon',
        'email',
        'logo',
        'jam_operasional',
        'sosial_media'
    ];

    // relasi ke toko
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}