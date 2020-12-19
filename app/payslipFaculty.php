<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class payslipFaculty extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    
    Protected $table = 'payslip_faculty';

    public $primaryKey = 'payslip_faculty';

    Protected $fillable = [
        //FOR CREATE
        'employee_id',
        'date',
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
        'p_second_half_pay'
    ];
    
    public $timestamps = true;


    
    public $attributes = [



        //Earnings Attributes
      
        'basic_pay' => '0',
        'absences' => '0',
        'adjustment' => '0',
        'net_basic' => '0',
        'cost_of_living_allowance' => '0',
        'honorarium' => '0',
        'overtime' => '0',
        'over_load' => '0',
        'others' => '0',
        'hold_salary_pay_out' => '0',
        'total_earnings' => '0',

        //Deductions
        'sss_contribution' => '0',
        'philhealth_contribution' => '0',
        'pagibig_contribution' => '100',
        'sss_loan' => '0',
        'pagibig_loan' => '0',
        'tax_withheld' => '0',
        'cash_advance' => '0',
        'retirement_contributon' => '0',
        'christmas_loan' => '0',
        'retirement_loan' => '0',
        'others_adjustment' => '0',
        'others_payable_realty' => '0',
        'total_deductions' => '0',

        //Half Pay
        'first_half_pay' => '0',
        'second_half_pay' => '0',
        //'monthly_pay' => '0',



        //For Confirmation Only
        'status' => '1',
        'admin_approval' =>'Pending',
        'printed' => '0',


        //OTHERS

        'load_units' => '0',
        'reference_no' => '0'

    ];
}
