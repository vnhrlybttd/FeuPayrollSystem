<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployementStatus extends Model
{
    protected $table = 'employementstatus';

    protected $primaryKey = 'emp_status';

    public $fillable = ['employement_status'];

    public $timestamps = false;
}
