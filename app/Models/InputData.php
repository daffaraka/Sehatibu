<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputData extends Model
{
    use HasFactory;


    protected $table = 'input_datas';
    protected $fillable =
    [
        'user_id',
        'tb',
        'bb',
        'trisemester',
        'aktivitas_harian',
        'usia'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
