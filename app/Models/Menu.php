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



    public function makanan()
    {
        return $this->hasMan(MenuMakanan::class);
    }
}
