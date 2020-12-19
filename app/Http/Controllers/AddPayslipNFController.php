<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Payslip;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;


class AddPayslipNFController extends Controller
{
    public function index(){
    
        $pending = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        //->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->select(['payslip.*','hr_employee.*'])
        ->where('type','=','Non-Faculty')
        ->where('admin_approval','=','Pending')
        ->orderBy('payslip', 'DESC')
        ->get();

        $approved = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        //->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->select(['payslip.*','hr_employee.*'])
        ->where('type','=','Non-Faculty')
        ->where('admin_approval','=','Approved')
        ->orderBy('payslip', 'DESC')
        ->get();

        $rejected = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        //->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->select(['payslip.*','hr_employee.*'])
        ->where('type','=','Non-Faculty')
        ->where('admin_approval','=','Rejected')
        ->orderBy('payslip', 'DESC')
        ->get();

        //-------------------------------------------------FACULTY -----------------------------------------//

        $pendingF = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        //->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->select(['payslip.*','hr_employee.*'])
        ->where('type','=','Faculty')
        ->where('admin_approval','=','Pending')
        ->orderBy('payslip', 'DESC')
        ->get();

        $approvedF = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        //->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->select(['payslip.*','hr_employee.*'])
        ->where('type','=','Faculty')
        ->where('admin_approval','=','Approved')
        ->orderBy('payslip', 'DESC')
        ->get();

        $rejectedF = Payslip::join('hr_employee', 'payslip.employee_id', '=', 'hr_employee.emp_pin')
        ->join('users','payslip.employee_id','=','users.emp_id')
        //->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->select(['payslip.*','hr_employee.*'])
        ->where('type','=','Faculty')
        ->where('admin_approval','=','Rejected')
        ->orderBy('payslip', 'DESC')
        ->get();







        //dd($approvedF);

        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }

        return view ('addpayslipNF.index',compact('pending','approved','rejected','pendingF','approvedF','rejectedF'));
    }

    public function stepOne(Request $request){

        $employee = DB::table('hr_employee')
        ->join('users','users.emp_id','=','hr_employee.emp_pin')
        ->where('status','=','1')
        ->orderBY('emp_id','desc')
        ->get();

        $payslip = $request->session()->get('payslip');
        return view ('addpayslipNF.step1',compact('employee','payslip',$payslip));
    }

    public function stepTwo(Request $request){

        $validatedData = $request->validate([
            'employee_id' => 'required',
            'date' => 'required',
        ]);

        $payslip = $request->session()->get('payslip');

        $show = DB::table('att_day_summary')->latest('att_date')->first('att_date');
        //dd($show);
        
       //dd($validatedData);
        
        $empids = $request->get('employee_id');


        $employee = DB::table('hr_employee')
        ->select('emp_pin','emp_firstname','emp_lastname')
        ->where('emp_pin' ,'=',$empids)
        ->get();
        

              //dd($employee);
        if(empty($request->session()->get('payslip'))){
            $payslip = new Payslip();
            $payslip->fill($validatedData);
            $request->session()->put('payslip', $payslip);
            //dd($request);
        }else{
            $payslip = $request->session()->get('payslip');
            $payslip->fill($validatedData);
            $request->session()->put('payslip', $payslip);
            //dd(session()->all());
                }

        return view('addpayslipNF.step2',compact('employee','show'));
    }

    public function stepThree(Request $request){

        $validatedData = $request->validate([
            'recordsFrom' => 'required',
            'recordsTo' => 'required'
        ]);


        
        $payslip = $request->session()->get('payslip');
        
       
        
        $empids = $request->session()->get('payslip')->employee_id;


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

        $employee = DB::table('hr_employee')
        ->select('emp_pin','emp_firstname','emp_lastname')
        ->where('emp_pin' ,'=',$empids)
        ->get();

        $salaryDetails = DB::table('addemployee')
        ->where('emp_id','=',$empids)
        ->get();

        $sss_table = DB::Table('sss_table')
        ->get();

        

        $otOne = DB::Table('att_day_summary')
        ->join('hr_employee','hr_employee.id','=','att_day_summary.employee_id')
        ->whereDate('recordsFrom', '>=', $from)
        ->whereDate('recordsTo', '<=', $to)
        ->where('emp_pin','=',$empids)
        ->select('item_id','item_results','recordsFrom','recordsTo')
        ->where('item_id','=','4')
        //->get();
        ->sum('item_results');

        $otTwo = DB::Table('att_day_summary')
        ->join('hr_employee','hr_employee.id','=','att_day_summary.employee_id')
        ->whereDate('recordsFrom', '>=', $from)
        ->whereDate('recordsTo', '<=', $to)
        ->where('emp_pin','=',$empids)
        ->select('item_id','item_results','recordsFrom','recordsTo')
        ->where('item_id','=','5')
        //->get();
        ->sum('item_results');


        
    


        //$OT->format('d m, Y');

        //dd($OT);


   
        
        if(empty($request->session()->get('payslip'))){
            $payslip = new Payslip();
            $payslip->fill($validatedData);
            $request->session()->put('payslip', $payslip);
            //dd($request);
        }else{
            $payslip = $request->session()->get('payslip');
            $payslip->fill($validatedData);
            $request->session()->put('payslip', $payslip);
            //dd(session()->all());
                }

        return view('addpayslipNF.step3',compact('absentTable','employee','salaryDetails','from','to','sss_table','otOne','otTwo'));
    }


    public function stepFour(Request $request){


         
        $payslip = $request->session()->get('payslip');
        
       
        
        $empids = $request->session()->get('payslip')->employee_id;

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
            'p_taxable_income' => 'required',

            'hidden_absences' => 'required',
            'otOne' => 'required',
            'otTwo' => 'required',
            'pagibig_contri_amt' => 'required',
            'pagibig_contri_add' => 'required',
            'sss_loan_amt' => 'required',
            'sss_loan_add' => 'required',
            'pagibig_loan_amt' => 'required',
            'pagibig_loan_add' => 'required',
    

            ]);

            //dd($validatedData);

            
        
        if(empty($request->session()->get('payslip'))){
            $payslip = new Payslip();
            $payslip->fill($validatedData);
            $request->session()->put('payslip', $payslip);
            //dd($request);
        }else{
            $payslip = $request->session()->get('payslip');
            $payslip->fill($validatedData);
            $request->session()->put('payslip', $payslip);
            //dd(session()->all());
                }
            

        return view('addpayslipNF.step4',compact('employee'));
    }

    public function post(Request $request){

        $payslip = $request->session()->get('payslip');

        $emp_id = $request->session()->get('payslip')->employee_id;
        $date = $request->session()->get('payslip')->date;

       //dd($emp_id);
        $p_basic_pay = $request->session()->get('payslip')->p_basic_pay;
        $p_absences = $request->session()->get('payslip')->p_absences;
        $p_adjustment = $request->session()->get('payslip')->p_adjustment;
        $p_net_basic = $request->session()->get('payslip')->p_net_basic;
        $p_cost_of_living_allowance = $request->session()->get('payslip')->p_cost_of_living_allowance;
        $p_honorarium= $request->session()->get('payslip')->p_honorarium;
        $p_overtime = $request->session()->get('payslip')->p_overtime;
        $p_over_load = $request->session()->get('payslip')->p_over_load;
        $p_others = $request->session()->get('payslip')->p_others;
        $p_hold_salary_pay_out = $request->session()->get('payslip')->p_hold_salary_pay_out;
        $p_total_earnings = $request->session()->get('payslip')->p_total_earnings;

        $p_sss_contribution = $request->session()->get('payslip')->p_sss_contribution;
        $p_philhealth_contribution = $request->session()->get('payslip')->p_philhealth_contribution;
        $p_pagibig_contribution = $request->session()->get('payslip')->p_pagibig_contribution;
        $p_sss_loan = $request->session()->get('payslip')->p_sss_loan;
        $p_pagibig_loan = $request->session()->get('payslip')->p_pagibig_loan;
        $p_tax_withheld = $request->session()->get('payslip')->p_tax_withheld;

        $p_cash_advance = $request->session()->get('payslip')->p_cash_advance;
        $p_retirement_contributon = $request->session()->get('payslip')->p_retirement_contributon;
        $p_christmas_loan = $request->session()->get('payslip')->p_christmas_loan;
        $p_retirement_loan = $request->session()->get('payslip')->p_retirement_loan;
        $p_others_adjustment = $request->session()->get('payslip')->p_others_adjustment;
        $p_others_payable_realty = $request->session()->get('payslip')->p_others_payable_realty;
        $p_total_deductions = $request->session()->get('payslip')->p_total_deductions;
        $p_first_half_pay = $request->session()->get('payslip')->p_first_half_pay;
        $p_second_half_pay = $request->session()->get('payslip')->p_second_half_pay;
        $p_monthly_pay = $request->session()->get('payslip')->p_monthly_pay;
        $p_thirteen_month_pay = $request->session()->get('payslip')->p_thirteen_month_pay;

        $p_total_non_taxable = $request->session()->get('payslip')->p_total_non_taxable;
        $p_taxable_income = $request->session()->get('payslip')->p_taxable_income;

        $recordsFrom = $request->session()->get('payslip')->recordsFrom;
        $recordsTo = $request->session()->get('payslip')->recordsTo;
        $pagibig_contri_amt = $request->session()->get('payslip')->pagibig_contri_amt;
        $pagibig_contri_add = $request->session()->get('payslip')->pagibig_contri_add;
        $sss_loan_amt = $request->session()->get('payslip')->sss_loan_amt;
        $sss_loan_add = $request->session()->get('payslip')->sss_loan_add;
        $pagibig_loan_amt = $request->session()->get('payslip')->pagibig_loan_amt;
        $pagibig_loan_add = $request->session()->get('payslip')->pagibig_loan_add;
        $otOne = $request->session()->get('payslip')->otOne;
        $otTwo = $request->session()->get('payslip')->otTwo;
        $hidden_absences = $request->session()->get('payslip')->hidden_absences;


        $salaryDetails = DB::table('addemployee')
        ->where('emp_id','=',$emp_id)
        ->first();

        $salary = $salaryDetails->salary;
        $daily_rate = $salaryDetails->daily_rate;
        $rate_per_hour = $salaryDetails->rate_per_hour;
        $mins = $salaryDetails->mins;
        $basic = $salaryDetails->basic;
        $emolument = $salaryDetails->emolument;
        $total_basic_salary = $salaryDetails->total_basic_salary;


        $rate_per_hour_old = $salaryDetails->rate_per_hour_old;
        $load_units = $salaryDetails->load_units;
        $additional_hours = $salaryDetails->additional_hours;
        $laboratory_units = $salaryDetails->laboratory_units;
        $laboratory_hours = $salaryDetails->laboratory_hours;
        $total_hours = $salaryDetails->total_hours;
        $overload = $salaryDetails->overload;

      
    
        
        Payslip::create([
            'employee_id' => $emp_id,
           'date' => $date,
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
            'second_status_pay' => '0',

            'recordsFrom' => $recordsFrom,
            'recordsTo' => $recordsTo,
            'pagibig_contri_amt' => $pagibig_contri_amt,
            'pagibig_contri_add' => $pagibig_contri_add,
            'sss_loan_amt' => $sss_loan_amt,
            'sss_loan_add' => $sss_loan_add,
            'pagibig_loan_amt' => $pagibig_loan_amt,
            'pagibig_loan_add' => $pagibig_loan_add,
            'otOne' => $otOne,
            'otTwo' => $otTwo,
            'hidden_absences' => $hidden_absences,
            'a_salary' => $salary,
            'a_daily_rate' => $daily_rate,
            'a_rate_per_hour' => $rate_per_hour,
            'a_mins'=> $mins,
            'a_basic'=> $basic,
            'a_emolument'=> $emolument,
            'a_total_basic_salary'=> $total_basic_salary,

            'a_rate_per_hour_old'=> $rate_per_hour_old,
            'a_load_units'=> $load_units,
            'a_laboratory_total_units'=> $laboratory_units,
            'a_laboratory_total_hours'=> $laboratory_hours,
            'a_total_hours'=> $total_hours,
            'a_overload'=> $overload,
            'a_additional_hours' =>$additional_hours,
            ]);


            //dd($salary);

        


        return redirect()->action('AddPayslipNFController@index')
        ->withSuccessMessage('Payroll Computation Added Successfully!');
    }


    public function editPayslipNF($id){

        $find = Payslip::find(Crypt::decrypt($id));

        $emp_id = $find->employee_id;
        $sss_table = DB::table('sss_table')
        ->get();

        $employee = DB::table('hr_employee')
        ->select('emp_pin','emp_firstname','emp_lastname')
        ->where('emp_pin' ,'=',$emp_id)
        ->get();

        //dd($employee);

        return view('addpayslipNF.editNF',compact('find','sss_table' ,'employee'));
    }

    public function postPayslipNF(Request $request , $id){


        $finds = Payslip::find($id);
        $finds->update($request->all());

        return redirect()->action('AddPayslipNFController@index')
        ->withSuccessMessage('Computation Updated Successfully!');

    }

    //-----------------------------

    public function editPayslipF($id){

        $find = Payslip::find(Crypt::decrypt($id));

        $emp_id = $find->employee_id;
        $sss_table = DB::table('sss_table')
        ->get();

        $employee = DB::table('hr_employee')
        ->select('emp_pin','emp_firstname','emp_lastname')
        ->where('emp_pin' ,'=',$emp_id)
        ->get();

        return view('addpayslipNF.editF',compact('find','sss_table' ,'employee'));
    }

    public function postPayslipF(Request $request , $id){


        $finds = Payslip::find($id);
        $finds->update($request->all());
        $finds->update(['admin_approval' => 'Pending']);

        return redirect()->action('AddPayslipNFController@index')
        ->withSuccessMessage('Computation Updated Successfully!');

    }















}
