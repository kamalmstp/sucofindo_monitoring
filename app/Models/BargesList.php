<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BargesList extends Model
{
    use HasFactory;

    protected $table = 'barges_list';
    protected $keyType = 'string';

    protected $fillable = [
        'id_barges',
        'no_sublot',
        'incr_no',
        'date',
        'time',
        'trucks_number',
        'gatm',
        'size',
        'seal_number',
        'remark',
    ];
}
