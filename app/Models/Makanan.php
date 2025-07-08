<?php

namespace App\Models;

use App\Models\MenuMakanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'zat_besi'
    ];


    public function makanans()
    {
        return $this->hasMany(MenuMakanan::class);
    }
}
