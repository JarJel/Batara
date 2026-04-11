<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel produk
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id_produk');

            // ✅ cukup sekali saja
            $table->unsignedInteger('id_toko')->nullable();

            $table->string('nama_produk', 150);
            $table->text('deskripsi_produk')->nullable();
            $table->decimal('harga_dasar', 12, 2);
            $table->decimal('rating_produk', 3, 2)->default(0.00);
            $table->integer('jumlah_rating_produk')->default(0);
            $table->unsignedInteger('id_kategori')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->index('id_toko');       // optional tapi bagus
            $table->index('id_kategori');
        });

        // Tabel gambar_produk
        Schema::create('gambar_produk', function (Blueprint $table) {
            $table->increments('id_gambar');
            $table->unsignedInteger('id_produk');
            $table->string('lokasi_file_gambar', 255)->nullable();

            $table->index('id_produk');
        });

        // Tabel varian_produk
        Schema::create('varian_produk', function (Blueprint $table) {
            $table->increments('id_varian');
            $table->unsignedInteger('id_produk');
            $table->string('nama_varian', 150)->nullable();
            $table->string('sku', 100)->nullable();
            $table->decimal('harga_varian', 12, 2)->nullable();
            $table->integer('stok_varian')->default(0);
            $table->decimal('berat_varian_kg', 6, 3)->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->index('id_produk');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('varian_produk');
        Schema::dropIfExists('gambar_produk');
        Schema::dropIfExists('produk');
    }
};
