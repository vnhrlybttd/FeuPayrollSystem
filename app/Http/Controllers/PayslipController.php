<?php

namespace App\Http\Controllers;

use App\Payslip;
use App\User;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class PayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $payslip = Payslip::all();
       // dd($payslip);
       return view('payslip.index',compact('payslip'));
       //->with('success','sample');

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$users = DB::table('users')
        //->where('type', 'Admin')
        //->orWhere('type', 'Employee')
        //->get();

        //$dept_name = DB::table('hr_department')->get();
        $names = DB::table('users')
        ->where('type', 'Employee')
        ->get();
        return view('payslip.create',compact('names'));

        
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
            'employee_name' => 'required',
            'date' => 'required'
        ]);

        Payslip::create($request->all());

    

        return redirect()->route('payslip.index')
        ->with('success','Payslip Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('payslip.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editPayslip = Payslip::find($id);

        return view('payslip.edit',compact('editPayslip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payslip $payslip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payslip $id)
    {
        $id->delete();
        return redirect()->route('payslip.index')
                        ->with('success','Payslip Archived Successfully!');
    }
}
