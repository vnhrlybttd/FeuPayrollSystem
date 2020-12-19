<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addemployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addemployee', function (Blueprint $table) {
            $table->bigIncrements('add_id');
            $table->string('emp_id');
            //employee details
            $table->string('cost_center');
            $table->string('employment_status');
            $table->string('middle_name');
            $table->string('sss_number');
            $table->string('philhealth_number');
            $table->string('pagibig_number');
            $table->string('tin_number');
            $table->string('bpi_account');

            //salary details
            $table->float('salary')->nullable();
            $table->float('daily_rate')->nullable();
            $table->float('rate_per_hour')->nullable();
            $table->float('rate_per_hour_old')->nullable();
            $table->float('mins')->nullable();
            $table->float('basic')->nullable();
            $table->float('emolument')->nullable();
            $table->float('total_basic_salary')->nullable();
            $table->float('load_units')->nullable(); // work hours
            $table->float('additional_hours')->nullable();
            $table->float('laboratory_units')->nullable();
            $table->float('laboratory_hours')->nullable();
            $table->float('total_hours')->nullable();
            $table->float('overload')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addemployee');
    }
}
