<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Payslip;

class EndUsersPayslipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $endUser = auth()->user()->emp_id;
        $endUsers = auth()->user()->type;

        if($endUsers = auth()->user()->type === "Non-Faculty")
        {
            $payslip = DB::Table('payslip')
            ->join('users','users.emp_id','=','payslip.employee_id')
            ->join('anfpayroll','anfpayroll.dates','=','payslip.date')
            ->where('admin_approvals','=','Approved')
            ->where('admin_approval','=','Approved')
            ->where('employee_id','=',$endUser)
            ->where('type','=','Non-Faculty')
            ->get();
            return view('mypayslips.index',compact('payslip','endUsers'));
        }
        elseif($endUsers = auth()->user()->type === "Faculty"){

            $payslip = DB::Table('payslip')
            ->join('anfpayroll','anfpayroll.dates','=','payslip.date')
            ->join('users','users.emp_id','=','payslip.employee_id')
            ->where('admin_approvals','=','Approved')
            ->where('admin_approval','=','Approved')
            ->where('employee_id','=',$endUser)
            ->where('type','=',"Faculty")
            ->get();

            //dd($payslip);
            return view('mypayslips.index',compact('payslip','endUsers'));

            
        }

        //$payslips = DB::table('payslip')
        //->where('employee_id','=',$endUser)
        //->where('admin_approval','=','Approved')
        //->get();

       

       //dd($endUsers);

        
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
        $payslip = Payslip::find($id)
        ->where('payslip','=',$id)
        ->get();

       


       //dd($try);
        return view('mypayslips.show',compact('payslip'));
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
        //
    }
}
