<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class PayrollApprovalController extends Controller
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

        $table = DB::table('anfpayroll')
        ->orderBY('id','DESC')
        ->where('admin_approvals','=','Pending')
        ->get();

        $tableOne = DB::table('anfpayroll')
        ->orderBY('id','DESC')
        ->where('admin_approvals','=','Approved')
        ->get();

        $tableTwo = DB::table('anfpayroll')
        ->orderBY('id','DESC')
        ->where('admin_approvals','=','Rejected')
        ->get();


        return view('PayrollApproval.index',compact('table','tableOne','tableTwo'));
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
        $table = DB::table('anfpayroll')
        ->join('payslip','anfpayroll.dates','=','payslip.date')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('date','=',$id)
        ->where('admin_approval','=','Approved')
        ->where('type','=','Non-Faculty')
        ->get();

        $tables = DB::table('anfpayroll')
        ->join('payslip','anfpayroll.dates','=','payslip.date')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('date','=',$id)
        ->where('admin_approval','=','Approved')
        ->where('type','=','Faculty')
        ->get();

        return view('PayrollApproval.show',compact('table','tables','id'));
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
