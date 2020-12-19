@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Payroll</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-calendar-alt"></i> Non Faculty Payroll</li>
    </ol>
</nav>




<div class="container-fluid">

        <a href="{{route('PayrollNonFaculty.create')}}"><button class="btn btn-primary"><i class="fas fa-calendar-plus"></i>
            Create Payroll</button></a>
<hr>
            

<h3 class="pt-2 text-secondary text-center">
        <i class="fas fa-calendar-alt text-primary"></i> Non Faculty Payroll
    </h3>
    <hr>

    <div class="table-responsive mb-5">
        <table class="table table-hover table-bordered text-center" id="displatTwo" class="display">
            <thead class="thead-dark">
                <tr>
                    <th>Payroll ID</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th class="bg-success text-white">Salary Details</th>
                    <th>Date</th>
                    <th>Payslips</th>
                    <th class="bg-primary text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Table as $view)
                <tr>
                    <td>{{$view->payrolltablenonfaculty_id}}</td>
                    <td>{{$view->emp_id}}</td>
                    <td>{{$view->emp_firstname}} {{$view->emp_lastname}}</td>
                    <td>
                        <div class="row text-center">
                            <div class="col">Salary:</div>
                            <div class="col">{{$view->salary}}</div>
                        </div>
                        <div class="row text-center">
                            <div class="col">Daily Rate:</div>
                            <div class="col">{{$view->daily_rate}}</div>
                        </div>
                        <div class="row text-center">
                                <div class="col">Rate Per Hour:</div>
                                <div class="col">{{$view->rate_per_hour}}</div>
                            </div>
                        <div class="row text-center">
                            <div class="col">Mins</div>
                            <div class="col">{{$view->mins}}</div>
                        </div>
                        <div class="row text-center">
                                <div class="col">Basic</div>
                                <div class="col">{{$view->basic}}</div>
                            </div>
                            <div class="row text-center">
                                    <div class="col">Emolument</div>
                                    <div class="col">{{$view->emolument}}</div>
                                </div>
                                <hr>
                                <div class="row text-center">
                                        <div class="col bg-success text-white">Total Basic Salary:</div>
                                        <div class="col bg-success text-white">{{$view->total_basic_salary}}</div>
                                    </div>
                                    <hr>
                                    <div class="row text-center">
                                            <div class="col">Absence/Lates</div>
                                            <div class="col">{{$view->absence}}</div>
                                        </div>
                                        <div class="row text-center">
                                                <div class="col bg-danger text-white">Total Absence:</div>
                                                <div class="col bg-danger text-white">{{$view->total_absence}}</div>
                                            </div>
                    </td>
                    <td>
                        <div class="row text-center">
                            <div class="col">Date From:</div>
                            <div class="col">{{ date('M. d,Y D',strtotime($view->date_from))}}</div>
                        </div>

                      
                        <div class="row text-center">
                            <div class="col">Date To:</div>
                            <div class="col">{{ date('M. d,Y D',strtotime($view->date_to))}}</div>
                        </div>
                    </td>
               
                    <td><a class="btn btn-info" href="{{ route('PayrollNonFaculty.show',$view->emp_id) }}"><i class="fas fa-money-check"></i> View Payslips</a></td>
                            <form action="{{ route('PayrollNonFaculty.destroy',$view->payrolltablenonfaculty_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                        <td><button class="btn btn-danger text-white" type="submit" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i> Delete</button></td>
                    </form>
              
                </tr>
                @endforeach
         
            </tbody>
        </table>
    </div>
</div>


@endsection
