@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> Employee Management</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Non Faculty
        </li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-address-card"></i> Add Employee
        </li>
    </ol>
</nav>
<hr>

<div class="container-fluid">


        <div class="row justify-content-between">
                <!-- Button trigger modal -->
                <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
                    Back</a>

                    <div class="mt-2 pl-2 rounded shadow">
                            <small class="text-success">Employee</small> <i class="fas fa-user text-success"> / </i>
                            <small class="text-success">Salary Details</small> <i class="fas fa-coins text-success"></i> /
                            <small class="text-secondary">Calculate Absence</small> <i class="fas fa-user-clock text-secondary"></i> /
                            <small class="text-secondary">Payslip</small> <i class="fas fa-receipt text-secondary"></i> /
                            <small class="text-secondary">Overview</small> <i class="fas fa-address-book text-secondary"></i>
                    </div>
            </div>

            
         


</div>


<hr>
<form method="POST" action={{ action('ANFSDstepsController@stepThree') }} >
    @csrf
    <section>
        <div class="container-fluid">


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
                <hr>
            </div>
            @endif

            <div class="label">
                <h5 class="text-danger">STEP 2</h5>
            </div>
            <div class="row mb-5 bg-white shadow-lg">
                <div class="col border border-info">
                    <h3 class="pt-2 text-secondary text-center"><i class="fas fa-coins text-primary"></i> Salary Details
                    </h3>
                    <hr>
                    <div class="d-flex justify-content-center">
                            <div class="align-self-center  pr-5">
                                    <div class="form-group">
                                        <div class="label">Employee Name:</div>
                                    @foreach ($employee as $employeeView)
                                    <h5>{{$employeeView->emp_firstname}} {{$employeeView->emp_lastname}}</h5>
                                    @endforeach
                                    </div>
                                </div>
                        <div class="align-self-center  pr-5">
                            <div class="form-group">
                                <div class="label">Employee ID:</div>
                            <h5>{{Session::get('anfsd')->emp_id}}</h5>
                            </div>
                        </div>
                        <div class="align-self-center">
                            <div class="form-group">
                                <div class="label">Pay Period:</div>
                            <h5>{{  date('M. Y',strtotime(Session::get('anfsd')->date))}}</h5>
              
                            </div>
                        </div>
                    </div>
                    <hr>
                   
                    <div class="border border-success m-5">
                            <h3 class=" pt-2 text-secondary text-center">
                                <i class="fas fa-coins text-success"></i> Total Basic Salary
                            </h3>
                            <hr>
                
                            <div class="form-group ml-5 mr-5">
                            <input type="number" class="form-control form-control-sm bg-success text-white text-center" name="total_basic_salary" 
                                    id="total_basic_salary" readonly step="any">
                            </div>
                
                        </div>

                            <div class="form-group ml-5 mr-5">
                                    <strong for="exampleInputEmail1">Salary</strong>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border border-success bg-white"><i
                                                class="fas fa-ruble-sign text-success"></i></span>
                                        <input type="number" class="form-control form-control-sm" name="salary" 
                                            id="salary" step="any" required>
                                    </div>
                                </div>
                    
                                <div class="form-group ml-5 mr-5">
                                    <strong for="exampleInputEmail1">Daily Rate</strong>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border border-success bg-white"><i
                                                class="fas fa-percent text-success"></i></span>
                                        <input type="number" class="form-control form-control-sm bg-success text-white" name="daily_rate"
                                            id="daily_rate" step="any" readonly>
                                    </div>
                                </div>
                    
                                <div class="form-group ml-5 mr-5">
                                    <strong for="exampleInputEmail1">Per Hour</strong>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border border-success bg-white"><i
                                                class="fas fa-clock text-success"></i></span>
                                        <input type="number" class="form-control form-control-sm bg-success text-white" name="rate_per_hour" 
                                            id="rate_per_hour" step="any" readonly>
                                    </div>
                                </div>
                    
                                <div class="form-group ml-5 mr-5">
                                    <strong for="exampleInputEmail1">mins</strong>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border border-success bg-white"><i
                                                class="fas fa-clock text-success"></i></span>
                                        <input type="number" class="form-control form-control-sm bg-success text-white" name="mins"  id="mins" step="any" readonly>
                                    </div>
                                </div>
                    
                                <hr>
                    
                                <div class="form-group ml-5 mr-5">
                                    <strong for="exampleInputEmail1">Basic</strong>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border border-success bg-white"><i
                                                class="fas fa-ruble-sign text-success"></i></span>
                                        <input type="number" class="form-control form-control-sm bg-success text-white" name="basic"  id="basic" step="any" readonly>
                                    </div>
                                </div>
                    
                                <div class="form-group ml-5 mr-5">
                                    <strong for="exampleInputEmail1">Emolument</strong>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border border-success bg-white"><i
                                                class="fas fa-ruble-sign text-success"></i></span>
                                        <input type="number" class="form-control form-control-sm" name="emolument" 
                                            id="emolument" step="any" value="0">
                                    </div>
                                </div>

                              
                        
                    

                    <div class="row justify-content-center">
                    <button class="btn btn-success" type="submit">Proceed</button>
                </div>

                    <hr>
                </div>
            </div>

           
        </div>






        </div>

        

    </section>
</form>

<script>
        $('input').keyup(function () { // run anytime the value changes
    
            var salary = Number($('#salary').val()); // get value of field
            var daily_rate = Number($('#daily_rate').val()); // convert it to a float
            var rate_per_hour = Number($('#rate_per_hour').val());
            var mins = Number($('#mins').val());
            var basic = Number($('#basic').val());
            var emolument = Number($('#emolument').val());
            var absence = Number($('#absence').val());
            var total_basic_salary = Number($('#total_basic_salary').val());
            var total_absence = Number($('#total_absence').val());
    
            //Daily Rate Round Off
            daily_rate_formula = (salary * 12 ) / 262;
            var twoDecimal = daily_rate_formula.toFixed(2);
            document.getElementById('daily_rate').value = twoDecimal;
           
            //Per Hour Round Off
            per_hour_formula = (daily_rate/8);
            var perHourDecimal = per_hour_formula.toFixed(2);
            document.getElementById('rate_per_hour').value = perHourDecimal;
            
    
            //Mins Round Off
    
            //min_hour_formula = (rate_per_hour / 60);
           // var minsDecimal = min_hour_formula.toFixed(3);
    
            document.getElementById('mins').value = rate_per_hour / 60 ;
    
            document.getElementById('basic').value = salary;
    
            document.getElementById('total_basic_salary').value = basic + emolument;
    
    
            //Absence Round Off
    
            absence_hour_formula = (absence * mins);
            var absenceDecimal = absence_hour_formula.toFixed(2);
    
            document.getElementById('total_absence').value = absenceDecimal;
        });
    
    </script>



@endsection
