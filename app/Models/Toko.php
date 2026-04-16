<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'toko';
    protected $primaryKey = 'id_toko';
    public $timestamps = false;

    protected $fillable = [
        'id_pengguna',
        'id_bumdes',
        'id_desa',
        'nama_toko',
        'slug_toko',
        'terverifikasi',
        'tanggal_daftar',
        'nomor_rekening',
        'nama_bank',
        'atas_nama_rekening'
    ];

    // =========================
    // RELASI
    // =========================

    // toko milik user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    // toko punya banyak produk
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_toko');
    }

    // toko punya profil
    public function profil()
    {
        return $this->hasOne(ProfilToko::class, 'id_toko');
    }

    // // toko punya verifikasi
    // public function verifikasi()
    // {
    //     return $this->hasOne(VerifikasiToko::class, 'id_toko');
    // }
}