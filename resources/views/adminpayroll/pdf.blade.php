<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
            <img class="text-center" src="img/feuname.png" alt="name" height="50" />
        </center>
    </div>




    <hr>
    Payroll for {{date('M. Y',strtotime($months))}}
    
    <hr>

    <center class="text-primary">BASIC SALARY DETAILS</center>
    <table class="table table-bordered table-sm text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Daily Rate</th>
                <th>Rate per Hour</th>
                <th>Mins</th>
                <th>Salary</th>
                <th>13th Month</th>
                <th>Basic</th>
                <th>Emolument</th>
                <th>Total Basic Salary</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table as $view)
            <tr>
                <td>{{$view->emp_id}}</td>
                <td>{{$view->first_name}} {{$view->last_name}}</td>
                <td>{{$view->daily_rate}}</td>
                <td>{{$view->rate_per_hour}}</td>
                <td>{{$view->mins}}</td>
                <td>{{$view->salary}}</td>
                <td>{{$view->p_thirteen_month_pay}}</td>
                <td>{{$view->basic}}</td>
                <td>{{$view->emolument}}</td>
                <td>{{$view->total_basic_salary}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            <td class="bg-secondary text-white">{{$salary}}</td>
                <td class="bg-secondary text-white">{{$p_thirteen_month_pay}}</td>
                <td class="bg-secondary text-white">{{$basic}}</td>
                <td class="bg-secondary text-white">{{$emolument}}</td>
                <td class="bg-secondary text-white">{{$total_basic_salary}}</td>
            </tr>
        </tfoot>
    </table>

    <div class="page-break"></div>

    <div class="row">
        <center>
            <img class="text-center" src="img/feulogo.png" alt="logo" height="55" />
            <img class="text-center" src="img/feuname.png" alt="name" height="50" />
        </center>
    </div>

    <hr>
    <center>Payroll for {{date('M. Y',strtotime($months))}}</center>
    <center>(Non-Faculty)</center>
    <hr>

    <center class="text-success">EARNINGS</center>
    <table class="table table-bordered table-sm text-center">
        <thead>
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
            @foreach ($table as $view)
            <tr>
                <td>{{$view->emp_id}}</td>
                <td>{{$view->first_name}} {{$view->last_name}}</td>
                <td>{{$view->p_basic_pay}}</td>
                <td>{{$view->p_absences}}</td>
                <td>{{$view->p_adjustment}}</td>
                <td>{{$view->p_net_basic}}</td>
                <td>{{$view->p_cost_of_living_allowance}}</td>
                <td>{{$view->p_honorarium}}</td>
                <td>{{$view->p_overtime}}</td>
                <td>{{$view->p_over_load}}</td>
                <td>{{$view->p_others}}</td>
                <td>{{$view->p_hold_salary_pay_out}}</td>
                <td>{{$view->p_total_earnings}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
            <td class="bg-secondary text-white">{{$p_basic_pay}}</td>
                <td class="bg-secondary text-white">{{$p_absences}}</td>
                <td class="bg-secondary text-white">{{$p_adjustment}}</td>
                <td class="bg-secondary text-white">{{$p_net_basic}}</td>
                <td class="bg-secondary text-white">{{$p_cost_of_living_allowance}}</td>
                <td class="bg-secondary text-white">{{$p_honorarium}}</td>
                <td class="bg-secondary text-white">{{$p_overtime}}</td>
                <td class="bg-secondary text-white">{{$p_over_load}}</td>
                <td class="bg-secondary text-white">{{$p_others}}</td>
                <td class="bg-secondary text-white">{{$p_hold_salary_pay_out}}</td>
                <td class="bg-secondary text-white">{{$p_total_earnings}}</td>
            </tr>
        </tfoot>
    </table>


    <div class="page-break"></div>

    <div class="row">
        <center>
            <img class="text-center" src="img/feulogo.png" alt="logo" height="55" />
            <img class="text-center" src="img/feuname.png" alt="name" height="50" />
        </center>
    </div>

    <hr>

    <center>Payroll for {{date('M. Y',strtotime($months))}}</center>
    <center>(Non-Faculty)</center>
    <hr>

    <center class="text-danger">DEDUCTIONS</center>
    <table class="table table-bordered table-sm text-center">
        <thead>
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
            @foreach ($table as $view)
                <tr>
                        <td>{{$view->emp_id}}</td>
                        <td>{{$view->first_name}} {{$view->last_name}}</td>
                        <td>{{$view->p_sss_contribution}}</td>
                        <td>{{$view->p_philhealth_contribution}}</td>
                        <td>{{$view->p_pagibig_contribution}}</td>
                        <td>{{$view->p_total_non_taxable}}</td>
                        <td>{{$view->p_taxable_income}}</td>
                        <td>{{$view->p_tax_withheld}}</td>
                        <td>{{$view->p_others_payable_realty}}</td>
                        <td>{{$view->p_sss_loan}}</td>
                        <td>{{$view->p_pagibig_loan}}</td>
                        <td>{{$view->p_retirement_contributon}}</td>
                        <td>{{$view->p_christmas_loan}}</td>
                        <td>{{$view->p_retirement_loan}}</td>
                        <td>{{$view->p_cash_advance}}</td>
                        <td>{{$view->p_others_adjustment}}</td>
                        <td>{{$view->p_total_deductions}}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                    <td></td>
                    <td></td>
                    <td class="bg-secondary text-white">{{$p_sss_contribution}}</td>
                    <td class="bg-secondary text-white">{{$p_philhealth_contribution}}</td>
                    <td class="bg-secondary text-white">{{$p_pagibig_contribution}}</td>
                    <td class="bg-secondary text-white">{{$p_total_non_taxable}}</td>
                    <td class="bg-secondary text-white">{{$p_taxable_income}}</td>
                    <td class="bg-secondary text-white">{{$p_tax_withheld}}</td>
                    <td class="bg-secondary text-white">{{$p_others_payable_realty}}</td>
                    <td class="bg-secondary text-white">{{$p_sss_loan}}</td>
                    <td class="bg-secondary text-white">{{$p_pagibig_loan}}</td>
                    <td class="bg-secondary text-white">{{$p_retirement_contributon}}</td>
                    <td class="bg-secondary text-white">{{$p_christmas_loan}}</td>
                    <td class="bg-secondary text-white">{{$p_retirement_loan}}</td>
                    <td class="bg-secondary text-white">{{$p_cash_advance}}</td>
                    <td class="bg-secondary text-white">{{$p_others_adjustment}}</td>
                    <td class="bg-secondary text-white">{{$p_total_deductions}}</td>
            </tr>
        </tfoot>
    </table>


    
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

</html>






