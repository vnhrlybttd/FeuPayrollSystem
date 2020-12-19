@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Payroll</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Generate Payroll</li>
    </ol>
</nav>
<hr>

<a class="btn btn-primary" href="{{route('NonFacultyPayroll.create')}}"><i class="fas fa-address-card"></i>
    Create Payroll
</a>
<hr>
<div class="container-fluid bg-white shadow">


    <h3 class="pt-2 text-secondary text-center">
        <i class="fas fa-scroll text-primary"></i> Payroll
    </h3>
    <hr>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="Pending-tab" data-toggle="tab" href="#Pending" role="tab"
                aria-controls="Pending" aria-selected="true">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Approved-tab" data-toggle="tab" href="#Approved" role="tab" aria-controls="Approved"
                aria-selected="false">Approved</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Rejected-tab" data-toggle="tab" href="#Rejected" role="tab" aria-controls="Rejected"
                aria-selected="false">Rejected</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Pending" role="tabpanel" aria-labelledby="Pending-tab">

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" id="myTable" class="display">
                    <thead class="thead-dark">
                        <tr>
                            <th>Month/Year</th>
                            <th>Pay Period</th>
                            <th class="bg-primary"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table as $view)
                        <tr>
                            <td>{{date('M. Y',strtotime($view->dates))}}</td>
                            <td>{{date('M. d,Y',strtotime($view->paydate))}}</td>
                            <td><a class="btn btn-primary" href="{{ route('NonFacultyPayroll.edit',[Crypt::encrypt($view->id)])}}"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <a class="btn btn-primary text-white"
                                    href="{{ route('NonFacultyPayroll.show',[Crypt::encrypt($view->dates)])}}"><i class="fas fa-file"></i>
                                    Details</a>

                            </td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="tab-pane fade" id="Approved" role="tabpanel" aria-labelledby="Approved-tab">

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" id="FONE" class="display">
                    <thead class="thead-dark">
                        <tr>
                            <th>Month/Year</th>
                            <th>Pay Period</th>
                            <th class="bg-primary"></th>
                            <th><i class="fas fa-print"></i> PRINT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tableOne as $view)
                        <tr>
                            <td>{{date('M. Y',strtotime($view->dates))}}</td>
                            <td>{{date('M. d,Y',strtotime($view->paydate))}}</td>
                            <td><a class="btn btn-primary" href="{{ route('NonFacultyPayroll.edit',[Crypt::encrypt($view->id)])}}"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <a class="btn btn-primary text-white"
                                    href="{{ route('NonFacultyPayroll.show',[Crypt::encrypt($view->dates)])}}"><i class="fas fa-file"></i>
                                    Details</a>

                            </td>
                            <td><a class="btn btn-success mr-1" href={{route('nfGeneratePayslip.generate',[Crypt::encrypt($view->dates)])}}> <i class="fas fa-print"></i> 
                                Payslips</a></td>
                            <!--
                            <td>
                                <a class="btn btn-success text-white"
                                    href="{{ action('nfPDFController@pdf',$view->dates)}}"><i
                                        class="fas fa-file-pdf"></i> Payroll</a>
                                <a class="btn btn-success text-white"
                                    href="{{ action('nfGenerateWTaxController@print',$view->dates)}}"><i
                                        class="fas fa-file-pdf"></i> Withholding Tax</a>
                                <a class="btn btn-success text-white"
                                    href="{{ action('nfGeneratePayrollEntryController@print',$view->dates)}}"><i
                                        class="fas fa-file-pdf"></i> Payroll Entry</a>
                            </td>
                        -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="tab-pane fade" id="Rejected" role="tabpanel" aria-labelledby="Rejected-tab">


            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" id="FTWO" class="display">
                    <thead class="thead-dark">
                        <tr>
                            <th>Month/Year</th>
                            <th>Pay Period</th>
                            <th class="bg-primary"></th>
                 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tableTwo as $view)
                        <tr>
                            <td>{{date('M. Y',strtotime($view->dates))}}</td>
                            <td>{{date('M. d,Y',strtotime($view->paydate))}}</td>
                            <td><a class="btn btn-primary" href="{{ route('NonFacultyPayroll.edit',[Crypt::encrypt($view->id)])}}"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <a class="btn btn-primary text-white"
                                    href="{{ route('NonFacultyPayroll.show',[Crypt::encrypt($view->dates)])}}"><i class="fas fa-file"></i>
                                    Details</a>

                            </td>
                         
                         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>




</div>


@endsection
