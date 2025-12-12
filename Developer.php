<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    
  
    protected $primaryKey = 'id_developer';

   
    protected $fillable = [
        'nama_developer',
        'negara',
        'tahun_berdiri',
        'deskripsi',
    ];
}
