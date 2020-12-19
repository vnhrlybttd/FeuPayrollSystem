@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-cog"></i> Manage</li>
    </ol>
</nav>
<hr>

<div class="row justify-content-between">
    <!-- Button trigger modal -->
<a class="btn btn-primary" href="{{action('AddEmployeeNFController@index')}}"><i class="fas fa-arrow-circle-left"></i>
        Back</a>



</div>

<hr>

{!! Form::model($find, ['method' => 'PATCH','route' => ['HRNF.update', $find->add_id]]) !!}
@csrf

<div class="col-12 shadow bg-white pl-5 pr-5 pt-5 mb-5 pb-3">

    <h3 class="pt-2 text-secondary text-center">
        <i class="fas fa-user text-primary"></i> Basic Personal Record
    </h3>
    <hr>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <div class="label bold">Employee ID</div>
                <input value="{{$find->emp_id}}" class="form-control" readonly>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <div class="label bold">Cost Center</div>
                <select name="cost_center" class="form-control" required >
                    @foreach ($cost_center as $cost_view)
                    <option value="{{$cost_view->cc_name}}"
                        {{$find->cost_center == $cost_view->cc_name ? 'selected="selected"' : ''}}>
                        {{$cost_view->cc_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <div class="label bold">Employement Status</div>
                {!! Form::select('employment_status',['Full-Time' =>
                'Full-Time','Part-Time'=>'Part-Time','Probationary'=>'Probationary'],null, array('class'=>
                'form-control'));
                !!}
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col">
            <div class="label bold">First Name</div>
            <input value="{{$find->emp_firstname}}" class="form-control" readonly>
        </div>
        <div class="col">
            <div class="label bold">Middle Name</div>
            <input value="{{$find->middle_name}}" class="form-control" readonly>
        </div>
        <div class="col">
            <div class="label">Last Name</div>
            <input value="{{$find->emp_lastname}}" class="form-control" readonly>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col">
            <div class="label bold">SSS Number</div>
            <input value="{{$find->sss_number}}" class="form-control" name="sss_number" >
        </div>
        <div class="col">
            <div class="label bold">Philhealth</div>
            <input value="{{$find->philhealth_number}}" class="form-control" name="philhealth_number" >
        </div>
    </div>

    <div class="row mt-1">
        <div class="col">
            <div class="label bold">Pag-IBIG Number</div>
            <input value="{{$find->pagibig_number}}" class="form-control" name="pagibig_number" >
        </div>
        <div class="col">
            <div class="label bold">TIN Number</div>
            <input value="{{$find->tin_number}}" class="form-control" name="tin_number" >
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <div class="label bold">BPI Account</div>
            <input value="{{$find->bpi_account}}" class="form-control" name="bpi_account" >
        </div>
    </div>



    <div class="row justify-content-end mr-0 mt-2">
        <button class="btn btn-success" type="submit">Submit</button>
    </div>



</div>

</form>

@endsection