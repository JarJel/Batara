<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    public $timestamps = false;

    protected $fillable = [
        'id_pengguna',
        'total_harga_produk',
        'status_pesanan'
    ];

    public function items()
    {
        return $this->hasMany(ItemPesanan::class, 'id_pesanan');
    }
}
