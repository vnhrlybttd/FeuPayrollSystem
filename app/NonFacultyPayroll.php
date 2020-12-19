<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class NonFacultyPayroll extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    Protected $table = 'payrolltablenonfaculty';

    protected $fillable = [
        'date_from',
        'date_to',
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
    



    public $timestamps = true;
}
