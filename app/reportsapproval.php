<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class reportsapproval extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    
    protected $table = 'reportsapproval';

    protected $primaryKey = 'approval_id';

    public $fillable = ['report_name','date','admin_approval_reports'];

    public $attributes = [
        'admin_approval_reports' => 'Pending'
    ];

    public $timestamps = false;
}
