<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class addEmployee extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    protected $table = 'addemployee';

    protected $primaryKey = 'add_id';

    public $fillable = [
        'emp_id','middle_name','sss_number','philhealth_number','pagibig_number','tin_number','bpi_account','cost_center','employment_status',
        'salary',
        'daily_rate',
        'rate_per_hour',
        'mins',
        'basic',
        'emolument',
        'total_basic_salary',
        'rate_per_hour_old',
        'load_units',
        'laboratory_units',
        'laboratory_hours',
        'total_hours',
        'overload',
        'additional_hours',
        'total_hours'
        ];


    public $attributes = [
        'salary' => '0',
        'daily_rate'=> '0',
        'rate_per_hour'=> '0',
        'mins'=> '0',
        'basic'=> '0',
        'emolument'=> '0',
        'total_basic_salary'=> '0',
        'rate_per_hour_old'=> '0',
        'load_units'=> '0',
        'laboratory_units'=> '0',
        'laboratory_hours'=> '0',
        'total_hours'=> '0',
        'overload'=> '0',
        'additional_hours' => '0',
    ];

    public $timestamps = false;
}
