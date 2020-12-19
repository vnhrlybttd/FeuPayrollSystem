<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Maatwebsite\Excel\Concerns\FromCollection;

class Payslip extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    Protected $table = 'payslip';

    public $primaryKey = 'payslip';

    Protected $fillable = [
        //FOR CREATE
        'employee_id',
        'date',

        'emp_firstname',
        'emp_lastname',
        'cost_center',

        'a_salary',
        'a_daily_rate',
        'a_rate_per_hour',
        'a_mins',
        'a_basic',
        'a_emolument',
        'a_total_basic_salary',
        'a_rate_per_hour_old',
        'a_load_units',
        'a_laboratory_total_units',
        'a_laboratory_total_hours',
        'a_total_hours',
        'a_overload',
        'a_additional_hours',

        //Earnings
        'p_basic_pay',
        'p_absences',
        'p_adjustment',
        'p_net_basic',
        'p_cost_of_living_allowance',
        'p_honorarium',
        'p_overtime',
        'p_over_load',
        'p_others',
        'p_hold_salary_pay_out',
        'p_total_earnings',
        //Deductions
        'p_sss_contribution',
        'p_philhealth_contribution',
        'p_pagibig_contribution',
        'p_sss_loan',
        'p_pagibig_loan',
        'p_tax_withheld',
        'p_cash_advance',
        'p_retirement_contributon',
        'p_christmas_loan',
        'p_retirement_loan',
        'p_others_adjustment',
        'p_others_payable_realty',
        'p_total_deductions',
        'p_first_half_pay',
        'p_second_half_pay',
        'p_monthly_pay',
        'admin_approval',
        'p_first_status_pay',
        'p_second_status_pay',
        'p_thirteen_month_pay',
        

        'p_total_non_taxable',
        'p_taxable_income',

        'recordsFrom',
        'recordsTo',
        'pagibig_contri_amt',
        'pagibig_contri_add',
        'sss_loan_amt',
        'sss_loan_add',
        'pagibig_loan_amt',
        'pagibig_loan_add',
        'otOne',
        'otTwo',
        'hidden_absences'

    ];
    
    public $timestamps = true;


    
    public $attributes = [



        //Earnings Attributes
      
        'p_basic_pay' => '0',
        'p_absences' => '0',
        'p_adjustment' => '0',
        'p_net_basic' => '0',
        'p_cost_of_living_allowance' => '0',
        'p_honorarium' => '0',
        'p_overtime' => '0',
        'p_over_load' => '0',
        'p_others' => '0',
        'p_hold_salary_pay_out' => '0',
        'p_total_earnings' => '0',

        //Deductions
        'p_sss_contribution' => '0',
        'p_philhealth_contribution' => '0',
        'p_pagibig_contribution' => '100',
        'p_sss_loan' => '0',
        'p_pagibig_loan' => '0',
        'p_tax_withheld' => '0',
        'p_cash_advance' => '0',
        'p_retirement_contributon' => '0',
        'p_christmas_loan' => '0',
        'p_retirement_loan' => '0',
        'p_others_adjustment' => '0',
        'p_others_payable_realty' => '0',
        'p_total_deductions' => '0',

        //Half Pay
        'p_first_half_pay' => '0',
        'p_second_half_pay' => '0',
        'p_monthly_pay' => '0',

        //13 Month Pay

        'p_thirteen_month_pay' => '0',



        //For Confirmation Only
        'status' => '1',
        'admin_approval' =>'Pending',
        'first_status_pay' => '0',
        'second_status_pay' => '0',
        'p_monthly_pay' => '0',


        //OTHERS

        //'p_load_units' => '0',



        'pagibig_contri_amt' => '0',
        'pagibig_contri_add' => '0',
        'sss_loan_amt' => '0',
        'sss_loan_add' => '0',
        'pagibig_loan_amt' => '0',
        'pagibig_loan_add' => '0',
        'otOne' => '0',
        'otTwo'=> '0',


        'a_salary' => '0',
        'a_daily_rate' => '0',
        'a_rate_per_hour' => '0',
        'a_mins' => '0',
        'a_basic' => '0',
        'a_emolument' => '0',
        'a_total_basic_salary' => '0',
        'a_rate_per_hour_old' => '0',
        'a_load_units' => '0',
        'a_laboratory_total_units' => '0',
        'a_laboratory_total_hours' => '0',
        'a_total_hours' => '0',
        'a_overload'=> '0',
        'a_additional_hours' => '0'

    ];


   
  
}
