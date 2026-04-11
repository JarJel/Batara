<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bumdes', function (Blueprint $table) {
            $table->increments('id_bumdes');
            $table->unsignedBigInteger('id_desa');
            $table->unsignedInteger('id_pengguna')->nullable();
            $table->string('nama_bumdes', 150);
            $table->text('deskripsi')->nullable();
            $table->text('alamat_bumdes')->nullable();
            $table->string('nomor_telepon', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('nomor_rekening', 50)->nullable();
            $table->string('nama_bank', 100)->nullable();
            $table->string('atas_nama_rekening', 150)->nullable();
            $table->decimal('rating_bumdes', 3, 2)->default(0.00);
            $table->integer('jumlah_rating_bumdes')->default(0);
            $table->timestamp('tanggal_dibuat')->useCurrent();

            $table->index('id_desa');
            $table->index('id_pengguna');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bumdes');
    }
};