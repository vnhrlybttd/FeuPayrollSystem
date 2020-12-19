@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Cost Center</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-cog"></i> Manage Cost Center</li>
    </ol>
</nav>


<a class="btn btn-primary" href="{{ route('CC.create') }}"><i class="fas fa-plus"></i>
    Add Cost Center</a>
    <hr> 


<div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center" id="myTable" class="display">
                <thead class="thead-dark">
                    <tr>
                
                        <th>ID</th>
                        <th>Cost Center Name</th>
                        <th>Description</th>
                        <th class="bg-primary">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($table as $tables)
                    <tr>
          
                    <td>{{$tables->cost_id}}</td>
                    <td>{{$tables->cc_name}}</td>
                    <td>{{$tables->description}}</td>
                        <td colspan="2">
                            
                                 
                             
                            <a class="btn btn-info text-white" href="{{ route('CC.edit',$tables->cost_id) }}"> Edit <i class="fas fa-edit"></i></a>
                           
                                 
                                   
                          
                            </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
</div>



@endsection