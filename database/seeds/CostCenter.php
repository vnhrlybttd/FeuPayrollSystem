<?php

use Illuminate\Database\Seeder;

class CostCenter extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('costcenter')->insert(array(
        array(
          'cc_name' =>'ACCTG',
          'description' => 'Accounting',
        ),
        array(
            'cc_name' =>'ADMIN',
            'description' => 'Admin',
          ),
           array(
            'cc_name' =>'AERO',
            'description' => 'Admission and external relations office',
          ),
           array(
            'cc_name' =>'CS',
            'description' => 'CS',
          ),
           array(
            'cc_name' =>'CS HED',
            'description' => 'CS HED',
          ),
           array(
            'cc_name' =>'DEAN',
            'description' => 'DEAN',
          ),
           array(
            'cc_name' =>'GUIDANCE',
            'description' => 'Guidance',
          ),
           array(
            'cc_name' =>'GUIDANCE HED',
            'description' => 'GUIDANCE HED',
          ),
           array(
            'cc_name' =>'HR',
            'description' => 'Human Resources',
          ),
           array(
            'cc_name' =>'HRM',
            'description' => 'Human Resource Management',
          ),
           array(
            'cc_name' =>'LIBRARY',
            'description' => 'Library',
          ),
           array(
            'cc_name' =>'LIBRARY HED',
            'description' => 'Library HED',
          ),
           array(
            'cc_name' =>'MEDICAL',
            'description' => 'Medical',
          ),
           array(
            'cc_name' =>'MEDICAL HED',
            'description' => 'Medical HED',
          ),
           array(
            'cc_name' =>'REGISTRAR',
            'description' => 'Registrar',
          ),
          array(
            'cc_name' =>'REGISTRAR HED',
            'description' => 'Registrar HED',
          ),
          array(
            'cc_name' =>'TREASURY',
            'description' => 'Treasury',
          ),
          array(
            'cc_name' =>'ED',
            'description' => 'Education',
          ),
          array(
            'cc_name' =>'BSIT',
            'description' => 'BS Information Technology',
          ),
          array(
            'cc_name' =>'NSTP',
            'description' => 'National Service Training Program',
          ),
          array(
            'cc_name' =>'GEN ED',
            'description' => 'General Education',
          ),
          array(
            'cc_name' =>'BSA',
            'description' => 'BS Accountancy',
          ),
          array(
            'cc_name' =>'BSBA',
            'description' => 'BS Business Administration',
          ),
          array(
            'cc_name' =>'PSYCH',
            'description' => 'BS Psychology',
          ),
          array(
            'cc_name' =>'TM',
            'description' => 'BS Tourism Management',
          ),
          array(
            'cc_name' =>'HED',
            'description' => 'Higher Education',
          ),

      ));
    }
}
