<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel pesanan
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id_pesanan');
            $table->unsignedInteger('id_pengguna');
            $table->unsignedInteger('id_toko');
            $table->unsignedInteger('id_alamat')->nullable();
            $table->decimal('total_harga_produk', 15, 2);
            $table->decimal('biaya_pengiriman', 15, 2)->default(0.00);
            $table->enum('status_pesanan', [
                'menunggu', 'diterima', 'dipacking',
                'dikirim', 'sampai', 'selesai', 'dibatalkan',
            ])->default('menunggu');
            $table->timestamp('tanggal_pesanan')->useCurrent();
        });

        // Tabel item_pesanan
        Schema::create('item_pesanan', function (Blueprint $table) {
            $table->increments('id_item_pesanan');
            $table->unsignedInteger('id_pesanan');
            $table->unsignedInteger('id_varian_produk');
            $table->string('nama_produk_snapshot', 255)->nullable();
            $table->decimal('harga_saat_pesan', 12, 2)->nullable();
            $table->integer('jumlah')->default(1);
            $table->decimal('berat_per_item_kg', 6, 3)->nullable();

            $table->index('id_pesanan');
            $table->index('id_varian_produk');
        });

        // Tabel status_pesanan (log history status)
        Schema::create('status_pesanan', function (Blueprint $table) {
            $table->increments('id_status');
            $table->unsignedInteger('id_pesanan');
            $table->enum('status', [
                'Menunggu Konfirmasi', 'Pesanan Diterima', 'Sedang Dikemas',
                'Dikirim', 'Sampai di Tujuan', 'Selesai', 'Dibatalkan',
            ])->default('Menunggu Konfirmasi');
            $table->dateTime('waktu_status')->useCurrent();
            $table->text('catatan')->nullable();
        });

        // Tabel pengiriman
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->increments('id_pengiriman');
            $table->unsignedInteger('id_pesanan');
            $table->string('kurir', 100)->nullable();
            $table->string('service', 100)->nullable();
            $table->string('estimasi_hari', 50)->nullable();
            $table->decimal('biaya_pengiriman', 15, 2)->nullable();
            $table->string('nomor_resi', 100)->nullable();
            $table->timestamp('tanggal_dikirim')->nullable();
            $table->timestamp('tanggal_diterima')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
        Schema::dropIfExists('status_pesanan');
        Schema::dropIfExists('item_pesanan');
        Schema::dropIfExists('pesanan');
    }
};