<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('type');
            $table->boolean('status');
            $table->boolean('user_status');
            $table->boolean('user_status_f');
            $table->string('force_password')->default(0);
            $table->string('resets_password')->default(0);
            //$table->string('session_id');
            $table->rememberToken();
            $table->timestamps();

            $table->string('emp_id',9);
            //$table->foreign('emp_id')->references('emp_pin')->on('hr_employee');
        });

        

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('users');
    }
}
