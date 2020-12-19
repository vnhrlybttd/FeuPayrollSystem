<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use DB;
use App\Payslip;
use Illuminate\Support\Facades\Crypt;

class nfGeneratePayrollEntryController extends Controller
{
    public function print($id){

        $id = Crypt::decrypt($id);

        $type = [
            'Non-Faculty','Faculty'
        ];

        $types = [
            'Full-Time','Part-Time'
        ];
        
        $cost_center = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Full-Time')
        ->groupBY('cost_center')
        ->get();
        
        

                              //dd($cost_center);

        $cost_centerTwo = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->where('employment_status','=','Part-Time')
        ->groupBY('cost_center')
        ->get();


       

        $cost_centers = DB::table('costcenter')
        ->pluck('cc_name')
        ->toArray();

        //$arrayValue = $cost_center->cc_name;

 

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
        //->where('employment_status','=','Part-Time')
        //->groupBY('cost_center')
        ->selectRaw('cost_center, 
        sum(a_basic + p_cost_of_living_allowance + p_honorarium + p_overtime + a_emolument + p_hold_salary_pay_out) as grand_total')
        ->get();


        //dd($topfooter);


        $footer  = Payslip::where('date','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->whereIn('employment_status',$types)
        ->where('admin_approval','=','Approved')
        //->where('employment_status','=','Part-Time')
        //->groupBY('cost_center')
        ->selectRaw('cost_center, 
        sum(p_sss_contribution + p_philhealth_contribution + p_pagibig_contribution + p_retirement_contributon + p_retirement_loan + p_sss_loan + p_tax_withheld + p_cash_advance + p_pagibig_loan) as grand_total')
        ->get();



        

        //dd($otherParts);

        

// ----------------------------------------------------------------------------------------------------------------------------------

        $p_cost_of_living_allowance = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_cost_of_living_allowance');


        $p_honorarium = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_honorarium');

        $p_overtime = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_overtime');

        $a_emolument = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('a_emolument');

        $p_hold_salary_pay_out = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_hold_salary_pay_out');

        
        $p_others_payable_realty = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_others_payable_realty');

         
        $p_sss_contribution = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_sss_contribution');

        $p_philhealth_contribution = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_philhealth_contribution');

        $p_pagibig_contribution = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_pagibig_contribution');

        $p_retirement_contributon = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_retirement_contributon');

        $p_retirement_loan = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_retirement_loan');

        $p_sss_loan = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_sss_loan');

        $p_tax_withheld = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_tax_withheld');

        $p_cash_advance = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_cash_advance');

        $p_pagibig_loan = Payslip::where('date','=',$id)
        //->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->whereIn('type',$type)
        ->where('admin_approval','=','Approved')
        ->groupBY('cost_center')
        ->sum('p_pagibig_loan');

//-----------------------------------------------------------------------------------------------------------------------------------

        $dompdf = new DOMPDF();
        $dompdf->load_html('...');
        $dompdf->render();
        $dompdf->set_base_path("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('printables.nfPayrollEntry',compact('BasicFT','BasicPT','id','cost_center','cost_centerTwo','p_cost_of_living_allowance',
        'p_honorarium','p_overtime','a_emolument','p_hold_salary_pay_out','p_others_payable_realty',
        'p_sss_contribution','p_philhealth_contribution','p_pagibig_contribution','p_retirement_contributon','p_retirement_loan','p_sss_loan',
        'p_tax_withheld','p_cash_advance','p_pagibig_loan','otherParts','footer','topfooter'))->setPaper('a4', 'landscape');
        return $pdf->stream('printables.nfPayrollEntry');

    }
}
