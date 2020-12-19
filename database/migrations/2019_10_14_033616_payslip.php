<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Payslip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslip', function (Blueprint $table) {
            $table->bigIncrements('payslip');
            //$table->string('employee_name'); // NAME FOR EMPLOYEE WHEN INSERTED 
            $table->string('employee_id');
            $table->string('date'); // PAYSLIP
         

             //Absence
             $table->integer('less_absence'); // AFTER CALCULATE MUST PUT IN PAYSLIP HIDDEN INPUT
             $table->string('recordsFrom');
             $table->string('recordsTo');

             $table->float('pagibig_contri_amt')->nullable();
             $table->float('pagibig_contri_add')->nullable();
            

             $table->float('sss_loan_amt')->nullable();
             $table->float('sss_loan_add')->nullable();
        

             $table->float('pagibig_loan_amt')->nullable();
             $table->float('pagibig_loan_add')->nullable();
       

             $table->float('otOne')->nullable();
             $table->float('otTwo')->nullable();
             
            
            

            // Earnings
            $table->float('p_basic_pay')->nullable();
            $table->float('p_absences')->nullable();
            $table->float('p_adjustment')->nullable();
            $table->float('p_net_basic')->nullable();
            $table->float('p_cost_of_living_allowance')->nullable();
            $table->float('p_honorarium')->nullable();
            $table->float('p_overtime')->nullable();
            $table->float('p_over_load')->nullable();
            $table->float('p_others')->nullable();
            $table->float('p_hold_salary_pay_out')->nullable();
            $table->float('p_total_earnings')->nullable();
            
            // Deductions
            $table->float('p_sss_contribution')->nullable();
            $table->float('p_philhealth_contribution')->nullable();
            $table->float('p_pagibig_contribution')->nullable();
            $table->float('p_sss_loan')->nullable();
            $table->float('p_pagibig_loan')->nullable();
            $table->float('p_tax_withheld')->nullable();
            $table->float('p_cash_advance')->nullable();
            $table->float('p_retirement_contributon')->nullable();
            $table->float('p_christmas_loan')->nullable();
            $table->float('p_retirement_loan')->nullable();
            $table->float('p_others_adjustment')->nullable();
            $table->float('p_others_payable_realty')->nullable();
            $table->float('p_total_deductions')->nullable();

           //Net Pay
           $table->float('p_first_half_pay')->nullable();
           $table->float('p_second_half_pay')->nullable();
           $table->float('p_monthly_pay')->nullable();
           $table->float('p_thirteen_month_pay')->nullable();


           //Taxable
           $table->float('p_total_non_taxable')->nullable();
           $table->float('p_taxable_income')->nullable();

            // Other Info
            $table->timestamps();
            $table->string('admin_approval')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('first_status_pay')->nullable();
            $table->boolean('second_status_pay')->nullable();

                   //Remarks
                   $table->string('remarks')->nullable();

                   $table->string('hidden_absences')->nullable();


                        //salary details
            $table->float('a_salary')->nullable();
            $table->float('a_daily_rate')->nullable();
            $table->float('a_rate_per_hour')->nullable();
            $table->float('a_rate_per_hour_old')->nullable();
            $table->float('a_mins')->nullable();
            $table->float('a_basic')->nullable();
            $table->float('a_emolument')->nullable();
            $table->float('a_total_basic_salary')->nullable();
            $table->float('a_load_units')->nullable();
            $table->float('a_laboratory_total_units')->nullable();
            $table->float('a_laboratory_total_hours')->nullable();
            $table->float('a_total_hours')->nullable();
            $table->float('a_additional_hours')->nullable();
            $table->float('a_overload')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payslip');
    }
}
