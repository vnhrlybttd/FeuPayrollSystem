<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class NonFacultyPayslipDetails extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'nonfacultydetails';
    
    public $primaryKey ='non_salary';

    protected $fillable = [
        'emp_id',
        'salary',
        'daily_rate',
        'rate_per_hour',
        'mins',
        'basic',
        'emolument',
        'total_basic_salary',
        'absence',
        'total_absence'
    ];

    public $attributes = [
        'salary' => '0',
        'daily_rate' => '0',
        'rate_per_hour' => '0',
        'mins' => '0',
        'basic' => '0',
        'emolument' => '0',
        'total_basic_salary' => '0',
        'absence' => '0',
        'total_absence' => '0',
    ];

    public $timestamps = true;
}
