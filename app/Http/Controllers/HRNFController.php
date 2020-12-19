<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;
use App\addEmployee;


class HRNFController extends Controller
{
    public function index(){

        $table = DB::table('addemployee')
        ->join('hr_employee','hr_employee.emp_pin','=','addemployee.emp_id')
        ->join('users','users.emp_id','=','addemployee.emp_id')
        ->where('status','=','1')
        ->orderBY('add_id','desc')
        ->get();


     
        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }

        return view('hremployee.index',compact('table'));

    }

    public function step1(Request $request){

        $employee = DB::table('hr_employee')
        ->join('users','users.emp_id','=','hr_employee.emp_pin')
        ->where('status','=','1')
        ->where('user_status','=','0')
        ->where('user_status_f','=','0')
        ->orderBY('emp_id','desc')
        ->get();

        //dd($employee);

        $addemployee = $request->session()->get('addemployee');
        return view('hremployee.create',compact('addemployee', $addemployee,'employee'));
    }

    public function step2(Request $request){

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

        return view('hremployee.step1',compact('employee','cost_center'));
    }

    public function submit(Request $request){

        $validatedData = $request->validate([
            'emp_id' => 'required',
            'middle_name' => 'required',
            'sss_number' => 'required',
            'philhealth_number' => 'required',
            'pagibig_number' => 'required',
            'tin_number' => 'required',
            'bpi_account' => 'required',
            'cost_center' => 'required',
            'employment_status' => 'required',
        ]);

        $addemployee = $request->session()->get('addemployee');

   
        $emp_id = $request->session()->get('addemployee')->emp_id;
            /*
       
        $middle_name = $request->session()->get('addemployee')->middle_name;
        $sss_number = $request->session()->get('addemployee')->sss_number;
        $philhealth_number = $request->session()->get('addemployee')->philhealth_number;
        $pagibig_number = $request->session()->get('addemployee')->pagibig_number;
        $tin_number = $request->session()->get('addemployee')->tin_number;
        $bpi_account = $request->session()->get('addemployee')->bpi_account;
        $cost_center = $request->session()->get('addemployee')->cost_center;
        $employment_status = $request->session()->get('addemployee')->employment_status;
*/





        $sample = addEmployee::create($request->all());

        //dd($sample);
            /*
            [
            'emp_id' => $emp_id,
            'middle_name' => $middle_name,
            'sss_number' => $sss_number,
            'philhealth_number' => $philhealth_number,
            'pagibig_number' => $pagibig_number,
            'tin_number' => $tin_number,
            'bpi_account' => $bpi_account,
            'cost_center' => $cost_center,
            'employment_status' => $employment_status,
            ]);*/



           // dd($sample);

        $finds = DB::table('users')
        ->select('user_status','emp_id')
        ->where('emp_id','=',$emp_id)
        ->update(['user_status'=>'1']);

       
        
  
        
            
            return redirect()->action('HRNFController@index')
            ->withSuccessMessage('Added Successfully!');

    }

    public function edit(Request $request,$id){

        $find = DB::table('addemployee')
        ->where('add_id','=',Crypt::decrypt($id))
        ->join('hr_employee','hr_employee.emp_pin','addemployee.emp_id')
        ->first();

        $cost_center = DB::table('costcenter')->get();

        //$emp_id = $find->first('emp_id');

        //dd($find);
        return view('hremployee.edit',compact('find','cost_center'));
    }

    public function update(Request $request,$id){


        $validatedData = $request->validate([
            'sss_number' => 'required',
            'philhealth_number' => 'required',
            'pagibig_number' => 'required',
            'tin_number' => 'required',
            'bpi_account' => 'required',
            'cost_center' => 'required',
            'employment_status' => 'required',
        ]);

        $finds = addEmployee::find($id);
        $finds->update($request->all());

   


        return redirect()->action('HRNFController@index')
        ->withSuccessMessage('Updated Successfully!');

    }


}
