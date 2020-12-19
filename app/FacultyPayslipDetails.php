<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class FacultyPayslipDetails extends Model  implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    protected $table = 'facultydetails';
    
    public $primaryKey ='faculty_salary';

    protected $fillable = [
        'emp_id',
        'load_units',
        'laboratory_units',
        'laboratory_hours',
        'total_hours',
        'rate_per_hour',
        'rate_per_hour_old',
        'mins',
        'salary',
        'daily_rate',
        'basic',
        'emolument',
        'overload',
        'absence',
        'total_basic_salary',
        'total_absence',
       
    ];

    public $attributes = [
        'load_units' => '0',
        'laboratory_units' => '0',
        'laboratory_hours' => '0',
        'total_hours' => '0',
        'rate_per_hour' => '0',
        'rate_per_hour_old' => '0',
        'mins' => '0',
        'salary' => '0',
        'daily_rate' => '0',
        'basic' => '0',
        'emolument' => '0',
        'overload' => '0',
        'absence' => '0',
        'total_basic_salary' => '0',
        'total_absence' => '0',
       
    ];

    public $timestamps = true;
}
