<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;

    protected $table = 'weight_info';
    protected $keyType = 'string';

    protected $fillable = [
        'rep',
        'insp',
        'vess',
        'comm',
        'quan',
        'ship',
        'buyer',
        'place',
        'date',
        'time',
        'until',
        'shore',
    ];
}
