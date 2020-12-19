<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ANFSD;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ANFPayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $table = ANFSD::join('users','users.emp_id','=','anfsd.emp_id')
        ->where('admin_approval','=','Pending')
        ->get();

        $tables = ANFSD::join('users','users.emp_id','=','anfsd.emp_id')
        ->where('admin_approval','=','Approved')
        ->get();

        $tablesss = ANFSD::join('users','users.emp_id','=','anfsd.emp_id')
        ->where('admin_approval','=','Rejected')
        ->get();

        //dd($table);
        if(session('success_message')){
            Alert::success('Succcess',session('success_message'));
        }

        return view('ANonFacultyPayslip.index',compact('table','tables','tablesss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
