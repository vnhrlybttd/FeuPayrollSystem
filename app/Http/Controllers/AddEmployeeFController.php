<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\addEmployee;
use App\User;

class AddEmployeeFController extends Controller
{
    public function index(){


    

  


        $table = DB::table('addemployee')
        ->join('hr_employee','hr_employee.emp_pin','=','addemployee.emp_id')
        ->join('users','users.emp_id','=','addemployee.emp_id')
        ->where('status','=','1')
        ->where('type','=','Faculty')
        ->orderBY('add_id','desc')
        ->get();


     
        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }

        return view('adminaddemployeeF.index',compact('table'));
    }

    public function stepOne(Request $request){

        $employee = DB::table('hr_employee')
        ->join('users','users.emp_id','=','hr_employee.emp_pin')
        ->where('status','=','1')
        ->where('user_status_f','=','0')
        ->where('type','=','Faculty')
        ->orderBY('emp_id','desc')
        ->get();

        //dd($employee);

        $addemployee = $request->session()->get('addemployee');
        return view('adminaddemployeeF.add',compact('addemployee', $addemployee,'employee'));
    }

    public function stepTwo(Request $request){

        $validatedData = $request->validate([
            'emp_id' => 'required|unique:addemployee'
        ]);

        $emp_id = $request->get('emp_id');

        $employee = DB::table('hr_employee')
        ->where('emp_pin' ,'=',$emp_id)
        ->get();

 
        $cost_center = DB::table('costcenter')
        ->get();
          

        if(empty($request->session()->get('addemployee'))){
            $addemployee = new addEmployee();
            $addemployee->fill($validatedData);
            $request->session()->put('addemployee', $addemployee);
            //dd($request);
        }else{
            $addemployee = $request->session()->get('addemployee');
            $addemployee->fill($validatedData);
            $request->session()->put('addemployee', $addemployee,'employee');
            //dd(session()->all());
                }

        return view('adminaddemployeeF.step2',compact('employee','cost_center'));
    }

    public function stepThree(Request $request){

        $validatedData = $request->validate([
            'middle_name' => 'required',
            'sss_number' => 'required',
            'philhealth_number' => 'required',
            'pagibig_number' => 'required',
            'tin_number' => 'required',
            'bpi_account' => 'required',
            'cost_center' => 'required',
            'employment_status' => 'required',
        ]);

        $addemployees = $request->session()->get('addemployee');
        $emp_id = $request->session()->get('addemployee')->emp_id;

        $employee = DB::table('hr_employee')
        ->where('emp_pin','=',$emp_id)
        ->get();

        if(empty($request->session()->get('addemployee'))){
            $addemployee = new addEmployee();
            $addemployee->fill($validatedData);
            $request->session()->put('addemployee', $addemployee);
            //dd($request);
        }else{
            $addemployee = $request->session()->get('addemployee');
            $addemployee->fill($validatedData);
            $request->session()->put('addemployee', $addemployee,'employee');
            //dd(session()->all());
                }


        return view('adminaddemployeeF.step3',compact('employee'));

       
    }

    public function stepFour(Request $request){


        $addemployees = $request->session()->get('addemployee');
    

        

      
        $validatedData = $request->validate([
            'total_basic_salary' => 'required',
            'load_units' => 'required',
            'laboratory_units' => 'required',
            'laboratory_hours' => 'required',
            'total_hours' => 'required',
            'rate_per_hour' => 'required',
            'rate_per_hour_old' => 'required',
            'mins' => 'required',
            'daily_rate' => 'required',
            'salary' => 'required',
            'emolument' => 'required',
            'overload' => 'required',
            'basic' => 'required',
        ]);

      

      





 $emp_id = $request->session()->get('addemployee')->emp_id;


        $employee = DB::table('hr_employee')
        ->where('emp_pin' ,'=',$emp_id)
        ->get();

     

        if(empty($request->session()->get('addemployee'))){
            $addemployee = new addEmployee();
            $addemployee->fill($validatedData);
            $request->session()->put('addemployee', $addemployee);
            //dd($request);
        }else{
            $addemployee = $request->session()->get('addemployee');
            $addemployee->fill($validatedData);
            $request->session()->put('addemployee', $addemployee,'employee');
            //dd(session()->all());
                }

        return view('adminaddemployeeF.step4',compact('employee'));

    }

    public function addEmployee(Request $request){


        $addemployee = $request->session()->get('addemployee');

        $emp_id = $request->session()->get('addemployee')->emp_id;
        $middle_name = $request->session()->get('addemployee')->middle_name;
        $sss_number = $request->session()->get('addemployee')->sss_number;
        $philhealth_number = $request->session()->get('addemployee')->philhealth_number;
        $pagibig_number = $request->session()->get('addemployee')->pagibig_number;
        $tin_number = $request->session()->get('addemployee')->tin_number;
        $bpi_account = $request->session()->get('addemployee')->bpi_account;
        $cost_center = $request->session()->get('addemployee')->cost_center;
        $employment_status = $request->session()->get('addemployee')->employment_status;

        $load_units = $request->session()->get('addemployee')->load_units;
        $laboratory_units = $request->session()->get('addemployee')->laboratory_units;
        $laboratory_hours = $request->session()->get('addemployee')->laboratory_hours;
        $total_hours = $request->session()->get('addemployee')->total_hours;
        $rate_per_hour = $request->session()->get('addemployee')->rate_per_hour;
        $rate_per_hour_old = $request->session()->get('addemployee')->rate_per_hour_old;
        $mins = $request->session()->get('addemployee')->mins;
        $salary = $request->session()->get('addemployee')->salary;
        $daily_rate = $request->session()->get('addemployee')->daily_rate;
        $basic = $request->session()->get('addemployee')->basic;
        $emolument = $request->session()->get('addemployee')->emolument;
        $overload = $request->session()->get('addemployee')->overload;
        $total_basic_salary = $request->session()->get('addemployee')->total_basic_salary;
       



        $sample = addEmployee::create([
            'emp_id' => $emp_id,
            'middle_name' => $middle_name,
            'sss_number' => $sss_number,
            'philhealth_number' => $philhealth_number,
            'pagibig_number' => $pagibig_number,
            'tin_number' => $tin_number,
            'bpi_account' => $bpi_account,
            'cost_center' => $cost_center,
            'employment_status' => $employment_status,

            'load_units' => $load_units,
            'laboratory_units' => $laboratory_units,
            'laboratory_hours' => $laboratory_hours,
            'total_hours' => $total_hours,
            'rate_per_hour' => $rate_per_hour,
            'rate_per_hour_old' => $rate_per_hour_old,
            'mins' => $mins,
            'salary' => $salary,
            'daily_rate' => $daily_rate,
            'basic' => $basic,
            'emolument' => $emolument,
            'overload' => $overload,
            'total_basic_salary' => $total_basic_salary,
       
            ]);

        //dd($sample);

        $finds = DB::table('users')
        ->select('user_status','emp_id')
        ->where('emp_id','=',$emp_id)
        ->update(['user_status_f'=>'1']);

       
        
  
        
            
            return redirect()->action('AddEmployeeFController@index')
            ->withSuccessMessage('Added Successfully!');
        
    }


    public function editNF($id){

      

        $find = DB::table('addemployee')
        ->where('add_id','=',$id)
        ->join('hr_employee','hr_employee.emp_pin','addemployee.emp_id')
        ->first();

        $cost_center = DB::table('costcenter')->get();

        //$emp_id = $find->first('emp_id');

        //dd($find);
        return view('adminaddemployeeF.editnf',compact('find','cost_center'));

    }

    public function updateNF(Request $request , $id){


        $validatedData = $request->validate([
            'emp_id' => 'required',
            'sss_number' => 'required',
            'philhealth_number' => 'required',
            'pagibig_number' => 'required',
            'tin_number' => 'required',
            'bpi_account' => 'required',
            'cost_center' => 'required',
            'employment_status' => 'required',
            'total_basic_salary' => 'required',
            'load_units' => 'required',
            'laboratory_units' => 'required',
            'laboratory_hours' => 'required',
            'total_hours' => 'required',
            'rate_per_hour' => 'required',
            'rate_per_hour_old' => 'required',
            'mins' => 'required',
            'daily_rate' => 'required',
            'salary' => 'required',
            'emolument' => 'required',
            'overload' => 'required',
            'basic' => 'required',
        ]);


        //dd($validatedData);

        
        $finds = addEmployee::find($id);
        $finds->update($request->all());


      
        return redirect()->action('AddEmployeeFController@index')
        ->withSuccessMessage('Updated Successfully!');


    }
}
