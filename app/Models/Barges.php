<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barges extends Model
{
    use HasFactory;

    protected $table = 'barges_info';
    protected $keyType = 'string';

    protected $fillable = [
        'foreman',
        'vessel',
        'date',
        'place',
        'customer',
        'quantity',
        'increment_numb',
        'type_of_coal',
        'sampling_method',
        'reference',
    ];
}
