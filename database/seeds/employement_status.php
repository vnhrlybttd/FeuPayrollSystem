<?php

use Illuminate\Database\Seeder;

class employement_status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('employementstatus')->insert(array(
            array(
              'employement_status' =>'Full-Time',
            ),
            array(
                'employement_status' =>'Part-Time',
              ),
              array(
                'employement_status' =>'Regular',
              ),
              array(
                'employement_status' =>'Probationary',
              ),

        
      ));
    }
    
}
