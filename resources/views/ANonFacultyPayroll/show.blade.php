@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Payroll</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Generate Payroll</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Payroll</li>
    </ol>
</nav>
<hr>
<a class="btn btn-primary mr-1" href="javascript:history.back()"> <i class="fas fa-arrow-circle-left"></i> Back</a>






<hr>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="nf-tab" data-toggle="tab" href="#nf" role="tab" aria-controls="nf"
            aria-selected="true">Non-Faculty</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="f-tab" data-toggle="tab" href="#f" role="tab" aria-controls="f"
            aria-selected="false">Faculty</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="nf" role="tabpanel" aria-labelledby="nf-tab">

        <div class="container-fluid shadow bg-white">


            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-scroll text-primary"></i> Payroll for {{date('M. Y',strtotime($id))}}
            </h3>
            <hr>

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" id="myTable" class="display">
                    <thead class="thead-dark">
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Pay Status</th>
                            <th>Payslip Status</th>
                            <th style="width: 50%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table as $view)
                        <tr>
                            <td>{{$view->emp_id}}</td>
                            <td>{{$view->first_name}} {{$view->last_name}}</td>
                            <td>
                                <div class="row">
                                    <div class="col">1st Half Pay</div>
                                </div>
                                @if($view->first_status_pay == 1)<span class="badge badge-success"><i
                                        class="fas fa-check-circle text-white"></i> Paid</span>
                                @elseif($view->first_status_pay == 0)
                                <span class="badge badge-danger"><i class="fas fa-times-circle text-white"></i> Not
                                    Paid</span>
                                @endif

                                <div class="row">
                                    <div class="col">2nd Half Pay</div>
                                </div>
                                @if($view->second_status_pay == 1)<span class="badge badge-success"><i
                                        class="fas fa-check-circle text-white"></i> Paid</span>
                                @elseif($view->second_status_pay == 0)
                                <span class="badge badge-danger"><i class="fas fa-times-circle text-white"></i> Not
                                    Paid</span>
                                @endif

                            </td>

                            @if($view->admin_approval == 'Approved')
                            <td>
                                <span class="badge badge-success"><i class="far fa-check-square"></i>
                                    Approved</span>
                            </td>
                            @elseif($view->admin_approval == 'Pending')
                            <td>
                                <span class="badge badge-primary"><i class="far fa-hourglass"></i>
                                    Pending </span>
                            </td>
                            @elseif($view->admin_approval == 'Rejected')
                            <td>
                                <span class="badge badge-danger"><i class="far fa-times-alt"></i>
                                    Rejected </span>
                            </td>
                            @endif

                            <td>



                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#b{{$view->id}}" aria-expanded="false" aria-controls="collapseExample">
                                    Basic Salary
                                </button>



                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#a{{$view->id}}" aria-expanded="false" aria-controls="collapseExample">
                                    View Payslip
                                </button>


                                <div class="collapse" id="b{{$view->id}}">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col">
                                                <b class="h5">BASIC SALARY DETAILS</b>
                                                <hr class="bg-primary">
                                                <div class="h5 text-left"><b>Salary:</b> <u>{{$view->a_salary}}</u>
                                                </div>
                                                <div class="h5 text-left"><b>Daily Rate:</b>
                                                    <u>{{$view->a_daily_rate}}</u></div>
                                                <div class="h5 text-left"><b>Rate Per Hour:</b>
                                                    <u>{{$view->a_rate_per_hour}}</u></div>
                                                <div class="h5 text-left"><b>Mins:</b> <u>{{$view->a_mins}}</u></div>
                                                <div class="h5 text-left"><b>Basic:</b> <u>{{$view->a_basic}}</u>
                                                </div>
                                                <div class="h5 text-left"><b>Emolument:</b>
                                                    <u>{{$view->a_emolument}}</u></div>
                                                <div class="h5 text-left"><b>Total Basic Salary:</b>
                                                    <u>{{$view->a_total_basic_salary}}</u></div>
                                                <div class="h5 text-left"><b>Total Absences/Lates:</b>
                                                    <u>{{$view->p_absences}}</u></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="collapse" id="a{{$view->id}}">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col">
                                                <b class="h5">EARNINGS</b>
                                                <hr class="bg-success">
                                                <div class="h5 text-left"><b>Basic Pay:</b>
                                                    <u>{{$view->p_basic_pay}}</u></div>
                                                <div class="h5 text-left"><b>Absences/Lates:</b>
                                                    <u>{{$view->p_absences}}</u></div>
                                                <div class="h5 text-left"><b>Adjustment:</b>
                                                    <u>{{$view->p_adjustment}}</u></div>
                                                <div class="h5 text-left"><b>Net Basic:</b>
                                                    <u>{{$view->p_net_basic}}</u></div>
                                                <div class="h5 text-left"><b>Cost of Living Allowance:</b>
                                                    <u>{{$view->p_cost_of_living_allowance}}</u></div>
                                                <div class="h5 text-left"><b>Honorarium:</b>
                                                    <u>{{$view->p_honorarium}}</u></div>
                                                <div class="h5 text-left"><b>Overtime: </b> <u>{{$view->p_overtime}}</u>
                                                </div>
                                                <div class="h5 text-left"><b>Over Load:</b>
                                                    <u>{{$view->p_over_load}}</u></div>
                                                <div class="h5 text-left"><b>Others: </b> <u>{{$view->p_others}}</u>
                                                </div>
                                                <div class="h5 text-left"><b>Hold Salary Pay Out:</b>
                                                    <u>{{$view->p_hold_salary_pay_out}}</u></div>
                                            </div>
                                            <div class="col">
                                                <h5>DEDUCTIONS</h5>
                                                <hr class="bg-danger">
                                                <div class="h5 text-left"><b>SSS Contribution:</b>
                                                    <u>{{$view->p_sss_contribution}}</u></div>
                                                <div class="h5 text-left"><b>Philhealth Contribution:</b>
                                                    <u>{{$view->p_philhealth_contribution}}</u></div>
                                                <div class="h5 text-left"><b>Pagibig Contribution:</b>
                                                    <u>{{$view->p_pagibig_contribution}}</u></div>
                                                <div class="h5 text-left"><b>SSS Loan Contribution:</b>
                                                    <u>{{$view->p_sss_loan}}</u></div>
                                                <div class="h5 text-left"><b>Pag-ibig Contribution:</b>
                                                    <u>{{$view->p_pagibig_loan}}</u></div>
                                                <div class="h5 text-left"><b>Tax Withheld:</b>
                                                    <u>{{$view->p_tax_withheld}}</u></div>
                                                <div class="h5 text-left"><b>Cash Advance:</b>
                                                    <u>{{$view->p_cash_advance}}</u></div>
                                                <div class="h5 text-left"><b>Retirement Contribution:</b>
                                                    <u>{{$view->p_retirement_contributon}}</u></div>
                                                <div class="h5 text-left"><b>Christmas Loan:</b>
                                                    <u>{{$view->p_christmas_loan}}</u></div>
                                                <div class="h5 text-left"><b>Retirement Loan:</b>
                                                    <u>{{$view->p_retirement_loan}}</u></div>
                                                <div class="h5 text-left"><b>Other Adjustment:</b>
                                                    <u>{{$view->p_others_adjustment}}</u></div>
                                                <div class="h5 text-left"><b>Others(Payable to FERN Realty):</b>
                                                    <u>{{$view->p_others_payable_realty}}</u></div>
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
                                                                Earnings:</b> <u>{{$view->p_total_earnings}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="h5 text-center bg-danger text-white"><b>Total
                                                                Deductions:</b> <u>{{$view->p_total_deductions}}</u>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="h5 text-center bg-primary text-white"><b>1st Half
                                                                Pay:</b> <u>{{$view->p_first_half_pay}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="h5 text-center bg-primary text-white"><b>2nd Half
                                                                Pay:</b> <u>{{$view->p_second_half_pay}}</u></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="h5 text-center bg-primary text-white"><b>Monthly
                                                                Pay</b> <u>{{$view->p_monthly_pay}}</u></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="f" role="tabpanel" aria-labelledby="f-tab">

        <div class="container-fluid shadow bg-white">


            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-scroll text-primary"></i> Payroll for {{date('M. Y',strtotime($id))}}
            </h3>
            <hr>

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" id="PONE" class="display">
                    <thead class="thead-dark">
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Pay Status</th>
                            <th>Payslip Status</th>
                            <th colspan="0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tables as $view)
                        <tr>
                            <td>{{$view->emp_id}}</td>
                            <td>{{$view->first_name}} {{$view->last_name}}</td>
                            <td>
                                <div class="row">
                                    <div class="col">1st Half Pay</div>
                                </div>
                                @if($view->first_status_pay == 1)<span class="badge badge-success"><i
                                        class="fas fa-check-circle text-white"></i> Paid</span>
                                @elseif($view->first_status_pay == 0)
                                <span class="badge badge-danger"><i class="fas fa-times-circle text-white"></i> Not
                                    Paid</span>
                                @endif

                                <div class="row">
                                    <div class="col">2nd Half Pay</div>
                                </div>
                                @if($view->second_status_pay == 1)<span class="badge badge-success"><i
                                        class="fas fa-check-circle text-white"></i> Paid</span>
                                @elseif($view->second_status_pay == 0)
                                <span class="badge badge-danger"><i class="fas fa-times-circle text-white"></i> Not
                                    Paid</span>
                                @endif

                            </td>

                            @if($view->admin_approval == 'Approved')
                            <td>
                                <span class="badge badge-success"><i class="far fa-check-square"></i>
                                    Approved</span>
                            </td>
                            @elseif($view->admin_approval == 'Pending')
                            <td>
                                <span class="badge badge-primary"><i class="far fa-hourglass"></i>
                                    Pending </span>
                            </td>
                            @elseif($view->admin_approval == 'Rejected')
                            <td>
                                <span class="badge badge-danger"><i class="far fa-times-alt"></i>
                                    Rejected </span>
                            </td>
                            @endif

                            <td>



                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#b{{$view->payslip}}" aria-expanded="false" aria-controls="collapseExample">
                                    Basic Salary
                                </button>



                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#a{{$view->payslip}}" aria-expanded="false" aria-controls="collapseExample">
                                    View Payslip
                                </button>


                                <div class="collapse" id="b{{$view->payslip}}">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="col">
                                                        <b class="h5">BASIC SALARY DETAILS</b>
                                                        <hr class="bg-primary">
                                                        <div class="h5 text-left"><b>Load Units:</b> <u>{{$view->a_load_units}}</u></div>
                                                        <div class="h5 text-left"><b>Laboratory Total Units:</b> <u>{{$view->a_laboratory_total_units}}</u></div>
                                                        <div class="h5 text-left"><b>Laboratory Total Hours:</b> <u>{{$view->a_laboratory_total_hours}}</u></div>
                                                        <div class="h5 text-left"><b>Total Hours:</b> <u>{{$view->a_total_hours}}</u></div>
                                                        <div class="h5 text-left"><b>Rate per Hour:</b> <u>{{$view->a_rate_per_hour}}</u></div>
                                                        <div class="h5 text-left"><b>Rate per Hour (old):</b> <u>{{$view->a_rate_per_hour_old}}</u></div>
                                                        <div class="h5 text-left"><b>mins:</b> <u>{{$view->a_mins}}</u></div>
                                                        <div class="h5 text-left"><b>Daily Rate:</b> <u>{{$view->a_daily_rate}}</u></div>
                                                        <div class="h5 text-left"><b>Salary:</b> <u>{{$view->a_salary}}</u></div>
                                                        <div class="h5 text-left"><b>Basic:</b> <u>{{$view->a_basic}}</u></div>
                                                        <div class="h5 text-left"><b>Emolument:</b> <u>{{$view->a_emolument}}</u></div>
                                                        <div class="h5 text-left"><b>Overload:</b> <u>{{$view->a_overload}}</u></div>
                                                        <div class="h5 text-left"><b>Total Basic Salary:</b> <u>{{$view->a_total_basic_salary}}</u></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                <div class="collapse" id="a{{$view->payslip}}">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col">
                                                <b class="h5">EARNINGS</b>
                                                <hr class="bg-success">
                                                <div class="h5 text-left"><b>Basic Pay:</b>
                                                    <u>{{$view->p_basic_pay}}</u></div>
                                                <div class="h5 text-left"><b>Absences/Lates:</b>
                                                    <u>{{$view->p_absences}}</u></div>
                                                <div class="h5 text-left"><b>Adjustment:</b>
                                                    <u>{{$view->p_adjustment}}</u></div>
                                                <div class="h5 text-left"><b>Net Basic:</b>
                                                    <u>{{$view->p_net_basic}}</u></div>
                                                <div class="h5 text-left"><b>Cost of Living Allowance:</b>
                                                    <u>{{$view->p_cost_of_living_allowance}}</u></div>
                                                <div class="h5 text-left"><b>Honorarium:</b>
                                                    <u>{{$view->p_honorarium}}</u></div>
                                                <div class="h5 text-left"><b>Overtime: </b> <u>{{$view->p_overtime}}</u>
                                                </div>
                                                <div class="h5 text-left"><b>Over Load:</b>
                                                    <u>{{$view->p_over_load}}</u></div>
                                                <div class="h5 text-left"><b>Others: </b> <u>{{$view->p_others}}</u>
                                                </div>
                                                <div class="h5 text-left"><b>Hold Salary Pay Out:</b>
                                                    <u>{{$view->p_hold_salary_pay_out}}</u></div>
                                            </div>
                                            <div class="col">
                                                <h5>DEDUCTIONS</h5>
                                                <hr class="bg-danger">
                                                <div class="h5 text-left"><b>SSS Contribution:</b>
                                                    <u>{{$view->p_sss_contribution}}</u></div>
                                                <div class="h5 text-left"><b>Philhealth Contribution:</b>
                                                    <u>{{$view->p_philhealth_contribution}}</u></div>
                                                <div class="h5 text-left"><b>Pagibig Contribution:</b>
                                                    <u>{{$view->p_pagibig_contribution}}</u></div>
                                                <div class="h5 text-left"><b>SSS Loan Contribution:</b>
                                                    <u>{{$view->p_sss_loan}}</u></div>
                                                <div class="h5 text-left"><b>Pag-ibig Contribution:</b>
                                                    <u>{{$view->p_pagibig_loan}}</u></div>
                                                <div class="h5 text-left"><b>Tax Withheld:</b>
                                                    <u>{{$view->p_tax_withheld}}</u></div>
                                                <div class="h5 text-left"><b>Cash Advance:</b>
                                                    <u>{{$view->p_cash_advance}}</u></div>
                                                <div class="h5 text-left"><b>Retirement Contribution:</b>
                                                    <u>{{$view->p_retirement_contributon}}</u></div>
                                                <div class="h5 text-left"><b>Christmas Loan:</b>
                                                    <u>{{$view->p_christmas_loan}}</u></div>
                                                <div class="h5 text-left"><b>Retirement Loan:</b>
                                                    <u>{{$view->p_retirement_loan}}</u></div>
                                                <div class="h5 text-left"><b>Other Adjustment:</b>
                                                    <u>{{$view->p_others_adjustment}}</u></div>
                                                <div class="h5 text-left"><b>Others(Payable to FERN Realty):</b>
                                                    <u>{{$view->p_others_payable_realty}}</u></div>
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
                                                                Earnings:</b> <u>{{$view->p_total_earnings}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="h5 text-center bg-danger text-white"><b>Total
                                                                Deductions:</b> <u>{{$view->p_total_deductions}}</u>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="h5 text-center bg-primary text-white"><b>1st Half
                                                                Pay:</b> <u>{{$view->p_first_half_pay}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="h5 text-center bg-primary text-white"><b>2nd Half
                                                                Pay:</b> <u>{{$view->p_second_half_pay}}</u></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="h5 text-center bg-primary text-white"><b>Monthly
                                                                Pay</b> <u>{{$view->p_monthly_pay}}</u></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>






</div>

@endsection
