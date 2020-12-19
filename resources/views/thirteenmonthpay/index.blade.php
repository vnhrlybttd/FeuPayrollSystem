@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> 13th Month Pay</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tasks"></i> Payroll</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-receipt"></i> 13th Month Pay</li>
    </ol>
</nav>

<div class="container-fluid mb-5">
    <div class="border border-secondary">
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-money-check-alt text-primary"></i> 13th Month Pay
            <div class="row justify-content-center"><small>for users</small></div>
        </h3>


        <hr>


        
        <div class="container-fluid">
            <form action="{{action('MonthPayController@filter')}}" method="POST">
                @csrf

                <div class="row justify-content-center">
                    <div class="col">
                        <div class="form-group p-2">
                            <div class="label">Employee ID:</div>
                                    <select class="form-control" name="emp_id">
                                        @foreach ($employeePayslip as $item)
                                        <option value="{{$item->emp_id}}">{{$item->emp_id}} - {{$item->name}}</option>
                                        @endforeach
                                    </select>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="form-group p-2">
                                <div class="label">Date From:</div>
                                    <input class="form-control" type="date" name="date_from">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group p-2">
                                <div class="label">Date To:</div>
                                    <input class="form-control" type="date" name="date_to">
                        </div>

                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <button class="btn btn-primary" type="submit">Generate</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

<div class="container-fluid mb-5">
    <div class="border border-secondary">
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-money-check-alt text-primary"></i> 13th Month Table
        </h3>

        <hr>

     


        <form action="{{action('MonthPayController@generate')}}" method="POST">
            @csrf
            <div class="row pl-3 pr-3">
                <div class="col">
                    <div class="form-group mt-2">
                        <div class="label">Type</div>
                        <select class="form-control" name="type">
                                <option disabled selected>Select Account Type</option>
                            <option value="Faculty">Faculty</option>
                            <option value="Non-Faculty">Non-Faculty</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="a">Date From:</label>
                        <input class="form-control" type="date" name="date_from">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="a">Date To:</label>
                        <input class="form-control" type="date" name="date_to">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                    <button class="btn btn-primary" type="submit">Generate Report</button>
                </div>
        </form>
        <hr>
   

     


        <hr>
        <div class="table-responsive mb-3 p-5">


            <table class="table table-hover table-bordered text-center" id="displayTwo" class="display nowrap">
                <thead class="thead-dark">
                    <tr>

                        <th>Employee</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th class="bg-success text-white">Total Summary</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthTable as $item)
                  
                    <tr>
                        <td>{{$item->employee_id}}-{{$item->name}}</td>
                        <td>{{$item->type}}</td>
                        <td>
                            <div class="row">
                                <div class="col">Start Date:</div>
                                <div class="col">{{ date('M. d,Y D',strtotime($item->start_date))}}</div>
                            </div>
                            <div class="row">
                                <div class="col">End Date:</div>
                                <div class="col">{{ date('M. d,Y D',strtotime($item->end_date))}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col bg-success text-white">Total Net Basic</div>
                                <div class="col bg-success text-white">{{$item->net_basic}}</div>
                            </div>

                            <div class="row">
                                <div class="col bg-success text-white">Total 13th Month Pay</div>
                                <div class="col bg-success text-white">{{$item->thirteenmonthpay}}</div>
                            </div>
                        </td>
                        <form action="{{ url('thirteenmonthpay/delete',$item->thirteenmonthpay_id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <td><button class="btn btn-danger text-white" type="submit"
                                    onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i>
                                    Delete</button></td>
                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>





@endsection
