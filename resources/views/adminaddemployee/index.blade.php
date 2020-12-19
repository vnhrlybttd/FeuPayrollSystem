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

<!--
<a class="btn btn-primary" href="{{('/AddEmployeeNF/Step1')}}"><i class="fas fa-address-card"></i>
    Add Employee
</a>
<hr>
-->


<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center" id="myTable" class="display">
            <thead class="thead-dark">
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Government ID's</th>
                    <th>TIN</th>
                    <th>BPI Account</th>
                    <th style="width: 25%;">Summary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($table as $view)
                <tr>
                    <td>{{$view->emp_id}}</td>
                    <td>{{$view->emp_firstname}} {{$view->middle_name}}, {{$view->emp_lastname}}</td>
                    <td>
                        <div class="form-group">
                            <div class="label">SSS</div>
                            {{$view->sss_number}}
                        </div>
                        <div class="form-group">
                            <div class="label">Philhealth</div>
                            {{$view->philhealth_number}}
                        </div>
                        <div class="form-group">
                            <div class="label">Pag-IBIG</div>
                            {{$view->pagibig_number}}
                        </div>
                    </td>
                    <td>{{$view->tin_number}}</td>
                    <td>{{$view->bpi_account}}</td>
                <td>


                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                        data-target="#b{{$view->add_id}}" aria-expanded="false" aria-controls="collapseExample">
                        Basic Salary
                    </button>

                   

             

                    <div class="collapse" id="b{{$view->add_id}}">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col">
                                            <b class="h5">BASIC SALARY DETAILS</b>
                                            <hr class="bg-primary">
                                            <div class="h5 text-left"><b>Salary:</b> <u>{{$view->salary}}</u></div>
                                            <div class="h5 text-left"><b>Daily Rate:</b> <u>{{$view->daily_rate}}</u></div>
                                            <div class="h5 text-left"><b>Rate Per Hour:</b> <u>{{$view->rate_per_hour}}</u></div>
                                            <div class="h5 text-left"><b>Mins:</b> <u>{{$view->mins}}</u></div>
                                            <div class="h5 text-left"><b>Basic:</b> <u>{{$view->basic}}</u></div>
                                            <div class="h5 text-left"><b>Emolument:</b> <u>{{$view->emolument}}</u></div>
                                            <div class="h5 text-left"><b>Total Basic Salary:</b> <u>{{$view->total_basic_salary}}</u></div>
                                    </div>
                                </div>
                            </div>
                    </div>


                <a class="btn btn-primary" href="{{action('AddEmployeeNFController@editNF',[Crypt::encrypt($view->add_id)])}}"><i class="fas fa-edit"></i></a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
