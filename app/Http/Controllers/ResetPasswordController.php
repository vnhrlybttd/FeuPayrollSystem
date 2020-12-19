<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function reset($id){

      
        $reset = Employee::find($id);
        
        /*
        $reset->update([
            'resets_password' => '0',
            'password' => bcrypt('FeuCavite123!'),
            
        ]);
        */

        $reset->password = bcrypt('FeuCavite123!');
        $reset->resets_password = 0;
        $reset->save();
        //dd($reset);

        //dd($reset);
        toast('Reset Successfully!','info');
        return redirect()->action('EmployeeController@index');
    }
}
