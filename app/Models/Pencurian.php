<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencurian extends Model
{
    use HasFactory;
    protected $table = 'pencurian'; // Menentukan nama tabel secara eksplisit
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
