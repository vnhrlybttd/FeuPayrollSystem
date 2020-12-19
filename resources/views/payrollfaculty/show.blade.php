@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Payroll</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-calendar-alt"></i> Non Faculty Payroll
        </li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-calendar-alt"></i> Payslips</li>
    </ol>
</nav>



<div class="container-fluid">

        <div class="m-0"><a class="btn btn-primary" href="{{ route('PayrollFaculty.index') }}"><i
            class="fas fa-arrow-circle-left"></i> Back</a> </div>
            <hr>

    <div class="table-responsive mb-3">
        <table class="table table-hover table-bordered text-center" id="example" class="display nowrap">
            <thead class="thead-dark">
                <tr>
                    <th>Payslip No.</th>
                    <th class="bg-success text-white">Earnings Summary</th>
                    <th class="bg-danger text-white">Deductions Summary</th>
                    <th class="bg-primary text-white">Total Summary</th>
                    <th>Pay Status</th>
                    <th>PDF</th>
              


                </tr>
            </thead>
            <tbody>
                @foreach ($payslipTable as $view)
                <tr>
                    <td>{{$view->payslip}}</td>

                    <td>
                        <div class="row">
                            <div class="col">Basic Pay</div>
                            <div class="col">{{$view->p_basic_pay}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Absence</div>
                            <div class="col">{{$view->p_absences}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Adjustment</div>
                            <div class="col">{{$view->p_adjustment}}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col bg-success text-white">Net Basic</div>
                            <div class="col bg-success text-white">{{$view->p_net_basic}}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">Cost of Living Allowance</div>
                            <div class="col">{{$view->p_cost_of_living_allowance}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Honorarium</div>
                            <div class="col">{{$view->p_honorarium}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Overtime</div>
                            <div class="col">{{$view->p_overtime}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Over Load</div>
                            <div class="col">{{$view->p_over_load}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Others</div>
                            <div class="col">{{$view->p_others}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Hold Salary Pay Out</div>
                            <div class="col">{{$view->p_hold_salary_pay_out}}</div>
                        </div>
                    </td>

                    <td>
                        <div class="row">
                            <div class="col">SSS Contribution</div>
                            <div class="col">{{$view->p_sss_contribution}}</div>
                        </div>

                        <div class="row">
                            <div class="col">Philhealth Contribution</div>
                            <div class="col">{{$view->p_philhealth_contribution}}</div>
                        </div>

                        <div class="row">
                            <div class="col">Pag-Ibig Contribution</div>
                            <div class="col">{{$view->p_sss_contribution}}</div>
                        </div>

                        <div class="row">
                            <div class="col">SSS Loan</div>
                            <div class="col">{{$view->p_sss_loan}}</div>
                        </div>

                        <div class="row">
                            <div class="col">Pag Ibig Loan</div>
                            <div class="col">{{$view->p_pagibig_loan}}</div>
                        </div>

                        <div class="row">
                            <div class="col">Tax Withheld</div>
                            <div class="col">{{$view->p_tax_withheld}}</div>
                        </div>

                        <div class="row">
                            <div class="col">Cash Advance</div>
                            <div class="col">{{$view->p_cash_advance}}</div>
                        </div>

                        <div class="row">
                            <div class="col">Retirement Contribution</div>
                            <div class="col">{{$view->p_retirement_contributon}}</div>
                        </div>

                        <div class="row">
                            <div class="col">Christmas Loan</div>
                            <div class="col">{{$view->p_christmas_loan}}</div>
                        </div>

                        <div class="row">
                            <div class="col">Others Adjustment</div>
                            <div class="col">{{$view->p_others_adjustment}}</div>
                        </div>

                        <div class="row">
                            <div class="col">Others Payable Realty</div>
                            <div class="col">{{$view->p_others_payable_realty}}</div>
                        </div>
                    </td>

                    <td>
                        <div class="row">
                            <div class="col bg-success text-white">Total Earnings</div>
                            <div class="col bg-success text-white">{{$view->p_total_earnings}}</div>
                        </div>
                        <div class="row">
                            <div class="col bg-danger text-white">Total Deductions</div>
                            <div class="col bg-danger text-white">{{$view->p_total_earnings}}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">1st Half Pay</div>
                            <div class="col">{{$view->p_first_half_pay}}</div>
                        </div>
                        <div class="row">
                            <div class="col">2nd Half Pay</div>
                            <div class="col">{{$view->p_second_half_pay}}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col bg-primary text-white">Monthly Salary</div>
                            <div class="col bg-primary text-white">{{$view->p_monthly_pay}}</div>
                        </div>
                    </td>

                
                    <td>
                        <div class="row">
                            <div class="col">1st Half Pay</div>
                        </div>
                        @if($view->first_status_pay == 1)<span class="badge badge-success"><i class="fas fa-check-circle text-white"></i> Paid</span>
                        @elseif($view->first_status_pay == 0)
                        <span class="badge badge-danger"><i class="fas fa-check-circle text-white"></i> Not Paid</span>
                        @endif

                        <div class="row">
                                <div class="col">2nd Half Pay</div>
                            </div>
                            @if($view->second_status_pay == 1)<span class="badge badge-success"><i class="fas fa-check-circle text-white"></i> Paid</span>
                            @elseif($view->second_status_pay == 0)
                            <span class="badge badge-danger"><i class="fas fa-check-circle text-white"></i> Not Paid</span>
                            @endif

                    </td>
                    
               

                
<td> <a class="btn btn-warning" href="{{action('PayslipPDFController@downloadPDF', $view->payslip)}}" >PDF</a></td>


                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>




@endsection
