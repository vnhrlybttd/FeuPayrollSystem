@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Non Faculty</li>
    </ol>
</nav>
<hr>


<a class="btn btn-primary" href="{{('/NonFacultySD/Create')}}"><i class="fas fa-address-card"></i>
    Add Employee
</a>
<hr>

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center" id="myTable" class="display">
            <thead class="thead-dark">
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Month/Year</th>
                    <th class="bg-primary"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($table as $tableView)
                    <tr>
                    <td>{{$tableView->emp_id}}</td>
                    <td>{{$tableView->first_name}} {{$tableView->last_name}}</td>
                    <td>{{date('M. Y',strtotime($tableView->date))}}</td>
                    <td>

                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                            data-target="#b{{$tableView->anfsd_id}}" aria-expanded="false" aria-controls="collapseExample">
                            Basic Salary
                        </button>

                       

                 

                        <div class="collapse" id="b{{$tableView->anfsd_id}}">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col">
                                                <b class="h5">BASIC SALARY DETAILS</b>
                                                <hr class="bg-primary">
                                                <div class="h5 text-left"><b>Salary:</b> <u>{{$tableView->salary}}</u></div>
                                                <div class="h5 text-left"><b>Daily Rate:</b> <u>{{$tableView->daily_rate}}</u></div>
                                                <div class="h5 text-left"><b>Rate Per Hour:</b> <u>{{$tableView->rate_per_hour}}</u></div>
                                                <div class="h5 text-left"><b>Mins:</b> <u>{{$tableView->mins}}</u></div>
                                                <div class="h5 text-left"><b>Basic:</b> <u>{{$tableView->basic}}</u></div>
                                                <div class="h5 text-left"><b>Emolument:</b> <u>{{$tableView->emolument}}</u></div>
                                                <div class="h5 text-left"><b>Total Basic Salary:</b> <u>{{$tableView->total_basic_salary}}</u></div>
                                                <div class="h5 text-left"><b>Total Absences/Lates:</b> <u>{{$tableView->p_absences}}</u></div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                      

                      

                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
