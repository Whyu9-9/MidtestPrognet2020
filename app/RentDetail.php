<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentDetail extends Model
{
    protected $table='rent_details';

    protected $fillable = [
        'rentid', 
        'games_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
