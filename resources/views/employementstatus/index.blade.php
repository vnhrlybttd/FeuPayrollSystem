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


<a class="btn btn-primary" href="{{ route('ES.create') }}"><i class="fas fa-plus"></i>
    Add Employement Status</a>
    <hr> 

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center" id="myTable" class="display">
            <thead class="thead-dark">
                <tr>
            
                    <th>ID</th>
                    <th>Employement Status Name</th>
         
                    <th class="bg-primary">Actions</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($table as $tables)
                <tr>
      
                <td>{{$tables->emp_status}}</td>
                <td>{{$tables->employement_status}}</td>
        
                    <td colspan="2">
                        
                             
                         
                        <a class="btn btn-info text-white" href="{{ route('ES.edit',$tables->emp_status) }}"> Edit <i class="fas fa-edit"></i></a>
                       
                             
                               
                      
                        </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

    @endsection