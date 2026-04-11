<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel keranjang
        Schema::create('keranjang', function (Blueprint $table) {
            $table->increments('id_keranjang');
            $table->unsignedInteger('id_pengguna');
            $table->unsignedInteger('id_produk');
            $table->integer('qty')->default(1); // 🔥 WAJIB TAMBAH
            $table->timestamps();
        });

        // // Tabel item_keranjang
        // Schema::create('item_keranjang', function (Blueprint $table) {
        //     $table->increments('id_item_keranjang');
        //     $table->unsignedInteger('id_keranjang');
        //     $table->unsignedInteger('id_varian_produk');
        //     $table->integer('jumlah_produk')->default(1);

        //     $table->index('id_keranjang');
        //     $table->index('id_varian_produk');
        // });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_keranjang');
        Schema::dropIfExists('keranjang');
    }
};
