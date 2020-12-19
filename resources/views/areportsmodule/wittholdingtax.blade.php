@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Reports</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-file-alt"></i> Generate Reports</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-calendar-alt"></i> Wittholding Tax Report</li>
    </ol>
</nav>
<hr>



<div class="row justify-content-between ml-1">
    <!-- Button trigger modal -->
    <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
        Back</a>
</div>
<hr>

<div class="label">
    <h5 class="text-danger">STEP 1</h5>
</div>
<div class="container-fluid bg-white shadow p-3">


    <h3 class="pt-2 text-secondary text-center">
        <i class="fas fa-calendar-alt text-primary"></i> Choose Date
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



    <form method="POST" action="{{action('ReportsController@wittholdingtaxStep1')}}">
        @csrf


        <input class="form-control" value="Wittholding Tax" name="report_name" hidden>

        <div class="form-group">
            <div class="label">Month</div>
            <input type="month" class="form-control" name="date">
        </div>

        <div>
            <button type="submit" class="btn btn-success">Proceed</button>
        </div>


    </form>


</div>


@endsection
