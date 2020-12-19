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
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-clock"></i> Calculate Absence</li>
    </ol>
</nav>
<hr>




{!! Form::model($finds, ['method' => 'PATCH','route' => ['calculateAbsences.update', $finds->non_salary]]) !!}
    @csrf

    <div class="container-fluid bg-white shadow p-5">

            <h3 class="pt-2 text-secondary text-center">
                    <i class="fas fa-user-clock text-primary"></i> Calculate Absence
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

                <div class="form-group ml-5 mr-5">
                    <label>Employee ID</label>
                <input class="form-control" value="{{$finds->emp_id}}" placeholder="{{$finds->name}}" name="emp_id" readonly>
                </div>

        <div class="row">
            <div class="col">
                <div class="form-group ml-5 mr-5">
                    <label>Start Date</label>
                    <input type="date" class="form-control" name="recordsFrom">
                </div>
            </div>
            <div class="col">
                <div class="form-group ml-5 mr-5">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="recordsTo">
                </div>
            </div>

           
        </div>


        <div class="form-group ml-5 mr-5">
                <a class="btn btn-primary" href="{{route('NonFaculty.index')}}"><i class="fas fa-arrow-circle-left"></i> Back</a>
                <button class="btn btn-success text-white" type="submit"><i class="fas fa-calculator"></i> Calculate</button>
            </div>
            <hr>

    </div>




    {!! Form::close() !!}


@endsection
