<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Anfsd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anfsd', function (Blueprint $table) {
            $table->bigIncrements('anfsd_id');
            $table->integer('emp_id');
            $table->string('date');

            //Salary
            $table->integer('salary');
            $table->integer('daily_rate');
            $table->integer('rate_per_hour');
            $table->integer('mins');

            //Total Basic
            $table->integer('basic');
            $table->integer('emolument');

            //Total Basic Salary
            $table->integer('total_basic_salary');

            //Absence
            $table->integer('less_absence'); // AFTER CALCULATE MUST PUT IN PAYSLIP HIDDEN INPUT
            $table->string('recordsFrom');
            $table->string('recordsTo');

            //Load Units
            //$table->integer('p_load_units')->nullable();

            // Earnings
            $table->integer('p_basic_pay')->nullable();
            $table->integer('p_absences')->nullable();
            $table->integer('p_adjustment')->nullable();
            $table->integer('p_net_basic')->nullable();
            $table->integer('p_cost_of_living_allowance')->nullable();
            $table->integer('p_honorarium')->nullable();
            $table->integer('p_overtime')->nullable();
            $table->integer('p_over_load')->nullable();
            $table->integer('p_others')->nullable();
            $table->integer('p_hold_salary_pay_out')->nullable();
            $table->integer('p_total_earnings')->nullable();
            
            // Deductions
            $table->integer('p_sss_contribution')->nullable();
            $table->integer('p_philhealth_contribution')->nullable();
            $table->integer('p_pagibig_contribution')->nullable();
            $table->integer('p_sss_loan')->nullable();
            $table->integer('p_pagibig_loan')->nullable();
            $table->integer('p_tax_withheld')->nullable();
            $table->integer('p_cash_advance')->nullable();
            $table->integer('p_retirement_contributon')->nullable();
            $table->integer('p_christmas_loan')->nullable();
            $table->integer('p_retirement_loan')->nullable();
            $table->integer('p_others_adjustment')->nullable();
            $table->integer('p_others_payable_realty')->nullable();
            $table->integer('p_total_deductions')->nullable();

            //Net Pay
            $table->integer('p_first_half_pay')->nullable();
            $table->integer('p_second_half_pay')->nullable();
            $table->integer('p_monthly_pay')->nullable();
            $table->integer('p_thirteen_month_pay')->nullable();


            //Taxable
            $table->integer('p_total_non_taxable')->nullable();
            $table->integer('p_taxable_income')->nullable();
            
            //Approvals
            $table->string('admin_approval')->nullable();
            $table->boolean('first_status_pay')->nullable();
            $table->boolean('second_status_pay')->nullable();

            //Remarks
            $table->string('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anfsd');
    }
}
