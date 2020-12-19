<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ANFSD extends Model
{

    protected $table = 'anfsd';
    public $fillable = [
       'emp_id',
       'date',
       'salary',
        'daily_rate',
        'rate_per_hour',
        'mins',
        'basic',
        'emolument',
        'total_basic_salary',
        //'absence',
        //'total_absence',
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

        //Net Pay
        'p_first_half_pay',
        'p_second_half_pay',
        'p_monthly_pay',
        'p_thirteen_month_pay',

        //tax
        'p_total_non_taxable',
        'p_taxable_income',

        //Approvals
        'admin_approval',
        'p_first_status_pay',
        'p_second_status_pay',

        //Calculate Absence
        'recordsFrom',
        'recordsTo',
        'remarks'
    ];


    public $attributes = [
        'admin_approval' =>'Pending',
        'first_status_pay' => '0',
        'second_status_pay' => '0'
    ];


    public $timestamps = false;
}
