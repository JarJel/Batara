<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel role
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id_role');
            $table->string('nama_role', 100);
            $table->text('deskripsi_role')->nullable();
        });

        // Tabel pengguna
        Schema::create('pengguna', function (Blueprint $table) {
            $table->increments('id_pengguna');
            $table->string('email', 150)->unique();
            $table->string('nama_pengguna', 100);
            $table->string('kata_sandi', 255);
            $table->string('nama_lengkap', 150)->nullable();
            $table->string('nomor_telepon', 20)->nullable();
            $table->unsignedBigInteger('id_desa')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        // Tabel pivot pengguna_role
        Schema::create('pengguna_role', function (Blueprint $table) {
            $table->unsignedInteger('id_pengguna');
            $table->unsignedInteger('id_role');

            $table->primary(['id_pengguna', 'id_role']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna_role');
        Schema::dropIfExists('pengguna');
        Schema::dropIfExists('role');
    }
};