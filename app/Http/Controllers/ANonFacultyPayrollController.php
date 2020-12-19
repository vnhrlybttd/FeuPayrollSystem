<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ANFPayroll;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ANonFacultyPayrollController extends Controller
{
    public function index(){

        $table = DB::table('anfpayroll')
        ->get();


        //dd($table);
        return view ('ANonFacultyPayroll.index',compact('table'));
    }

    public function create(){
        return view ('ANonFacultyPayroll.create');
    }

    public function createPayroll(Request $request){


        
        $request->validate([
            'date' => 'required',
            'paydate' => 'required'
        ]);

        //$date = $request->get('date');
        //$paydate = $request->get('paydate');


        //$admin_approvals = ['Approved'];

        //$anfsdTable = DB::Table('anfsd')
        //->where('date','=',$date)
        //->whereIn('admin_approval',$admin_approvals)
        //->get();

        ANFPayroll::create($request->all());
        

        //dd($anfsdTable);
        return redirect()->action('ANonFacultyPayrollController@index');
    }
    public function show($id){


        $table = DB::table('anfpayroll')
        ->get();

        dd($table);
        return view ('ANonFacultyPayroll.show');
    }
    
}
