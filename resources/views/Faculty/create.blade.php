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
        <a class="btn btn-primary" href="{{ route('Faculty.index') }}"><i class="fas fa-arrow-circle-left"></i>
            Back</a>

    </div>


</div>


<hr>
<form method="POST" action={{ route('Faculty.store') }}>
    @csrf
<section>
    <div class="container-fluid">
        <!--FIRST ROW For Details-->
        <div class="row">
            <div class="col border border-info">
                <h3 class="pt-2 text-secondary text-center"><i class="fas fa-address-card text-primary"></i> Add User
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
                            <label for="exampleSelect1">Employee ID</label>
                            <select class="form-control" id="exampleSelect1" name="emp_id">
                                @foreach ($EmployeeDetails as $view)
                            <option value="{{$view->emp_id}}">{{$view->emp_id}} - {{$view->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-3">
                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Submit</button>
                </div>

     

            </div>
        </div>






    </div>
</section>
</form>
@endsection
