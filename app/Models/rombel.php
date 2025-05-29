<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rombel extends Model
{
    protected $fillable = ['rombel', 'tingkat_id', 'jurusan_id'];

    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class, 'tingkat_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(jurusan::class, 'jurusan_id');
    }
}
