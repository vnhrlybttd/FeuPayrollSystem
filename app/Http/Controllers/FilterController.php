<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\FacultyPayslipDetails;
use RealRashid\SweetAlert\Facades\Alert;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('filter.index');
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
        $request->validate([
            'recordsFrom' => 'required',
            'recordsTo' => 'required',
        ]);

        $startdate = $request->get('recordsFrom');
        $enddate = $request->get('recordsTo');

        $absentTable = DB::Table('att_day_summary')
        ->whereDate('recordsFrom', '<=', $startdate)
        ->whereDate('recordsFrom', '<=', $enddate)
        ->where('employee_id','=','8')
        ->get();

        //dd($absentTable);
            
        return view ('Faculty.edit',compact('absentTable'));
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

        $finds = FacultyPayslipDetails::where('faculty_salary', '=', $id)->first();
        

        //dd($finds);

        return view ('filter.edit',compact('finds'));
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

        $data = FacultyPayslipDetails::find($id);

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

      


        $data->update(['absence'=> $absentTable]);
        
        Alert::success('Update', 'Update Absent Successfully');

        //dd($absentTable);

     
        return redirect()->route('Faculty.index');
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
