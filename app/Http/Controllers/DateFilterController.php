<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\hr_employee;

class DateFilterController extends Controller
{
    public function dateFilter(Request $request){

        //$endUser = auth()->user()->emp_id;

        $request->validate([
            'recordsFrom' => 'required',
            'recordsTo' => 'required',
            'emp_id' => 'required',
        ]);

        $startdate = $request->get('recordsFrom');
        $enddate = $request->get('recordsTo');
        $empids = $request->get('emp_id');

        $whereNumbers = [
            '7','9'
        ];

        $absentTable = DB::Table('att_day_summary')
        ->join('hr_employee','hr_employee.id','=','att_day_summary.employee_id')
        ->whereDate('recordsFrom', '>=', $startdate)
        ->whereDate('recordsTo', '<=', $enddate)
        ->where('emp_pin','=',$empids)
        ->select('item_id','item_results')
        ->whereIn('item_id',$whereNumbers)
        //->get();
        ->sum('item_results');
        //->paginate(5);

        //dd($absentTable);

        return view('datefilter.index',compact('absentTable'));
    }
}
