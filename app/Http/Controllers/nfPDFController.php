<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use DB;
use App\Payslip;
use Illuminate\Support\Facades\Crypt;

class nfPDFController extends Controller
{
    public function pdf($id){
        
        $id = Crypt::decrypt($id);


        $type = [
            'Non-Faculty','Faculty'
        ];


        $bsd = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->select('emp_pin','emp_firstname','emp_lastname','a_daily_rate','a_rate_per_hour','a_mins','a_salary','p_thirteen_month_pay','a_basic','a_emolument','a_total_basic_salary')
        ->get();

        //SALARY DETAILS
        $salary = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('a_salary');

        $p_thirteen_month_pay = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_thirteen_month_pay');

        $basic = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('a_basic');

        $emolument = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('a_emolument');

        $total_basic_salary = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('a_total_basic_salary');
        //-------------------------------------------------------------//


        $earnings = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->select('emp_pin','emp_firstname','emp_lastname','p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium','p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings')
        ->get();

        $p_basic_pay = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_basic_pay');

         $p_absences = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_absences');

        $p_adjustment = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_adjustment');

        $p_net_basic = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_net_basic');

        $p_cost_of_living_allowance = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_cost_of_living_allowance');

        $p_honorarium = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_honorarium');

        $p_overtime = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_overtime');

        $p_over_load = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_over_load');

        $p_others = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_others');

        $p_hold_salary_pay_out = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_hold_salary_pay_out');

        $p_total_earnings = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_total_earnings');

        //------------------------------------------------------------------//

        $deductions = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->select('emp_pin','emp_firstname','emp_lastname','p_sss_contribution','p_philhealth_contribution','p_pagibig_contribution','p_sss_loan','p_pagibig_loan','p_tax_withheld','p_cash_advance','p_retirement_contributon','p_christmas_loan','p_retirement_loan','p_others_adjustment','p_others_payable_realty','p_total_deductions','p_total_non_taxable','p_taxable_income')
        ->get();

        $p_sss_contribution = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_sss_contribution');

        $p_philhealth_contribution = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_philhealth_contribution');

        $p_pagibig_contribution = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_pagibig_contribution');

        $p_sss_loan = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_sss_loan');

        $p_pagibig_loan = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_pagibig_loan');

        $p_tax_withheld = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_tax_withheld');

        $p_cash_advance = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_cash_advance');

        $p_retirement_contributon = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_retirement_contributon');

        $p_christmas_loan = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_christmas_loan');

        $p_retirement_loan = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_retirement_loan');

        $p_others_adjustment = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_others_adjustment');

        $p_others_payable_realty = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_others_payable_realty');

        $p_total_deductions = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_total_deductions');

        $p_total_non_taxable = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_total_non_taxable');

        $p_taxable_income = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_taxable_income');

        $p_monthly_pay = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$type)
       ->where('admin_approval','=','Approved')
       ->sum('p_monthly_pay');

       
       $p_first_half_pay = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$type)
       ->where('admin_approval','=','Approved')
       ->sum('p_first_half_pay');

       
       $p_second_half_pay = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$type)
       ->where('admin_approval','=','Approved')
       ->sum('p_second_half_pay');

       //dd($p_second_half_pay);

       $month = Payslip::where('date','=',$id)
       ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
       ->join('users','payslip.employee_id','=','users.emp_id')
       ->whereIn('type',$type)
       ->where('admin_approval','=','Approved')
       ->select('emp_pin','emp_firstname','emp_lastname','p_monthly_pay','p_first_half_pay','p_second_half_pay')
       ->get();

        $dompdf = new DOMPDF();
        $dompdf->load_html('...');
        $dompdf->render();
        $dompdf->set_base_path("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('printables.nfPayroll',compact('id',
        'bsd',
        'salary','p_thirteen_month_pay','basic','emolument','total_basic_salary',
        'earnings',
        'p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium','p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings',
        'deductions',
        'p_sss_contribution','p_philhealth_contribution','p_pagibig_contribution','p_sss_loan','p_pagibig_loan','p_tax_withheld','p_cash_advance','p_retirement_contributon','p_christmas_loan','p_retirement_loan','p_others_adjustment','p_others_payable_realty','p_total_deductions','p_total_non_taxable','p_taxable_income',
        'p_monthly_pay','p_first_half_pay','p_second_half_pay','month'
        ))->setPaper('a4', 'landscape');
        return $pdf->stream('printables.nfPayroll');
    }
}
