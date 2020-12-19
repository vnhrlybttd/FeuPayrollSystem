@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Edit User</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-cog"></i> Users Management</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-edit"></i> Edit User</li>
    </ol>
</nav>
<hr>


@if (count($errors) > 0)
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


<div class="container-fluid">
        <div class="row shadow rounded p-4">
{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
                <strong for="exampleInputEmail1">Employee ID</strong>
                {!! Form::text('emp_id', null, array('placeholder' => 'Employee ID','class' => 'form-control')) !!}   
            </div>

        
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First Name:</strong>
            {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
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

    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'), 'Active')
                !!}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ticket Admin:</strong>
                    {!! Form::select('ticketit_admin', array('1' => 'Active', '0' => 'Inactive'), 'Active')
                    !!}
    
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type:</strong>
                    {!! Form::select('type', array('Admin' => 'Admin','Co-Admin' => 'Co-Admin','Super Admin' => 'Super Admin'
                    ,'Faculty' => 'Faculty'
                    ,'Non-Faculty' => 'Non-Faculty'
                    ,'Developer' => 'Developer'), 'Super Admin');
                    !!}
                </div>
            </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
{!! Form::close() !!}

</div>
</div>

@endsection