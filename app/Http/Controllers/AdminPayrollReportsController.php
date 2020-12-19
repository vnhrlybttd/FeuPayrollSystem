<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use PDF;
use Dompdf\Dompdf;

class AdminPayrollReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpayroll.index');
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
          
        $request->validate([
            'months' => 'required'
        ]);

        $months = $request->get('months');

        $table = DB::table('anfsd')
        ->join('users','users.emp_id','=','anfsd.emp_id')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->get();


        //-------------------------SALARY DETAILS --------------------//
        $salary = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('salary')
        ->sum('salary');

        $p_thirteen_month_pay = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_thirteen_month_pay')
        ->sum('p_thirteen_month_pay');

        $basic = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('basic')
        ->sum('basic');

        $emolument = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('emolument')
        ->sum('emolument');

        $total_basic_salary = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('total_basic_salary')
        ->sum('total_basic_salary');

        
        //------------------------END OF SALARY DETAILS ----------------//


        //---------------------------EARNINGS -------------------//

        $p_basic_pay = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_basic_pay')
        ->sum('p_basic_pay');

        $p_absences = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_absences')
        ->sum('p_absences');

        $p_adjustment = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_adjustment')
        ->sum('p_adjustment');

        $p_net_basic = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_net_basic')
        ->sum('p_net_basic');

        $p_cost_of_living_allowance = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_cost_of_living_allowance')
        ->sum('p_cost_of_living_allowance');

        $p_honorarium = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_honorarium')
        ->sum('p_honorarium');

        $p_overtime = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_overtime')
        ->sum('p_overtime');

        $p_over_load = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_over_load')
        ->sum('p_over_load');

        $p_others = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_others')
        ->sum('p_others');

        $p_hold_salary_pay_out = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_hold_salary_pay_out')
        ->sum('p_hold_salary_pay_out');

        $p_total_earnings = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_total_earnings')
        ->sum('p_total_earnings');



        //--------------------------END OF EARNINGS --------------------//
        


        //--------------------------------DEDUCTIONS----------------------------------//

        $p_sss_contribution = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_sss_contribution')
        ->sum('p_sss_contribution');
        
        $p_philhealth_contribution = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_philhealth_contribution')
        ->sum('p_philhealth_contribution');

        $p_pagibig_contribution = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_pagibig_contribution')
        ->sum('p_pagibig_contribution');

        $p_sss_loan = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_sss_loan')
        ->sum('p_sss_loan');

        $p_pagibig_loan = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_pagibig_loan')
        ->sum('p_pagibig_loan');

        $p_tax_withheld = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_tax_withheld')
        ->sum('p_tax_withheld');

        $p_cash_advance = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_cash_advance')
        ->sum('p_cash_advance');

        $p_retirement_contributon = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_retirement_contributon')
        ->sum('p_retirement_contributon');

        $p_christmas_loan = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_christmas_loan')
        ->sum('p_christmas_loan');

        $p_retirement_loan = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_retirement_loan')
        ->sum('p_retirement_loan');

        $p_others_adjustment = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_others_adjustment')
        ->sum('p_others_adjustment');

        $p_others_payable_realty = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_others_payable_realty')
        ->sum('p_others_payable_realty');

        $p_total_deductions = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_total_deductions')
        ->sum('p_total_deductions');

        
        $p_total_non_taxable = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_total_non_taxable')
        ->sum('p_total_non_taxable');

        
        $p_taxable_income = DB::table('anfsd')
        ->where('date','=',$months)
        ->where('admin_approval','=','Approved')
        ->select('p_taxable_income')
        ->sum('p_taxable_income');

      


        





        //------------------------------------END OF DEDUCTIONs ------------------------------//

        //dd($salary);
        
        
        $dompdf = new DOMPDF();
        $dompdf->load_html('...');
        $dompdf->render();
        $dompdf->set_base_path("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('adminpayroll.pdf',compact('table','months',
        'salary','p_thirteen_month_pay','basic','emolument','total_basic_salary',
        'p_basic_pay','p_absences','p_adjustment','p_net_basic','p_cost_of_living_allowance','p_honorarium',
        'p_overtime','p_over_load','p_others','p_hold_salary_pay_out','p_total_earnings',
        'p_sss_contribution','p_philhealth_contribution','p_pagibig_contribution','p_sss_loan','p_pagibig_loan','p_tax_withheld','p_cash_advance','p_retirement_contributon',
        'p_christmas_loan','p_retirement_loan','p_others_adjustment','p_others_payable_realty','p_total_deductions','p_total_non_taxable','p_taxable_income'
        ))->setPaper('a4', 'landscape');
        return $pdf->stream('adminpayroll.pdf');

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
