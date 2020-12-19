@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Reports</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Payroll</li>
    </ol>
</nav>
<hr>

<div class="container-fluid bg-white shadow p-3">


    <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-scroll text-primary"></i> Generate Payroll Reports
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

    <form  action="{{route('PayrollReports.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="label">Month</div>
            <input type="month" class="form-control" name="months">
        </div>


        <button class="btn btn-success" type="submit">Submit</button>
    </form>
</div>

@endsection