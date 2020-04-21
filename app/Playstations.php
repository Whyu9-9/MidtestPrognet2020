<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playstations extends Model
{
    protected $table = 'playstations';
    
    protected $fillable = [
    'jenis_ps',
    'deskripsi',
    ];
   
    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];
}
