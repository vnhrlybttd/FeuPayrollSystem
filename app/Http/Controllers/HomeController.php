<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\hr_employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $type = [
            'Faculty',
            'Non-Faculty'
        ];

        $count = DB::table('hr_department')->count();
        $employee = DB::table('users')->whereIn('type',$type)->count();

        $endUser = auth()->user()->id;
        $endUsers = auth()->user()->emp_id;

        
        $payslipCount = DB::table('payslip')
        ->join('anfpayroll','payslip.date','=','anfpayroll.dates')
        ->where('admin_approval','=','Approved')
        ->where('admin_approvals','=','Approved')
        ->where('employee_id','=',$endUsers)
        ->count();

        $time = DB::Table('att_punches')
        ->join('hr_employee','att_punches.employee_id','=','hr_employee.id')
        ->select('punch_time')
        ->orderBy('terminal_id','DESC')
        ->where('emp_pin','=',$endUsers)
        ->first();

        //dd($time);

        $anfsdCount = DB::Table('anfsd')
        ->where('admin_approval','=','Pending')
        ->select('admin_approval')
        ->count();


        $payslipAdmin = DB::Table('payslip')
        ->where('admin_approval','=','Pending')
        ->count();

        $reportAdmin = DB::Table('reportsapproval')
        ->where('admin_approval_reports','=','Pending')
        ->count();

        $payrollAdmin = DB::Table('anfpayroll')
        ->where('admin_approvals','=','Pending')
        ->count();
        
       


        //dd($anfsdCount);

        return view('home',compact('count','employee','payslipCount','time','anfsdCount','payslipAdmin','reportAdmin','payrollAdmin'));
    }
}
