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
        <a class="btn btn-primary" href="/PayrollComputation"><i class="fas fa-arrow-circle-left"></i>
            Back</a>

      
            <div class="mt-2 pl-2 rounded shadow">
                    <small class="text-success">Choose Employee</small> <i class="fas fa-user-tie text-success"></i>  / 
                    <small class="text-secondary">Calculate Absences & OT</small> <i class="fas fa-user-clock text-secondary"></i> /
                    <small class="text-secondary">Computation</small> <i class="fas fa-calculator text-secondary"></i> /
                    <small class="text-secondary">Overview</small> <i class="fas fa-address-book text-secondary"></i>
                </div>

    </div>


    <hr>

    <form method="POST" action={{ action('AddPayslipNFController@stepTwo') }}>
        @csrf
        <section>
            <div class="container-fluid mb-5">


               

                <div class="label">
                    <h5 class="text-danger">STEP 1</h5>
                </div>
                <div class="row mb-2 bg-white shadow">
                    <div class="col border border-info">
                        <h3 class="pt-2 text-secondary text-center"><i class="fas fa-user text-primary"></i> Choose Employee
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



                        <div class="row">
    
                            <div class="col">
                                <div class="form-group">
                                    <div class="label">Employee:</div>
                                    <select class="form-control" name="employee_id">
                                        @foreach ($employee as $employeeView)
                                        <option value="{{$employeeView->emp_pin}}">{{$employeeView->emp_firstname}} {{$employeeView->emp_lastname}} - {{$employeeView->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <div class="label"> Pay Date:</div>
                                    <input class="form-control" type="month" name="date">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row justify-content-end mr-0">
                                <button class="btn btn-success" type="submit">Proceed</button>
                            </div>
                        <hr>



                    </div>
                </div>
            </div>
        </section>
    </form>

</div>



@endsection