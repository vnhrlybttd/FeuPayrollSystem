@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payrolls</h2>
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
                        <table class="table table-hover table-bordered text-center" id="myTable" class="display">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Month/Year</th>
                                    <th>Pay Period</th>
                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $view)
                                <tr>
                                    <td>{{date('M. Y',strtotime($view->dates))}}</td>
                                    <td>{{date('M. d,Y',strtotime($view->paydate))}}</td>
                                    <td>
                                        <a class="btn btn-primary text-white"
                                            href="{{ route('PayrollApproval.show',$view->dates)}}"><i class="fas fa-file"></i>
                                            Details</a>
        
                                    </td>
                                    <td>
                                            <div class="dropdown">
                                                    <button class="btn btn-success dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Payroll Status
                                                    </button>
                                            
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{action('AdminApprovalsController@pendingPayroll',$view->id)}}">Pending</a>
                                                        <a class="dropdown-item"
                                                            href="{{action('AdminApprovalsController@approvedPayroll',$view->id)}}">Approved</a>
                                                        <a class="dropdown-item"
                                                            href="{{action('AdminApprovalsController@rejectedPayroll',$view->id)}}">Rejected</a>
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
                            <thead class="thead-dark">
                                <tr>
                                    <th>Month/Year</th>
                                    <th>Pay Period</th>
                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tableOne as $view)
                                <tr>
                                    <td>{{date('M. Y',strtotime($view->dates))}}</td>
                                    <td>{{date('M. d,Y',strtotime($view->paydate))}}</td>
                                    <td>
                                        <a class="btn btn-primary text-white"
                                            href="{{ route('PayrollApproval.show',$view->dates)}}"><i class="fas fa-file"></i>
                                            Details</a>
        
                                    </td>
                       
                                        <td>
                                                <div class="dropdown">
                                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Payroll Status
                                                        </button>
                                                
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{action('AdminApprovalsController@pendingPayroll',$view->id)}}">Pending</a>
                                                            <a class="dropdown-item"
                                                                href="{{action('AdminApprovalsController@approvedPayroll',$view->id)}}">Approved</a>
                                                            <a class="dropdown-item"
                                                                href="{{action('AdminApprovalsController@rejectedPayroll',$view->id)}}">Rejected</a>
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
                            <thead class="thead-dark">
                                <tr>
                                    <th>Month/Year</th>
                                    <th>Pay Period</th>
                                    <th class="bg-primary"></th>
                                    <th class="bg-success"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tableTwo as $view)
                                <tr>
                                    <td>{{date('M. Y',strtotime($view->dates))}}</td>
                                    <td>{{date('M. d,Y',strtotime($view->paydate))}}</td>
                                    <td>
                                        <a class="btn btn-primary text-white"
                                            href="{{ route('PayrollApproval.show',$view->dates)}}"><i class="fas fa-file"></i>
                                            Details</a>
        
                                    </td>
                                    <td>
                                            <div class="dropdown">
                                                    <button class="btn btn-success dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Payroll Status
                                                    </button>
                                            
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{action('AdminApprovalsController@pendingPayroll',$view->id)}}">Pending</a>
                                                        <a class="dropdown-item"
                                                            href="{{action('AdminApprovalsController@approvedPayroll',$view->id)}}">Approved</a>
                                                        <a class="dropdown-item"
                                                            href="{{action('AdminApprovalsController@rejectedPayroll',$view->id)}}">Rejected</a>
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