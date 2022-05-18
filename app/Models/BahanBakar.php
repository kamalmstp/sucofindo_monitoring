<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakar extends Model
{
    use HasFactory;

    protected $table = 'bahan_bakar';
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'driver',
        'nominal',
        'foto_nota',
        'keterangan',
    ];
}
