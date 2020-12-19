@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Reports</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Generate Reports</li>
    </ol>
</nav>
<hr>

<style>
    .page-break {
        page-break-after: always;
    }

    table {
        width: 100%;
    }

    tr {
        width: 100%;
    }

    .b {
        font-size: 10px;
    }

</style>

<body>



    <div class="row justify-content-between ml-1 mr-1">
        <!-- Button trigger modal -->
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
            Back</a>

        
      
    </div>

    <hr>


    <div class="container-fluid shadow bg-white p-5 mb-5">

        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-calendar-alt text-primary"></i> Payroll for {{date('M. Y',strtotime($id))}}
        </h3>
        <hr>



        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th colspan="10">
                        <center class="text-primary">BASIC SALARY DETAILS</center>
                    </th>
                </tr>
                <tr>
                    <th><small>ID</small></th>
                    <th><small>Employee Name</small></th>
                    <th><small>Daily Rate</small></th>
                    <th><small>Rate per Hour</small></th>
                    <th><small>Mins</small></th>
                    <th><small>Salary</small></th>
                    <th><small>13th Month</small></th>
                    <th><small>Basic</small></th>
                    <th><small>Emolument</small></th>
                    <th><small>Total Basic Salary</small></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bsd as $bsdView)
                <tr>
                    <td><small>{{$bsdView->emp_pin}}</small></td>
                    <td><small>{{$bsdView->emp_firstname}} {{$bsdView->emp_lastname}}</small></td>
                    <td><small>{{$bsdView->a_daily_rate}}</small></td>
                    <td><small>{{$bsdView->a_rate_per_hour}}</small></td>
                    <td><small>{{$bsdView->a_mins}}</small></td>
                    <td><small>{{$bsdView->a_salary}}</small></td>
                    <td><small>{{$bsdView->p_thirteen_month_pay}}</small></td>
                    <td><small>{{$bsdView->a_basic}}</small></td>
                    <td><small>{{$bsdView->a_emolument}}</small></td>
                    <td><small>{{$bsdView->a_total_basic_salary}}</small></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" class="bg-primary text-white"><small>
                            <center>TOTAL</center>
                        </small></th>
                    <th class="text-primary"><small>{{$salary}}</small></th>
                    <th class="text-primary"><small>{{$p_thirteen_month_pay}}</small></th>
                    <th class="text-primary"><small>{{$basic}}</small></th>
                    <th class="text-primary"><small>{{$emolument}}</small></th>
                    <th class="text-primary"><small>{{$total_basic_salary}}</small></th>
                </tr>
            </tfoot>
        </table>






        <hr>


        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th colspan="13">
                        <center class="text-success">EARNINGS</center>
                    </th>
                </tr>
                <tr>
                    <th class="b">ID</th>
                    <th class="b">Employee Name</th>
                    <th class="b">Basic Pay</th>
                    <th class="b">Absences/Lates<small class="text-danger">(mins)</small></th>
                    <th class="b">Adjustment</th>
                    <th class="b">Net Basic</th>
                    <th class="b">Living Allowance</th>
                    <th class="b">Honorarium</th>
                    <th class="b">Overtime</th>
                    <th class="b">Overload</th>
                    <th class="b">Others</th>
                    <th class="b">Hold Salary Pay Out</th>
                    <th class="b">Total Earnings</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($earnings as $earningsView)
                <tr>
                    <td><small>{{$earningsView->emp_pin}}</small></td>
                    <td><small>{{$earningsView->emp_firstname}} {{$earningsView->emp_lastname}}</small></td>
                    <td><small>{{$earningsView->p_basic_pay}}</small></td>
                    <td><small>{{$earningsView->p_absences}}</small></td>
                    <td><small>{{$earningsView->p_adjustment}}</small></td>
                    <td><small>{{$earningsView->p_net_basic}}</small></td>
                    <td><small>{{$earningsView->p_cost_of_living_allowance}}</small></td>
                    <td><small>{{$earningsView->p_honorarium}}</small></td>
                    <td><small>{{$earningsView->p_overtime}}</small></td>
                    <td><small>{{$earningsView->p_over_load}}</small></td>
                    <td><small>{{$earningsView->p_others}}</small></td>
                    <td><small>{{$earningsView->p_hold_salary_pay_out}}</small></td>
                    <td><small>{{$earningsView->p_total_earnings}}</small></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="bg-success text-white"><small>
                            <center>TOTAL</center>
                        </small></th>
                    <td class="text-success"><small>{{$p_basic_pay}}</small></td>
                    <td class="text-success"><small>{{$p_absences}}</small></td>
                    <td class="text-success"><small>{{$p_adjustment}}</small></td>
                    <td class="text-success"><small>{{$p_net_basic}}</small></td>
                    <td class="text-success"><small>{{$p_cost_of_living_allowance}}</small></td>
                    <td class="text-success"><small>{{$p_honorarium}}</small></td>
                    <td class="text-success"><small>{{$p_overtime}}</small></td>
                    <td class="text-success"><small>{{$p_over_load}}</small></td>
                    <td class="text-success"><small>{{$p_others}}</small></td>
                    <td class="text-success"><small>{{$p_hold_salary_pay_out}}</small></td>
                    <td class="text-success"><small>{{$p_total_earnings}}</small></td>
                </tr>
            </tfoot>
        </table>


        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th colspan="17">
                        <center class="text-danger">DEDUCTIONS</center>
                    </th>
                </tr>
                <tr>
                    <th class="b">ID</th>
                    <th class="b">Employee Name</th>
                    <th class="b">SSS</th>
                    <th class="b">Philhealth</th>
                    <th class="b">Pagibig</th>
                    <th class="b">Total Non Taxable Income</th>
                    <th class="b">Taxable Income</th>
                    <th class="b">Withholding Tax</th>
                    <th class="b">Payable to Fern Realty</th>
                    <th class="b">SSS Loan</th>
                    <th class="b">Pag-Ibig Loan</th>
                    <th class="b">Retirement Contribution</th>
                    <th class="b">Christmas Loan</th>
                    <th class="b">Retirement Loan</th>
                    <th class="b">Cash Advance</th>
                    <th class="b">Other Adjustments</th>
                    <th class="b">Total Deductions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deductions as $deductionsView)
                <tr>
                    <td><small>{{$deductionsView->emp_pin}}</small></td>
                    <td><small>{{$deductionsView->emp_firstname}} {{$deductionsView->emp_lastname}}</small></td>
                    <td><small>{{$deductionsView->p_sss_contribution}}</small></td>
                    <td><small>{{$deductionsView->p_philhealth_contribution}}</small></td>
                    <td><small>{{$deductionsView->p_pagibig_contribution}}</small></td>
                    <td><small>{{$deductionsView->p_total_non_taxable}}</small></td>
                    <td><small>{{$deductionsView->p_taxable_income}}</small></td>
                    <td><small>{{$deductionsView->p_tax_withheld}}</small></td>
                    <td><small>{{$deductionsView->p_others_payable_realty}}</small></td>
                    <td><small>{{$deductionsView->p_sss_loan}}</small></td>
                    <td><small>{{$deductionsView->p_pagibig_loan}}</small></td>
                    <td><small>{{$deductionsView->p_retirement_contributon}}</small></td>
                    <td><small>{{$deductionsView->p_christmas_loan}}</small></td>
                    <td><small>{{$deductionsView->p_retirement_loan}}</small></td>
                    <td><small>{{$deductionsView->p_cash_advance}}</small></td>
                    <td><small>{{$deductionsView->p_others_adjustment}}</small></td>
                    <td><small>{{$deductionsView->p_total_deductions}}</small></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="bg-danger text-white"><small>
                            <center>TOTAL</center>
                        </small></th>
                    <td class="text-danger">{{$p_sss_contribution}}</td>
                    <td class="text-danger">{{$p_philhealth_contribution}}</td>
                    <td class="text-danger">{{$p_pagibig_contribution}}</td>
                    <td class="text-danger">{{$p_total_non_taxable}}</td>
                    <td class="text-danger">{{$p_taxable_income}}</td>
                    <td class="text-danger">{{$p_tax_withheld}}</td>
                    <td class="text-danger">{{$p_others_payable_realty}}</td>
                    <td class="text-danger">{{$p_sss_loan}}</td>
                    <td class="text-danger">{{$p_pagibig_loan}}</td>
                    <td class="text-danger">{{$p_retirement_contributon}}</td>
                    <td class="text-danger">{{$p_christmas_loan}}</td>
                    <td class="text-danger">{{$p_retirement_loan}}</td>
                    <td class="text-danger">{{$p_cash_advance}}</td>
                    <td class="text-danger">{{$p_others_adjustment}}</td>
                    <td class="text-danger">{{$p_total_deductions}}</td>
                </tr>
            </tfoot>
        </table>




    </div>







    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


</body>



@endsection
