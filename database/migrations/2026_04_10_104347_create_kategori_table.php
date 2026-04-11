<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id_kategori');
            $table->string('nama_kategori', 100);
            $table->string('slug_kategori', 100)->nullable()->unique();
            $table->unsignedInteger('id_kategori_induk')->nullable();
            $table->string('icon', 255)->nullable();

            $table->index('id_kategori_induk');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};