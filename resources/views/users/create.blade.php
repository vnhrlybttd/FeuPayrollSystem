@extends('layouts.sidemenu')


@section('content')
<h2 style="color:#008349;"> Create User</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-cog"></i> Users Management</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-plus"></i> Create User</li>
    </ol>
</nav>
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


<div class="shadow rounded p-3">
{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Employee ID:</strong>
            {!! Form::text('emp_id', null, array('placeholder' => 'ID','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First Name:</strong>
            {!! Form::text('first_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                {!! Form::text('last_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Username:</strong>
            {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <input name="status" value="1" hidden>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Account Type:</strong>

    <select class="form-control" name="type" id="Account_Type">
            <option value="Super Admin">Super Admin</option>
            <option value="Admin">Admin</option>
            <option value="Co-Admin">Co-Admin</option>
            <option value="Non-Faculty">Non-Faculty</option>
            <option value="Faculty">Faculty</option>
    </select>
            </div>
        </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        <button type="submit" class="btn btn-success">Submit</button>
        
    </div>

</div>
{!! Form::close() !!}
</div>

@endsection