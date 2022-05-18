<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'driver',
        'complete_sampel',
        'jam_complete',
        'kirim_sampel',
        'jam_kirim',
        'nama_barge',
        'foto_barge',
        'keterangan',
    ];
}
