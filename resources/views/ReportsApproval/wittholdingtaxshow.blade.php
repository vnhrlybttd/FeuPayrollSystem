@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Reports</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Generate Reports</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Show</li>
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
</head>

<body>


    <div class="row justify-content-between ml-1 mr-1">
        <!-- Button trigger modal -->
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
            Back</a>

        
      
    </div>

    <hr>

 
    <div class="container-fluid shadow bg-white p-5 mb-5">

   
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-calendar-alt text-primary"></i> Wittholding Tax for {{date('M. Y',strtotime($id))}}
        </h3>
        <hr>

    <table class="table table-bordered table-sm text-center">
        <thead>
            <tr>
                    <th colspan="13">
                            <center class="text-success">EARNINGS</center>
                        </th>
                <th colspan="4">
                    <center class="text-primary"></center>
                </th>
            </tr>
            <tr>
                <th class="b">ID</th>
                <th class="b">Employee Name</th>
                <th class="b">Cost Center</th>
                <th class="b">Basic Pay</th>
                <th class="b">Absences/Lates<small class="text-danger">(mins)</small></th>
                <th class="b">Adjustment</th>
                <th class="b">Net Basic</th>
                <th class="b">Living Allowance</th>
                <th class="b">Honorarium</th>
                <th class="b">Overtime</th>
                <th class="b">Overload</th>
                <th class="b">Others</th>
                <th class="b">Total Earnings</th>
                <th class="b">Total Non Taxable Income</th>
                <th class="b">Taxable Income</th>
                <th class="b">Wittholding Tax</th>
                <th class="b">Hold Salary Pay Out</th>

            </tr>

        </thead>
        <tbody>
            @foreach ($payslip as $payslipView)
            <tr>
                <td><small>{{$payslipView->emp_pin}}</small></td>
                <td><small>{{$payslipView->emp_firstname}} {{$payslipView->emp_lastname}}</small></td>
                <td><small>{{$payslipView->cost_center}}</small></td>
                <td><small>{{$payslipView->p_basic_pay}}</small></td>
                <td><small>{{$payslipView->p_absences}}</small></td>
                <td><small>{{$payslipView->p_adjustment}}</small></td>
                <td><small>{{$payslipView->p_net_basic}}</small></td>
                <td><small>{{$payslipView->p_cost_of_living_allowance}}</small></td>
                <td><small>{{$payslipView->p_honorarium}}</small></td>
                <td><small>{{$payslipView->p_overtime}}</small></td>
                <td><small>{{$payslipView->p_over_load}}</small></td>
                <td><small>{{$payslipView->p_others}}</small></td>
                <td><small>{{$payslipView->p_total_earnings}}</small></td>
                <td><small>{{$payslipView->p_total_non_taxable}}</small></td>
                <td><small>{{$payslipView->p_taxable_income}}</small></td>
                <td><small>{{$payslipView->p_tax_withheld}}</small></td>
                <td><small>{{$payslipView->p_hold_salary_pay_out}}</small></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="bg-primary text-white"><small>TOTAL</small></td>
                <td><small>{{$p_basic_pay}}</small></td>
                <td><small>{{$p_absences}}</small></td>
                <td><small>{{$p_adjustment}}</small></td>
                <td><small>{{$p_net_basic}}</small></td>
                <td><small>{{$p_cost_of_living_allowance}}</small></td>
                <td><small>{{$p_honorarium}}</small></td>
                <td><small>{{$p_overtime}}</small></td>
                <td><small>{{$p_over_load}}</small></td>
                <td><small>{{$p_others}}</small></td>
    
                <td><small>{{$p_total_earnings}}</small></td>

            <td><small>{{$p_total_non_taxable}}</small></td>
            <td><small>{{$p_taxable_income}}</small></td>
            <td><small>{{$p_tax_withheld}}</small></td>
            <td><small>{{$p_hold_salary_pay_out}}</small></td>
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
