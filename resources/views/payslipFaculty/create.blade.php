@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payslip</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-money-check-alt"></i> Faculty Payslip</li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-receipt"></i> Create Payslip</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="bg-white shadow p-2">
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-money-check-alt text-primary"></i> Create Payslip
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

        <form action="{{route('payslipFaculty.store')}}" method="POST">
            @csrf

            <div class="container-fluid">
                <div class="row">



                    <div class="col">
                        <div class="form-group">
                            <label for="exampleSelect1">Employee</label>
                            <select class="form-control" id="exampleSelect1" name="employee_id">
                                @foreach ($names as $emp_name)
                                <option  value="{{$emp_name->emp_id}}">{{$emp_name->emp_id}} - {{$emp_name->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Pay Period</label>
                            <input class="form-control" type="date" name="date">
                        </div>

                    </div>






                </div>


                <div class="d-flex justify-content-center mb-3">
                        <a class="btn btn-primary mr-3" href="{{ route('payslipFaculty.index') }}"><i
                            class="fas fa-arrow-circle-left"></i> Back</a> 
                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Submit</button>
                </div>












            </div>



        </form>
    </div>







    @endsection
