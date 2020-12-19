@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Employement Status</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-cog"></i> Manage Employment Status</li>
    </ol>
</nav>

<div class="container-fluid">

    <div class="shadow bg-white p-5">


      

    <form method="POST" action="{{route('ES.store')}}">
        @csrf

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

            <div class="form-group">
                <div class="label">Employement Status Name</div>
                <input class="form-control" name="employement_status">
            </div>
           
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

</div>

@endsection
