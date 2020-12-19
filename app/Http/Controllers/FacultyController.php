<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\User;
use App\PayrollUsers;
use App\hr_employee;
use App\Payslip;
use App\FacultyPayslipDetails;
use RealRashid\SweetAlert\Facades\Alert;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = [
            'Faculty',
        ];

        $EmployeeDetails = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*'])
        ->whereIn('type',$type)
        ->get();

        $SalaryDetails = FacultyPayslipDetails::join('users', 'facultydetails.emp_id', '=', 'users.emp_id')
        ->select(['facultydetails.*','users.*'])
        ->whereIn('type',$type)
        ->get();

   
        if(session('success_message')){
            Alert::success('Success',session('success_message'));
        }

        //dd($SalaryDetails);

        return view('Faculty.index',compact('SalaryDetails','EmployeeDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $EmployeeDetails = DB::Table('users')
        ->where('type','=','Faculty')
        ->get();
        

        //dd($EmployeeDetails);
        return view('Faculty.create',compact('EmployeeDetails'));
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
            'emp_id' => 'required|unique:facultydetails',
        ]);

        FacultyPayslipDetails::create($request->all());

        return redirect()->route('Faculty.index')
        ->withSuccessMessage('Add User Successfully!');
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

      
        toast('Press Tab to Compute the Values','info')->autoClose(10000);

        $editPayslip = DB::Table('facultydetails')
        ->where('faculty_salary' , '=' ,$id)
        ->get();

        $finds = FacultyPayslipDetails::where('faculty_salary', '=', $id)->first();

        $EmployeeDetails = hr_employee::join('facultydetails', 'hr_employee.emp_pin', '=', 'facultydetails.emp_id')
        ->select(['hr_employee.*','facultydetails.*'])
        ->where('faculty_salary','=', $id)
        ->get();



        return view('Faculty.edit',compact('finds','EmployeeDetails'));



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
        $request->validate([
            'load_units' => 'required',
            'laboratory_units' => 'required',
            'laboratory_hours' => 'required',
            'total_hours' => 'required',
            'rate_per_hour' => 'required',
            'rate_per_hour_old' => 'required',
            'mins' => 'required',
            'salary' => 'required',
            'daily_rate' => 'required',
            'basic' => 'required',
            'emolument' => 'required',
            'overload' => 'required',
            'absence' => 'required',
            'total_basic_salary' => 'required',
            'total_absence' => 'required',
        ]);
  

        $finds = FacultyPayslipDetails::find($id);
        $finds->update($request->all());

        return redirect()->route('Faculty.index')
                        ->withSuccessMessage('Updated Salary Details Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
    }
}
