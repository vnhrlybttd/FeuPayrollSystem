<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payslip;
use App\hr_employee;

class MasterFileReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //---------------------------------------------NON FACULTY ---------------------------------------------------------------------//
        $reports = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('nonfacultydetails', 'nonfacultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','nonfacultydetails.*'])
        ->get();

        $total_basic_salary = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('nonfacultydetails', 'nonfacultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','nonfacultydetails.*'])
        ->sum('total_basic_salary');

        
        $basic = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('nonfacultydetails', 'nonfacultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','nonfacultydetails.*'])
        ->sum('basic');

        $emolument = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('nonfacultydetails', 'nonfacultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','nonfacultydetails.*'])
        ->sum('emolument');

        $salary = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('nonfacultydetails', 'nonfacultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','nonfacultydetails.*'])
        ->sum('salary');

        $total_absence = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('nonfacultydetails', 'nonfacultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','nonfacultydetails.*'])
        ->sum('total_absence');

       

        //---------------------------------------------FACULTY ---------------------------------------------------------------------//

        $faculty = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('facultydetails', 'facultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','facultydetails.*'])
        ->get();

        $Faculty_salary = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('facultydetails', 'facultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','facultydetails.*'])
        ->sum('salary');

        $Faculty_basic = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('facultydetails', 'facultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','facultydetails.*'])
        ->sum('basic');

        $Faculty_emolument = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('facultydetails', 'facultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','facultydetails.*'])
        ->sum('emolument');

        $Faculty_overload = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('facultydetails', 'facultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','facultydetails.*'])
        ->sum('overload');

        $Faculty_total_basic_salary = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('facultydetails', 'facultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','facultydetails.*'])
        ->sum('total_basic_salary');

        $Faculty_total_absence = hr_employee::join('users', 'hr_employee.emp_pin', '=', 'users.emp_id')
        ->join('facultydetails', 'facultydetails.emp_id', '=', 'users.emp_id')
        ->select(['hr_employee.*','users.*','facultydetails.*'])
        ->sum('total_absence');


        //dd($faculty);
        return view('masterfile.index',compact('reports','total_basic_salary','basic','emolument','salary','total_absence','faculty',
        'Faculty_total_absence','Faculty_total_basic_salary','Faculty_overload','Faculty_salary','Faculty_basic','Faculty_emolument'));
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
