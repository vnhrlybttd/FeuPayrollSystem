@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Add Employee</li>
    </ol>
</nav>
<hr>

<div class="container-fluid">


    <div class="row justify-content-between">
        <!-- Button trigger modal -->
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
            Back</a>

        <div class="mt-2 pl-2 rounded shadow">
            <small class="text-success">Choose Employee</small> <i class="fas fa-user-tie text-success"> / </i>
            <small class="text-success">Basic Personal Record</small> <i class="fas fa-user text-success"></i> /
            <small class="text-success">Basic Salary Details</small> <i class="fas fa-coins text-success"></i> /
            <small class="text-secondary">Overview</small> <i class="fas fa-address-book text-secondary"></i>
        </div>

    </div>

</div>
<hr>

<form method="POST" action={{ action('AddEmployeeFController@stepFour') }}>
    @csrf
    <section>
        <div class="container-fluid mb-5">




            <div class="label">
                <h5 class="text-danger">STEP 3</h5>
            </div>
            <div class="row mb-2 bg-white shadow">
                <div class="col border border-info">
                    <h3 class="pt-2 text-secondary text-center"><i class="fas fa-coins text-primary"></i> Basic Salary
                        Details
                    </h3>
                    <hr>

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
                                <h5>{{Session::get('addemployee')->emp_id}}</h5>
                            </div>
                        </div>

                    </div>


                    <hr>

                    <div class="border border-success mt-3 mb-5">
                        <h3 class=" pt-2 text-secondary text-center">
                            <i class="fas fa-coins text-success"></i> Total Basic Salary
                        </h3>
                        <hr>

                        <div class="form-group ml-5 mr-5">
                            <input type="number" class="form-control form-control-sm bg-success text-white text-center"
                                name="total_basic_salary" id="total_basic_salary" readonly step="any" value="0" required>
                        </div>

                    </div>

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Load Units <small class="text-danger">
                                </small></strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-clock text-success"></i></span>
                            <input type="number"  class="form-control form-control-sm" name="load_units"
                                id="load_units" step="any" value="0" required >
                        </div>
                    </div>


<!--
                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Laboratory Total Units <small class="text-danger"> (3 Units = 5
                                Hours)</small></strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-clock text-success"></i></span>
                            <input type="number" class="form-control form-control-sm" name="laboratory_units"
                          id="laboratory_units" step="3" value="0" min="0" max="100">
                        </div>
                    </div>

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Laboratory Total Hours</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-clock text-success"></i></span>
                            <input type="number" class="form-control form-control-sm bg-success text-white"
                                name="laboratory_hours" id="laboratory_hours"
                                step="any" readonly value="0" required>
                        </div>
                    </div>

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Total Hours</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-clock text-success"></i></span>
                            <input type="number" class="form-control form-control-sm bg-success text-white"
                                name="total_hours"  id="total_hours" step="any" readonly value="0" required>
                        </div>
                    </div>
                -->

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Rate Per Hour</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-clock text-success"></i></span>
                            <input type="number" class="form-control form-control-sm " name="rate_per_hour"
                                id="rate_per_hour" step="any" value="0">
                        </div>
                    </div>

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Rate Per Hour <small>(old)</small></strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-clock text-success"></i></span>
                            <input type="number" class="form-control form-control-sm " name="rate_per_hour_old"
                                id="rate_per_hour_old" step="any" value="0">
                        </div>
                    </div>

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">mins</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-clock text-success"></i></span>
                            <input type="number" class="form-control form-control-sm bg-success text-white" name="mins"
                               id="mins" step="any" readonly value="0" required>
                        </div>
                    </div>




                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Daily Rate</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-percent text-success"></i></span>
                            <input type="number" class="form-control form-control-sm bg-success text-white"
                                name="daily_rate"  id="daily_rate" step="any" readonly value="0" required>
                        </div>
                    </div>

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Salary</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-ruble-sign text-success"></i></span>
                            <input type="number" class="form-control form-control-sm bg-success text-white"
                                name="salary"  id="salary" step="any" readonly value="0" required>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Basic</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-ruble-sign text-success"></i></span>
                            <input type="number" class="form-control form-control-sm bg-success text-white" name="basic"
                            id="basic" step="any" readonly value="0" required>
                        </div>
                    </div>

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Emolument</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-ruble-sign text-success"></i></span>
                            <input type="number" class="form-control form-control-sm bg-success text-white"
                                name="emolument"  id="emolument" step="any" readonly value="0" required>
                        </div>
                    </div>

                    <div class="form-group ml-5 mr-5">
                        <strong for="exampleInputEmail1">Over Load</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text border border-success bg-white"><i
                                    class="fas fa-clock text-success"></i></span>
                            <input type="number" class="form-control form-control-sm bg-success text-white"
                                name="overload"  id="overload" step="any" readonly value="0" required>
                        </div>
                    </div>

                    <hr>
                    <div class="row justify-content-end mr-0 mt-2 mb-2">
                        <button class="btn btn-success" type="submit">Proceed</button>
                    </div>

                </div>
            </div>

        </div>






        </div>
    </section>
</form>

    

<script>



        $('input').keyup(function () { // run anytime the value changes

            var load_units = Number($('#load_units').val());
            var laboratory_units = Number($('#laboratory_units').val());
            var laboratory_hours = Number($('#laboratory_hours').val());
            var total_hours = Number($('#total_hours').val());
            var rate_per_hour = Number($('#rate_per_hour').val());
            var rate_per_hour_old = Number($('#rate_per_hour_old').val());
            var mins = Number($('#mins').val());
            var salary = Number($('#salary').val());
            var daily_rate = Number($('#daily_rate').val());
            var basic = Number($('#basic').val());
            var emolument = Number($('#emolument').val());
            var overload = Number($('#overload').val());
            var absence = Number($('#absence').val());
            var total_basic_salary = Number($('#total_basic_salary').val());
            var total_absence = Number($('#total_absence').val());

           if(load_units > 25){
            document.getElementById('load_units').value = parseInt(24);
           }

            //Laboratory Total Hours
           // document.getElementById('laboratory_hours').value = total_hours_formula = (laboratory_units * 5) / 3;

            //Total Hours
            //document.getElementById('total_hours').value = (load_units - laboratory_units) + laboratory_hours;

            

          

            //Mins
            //mins_formula = 
            //var mins_decimal = mins_formula.toFixed(3);
            document.getElementById('mins').value = rate_per_hour / 60;

            

            //Salary
            salary_formula = (rate_per_hour * total_hours * 18)  / 5;
            var salary_decimal = salary_formula.toFixed(2);
            document.getElementById('salary').value = salary_decimal;

            //Basic
            document.getElementById('basic').value = (rate_per_hour_old * rate_per_hour * 18) /5;


            //Emolument
            emolument_formula = (rate_per_hour - rate_per_hour_old) * load_units * 18 / 5;
            var emolument_decimal = emolument_formula.toFixed(2);
            document.getElementById('emolument').value = emolument_decimal;

            //Over Load Computation

            

            basic_formula = (rate_per_hour_old * load_units) * 18 / 5;
            var basic_decimal = basic_formula;
            document.getElementById('basic').value = basic_decimal;

            document.getElementById('total_basic_salary').value = basic + emolument;

            //Daily Rate
            daily_rate_formula = (total_basic_salary * 12) / 262;
            var daily_rate_Decimal = daily_rate_formula.toFixed(2);
            document.getElementById('daily_rate').value = daily_rate_Decimal;

            //Over Load
            over_load_formula = salary - total_basic_salary;
            var over_load_decimal = over_load_formula.toFixed(2);
            document.getElementById('overload').value = over_load_decimal;
            
            //Absence Round Off

            absence_hour_formula = (absence * mins);
            var absenceDecimal = absence_hour_formula.toFixed(2);

            document.getElementById('total_absence').value = absenceDecimal;


        });

    </script>

@endsection
