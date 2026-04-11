<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->increments('id_notifikasi');
            $table->unsignedInteger('id_pengguna');
            $table->enum('tipe', ['pengajuan', 'pesanan', 'pembayaran', 'umum'])->default('umum');
            $table->text('isi_pesan')->nullable();
            $table->tinyInteger('is_read')->default(0);
            $table->timestamp('tanggal_notifikasi')->useCurrent();

            $table->index('id_pengguna');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};