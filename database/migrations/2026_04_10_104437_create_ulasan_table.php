<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ulasan', function (Blueprint $table) {
            $table->increments('id_ulasan');
            $table->unsignedInteger('id_produk');
            $table->unsignedInteger('id_pengguna');
            $table->decimal('rating', 3, 2)->nullable();
            $table->text('komentar_ulasan')->nullable();
            $table->timestamp('tanggal_ulasan')->useCurrent();

            $table->index('id_produk');
            $table->index('id_pengguna');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};