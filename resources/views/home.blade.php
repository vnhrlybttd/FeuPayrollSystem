@extends('layouts.sidemenu')

@section('content')
<div class="d-flex justify-content-between">
    <div class="d-flex">
        <h2 style="color:#008349;" class="pt-5"> Dashboard</h2>
    </div>


</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
<hr>


<section>
    <div class="container-fluid">
        <div class="row bd-highlight">

            @can('Dashboard_Total_Employees')
            <!-- EMPLOYEES -->
            <div class="col border border-primary rounded shadow" style="margin-right:10px;">
                <h5 class="text-left p-2">Total Employees</h5>
                <div class="row">
                    <div class="col"><i class="fas fa-user text-primary" style="font-size:50px;"></i></div>
                    <div class="col text-right">
                        <h5 style="font-size:40px;">{{$employee}}</h5>
                    </div>
                </div>
            </div>
            <!--END OF EMPLOYEES -->
            @endcan

            @can('Dashboard_Total_Department')
            <!-- DEPARTMENT -->
            <div class="col border border-success rounded shadow" style="margin-right:10px;">
                <h5 class="text-left p-2">Total Department</h5>
                <div class="row">
                    <div class="col"><i class="fas fa-building text-success" style="font-size:50px;"></i></div>
                    <div class="col text-right">
                        <h5 style="font-size:40px;">{{$count}}</h5>
                    </div>
                </div>
            </div>
            <!-- END OF DEPARMENT -->
            @endcan





            @can('Dashboard_Checkin')
            @if(($time) && !empty($time))
            <div class="col-12 mb-2 col-md-12 col-lg-12 border border-success rounded shadow bg-white">
                <h5 class="text-left p-2">Punch Time</h5>
                <div class="row">
                    <div class="col"><i class="fas fa-user-clock text-success" style="font-size:50px;"></i></div>
                    <div class="col text-right">
                        <h5 style="font-size:40px;"><small>{{$time->punch_time}}</small></h5>
                    </div>

                </div>
            </div>
            @endif
            @endcan





        </div>
        <!-- END OF ROW -->

        @can('Admin')
        <div class="row mt-3">

            <div class="col border border-dark rounded shadow" style="margin-right:10px;">
                <h5 class="text-left p-2">Pending Monthly Pay</h5>
                <div class="row">
                    <div class="col"><i class="fas fa-receipt" style="font-size:50px;"></i></div>
                    <div class="col text-right">
                        <h5 style="font-size:40px;">{{$payslipAdmin}}</h5>
                    </div>
                </div>
            </div>


            <div class="col border border-dark rounded shadow" style="margin-right:10px;">
                <h5 class="text-left p-2">Pending Reports</h5>
                <div class="row">
                    <div class="col"><i class="fas fa-file-alt" style="font-size:50px;"></i></div>
                    <div class="col text-right">
                        <h5 style="font-size:40px;">{{$reportAdmin}}</h5>
                    </div>
                </div>
            </div>


            <div class="col border border-dark rounded shadow" style="margin-right:10px;">
                <h5 class="text-left p-2">Pending Payrolls</h5>
                <div class="row">
                    <div class="col"><i class="fas fa-coins " style="font-size:50px;"></i></div>
                    <div class="col text-right">
                        <h5 style="font-size:40px;">{{$payrollAdmin}}</h5>
                    </div>
                </div>
            </div>

        </div>
        @endcan





        @can('Dashboard_Payslip')
        <div class="row mb-2">

            <div class="col-12 mb-2 col-md-12 col-lg-6 border border-primary rounded shadow bg-white">
                <h5 class="text-left p-2">Payslips</h5>
                <div class="row">
                    <div class="col"><i class="fas fa-user-clock text-primary" style="font-size:50px;"></i></div>
                    <div class="col text-right">
                        <h5 style="font-size:40px;">{{$payslipCount}}</h5>
                    </div>
                    <a type="button" class="btn btn-primary btn-sm btn-block text-white" href="{{('/mypayslip')}}">More
                        Info <i class="fas fa-info-circle"></i></a>
                </div>
            </div>
            <!--
                <div class="col-12 mb-2 col-md-12 col-lg-6 border border-danger rounded shadow bg-white">
                        <h5 class="text-left p-2">Ticket Reports</h5>
                    <div class="row">
                        <div class="col"><i class="fas fa-ticket-alt text-danger" style="font-size:50px;"></i></div>
                    <div class="col text-right"><h5 style="font-size:40px;"></h5></div>
                    <a type="button" class="btn btn-danger btn-sm btn-block text-white" href="{{('/tickets')}}">More Info <i class="fas fa-info-circle"></i></a>
                    </div>          
                </div>
            -->
        </div>
        @endcan

    </div>
    </div>
</section>




@endsection
