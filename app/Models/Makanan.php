<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar_makanan',
        'nama_makanan',
        'type_protein',
        'type_makanan',
        'protein',
        'karbohidrat',
        'lemak',
        'asam_folat',
    ];
}
