<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Payslip;

class peExports implements FromView
{
    public function view(): View
    {
        return view('excel.nfPayrollEntry',[
            'BasicFT' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
            ->where('admin_approval','=','Approved')
            ->where('employment_status','=','Full-Time')
            ->groupBY('cost_center')
            ->selectRaw('sum(a_basic) as sum, cost_center')
            ->get(),
            'BasicPT' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
            ->where('admin_approval','=','Approved')
            ->where('employment_status','=','Part-Time')
            ->groupBY('cost_center')
            ->selectRaw('sum(a_basic) as sum, cost_center')
            ->get(),
            'otherParts' => Payslip::query()
            ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
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
        ')->get(),
        'topfooter' => Payslip::query()  ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('admin_approval','=','Approved')
        //->where('employment_status','=','Part-Time')
        //->groupBY('cost_center')
        ->selectRaw('cost_center, 
        sum(a_basic + p_cost_of_living_allowance + p_honorarium + p_overtime + a_emolument + p_hold_salary_pay_out) as grand_total')
        ->get(),
        'footer' => Payslip::query()
        ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')
        ->where('admin_approval','=','Approved')
        //->where('employment_status','=','Part-Time')
        //->groupBY('cost_center')
        ->selectRaw('cost_center, 
        sum(p_sss_contribution + p_philhealth_contribution + p_pagibig_contribution + p_retirement_contributon + p_retirement_loan + p_sss_loan + p_tax_withheld + p_cash_advance + p_pagibig_loan) as grand_total')
        ->get(),

            'id' => Payslip::get(),
            ]);
    }

}
