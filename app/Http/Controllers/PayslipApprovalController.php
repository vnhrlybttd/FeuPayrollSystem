<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Payslip;

class PayslipApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(session('success_message')){
            //Alert::success('Succcess',session('success_message'));
            toast(session('success_message'),'success');
        }

        $pending = DB::table('payslip')
        ->where('admin_approval','=','Pending')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('type','=','Non-Faculty')
        ->orderBY('payslip','desc')
        ->get();

        $approved = DB::table('payslip')
        ->where('admin_approval','=','Approved')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('type','=','Non-Faculty')
        ->orderBY('payslip','desc')
        ->get();

        $rejected = DB::table('payslip')
        ->where('admin_approval','=','Rejected')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('type','=','Non-Faculty')
        ->orderBY('payslip','desc')
        ->get();

        $pendingF = DB::table('payslip')
        ->where('admin_approval','=','Pending')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('type','=','Faculty')
        ->orderBY('payslip','desc')
        ->get();

        $approvedF = DB::table('payslip')
        ->where('admin_approval','=','Approved')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('type','=','Faculty')
        ->orderBY('payslip','desc')
        ->get();

        $rejectedF = DB::table('payslip')
        ->where('admin_approval','=','Rejected')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('type','=','Faculty')
        ->orderBY('payslip','desc')
        ->get();


        //dd($pending);
        return view('PayslipApproval.index',compact('pending','approved','rejected','pendingF','approvedF','rejectedF'));
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
