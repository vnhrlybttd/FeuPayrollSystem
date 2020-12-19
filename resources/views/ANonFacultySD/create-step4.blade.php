@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> Employee Management</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Non Faculty
        </li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-address-card"></i> Add Employee
        </li>
    </ol>
</nav>
<hr>

<div class="container-fluid">


    <div class="row justify-content-between">
        <!-- Button trigger modal -->
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
            Back</a>

            <div class="mt-2 pl-2 rounded shadow">
                    <small class="text-success">Employee</small> <i class="fas fa-user text-success"> / </i>
                    <small class="text-success">Salary Details</small> <i class="fas fa-coins text-success"></i> /
                    <small class="text-success">Calculate Absence</small> <i class="fas fa-user-clock text-success"></i> /
                    <small class="text-success">Payslip</small> <i class="fas fa-receipt text-success"></i> /
                    <small class="text-success">Overview</small> <i class="fas fa-address-book text-success"></i>
            </div>

    </div>


</div>


<hr>
<form method="POST" action={{ action('ANFSDstepsController@postNF') }}>
    @csrf
    <section>
        <div class="container-fluid mb-5">

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
                <hr>
            </div>
            @endif


            <div class="label">
                <h5 class="text-danger">STEP 5</h5>
            </div>
            <div class="row mb-5 bg-white shadow-lg">
                <div class="col border border-info">
                    <h3 class="pt-2 text-secondary text-center"><i class="fas fa-address-card text-success"></i>
                        Overview
                    </h3>
                    <hr>

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
                                <h5>{{Session::get('anfsd')->emp_id}}</h5>
                            </div>
                        </div>
                        <div class="align-self-center">
                            <div class="form-group">
                                <div class="label">Pay Period:</div>
                                <h5>{{  date('M. Y',strtotime(Session::get('anfsd')->date))}}</h5>

                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-4 shadow">
                            <h3 class="pt-2 text-secondary text-center">
                                <i class="fas fa-user text-primary"></i> Basic Salary Details
                            </h3>
                            <hr>

                            <div class="form-group text-center">
                                <div class="label"><strong>Salary</strong></div>
                                <h5 class="text-primary">{{Session::get('anfsd')->salary}}</h5>
                                <div class="label"><strong>Daily Rate</strong></div>
                                <h5 class="text-primary">{{Session::get('anfsd')->daily_rate}}</h5>
                                <div class="label"><strong>Rate per Hour</strong></div>
                                <h5 class="text-primary">{{Session::get('anfsd')->rate_per_hour}}</h5>
                                <div class="label"><strong>mins</strong></div>
                                <h5 class="text-primary">{{Session::get('anfsd')->mins}}</h5>
                                <div class="label"><strong>Basic</strong></div>
                                <h5 class="text-primary">{{Session::get('anfsd')->basic}}</h5>
                                <div class="label"><strong>Emolument</strong></div>
                                <h5 class="text-primary">{{Session::get('anfsd')->emolument}}</h5>
                                <div class="label"><strong>Total Basic Salary</strong></div>
                                <h5 class="text-primary">{{Session::get('anfsd')->total_basic_salary}}</h5>
                            </div>
                        </div>
                        <div class="col-8 shadow">
                            <h3 class="pt-2 text-secondary text-center">
                                <i class="fas fa-receipt text-primary"></i> Payslip
                            </h3>
                            <hr>

                            <div class="row">
                                <div class="col">
                                        <div class="form-group text-center">
                                                <div class="label"><div class="h5"><strong class="text-success">EARNINGS</strong></div></div>
                                            <hr class="bg-success">
                                                <div class="label"><strong>Basic Pay</strong></div>
                                                <h5 class="text-success">{{Session::get('anfsd')->p_basic_pay}}</h5>
                                                <div class="label"><strong>Absences/Late</strong> </div>
                                                <div class="label"><small class="text-danger">( {{date('M. d',strtotime(Session::get('anfsd')->recordsFrom))}}-{{date('M. d, Y',strtotime(Session::get('anfsd')->recordsTo))}} )</small></div>
                                                <h5 class="text-success">{{Session::get('anfsd')->p_absences}}</h5>
                                                <div class="label"><strong>Adjustment</strong></div>
                                                <h5 class="text-success">{{Session::get('anfsd')->p_adjustment}}</h5>
                                                <div class="label"><strong>Net Basic</strong></div>
                                                <h5 class="text-success">{{Session::get('anfsd')->p_net_basic}}</h5>
                                                <div class="label"><strong>Cost of Living Allowance</strong></div>
                                                <h5 class="text-success">{{Session::get('anfsd')->p_cost_of_living_allowance}}</h5>
                                                <div class="label"><strong>Honorarium</strong></div>
                                                <h5 class="text-success">{{Session::get('anfsd')->p_honorarium}}</h5>
                                                <div class="label"><strong>Overtime</strong></div>
                                                <h5 class="text-success">{{Session::get('anfsd')->p_overtime}}</h5>
                                                <div class="label"><strong>Others</strong></div>
                                                <h5 class="text-success">{{Session::get('anfsd')->p_others}}</h5>
                                                <div class="label"><strong>Hold Salary Pay Out</strong></div>
                                                <h5 class="text-success">{{Session::get('anfsd')->p_hold_salary_pay_out}}</h5>
                                                <hr class="bg-success">
                                            </div>
                                </div>
                                <div class="col">
                                        <div class="form-group text-center">
                                                <div class="label"><div class="h5"><strong class="text-danger">DEDUCTIONS</strong></div></div>
                                            <hr class="bg-danger">
                                                <div class="label"><strong>SSS Contribution</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_sss_contribution}}</h5>
                                                <div class="label"><strong>Philhealth Contribution</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_philhealth_contribution}}</h5>
                                                <div class="label"><strong>Pag-Ibig Contribution</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_pagibig_contribution}}</h5>
                                                <div class="label"><strong>SSS Loan Contribution</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_sss_loan}}</h5>
                                                <div class="label"><strong>Pag-Ibig Loan</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_pagibig_loan}}</h5>
                                                <div class="label"><strong>Tax Withheld</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_tax_withheld}}</h5>
                                                <div class="label"><strong>Cash Advance</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_cash_advance}}</h5>
                                                <div class="label"><strong>Retirement Contribution</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_retirement_contributon}}</h5>
                                                <div class="label"><strong>Christmas Loan</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_christmas_loan}}</h5>
                                                <div class="label"><strong>Retirement Loan</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_retirement_loan}}</h5>
                                                <div class="label"><strong>Other Adjustment</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_others_adjustment}}</h5>
                                                <div class="label"><strong>Other (Payable to FERN Realty)</strong></div>
                                                <h5 class="text-danger">{{Session::get('anfsd')->p_others_payable_realty}}</h5>
                                                <hr class="bg-danger">
                                        </div>
                                </div>
                                <div class="col">
                                        <div class="form-group text-center">
                                                <div class="label"><div class="h5"><strong class="text-primary">TOTALS</strong></div></div>
                                            <hr class="bg-primary">
                                            <div class="label bg-success text-white"><strong>Total Earnings</strong></div>
                                                <h5 class="bg-success text-white">{{Session::get('anfsd')->p_total_earnings}}</h5>
                                                <div class="label bg-danger text-white"><strong>Total Deductions</strong></div>
                                                <h5 class="bg-danger text-white">{{Session::get('anfsd')->p_total_deductions}}</h5>
                                                <hr class="bg-primary">
                                                <div class="label"><div class="h5"><strong class="text-primary">HALF PAY</strong></div></div>
                                                <hr class="bg-primary">
                                                <div class="label bg-primary text-white"><strong>1st Half Pay</strong></div>
                                                <h5 class="bg-primary text-white">{{Session::get('anfsd')->p_first_half_pay}}</h5>
                                                <div class="label bg-primary text-white"><strong>Total Deductions</strong></div>
                                                <h5 class="bg-primary text-white">{{Session::get('anfsd')->p_total_deductions}}</h5>
                                                <hr class="bg-primary">
                                                <div class="label"><div class="h5"><strong class="text-primary">MONTHLY PAY</strong></div></div>
                                                <hr class="bg-primary">
                                                <div class="label bg-primary text-white"><strong>Monthly Pay</strong></div>
                                                <h5 class="bg-primary text-white">{{Session::get('anfsd')->p_monthly_pay}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-10">
                            <div class="form-group">
                                <div class="label"><strong>Remarks</strong></div>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-2 mt-5 text-right">
                            <button class="btn btn-success">Submit</button>
                        </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</form>
@endsection
