<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';
    
    protected $fillable = [
    'judul_game',
    'deskripsi',
    ];
   
    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];
}
