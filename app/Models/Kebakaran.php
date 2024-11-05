<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebakaran extends Model
{
    use HasFactory;
    protected $table = 'kebakaran'; // Menentukan nama tabel secara eksplisit
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
