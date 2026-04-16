<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
        'slug_kategori',
        'id_kategori_induk',
        'icon',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }

    public function parent()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori_induk');
    }

    // 🔥 child kategori
    public function children()
    {
        return $this->hasMany(Kategori::class, 'id_kategori_induk');
    }
}
