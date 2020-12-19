<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ANFPayroll;
use DB;
use App\Payslip;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;

class ANFPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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


        //dd($table);
        return view ('ANonFacultyPayroll.index',compact('table','tableOne','tableTwo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('ANonFacultyPayroll.create');
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
            'dates' => 'required|unique:anfpayroll',
            'paydate' => 'required',
        ]);

        ANFPayroll::create($request->all());
        return redirect()->route('NonFacultyPayroll.index');
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
        ->where('date','=',Crypt::decrypt($id))
        ->where('admin_approval','=','Approved')
        ->where('type','=','Non-Faculty')
        ->get();

        $tables = DB::table('anfpayroll')
        ->join('payslip','anfpayroll.dates','=','payslip.date')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('date','=',Crypt::decrypt($id))
        ->where('admin_approval','=','Approved')
        ->where('type','=','Faculty')
        ->get();

        $id = Crypt::decrypt($id);
        //dd($table);

       

        //dd($table);
        return view ('ANonFacultyPayroll.show',compact('table','tables','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        $ids = ANFPayroll::where('id', '=', Crypt::decrypt($id))->first();



        return view ('ANonFacultyPayroll.edit',compact('ids'));
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
        $updatePayroll = ANFPayroll::find($id);

       

        $updatePayroll->update($request->all());
        return redirect()->route('NonFacultyPayroll.index');
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
