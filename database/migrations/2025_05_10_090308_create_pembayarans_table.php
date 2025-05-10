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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('kategori_pembayaran_id')->constrained('kategori_pembayarans')->onDelete('cascade');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans')->onDelete('cascade');
            $table->date('bulan');
            $table->date('tanggal_bayar');
            $table->char('kode');
            $table->char('nominal');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
