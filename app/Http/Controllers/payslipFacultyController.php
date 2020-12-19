<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payslip;
use App\User;
use DB;
use App\FacultyPayslipDetails;
use App\NonFacultyPayslipDetails;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;

class payslipFacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$payslip = Payslip::all();
        
        $type = [
            'Faculty',
        ];

        $status = ['Approved','Pending'];
        
        $payslip = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->select(['payslip.*','hr_employee.*','users.*'])
        ->whereIn('type',$type)
        ->whereIn('admin_approval',$status)
        ->orderByDesc('payslip')
        ->get();
        

        //dd($payslip);

        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }


        return view('payslipFaculty.index',compact('payslip'));
        //->with('success','sample');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = [
            'Faculty'
        ];

        $names = DB::table('users')
        ->join('facultydetails','users.emp_id','=','facultydetails.emp_id')
        ->whereIn('type', $type)
        ->get();

        
        return view('payslipFaculty.create',compact('names'));
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
            'employee_id' => 'required',
            'date' => 'required'
        ]);

        Payslip::create($request->all());

       

        return redirect()->route('payslipFaculty.index')
        ->withSuccessMessage('Payslip Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $type = [
            'Faculty',
        ];


        $finds = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->select(['payslip.*','hr_employee.*','users.*'])
        ->whereIn('type',$type)
        ->where('payslip','=', Crypt::decrypt($id))
        ->get();


        return view('payslipFaculty.show',compact('finds'));
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

        $finds = Payslip::where('payslip', '=', Crypt::decrypt($id))->first();
        

        //$editPayslip = FacultyPayslipDetails::join('payslip', 'facultydetails.emp_id', '=', 'payslip.employee_id')
        //->select(['facultydetails.*','payslip.*'])
        //->where('payslip', '=', Crypt::decrypt($id))
        //->get();

        $editPayslip = DB::Table('facultydetails')
        ->join('payslip','payslip.employee_id','=','facultydetails.emp_id')
        ->where('payslip', '=', Crypt::decrypt($id))
        ->get();

        //dd($editPayslip);

        $sss_table = DB::Table('sss_table')
        ->get();

        return view('payslipFaculty.edit',compact('finds','editPayslip','sss_table'));
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
        
       
        $updatePayslip = Payslip::find($id);
        $updatePayslip->update($request->all());
        Alert::success('Update', 'Update Payslip Successfully');
        return redirect()->route('payslipFaculty.index')
        ->withUpdateMessage('Payslip Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            // example:


Payslip::where('payslip', $id)->delete();
Alert::success('Deleted', 'Payslip Delete Successfully!');


return redirect()->route('payslipFaculty.index');
    }
}
