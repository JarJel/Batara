<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel toko
        Schema::create('toko', function (Blueprint $table) {
            $table->increments('id_toko');
            $table->unsignedInteger('id_pengguna');
            $table->unsignedInteger('id_bumdes')->nullable();
            $table->unsignedBigInteger('id_desa')->nullable();
            $table->string('nama_toko', 150);
            $table->string('slug_toko', 150)->nullable();
            $table->tinyInteger('terverifikasi')->default(0);
            $table->timestamp('tanggal_daftar')->useCurrent();
            $table->string('nomor_rekening', 50)->nullable();
            $table->string('nama_bank', 100)->nullable();
            $table->string('atas_nama_rekening', 150)->nullable();
        });

        // Tabel profil_toko
        Schema::create('profil_toko', function (Blueprint $table) {
            $table->increments('id_profil_toko');
            $table->unsignedInteger('id_toko');
            $table->text('deskripsi')->nullable();
            $table->text('alamat_toko')->nullable();
            $table->string('nomor_telepon', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('jam_operasional', 255)->nullable();
            $table->json('sosial_media')->nullable();
        });

        // Tabel verifikasi_toko
        Schema::create('verifikasi_toko', function (Blueprint $table) {
            $table->increments('id_verifikasi_toko');
            $table->unsignedInteger('id_toko');
            $table->enum('status_verifikasi', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->string('dokumen_sku', 255)->nullable();
            $table->string('dokumen_ktp', 255)->nullable();
            $table->string('nomor_rekening', 50)->nullable();
            $table->text('catatan_admin')->nullable();
            $table->timestamp('tanggal_verifikasi')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verifikasi_toko');
        Schema::dropIfExists('profil_toko');
        Schema::dropIfExists('toko');
    }
};