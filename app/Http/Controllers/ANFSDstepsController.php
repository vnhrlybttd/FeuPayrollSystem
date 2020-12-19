<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ANFSD;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ANFSDstepsController extends Controller
{
    public function index(){

        $table = ANFSD::join('users','users.emp_id','=','anfsd.emp_id')
        ->get();

        //dd($table);
        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }

        return view ('ANonFacultySD.index',compact('table'));
    }
    public function create(Request $request){

        $employee = DB::table('hr_employee')
        ->join('users','hr_employee.emp_pin','=','users.emp_id')
        ->select('emp_pin','emp_firstname','emp_lastname','type')
        ->where('type','=','Non-Faculty')
        ->get();

        //dd($employee);

        $anfsd = $request->session()->get('anfsd');
        return view ('ANonFacultySD.create',compact('anfsd', $anfsd,'employee'));
    }
    public function stepTwo(Request $request){

        //FOR GETTING NAMES!!--------------------------------------------------------

        $validatedData = $request->validate([
            'emp_id' => 'required',
            'date' => 'required'
        ]);

        $emp_id = $request->get('emp_id');


            $employee = DB::table('hr_employee')
            ->select('emp_pin','emp_firstname','emp_lastname')
            ->where('emp_pin' ,'=',$emp_id)
            ->get();

     
    


       

        

        if(empty($request->session()->get('anfsd'))){
            $anfsd = new ANFSD();
            $anfsd->fill($validatedData);
            $request->session()->put('anfsd', $anfsd);
            //dd($request);
        }else{
            $anfsd = $request->session()->get('anfsd');
            $anfsd->fill($validatedData);
            $request->session()->put('anfsd', $anfsd,'employee');
            //dd(session()->all());
                }

        return view('ANonFacultySD.create-step1',compact('employee'));
     

       

    }
    public function StepThree(Request $request){
    
        $anfsd = $request->session()->get('anfsd');

        
        $emp_id = $request->session()->get('anfsd')->emp_id;

        $employee = DB::table('hr_employee')
        ->select('emp_pin','emp_firstname','emp_lastname')
        ->where('emp_pin' ,'=',$emp_id)
        ->get();
        

        $validatedData = $request->validate([
            'salary' => 'required',
            'daily_rate' => 'required',
            'rate_per_hour' => 'required',
            'mins' => 'required',
            'basic' => 'required',
            'emolument' => 'required',
            'total_basic_salary' => 'required'
        ]);

        if(empty($request->session()->get('anfsd'))){
            $anfsd = new ANFSD();
            $anfsd->fill($validatedData);
            $request->session()->put('anfsd', $anfsd);
            //dd($request);
            return back();
        }else{
            $anfsd = $request->session()->get('anfsd');
            $anfsd->fill($validatedData);
            $request->session()->put('anfsd', $anfsd);
            //dd(session()->all());
        }
        
        return view('ANonFacultySD.create-step2',compact('employee'));
        
    }

    public function StepFour(Request $request){

        $anfsd = $request->session()->get('anfsd');

        
        $empids = $request->session()->get('anfsd')->emp_id;

        $employee = DB::table('hr_employee')
        ->select('emp_pin','emp_firstname','emp_lastname')
        ->where('emp_pin' ,'=',$empids)
        ->get();
        
        $sss_table = DB::Table('sss_table')
        ->get();

        $validatedData = $request->validate([
            'recordsFrom' => 'required',
            'recordsTo' => 'required'
        ]);

        $from = $request->get('recordsFrom');
        $to = $request->get('recordsTo');

        $whereNumbers = [
            '7','9'
        ];

        $absentTable = DB::Table('att_day_summary')
        ->join('hr_employee','hr_employee.id','=','att_day_summary.employee_id')
        ->whereDate('recordsFrom', '>=', $from)
        ->whereDate('recordsTo', '<=', $to)
        ->where('emp_pin','=',$empids)
        ->select('item_id','item_results')
        ->whereIn('item_id',$whereNumbers)
        //->get();
        ->sum('item_results');

        
        if(empty($request->session()->get('anfsd'))){
            $anfsd = new ANFSD();
            $anfsd->fill($validatedData);
            $request->session()->put('anfsd', $anfsd);
            //dd($request);
            return back();
        }else{
            $anfsd = $request->session()->get('anfsd');
            $anfsd->fill($validatedData);
            $request->session()->put('anfsd', $anfsd);
            //dd(session()->all());
        }

        return view('ANonFacultySD.create-step3',compact('absentTable','employee','sss_table','from','to'));
      
    }

    public function StepFive(Request $request){

        $anfsd = $request->session()->get('anfsd');
        $empids = $request->session()->get('anfsd')->emp_id;

        $employee = DB::table('hr_employee')
        ->select('emp_pin','emp_firstname','emp_lastname')
        ->where('emp_pin' ,'=',$empids)
        ->get();
    


        $validatedData = $request->validate([
        'p_basic_pay' => 'required',
        'p_absences' => 'required',
        'p_adjustment' => 'required',
        'p_net_basic' => 'required',
        'p_cost_of_living_allowance' => 'required',
        'p_honorarium' => 'required',
        'p_overtime' => 'required',
        'p_over_load' => 'required',
        'p_others' => 'required',
        'p_hold_salary_pay_out' => 'required',
        'p_total_earnings' => 'required',
        //Deductions
        'p_sss_contribution' => 'required',
        'p_philhealth_contribution' => 'required',
        'p_pagibig_contribution' => 'required',
        'p_sss_loan' => 'required',
        'p_pagibig_loan' => 'required',
        'p_tax_withheld' => 'required',
        'p_cash_advance' => 'required',
        'p_retirement_contributon' => 'required',
        'p_christmas_loan' => 'required',
        'p_retirement_loan' => 'required',
        'p_others_adjustment' => 'required',
        'p_others_payable_realty' => 'required',
        'p_total_deductions' => 'required',

        //Net Pay
        'p_first_half_pay' => 'required',
        'p_second_half_pay' => 'required',
        'p_monthly_pay' => 'required',
        'p_thirteen_month_pay' => 'required',

        //tax
        'p_total_non_taxable' => 'required',
        'p_taxable_income' => 'required'

        ]);
        //dd($validatedData);

        if(empty($request->session()->get('anfsd'))){
            $anfsd = new ANFSD();
            $anfsd->fill($validatedData);
            $request->session()->put('anfsd', $anfsd);
            //dd($request);
            //return back();
        }else{
            $anfsd = $request->session()->get('anfsd');
            $anfsd->fill($validatedData);
            $request->session()->put('anfsd', $anfsd);
            //dd(session()->all());
        }

        return view('ANonFacultySD.create-step4',compact('employee'));
    }

    public function postNF(Request $request){

        $anfsd = $request->session()->get('anfsd');

        $emp_id = $request->session()->get('anfsd')->emp_id;
        $date = $request->session()->get('anfsd')->date;
        $salary = $request->session()->get('anfsd')->salary;
        $daily_rate = $request->session()->get('anfsd')->daily_rate;
        $rate_per_hour = $request->session()->get('anfsd')->rate_per_hour;
        $mins = $request->session()->get('anfsd')->mins;
        $basic = $request->session()->get('anfsd')->basic;
        $emolument = $request->session()->get('anfsd')->emolument;
        $total_basic_salary = $request->session()->get('anfsd')->total_basic_salary;

        $p_basic_pay = $request->session()->get('anfsd')->p_basic_pay;
        $p_absences = $request->session()->get('anfsd')->p_absences;
        $p_adjustment = $request->session()->get('anfsd')->p_adjustment;
        $p_net_basic = $request->session()->get('anfsd')->p_net_basic;
        $p_cost_of_living_allowance = $request->session()->get('anfsd')->p_cost_of_living_allowance;
        $p_honorarium= $request->session()->get('anfsd')->p_honorarium;
        $p_overtime = $request->session()->get('anfsd')->p_overtime;
        $p_over_load = $request->session()->get('anfsd')->p_over_load;
        $p_others = $request->session()->get('anfsd')->p_others;
        $p_hold_salary_pay_out = $request->session()->get('anfsd')->p_hold_salary_pay_out;
        $p_total_earnings = $request->session()->get('anfsd')->p_total_earnings;

        $p_sss_contribution = $request->session()->get('anfsd')->p_sss_contribution;
        $p_philhealth_contribution = $request->session()->get('anfsd')->p_philhealth_contribution;
        $p_pagibig_contribution = $request->session()->get('anfsd')->p_pagibig_contribution;
        $p_sss_loan = $request->session()->get('anfsd')->p_sss_loan;
        $p_pagibig_loan = $request->session()->get('anfsd')->p_pagibig_loan;
        $p_tax_withheld = $request->session()->get('anfsd')->p_tax_withheld;

        $p_cash_advance = $request->session()->get('anfsd')->p_cash_advance;
        $p_retirement_contributon = $request->session()->get('anfsd')->p_retirement_contributon;
        $p_christmas_loan = $request->session()->get('anfsd')->p_christmas_loan;
        $p_retirement_loan = $request->session()->get('anfsd')->p_retirement_loan;
        $p_others_adjustment = $request->session()->get('anfsd')->p_others_adjustment;
        $p_others_payable_realty = $request->session()->get('anfsd')->p_others_payable_realty;
        $p_total_deductions = $request->session()->get('anfsd')->p_total_deductions;
        $p_first_half_pay = $request->session()->get('anfsd')->p_first_half_pay;
        $p_second_half_pay = $request->session()->get('anfsd')->p_second_half_pay;
        $p_monthly_pay = $request->session()->get('anfsd')->p_monthly_pay;
        $p_thirteen_month_pay = $request->session()->get('anfsd')->p_thirteen_month_pay;

        $p_total_non_taxable = $request->session()->get('anfsd')->p_total_non_taxable;
        $p_taxable_income = $request->session()->get('anfsd')->p_taxable_income;




        ANFSD::create([
        'emp_id' => $emp_id,
       'date' => $date,
       'salary' => $salary,
        'daily_rate' => $daily_rate,
        'rate_per_hour' => $rate_per_hour,
        'mins'=> $mins,
        'basic'=> $basic,
        'emolument'=> $emolument,
        'total_basic_salary'=> $total_basic_salary,
        //'absence',
        //'total_absence',
        //Earnings
        'p_basic_pay'=> $p_basic_pay,
        'p_absences'=> $p_absences,
        'p_adjustment'=> $p_adjustment,
        'p_net_basic'=> $p_net_basic,
        'p_cost_of_living_allowance'=> $p_cost_of_living_allowance,
        'p_honorarium'=> $p_honorarium,
        'p_overtime'=> $p_overtime,
        'p_over_load'=> $p_over_load,
        'p_others'=> $p_others,
        'p_hold_salary_pay_out'=> $p_hold_salary_pay_out,
        'p_total_earnings'=> $p_total_earnings,
        //Deductions
        'p_sss_contribution' => $p_sss_contribution,
        'p_philhealth_contribution'=> $p_philhealth_contribution,
        'p_pagibig_contribution'=> $p_pagibig_contribution,
        'p_sss_loan'=> $p_sss_loan,
        'p_pagibig_loan'=> $p_pagibig_loan,
        'p_tax_withheld'=> $p_tax_withheld,
        'p_cash_advance'=> $p_cash_advance,
        'p_retirement_contributon'=> $p_retirement_contributon,
        'p_christmas_loan'=> $p_christmas_loan,
        'p_retirement_loan'=> $p_retirement_loan,
        'p_others_adjustment'=> $p_others_adjustment,
        'p_others_payable_realty'=> $p_others_payable_realty,
        'p_total_deductions'=> $p_total_deductions,

        //Net Pay
        'p_first_half_pay' => $p_first_half_pay,
        'p_second_half_pay' => $p_second_half_pay,
        'p_monthly_pay' => $p_monthly_pay,
        'p_thirteen_month_pay' => $p_thirteen_month_pay,

        //tax
        'p_total_non_taxable'=> $p_total_non_taxable,
        'p_taxable_income'=> $p_taxable_income,
        'admin_approval' => 'Pending',
        'first_status_pay' => '0',
        'second_status_pay' => '0'
        ]);
        

        return redirect()->action('ANFSDstepsController@index')
        ->withSuccessMessage('Added Successfully!');
    }

}
