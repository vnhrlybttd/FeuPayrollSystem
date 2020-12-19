<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        hr {
            position: relative;
            top: -15px;
        }

        td {
            font-size: 8px;
        }

        th {
            font-size: 8px;
        }

        table {
            position: relative;
            top: -25px;
        }

    </style>
</head>

<body>

    <div class="pl-5 pr-5">
        <hr>
        <div class="row">
            <center>
                <img class="text-center" src="img/feulogo.png" alt="logo" height="30" />
                <img class="text-center" src="img/feuname.png" alt="name" height="25" />
            </center>
        </div>
        <hr>

        @foreach ($table as $view)

        <table class="table table-borderless text-center border-bottom border-dark">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Employee No.</th>
                    <th class="border-right border-white">Employee Name</th>
                    <th>Date</th>
                    <th>Payslip No.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$view->emp_id}}</td>
                    <td class="border-right border-dark">{{$view->first_name}} {{$view->last_name}}</td>
                    <td>{{date('M. Y',strtotime($view->date))}}</td>
                    <td>{{$id}}</td>
                </tr>
            </tbody>
            <thead>
                <tr class="bg-dark text-white">
                    <th>Earnings</th>
                    <th class="border-right border-white">Amount</th>
                    <th>Deductions</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="label"> Basic Pay</div>
                        <div class="label"> Absences/Lates</div>
                        <div class="label border-bottom border-dark"> Adjustment</div>
                        <div class="label"> Net Basic</div>
                        <div class="label"> Cost of Living Allowance</div>
                        <div class="label"> Honorarium</div>
                        <div class="label"> Overtime</div>
                        <div class="label"> Overload</div>
                        <div class="label"> Others</div>
                        <div class="label border-bottom border-dark"> Hold Salary Pay Out</div>
                        <div class="label"> Total Earnings</div>
                    </td>
                    <td>
                        <div class="label">{{$view->basic}}</div>
                        <div class="label">{{$view->p_absences}}</div>
                        <div class="label border-bottom border-dark">{{$view->p_adjustment}}</div>
                        <div class="label">{{$view->p_net_basic}}</div>
                        <div class="label">{{$view->p_cost_of_living_allowance}}</div>
                        <div class="label">{{$view->p_honorarium}}</div>
                        <div class="label">{{$view->p_overtime}}</div>
                        <div class="label">{{$view->p_over_load}}</div>
                        <div class="label">{{$view->p_others}}</div>
                        <div class="label border-bottom border-dark">{{$view->p_hold_salary_pay_out}}</div>
                        <div class="label">Php {{$view->p_total_earnings}}</div>
                    </td>
                    <td>
                        <div class="label"> SSS Contribution</div>
                        <div class="label"> Philhealth Contribution</div>
                        <div class="label"> Pag-ibig Contribution</div>
                        <div class="label"> SSS Loan</div>
                        <div class="label"> Pag-ibig Loan</div>
                        <div class="label"> Tax Withheld</div>
                        <div class="label"> Cash Advance</div>
                        <div class="label"> Retirement Contribution</div>
                        <div class="label"> Christmas Loan</div>
                        <div class="label"> Retirement Loan</div>
                        <div class="label"> Others (Adjustment)</div>
                        <div class="label border-bottom border-dark"> Others (Payable to FERN Realty)</div>
                        <div class="label"> Total Deductions</div>
                    </td>
                    <td>
                        <div class="label">{{$view->p_sss_contribution}}</div>
                        <div class="label">{{$view->p_philhealth_contribution}}</div>
                        <div class="label">{{$view->p_pagibig_contribution}}</div>
                        <div class="label">{{$view->p_sss_loan}}</div>
                        <div class="label">{{$view->p_pagibig_loan}}</div>
                        <div class="label">{{$view->p_tax_withheld}}</div>
                        <div class="label">{{$view->p_cash_advance}}</div>
                        <div class="label">{{$view->p_retirement_contributon}}</div>
                        <div class="label">{{$view->p_christmas_loan}}</div>
                        <div class="label">{{$view->p_retirement_loan}}</div>
                        <div class="label">{{$view->p_others_adjustment}}</div>
                        <div class="label border-bottom border-dark">{{$view->p_others_payable_realty}}</div>
                        <div class="label">Php {{$view->p_total_deductions}}</div>
                    </td>
                </tr>

            </tbody>
            <thead>
                <tr class="bg-dark text-white">
                    <th>Net Pay</th>
                    <th class="border-right border-white">Amount</th>
                    <th colspan="2">Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="label"> 1st Half Pay</div>
                        <div class="label border-bottom border-dark"> 2nd Half Pay</div>

                        <div class="label"> Monthly Pay</div>
                    </td>
                    <td>
                        <div class="label">Php {{$view->p_first_half_pay}}</div>
                        <div class="label border-bottom border-dark">Php {{$view->p_second_half_pay}}</div>
                   
                        <div class="label"> Php {{$view->p_monthly_pay}}</div>
                    </td>
                </tr>

            </tbody>
         

        </table>

        @endforeach





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



</html>
