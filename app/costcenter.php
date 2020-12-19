<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class costcenter extends Model
{
    protected $table = 'costcenter';

    protected $primaryKey = 'cost_id';

    public $fillable = ['cc_name','description'];


    public $timestamps = false;
}
