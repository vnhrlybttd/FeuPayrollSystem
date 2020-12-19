@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;">  User Managment</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> User Managment</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-check"></i> Edit Accounts</li>
    </ol>
</nav>
<hr>

<section>

    <div class="container-fluid">
        <div class="border border-secondary mb-5">
            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-user-check text-primary"></i> Edit Accounts
            </h3>
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

            <div class="shadow rounded p-3">
                {!! Form::model($user, ['method' => 'PATCH','route' => ['employee.update', $user->id]]) !!}
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Employee ID:</strong>
                            {!! Form::text('emp_id', null, array('placeholder' => 'Employee ID','class' => 'form-control')) !!}
                        </div>
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
                                <strong>Account Type:</strong>
                                
                    <select class="form-control" name="type" id="Account_Type" required>
                            <option disabled selected>Select Account Type</option>
                            @if($user->type === 'Super Admin')
                            <option value="Non-Faculty">Super-Admin</option>
                            @endif
                            <option value="Non-Faculty">Non-Faculty</option>
                            <option value="Faculty">Faculty</option>
                            <option value="Admin">Admin</option>
                            <option value="Co-Admin">Co-Admin</option>
                            <option value="Co-Admin">HR</option>
                    </select>
                            </div>
                        </div>
                   
                    

                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                        <input id="Roles" name="roles[]" hidden>
                    </div>



                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <a class="btn btn-primary" href="{{ route('employee.index') }}"><i class="fas fa-arrow-circle-left"></i> Back</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Submit</button>

                    </div>

                </div>
                {!! Form::close() !!}
            </div>



        </div>
    </div>

</section>

<script>
    $("#Account_Type").on("change", function () {
        //Getting Value
        var selValue = $("#Account_Type :selected").text();
        //Setting Value
        $("#Roles").val(selValue);
    });

</script>



@endsection
