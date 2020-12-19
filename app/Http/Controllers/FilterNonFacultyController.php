<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\NonFacultyPayslipDetails;
use RealRashid\SweetAlert\Facades\Alert;

class FilterNonFacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finds = NonFacultyPayslipDetails::where('non_salary', '=', $id)
        ->join('users','users.emp_id','=','nonfacultydetails.emp_id')
        ->first();
        

        //dd($finds);

        return view ('filternon.edit',compact('finds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = NonFacultyPayslipDetails::find($id);

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

      
        //dd($empids);

        $data->update(['absence'=> $absentTable]);
        
        Alert::success('Update', 'Update Absent Successfully');

         return redirect()->route('NonFaculty.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
