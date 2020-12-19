<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Payslip PDF</title>

    <style>
        .logobanner {
            position: relative;
            top: 15px;
            left: 50px;
        }

        .editTable {
            height: 59px;
        }

        .editTables {
            height: 300px;
        }

        .top {
            position: relative;
            top: -40px;
        }

        
     

    </style>
</head>

<body>
@foreach ($show as $shows)
    

    <div class="container-fluid">
        <div class="row">

            <div class="col-6 border border-secondary top">
                <div class="logobanner pb-2">
                    <img class="text-center" src="img/feulogo.png" alt="logo" height="55" />
                    <img class="text-center" src="img/feuname.png" alt="name" height="50" />
                </div>
           

                <div class="row pl-3 pr-3">
                    <div class="border border-secondary text-center bg-info">
                        <small>Pay Period: {{$shows->date}} </small>
                    </div>
                </div>

                <div class="row pl-3 pr-3 editTable">
                    <div class="border border-secondary text-center">

                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td><small>Employee ID</small></td>
                                    <td><small>{{$shows->employee_id}}</small></td>
                                </tr>
                                <tr>
                                    <td><small>Employee Name</small></td>
                                    <td><small>{{$shows->name}}</small></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>


                <div class="row pl-3 pr-3 editTables">
                    <div class="border border-secondary text-center">

                        <table class="table table-sm" height="10%">
                            <tbody>
                                <thead>
                                    <tr class="table-success">
                                        <td colspan="2" class="text-center text-dark earnings" style="padding: -1px">
                                            <small><strong>EARNINGS</strong></small></td>
                                    </tr>
                                </thead>

                                <tr>
                                    <td><small>Basic Pay</small></td>
                                    <td><small>{{$shows->p_basic_pay}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Absences / Lates</small></td>
                                    <td><small>{{$shows->p_absences}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Adjustment</small></td>
                                    <td><small>{{$shows->p_adjustment}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Net Basic</small></td>
                                    <td><small>{{$shows->p_net_basic}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Honorarium</small></td>
                                    <td><small>{{$shows->p_honorarium}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Overtime</small></td>
                                    <td><small>{{$shows->p_overtime}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Over Load</small></td>
                                    <td><small>{{$shows->p_over_load}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Others</small></td>
                                    <td><small>{{$shows->p_others}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Hold Salary Pay out</small></td>
                                    <td><small>{{$shows->p_hold_salary_pay_out}}</small></td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>


                <div class="row pl-3 pr-3">
                    <div class="border border-secondary text-center">

                        <table class="table table-sm">
                            <tbody>
                                <tr class="table-warning">
                                    <td style="padding: -2px"><small>Total Earnings</small></td>
                                    <td style="padding: -2px"><small>{{$shows->p_total_earnings}}</small></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>


                <div class="row pl-3 pr-3 mt-0 deductions">
                    <div class="border border-secondary text-center">

                        <table class="table table-sm">
                            <tbody>
                                <thead>
                                    <tr class="table-success">
                                        <td colspan="2" class="text-center text-dark" style="padding: -1px">
                                            <small><strong>DEDUCTIONS</strong></small></td>
                                    </tr>
                                </thead>

                                <tr>
                                    <td><small>SSS Contribution</small></td>
                                    <td><small>{{$shows->p_sss_contribution}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Philhealth Contribution</small></td>
                                    <td><small>{{$shows->p_philhealth_contribution}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Pag-ibig Contribution</small></td>
                                    <td><small>{{$shows->p_pagibig_contribution}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>SSS Loan</small></td>
                                    <td><small>{{$shows->p_sss_loan}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Pag-ibig Loan</small></td>
                                    <td><small>{{$shows->p_pagibig_loan}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Tax Withheld</small></td>
                                    <td><small>{{$shows->p_tax_withheld}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Cash Advance</small></td>
                                    <td><small>{{$shows->p_cash_advance}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Retirement Contribution</small></td>
                                    <td><small>{{$shows->p_retirement_contributon}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Christmas Loan</small></td>
                                    <td><small>{{$shows->p_christmas_loan}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Retirement Loan</small></td>
                                    <td><small>{{$shows->p_retirement_loan}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Others Adjustment</small></td>
                                    <td><small>{{$shows->p_others_adjustment}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>Others Payable Realty</small></td>
                                    <td><small>{{$shows->p_others_payable_realty}}</small></td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>


                <div class="row pl-3 pr-3">
                    <div class="border border-secondary text-center">

                        <table class="table table-sm">
                            <tbody>
                                <tr class="table-warning">
                                    <td style="padding: -1px" class="pr-3"><small>Total Deductions</small></td>
                                    <td style="padding: -1px" class="pr-2"><small>{{$shows->p_total_deductions}}</small></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="row pl-3 pr-3 mt-0">
                    <div class="border border-secondary text-center">

                        <table class="table table-sm">
                            <tbody>
                                <thead>
                                    <tr class="table-success">
                                        <td colspan="2" class="text-center text-dark" style="padding: -1px">
                                            <small><strong>Net Pay</strong></small></td>
                                    </tr>
                                </thead>

                                <tr>
                                    <td><small>1st Half Pay</small></td>
                                    <td><small>{{$shows->p_first_half_pay}}</small></td>
                                </tr>

                                <tr>
                                    <td><small>2nd Half Pay</small></td>
                                    <td><small>{{$shows->p_second_half_pay}}</small></td>
                                </tr>

                                 
                                <tr class="table-warning">
                                    <td style="padding: -1px"><small>Monthly Pay</small></td>
                                    <td style="padding: -1px"><small>{{$shows->p_monthly_pay}}</small></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="row pl-3 pr-3">
                    <div class="border border-secondary text-center bg-dark text-white">
                        <small>Reference No. {{$shows->payslip}} </small>
                    </div>
                </div>

            </div>
        </div>


        @endforeach
    </div>






    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
