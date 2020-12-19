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

            {!! Form::model($EmployementStatus, ['method' => 'PATCH','route' => ['ES.update', $EmployementStatus->emp_status]]) !!}
            @csrf
          
            <div class="form-group">
                <div class="label">ID</div>
                <input value="{{$EmployementStatus->emp_status}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <div class="label">Cost Center Name</div>
                <input value="{{$EmployementStatus->employement_status}}" class="form-control" name="employement_status">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>

      
    </div>

</div>



@endsection