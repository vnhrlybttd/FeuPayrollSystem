<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;



class DeactivateController extends Controller
{
    public function deactivate($id){

        $deactivate = Employee::find($id);

        $deactivate->update([
            'status' => '0'
        ]);

        //dd($reset);
        toast('Account Deactivated!','success');
        return redirect()->action('EmployeeController@index');

    }

    public function activate($id){

        $deactivate = Employee::find($id);

        $deactivate->update([
            'status' => '1'
        ]);

        //dd($reset);
        toast('Account Activated!','success');
        return redirect()->action('EmployeeController@index');

    }

}
