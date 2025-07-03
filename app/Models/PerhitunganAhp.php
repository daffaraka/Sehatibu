<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganAhp extends Model
{
    use HasFactory;


    protected $fillable = [
        'input_data_id',
        'hasil_perhitungan',
        'consistency_ratio'
    ];

    public function inputData()
    {
        return $this->belongsTo(InputData::class);
    }
}
