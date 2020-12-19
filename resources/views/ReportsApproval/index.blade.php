@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Reports</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-check-circle"></i> Approval</li>
    </ol>
</nav>
<hr>

<div class="container-fluid">
<div class="shadow bg-white mb-5 p-5">
       

    
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
                            <thead>
                                <tr>
                                    <th>Report Name</th>
                                    <th>Date</th>
                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending as $view)
                                <tr>
                                    <td>{{$view->report_name}}</td>
                                    <td>{{date('M. Y',strtotime($view->date))}}</td>
                                    <td>
                                        @if ($view->report_name === "Monthly Summary")
                                        <a class="btn btn-primary text-white"  href="{{ action('AdminApprovalsController@monthlyShow',$view->date)}}"><i class="fas fa-eye"></i> Show</a>
                                        @elseif($view->report_name === "Payroll Entry")
                                        <a class="btn btn-primary text-white"  href="{{ action('AdminApprovalsController@payrollentryShow',$view->date)}}"><i class="fas fa-eye"></i> Show</a>
                                        @elseif($view->report_name === "Wittholding Tax")
                                        <a class="btn btn-primary text-white"  href="{{ action('AdminApprovalsController@wittholdingtaxShow',$view->date)}}"><i class="fas fa-eye"></i> Show</a>
                                        @endif
                                    </td>
                                    <td>
                                    <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Report Status
                                            </button>
                                    
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{action('AdminApprovalsController@pendingReports',$view->approval_id)}}">Pending</a>
                                                <a class="dropdown-item"
                                                    href="{{action('AdminApprovalsController@approvedReports',$view->approval_id)}}">Approved</a>
                                                <a class="dropdown-item"
                                                    href="{{action('AdminApprovalsController@rejectedReports',$view->approval_id)}}">Rejected</a>
                                            </div>
                                        </div>
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
                            <thead>
                                <tr>
                                    <th>Report Name</th>
                                    <th>Date</th>
                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approved as $view)
                                <tr>
                                    <td>{{$view->report_name}}</td>
                                    <td>{{date('M. Y',strtotime($view->date))}}</td>
                                    <td>
                                            @if ($view->report_name === "Monthly Summary")
                                            <a class="btn btn-primary text-white"  href="{{ action('AdminApprovalsController@monthlyShow',$view->date)}}"><i class="fas fa-eye"></i> Show</a>
                                            @elseif($view->report_name === "Payroll Entry")
                                            <a class="btn btn-primary text-white"  href="{{ action('AdminApprovalsController@payrollentryShow',$view->date)}}"><i class="fas fa-eye"></i> Show</a>
                                            @elseif($view->report_name === "Wittholding Tax")
                                            <a class="btn btn-primary text-white"  href="{{ action('AdminApprovalsController@wittholdingtaxShow',$view->date)}}"><i class="fas fa-eye"></i> Show</a>
                                            @endif
                                        </td>
                                        <td>
                                                <div class="dropdown">
                                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Report Status
                                                        </button>
                                                
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{action('AdminApprovalsController@pendingReports',$view->approval_id)}}">Pending</a>
                                                            <a class="dropdown-item"
                                                                href="{{action('AdminApprovalsController@approvedReports',$view->approval_id)}}">Approved</a>
                                                            <a class="dropdown-item"
                                                                href="{{action('AdminApprovalsController@rejectedReports',$view->approval_id)}}">Rejected</a>
                                                        </div>
                                                    </div>
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
                            <thead>
                                <tr>
                                    <th>Report Name</th>
                                    <th>Date</th>
                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rejected as $view)
                                <tr>
                                    <td>{{$view->report_name}}</td>
                                    <td>{{date('M. Y',strtotime($view->date))}}</td>
                                    <td>
                                            @if ($view->report_name === "Monthly Summary")
                                            <a class="btn btn-primary text-white"  href="{{ action('AdminApprovalsController@monthlyShow',$view->date)}}"><i class="fas fa-eye"></i> Show</a>
                                            @elseif($view->report_name === "Payroll Entry")
                                            <a class="btn btn-primary text-white"  href="{{ action('AdminApprovalsController@payrollentryShow',$view->date)}}"><i class="fas fa-eye"></i> Show</a>
                                            @elseif($view->report_name === "Wittholding Tax")
                                            <a class="btn btn-primary text-white"  href="{{ action('AdminApprovalsController@wittholdingtaxShow',$view->date)}}"><i class="fas fa-eye"></i> Show</a>
                                            @endif
                                        </td>
                                        <td>
                                                <div class="dropdown">
                                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Report Status
                                                        </button>
                                                
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{action('AdminApprovalsController@pendingReports',$view->approval_id)}}">Pending</a>
                                                            <a class="dropdown-item"
                                                                href="{{action('AdminApprovalsController@approvedReports',$view->approval_id)}}">Approved</a>
                                                            <a class="dropdown-item"
                                                                href="{{action('AdminApprovalsController@rejectedReports',$view->approval_id)}}">Rejected</a>
                                                        </div>
                                                    </div>
                                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

</div>
</div>


@endsection