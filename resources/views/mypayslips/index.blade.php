@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payslips</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Payslips</li>
    </ol>
</nav>
<hr>

<div class="container-fluid">
<div class="shadow bg-white mb-5">
        <div class="table-responsive p-3 bg-white">
        <table class="table table-hover table-bordered text-center bg-white" id="myTable">
                <thead class="thead-info">
                  <tr>
                    <th scope="col">Payslip No.</th>
                    <th>Month</th>
                    <th>PDF</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>
                  @if($endUsers === true) 
                 @foreach ($payslip as $viewPayslip)
                     <tr>
                     <td>{{$viewPayslip->payslip}}</td>
                     <td>{{$viewPayslip->date}}</td>
                    
                    <td><a class="btn btn-success" href="{{action('PayslipPDFController@downloadPDF', [Crypt::encrypt($viewPayslip->payslip)])}}">Print </a></td>
                     <td>
                         
                     

                            @if ($viewPayslip->type === "Non-Faculty")
                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                            data-target="#b{{$viewPayslip->payslip}}" aria-expanded="false"
                            aria-controls="collapseExample">
                            Basic Salary
                        </button>


                        <div class="collapse" id="b{{$viewPayslip->payslip}}">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col">
                                        <b class="h5">BASIC SALARY DETAILS</b>
                                        <hr class="bg-primary">
                                        <div class="h5 text-left"><b>Salary:</b> <u>{{$viewPayslip->a_salary}}</u>
                                        </div>
                                        <div class="h5 text-left"><b>Daily Rate:</b>
                                            <u>{{$viewPayslip->a_daily_rate}}</u></div>
                                        <div class="h5 text-left"><b>Rate Per Hour:</b>
                                            <u>{{$viewPayslip->a_rate_per_hour}}</u></div>
                                        <div class="h5 text-left"><b>Mins:</b> <u>{{$viewPayslip->a_mins}}</u></div>
                                        <div class="h5 text-left"><b>Basic:</b> <u>{{$viewPayslip->a_basic}}</u>
                                        </div>
                                        <div class="h5 text-left"><b>Emolument:</b>
                                            <u>{{$viewPayslip->a_emolument}}</u></div>
                                        <div class="h5 text-left"><b>Total Basic Salary:</b>
                                            <u>{{$viewPayslip->a_total_basic_salary}}</u></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($viewPayslip->type === "Faculty")

                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                        data-target="#b{{$viewPayslip->payslip}}" aria-expanded="false"
                        aria-controls="collapseExample">
                        Basic Salary
                    </button>

                        <div class="collapse" id="b{{$viewPayslip->payslip}}">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col">
                                                <b class="h5">BASIC SALARY DETAILS</b>
                                                <hr class="bg-primary">
                                                <div class="h5 text-left"><b>Load Units:</b> <u>{{$viewPayslip->a_load_units}}</u></div>
                                                <div class="h5 text-left"><b>Laboratory Total Units:</b> <u>{{$viewPayslip->a_laboratory_total_units}}</u></div>
                                                <div class="h5 text-left"><b>Laboratory Total Hours:</b> <u>{{$viewPayslip->a_laboratory_total_hours}}</u></div>
                                                <div class="h5 text-left"><b>Total Hours:</b> <u>{{$viewPayslip->a_total_hours}}</u></div>
                                                <div class="h5 text-left"><b>Rate per Hour:</b> <u>{{$viewPayslip->a_rate_per_hour}}</u></div>
                                                <div class="h5 text-left"><b>Rate per Hour (old):</b> <u>{{$viewPayslip->a_rate_per_hour_old}}</u></div>
                                                <div class="h5 text-left"><b>mins:</b> <u>{{$viewPayslip->a_mins}}</u></div>
                                                <div class="h5 text-left"><b>Daily Rate:</b> <u>{{$viewPayslip->a_daily_rate}}</u></div>
                                                <div class="h5 text-left"><b>Salary:</b> <u>{{$viewPayslip->a_salary}}</u></div>
                                                <div class="h5 text-left"><b>Basic:</b> <u>{{$viewPayslip->a_basic}}</u></div>
                                                <div class="h5 text-left"><b>Emolument:</b> <u>{{$viewPayslip->a_emolument}}</u></div>
                                                <div class="h5 text-left"><b>Overload:</b> <u>{{$viewPayslip->a_overload}}</u></div>
                                                <div class="h5 text-left"><b>Total Basic Salary:</b> <u>{{$viewPayslip->a_total_basic_salary}}</u></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endif

                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                        data-target="#a{{$viewPayslip->payslip}}" aria-expanded="false"
                        aria-controls="collapseExample">
                        View Payslip
                    </button>

                        <div class="collapse" id="a{{$viewPayslip->payslip}}">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col">
                                        <b class="h5">EARNINGS</b>
                                        <hr class="bg-success">
                                        <div class="h5 text-left"><b>Basic Pay:</b>
                                            <u>{{$viewPayslip->p_basic_pay}}</u></div>
                                        <div class="h5 text-left"><b>Absences/Lates:</b>
                                            <u>{{$viewPayslip->p_absences}}</u></div>
                                        <div class="h5 text-left"><b>Adjustment:</b>
                                            <u>{{$viewPayslip->p_adjustment}}</u></div>
                                        <div class="h5 text-left"><b>Net Basic:</b>
                                            <u>{{$viewPayslip->p_net_basic}}</u></div>
                                        <div class="h5 text-left"><b>Cost of Living Allowance:</b>
                                            <u>{{$viewPayslip->p_cost_of_living_allowance}}</u></div>
                                        <div class="h5 text-left"><b>Honorarium:</b>
                                            <u>{{$viewPayslip->p_honorarium}}</u></div>
                                        <div class="h5 text-left"><b>Overtime: </b>
                                            <u>{{$viewPayslip->p_overtime}}</u></div>
                                        <div class="h5 text-left"><b>Over Load:</b>
                                            <u>{{$viewPayslip->p_over_load}}</u></div>
                                        <div class="h5 text-left"><b>Others: </b>
                                            <u>{{$viewPayslip->p_others}}</u></div>
                                        <div class="h5 text-left"><b>Hold Salary Pay Out:</b>
                                            <u>{{$viewPayslip->p_hold_salary_pay_out}}</u></div>
                                    </div>
                                    <div class="col">
                                        <h5>DEDUCTIONS</h5>
                                        <hr class="bg-danger">
                                        <div class="h5 text-left"><b>SSS Contribution:</b>
                                            <u>{{$viewPayslip->p_sss_contribution}}</u></div>
                                        <div class="h5 text-left"><b>Philhealth Contribution:</b>
                                            <u>{{$viewPayslip->p_philhealth_contribution}}</u></div>
                                        <div class="h5 text-left"><b>Pagibig Contribution:</b>
                                            <u>{{$viewPayslip->p_pagibig_contribution}}</u></div>
                                        <div class="h5 text-left"><b>SSS Loan Contribution:</b>
                                            <u>{{$viewPayslip->p_sss_loan}}</u></div>
                                        <div class="h5 text-left"><b>Pag-ibig Contribution:</b>
                                            <u>{{$viewPayslip->p_pagibig_loan}}</u></div>
                                        <div class="h5 text-left"><b>Tax Withheld:</b>
                                            <u>{{$viewPayslip->p_tax_withheld}}</u></div>
                                        <div class="h5 text-left"><b>Cash Advance:</b>
                                            <u>{{$viewPayslip->p_cash_advance}}</u></div>
                                        <div class="h5 text-left"><b>Retirement Contribution:</b>
                                            <u>{{$viewPayslip->p_retirement_contributon}}</u></div>
                                        <div class="h5 text-left"><b>Christmas Loan:</b>
                                            <u>{{$viewPayslip->p_christmas_loan}}</u></div>
                                        <div class="h5 text-left"><b>Retirement Loan:</b>
                                            <u>{{$viewPayslip->p_retirement_loan}}</u></div>
                                        <div class="h5 text-left"><b>Other Adjustment:</b>
                                            <u>{{$viewPayslip->p_others_adjustment}}</u></div>
                                        <div class="h5 text-left"><b>Others(Payable to FERN Realty):</b>
                                            <u>{{$viewPayslip->p_others_payable_realty}}</u></div>
                                    </div>

                                </div>
                                <hr class="bg-secondary">
                                <div class="row">
                                    <div class="col">
                                        <b class="h5">TOTALS</b>
                                        <hr class="bg-primary">
                                        <div class="row">
                                            <div class="col">
                                                <div class="h5 text-center bg-success text-white"><b>Total
                                                        Earnings:</b> <u>{{$viewPayslip->p_total_earnings}}</u>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="h5 text-center bg-danger text-white"><b>Total
                                                        Deductions:</b>
                                                    <u>{{$viewPayslip->p_total_deductions}}</u></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="h5 text-center bg-primary text-white"><b>1st Half
                                                        Pay:</b> <u>{{$viewPayslip->p_first_half_pay}}</u></div>
                                            </div>
                                            <div class="col">
                                                <div class="h5 text-center bg-primary text-white"><b>2nd Half
                                                        Pay:</b> <u>{{$viewPayslip->p_second_half_pay}}</u></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="h5 text-center bg-primary text-white"><b>Monthly
                                                        Pay</b> <u>{{$viewPayslip->p_monthly_pay}}</u></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </td>
                     </tr>
                 @endforeach
                 @endif
                </tbody>
              </table>
        </div>
</div>
</div>

@endsection