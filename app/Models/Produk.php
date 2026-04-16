<?php

namespace App\Models;

namespace App\Models;
use App\Models\VarianProduk;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $timestamps = false;

    protected $fillable = [
        'nama_produk',
        'deskripsi_produk',
        'harga_dasar',
        'id_toko',
        'berat',
        'id_kategori'
    ];

    public function varian()
    {
        return $this->hasMany(VarianProduk::class, 'id_produk');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
