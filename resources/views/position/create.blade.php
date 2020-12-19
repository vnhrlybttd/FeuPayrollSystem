@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Position</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-plus-circle"></i> Create Position</li>
    </ol>
</nav>
<hr>

<!-- ALERT -->

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
                    <i class="fas fa-plus-circle text-primary"></i> Create Position
                </h3>
                <hr>
        
                
                <!-- START OF FORM -->
                <form action="{{ route('position.store') }}" method="POST">
                    @csrf
                        <div class="form-group pl-5 pr-5">
                                <label for="exampleInputEmail1">Position Name</label>
                                <input type="text" class="form-control" placeholder="Enter Position Name" name="position_name"required>
                        </div>

                        <div class="form-group pl-5 pr-5">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="status">
                                  <option>Active</option>
                                  <option>Inactive</option>
                                </select>
                              </div>

        
                        <div class="d-flex justify-content-center">
                            <div class="p-1"><button type="button" class="btn btn-primary"><i class="fas fa-undo"></i> Reset</button></div>
                            <div class="p-1"><button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Submit</button></div>
                                
                                
                                
                        </div>
                </form>

        
        
        
            </div>
        </div>

@endsection