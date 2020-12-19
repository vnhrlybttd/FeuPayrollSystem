<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryDetailsController extends Controller
{
    public function stepOne($id){
        return view('salarydetails.stepOne');
    }
}
