@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-cog"></i> Manage Faculty</li>
    </ol>
</nav>
<hr>


<a class="btn btn-primary" href="{{ route('Faculty.create') }}"><i class="fas fa-address-card"></i>
    Add Employee</a>
    <hr> 


<div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center" id="myTable" class="display">
                <thead class="thead-dark">
                    <tr>
                
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Position</th>
                        <th class="bg-primary">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($SalaryDetails as $user)
                    <tr>
          
                    <td>{{$user->emp_id}}</td>
                    <td>{{$user->name}}</td>
                    <td>@foreach ($EmployeeDetails->where('id',$user->id) as $item)
                        {{$item->emp_title}}
                    @endforeach</td>
                        <td colspan="2">
                            
                                 
                                <a class="btn btn-danger" href="{{ route('calculateAbsence.edit',$user->faculty_salary) }}"><i class="fas fa-edit"></i> Calculate Absence</a>
                            <a class="btn btn-info" href="{{ route('Faculty.edit',$user->faculty_salary) }}"><i class="fas fa-edit"></i> Salary Details</a>
                           
                                 
                                   
                          
                            </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
</div>

@endsection