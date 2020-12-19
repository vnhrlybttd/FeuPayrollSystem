<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use DB;
use App\Payslip;
use Illuminate\Support\Facades\Crypt;

class nfGenerateWTaxController extends Controller
{
    public function print($id){
 
  $id = Crypt::decrypt($id);


  $type = [
    'Non-Faculty','Faculty'
];


        $payslip = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->get();

        $payslipFull = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Full-Time')
        ->get();

        $payslipPart = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Part-Time')
        ->get();

//SUMS-----------------------------------------------------

$p_basic_pay = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_basic_pay');

$p_absences = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_absences');


$p_adjustment = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_adjustment');

$p_net_basic = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_net_basic');

$p_cost_of_living_allowance = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_cost_of_living_allowance');


$p_honorarium = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_honorarium');

$p_over_load = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_over_load');

$p_overtime = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_overtime');

$p_others = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_others');

$p_hold_salary_pay_out = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_hold_salary_pay_out');

$p_total_earnings = Payslip::where('date','=',$id)
->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
->join('users','payslip.employee_id','=','users.emp_id')
->whereIn('type',$type)
->where('admin_approval','=','Approved')
->sum('p_total_earnings');



        $p_total_non_taxable = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_total_non_taxable');

        $p_taxable_income = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_taxable_income');

        $p_tax_withheld = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->sum('p_tax_withheld');

      


        //dd($payslip);

        $dompdf = new DOMPDF();
        $dompdf->load_html('...');
        $dompdf->render();
        $dompdf->set_base_path("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('printables.nfWTax',compact('payslip','payslipFull','payslipPart','id','p_total_non_taxable','p_taxable_income','p_tax_withheld','p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium','p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings'))->setPaper('a4', 'landscape');
        return $pdf->stream('printables.nfWTax');
    }
}
