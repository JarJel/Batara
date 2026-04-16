<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifikasiToko extends Model
{
    protected $table = 'verifikasi_toko';
    protected $primaryKey = 'id_verifikasi_toko';
    public $timestamps = false;

    protected $fillable = [
        'id_toko',
        'status_verifikasi',
        'dokumen_ktp',
        'dokumen_sku',
        'nomor_rekening'
    ];
}
