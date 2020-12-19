@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Department</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tasks"></i> Manage Department</li>
    </ol>
</nav>

@can('department-create')
<div class="row ml-auto">
<a  href="{{('/department/create')}}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Department</button></a>
</div>
<hr>
@endcan

<!-- ALERT -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
    <p>{{ $message }}</p>
</div>
@endif





<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center" id="myTable" class="display">
            <thead class="thead-dark">
                <tr>
                    <th>Department ID</th>
                    <th>Department Code</th>
                    <th class="text-center">Department Name</th>
                    <!-- <th class="text-center">Position</th> -->
  
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->dept_code }}</td>
                    <td>{{ $department->dept_name }}</td>
              

              

                    <td colspan="2">
                        <form action="{{ route('department.destroy',$department->id) }}" method="post">
                            <a class="btn btn-primary" href="{{ route('department.edit',$department->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
           
        </table>
    </div>
</div>



@endsection
