<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'Makanan',
                'slug_kategori' => 'makanan',
                'id_kategori_induk' => null,
                'icon' => null
            ],
            [
                'nama_kategori' => 'Minuman',
                'slug_kategori' => 'minuman',
                'id_kategori_induk' => null,
                'icon' => null
            ],
            [
                'nama_kategori' => 'Kerajinan',
                'slug_kategori' => 'kerajinan',
                'id_kategori_induk' => null,
                'icon' => null
            ],
            [
                'nama_kategori' => 'Pertanian',
                'slug_kategori' => 'pertanian',
                'id_kategori_induk' => null,
                'icon' => null
            ],
            [
                'nama_kategori' => 'Fashion',
                'slug_kategori' => 'fashion',
                'id_kategori_induk' => null,
                'icon' => null
            ],
            [
                'nama_kategori' => 'Oleh-Oleh',
                'slug_kategori' => 'oleh-oleh',
                'id_kategori_induk' => null,
                'icon' => null
            ],
        ]);
    }
}