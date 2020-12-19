<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\hr_employee;
use Spatie\Permission\Models\Role;
use App\Employee;
use Hash;
use DB;
use App\Http\Controllers\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Rules\MatchOldPassword;
use App\Rules\StrongPassword;
use App\PasswordSecurity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   


    public function index()
    {
        
        $type = [
            'Admin',
            'Co-Admin',
            'Non-Faculty',
            'Super Admin',
            'Faculty',
            'HR'
        ];

        $types = [
            'Admin',
            'Co-Admin',
            'Non-Faculty',
            'Faculty',
        ];



        $users = DB::table('users')
        ->whereIn('type',$type)
        ->where('status','=','1')
        ->get();

        $usersTwo = DB::table('users')
        ->whereIn('type',$type)
        ->where('status','=','0')
        ->get();


        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }
        //dd($EmployeeDetails);
        return view('employee.index',compact('users','usersTwo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee_id = DB::table('hr_employee')->get();
        $roles = Role::pluck('name','name')->all();

     

        return view('employee.create',compact('roles','employee_id'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'emp_id' => 'required|unique:users',
            'type' => 'required',
            'password' => [
                'required',
                'string',
                'min:12',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                new StrongPassword
            ],
            
        ]);

        
   
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        $user->assignRole($request->input('roles'));

        $passwordSecurity = PasswordSecurity::create([
            'user_id' => $user->id,
            'password_expiry_days' => 30,
            'password_updated_at' => Carbon::now(),
        ]);

        
        return redirect()->route('employee.index')
                        ->withSuccessMessage('Create Account Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee_id = DB::table('hr_employee')->get();
        $user = User::find(Crypt::decrypt($id));
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('employee.edit',compact('user','roles','userRole','employee_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'emp_id' => 'required'
            ]);
       

        $input = $request->all();
        //if(!empty($input['password'])){ 
        //    $input['password'] = Hash::make($input['password']);
       // }else{
        //    $input = array_except($input,array('password'));    
      //  }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        
        return redirect()->route('employee.index')
        ->withSuccessMessage('Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('employee.index')
        ->withSuccessMessage('Deleted Successfully!');
    }

    
}
