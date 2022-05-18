<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightList extends Model
{
    use HasFactory;

    protected $table = 'weight_list';
    protected $keyType = 'string';

    protected $fillable = [
        'id_weight',
        'no_reg',
        'gross',
        'tare',
        'net',
    ];
}
