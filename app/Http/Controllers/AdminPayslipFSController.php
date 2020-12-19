<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payslip;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;

class AdminPayslipFSController extends Controller
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


        $payslip = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->select(['payslip.*','hr_employee.*','users.*'])
        ->whereIn('type',$type)
        ->where('admin_approval','=','Pending')
        ->orderBy('payslip', 'DESC')
        ->get();

        $approved = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->select(['payslip.*','hr_employee.*','users.*'])
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->orderBy('payslip', 'DESC')
        ->get();

        $rejected = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->select(['payslip.*','hr_employee.*','users.*'])
        ->whereIn('type',$type)
        ->where('admin_approval','=','Rejected')
        ->orderBy('payslip', 'DESC')
        ->get();
        
        //dd($payslip);
       
        return view('FSPayslip.index',compact('payslip','approved','rejected'));
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
        $type = [
            'Faculty',
        ];


        $finds = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->select(['payslip.*','hr_employee.*','users.*'])
        ->whereIn('type',$type)
        ->where('payslip','=', Crypt::decrypt($id))
        ->get();

            //dd($finds);
            return view('FSPayslip.show',compact('finds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finds = Payslip::where('payslip', '=', $id)->first();

        //dd($finds);

        return view('FSPayslip.edit',compact('finds'));
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
        $updates = Payslip::find($id);

        $request->validate([
            'admin_approval' => 'required',
        ]);
    

        $adminapproval = $request->get('admin_approval');

        $updates->update(['admin_approval'=> $adminapproval]);
        
        

        return redirect()->route('FSPayslip.index');
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
