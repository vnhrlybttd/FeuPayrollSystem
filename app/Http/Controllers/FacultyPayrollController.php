<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacultyPayroll;
use App\FacultyPayslipDetails;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class FacultyPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Table = DB::Table('payrolltablefaculty')
        ->join('hr_employee','hr_employee.emp_pin','=','payrolltablefaculty.emp_id')
        ->get();

        
        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }

        //dd($Table);  

        return view('payrollfaculty.index',compact('Table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payrolltablefaculty = DB::Table('facultydetails')
        ->join('hr_employee','facultydetails.emp_id','=','hr_employee.emp_pin')
        ->get();

        //dd($payrolltablefaculty);

        return view('payrollfaculty.create',compact('payrolltablefaculty'));
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
            'date_from' => 'required',
            'date_to' => 'required',
            'emp_id' => 'required'
        ]);

        $getEmpid = $request->get('emp_id');
        $date_from = $request->get('date_from');
        $date_to = $request->get('date_to');

       
        
        $TableValue = FacultyPayslipDetails::where('emp_id','=',$getEmpid)
        ->select('emp_id',
        'load_units',
        'laboratory_units',
        'laboratory_hours',
        'total_hours',
        'rate_per_hour',
        'rate_per_hour_old',
        'mins',
        'daily_rate',
        'salary',
        'basic',
        'emolument',
        'overload',
        'total_basic_salary',
        'absence',
        'total_absence')
        ->first();

    

       $emp_id =  $TableValue->emp_id;
       $load_units =  $TableValue->load_units;
       $laboratory_units =  $TableValue->laboratory_units;
       $laboratory_hours =  $TableValue->laboratory_hours;
       $total_hours =  $TableValue->total_hours;
       $rate_per_hour =  $TableValue->rate_per_hour;
       $rate_per_hour_old =  $TableValue->rate_per_hour_old;
       $mins =  $TableValue->mins;
       $daily_rate =  $TableValue->daily_rate;
       $salary =  $TableValue->salary;
       $basic =  $TableValue->basic;
       $emolument =  $TableValue->emolument;
       $overload =  $TableValue->overload;
       $total_basic_salary =  $TableValue->total_basic_salary;
       $absence =  $TableValue->absence;
       $total_absence =  $TableValue->total_absence;

     
        
      
        
        $sample = FacultyPayroll::create([
            'date_from'=>$date_from,
            'date_to'=>$date_to,
            'emp_id'=>$emp_id,
            'load_units'=>$load_units,
            'laboratory_units'=>$laboratory_units,
            'laboratory_hours'=>$laboratory_hours,
            'total_hours'=>$total_hours,
            'rate_per_hour'=>$rate_per_hour,
            'rate_per_hour_old'=>$rate_per_hour_old,
            'mins'=>$mins,
            'daily_rate'=>$daily_rate,
            'salary'=>$salary,
            'basic'=>$basic,
            'emolument'=>$emolument,
            'overload'=>$overload,
            'total_basic_salary'=>$total_basic_salary,
            'absence'=>$absence,
            'total_absence'=>$total_absence,
        ]);
        
        //dd($sample);

        return redirect()->route('PayrollFaculty.index')
        ->withSuccessMessage('Payroll Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payslipDetails = DB::table('hr_employee')
        ->where('emp_pin','=',$id)
        ->get();

        $payslipTable = DB::Table('payslip')
        ->join('payrolltablefaculty','payslip.date','<=','payrolltablefaculty.date_to')
        ->where('admin_approval','=','Approved')
        ->where('employee_id','=',$id)
        ->groupBY('date')
        ->get();


        //dd($payslipTable);

        return view('PayrollFaculty.show',compact('payslipTable','payslipDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FacultyPayroll::where('payrolltablefaculty_id', $id)->delete();
Alert::success('Deleted', 'Payroll Deleted Successfully!');


return redirect()->route('PayrollFaculty.index');
    }
}
