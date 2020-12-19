@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Payroll Computation</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-coins"></i> Monthly Pay</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-calculator"></i> Edit Monthly Pay</li>
    </ol>
</nav>
<hr>



<div class="row justify-content-between ml-1">
        <!-- Button trigger modal -->
    <a class="btn btn-primary" href="{{action('AddPayslipNFController@index')}}"><i class="fas fa-arrow-circle-left"></i>
            Back</a>

            {!! Form::model($find, ['method' => 'PATCH','route' => ['AddPayslipF.update', $find->payslip]]) !!}
@csrf
            <div class="row justify-content-end mb-1 mr-2">
                    <button class="btn btn-success" type="submit">Proceed</button>
                </div>

    </div>

    <hr> 

    <div class="bg-white shadow p-5">




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
</div>
@endif

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
            @foreach ($employee as $employeeView)
            <h5>{{$employeeView->emp_pin}}</h5>
            @endforeach
        </div>
    </div>
    <div class="align-self-center">
        <div class="form-group">
            <div class="label">Pay Period:</div>
            <h5>{{  date('M. Y',strtotime($find->date))}}</h5>

        </div>
    </div>
</div>


<div class="border border-primary mt-2">
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-coins text-primary"></i> Monthly Pay
        </h3>
        <hr>

        <div class="form-group pl-5 pr-5">
            <input type="text" class="form-control bg-primary text-center text-white"
        name="p_monthly_pay" id="monthly_pay" readonly value="{{$find->p_monthly_pay}}">
        </div>

    </div>

    <div class="row mt-2 mb-3">
            <div class="col">
                <div class="border border-success ">
                    <h3 class="pt-2 text-secondary text-center">
                        <i class="fas fa-coins text-success"></i> Total Earnings
                    </h3>
                    <hr>

                    <div class="form-group pl-5 pr-5">
                        <strong for="exampleInputEmail1">Total Earnings</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-ruble-sign text-success"></i></span>
                            <input type="number" class="form-control bg-success text-white"
                                name="p_total_earnings" id="total_earnings" readonly value="{{$find->p_total_earnings}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border border-danger">
                    <h3 class="pt-2 text-secondary text-center">
                        <i class="fab fa-creative-commons-nd text-danger"></i> Total Deductions
                    </h3>
                    <hr>

                    <div class="form-group pl-5 pr-5">
                        <strong for="exampleInputEmail1">Total Deductions</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-danger bg-white"><i
                                    class="fas fa-ruble-sign text-danger"></i></span>
                            <input type="number" class="form-control bg-danger text-white"
                                name="p_total_deductions" id="total_deductions" readonly value="{{$find->p_total_deductions}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="border border-primary">
                    <h3 class="pt-2 text-secondary text-center">
                        <i class="fas fa-money-bill-wave text-primary"></i> Half Pay
                    </h3>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="form-group ml-2">
                                <strong for="exampleInputEmail1">1st Half Pay</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-primary bg-white"><i
                                            class="fas fa-ruble-sign text-primary"></i></span>
                                    <input type="text" class="form-control bg-primary text-white"
                                        name="p_first_half_pay" id="first_half_pay" readonly value="{{$find->p_first_half_pay}}">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mr-2">
                                <strong for="exampleInputEmail1">2nd Half Pay</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-primary bg-white"><i
                                            class="fas fa-ruble-sign text-primary"></i></span>
                                    <input type="text" class="form-control bg-primary text-white"
                                        name="p_second_half_pay" id="second_half_pay" readonly value="{{$find->p_second_half_pay}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mr-3">
                            <input class="form-control" id="thirteen_month_pay"
                                name="p_thirteen_month_pay" hidden value="{{$find->p_thirteen_month_pay}}">
                        </div>

                        <div class="form-group mr-3">
                            <input class="form-control" id="p_total_non_taxable"
                                name="p_total_non_taxable"  value="{{$find->p_total_non_taxable}}" hidden>
                        </div>

                        <div class="form-group mr-3">
                            <input class="form-control" id="p_taxable_income" name="p_taxable_income"
                            value="{{$find->p_taxable_income}}"  hidden>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2 mb-3">

                <div class="col">
                    <div class="border border-success">
                        <h3 class="pt-2 text-secondary text-center">
                            <i class="fas fa-hand-holding-usd text-success"></i> Allowances
                        </h3>
                        <hr>




                        <div class="form-group pl-5 pr-5">
                            <strong for="exampleInputEmail1">Basic Pay</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                   


                                <input type="number"
                                    class="form-control form-control-sm bg-success text-white"
                                    name="p_basic_pay" id="basic_pay" readonly step="any"
                               value="{{$find->p_basic_pay}}">
                      
                            </div>
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <strong for="exampleInputEmail1">Absences/Lates</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                                <input id="hidden_absences"     value="{{$find->hidden_absences}}" step="any" readonly name="hidden_absences" hidden>
                          
                                <input id="mins_absences"  step="any" readonly  value="{{$find->a_mins}}" hidden>
                     
                                <input type="number"
                                    class="form-control form-control-sm bg-success text-white"
                                    name="p_absences" id="absences" readonly step="any" value="{{$find->p_absences}}">
                            </div>
                        </div>


                        <div class="form-group pl-5 pr-5">
                            <strong for="exampleInputEmail1">Adjustment</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                                <input type="number" class="form-control form-control-sm"
                                    name="p_adjustment" id="adjustment" step="any" value="{{$find->p_adjustment}}" >
                            </div>
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <strong for="exampleInputEmail1">Net Basic</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                                <input type="number"
                                    class="form-control form-control-sm bg-success text-white"
                                    name="p_net_basic" id="net_basic" readonly step="any" value="{{$find->p_net_basic}}">
                            </div>
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <strong for="exampleInputEmail1">Cost of Living Allowance</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                                <input type="number" class="form-control form-control-sm"
                                    name="p_cost_of_living_allowance" id="cost_of_living_allowance"
                                    step="any"  value="{{$find->p_cost_of_living_allowance}}">
                            </div>
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <strong for="exampleInputEmail1">Honorarium</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                                <input type="number" class="form-control form-control-sm"
                                    name="p_honorarium" id="honorarium" step="any" value="{{$find->p_honorarium}}">
                            </div>
                        </div>

                        <div class="form-group pl-5 pr-5">
                        <strong for="exampleInputEmail1">Overtime  </strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                                <input type="number" class="form-control form-control-sm bg-success text-white" name="p_overtime"
                                    id="overtime" step="any" value="{{$find->p_overtime}}">
                                    <input id="otOne" name="otOne" hidden value="{{$find->otOne}}">
                                    <input  id="otTwo" name="otTwo" hidden value="{{$find->otTwo}}">
                            </div>
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <strong for="exampleInputEmail1">Over Load</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                                      

                                <input type="number" class="form-control form-control-sm" name="p_over_load"
                                id="over_load" step="any" value="{{$find->p_over_load}}">

                               
                            </div>
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <strong for="exampleInputEmail1">Others</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                                <input type="number" class="form-control" name="p_others" id="others"
                                    step="any"  value="{{$find->p_others}}">
                            </div>
                        </div>

                        <div class="form-group pl-5 pr-5">
                            <strong for="exampleInputEmail1">Hold Salary Pay Out</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-success bg-white"><i
                                        class="fas fa-ruble-sign text-success"></i></span>
                                <input type="number" class="form-control" name="p_hold_salary_pay_out"
                                    id="hold_salary_pay_out" step="any" value="{{$find->p_hold_salary_pay_out}}">
                            </div>
                        </div>



                    </div>
                </div>


                <div class="col">
                        <div class="border border-danger">
                            <h3 class="pt-2 text-secondary text-center">
                                <i class="fas fa-times text-danger"></i> Deductions
                            </h3>
                            <hr>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">SSS Contribution</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>

                                    <input type="number"
                                        class="form-control form-control-sm bg-danger text-white"
                                        name="p_sss_contribution" id="sss_contribution" step="any" readonly value="{{$find->p_sss_contribution}}">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Philhealth Contribution</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number"
                                        class="form-control form-control-sm bg-danger text-white"
                                        name="p_philhealth_contribution" id="philhealth_contribution" step="any"
                                        readonly value="{{$find->p_philhealth_contribution}}">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Pag-ibig Contribution</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number"
                                        class="form-control form-control-sm bg-danger text-white"
                                         id="pagibig_contribution" step="any"
                                        readonly name="pagibig_contri_amt" value="{{$find->pagibig_contri_amt}}">
                                     
                                  
                                    <input placeholder="Additional" class="form-control form-control-sm" id="additional" type="number" name="pagibig_contri_add" value="{{$find->pagibig_contri_add}}"> =
                                    <input  class="form-control form-control-sm bg-danger text-white" id="total" name="p_pagibig_contribution" type="number" readonly  value="{{$find->p_pagibig_contribution}}">
                             
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">SSS Loan Contribution</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number" class="form-control form-control-sm"
                                        id="sss_loan" step="any" placeholder="Amt." name="sss_loan_amt" value="{{$find->sss_loan_amt}}">

                                        <input placeholder="No. of Months" class="form-control form-control-sm" id="sss_month_loan" type="number" name="sss_loan_add" value="{{$find->sss_loan_add}}"> =
                                        <input  class="form-control form-control-sm bg-danger text-white " id="sss_total_loan" name="p_sss_loan" type="number" readonly value="{{$find->p_sss_loan}}">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Pag-Ibig Loan</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number" class="form-control form-control-sm"
                                         id="pagibig_loan" step="any" placeholder="Amt." name="pagibig_loan_amt" value="{{$find->pagibig_loan_amt}}">

                                        <input placeholder="No. of Months" class="form-control form-control-sm" id="pagibig_month_loan" type="number" name="pagibig_loan_add" value="{{$find->pagibig_loan_add}}"> =
                                        <input  class="form-control form-control-sm bg-danger text-white " id="pagibig_total_loan" name="p_pagibig_loan" type="number" readonly value="{{$find->p_pagibig_loan}}">

                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Tax Withheld</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number"
                                        class="form-control form-control-sm bg-danger text-white"
                                        name="p_tax_withheld" id="tax_withheld" step="any" readonly value="{{$find->p_tax_withheld}}">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Cash Advance</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number" class="form-control form-control-sm"
                                        name="p_cash_advance" id="cash_advance" step="any" value="{{$find->p_cash_advance}}">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Retirement Contribution</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number" class="form-control form-control-sm"
                                        name="p_retirement_contributon" id="retirement_contributon" step="any"
                                        value="{{$find->p_retirement_contributon}}">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Christmas Loan</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number" class="form-control form-control-sm"
                                        name="p_christmas_loan" id="christmas_loan" step="any" value="{{$find->p_christmas_loan}}">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Retirement Loan</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number" class="form-control form-control-sm"
                                        name="p_retirement_loan" id="retirement_loan" step="any" value="{{$find->p_retirement_loan}}">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Other Adjustment</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number" class="form-control form-control-sm"
                                        name="p_others_adjustment" id="others_adjustment" step="any" value="{{$find->p_others_adjustment}}">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <strong for="exampleInputEmail1">Others (Payable to FERN Realty)</strong>
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-danger bg-white"><i
                                            class="fas fa-ruble-sign text-danger"></i></span>
                                    <input type="number" class="form-control form-control-sm"
                                        name="p_others_payable_realty" id="others_payable_realty" step="any"
                                        value="{{$find->p_others_payable_realty}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($sss_table as $sss)
                    <input class="form-control" step="any" id="{{$sss->sss_id}}s" value="{{$sss->ss_ee}}" hidden>
                    @endforeach



{!! Form::close() !!}
</div>

<script>
        $('input').keyup(function () { // run anytime the value changes
    
    
    
            //EARNINGS
    
            var basic_pay = Number($('#basic_pay').val()); // get value of field
            var absences = Number($('#absences').val()); // convert it to a float
            var adjustment = Number($('#adjustment').val());
            var cost_of_living_allowance = Number($('#cost_of_living_allowance').val());
            var honorarium = Number($('#honorarium').val());
            var overtime = Number($('#overtime').val());
            var over_load = Number($('#over_load').val());
            var others = Number($('#others').val());
            var hold_salary_pay_out = Number($('#hold_salary_pay_out').val());
            var thirteen_month_pay = Number($('#thirteen_month_pay').val());
            var net_basic = Number($('#net_basic').val());
            var total_earnings = Number($('#total_earnings').val());
    
            var hidden_absences = Number($('#hidden_absences').val());
            var mins_absences = Number($('#mins_absences').val());
    
            var otOne = Number($('#otOne').val());
            var otTwo = Number($('#otTwo').val());
    
            formula_otOne = otOne * .25;
            formula_otTwo = otTwo * .30;
    
            document.getElementById('overtime').value = (formula_otOne + formula_otTwo) * mins_absences;
    
    
    
            formula_absences = hidden_absences * mins_absences;
            document.getElementById('absences').value = formula_absences;
    
    
            //$('#net_basic').html(basic_pay - absences + adjustment); // add them and output it
            document.getElementById('net_basic').value = basic_pay - absences + adjustment;
    
            var thirteen_month_pay_formula = (net_basic)/12;
            var thirteen_month_pay_formula_decimal = thirteen_month_pay_formula.toFixed(2);
            document.getElementById('thirteen_month_pay').value = thirteen_month_pay_formula_decimal;
    
            //Total Earnings
            total_earnings_formula = basic_pay - absences + adjustment +
                cost_of_living_allowance + honorarium + overtime + over_load + others + hold_salary_pay_out;
            var total_earnings_decimal = total_earnings_formula.toFixed(2);
            document.getElementById('total_earnings').value = total_earnings_decimal;
            // add them and output it
    
    
            
            //SSS TABLE
            var sss1 = Number($('#1s').val());
            var sss2 = Number($('#2s').val());
            var sss3 = Number($('#3s').val());
            var sss4 = Number($('#4s').val());
            var sss5 = Number($('#5s').val());
            var sss6 = Number($('#6s').val());
            var sss7 = Number($('#7s').val());
            var sss8 = Number($('#8s').val());
            var sss9 = Number($('#9s').val());
            var sss10 = Number($('#10s').val());
    
            var sss11 = Number($('#11s').val());
            var sss12 = Number($('#12s').val());
            var sss13 = Number($('#13s').val());
            var sss14 = Number($('#14s').val());
            var sss15 = Number($('#15s').val());
            var sss16 = Number($('#16s').val());
            var sss17 = Number($('#17s').val());
            var sss18 = Number($('#18s').val());
            var sss19 = Number($('#19s').val());
            var sss20 = Number($('#20s').val());
    
            var sss21 = Number($('#21s').val());
            var sss22 = Number($('#22s').val());
            var sss23 = Number($('#23s').val());
            var sss24 = Number($('#24s').val());
            var sss25 = Number($('#25s').val());
            var sss26 = Number($('#26s').val());
            var sss27 = Number($('#27s').val());
            var sss28 = Number($('#28s').val());
            var sss29 = Number($('#29s').val());
            var sss30 = Number($('#30s').val());
    
            var sss31 = Number($('#31s').val());
            var sss32 = Number($('#32s').val());
            var sss33 = Number($('#33s').val());
            var sss34 = Number($('#34s').val());
            var sss35 = Number($('#35s').val());
            var sss36 = Number($('#36s').val());
            var sss37 = Number($('#37s').val());
            var sss_contribution = Number($('#sss_contribution').val());
    
            //Formulas
    
         
            if (total_earnings_formula < 2250) {
                document.getElementById('sss_contribution').value = sss1;
            } 
            else if ( total_earnings_formula <= 2749.99) {
                document.getElementById('sss_contribution').value = sss2;
            }
            else if (total_earnings_formula <= 3249.99) {
                document.getElementById('sss_contribution').value = sss3;
            }       
            else if (total_earnings_formula <= 3749.99) {
                document.getElementById('sss_contribution').value = sss4;
            }
            else if (total_earnings_formula <= 4249.99) {
                document.getElementById('sss_contribution').value = sss5;
            }
            else if (total_earnings_formula <= 4749.99) {
                document.getElementById('sss_contribution').value = sss6;
            }
            else if (total_earnings_formula <= 5249.99) {
                document.getElementById('sss_contribution').value = sss7;
            }
    
            
         
            else if (total_earnings_formula <= 5749.99) {
                document.getElementById('sss_contribution').value = sss8;
            }
            else if (total_earnings_formula <= 6249.99) {
                document.getElementById('sss_contribution').value = sss9;
            }
            else if (total_earnings_formula <= 6749.99) {
                document.getElementById('sss_contribution').value = sss10;
            }
            else if (total_earnings_formula <= 7249.99) {
                document.getElementById('sss_contribution').value = sss11;
            }
            else if (total_earnings_formula <= 7749.99) {
                document.getElementById('sss_contribution').value = sss12;
            }
            else if (total_earnings_formula <= 8249.99) {
                document.getElementById('sss_contribution').value = sss13;
            }
            else if (total_earnings_formula <= 8749.99) {
                document.getElementById('sss_contribution').value = sss14;
            }
            else if ( total_earnings_formula <= 9249.99) {
                document.getElementById('sss_contribution').value = sss15;
            }
            else if (total_earnings_formula <= 9749.99) {
                document.getElementById('sss_contribution').value = sss16;
            }
            else if (total_earnings_formula <= 10249.99) {
                document.getElementById('sss_contribution').value = sss17;
            }
            else if (total_earnings_formula <= 10749.99) {
                document.getElementById('sss_contribution').value = sss18;
            }
            else if (total_earnings_formula <= 11249.99) {
                document.getElementById('sss_contribution').value = sss19;
            }
       
    
            else if (total_earnings_formula <= 11749.99) {
                document.getElementById('sss_contribution').value = sss20;
            }
            else if (total_earnings_formula <= 12249.99) {
                document.getElementById('sss_contribution').value = sss21;
            }
            else if (total_earnings_formula <= 12749.99) {
                document.getElementById('sss_contribution').value = sss22;
            }
            else if (total_earnings_formula <= 13249.99) {
                document.getElementById('sss_contribution').value = sss23;
            }
            else if (total_earnings_formula <= 13749.99) {
                document.getElementById('sss_contribution').value = sss24;
            } 
            else if (total_earnings_formula <= 14249.99) {
                document.getElementById('sss_contribution').value = sss25;
            }         
            else if (total_earnings_formula <= 14749.99) {
                document.getElementById('sss_contribution').value = sss26;
            }
            else if (total_earnings_formula <= 15249.99) {
                document.getElementById('sss_contribution').value = sss27;
            }
            else if (total_earnings_formula <= 15749.99) {
                document.getElementById('sss_contribution').value = sss28;
            }
            else if (total_earnings_formula <= 16249.99) {
                document.getElementById('sss_contribution').value = sss29;
            }
            
         
    
    
            else if (total_earnings_formula <= 16749.99) {
                document.getElementById('sss_contribution').value = sss30;
            }
            else if (total_earnings_formula <= 17249.99) {
                document.getElementById('sss_contribution').value = sss31;
            }
            else if (total_earnings_formula <= 17749.99) {
                document.getElementById('sss_contribution').value = sss32;
            }
            else if (total_earnings_formula <= 18249.99) {
                document.getElementById('sss_contribution').value = sss33;
            }
            else if (total_earnings_formula <= 18749.99) {
                document.getElementById('sss_contribution').value = sss34;
            }
            else if (total_earnings_formula <= 19249.99) {
                document.getElementById('sss_contribution').value = sss35;
            }
            else if (total_earnings_formula <= 19749.99) {
                document.getElementById('sss_contribution').value = sss36;
            }
            else if(total_earnings_formula >= 19750){
                document.getElementById('sss_contribution').value = sss37;
            }
    
    
    
            //DEDUCTIONS
           
            var philhealth_contribution = Number($('#philhealth_contribution').val());
            var pagibig_contribution = Number($('#pagibig_contribution').val());
            var sss_loan = Number($('#sss_loan').val());
            var pagibig_loan = Number($('#pagibig_loan').val());
            var tax_withheld = Number($('#tax_withheld').val());
            var cash_advance = Number($('#cash_advance').val());
            var retirement_contributon = Number($('#retirement_contributon').val());
            var christmas_loan = Number($('#christmas_loan').val());
            var retirement_loan = Number($('#retirement_loan').val());
            var others_adjustment = Number($('#others_adjustment').val());
            var others_payable_realty = Number($('#others_payable_realty').val());
    
            var additional = Number($('#additional').val());
            var total = Number($('#total').val());
    
            var sss_month_loan = Number($('#sss_month_loan').val());
            var sss_total_loan = Number($('#sss_total_loan').val());
    
            var pagibig_month_loan = Number($('#pagibig_month_loan').val());
            var pagibig_total_loan = Number($('#pagibig_total_loan').val());
    
    
            formula_pagibig = pagibig_loan * pagibig_month_loan;
            document.getElementById('pagibig_total_loan').value = formula_pagibig;
    
            formula_sss = sss_loan * sss_month_loan;
            document.getElementById('sss_total_loan').value = formula_sss;
    
            formula_pagibig = pagibig_contribution + additional;
            document.getElementById('total').value = formula_pagibig;
    
            pabibig_loan_hundred = 100;
    
            p_total_non_taxable_formula = sss_contribution + philhealth_contribution + pabibig_loan_hundred;
            document.getElementById('p_total_non_taxable').value = p_total_non_taxable_formula;
    
            p_taxable_income_formula = total_earnings_formula - p_total_non_taxable_formula;
            document.getElementById('p_taxable_income').value = p_taxable_income_formula;
            
    
            if(p_taxable_income_formula < 20332.99){
                document.getElementById('tax_withheld').value = 0;
            }
            else if(p_taxable_income_formula <= 33332.99){
                withheldFormula = (p_taxable_income_formula - 20833) * .20;
                var Total_withheldFormula = withheldFormula;
                var wh_decimal = Total_withheldFormula.toFixed(2);
                document.getElementById('tax_withheld').value = wh_decimal;
            }
            else if(p_taxable_income_formula <= 66666.99){
                withheldFormula = ((p_taxable_income_formula - 33333) * .25) + 2500;
                var Total_withheldFormula = withheldFormula;
                var wh_decimal = Total_withheldFormula.toFixed(2);
                document.getElementById('tax_withheld').value = wh_decimal;
            }
            else if(p_taxable_income_formula <= 166666.99){
                withheldFormula =  ((p_taxable_income_formula - 66667) * .30) + 10833.33;
                var Total_withheldFormula = withheldFormula;
                var wh_decimal = Total_withheldFormula.toFixed(2);
                document.getElementById('tax_withheld').value = wh_decimal;
            }
            else if(p_taxable_income_formula <= 666666.99){
                withheldFormula =  ((p_taxable_income_formula - 166667) * .32) + 40833.33;
                var Total_withheldFormula = withheldFormula;
                var wh_decimal = Total_withheldFormula.toFixed(2);
                document.getElementById('tax_withheld').value = wh_decimal;
            }
            else if(p_taxable_income_formula >= 666667){
                withheldFormula = ((p_taxable_income_formula - 666667) * .35) + 200833.33;
                var Total_withheldFormula = withheldFormula;
                var wh_decimal = Total_withheldFormula.toFixed(2);
                document.getElementById('tax_withheld').value = wh_decimal;
            }
            
    
            //Total Deductions
            total_deductions_formula = sss_contribution + philhealth_contribution +
                pagibig_contribution +  tax_withheld + cash_advance +
                retirement_contributon + christmas_loan + retirement_loan + others_adjustment + others_payable_realty + sss_loan + pagibig_loan;
            var total_deductions_decimal = total_deductions_formula.toFixed(2);
            document.getElementById('total_deductions').value = total_deductions_decimal; 
    
            var total_earnings = Number($('#total_earnings').val());
            var total_deductions = Number($('#total_deductions').val());
    
            var first_half_pay = Number($('#first_half_pay').val());
            var second_half_pay = Number($('#second_half_pay').val());
    
            First_Half_Formula = (total_earnings - total_deductions) / 2;
            var First_Half_Decimal = First_Half_Formula.toFixed(2);
            document.getElementById('first_half_pay').value = First_Half_Decimal;
    
            Second_Half_Formula = (total_earnings - total_deductions) / 2;
            var Second_Half_Decimal = Second_Half_Formula.toFixed(2);
            document.getElementById('second_half_pay').value = Second_Half_Decimal;
    
            var monthly_pay = Number($('#monthly_pay').val());
    
            monthly_pay_formula = first_half_pay + second_half_pay;
            var monthly_pay_decimal = monthly_pay_formula.toFixed(2);
            document.getElementById('monthly_pay').value = monthly_pay_decimal;
    
    
            if (basic_pay >= 40000) {
                document.getElementById('philhealth_contribution').value = 550;
            } else if (basic_pay <= 10000) {
                document.getElementById('philhealth_contribution').value = 137.50;
            } else if (10000.01 >= basic_pay <= 39999.99) {
                document.getElementById('philhealth_contribution').value = (basic_pay * 0.0275) / 2;
            }
    
            
    
        });
    
    </script>


@endsection