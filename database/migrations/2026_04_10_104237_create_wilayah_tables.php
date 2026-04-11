<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel provinsi
        Schema::create('provinsi', function (Blueprint $table) {
            $table->char('id', 2)->primary();
            $table->string('name', 255);
        });

        // Tabel kabupaten
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->char('id', 4)->primary();
            $table->char('id_provinsi', 2);
            $table->string('name', 255);

            $table->foreign('id_provinsi')->references('id')->on('provinsi');
            $table->index('id_provinsi', 'kabupaten_id_provinsi_index');
        });

        // Tabel kecamatan
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->char('id', 7)->primary();
            $table->char('id_kabupaten', 4);
            $table->string('name', 255);

            $table->foreign('id_kabupaten')->references('id')->on('kabupaten');
            $table->index('id_kabupaten', 'kecamatan_id_index');
        });

        // Tabel desa
        Schema::create('desa', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->char('id_kecamatan', 7);
            $table->string('name', 255);

            $table->foreign('id_kecamatan')->references('id')->on('kecamatan');
            $table->index('id_kecamatan', 'desa_id_kecamatan_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desa');
        Schema::dropIfExists('kecamatan');
        Schema::dropIfExists('kabupaten');
        Schema::dropIfExists('provinsi');
    }
};