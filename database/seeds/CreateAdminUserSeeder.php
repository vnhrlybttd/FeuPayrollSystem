<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\PasswordSecurity;
use Carbon\Carbon;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Developer
        /*
        $user = User::create([
            'first_name' => 'Vin',
            'last_name' => 'Battad',
            'username' => 'vinbattad',
            'emp_id' => '1',
            'password' => bcrypt('friendster12'),
            'type' => 'Developer',
            'status' => 1,
            'user_status' => 1,
            'user_status_f' => 1,
        ]);
        */

        //Super Admin
        $SuperAdmin = User::create([
            'first_name' => 'Feu',
            'last_name' => 'Super Admin',
            'username' => 'superadmin',
            'emp_id' => '2',
            'password' => bcrypt('FeuCavite123!'),
            'type' => 'Super Admin',
            'status' => 1,
            'user_status' => 1,
            'user_status_f' => 1,
            'force_password' => 0,
            'resets_password' => 1,
        ]);
        //Admin
        $Admin = User::create([
            'first_name' => 'Feu',
            'last_name' => 'Admin',
            'username' => 'admin',
            'emp_id' => '3',
            'password' => bcrypt('FeuCavite123!'),
            'type' => 'Admin',
            'status' => 1,
            'user_status' => 1,
            'user_status_f' => 1,
            'force_password' => 0,
            'resets_password' => 1,
        ]);
        //CoAdmin
        $CoAdmin = User::create([
            'first_name' => 'Feu',
            'last_name' => 'Co-Admin',
            'username' => 'coadmin',
            'emp_id' => '4',
            'password' => bcrypt('FeuCavite123!'),
            'type' => 'Co-Admin',
            'status' => 1,
            'user_status' => 1,
            'user_status_f' => 1,
            'force_password' => 0,
            'resets_password' => 1,
        ]);

        $HR = User::create([
            'first_name' => 'Feu',
            'last_name' => 'hr',
            'username' => 'hr',
            'emp_id' => '5',
            'password' => bcrypt('FeuCavite123!'),
            'type' => 'HR',
            'status' => 1,
            'user_status' => 1,
            'user_status_f' => 1,
            'force_password' => 0,
            'resets_password' => 1,
        ]);


        //ROLES
        //$role = Role::create(['name' => 'Developer']);
        $roleSA = Role::create(['name' => 'Super Admin']);
        $roleA = Role::create(['name' => 'Admin']);
        $roleCA = Role::create(['name' => 'Co-Admin']);
        $roleNF = Role::create(['name' => 'Non-Faculty']);
        $roleF = Role::create(['name' => 'Faculty']);
        $roleHR = Role::create(['name' => 'HR']);
        
        $permissions = Permission::pluck('id','id')->all();
  
        //ROLES FOR ACCOUNTS
        /*
        $role->syncPermissions($permissions = [
        'Developers_User_Manangement',
        'Developers_User_Roles',
        'role-list',
        'role-create',
        'role-edit',
        'role-delete'
        ]);
        */

        $roleSA->syncPermissions($permissions = ['Dashboard_Total_Employees',
        'Dashboard_Total_Department',
        'SuperAdmin_User_Management', 
        'audit-trail',
        'database'
        ]);

        $roleA->syncPermissions($permissions = [  'Dashboard_Total_Employees',
        'Dashboard_Total_Department','Admin'
        ]);

        $roleCA->syncPermissions($permissions = [ 'Dashboard_Total_Employees',
        'Dashboard_Total_Department','CoAdmin'
        ]);

        $roleNF->syncPermissions($permissions = ['Dashboard_Payslip',
        'Dashboard_Checkin',
        'Dashboard_Checkout',
        'profile',
        'payslip',
        'time_logs'
        ]);

        $roleF->syncPermissions($permissions = ['Dashboard_Payslip',
        'Dashboard_Checkin',
        'Dashboard_Checkout',
        'profile',
        'payslip',
        'time_logs'
        ]);

        $roleHR->syncPermissions($permissions = ['HR',
        'Dashboard_Total_Employees',
        'Dashboard_Total_Department']);
            
            



        //ASSIGNING ROLES
        //$user->assignRole([$role->id]);
        $SuperAdmin->assignRole([$roleSA->id]);
        $Admin->assignRole([$roleA->id]);
        $CoAdmin->assignRole([$roleCA->id]);
        $HR->assignRole([$roleHR->id]);

        /*
        $passwordSecurity = PasswordSecurity::create([
            'user_id' => $user->id,
            'password_expiry_days' => 30,
            'password_updated_at' => Carbon::now(),
        ]);
        */

        $passwordSecurity = PasswordSecurity::create([
            'user_id' => $SuperAdmin->id,
            'password_expiry_days' => 30,
            'password_updated_at' => Carbon::now(),
        ]);

        $passwordSecurity = PasswordSecurity::create([
            'user_id' => $Admin->id,
            'password_expiry_days' => 30,
            'password_updated_at' => Carbon::now(),
        ]);

        $passwordSecurity = PasswordSecurity::create([
            'user_id' => $CoAdmin->id,
            'password_expiry_days' => 30,
            'password_updated_at' => Carbon::now(),
        ]);

        $passwordSecurity = PasswordSecurity::create([
            'user_id' => $HR->id,
            'password_expiry_days' => 30,
            'password_updated_at' => Carbon::now(),
        ]);
        

    }
}
