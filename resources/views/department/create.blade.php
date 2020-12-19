@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Department</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-plus-circle"></i> Create Department</li>
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




<div class="container-fluid">
    <div class="border border-secondary">
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-plus-circle text-primary"></i> Create Department
        </h3>
        <hr>

        
        <!-- START OF FORM -->
        <form action="{{ route('department.store') }}" method="POST">
            @csrf

                <div class="form-group pl-5 pr-5">
                        <label for="exampleInputEmail1">Department Code</label>
                        <input type="text" class="form-control" placeholder="Enter Department Code" name="dept_code" >
                </div>

                <div class="form-group pl-5 pr-5">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" class="form-control" placeholder="Enter Department Name" name="dept_name" >
                </div>

                <div class="form-group pl-5 pr-5">

                        <label for="exampleInputEmail1">Parent</label>
                        <select class="custom-select" id="inputGroupSelect01" name="dept_parentcode">
                            @foreach ($createDepartment as $create)
                            <option selected>
                                {{$create -> dept_code}}
                          </option>
                          @endforeach
                        </select>
                   
                </div>

                <div class="form-group pl-5 pr-5">
                        <input type="hidden" class="form-control" name="company_id" value="1">
                </div>

                <div class="form-group pl-5 pr-5">
                        <input type="hidden" class="form-control" name="useCode" value="1">
                </div>

                <div class="form-group pl-5 pr-5">
                        <input type="hidden" class="form-control" name="dept_operationmode" value="0">
                </div>

                <div class="form-group pl-5 pr-5">
                        <input type="hidden" class="form-control" name="middleware_id" value="0">
                </div>

                <div class="form-group pl-5 pr-5">
                        <input type="hidden" class="form-control" name="defaultDepartment" value="0">
                </div>



            

                

                    
                <div class="d-flex justify-content-center">
                        <div class="p-1"><a class="btn btn-primary"href="{{ route('department.index') }}"><i class="fas fa-arrow-circle-left"></i>
                            Back</a></div>
                    <div class="p-1"><button type="submit" class="btn btn-success btn-lg-block"><i class="fas fa-check"></i> Submit</button></div>
                        
                        
                        
                </div>
        </form>
        <hr>



    </div>
</div>


@endsection
