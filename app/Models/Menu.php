<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nama_menu'
    ];



    public function makanans()
    {
        return $this->hasMany(MenuMakanan::class);
    }


    // public function menu_makanan()
    // {
    //     return $this->belongsToMany(Makanan::class, 'menu_makanan', 'menu_id', 'makanan_id')
    //         ->withPivot('isMakananPokok') // field tambahan dari pivot
    //         ->withTimestamps(); // jika pakai timestamps di tabel pivot
    // }
}
