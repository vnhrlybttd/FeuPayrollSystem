<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Payslip;

class payrollExports implements FromView {

    public function view(): View {

        return view('excel.nfPayroll', [ 'bsd'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->get(),
            'salary'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('a_salary'),
            'p_thirteen_month_pay'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_thirteen_month_pay'),
            'basic'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('a_basic'),
            'emolument'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('a_emolument'),
            'total_basic_salary'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('a_total_basic_salary'),

            'earnings'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->select('emp_pin', 'emp_firstname', 'emp_lastname', 'p_basic_pay', 'p_absences', 'p_adjustment', 'p_net_basic', 'p_cost_of_living_allowance', 'p_honorarium', 'p_overtime', 'p_over_load', 'p_others', 'p_hold_salary_pay_out', 'p_total_earnings') ->get(),

            'p_basic_pay'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_basic_pay'),
            'p_absences'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_absences'),
            'p_adjustment'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_adjustment'),
            'p_net_basic'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_net_basic'),
            'p_cost_of_living_allowance'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_cost_of_living_allowance'),
            'p_honorarium'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_honorarium'),
            'p_overtime'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_overtime'),
            'p_over_load'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_over_load'),
            'p_others'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_others'),
            'p_hold_salary_pay_out'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_hold_salary_pay_out'),
            'p_total_earnings'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_total_earnings'),

            'deductions'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->select('emp_pin', 'emp_firstname', 'emp_lastname', 'p_sss_contribution', 'p_philhealth_contribution', 'p_pagibig_contribution', 'p_sss_loan', 'p_pagibig_loan', 'p_tax_withheld', 'p_cash_advance', 'p_retirement_contributon', 'p_christmas_loan', 'p_retirement_loan', 'p_others_adjustment', 'p_others_payable_realty', 'p_total_deductions', 'p_total_non_taxable', 'p_taxable_income') ->get(),

            'p_sss_contribution'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_sss_contribution'),
            'p_philhealth_contribution'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_philhealth_contribution'),
            'p_pagibig_contribution'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_pagibig_contribution'),
            'p_total_non_taxable'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_total_non_taxable'),
            'p_taxable_income'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_taxable_income'),
            'p_tax_withheld'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_tax_withheld'),
            'p_others_payable_realty'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_others_payable_realty'),
            'p_sss_loan'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_sss_loan'),
            'p_pagibig_loan'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_pagibig_loan'),
            'p_christmas_loan'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_christmas_loan'),
            'p_retirement_loan'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_retirement_loan'),
            'p_cash_advance'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_cash_advance'),
            'p_others_adjustment'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_others_adjustment'),
            'p_total_deductions'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_total_deductions'),
            'p_retirement_contributon'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_retirement_contributon'),

            'p_monthly_pay'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_monthly_pay'),
            'p_first_half_pay'=> Payslip::query() ->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_first_half_pay'),
            'p_second_half_pay'=> Payslip::query()->join('hr_employee', 'hr_employee.emp_pin', '=', 'payslip.employee_id') ->join('users', 'payslip.employee_id', '=', 'users.emp_id') ->where('admin_approval', '=', 'Approved') ->sum('p_second_half_pay'),


            ]);
    }

}
