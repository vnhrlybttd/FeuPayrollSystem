@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Payroll Computation</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-coins"></i> Monthly Pay</li>
    </ol>
</nav>
<hr>



<div class="container-fluid">


    <div class="row justify-content-between">
        <!-- Button trigger modal -->
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
            Back</a>

      
            <div class="mt-2 pl-2 rounded shadow">
                    <small class="text-success">Choose Employee</small> <i class="fas fa-user-tie text-success"></i>  / 
                    <small class="text-success">Calculate Absences & OT</small> <i class="fas fa-user-clock text-success"></i> /
                    <small class="text-secondary">Computation</small> <i class="fas fa-calculator text-secondary"></i> /
                    <small class="text-secondary">Overview</small> <i class="fas fa-address-book text-secondary"></i>
                </div>

    </div>


    <hr>

    <form method="POST" action={{ action('AddPayslipNFController@stepThree') }}>
        @csrf
        <section>
            <div class="container-fluid mb-5">


               

                <div class="label">
                    <h5 class="text-danger">STEP 2</h5>
                </div>
                <div class="row mb-2 bg-white shadow">
                    <div class="col border border-info">
                        <h3 class="pt-2 text-secondary text-center"><i class="fas fa-user-clock text-danger"></i> Calculate Absences & OT
                        </h3>
                        <hr>

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
                        </div>
                        @endif


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
                            <h5>{{Session::get('payslip')->employee_id}}</h5>
                            </div>
                        </div>
                        <div class="align-self-center">
                            <div class="form-group">
                                <div class="label">Pay Period:</div>
                            <h5>{{  date('M. Y',strtotime(Session::get('payslip')->date))}}</h5>
              
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center text-center">
                        <div class="col">
                            <div class="form-group">
                                <div class="label text-danger">Last Calculate of Absence & OT:</div>
                                <div class="h5"><div class="small"> {{ date('M. d, Y',strtotime($show->att_date))}}</div></div>
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
            <hr>

            <div class="row justify-content-center mb-5">
                    <button class="btn btn-success" type="submit">Proceed</button>
                </div>

                    </div>
                </div>
            </div>
        </section>
    </form>
</div>



    @endsection