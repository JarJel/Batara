<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel pendapatan_bumdes
        Schema::create('pendapatan_bumdes', function (Blueprint $table) {
            $table->increments('id_pendapatan_bumdes');
            $table->unsignedInteger('id_bumdes');
            $table->unsignedInteger('id_pesanan')->nullable();
            $table->decimal('jumlah', 15, 2);
            $table->enum('tipe', ['plus', 'minus'])->default('plus');
            $table->string('keterangan', 255)->nullable();
            $table->dateTime('tanggal')->useCurrent();
        });

        // Tabel pendapatan_toko
        Schema::create('pendapatan_toko', function (Blueprint $table) {
            $table->increments('id_pendapatan_toko');
            $table->unsignedInteger('id_toko');
            $table->unsignedInteger('id_pesanan')->nullable();
            $table->decimal('jumlah', 15, 2);
            $table->enum('tipe', ['plus', 'minus'])->default('plus');
            $table->string('keterangan', 255)->nullable();
            $table->dateTime('tanggal')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendapatan_toko');
        Schema::dropIfExists('pendapatan_bumdes');
    }
};