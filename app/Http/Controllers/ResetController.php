<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Hash;

class ResetController extends Controller
{
    public function reset($id){

      
        $reset = Employee::find($id);
  
        $reset->update([
            'password' => Hash::make('FeuCavite123!')
        ]);

        //dd($reset);
        toast('Reset Successfully! Default Password: FeuCavite123!','info');
        return redirect()->back();
    }
}
