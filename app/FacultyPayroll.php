<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FacultyPayroll extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    Protected $table = 'payrolltablefaculty';

    Protected $fillable = [
        'date_from',
        'date_to',
        'emp_id',
        'load_units',
        'laboratory_units',
        'laboratory_hours',
        'total_hours',
        'rate_per_hour',
        'rate_per_hour_old',
        'mins',
        'daily_rate',
        'salary',
        'basic',
        'emolument',
        'overload',
        'total_basic_salary',
        'absence',
        'total_absence'
    ];
}
