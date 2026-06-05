<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    protected $fillable = [
        'kode_paket',
        'nama_paket',
        'harga',
        'deskripsi',
        'min_berat',
        'is_active'
    ];

    public function scopeAktif($query)
    {
        return $query->where('is_active', 1);
    }
}
