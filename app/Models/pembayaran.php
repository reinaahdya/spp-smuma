<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $fillable = [
        'siswa_id', 'kategori_pembayaran_id', 'tahun_ajaran_id', 'bulan', 'tanggal_bayar', 'nominal', 'keterangan', 'kode'
    ];
}
