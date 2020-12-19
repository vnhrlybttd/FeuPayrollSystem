@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payroll</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tasks"></i> Manage Payroll</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tasks"></i> Show Payroll</li>
    </ol>
</nav>



<div class="container-fluid">
        <div class="row justify-content-between">
    <a href="{{('/payroll')}}"><button class="btn btn-primary"><i class="fas fa-arrow-left"></i> Go Back</button></a>

   @can('payslip-create')
    <a href="{{ route('payslip.create',$payroll->id) }}"><button class="btn btn-primary"><i class="fas fa-calculator"></i> Create
            Payslip</button></a>
@endcan
 
    </div>
    
</div>


<hr>



<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center" id="myTable" class="display">
            <thead class="thead-dark">
                <tr>
                    <td>Employee ID</td>
                    <td>Employee Name</td>
                    <td>Action</td>
                    
                </tr>
            <tbody>
       <td>Sample</td>
       <td>Sample</td>
       <td>sadsa</td>
            </tbody>
            </thead>
        </table>
    </div>
</div>



@endsection
