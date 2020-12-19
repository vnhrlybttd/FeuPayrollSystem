<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use OwenIt\Auditing\Contracts\Auditable;

class hr_employee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    Protected $table = 'hr_employee';

    public function emp_pins(){
        return $this->hasOne('App\User');
    }
}
