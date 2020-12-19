<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
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

</head>

<body>



    <div class="row">
        <center>
            <img class="text-center" src="img/feulogo.png" alt="logo" height="55" />
        </center>
    </div>

    <hr>

 
    <table class="table table-bordered table-sm text-center">
        <thead>
            <tr>
                <th colspan="10">
                    <center class="text-primary">BASIC SALARY DETAILS</center>
                </th>
            </tr>
            <tr style="text-align:center; width:10px;">
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
                <th></th>
                <th class="b">Basic Pay</th>
                <th class="b">Absences/Lates</th>
                <th class="b">Adjustment</th>
                <th class="b">Net Basic</th>
                <th class="b">Living Allowance</th>
                <th class="b">Honorarium</th>
                <th class="b">Overtime</th>
                <th class="b">Overload</th>
                <th class="b">Others</th>
                <th class="b">Hold Salary Pay Out</th>
                <th class="b">Total Earnings</th>
                <th></th>
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
                <th></th>
                <th class="b">Monthly Pay</th>
                <th class="b">1st Half Pay</th>
                <th class="b">2nd Half Pay</th>

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
                <td></td>
                    <td><small>{{$bsdView->p_basic_pay}}</small></td>
                    <td><small>{{$bsdView->p_absences}}</small></td>
                    <td><small>{{$bsdView->p_adjustment}}</small></td>
                    <td><small>{{$bsdView->p_net_basic}}</small></td>
                    <td><small>{{$bsdView->p_cost_of_living_allowance}}</small></td>
                    <td><small>{{$bsdView->p_honorarium}}</small></td>
                    <td><small>{{$bsdView->p_overtime}}</small></td>
                    <td><small>{{$bsdView->p_over_load}}</small></td>
                    <td><small>{{$bsdView->p_others}}</small></td>
                    <td><small>{{$bsdView->p_hold_salary_pay_out}}</small></td>
                    <td><small>{{$bsdView->p_total_earnings}}</small></td>
                    <td></td>
                    <td><small>{{$bsdView->p_sss_contribution}}</small></td>
                    <td><small>{{$bsdView->p_philhealth_contribution}}</small></td>
                    <td><small>{{$bsdView->p_pagibig_contribution}}</small></td>
                    <td><small>{{$bsdView->p_total_non_taxable}}</small></td>
                    <td><small>{{$bsdView->p_taxable_income}}</small></td>
                    <td><small>{{$bsdView->p_tax_withheld}}</small></td>
                    <td><small>{{$bsdView->p_others_payable_realty}}</small></td>
                    <td><small>{{$bsdView->p_sss_loan}}</small></td>
                    <td><small>{{$bsdView->p_pagibig_loan}}</small></td>
                    <td><small>{{$bsdView->p_retirement_contributon}}</small></td>
                    <td><small>{{$bsdView->p_christmas_loan}}</small></td>
                    <td><small>{{$bsdView->p_retirement_loan}}</small></td>
                    <td><small>{{$bsdView->p_cash_advance}}</small></td>
                    <td><small>{{$bsdView->p_others_adjustment}}</small></td>
                    <td><small>{{$bsdView->p_total_deductions}}</small></td>
                    <td></td>
                    <td><small>{{$bsdView->p_monthly_pay}}</small></td>
                    <td><small>{{$bsdView->p_first_half_pay}}</small></td>
                    <td><small>{{$bsdView->p_second_half_pay}}</small></td>
          
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
                <td></td>
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
                <td></td>
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
                        <td></td>
                        <td class="text-dark">{{$p_monthly_pay}}</td>
                        <td class="text-dark">{{$p_first_half_pay}}</td>
                        <td class="text-dark">{{$p_second_half_pay}}</td>
            </tr>
        </tfoot>
    </table>



</body>




</html>
