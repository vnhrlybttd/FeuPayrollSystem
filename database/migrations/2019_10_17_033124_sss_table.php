<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sss_table', function (Blueprint $table) {
            $table->bigIncrements('sss_id');
            $table->string('low_compensation');
            $table->string('high_compensation');
            $table->string('monthly_salary_detail');
            $table->string('ss_er');
            $table->string('ss_ee');
            $table->string('sss_total');
            $table->string('ec_er');
            $table->string('tc_er');
            $table->string('tc_ee');
            $table->string('tc_total');
            $table->string('month');
            $table->string('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sss_table');
    }
}
