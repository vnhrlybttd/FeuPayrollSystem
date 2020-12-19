@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> User Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> User Managment</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-plus"></i> Add Accounts</li>
    </ol>
</nav>
<hr>

<section>

    <div class="container-fluid shadow rounded">
        <div class="mb-5">
            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-user-plus text-primary"></i> Add Accounts
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


            <div class="p-3">
                
                {!! Form::open(array('route' => 'employee.store','method'=>'POST')) !!}
                <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong for="exampleInputEmail1">Employee ID</strong>
                                <input class="form-control" name="emp_id">
                            
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong for="exampleInputEmail1">First Name</strong>
                                <input class="form-control" name="first_name">
                            
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong for="exampleInputEmail1">Last Name</strong>
                                <input class="form-control" name="last_name">
                            
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong for="exampleInputEmail1">Username</strong>
                                    <input class="form-control" name="username">
                                
                                </div>
                            </div>
                  
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    <input class="form-control" name="password" type="password">
                                </div>
                            </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Account Type:</strong>
    
                    <select class="form-control" name="type" id="Account_Type" required>
                            <option disabled selected>Select Account Type</option>
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

                          <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <input name="status" value="0" hidden>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <input name="force_password" value="0" hidden>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <input name="resets_password" value="0" hidden>
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
 
 $("#Account_Type").on("change",function(){
        //Getting Value
        var selValue = $("#Account_Type :selected").text();
        //Setting Value
        $("#Roles").val(selValue);
    }); 

</script>

@endsection
