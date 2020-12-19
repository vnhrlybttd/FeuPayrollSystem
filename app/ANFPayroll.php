<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ANFPayroll extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    
    protected $table = 'anfpayroll';

    
    protected $primaryKey = 'id';

    public $fillable = [
        'dates','paydate','admin_approvals'
    ];

    public $attributes = ['admin_approvals' => 'Pending'];

    public $timestamps = false;
}
