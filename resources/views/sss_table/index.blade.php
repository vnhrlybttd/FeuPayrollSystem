@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Social Security System</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-table"></i> Social Security System Table
        </li>
    </ol>
</nav>




<div class="container-fluid mb-5">
    <div class="border border-secondary">
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-table text-success"></i> Social Security System Table
        </h3>

        <hr>

        <div class="container-fluid">
            <div class="row">
                    <div class="ml-3">
                        <a class="btn btn-primary" href="{{ route('payslip.index') }}"><i
                        class="fas fa-arrow-circle-left"></i> Non Faculty Payslip</a> 
                    </div>
                    <div class="ml-1">
                            <a class="btn btn-primary" href="{{ route('payslipFaculty.index') }}"><i
                            class="fas fa-arrow-circle-left"></i> Faculty Payslip</a> 
                        </div>
            </div>

                        
        </div>

        <hr>

        <div class="container-fluid">
            <div class="table-responsive mb-3">
                <table class="table table-hover table-bordered text-center" id="sss_table" class="display nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th colspan="2">Range of Compensation
                                </th>
                            <th colspan="4">SS Contribution</th>
                            <th>EC Contribution</th>
                            <th colspan="3">Total Contribution</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th></th>
                            <th>Monthly Salary Credit</th>
                            <th>SS ER</th>
                            <th>SS EE</th>
                            <th>SSS Total</th>
                            <th>EC ER</th>
                            <th>TC ER</th>
                            <th>TCEE</th>
                            <th>TC Total</th>

                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($sssTable as $sssView)
                        <tr>
                            <td>{{$sssView->sss_id}}</td>
                            <td>{{$sssView->low_compensation}}</td>
                            <td>{{$sssView->high_compensation}}</td>
                            <td>{{$sssView->monthly_salary_detail}}</td>
                            <td>{{$sssView->ss_er}}</td>
                            <td>{{$sssView->ss_ee}}</td>
                            <td>{{$sssView->sss_total}}</td>
                            <td>{{$sssView->ec_er}}</td>
                            <td>{{$sssView->tc_er}}</td>
                            <td>{{$sssView->tc_ee}}</td>
                            <td>{{$sssView->tc_total}}</td>
                        </tr>
                        @endforeach
              
                    </tbody>
                </table>
            </div>
        </div>

        <hr>

    </div>
</div>



@endsection
