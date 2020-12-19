<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Department;
use App\PayrollUsers;
use App\hr_employee;
use App\Payslip;
use App\NonFacultyPayslipDetails;
use RealRashid\SweetAlert\Facades\Alert;

class PayrollUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        

        $type = [
            'Non-Faculty',
        ];

        $EmployeeDetails = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*'])
        ->whereIn('type',$type)
        ->get();


        $SalaryDetails = NonFacultyPayslipDetails::join('users', 'nonfacultydetails.emp_id', '=', 'users.emp_id')
        ->select(['nonfacultydetails.*','users.*'])
        ->whereIn('type',$type)
        ->get();

     


       //dd($sample);

        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }

        return view('NonFaculty.index',compact('SalaryDetails','EmployeeDetails'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $id)
    {
        //$EmployeeDetails = hr_employee::Find($id);
        //$EmployeeDetails = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        //->select(['hr_employee.*','users.*'])
        //->where('id','=',$id)
        //->get();

        $EmployeeDetails = DB::Table('users')
        ->where('type','=','Non-Faculty')
        ->get();
        

        //dd($EmployeeDetails);
        return view('NonFaculty.create',compact('EmployeeDetails'));
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
            'emp_id' => 'required|unique:nonfacultydetails',  
        ]);

        

        NonFacultyPayslipDetails::create($request->all());

        return redirect()->route('NonFaculty.index')
        ->withSuccessMessage('Salary Detail Added Successfully!');
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
        //$finds = NonFacultyPayslipDetails::find($id);

         // example:
        toast('Press Tab to Compute the Values','info')->autoClose(10000);



        $type = [
            'Non-Faculty',
        ];

        $finds = NonFacultyPayslipDetails::where('non_salary', '=', $id)->first();

        $EmployeeDetails = hr_employee::join('nonfacultydetails', 'hr_employee.emp_pin', '=', 'nonfacultydetails.emp_id')
        ->select(['hr_employee.*','nonfacultydetails.*'])
        ->where('non_salary','=', $id)
        ->get();


        

        //dd($Department);
        return view('NonFaculty.edit',compact('finds','EmployeeDetails'));
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
            'salary' => 'required',
            'daily_rate' => 'required',
            'rate_per_hour' => 'required',
            'mins' => 'required',
            'basic' => 'required',
            'emolument' => 'required',
            'absence' => 'required',
        ]);
  

        $finds = NonFacultyPayslipDetails::find($id);
        $finds->update($request->all());

        return redirect()->route('NonFaculty.index')
        ->withSuccessMessage('Update Salary Details Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
    
}
