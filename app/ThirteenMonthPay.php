<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ThirteenMonthPay extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    Protected $table = 'thirteenmonthpay';

    public $fillable = ['employee_id','start_date','end_date','net_basic','thirteenmonthpay','type'];
}
