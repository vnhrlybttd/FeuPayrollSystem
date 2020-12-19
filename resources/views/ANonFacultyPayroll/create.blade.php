@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Payroll</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Non Faculty</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-money-check"></i> Create Payroll</li>
    </ol>
</nav>
<hr>

<div class="container-fluid">
    <div class="row bg-white shadow">
        <div class="col border border-info">
            <h3 class="pt-2 text-secondary text-center"><i class="fas fa-money-check text-primary"></i> Create Payroll
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

        <form method="POST" action="{{route('NonFacultyPayroll.store')}}">
            @csrf
                <div class="pl-5 pr-5 mr-5 ml-5">
                    <div class="form-group">
                        <div class="label">Month/Year</div>
                        <input type="month" name="dates" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="label">Pay Period</div>
                        <input type="date" name="paydate" class="form-control">
                    </div>
                </div>

                <div class="row justify-content-center p-2">
                    <a class="btn btn-primary mr-1" href="javascript:history.back()"> <i
                            class="fas fa-arrow-circle-left"></i> Back</a>
                    <button class="btn btn-success ml-1" type="submit"><i class="fas fa-check"></i> Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection
