<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //Developers
            'Developers_User_Manangement',
            'Developers_User_Roles',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
        

            //Super Admin ITS
            'Dashboard_Total_Employees',
            'Dashboard_Total_Department',
            'SuperAdmin_User_Management',
            'audit-trail',
            //Admin

            //Co-Admin
            'CoAdmin',
            'Admin',
            'database',
            
            

            //Faculty and Non Faculty
            'Dashboard_Payslip',
            'Dashboard_Checkin',
            'Dashboard_Checkout',
            'profile',
            'payslip',
            'time_logs',
            //'ticket_reports'
           

            //hr

            'HR',
          
         ];
 
 
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }


         
       
    }
}
