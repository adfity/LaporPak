<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medis extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'telp',
        'lokasi',
        'tanggal',
        'perihal',
        'foto',
        'progress',
    ];
}
