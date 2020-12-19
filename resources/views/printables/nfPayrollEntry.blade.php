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
            <img class="text-center" src="img/feuname.png" alt="name" height="50" />
        </center>
    </div>

    <hr>

    <small> Payroll Entry for {{date('M. Y',strtotime($id))}}</small>
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
    
</body>

</html>
