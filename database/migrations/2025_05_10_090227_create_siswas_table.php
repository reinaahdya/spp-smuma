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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('nisn');
            $table->string('email')->unique();
            $table->string('agama');
            $table->char('telepon');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nama_ortu');
            $table->char('telepon_ortu');
            $table->string('foto');
            $table->enum('jenis_kelamin', ['laki-laki','perempuan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
