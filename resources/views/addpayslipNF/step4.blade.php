@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Payroll Computation</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-coins"></i> Monthly Pay</li>
    </ol>
</nav>
<hr>



<div class="container-fluid">


    <div class="row justify-content-between">
        <!-- Button trigger modal -->
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
            Back</a>


        <div class="mt-2 pl-2 rounded shadow">
            <small class="text-success">Choose Employee</small> <i class="fas fa-user-tie text-success"></i> /
            <small class="text-success">Calculate Absences & OT</small> <i class="fas fa-user-clock text-success"></i> /
            <small class="text-success">Computation</small> <i class="fas fa-calculator text-success"></i> /
            <small class="text-success">Overview</small> <i class="fas fa-address-book text-success"></i>
        </div>

    </div>


    <hr>

    <form method="POST" action={{ action('AddPayslipNFController@post') }} onsubmit="document.getElementById('btnSubmit').disabled=true;">
        @csrf
        <section>
            <div class="container-fluid mb-5">




                <div class="label">
                    <h5 class="text-danger">STEP 4</h5>
                </div>
                <div class="row mb-2 bg-white shadow">
                    <div class="col border border-info">
                        <h3 class="pt-2 text-secondary text-center"><i class="fas fa-receipt text-success"></i> Overview
                        </h3>
                        <hr>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="d-flex justify-content-center">
                            <div class="align-self-center  pr-5">
                                <div class="form-group">
                                    <div class="label">Employee Name:</div>
                                    @foreach ($employee as $employeeView)
                                    <h5>{{$employeeView->emp_firstname}} {{$employeeView->emp_lastname}}</h5>
                                    @endforeach
                                </div>
                            </div>
                            <div class="align-self-center  pr-5">
                                <div class="form-group">
                                    <div class="label">Employee ID:</div>
                                    <h5>{{Session::get('payslip')->employee_id}}</h5>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <div class="form-group">
                                    <div class="label">Pay Period:</div>
                                    <h5>{{  date('M. Y',strtotime(Session::get('payslip')->date))}}</h5>
    
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-end mb-1 mr-0">
                            <button class="btn btn-success" type="submit" id="btnSubmit">Proceed</button>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                    <div class="form-group text-center">
                                            <div class="label"><div class="h5"><strong class="text-success">EARNINGS</strong></div></div>
                                        <hr class="bg-success">
                                            <div class="label"><strong>Basic Pay</strong></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_basic_pay}}</h5>
                                            <div class="label"><strong>Absences/Late</strong> </div>
                                            <div class="label"><small class="text-danger">( {{date('M. d',strtotime(Session::get('payslip')->recordsFrom))}}-{{date('M. d, Y',strtotime(Session::get('payslip')->recordsTo))}} )</small></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_absences}}</h5>
                                            <div class="label"><strong>Adjustment</strong></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_adjustment}}</h5>
                                            <div class="label"><strong>Net Basic</strong></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_net_basic}}</h5>
                                            <div class="label"><strong>Cost of Living Allowance</strong></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_cost_of_living_allowance}}</h5>
                                            <div class="label"><strong>Honorarium</strong></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_honorarium}}</h5>
                                            <div class="label"><strong>Overtime</strong></div>
                                            <div class="label"><small class="text-danger">( {{date('M. d',strtotime(Session::get('payslip')->recordsFrom))}}-{{date('M. d, Y',strtotime(Session::get('payslip')->recordsTo))}} )</small></div>
                                            <div class="label"><small class="text-danger">( M-F = {{Session::get('payslip')->otOne}} - Sat. = {{Session::get('payslip')->otTwo}} )</small></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_overtime}}</h5>
                                            <div class="label"><strong>Overload</strong></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_over_load}}</h5>
                                            <div class="label"><strong>Others</strong></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_others}}</h5>
                                            <div class="label"><strong>Hold Salary Pay Out</strong></div>
                                            <h5 class="text-success">{{Session::get('payslip')->p_hold_salary_pay_out}}</h5>
                                            <hr class="bg-success">
                                        </div>
                            </div>
                            <div class="col">
                                    <div class="form-group text-center">
                                            <div class="label"><div class="h5"><strong class="text-danger">DEDUCTIONS</strong></div></div>
                                        <hr class="bg-danger">
                                            <div class="label"><strong>SSS Contribution</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_sss_contribution}}</h5>
                                            <div class="label"><strong>Philhealth Contribution</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_philhealth_contribution}}</h5>
                                            <div class="label"><strong>Pag-Ibig Contribution</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_pagibig_contribution}}</h5>
                                            <div class="label"><strong>SSS Loan Contribution</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->sss_loan_amt}}</h5>
                                            <div class="label"><strong>Pag-Ibig Loan</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->pagibig_loan_amt}}</h5>
                                            <div class="label"><strong>Tax Withheld</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_tax_withheld}}</h5>
                                            <div class="label"><strong>Cash Advance</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_cash_advance}}</h5>
                                            <div class="label"><strong>Retirement Contribution</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_retirement_contributon}}</h5>
                                            <div class="label"><strong>Christmas Loan</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_christmas_loan}}</h5>
                                            <div class="label"><strong>Retirement Loan</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_retirement_loan}}</h5>
                                            <div class="label"><strong>Other Adjustment</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_others_adjustment}}</h5>
                                            <div class="label"><strong>Other (Payable to FERN Realty)</strong></div>
                                            <h5 class="text-danger">{{Session::get('payslip')->p_others_payable_realty}}</h5>
                                            <hr class="bg-danger">
                                    </div>
                            </div>
                            <div class="col">
                                    <div class="form-group text-center">
                                            <div class="label"><div class="h5"><strong class="text-primary">TOTALS</strong></div></div>
                                        <hr class="bg-primary">
                                        <div class="label bg-success text-white"><strong>Total Earnings</strong></div>
                                            <h5 class="bg-success text-white">{{Session::get('payslip')->p_total_earnings}}</h5>
                                            <div class="label bg-danger text-white"><strong>Total Deductions</strong></div>
                                            <h5 class="bg-danger text-white">{{Session::get('payslip')->p_total_deductions}}</h5>
                                            <hr class="bg-primary">
                                            <div class="label"><div class="h5"><strong class="text-primary">HALF PAY</strong></div></div>
                                            <hr class="bg-primary">
                                            <div class="label bg-primary text-white"><strong>1st Half Pay</strong></div>
                                            <h5 class="bg-primary text-white">{{Session::get('payslip')->p_first_half_pay}}</h5>
                                            <div class="label bg-primary text-white"><strong>2nd Half Pay</strong></div>
                                            <h5 class="bg-primary text-white">{{Session::get('payslip')->p_second_half_pay}}</h5>
                                            <hr class="bg-primary">
                                            <div class="label"><div class="h5"><strong class="text-primary">MONTHLY PAY</strong></div></div>
                                            <hr class="bg-primary">
                                            <div class="label bg-primary text-white"><strong>Monthly Pay</strong></div>
                                            <h5 class="bg-primary text-white">{{Session::get('payslip')->p_monthly_pay}}</h5>
                            </div>
                        </div>
                    </div>



                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
@endsection