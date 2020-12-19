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


<div class="container-fluid bg-white shadow">


    <h3 class="pt-2 text-secondary text-center">
        <i class="fas fa-scroll text-primary"></i> Reports
    </h3>
    <hr>

    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{route('Reports.monthly')}}"><i class="fas fa-address-card"></i>
                Monthly Summary Payroll
            </a>

            <a class="btn btn-primary" href="{{route('Reports.payrollentry')}}"><i class="fas fa-address-card"></i>
                Payroll Entry
            </a>

            <a class="btn btn-primary" href="{{route('Reports.wittholdingtax')}}"><i class="fas fa-address-card"></i>
                Wittholding Tax
            </a>
            <hr>
        </div>
    </div>

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
                <table class="table table-hover table-bordered text-center" id="FTHREE" class="display">
                    <thead class="thead-dark">
                        <tr>
                            <th>Report Name</th>
                            <th>Date</th>
                            <th class="bg-primary"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending as $view)
                        <tr>
                            <td>{{$view->report_name}}</td>
                            <td>{{date('M. Y',strtotime($view->date))}}</td>
                            <td>
                                @if ($view->report_name === "Monthly Summary")
                                <a class="btn btn-primary text-white"  href="{{ action('ReportsController@monthlyShow',[Crypt::encrypt($view->date)])}}"><i class="fas fa-eye"></i> Show</a>
                                @elseif($view->report_name === "Payroll Entry")
                                <a class="btn btn-primary text-white"  href="{{ action('ReportsController@payrollentryShow',[Crypt::encrypt($view->date)])}}"><i class="fas fa-eye"></i> Show</a>
                                @elseif($view->report_name === "Wittholding Tax")
                                <a class="btn btn-primary text-white"  href="{{ action('ReportsController@wittholdingtaxShow',[Crypt::encrypt($view->date)])}}"><i class="fas fa-eye"></i> Show</a>
                                @endif
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
                            <th>Report Name</th>
                            <th>Date</th>
                            <th class="bg-primary"></th>
                            <th class="bg-success">PDF</th>
                            <th class="bg-success">EXCEL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($approved as $view)
                        <tr>
                            <td>{{$view->report_name}}</td>
                            <td>{{date('M. Y',strtotime($view->date))}}</td>
                            <td>
                                    @if ($view->report_name === "Monthly Summary")
                                    <a class="btn btn-primary text-white"  href="{{ action('ReportsController@monthlyShow',[Crypt::encrypt($view->date)])}}"><i class="fas fa-eye"></i> Show</a>
                                    @elseif($view->report_name === "Payroll Entry")
                                    <a class="btn btn-primary text-white"  href="{{ action('ReportsController@payrollentryShow',[Crypt::encrypt($view->date)])}}"><i class="fas fa-eye"></i> Show</a>
                                    @elseif($view->report_name === "Wittholding Tax")
                                    <a class="btn btn-primary text-white"  href="{{ action('ReportsController@wittholdingtaxShow',[Crypt::encrypt($view->date)])}}"><i class="fas fa-eye"></i> Show</a>
                                    @endif
                                </td>
                            <td>
                                @if ($view->report_name === "Monthly Summary")
                                <a class="btn btn-success text-white"
                                    href="{{ action('nfPDFController@pdf',[Crypt::encrypt($view->date)])}}"><i
                                        class="fas fa-file-pdf"></i> Payroll</a>
                                @elseif($view->report_name === "Payroll Entry")
                                <a class="btn btn-success text-white"
                                href="{{ action('nfGeneratePayrollEntryController@print',[Crypt::encrypt($view->date)])}}"><i
                                    class="fas fa-file-pdf"></i> Payroll Entry</a>
                                @elseif($view->report_name === "Wittholding Tax")
                                <a class="btn btn-success text-white"
                                    href="{{ action('nfGenerateWTaxController@print',[Crypt::encrypt($view->date)])}}"><i
                                        class="fas fa-file-pdf"></i> Withholding Tax</a>
                                @endif
                            </td>
                            <td>
                                @if ($view->report_name === "Monthly Summary")
                                <a class="btn btn-success text-white"
                                    href="{{ action('ExportReportsController@payroll',[Crypt::encrypt($view->date)])}}"><i
                                        class="fas fa-file-excel"></i> Payroll</a>
                                @elseif($view->report_name === "Payroll Entry")
                                <a class="btn btn-success text-white"
                                href="{{ action('ExportReportsController@pe',[Crypt::encrypt($view->date)])}}"><i
                                    class="fas fa-file-excel"></i> Payroll Entry</a>
                                @elseif($view->report_name === "Wittholding Tax")
                                <a class="btn btn-success text-white"
                                    href="{{ action('ExportReportsController@wt',[Crypt::encrypt($view->date)])}}"><i
                                        class="fas fa-file-excel"></i> Withholding Tax</a>
                                @endif
                            </td>
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
                            <th>Report Name</th>
                            <th>Date</th>
                            <th class="bg-primary"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rejected as $view)
                        <tr>
                            <td>{{$view->report_name}}</td>
                            <td>{{date('M. Y',strtotime($view->date))}}</td>
                            <td>
                                    @if ($view->report_name === "Monthly Summary")
                                    <a class="btn btn-primary text-white"  href="{{ action('ReportsController@monthlyShow',[Crypt::encrypt($view->date)])}}"><i class="fas fa-eye"></i> Show</a>
                                    @elseif($view->report_name === "Payroll Entry")
                                    <a class="btn btn-primary text-white"  href="{{ action('ReportsController@payrollentryShow',[Crypt::encrypt($view->date)])}}"><i class="fas fa-eye"></i> Show</a>
                                    @elseif($view->report_name === "Wittholding Tax")
                                    <a class="btn btn-primary text-white"  href="{{ action('ReportsController@wittholdingtaxShow',[Crypt::encrypt($view->date)])}}"><i class="fas fa-eye"></i> Show</a>
                                    @endif
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
