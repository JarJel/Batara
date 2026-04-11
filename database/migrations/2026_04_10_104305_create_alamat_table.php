<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alamat', function (Blueprint $table) {
            $table->increments('id_alamat');
            $table->unsignedInteger('id_pengguna');
            $table->string('nama_penerima', 150)->nullable();
            $table->string('telepon_penerima', 20)->nullable();
            $table->unsignedBigInteger('id_desa')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->tinyInteger('is_default')->default(0);
            $table->timestamp('created_at')->useCurrent();

            $table->index('id_pengguna');
            $table->index('id_desa');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};