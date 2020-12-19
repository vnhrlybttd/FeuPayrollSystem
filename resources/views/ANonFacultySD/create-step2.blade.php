@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> Employee Management</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Non Faculty
        </li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-address-card"></i> Add Employee
        </li>
    </ol>
</nav>
<hr>

<div class="container-fluid">


        <div class="row justify-content-between">
                <!-- Button trigger modal -->
                <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
                    Back</a>

                    <div class="mt-2 pl-2 rounded shadow">
                            <small class="text-success">Employee</small> <i class="fas fa-user text-success"> / </i>
                            <small class="text-success">Salary Details</small> <i class="fas fa-coins text-success"></i> /
                            <small class="text-success">Calculate Absence</small> <i class="fas fa-user-clock text-success"></i> /
                            <small class="text-secondary">Payslip</small> <i class="fas fa-receipt text-secondary"></i> /
                            <small class="text-secondary">Overview</small> <i class="fas fa-address-book text-secondary"></i>
                    </div>
            </div>


</div>


<hr>
<form method="POST" action={{ action('ANFSDstepsController@stepFour') }}>
    @csrf
    <section>
        <div class="container-fluid">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <hr>
                </div>
                @endif
    

            <div class="label">
                <h5 class="text-danger">STEP 3</h5>
            </div>
            <div class="row mb-5 bg-white shadow-lg">
                <div class="col border border-info">
                    <h3 class="pt-2 text-secondary text-center"><i class="fas fa-user-clock text-danger"></i> Calculate Absence
                    </h3>
                    <hr>

                    <div class="d-flex justify-content-center">
                            <div class="align-self-center  pr-5">
                                    <div class="form-group">
                                        <div class="label">Employee Name:</div>
                                    @foreach ($employee as $employeeView)
                                    <h5>{{$employeeView->emp_firstname}} {{$employeeView->emp_lastname}}</h5>
                                    @endforeach
                                    </div>
                                </div>
                        <div class="align-self-center  pr-5">
                            <div class="form-group">
                                <div class="label">Employee ID:</div>
                            <h5>{{Session::get('anfsd')->emp_id}}</h5>
                            </div>
                        </div>
                        <div class="align-self-center">
                            <div class="form-group">
                                <div class="label">Pay Period:</div>
                            <h5>{{  date('M. Y',strtotime(Session::get('anfsd')->date))}}</h5>
              
                            </div>
                        </div>
                    </div>
                    <hr>


                        
        <div class="row">
                <div class="col">
                    <div class="form-group ml-5 mr-5">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="recordsFrom" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ml-5 mr-5">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="recordsTo" required>
                    </div>
                </div>
    
               
            </div>

            <div class="row justify-content-center mb-5">
                    <button class="btn btn-success" type="submit">Proceed</button>
                </div>

                </div>
            </div>
        </div>
    </section>
</form>
@endsection