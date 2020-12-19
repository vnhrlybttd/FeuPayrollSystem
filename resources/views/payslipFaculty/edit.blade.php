@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payslip</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-money-check-alt"></i> Faculty Payslip</li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-money-check-alt"></i> Edit Payslip</li>
    </ol>
</nav>
<hr>
<div class="container-fluid">

        {!! Form::model($finds, ['method' => 'PATCH','route' => ['payslipFaculty.update', $finds->payslip]]) !!}
        @csrf
     


        <div class="row justify-content-between">
            <div class="m-0"><a class="btn btn-primary" href="{{ route('payslipFaculty.index') }}"><i
                        class="fas fa-arrow-circle-left"></i> Back</a> </div>
            <div class="m-0"><button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save</button>
            </div>
        </div>

</div>
<hr>
<div class="container-fluid">
    <div class="border border-info">
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-money-check-alt text-info"></i> Payslip
        </h3>
        <hr>

        <div class="row">
        
            <div class="col">
                <div class="form-group ml-3">
                    <strong>Employee ID</strong>
                    <small class="form-control">{{$finds->employee_id}}</small>
                </div>
            </div>
       
            <div class="col">
                <div class="form-group mr-3">
                    <strong>Pay Period</strong>
                    <small class="form-control">{{$finds->date}}</small>
                </div>
            </div>
        
        </div>

        <div class="row">
                <div class="col">
                        <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                                <strong>First Pay:</strong>
                                                {!! Form::select('first_status_pay',['1' => 'Paid','0'=>'Not Paid'],null, array('class' =>
                                                'form-control'));
                                                !!}
                                            </div>
                                    </div>
                        </div>
                </div>
                <div class="col">
                        <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                                <strong>Second Pay:</strong>
                                                {!! Form::select('second_status_pay',['1' => 'Paid','0'=>'Not Paid'],null, array('class' =>
                                                'form-control'));
                                                !!}
                                            </div>
                                    </div>
                        </div>
                </div>

                <div class="form-group mr-3">
                        <input class="form-control" value="{{$finds->p_thirteen_month_pay}}" id="thirteen_month_pay" name="p_thirteen_month_pay" hidden>
                    </div>
            </div>



    </div>

    <div class="border border-primary mt-2">
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-coins text-primary"></i> Monthly Pay
        </h3>
        <hr>

        <div class="form-group pl-5 pr-5">
            <input type="text" class="form-control bg-primary text-center text-white" name="p_monthly_pay"
                value="{{$finds->p_monthly_pay}} " id="monthly_pay" readonly step="any">
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
                        <input type="text" class="form-control bg-success text-white" name="p_total_earnings"
                            value="{{$finds->p_total_earnings}} " id="total_earnings" readonly step="any">
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
                        <input type="text" class="form-control bg-danger text-white" name="p_total_deductions"
                            value="{{$finds->p_total_deductions}}" id="total_deductions" readonly step="any">
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="border border-primary">
                <h3 class="pt-2 text-secondary text-center">
                    <i class="fas fa-money-bill-wave text-primary"></i> Monthly Pay
                </h3>
                <hr>

                <div class="row">
                    <div class="col">
                        <div class="form-group ml-2">
                            <strong for="exampleInputEmail1">1st Half Pay</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-primary bg-white"><i
                                        class="fas fa-ruble-sign text-primary"></i></span>
                                <input type="text" class="form-control bg-primary text-white" name="p_first_half_pay"
                                    value="{{$finds->p_first_half_pay}}" id="first_half_pay" readonly step="any">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mr-2">
                            <strong for="exampleInputEmail1">2nd Half Pay</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-primary bg-white"><i
                                        class="fas fa-ruble-sign text-primary"></i></span>
                                <input type="text" class="form-control bg-primary text-white" name="p_second_half_pay"
                                    value="{{$finds->p_second_half_pay}}" id="second_half_pay" readonly step="any">
                            </div>
                        </div>
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
                
                @foreach ($editPayslip as $values)
               
                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Basic Pay</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control form-control-sm bg-success text-white" name="p_basic_pay"
                            value="{{$values->total_basic_salary}}" id="basic_pay" readonly step="any">
                    </div>
                </div>
              
                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Absences/Lates</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control form-control-sm bg-success text-white" name="p_absences"
                            value="{{$values->total_absence}}" id="absences" onblur="calculate()" readonly step="any">
                    </div>
                </div>

                @endforeach
           

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Adjustment</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_adjustment"
                            value="{{$finds->p_adjustment}}" id="adjustment" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Net Basic</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control form-control-sm bg-success text-white" name="p_net_basic"
                            value="{{$finds->p_net_basic}}" id="net_basic" readonly step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Cost of Living Allowance</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_cost_of_living_allowance"
                            value="{{$finds->p_cost_of_living_allowance}}" id="cost_of_living_allowance" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Honorarium</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_honorarium"
                            value="{{$finds->p_honorarium}}" id="honorarium" onblur="calculate()" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Overtime</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_overtime"
                            value="{{$finds->p_overtime}}" id="overtime" onblur="calculate()" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Over Load</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_over_load"
                            value="{{$finds->p_over_load}}" id="over_load" onblur="calculate()" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Others</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control" name="p_others" value="{{$finds->p_others}}"
                            id="others" onblur="calculate()" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Hold Salary Pay Out</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-success bg-white"><i
                                class="fas fa-ruble-sign text-success"></i></span>
                        <input type="number" class="form-control" name="p_hold_salary_pay_out"
                            value="{{$finds->p_hold_salary_pay_out}}" id="hold_salary_pay_out" onblur="calculate()" step="any">
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

                        <input type="number" class="form-control form-control-sm bg-danger text-white" name="p_sss_contribution"
                            value="{{$finds->p_sss_contribution}}" id="sss_contribution" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Philhealth Contribution</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm bg-danger text-white" name="p_philhealth_contribution"
                            value="{{$finds->p_philhealth_contribution}}" id="philhealth_contribution" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Pag-ibig Contribution</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm bg-danger text-white" name="p_pagibig_contribution"
                            value="{{$finds->p_pagibig_contribution}}" id="pagibig_contribution" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">SSS Loan Contribution</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm" name="sss_loan"
                            value="{{$finds->p_sss_loan}}" id="sss_loan" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Pag-Ibig Loan</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_pagibig_loan"
                            value="{{$finds->p_pagibig_loan}}" id="pagibig_loan" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Tax Withheld</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm bg-danger text-white" name="p_tax_withheld"
                            value="{{$finds->p_tax_withheld}}" id="tax_withheld" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Cash Advance</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_cash_advance"
                            value="{{$finds->p_cash_advance}}" id="cash_advance" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Retirement Contribution</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_retirement_contributon"
                            value="{{$finds->p_retirement_contributon}}" id="retirement_contributon" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Christmas Loan</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_christmas_loan"
                            value="{{$finds->p_christmas_loan}}" id="christmas_loan" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Retirement Loand</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_retirement_loan"
                            value="{{$finds->p_retirement_loan}}" id="retirement_loan" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Other Adjustment</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_others_adjustment"
                            value="{{$finds->p_others_adjustment}}" id="others_adjustment" step="any">
                    </div>
                </div>

                <div class="form-group pl-5 pr-5">
                    <strong for="exampleInputEmail1">Others (Payable to FERN Realty)</strong>
                    <div class="input-group-prepend">
                        <span class="input-group-text border border-danger bg-white"><i
                                class="fas fa-ruble-sign text-danger"></i></span>
                        <input type="number" class="form-control form-control-sm" name="p_others_payable_realty"
                            value="{{$finds->p_others_payable_realty}}" id="others_payable_realty" step="any">
                    </div>
                </div>
            </div>
        </div>

    </div>


    
    @foreach ($sss_table as $sss)
    <input class="form-control" step="any" id="{{$sss->sss_id}}s" value="{{$sss->ss_ee}}" hidden>    
    @endforeach

    {!! Form::close() !!}





</div>



<!--COMPUTATIONS FOR EARNINGS-->

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
    
            //$('#net_basic').html(basic_pay - absences); // add them and output it
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
    
     
    
            if(total_earnings_formula < 20332.99){
                document.getElementById('tax_withheld').value = 0;
            }
            else if(total_earnings_formula <= 33332.99){
                withheldFormula = total_earnings_formula * 0.20;
                var Total_withheldFormula = withheldFormula;
                document.getElementById('tax_withheld').value = Total_withheldFormula;
            }
            else if(total_earnings_formula <= 66666.99){
                withheldFormula = total_earnings_formula * 0.25;
                var Total_withheldFormula = withheldFormula;
                document.getElementById('tax_withheld').value = Total_withheldFormula;
            }
            else if(total_earnings_formula <= 166666.99){
                withheldFormula = total_earnings_formula * 0.30;
                var Total_withheldFormula = withheldFormula;
                document.getElementById('tax_withheld').value = Total_withheldFormula;
            }
            else if(total_earnings_formula <= 666666.99){
                withheldFormula = total_earnings_formula * 0.32;
                var Total_withheldFormula = withheldFormula;
                document.getElementById('tax_withheld').value = Total_withheldFormula;
            }
            else if(total_earnings_formula >= 666667){
                withheldFormula = total_earnings_formula * 0.35;
                var Total_withheldFormula = withheldFormula;
                document.getElementById('tax_withheld').value = Total_withheldFormula;
            }
            
    
            //Total Deductions
            total_deductions_formula = sss_contribution + philhealth_contribution +
                pagibig_contribution + sss_loan + pagibig_loan + tax_withheld + cash_advance +
                retirement_contributon +
                christmas_loan + retirement_loan + others_adjustment + others_payable_realty;
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
