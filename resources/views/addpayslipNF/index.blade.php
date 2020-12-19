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


<a class="btn btn-primary" href="{{('/PayrollComputation/Step1')}}"><i class="fas fa-coins"></i>
    Calculate Monthly Pay
</a>
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

        <div class="container-fluid bg-white shadow">


            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-coins text-primary"></i> Monthly Pay (Non-Faculty)
            </h3>
            <hr>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="Pending-tab" data-toggle="tab" href="#Pending" role="tab"
                        aria-controls="Pending" aria-selected="true">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Approved-tab" data-toggle="tab" href="#Approved" role="tab"
                        aria-controls="Approved" aria-selected="false">Approved</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Rejected-tab" data-toggle="tab" href="#Rejected" role="tab"
                        aria-controls="Rejected" aria-selected="false">Rejected</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Pending" role="tabpanel" aria-labelledby="Pending-tab">


                    <!--TABLE START-->

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="myTable" class="display">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Pay Period</th>
                         
                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending as $tableView)
                                <tr>
                                    <td>{{$tableView->employee_id}}</td>
                                    <td>{{$tableView->emp_firstname}} {{$tableView->emp_lastname}}</td>
                                    <td>{{date('M. Y',strtotime($tableView->date))}}</td>
                                 




                                    <td>

                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#b{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Basic Salary
                                        </button>



                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#a{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            View Payslip
                                        </button>

                                        <div class="collapse" id="b{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">BASIC SALARY DETAILS</b>
                                                        <hr class="bg-primary">
                                                        <div class="h5 text-left"><b>Salary:</b>
                                                            <u>{{$tableView->a_salary}}</u>
                                                        </div>
                                                        <div class="h5 text-left"><b>Daily Rate:</b>
                                                            <u>{{$tableView->a_daily_rate}}</u></div>
                                                        <div class="h5 text-left"><b>Rate Per Hour:</b>
                                                            <u>{{$tableView->a_rate_per_hour}}</u></div>
                                                        <div class="h5 text-left"><b>Mins:</b>
                                                            <u>{{$tableView->a_mins}}</u></div>
                                                        <div class="h5 text-left"><b>Basic:</b>
                                                            <u>{{$tableView->a_basic}}</u>
                                                        </div>
                                                        <div class="h5 text-left"><b>Emolument:</b>
                                                            <u>{{$tableView->a_emolument}}</u></div>
                                                        <div class="h5 text-left"><b>Total Basic Salary:</b>
                                                            <u>{{$tableView->a_total_basic_salary}}</u></div>
                                                        <div class="h5 text-left"><b>Total Absences/Lates:</b>
                                                            <u>{{$tableView->p_absences}}</u></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="collapse" id="a{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">EARNINGS</b>
                                                        <hr class="bg-success">
                                                        <div class="h5 text-left"><b>Basic Pay:</b>
                                                            <u>{{$tableView->p_basic_pay}}</u></div>
                                                        <div class="h5 text-left"><b>Absences/Lates:</b>
                                                            <u>{{$tableView->p_absences}}</u></div>
                                                        <div class="h5 text-left"><b>Adjustment:</b>
                                                            <u>{{$tableView->p_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Net Basic:</b>
                                                            <u>{{$tableView->p_net_basic}}</u></div>
                                                        <div class="h5 text-left"><b>Cost of Living Allowance:</b>
                                                            <u>{{$tableView->p_cost_of_living_allowance}}</u></div>
                                                        <div class="h5 text-left"><b>Honorarium:</b>
                                                            <u>{{$tableView->p_honorarium}}</u></div>
                                                        <div class="h5 text-left"><b>Overtime: </b>
                                                            <u>{{$tableView->p_overtime}}</u></div>
                                                        <div class="h5 text-left"><b>Over Load:</b>
                                                            <u>{{$tableView->p_over_load}}</u></div>
                                                        <div class="h5 text-left"><b>Others: </b>
                                                            <u>{{$tableView->p_others}}</u></div>
                                                        <div class="h5 text-left"><b>Hold Salary Pay Out:</b>
                                                            <u>{{$tableView->p_hold_salary_pay_out}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>DEDUCTIONS</h5>
                                                        <hr class="bg-danger">
                                                        <div class="h5 text-left"><b>SSS Contribution:</b>
                                                            <u>{{$tableView->p_sss_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Philhealth Contribution:</b>
                                                            <u>{{$tableView->p_philhealth_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Pagibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>SSS Loan Contribution:</b>
                                                            <u>{{$tableView->p_sss_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Pag-ibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Tax Withheld:</b>
                                                            <u>{{$tableView->p_tax_withheld}}</u></div>
                                                        <div class="h5 text-left"><b>Cash Advance:</b>
                                                            <u>{{$tableView->p_cash_advance}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Contribution:</b>
                                                            <u>{{$tableView->p_retirement_contributon}}</u></div>
                                                        <div class="h5 text-left"><b>Christmas Loan:</b>
                                                            <u>{{$tableView->p_christmas_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Loan:</b>
                                                            <u>{{$tableView->p_retirement_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Other Adjustment:</b>
                                                            <u>{{$tableView->p_others_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Others(Payable to FERN Realty):</b>
                                                            <u>{{$tableView->p_others_payable_realty}}</u></div>
                                                    </div>

                                                </div>
                                                <hr class="bg-secondary">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">TOTALS</b>
                                                        <hr class="bg-primary">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-success text-white">
                                                                    <b>Total
                                                                        Earnings:</b>
                                                                    <u>{{$tableView->p_total_earnings}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-danger text-white">
                                                                    <b>Total
                                                                        Deductions:</b>
                                                                    <u>{{$tableView->p_total_deductions}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>1st
                                                                        Half
                                                                        Pay:</b> <u>{{$tableView->p_first_half_pay}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>2nd
                                                                        Half
                                                                        Pay:</b>
                                                                    <u>{{$tableView->p_second_half_pay}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white">
                                                                    <b>Monthly
                                                                        Pay</b> <u>{{$tableView->p_monthly_pay}}</u>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                    <a class="btn btn-success text-white" href="{{action('AddPayslipNFController@editPayslipNF',[Crypt::encrypt($tableView->payslip)])}}"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                      
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <!--TABLE END -->



                </div>
                <div class="tab-pane fade" id="Approved" role="tabpanel" aria-labelledby="Approved-tab">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="displayThree" class="display">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Pay Period</th>
                                 

                                    <th class="bg-primary"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approved as $tableView)
                                <tr>
                                    <td>{{$tableView->employee_id}}</td>
                                    <td>{{$tableView->emp_firstname}} {{$tableView->emp_lastname}}</td>
                                    <td>{{date('M. Y',strtotime($tableView->date))}}</td>
                                 


                                    <td>

                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#b{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Basic Salary
                                        </button>



                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#a{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            View Payslip
                                        </button>

                                        <div class="collapse" id="b{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">BASIC SALARY DETAILS</b>
                                                        <hr class="bg-primary">
                                                        <div class="h5 text-left"><b>Salary:</b>
                                                            <u>{{$tableView->a_salary}}</u>
                                                        </div>
                                                        <div class="h5 text-left"><b>Daily Rate:</b>
                                                            <u>{{$tableView->a_daily_rate}}</u></div>
                                                        <div class="h5 text-left"><b>Rate Per Hour:</b>
                                                            <u>{{$tableView->a_rate_per_hour}}</u></div>
                                                        <div class="h5 text-left"><b>Mins:</b>
                                                            <u>{{$tableView->a_mins}}</u></div>
                                                        <div class="h5 text-left"><b>Basic:</b>
                                                            <u>{{$tableView->a_basic}}</u>
                                                        </div>
                                                        <div class="h5 text-left"><b>Emolument:</b>
                                                            <u>{{$tableView->a_emolument}}</u></div>
                                                        <div class="h5 text-left"><b>Total Basic Salary:</b>
                                                            <u>{{$tableView->a_total_basic_salary}}</u></div>
                                                        <div class="h5 text-left"><b>Total Absences/Lates:</b>
                                                            <u>{{$tableView->p_absences}}</u></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="collapse" id="a{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">EARNINGS</b>
                                                        <hr class="bg-success">
                                                        <div class="h5 text-left"><b>Basic Pay:</b>
                                                            <u>{{$tableView->p_basic_pay}}</u></div>
                                                        <div class="h5 text-left"><b>Absences/Lates:</b>
                                                            <u>{{$tableView->p_absences}}</u></div>
                                                        <div class="h5 text-left"><b>Adjustment:</b>
                                                            <u>{{$tableView->p_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Net Basic:</b>
                                                            <u>{{$tableView->p_net_basic}}</u></div>
                                                        <div class="h5 text-left"><b>Cost of Living Allowance:</b>
                                                            <u>{{$tableView->p_cost_of_living_allowance}}</u></div>
                                                        <div class="h5 text-left"><b>Honorarium:</b>
                                                            <u>{{$tableView->p_honorarium}}</u></div>
                                                        <div class="h5 text-left"><b>Overtime: </b>
                                                            <u>{{$tableView->p_overtime}}</u></div>
                                                        <div class="h5 text-left"><b>Over Load:</b>
                                                            <u>{{$tableView->p_over_load}}</u></div>
                                                        <div class="h5 text-left"><b>Others: </b>
                                                            <u>{{$tableView->p_others}}</u></div>
                                                        <div class="h5 text-left"><b>Hold Salary Pay Out:</b>
                                                            <u>{{$tableView->p_hold_salary_pay_out}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>DEDUCTIONS</h5>
                                                        <hr class="bg-danger">
                                                        <div class="h5 text-left"><b>SSS Contribution:</b>
                                                            <u>{{$tableView->p_sss_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Philhealth Contribution:</b>
                                                            <u>{{$tableView->p_philhealth_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Pagibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>SSS Loan Contribution:</b>
                                                            <u>{{$tableView->p_sss_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Pag-ibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Tax Withheld:</b>
                                                            <u>{{$tableView->p_tax_withheld}}</u></div>
                                                        <div class="h5 text-left"><b>Cash Advance:</b>
                                                            <u>{{$tableView->p_cash_advance}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Contribution:</b>
                                                            <u>{{$tableView->p_retirement_contributon}}</u></div>
                                                        <div class="h5 text-left"><b>Christmas Loan:</b>
                                                            <u>{{$tableView->p_christmas_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Loan:</b>
                                                            <u>{{$tableView->p_retirement_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Other Adjustment:</b>
                                                            <u>{{$tableView->p_others_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Others(Payable to FERN Realty):</b>
                                                            <u>{{$tableView->p_others_payable_realty}}</u></div>
                                                    </div>

                                                </div>
                                                <hr class="bg-secondary">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">TOTALS</b>
                                                        <hr class="bg-primary">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-success text-white">
                                                                    <b>Total
                                                                        Earnings:</b>
                                                                    <u>{{$tableView->p_total_earnings}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-danger text-white">
                                                                    <b>Total
                                                                        Deductions:</b>
                                                                    <u>{{$tableView->p_total_deductions}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>1st
                                                                        Half
                                                                        Pay:</b> <u>{{$tableView->p_first_half_pay}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>2nd
                                                                        Half
                                                                        Pay:</b>
                                                                    <u>{{$tableView->p_second_half_pay}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white">
                                                                    <b>Monthly
                                                                        Pay</b> <u>{{$tableView->p_monthly_pay}}</u>
                                                                </div>
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
                <div class="tab-pane fade" id="Rejected" role="tabpanel" aria-labelledby="Rejected-tab">


                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="displayFour" class="display">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Pay Period</th>
                               

                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rejected as $tableView)
                                <tr>
                                    <td>{{$tableView->employee_id}}</td>
                                    <td>{{$tableView->emp_firstname}} {{$tableView->emp_lastname}}</td>
                                    <td>{{date('M. Y',strtotime($tableView->date))}}</td>
                                 


                                    <td>

                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#b{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Basic Salary
                                        </button>



                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#a{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            View Payslip
                                        </button>

                                        <div class="collapse" id="b{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">BASIC SALARY DETAILS</b>
                                                        <hr class="bg-primary">
                                                        <div class="h5 text-left"><b>Salary:</b>
                                                            <u>{{$tableView->salary}}</u>
                                                        </div>
                                                        <div class="h5 text-left"><b>Daily Rate:</b>
                                                            <u>{{$tableView->daily_rate}}</u></div>
                                                        <div class="h5 text-left"><b>Rate Per Hour:</b>
                                                            <u>{{$tableView->rate_per_hour}}</u></div>
                                                        <div class="h5 text-left"><b>Mins:</b>
                                                            <u>{{$tableView->mins}}</u></div>
                                                        <div class="h5 text-left"><b>Basic:</b>
                                                            <u>{{$tableView->basic}}</u>
                                                        </div>
                                                        <div class="h5 text-left"><b>Emolument:</b>
                                                            <u>{{$tableView->emolument}}</u></div>
                                                        <div class="h5 text-left"><b>Total Basic Salary:</b>
                                                            <u>{{$tableView->total_basic_salary}}</u></div>
                                                        <div class="h5 text-left"><b>Total Absences/Lates:</b>
                                                            <u>{{$tableView->p_absences}}</u></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="collapse" id="a{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">EARNINGS</b>
                                                        <hr class="bg-success">
                                                        <div class="h5 text-left"><b>Basic Pay:</b>
                                                            <u>{{$tableView->p_basic_pay}}</u></div>
                                                        <div class="h5 text-left"><b>Absences/Lates:</b>
                                                            <u>{{$tableView->p_absences}}</u></div>
                                                        <div class="h5 text-left"><b>Adjustment:</b>
                                                            <u>{{$tableView->p_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Net Basic:</b>
                                                            <u>{{$tableView->p_net_basic}}</u></div>
                                                        <div class="h5 text-left"><b>Cost of Living Allowance:</b>
                                                            <u>{{$tableView->p_cost_of_living_allowance}}</u></div>
                                                        <div class="h5 text-left"><b>Honorarium:</b>
                                                            <u>{{$tableView->p_honorarium}}</u></div>
                                                        <div class="h5 text-left"><b>Overtime: </b>
                                                            <u>{{$tableView->p_overtime}}</u></div>
                                                        <div class="h5 text-left"><b>Over Load:</b>
                                                            <u>{{$tableView->p_over_load}}</u></div>
                                                        <div class="h5 text-left"><b>Others: </b>
                                                            <u>{{$tableView->p_others}}</u></div>
                                                        <div class="h5 text-left"><b>Hold Salary Pay Out:</b>
                                                            <u>{{$tableView->p_hold_salary_pay_out}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>DEDUCTIONS</h5>
                                                        <hr class="bg-danger">
                                                        <div class="h5 text-left"><b>SSS Contribution:</b>
                                                            <u>{{$tableView->p_sss_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Philhealth Contribution:</b>
                                                            <u>{{$tableView->p_philhealth_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Pagibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>SSS Loan Contribution:</b>
                                                            <u>{{$tableView->p_sss_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Pag-ibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Tax Withheld:</b>
                                                            <u>{{$tableView->p_tax_withheld}}</u></div>
                                                        <div class="h5 text-left"><b>Cash Advance:</b>
                                                            <u>{{$tableView->p_cash_advance}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Contribution:</b>
                                                            <u>{{$tableView->p_retirement_contributon}}</u></div>
                                                        <div class="h5 text-left"><b>Christmas Loan:</b>
                                                            <u>{{$tableView->p_christmas_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Loan:</b>
                                                            <u>{{$tableView->p_retirement_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Other Adjustment:</b>
                                                            <u>{{$tableView->p_others_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Others(Payable to FERN Realty):</b>
                                                            <u>{{$tableView->p_others_payable_realty}}</u></div>
                                                    </div>

                                                </div>
                                                <hr class="bg-secondary">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">TOTALS</b>
                                                        <hr class="bg-primary">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-success text-white">
                                                                    <b>Total
                                                                        Earnings:</b>
                                                                    <u>{{$tableView->p_total_earnings}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-danger text-white">
                                                                    <b>Total
                                                                        Deductions:</b>
                                                                    <u>{{$tableView->p_total_deductions}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>1st
                                                                        Half
                                                                        Pay:</b> <u>{{$tableView->p_first_half_pay}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>2nd
                                                                        Half
                                                                        Pay:</b>
                                                                    <u>{{$tableView->p_second_half_pay}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white">
                                                                    <b>Monthly
                                                                        Pay</b> <u>{{$tableView->p_monthly_pay}}</u>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                            <a class="btn btn-success text-white" href="{{action('AddPayslipNFController@editPayslipF',[Crypt::encrypt($tableView->payslip)])}}"><i class="fas fa-edit"></i> Edit</a>
                                            </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            <hr>


        </div>

    </div>



    <!------------------------------------------------------------------------------------------------------->
    <div class="tab-pane fade" id="f" role="tabpanel" aria-labelledby="f-tab">
  <div class="container-fluid bg-white shadow">


            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-coins text-primary"></i> Monthly Pay (Faculty)
            </h3>
            <hr>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="Pending-tab" data-toggle="tab" href="#PendingF" role="tab"
                        aria-controls="PendingF" aria-selected="true">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Approved-tab" data-toggle="tab" href="#ApprovedF" role="tab"
                        aria-controls="ApprovedF" aria-selected="false">Approved</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Rejected-tab" data-toggle="tab" href="#RejectedF" role="tab"
                        aria-controls="RejectedF" aria-selected="false">Rejected</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="PendingF" role="tabpanel" aria-labelledby="Pending-tab">


                    <!--TABLE START-->

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="FONE" class="display">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Pay Period</th>
                       
                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingF as $tableView)
                                <tr>
                                    <td>{{$tableView->employee_id}}</td>
                                    <td>{{$tableView->emp_firstname}} {{$tableView->emp_lastname}}</td>
                                    <td>{{date('M. Y',strtotime($tableView->date))}}</td>
                                  




                                    <td>

                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#b{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Basic Salary
                                        </button>



                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#a{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            View Payslip
                                        </button>

                                        <div class="collapse" id="b{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                            <b class="h5">BASIC SALARY DETAILS</b>
                                                            <hr class="bg-primary">
                                                            <div class="h5 text-left"><b>Work Hour:</b> <u>{{$tableView->a_load_units}}</u></div>
                                                            <div class="h5 text-left"><b>Additional Hours:</b> <u>{{$tableView->a_additional_hours}}</u></div>
                                                            <div class="h5 text-left"><b>Total Hours:</b> <u>{{$tableView->a_total_hours}}</u></div>
                                                            <div class="h5 text-left"><b>Total Hours:</b> <u>{{$tableView->a_total_hours}}</u></div>
                                                            <div class="h5 text-left"><b>Rate per Hour:</b> <u>{{$tableView->a_rate_per_hour}}</u></div>
                                                            <div class="h5 text-left"><b>Rate per Hour (old):</b> <u>{{$tableView->a_rate_per_hour_old}}</u></div>
                                                            <div class="h5 text-left"><b>mins:</b> <u>{{$tableView->a_mins}}</u></div>
                                                            <div class="h5 text-left"><b>Daily Rate:</b> <u>{{$tableView->a_daily_rate}}</u></div>
                                                            <div class="h5 text-left"><b>Salary:</b> <u>{{$tableView->a_salary}}</u></div>
                                                            <div class="h5 text-left"><b>Basic:</b> <u>{{$tableView->a_basic}}</u></div>
                                                            <div class="h5 text-left"><b>Emolument:</b> <u>{{$tableView->a_emolument}}</u></div>
                                                            <div class="h5 text-left"><b>Overload:</b> <u>{{$tableView->a_overload}}</u></div>
                                                            <div class="h5 text-left"><b>Total Basic Salary:</b> <u>{{$tableView->a_total_basic_salary}}</u></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="collapse" id="a{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">EARNINGS</b>
                                                        <hr class="bg-success">
                                                        <div class="h5 text-left"><b>Basic Pay:</b>
                                                            <u>{{$tableView->p_basic_pay}}</u></div>
                                                        <div class="h5 text-left"><b>Absences/Lates:</b>
                                                            <u>{{$tableView->p_absences}}</u></div>
                                                        <div class="h5 text-left"><b>Adjustment:</b>
                                                            <u>{{$tableView->p_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Net Basic:</b>
                                                            <u>{{$tableView->p_net_basic}}</u></div>
                                                        <div class="h5 text-left"><b>Cost of Living Allowance:</b>
                                                            <u>{{$tableView->p_cost_of_living_allowance}}</u></div>
                                                        <div class="h5 text-left"><b>Honorarium:</b>
                                                            <u>{{$tableView->p_honorarium}}</u></div>
                                                        <div class="h5 text-left"><b>Overtime: </b>
                                                            <u>{{$tableView->p_overtime}}</u></div>
                                                        <div class="h5 text-left"><b>Over Load:</b>
                                                            <u>{{$tableView->p_over_load}}</u></div>
                                                        <div class="h5 text-left"><b>Others: </b>
                                                            <u>{{$tableView->p_others}}</u></div>
                                                        <div class="h5 text-left"><b>Hold Salary Pay Out:</b>
                                                            <u>{{$tableView->p_hold_salary_pay_out}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>DEDUCTIONS</h5>
                                                        <hr class="bg-danger">
                                                        <div class="h5 text-left"><b>SSS Contribution:</b>
                                                            <u>{{$tableView->p_sss_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Philhealth Contribution:</b>
                                                            <u>{{$tableView->p_philhealth_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Pagibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>SSS Loan Contribution:</b>
                                                            <u>{{$tableView->p_sss_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Pag-ibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Tax Withheld:</b>
                                                            <u>{{$tableView->p_tax_withheld}}</u></div>
                                                        <div class="h5 text-left"><b>Cash Advance:</b>
                                                            <u>{{$tableView->p_cash_advance}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Contribution:</b>
                                                            <u>{{$tableView->p_retirement_contributon}}</u></div>
                                                        <div class="h5 text-left"><b>Christmas Loan:</b>
                                                            <u>{{$tableView->p_christmas_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Loan:</b>
                                                            <u>{{$tableView->p_retirement_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Other Adjustment:</b>
                                                            <u>{{$tableView->p_others_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Others(Payable to FERN Realty):</b>
                                                            <u>{{$tableView->p_others_payable_realty}}</u></div>
                                                    </div>

                                                </div>
                                                <hr class="bg-secondary">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">TOTALS</b>
                                                        <hr class="bg-primary">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-success text-white">
                                                                    <b>Total
                                                                        Earnings:</b>
                                                                    <u>{{$tableView->p_total_earnings}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-danger text-white">
                                                                    <b>Total
                                                                        Deductions:</b>
                                                                    <u>{{$tableView->p_total_deductions}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>1st
                                                                        Half
                                                                        Pay:</b> <u>{{$tableView->p_first_half_pay}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>2nd
                                                                        Half
                                                                        Pay:</b>
                                                                    <u>{{$tableView->p_second_half_pay}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white">
                                                                    <b>Monthly
                                                                        Pay</b> <u>{{$tableView->p_monthly_pay}}</u>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                            <a class="btn btn-success text-white" href="{{action('AddPayslipNFController@editPayslipNF',[Crypt::encrypt($tableView->payslip)])}}"><i class="fas fa-edit"></i> Edit</a>
                                            </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <!--TABLE END -->



                </div>
                <div class="tab-pane fade" id="ApprovedF" role="tabpanel" aria-labelledby="Approved-tab">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="FTWO" class="display">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Pay Period</th>
                             

                                    <th class="bg-primary"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approvedF as $tableView)
                                <tr>
                                    <td>{{$tableView->employee_id}}</td>
                                    <td>{{$tableView->emp_firstname}} {{$tableView->emp_lastname}}</td>
                                    <td>{{date('M. Y',strtotime($tableView->date))}}</td>
                                  


                                    <td>

                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#b{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Basic Salary
                                        </button>



                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#a{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            View Payslip
                                        </button>

                                        <div class="collapse" id="b{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                            <b class="h5">BASIC SALARY DETAILS</b>
                                                            <hr class="bg-primary">
                                                            <div class="h5 text-left"><b>Work Hour:</b> <u>{{$tableView->a_load_units}}</u></div>
                                                            <div class="h5 text-left"><b>Additional Hours:</b> <u>{{$tableView->additional_hours}}</u></div>
                                                            <div class="h5 text-left"><b>Total Hours:</b> <u>{{$tableView->a_total_hours}}</u></div>
                                                            <div class="h5 text-left"><b>Total Hours:</b> <u>{{$tableView->a_total_hours}}</u></div>
                                                            <div class="h5 text-left"><b>Rate per Hour:</b> <u>{{$tableView->a_rate_per_hour}}</u></div>
                                                            <div class="h5 text-left"><b>Rate per Hour (old):</b> <u>{{$tableView->a_rate_per_hour_old}}</u></div>
                                                            <div class="h5 text-left"><b>mins:</b> <u>{{$tableView->a_mins}}</u></div>
                                                            <div class="h5 text-left"><b>Daily Rate:</b> <u>{{$tableView->a_daily_rate}}</u></div>
                                                            <div class="h5 text-left"><b>Salary:</b> <u>{{$tableView->a_salary}}</u></div>
                                                            <div class="h5 text-left"><b>Basic:</b> <u>{{$tableView->a_basic}}</u></div>
                                                            <div class="h5 text-left"><b>Emolument:</b> <u>{{$tableView->a_emolument}}</u></div>
                                                            <div class="h5 text-left"><b>Overload:</b> <u>{{$tableView->a_overload}}</u></div>
                                                            <div class="h5 text-left"><b>Total Basic Salary:</b> <u>{{$tableView->a_total_basic_salary}}</u></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="collapse" id="a{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">EARNINGS</b>
                                                        <hr class="bg-success">
                                                        <div class="h5 text-left"><b>Basic Pay:</b>
                                                            <u>{{$tableView->p_basic_pay}}</u></div>
                                                        <div class="h5 text-left"><b>Absences/Lates:</b>
                                                            <u>{{$tableView->p_absences}}</u></div>
                                                        <div class="h5 text-left"><b>Adjustment:</b>
                                                            <u>{{$tableView->p_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Net Basic:</b>
                                                            <u>{{$tableView->p_net_basic}}</u></div>
                                                        <div class="h5 text-left"><b>Cost of Living Allowance:</b>
                                                            <u>{{$tableView->p_cost_of_living_allowance}}</u></div>
                                                        <div class="h5 text-left"><b>Honorarium:</b>
                                                            <u>{{$tableView->p_honorarium}}</u></div>
                                                        <div class="h5 text-left"><b>Overtime: </b>
                                                            <u>{{$tableView->p_overtime}}</u></div>
                                                        <div class="h5 text-left"><b>Over Load:</b>
                                                            <u>{{$tableView->p_over_load}}</u></div>
                                                        <div class="h5 text-left"><b>Others: </b>
                                                            <u>{{$tableView->p_others}}</u></div>
                                                        <div class="h5 text-left"><b>Hold Salary Pay Out:</b>
                                                            <u>{{$tableView->p_hold_salary_pay_out}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>DEDUCTIONS</h5>
                                                        <hr class="bg-danger">
                                                        <div class="h5 text-left"><b>SSS Contribution:</b>
                                                            <u>{{$tableView->p_sss_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Philhealth Contribution:</b>
                                                            <u>{{$tableView->p_philhealth_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Pagibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>SSS Loan Contribution:</b>
                                                            <u>{{$tableView->p_sss_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Pag-ibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Tax Withheld:</b>
                                                            <u>{{$tableView->p_tax_withheld}}</u></div>
                                                        <div class="h5 text-left"><b>Cash Advance:</b>
                                                            <u>{{$tableView->p_cash_advance}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Contribution:</b>
                                                            <u>{{$tableView->p_retirement_contributon}}</u></div>
                                                        <div class="h5 text-left"><b>Christmas Loan:</b>
                                                            <u>{{$tableView->p_christmas_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Loan:</b>
                                                            <u>{{$tableView->p_retirement_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Other Adjustment:</b>
                                                            <u>{{$tableView->p_others_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Others(Payable to FERN Realty):</b>
                                                            <u>{{$tableView->p_others_payable_realty}}</u></div>
                                                    </div>

                                                </div>
                                                <hr class="bg-secondary">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">TOTALS</b>
                                                        <hr class="bg-primary">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-success text-white">
                                                                    <b>Total
                                                                        Earnings:</b>
                                                                    <u>{{$tableView->p_total_earnings}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-danger text-white">
                                                                    <b>Total
                                                                        Deductions:</b>
                                                                    <u>{{$tableView->p_total_deductions}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>1st
                                                                        Half
                                                                        Pay:</b> <u>{{$tableView->p_first_half_pay}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>2nd
                                                                        Half
                                                                        Pay:</b>
                                                                    <u>{{$tableView->p_second_half_pay}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white">
                                                                    <b>Monthly
                                                                        Pay</b> <u>{{$tableView->p_monthly_pay}}</u>
                                                                </div>
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
                <div class="tab-pane fade" id="RejectedF" role="tabpanel" aria-labelledby="Rejected-tab">


                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="FTHREE" class="display">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Pay Period</th>
                                

                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rejectedF as $tableView)
                                <tr>
                                    <td>{{$tableView->employee_id}}</td>
                                    <td>{{$tableView->emp_firstname}} {{$tableView->emp_lastname}}</td>
                                    <td>{{date('M. Y',strtotime($tableView->date))}}</td>
                                   


                                    <td>

                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#b{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Basic Salary
                                        </button>



                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#a{{$tableView->payslip}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            View Payslip
                                        </button>

                                        <div class="collapse" id="b{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                            <b class="h5">BASIC SALARY DETAILS</b>
                                                            <hr class="bg-primary">
                                                            <div class="h5 text-left"><b>Work Hour:</b> <u>{{$tableView->a_load_units}}</u></div>
                                                            <div class="h5 text-left"><b>Additional Hours:</b> <u>{{$tableView->additional_hours}}</u></div>
                                                            <div class="h5 text-left"><b>Total Hours:</b> <u>{{$tableView->a_total_hours}}</u></div>
                                                            <div class="h5 text-left"><b>Total Hours:</b> <u>{{$tableView->a_total_hours}}</u></div>
                                                            <div class="h5 text-left"><b>Rate per Hour:</b> <u>{{$tableView->a_rate_per_hour}}</u></div>
                                                            <div class="h5 text-left"><b>Rate per Hour (old):</b> <u>{{$tableView->a_rate_per_hour_old}}</u></div>
                                                            <div class="h5 text-left"><b>mins:</b> <u>{{$tableView->a_mins}}</u></div>
                                                            <div class="h5 text-left"><b>Daily Rate:</b> <u>{{$tableView->a_daily_rate}}</u></div>
                                                            <div class="h5 text-left"><b>Salary:</b> <u>{{$tableView->a_salary}}</u></div>
                                                            <div class="h5 text-left"><b>Basic:</b> <u>{{$tableView->a_basic}}</u></div>
                                                            <div class="h5 text-left"><b>Emolument:</b> <u>{{$tableView->a_emolument}}</u></div>
                                                            <div class="h5 text-left"><b>Overload:</b> <u>{{$tableView->a_overload}}</u></div>
                                                            <div class="h5 text-left"><b>Total Basic Salary:</b> <u>{{$tableView->a_total_basic_salary}}</u></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="collapse" id="a{{$tableView->payslip}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">EARNINGS</b>
                                                        <hr class="bg-success">
                                                        <div class="h5 text-left"><b>Basic Pay:</b>
                                                            <u>{{$tableView->p_basic_pay}}</u></div>
                                                        <div class="h5 text-left"><b>Absences/Lates:</b>
                                                            <u>{{$tableView->p_absences}}</u></div>
                                                        <div class="h5 text-left"><b>Adjustment:</b>
                                                            <u>{{$tableView->p_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Net Basic:</b>
                                                            <u>{{$tableView->p_net_basic}}</u></div>
                                                        <div class="h5 text-left"><b>Cost of Living Allowance:</b>
                                                            <u>{{$tableView->p_cost_of_living_allowance}}</u></div>
                                                        <div class="h5 text-left"><b>Honorarium:</b>
                                                            <u>{{$tableView->p_honorarium}}</u></div>
                                                        <div class="h5 text-left"><b>Overtime: </b>
                                                            <u>{{$tableView->p_overtime}}</u></div>
                                                        <div class="h5 text-left"><b>Over Load:</b>
                                                            <u>{{$tableView->p_over_load}}</u></div>
                                                        <div class="h5 text-left"><b>Others: </b>
                                                            <u>{{$tableView->p_others}}</u></div>
                                                        <div class="h5 text-left"><b>Hold Salary Pay Out:</b>
                                                            <u>{{$tableView->p_hold_salary_pay_out}}</u></div>
                                                    </div>
                                                    <div class="col">
                                                        <h5>DEDUCTIONS</h5>
                                                        <hr class="bg-danger">
                                                        <div class="h5 text-left"><b>SSS Contribution:</b>
                                                            <u>{{$tableView->p_sss_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Philhealth Contribution:</b>
                                                            <u>{{$tableView->p_philhealth_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>Pagibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_contribution}}</u></div>
                                                        <div class="h5 text-left"><b>SSS Loan Contribution:</b>
                                                            <u>{{$tableView->p_sss_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Pag-ibig Contribution:</b>
                                                            <u>{{$tableView->p_pagibig_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Tax Withheld:</b>
                                                            <u>{{$tableView->p_tax_withheld}}</u></div>
                                                        <div class="h5 text-left"><b>Cash Advance:</b>
                                                            <u>{{$tableView->p_cash_advance}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Contribution:</b>
                                                            <u>{{$tableView->p_retirement_contributon}}</u></div>
                                                        <div class="h5 text-left"><b>Christmas Loan:</b>
                                                            <u>{{$tableView->p_christmas_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Retirement Loan:</b>
                                                            <u>{{$tableView->p_retirement_loan}}</u></div>
                                                        <div class="h5 text-left"><b>Other Adjustment:</b>
                                                            <u>{{$tableView->p_others_adjustment}}</u></div>
                                                        <div class="h5 text-left"><b>Others(Payable to FERN Realty):</b>
                                                            <u>{{$tableView->p_others_payable_realty}}</u></div>
                                                    </div>

                                                </div>
                                                <hr class="bg-secondary">
                                                <div class="row">
                                                    <div class="col">
                                                        <b class="h5">TOTALS</b>
                                                        <hr class="bg-primary">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-success text-white">
                                                                    <b>Total
                                                                        Earnings:</b>
                                                                    <u>{{$tableView->p_total_earnings}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-danger text-white">
                                                                    <b>Total
                                                                        Deductions:</b>
                                                                    <u>{{$tableView->p_total_deductions}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>1st
                                                                        Half
                                                                        Pay:</b> <u>{{$tableView->p_first_half_pay}}</u>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white"><b>2nd
                                                                        Half
                                                                        Pay:</b>
                                                                    <u>{{$tableView->p_second_half_pay}}</u></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="h5 text-center bg-primary text-white">
                                                                    <b>Monthly
                                                                        Pay</b> <u>{{$tableView->p_monthly_pay}}</u>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </td>

                                    <td>
                                            <a class="btn btn-success text-white" href="{{action('AddPayslipNFController@editPayslipF',[Crypt::encrypt($tableView->payslip)])}}"><i class="fas fa-edit"></i> Edit</a>
                                            </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            <hr>


        </div>
    </div>





      <!------------------------------------------------------------------------------------------------------->
</div>







@endsection
