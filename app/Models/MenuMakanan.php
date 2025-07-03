<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuMakanan extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'menu_id',
        'makanan_id',
        'isMakananPokok'
    ];



    public function makanan()
    {
        return $this->belongsTo(Makanan::class);
    }


    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
