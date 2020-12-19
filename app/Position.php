<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    Protected $fillable =[
        'position_name','status'
    ];

    public $timestamps = false;
}
