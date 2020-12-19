<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Payslip;

class wtExports implements FromView
{
    public function view(): View
    {

   

        return view('excel.nfWTax', [
            'payslip' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
            ->where('admin_approval','=','Approved')
            ->get(),
            'p_basic_pay' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
            ->where('admin_approval','=','Approved')
            ->sum('p_basic_pay'),
            'p_absences' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')

            ->where('admin_approval','=','Approved')
            ->sum('p_absences'),
            'p_adjustment' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')

            ->where('admin_approval','=','Approved')
            ->sum('p_adjustment'),
            'p_net_basic' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
      
            ->where('admin_approval','=','Approved')
            ->sum('p_net_basic'),
            'p_cost_of_living_allowance' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
 
            ->where('admin_approval','=','Approved')
            ->sum('p_cost_of_living_allowance'),
            'p_honorarium' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
    
            ->where('admin_approval','=','Approved')
            ->sum('p_honorarium'),
            'p_overtime' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
      
            ->where('admin_approval','=','Approved')
            ->sum('p_overtime'),
            'p_over_load' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
 
            ->where('admin_approval','=','Approved')
            ->sum('p_over_load'),
            'p_others' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
      
            ->where('admin_approval','=','Approved')
            ->sum('p_others'),
            'p_hold_salary_pay_out' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
      
            ->where('admin_approval','=','Approved')
            ->sum('p_hold_salary_pay_out'),
            'p_total_earnings' => Payslip::query()
            ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
        ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
        ->join('users','payslip.employee_id','=','users.emp_id')

        ->where('admin_approval','=','Approved')
        ->sum('p_total_earnings'),
            'p_total_non_taxable' => Payslip::query()
            ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
       
            ->where('admin_approval','=','Approved')
            ->sum('p_total_non_taxable'),
            'p_taxable_income' => Payslip::query()->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
  
            ->where('admin_approval','=','Approved')
            ->sum('p_taxable_income'),
            'p_tax_withheld' => Payslip::query()
            ->join('hr_employee','hr_employee.emp_pin','=','payslip.employee_id')
            ->join('addemployee','addemployee.emp_id','=','payslip.employee_id')
            ->join('users','payslip.employee_id','=','users.emp_id')
   
            ->where('admin_approval','=','Approved')
            ->sum('p_tax_withheld'),
        ]);
    }
}
