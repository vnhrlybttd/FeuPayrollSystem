<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Employee extends Model implements Auditable
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use \OwenIt\Auditing\Auditable;

    Protected $table= 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name','last_name', 'username', 'password','status','type','emp_id','user_status','resets_password','force_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $attributes = [
        'status' => 1,
        'force_password' => '0',
        'resets_password' => '0',
    ];


}
