<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\addEmployee;
use App\User;
use App\Payslip;
use App\reportsapproval;
use Illuminate\Support\Facades\Crypt;

class ReportsController extends Controller
{
    public function index(){

        $pending = DB::table('reportsapproval')
        ->where('admin_approval_reports','=','Pending')
        ->get();

        $approved = DB::table('reportsapproval')
        ->where('admin_approval_reports','=','Approved')
        ->get();

        $rejected = DB::table('reportsapproval')
        ->where('admin_approval_reports','=','Rejected')
        ->get();

        return view('areportsmodule.index',compact('pending','approved','rejected'));
    }

    public function monthly(Request $request){

        $reportsapproval = $request->session()->get('reportsapproval');
        return view('areportsmodule.monthly',compact('reportsapproval',$reportsapproval));
    }

    public function payrollentry(Request $request){

        $reportsapproval = $request->session()->get('reportsapproval');
        return view('areportsmodule.payrollentry');
    }

    public function wittholdingtax(Request $request){

        $reportsapproval = $request->session()->get('reportsapproval');
        return view('areportsmodule.wittholdingtax',compact('reportsapproval',$reportsapproval));
    }

    public function monthlyStep1(Request $request){

        $validatedData = $request->validate([
            'date' => 'required',
            'report_name' => 'required'
        ]);

        $dates = $request->get('date');
        $report_name = $request->get('report_name');

        $reportsapproval = $request->session()->get('reportsapproval');
      

        $types = ['Non-Faculty','Faculty'];

        //dd($reportsapproval);

        $bsd = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->select('emp_pin','emp_firstname','emp_lastname','a_daily_rate','a_rate_per_hour','a_mins','a_salary','p_thirteen_month_pay','a_basic','a_emolument','a_total_basic_salary')
        ->get();

       //SALARY DETAILS
       $salary = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('a_salary');

       $p_thirteen_month_pay = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_thirteen_month_pay');

       $basic = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('a_basic');

       $emolument = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('a_emolument');

       $total_basic_salary = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('a_total_basic_salary');
       //-------------------------------------------------------------//


       $earnings = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->select('emp_pin','emp_firstname','emp_lastname','p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium','p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings')
       ->get();

       $p_basic_pay = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_basic_pay');

        $p_absences = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_absences');

       $p_adjustment = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_adjustment');

       $p_net_basic = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_net_basic');

       $p_cost_of_living_allowance = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_cost_of_living_allowance');

       $p_honorarium = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_honorarium');

       $p_overtime = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_overtime');

       $p_over_load = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_over_load');

       $p_others = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_others');

       $p_hold_salary_pay_out = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_hold_salary_pay_out');

       $p_total_earnings = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_total_earnings');

       //------------------------------------------------------------------//

       $deductions = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->select('emp_pin','emp_firstname','emp_lastname','p_sss_contribution','p_philhealth_contribution','p_pagibig_contribution','p_sss_loan','p_pagibig_loan','p_tax_withheld','p_cash_advance','p_retirement_contributon','p_christmas_loan','p_retirement_loan','p_others_adjustment','p_others_payable_realty','p_total_deductions','p_total_non_taxable','p_taxable_income')
       ->get();

       $p_sss_contribution = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_sss_contribution');

       $p_philhealth_contribution = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_philhealth_contribution');

       $p_pagibig_contribution = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_pagibig_contribution');

       $p_sss_loan = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_sss_loan');

       $p_pagibig_loan = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_pagibig_loan');

       $p_tax_withheld = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_tax_withheld');

       $p_cash_advance = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_cash_advance');

       $p_retirement_contributon = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_retirement_contributon');

       $p_christmas_loan = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_christmas_loan');

       $p_retirement_loan = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_retirement_loan');

       $p_others_adjustment = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_others_adjustment');

       $p_others_payable_realty = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_others_payable_realty');

       $p_total_deductions = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_total_deductions');

       $p_taxable_income = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_taxable_income');

       $p_total_non_taxable = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_total_non_taxable');

       $p_monthly_pay = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_monthly_pay');

       
       $p_first_half_pay = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_first_half_pay');

       
       $p_second_half_pay = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_second_half_pay');

     

       $month = Payslip::where('date','=',$dates)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->select('emp_pin','emp_firstname','emp_lastname','p_monthly_pay','p_first_half_pay','p_second_half_pay')
       ->get();

       
  


       if(empty($request->session()->get('reportsapproval'))){
        $reportsapproval = new reportsapproval();
        $reportsapproval->fill($validatedData);
        $request->session()->put('reportsapproval', $reportsapproval);
        //dd($request);
        }else{
        $reportsapproval = $request->session()->get('reportsapproval');
        $reportsapproval->fill($validatedData);
        $request->session()->put('reportsapproval', $reportsapproval,'reportsapproval');
        //dd(session()->all());
        }


        return view('areportsmodule.monthlyStep1',compact('bsd','dates','report_name','reportsapproval',
        'salary','p_thirteen_month_pay','basic','emolument','total_basic_salary',
        'earnings',
        'p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium','p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings',
        'deductions',
        'p_sss_contribution','p_philhealth_contribution','p_pagibig_contribution','p_sss_loan','p_pagibig_loan','p_tax_withheld','p_cash_advance','p_retirement_contributon','p_christmas_loan','p_retirement_loan','p_others_adjustment','p_others_payable_realty','p_total_deductions','p_total_non_taxable','p_taxable_income',
    'p_monthly_pay','p_first_half_pay','p_second_half_pay','month'));
    }

    public function monthlyStep2(Request $request){

        $reportsapproval = $request->session()->get('reportsapproval');
        
        $date = $request->session()->get('reportsapproval')->date;
        $report_name = $request->session()->get('reportsapproval')->report_name;

        reportsapproval::create([
            'date' => $date,
            'report_name' => $report_name
        ]);
        

        //dd($reportsapproval);
        return redirect()->action('ReportsController@index');
    }




    public function PayrollEntryStep1(Request $request){

        
        $validatedData = $request->validate([
            'date' => 'required',
            'report_name' => 'required'
        ]);

        $dates = $request->get('date');
        $report_name = $request->get('report_name');

        $reportsapproval = $request->session()->get('reportsapproval');

        $type = [
            'Non-Faculty','Faculty'
        ];

        $types = [
            'Full-Time','Part-Time'
        ];

        $BasicFT = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Full-Time')
        ->groupBY('cost_center')
        ->selectRaw('sum(a_basic) as sum, cost_center')
        ->get();

        $BasicPT = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Part-Time')
        ->groupBY('cost_center')
        ->selectRaw('sum(a_basic) as sum, cost_center')
        ->get();


        $otherParts = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->whereIn('employment_status',$types)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->selectRaw('cost_center,
        sum(p_cost_of_living_allowance) as p_cost_of_living_allowance, 
        sum(p_honorarium) as p_honorarium, 
        sum(p_overtime) as p_overtime, 
        sum(a_emolument) as a_emolument, 
        sum(p_hold_salary_pay_out) as p_hold_salary_pay_out, 
        sum(p_others_payable_realty) as p_others_payable_realty, 
        sum(p_sss_contribution) as p_sss_contribution, 
        sum(p_philhealth_contribution) as p_philhealth_contribution, 
        sum(p_pagibig_contribution) as p_pagibig_contribution, 
        sum(p_retirement_contributon) as p_retirement_contributon, 
        sum(p_retirement_loan) as p_retirement_loan, 
        sum(p_sss_loan) as p_sss_loan, 
        sum(p_tax_withheld) as p_tax_withheld, 
        sum(p_cash_advance) as p_cash_advance, 
        sum(p_pagibig_loan) as p_pagibig_loan
        


        ')
        ->get();


        $topfooter  = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->whereIn('employment_status',$types)
        ->where('admin_approval','=','Approved')
        ->selectRaw('cost_center, 
        sum(a_basic + p_cost_of_living_allowance + p_honorarium + p_overtime + a_emolument + p_hold_salary_pay_out) as grand_total')
        ->get();





        $footer  = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->whereIn('employment_status',$types)
        ->where('admin_approval','=','Approved')
        ->selectRaw('cost_center, 
        sum(p_sss_contribution + p_philhealth_contribution + p_pagibig_contribution + p_retirement_contributon + p_retirement_loan + p_sss_loan + p_tax_withheld + p_cash_advance + p_pagibig_loan) as grand_total')
        ->get();





        if(empty($request->session()->get('reportsapproval'))){
            $reportsapproval = new reportsapproval();
            $reportsapproval->fill($validatedData);
            $request->session()->put('reportsapproval', $reportsapproval);
            //dd($request);
            }else{
            $reportsapproval = $request->session()->get('reportsapproval');
            $reportsapproval->fill($validatedData);
            $request->session()->put('reportsapproval', $reportsapproval,'reportsapproval');
            //dd(session()->all());
            }



            return view ('areportsmodule.payrollentryStep1',compact('BasicFT','BasicPT','dates','otherParts','topfooter','footer'));

    }


    public function PayrollEntryStep2(Request $request){

        $reportsapproval = $request->session()->get('reportsapproval');
        
        $date = $request->session()->get('reportsapproval')->date;
        $report_name = $request->session()->get('reportsapproval')->report_name;

        reportsapproval::create([
            'date' => $date,
            'report_name' => $report_name
        ]);
        

        //dd($reportsapproval);
        return redirect()->action('ReportsController@index');
    }


    public function wittholdingtaxStep1(Request $request){

        $validatedData = $request->validate([
            'date' => 'required',
            'report_name' => 'required'
        ]);

        $dates = $request->get('date');
        $report_name = $request->get('report_name');

        $reportsapproval = $request->session()->get('reportsapproval');

        $types = ['Non-Faculty','Faculty'];

        $payslip = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->get();

        $payslipFull = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Full-Time')
        ->get();

        $payslipPart = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Part-Time')
        ->get();

//SUMS-----------------------------------------------------

$p_basic_pay = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_basic_pay');

$p_absences = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_absences');


$p_adjustment = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_adjustment');

$p_net_basic = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_net_basic');

$p_cost_of_living_allowance = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_cost_of_living_allowance');


$p_honorarium = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_honorarium');

$p_over_load = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_over_load');

$p_overtime = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_overtime');

$p_others = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_others');

$p_hold_salary_pay_out = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_hold_salary_pay_out');

$p_total_earnings = Payslip::where('date','=',$dates)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_total_earnings');



        $p_total_non_taxable = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->sum('p_total_non_taxable');

        $p_taxable_income = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->sum('p_taxable_income');

        $p_tax_withheld = Payslip::where('date','=',$dates)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->sum('p_tax_withheld');


        if(empty($request->session()->get('reportsapproval'))){
            $reportsapproval = new reportsapproval();
            $reportsapproval->fill($validatedData);
            $request->session()->put('reportsapproval', $reportsapproval);
            //dd($request);
            }else{
            $reportsapproval = $request->session()->get('reportsapproval');
            $reportsapproval->fill($validatedData);
            $request->session()->put('reportsapproval', $reportsapproval,'reportsapproval');
            //dd(session()->all());
            }


        return view ('areportsmodule.wittholdingtaxStep1',compact('dates','payslip','payslipFull','payslipPart','p_total_non_taxable','p_taxable_income','p_tax_withheld','p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium','p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings'));

    }


    public function wittholdingtaxStep2(Request $request){


        $reportsapproval = $request->session()->get('reportsapproval');
        
        $date = $request->session()->get('reportsapproval')->date;
        $report_name = $request->session()->get('reportsapproval')->report_name;

        reportsapproval::create([
            'date' => $date,
            'report_name' => $report_name
        ]);
        

        //dd($reportsapproval);
        return redirect()->action('ReportsController@index');

    }








    public function monthlyShow($id){

        $id = Crypt::decrypt($id);

        $types = ['Non-Faculty','Faculty'];


        
        $bsd = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->select('emp_pin','emp_firstname','emp_lastname','a_daily_rate','a_rate_per_hour','a_mins','a_salary','p_thirteen_month_pay','a_basic','a_emolument','a_total_basic_salary')
        ->get();

       //SALARY DETAILS
       $salary = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('a_salary');

       $p_thirteen_month_pay = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_thirteen_month_pay');

       $basic = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('a_basic');

       $emolument = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('a_emolument');

       $total_basic_salary = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('a_total_basic_salary');
       //-------------------------------------------------------------//


       $earnings = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->select('emp_pin','emp_firstname','emp_lastname','p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium','p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings')
       ->get();

       $p_basic_pay = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_basic_pay');

        $p_absences = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_absences');

       $p_adjustment = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_adjustment');

       $p_net_basic = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_net_basic');

       $p_cost_of_living_allowance = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_cost_of_living_allowance');

       $p_honorarium = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_honorarium');

       $p_overtime = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_overtime');

       $p_over_load = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_over_load');

       $p_others = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_others');

       $p_hold_salary_pay_out = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_hold_salary_pay_out');

       $p_total_earnings = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_total_earnings');

       //------------------------------------------------------------------//

       $deductions = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->select('emp_pin','emp_firstname','emp_lastname','p_sss_contribution','p_philhealth_contribution','p_pagibig_contribution','p_sss_loan','p_pagibig_loan','p_tax_withheld','p_cash_advance','p_retirement_contributon','p_christmas_loan','p_retirement_loan','p_others_adjustment','p_others_payable_realty','p_total_deductions','p_total_non_taxable','p_taxable_income')
       ->get();

       $p_sss_contribution = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_sss_contribution');

       $p_philhealth_contribution = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_philhealth_contribution');

       $p_pagibig_contribution = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_pagibig_contribution');

       $p_sss_loan = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_sss_loan');

       $p_pagibig_loan = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_pagibig_loan');

       $p_tax_withheld = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_tax_withheld');

       $p_cash_advance = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_cash_advance');

       $p_retirement_contributon = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_retirement_contributon');

       $p_christmas_loan = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_christmas_loan');

       $p_retirement_loan = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_retirement_loan');

       $p_others_adjustment = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_others_adjustment');

       $p_others_payable_realty = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_others_payable_realty');

       $p_total_deductions = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_total_deductions');

       $p_total_non_taxable = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_total_non_taxable');

       $p_taxable_income = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_taxable_income');

       $p_monthly_pay = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_monthly_pay');

       
       $p_first_half_pay = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_first_half_pay');

       
       $p_second_half_pay = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->sum('p_second_half_pay');

       $month = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$types)
       ->where('admin_approval','=','Approved')
       ->select('emp_pin','emp_firstname','emp_lastname','p_monthly_pay','p_first_half_pay','p_second_half_pay')
       ->get();


        return view('areportsmodule.monthlyshow',compact('bsd','id',
        'salary','p_thirteen_month_pay','basic','emolument','total_basic_salary',
        'earnings',
        'p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium','p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings',
        'deductions',
        'p_sss_contribution','p_philhealth_contribution','p_pagibig_contribution','p_sss_loan','p_pagibig_loan','p_tax_withheld','p_cash_advance','p_retirement_contributon','p_christmas_loan','p_retirement_loan','p_others_adjustment','p_others_payable_realty','p_total_deductions','p_total_non_taxable','p_taxable_income'
    ,'p_monthly_pay','p_first_half_pay','p_second_half_pay','month'));
    }

    public function payrollentryShow($id){

        $id = Crypt::decrypt($id);

        $type = [
            'Non-Faculty','Faculty'
        ];

        $types = [
            'Full-Time','Part-Time'
        ];

        $BasicFT = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Full-Time')
        ->groupBY('cost_center')
        ->selectRaw('sum(a_basic) as sum, cost_center')
        ->get();

        $BasicPT = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Part-Time')
        ->groupBY('cost_center')
        ->selectRaw('sum(a_basic) as sum, cost_center')
        ->get();


        $otherParts = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->whereIn('employment_status',$types)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->selectRaw('cost_center,
        sum(p_cost_of_living_allowance) as p_cost_of_living_allowance, 
        sum(p_honorarium) as p_honorarium, 
        sum(p_overtime) as p_overtime, 
        sum(a_emolument) as a_emolument, 
        sum(p_hold_salary_pay_out) as p_hold_salary_pay_out, 
        sum(p_others_payable_realty) as p_others_payable_realty, 
        sum(p_sss_contribution) as p_sss_contribution, 
        sum(p_philhealth_contribution) as p_philhealth_contribution, 
        sum(p_pagibig_contribution) as p_pagibig_contribution, 
        sum(p_retirement_contributon) as p_retirement_contributon, 
        sum(p_retirement_loan) as p_retirement_loan, 
        sum(p_sss_loan) as p_sss_loan, 
        sum(p_tax_withheld) as p_tax_withheld, 
        sum(p_cash_advance) as p_cash_advance, 
        sum(p_pagibig_loan) as p_pagibig_loan
        


        ')
        ->get();


        $topfooter  = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->whereIn('employment_status',$types)
        ->where('admin_approval','=','Approved')
        ->selectRaw('cost_center, 
        sum(a_basic + p_cost_of_living_allowance + p_honorarium + p_overtime + a_emolument + p_hold_salary_pay_out) as grand_total')
        ->get();





        $footer  = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->whereIn('employment_status',$types)
        ->where('admin_approval','=','Approved')
        ->selectRaw('cost_center, 
        sum(p_sss_contribution + p_philhealth_contribution + p_pagibig_contribution + p_retirement_contributon + p_retirement_loan + p_sss_loan + p_tax_withheld + p_cash_advance + p_pagibig_loan) as grand_total')
        ->get();


        return view('areportsmodule.payrollentryshow',compact('BasicFT','BasicPT','id','otherParts','topfooter','footer'));
    }

    public function wittholdingtaxShow($id){

        $id = Crypt::decrypt($id);

        $types = ['Non-Faculty','Faculty'];


        $payslip = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->get();

        $payslipFull = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Full-Time')
        ->get();

        $payslipPart = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Part-Time')
        ->get();

//SUMS-----------------------------------------------------

$p_basic_pay = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_basic_pay');

$p_absences = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_absences');


$p_adjustment = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_adjustment');

$p_net_basic = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_net_basic');

$p_cost_of_living_allowance = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_cost_of_living_allowance');


$p_honorarium = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_honorarium');

$p_over_load = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_over_load');

$p_overtime = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_overtime');

$p_others = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_others');

$p_hold_salary_pay_out = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_hold_salary_pay_out');

$p_total_earnings = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$types)
->where('admin_approval','=','Approved')
->sum('p_total_earnings');



        $p_total_non_taxable = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->sum('p_total_non_taxable');

        $p_taxable_income = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->sum('p_taxable_income');

        $p_tax_withheld = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$types)
        ->where('admin_approval','=','Approved')
        ->sum('p_tax_withheld');







        return view('areportsmodule.wittholdingtaxshow',compact('id','payslip','payslipFull','payslipPart','p_total_non_taxable','p_taxable_income','p_tax_withheld','p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium','p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings'));
    }
    
}
