@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-cog"></i> Manage</li>
    </ol>
</nav>
<hr>


<a class="btn btn-primary" href="{{('/HR/Employee/Step1')}}"><i class="fas fa-address-card"></i>
    Add Employee
</a>
<hr>


<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center" id="myTable" class="display">
            <thead class="thead-dark">
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Government ID's</th>
                    <th>TIN</th>
                    <th>BPI Account</th>
                    <th style="width: 25%;">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($table as $view)
                <tr>
                    <td>{{$view->emp_id}}</td>
                    <td>{{$view->emp_firstname}} {{$view->middle_name}}, {{$view->emp_lastname}}</td>
                    <td>
                        <div class="form-group">
                            <div class="label">SSS</div>
                            {{$view->sss_number}}
                        </div>
                        <div class="form-group">
                            <div class="label">Philhealth</div>
                            {{$view->philhealth_number}}
                        </div>
                        <div class="form-group">
                            <div class="label">Pag-IBIG</div>
                            {{$view->pagibig_number}}
                        </div>
                    </td>
                    <td>{{$view->tin_number}}</td>
                    <td>{{$view->bpi_account}}</td>
                <td>


                     


                <a class="btn btn-primary" href="{{action('HRNFController@edit',[Crypt::encrypt($view->add_id)])}}">Edit <i class="fas fa-edit"></i></a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection