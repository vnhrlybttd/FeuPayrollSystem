<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\NonFacultyPayroll;
use App\NonFacultyPayslipDetails;
use RealRashid\SweetAlert\Facades\Alert;

class NonFacultyPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $Table = DB::Table('payrolltablenonfaculty')
        ->join('hr_employee','hr_employee.emp_pin','=','payrolltablenonfaculty.emp_id')
        ->get();

        //dd($Table);  

        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }

        return view('payrollnonfaculty.index',compact('Table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $nonfacultydetails = DB::Table('nonfacultydetails')
        ->join('hr_employee','nonfacultydetails.emp_id','=','hr_employee.emp_pin')
        ->get();

        //dd($nonfacultydetails);

        return view('PayrollNonFaculty.create',compact('nonfacultydetails'));
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

       
        
        $TableValue = NonFacultyPayslipDetails::where('emp_id','=',$getEmpid)
        ->select('emp_id','salary','daily_rate','rate_per_hour','mins','basic','emolument','total_basic_salary','absence','total_absence')
        ->first();

       $emp_id =  $TableValue->emp_id;
       $salary =  $TableValue->salary;
       $daily_rate =  $TableValue->daily_rate;
       $rate_per_hour =  $TableValue->rate_per_hour;
       $mins =  $TableValue->mins;
       $basic =  $TableValue->basic;
       $emolument =  $TableValue->emolument;
       $total_basic_salary =  $TableValue->total_basic_salary;
       $absence =  $TableValue->absence;
       $total_absence =  $TableValue->total_absence;

        
        
        $sample = NonFacultyPayroll::create([
            'date_from'=>$date_from,
            'date_to'=>$date_to,
            'emp_id'=>$emp_id,
            'salary'=>$salary,
            'daily_rate'=>$daily_rate,
            'rate_per_hour'=>$rate_per_hour,
            'mins'=>$mins,
            'basic'=>$basic,
            'emolument'=>$emolument,
            'total_basic_salary'=>$total_basic_salary,
            'absence'=>$absence,
            'total_absence'=>$total_absence
        ]);
        
        //dd($sample);

        return redirect()->route('PayrollNonFaculty.index')
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
        ->join('payrolltablenonfaculty','payslip.date','<=','payrolltablenonfaculty.date_to')
        ->where('admin_approval','=','Approved')
        ->where('employee_id','=',$id)
        ->groupBY('date')
        ->get();


        //dd($payslipTable);

        return view('PayrollNonFaculty.show',compact('payslipTable','payslipDetails'));
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
        NonFacultyPayroll::where('payrolltablenonfaculty_id', $id)->delete();
        Alert::success('Deleted', 'Payroll Deleted Successfully!');
        
        
        return redirect()->route('PayrollNonFaculty.index');
    }
}
