<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $fillable = [
        'nama','nisn','email','agama','telepon','tempat_lahir','tanggal_lahir','nama_ortu','telepon_ortu','foto','jenis_kelamin'
    ];
}
