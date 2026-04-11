<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel daftar_keinginan (wishlist)
        Schema::create('daftar_keinginan', function (Blueprint $table) {
            $table->increments('id_daftar_keinginan');
            $table->unsignedInteger('id_pengguna');
            $table->timestamp('created_at')->useCurrent();

            $table->index('id_pengguna');
        });

        // Tabel item_daftar_keinginan
        Schema::create('item_daftar_keinginan', function (Blueprint $table) {
            $table->increments('id_item_daftar_keinginan');
            $table->unsignedInteger('id_daftar_keinginan');
            $table->unsignedInteger('id_produk');

            $table->index('id_daftar_keinginan');
            $table->index('id_produk');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_daftar_keinginan');
        Schema::dropIfExists('daftar_keinginan');
    }
};