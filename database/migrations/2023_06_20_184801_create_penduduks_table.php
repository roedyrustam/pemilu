<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provinsi_id')->references('id')->on('provinsi')->onDelete('cascade');
            $table->foreignId('kabupaten_id')->references('id')->on('kabupaten')->onDelete('cascade');
            $table->foreignId('kecamatan_id')->references('id')->on('kecamatan')->onDelete('cascade');
            $table->foreignId('desa_id')->references('id')->on('desa')->onDelete('cascade');
            $table->string('nik')->require();
            $table->string('kk')->require();
            $table->string('jenis_kelamin')->require();
            $table->string('nama_penduduk');
            $table->datetime('tanggal_lahir')->date('d-m-Y');
            $table->string('alamat_penduduk');
            $table->string('photo_ktp')->nullable();
            $table->boolean('dpt');
            $table->dateTime('terdata');
            $table->foreignIdFor('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
