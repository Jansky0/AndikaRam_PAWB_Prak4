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
        Schema::create('laporan_jalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_jalan')->onDelete('cascade');
            $table->string('judul');
            $table->string('lokasi');
            $table->string('tingkat_kerusakan'); // berat, sedang, ringan
            $table->string('status')->default('menunggu'); // menunggu, dalam_proses, selesai
            $table->string('nama_pelapor');
            $table->date('tanggal_lapor');
            $table->integer('poin')->default(20);
            $table->string('koordinat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_jalan');
    }
};
