@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payslip</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-file"></i> Faculty Payslip
        </li>
    </ol>
</nav>
<hr>

<div class="row mb-1">
        <a href="{{('/payslipFaculty')}}"><button class="btn btn-primary ml-3"><i class="fas fa-arrow-circle-left"></i>
           Go Back </button></a>
</div>

@foreach ($finds as $findView)
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col border border-info">
            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-users text-info"></i> Information
            </h3>
            <hr>
            <div class="row text-center">
                <div class="col text-info">Employee ID</div>
                <div class="col">{{$findView->emp_id}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-info">Name</div>
                <div class="col">{{$findView->emp_firstname}} {{$findView->emp_lastname}}</div>
            </div>
            <hr>

            <div class="row text-center">
                <div class="col text-info">Payslip Date Created</div>
                <div class="col">{{$findView->created_at}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-info">Payslip Date Updated</div>
                <div class="col">{{$findView->created_at}}</div>
            </div>



        </div>
        <div class="col border border-success">
            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-coins text-success"></i> Earnings
            </h3>
            <hr>

            <div class="row text-center">
                <div class="col text-success">Basic Pay</div>
                <div class="col">{{$findView->basic_pay}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-success">Absences / Lates</div>
                <div class="col">{{$findView->absences}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-success">Adjustment</div>
                <div class="col">{{$findView->adjustment}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-success">Net Basic</div>
                <div class="col">{{$findView->net_basic}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-success">Cost of Living Allowance</div>
                <div class="col">{{$findView->cost_of_living_allowance}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-success">Honorarium</div>
                <div class="col">{{$findView->honorarium}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-success">Overtime</div>
                <div class="col">{{$findView->overtime}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-success">Over Load</div>
                <div class="col">{{$findView->over_load}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-success">Others</div>
                <div class="col">{{$findView->others}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-success">Hold Salary Pay Out</div>
                <div class="col">{{$findView->hold_salary_pay_out}}</div>
            </div>

        </div>

        <div class="col border border-danger">
            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-times text-danger"></i> Deductions
            </h3>
            <hr>

            <div class="row text-center">
                <div class="col text-danger">SSS Contribution</div>
                <div class="col">{{$findView->sss_contribution}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">Philhealth Contribution</div>
                <div class="col">{{$findView->philhealth_contribution}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">Pag-Ibig Contribution</div>
                <div class="col">{{$findView->pagibig_contribution}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">SSS Loan Contribution</div>
                <div class="col">{{$findView->sss_loan}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">Pag-Ibig Loan</div>
                <div class="col">{{$findView->pagibig_loan}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">Tax Withheld</div>
                <div class="col">{{$findView->tax_withheld}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">Cash Advance</div>
                <div class="col">{{$findView->cash_advance}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">Retirement Contribution</div>
                <div class="col">{{$findView->retirement_contributon}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">Christmas Loan</div>
                <div class="col">{{$findView->christmas_loan}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">Retirement Loan</div>
                <div class="col">{{$findView->retirement_loan}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger"> Other Adjustment</div>
                <div class="col">{{$findView->others_adjustment}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-danger">Others (Payable to FERN Realty)</div>
                <div class="col">{{$findView->others_payable_realty}}</div>
            </div>


        </div>


        <div class="col border border-primary">
            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-equals text-primary"></i> Total
            </h3>
            <hr>

            <div class="row text-center">
                <div class="col text-primary">Total Earnings</div>
                <div class="col">{{$findView->total_earnings}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-primary">Total Deductions</div>
                <div class="col">{{$findView->total_deductions}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-primary">1st Half Pay</div>
                <div class="col">{{$findView->first_half_pay}}</div>
            </div>

            <div class="row text-center">
                <div class="col text-primary">2nd Half Pay</div>
                <div class="col">{{$findView->second_half_pay}}</div>
            </div>
            <hr>
            <div class="row text-center">
                <div class="col text-primary">Monthly Pay</div>
                <div class="col">{{$findView->monthly_pay}}</div>
            </div>
        </div>

    </div>

</div>
@endforeach

@endsection
