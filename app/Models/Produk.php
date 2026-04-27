<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',
        'stok',
        'deskripsi',
        'foto',
    ];
}
