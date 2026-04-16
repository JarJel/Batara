<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VarianProduk extends Model
{
    protected $table = 'varian_produk';
    protected $primaryKey = 'id_varian_produk';
    public $timestamps = false;

    protected $fillable = [
        'id_produk',
        'nama_varian',
        'harga_varian',
        'stok_varian'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
