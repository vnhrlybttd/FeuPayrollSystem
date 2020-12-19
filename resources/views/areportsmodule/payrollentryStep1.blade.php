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
</head>

<body>




    <div class="row justify-content-between ml-1 mr-1">
        <!-- Button trigger modal -->
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
            Back</a>

        <form method="POST" action="{{action('ReportsController@PayrollEntryStep2')}}">
            @csrf
            <button class="btn btn-success" type="submit">Submit</button>
            </form>
      
    </div>

    <hr>


    <div class="label">
        <h5 class="text-danger">STEP 2</h5>
    </div>

    <div class="container-fluid shadow bg-white p-5 mb-5">

        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-calendar-alt text-primary"></i> Payroll Entry for {{date('M. Y',strtotime($dates))}}
        </h3>
        <hr>

    <table class="table table-bordered table-sm text-center">
        <thead>
            <tr>
                <th colspan="4">
                    <center class="text-success">PAYROLL ENTRY</center>
                </th>
            </tr>
            <tr>
                <th class="b">Type</th>
                <th class="b">Dr</th>
                <th class="b">Cr</th>
                <th class="b">Cost Center</th>

            </tr>

        </thead>
        <tbody>
            @foreach ($BasicFT as $bft)
            <tr>
                <td><small>Basic Full Time</small></td>
            <td><small>{{$bft->sum}}</small></td>
                <td><small></small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>

            
            @endforeach

            @foreach ($BasicPT as $bfts)
            <tr>
                <td><small>Basic Part Time</small></td>
            <td><small>{{$bfts->sum}}</small></td>
                <td><small></small></td>
                <td><small>{{$bfts->cost_center}}</small></td>
            </tr>

            
            @endforeach


            @foreach ($otherParts as $bft)
            <tr>
                <td><small>Cost of Living Allowance</small></td>
            <td><small>{{$bft->p_cost_of_living_allowance}}</small></td>
                <td><small></small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
      
            <tr>
                <td><small>Honorarium</small></td>
            <td><small>{{$bft->p_honorarium}}</small></td>
                <td><small></small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
           
            <tr>
                <td><small>Overtime</small></td>
            <td><small>{{$bft->p_overtime}}</small></td>
                <td><small></small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
          
            <tr>
                <td><small>Emolument</small></td>
            <td><small>{{$bft->a_emolument}}</small></td>
                <td><small></small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
       
            <tr>
                <td><small>Salaries Payable</small></td>
            <td><small>{{$bft->p_hold_salary_pay_out}}</small></td>
                <td><small></small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
       
            <tr>
                <td><small>Payable to FERN Realty</small></td>
                <td><small></small></td>
                <td><small>{{$bft->p_others_payable_realty}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
          
            <tr>
                <td><small>SSS Premium</small></td>
                <td><small></small></td>
                <td><small>{{$bft->p_sss_contribution}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
        
            <tr>
                <td><small>Philhealth Premium</small></td>
                <td><small></small></td>
                <td><small>{{$bft->p_philhealth_contribution}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
     
            <tr>
                <td><small>Pag-IBIG Premium</small></td>
                <td><small></small></td>            
                <td><small>{{$bft->p_pagibig_contribution}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
        
            <tr>
                <td><small>Retirement Contribution</small></td>
                <td><small></small></td>
                <td><small>{{$bft->p_retirement_contributon}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
      
            <tr>
                <td><small>Retirement Loan</small></td>
                <td><small></small></td>
                <td><small>{{$bft->p_retirement_loan}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
         
            <tr>
                <td><small>SSS Loan</small></td>
                <td><small></small></td>
                <td><small>{{$bft->p_sss_loan}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
    
            <tr>
                <td><small>Pag-IBIG Loan</small></td>
                <td><small></small></td>
            <td><small>{{$bft->p_pagibig_loan}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
     
            <tr>
                <td><small>Wittholding Tax</small></td>
                <td><small></small></td>
            <td><small>{{$bft->p_tax_withheld}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
 
            <tr>
                <td><small>Cash Advance</small></td>
                <td><small></small></td>
            <td><small>{{$bft->p_cash_advance}}</small></td>
                <td><small>{{$bft->cost_center}}</small></td>
            </tr>
    
        </tbody>
    

            @endforeach
            
            <tfoot>
            
                    <tr>
                        <th class="bg-success text-white">TOTAL</th>
                        <th>
                                @foreach ($topfooter as $bft)
                                {{$bft->grand_total}}
                                   @endforeach
                        </th>
                        <th>
                        @foreach ($footer as $bft)
                     {{$bft->grand_total}}
                        @endforeach
                    </th>
                    <th class="bg-success text-white"></th>
                    </tr>
              
                </tfoot>
           

       
    </table>
    

    </div>
</body>

@endsection
