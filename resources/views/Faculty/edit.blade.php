@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> Employee Management</li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Faculty
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Edit Employee</li>
    </ol>
</nav>
<hr>

{!! Form::model($finds, ['method' => 'PATCH','route' => ['Faculty.update', $finds->faculty_salary]]) !!}
@csrf
{{ method_field('PUT') }}

<div class="row justify-content-between">
    <a class="btn btn-primary ml-3" href="{{route('Faculty.index')}}"><i class="fas fa-arrow-circle-left"></i> Back</a>
    
<button type="submit" class="btn btn-success btn-lg-block  mr-3"><i class="fas fa-check-circle"></i>
    Save</button>
</div>

<hr>

<div class="border border-secondary">
    <h3 class="pt-2 text-secondary text-center">
        <i class="fas fa-user text-primary"></i> Employee Information
    </h3>
    <hr>

    @foreach ($EmployeeDetails as $edit)
    <div class="d-flex justify-content-center">

        <div class="d-flex mr-5 bd-highlight">
            <div class="form-group">
                <h5 class="text-primary">Employee ID</h5>
                <h5>{{$edit->emp_pin}}</h5>
            </div>
        </div>

        <div class="d-flex  bd-highlight">
            <div class="form-group">
                <h5 class="text-primary">Full Name</h5>
                <h5>{{$edit->emp_firstname}} {{$edit->emp_lastname}}</h5>
            </div>
        </div>

        <div class="d-flex ml-5 bd-highlight">
            <div class="form-group">
                <h5 class="text-primary">Position</h5>
                <h5>{{$edit->emp_title}}</h5>
            </div>
        </div>
    </div>

    @endforeach

</div>

<div class="row">

    <div class="col">
        <div class="border border-success mt-3">
            <h3 class=" pt-2 text-secondary text-center">
                <i class="fas fa-coins text-success"></i> Total Basic Salary
            </h3>
            <hr>

            <div class="form-group ml-5 mr-5">
                <input type="number" class="form-control form-control-sm bg-success text-white text-center"
                    name="total_basic_salary" value="{{$finds->total_basic_salary}}" id="total_basic_salary" readonly step="any">
            </div>

        </div>
    </div>

    <div class="col">
        <div class="border border-danger mt-3">
            <h3 class=" pt-2 text-secondary text-center">
                <i class="fas fa-stopwatch text-danger"></i> Total Absences Deduction
            </h3>
            <hr>

            <div class="form-group ml-5 mr-5">
                <input type="number" class="form-control form-control-sm bg-danger text-white text-center"
                    name="total_absence" value="{{$finds->total_absence}}" id="total_absence" readonly step="any">
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col">

        <div class="border border-success mt-3 mb-5">
            <h3 class=" pt-2 text-secondary text-center">
                <i class="fas fa-money-check-alt text-success"></i> Salary Details
            </h3>
            <hr>

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Load Units <small class="text-danger">(Maximum 24 Units Only) *</small></strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-clock text-success"></i></span>
                    <input type="number" class="form-control form-control-sm" name="load_units" value="{{$finds->load_units}}"
                        id="load_units" step="any">
                </div>
            </div>

            

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Laboratory Total Units <small class="text-danger"> (3 Units = 5 Hours)</small></strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-clock text-success"></i></span>
                    <input type="number" class="form-control form-control-sm" name="laboratory_units" value="{{$finds->laboratory_units}}"
                        id="laboratory_units" step="any">
                </div>
            </div>

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Laboratory Total Hours</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-clock text-success"></i></span>
                    <input type="number" class="form-control form-control-sm bg-success text-white" name="laboratory_hours" value="{{$finds->laboratory_hours}}"
                        id="laboratory_hours" step="any" readonly>
                </div>
            </div>

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Total Hours</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-clock text-success"></i></span>
                    <input type="number" class="form-control form-control-sm bg-success text-white" name="total_hours" value="{{$finds->total_hours}}"
                        id="total_hours" step="any" readonly>
                </div>
            </div>


            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Rate Per Hour</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-clock text-success"></i></span>
                    <input type="number" class="form-control form-control-sm " name="rate_per_hour" value="{{$finds->rate_per_hour}}"
                        id="rate_per_hour" step="any">
                </div>
            </div>

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Rate Per Hour <small>(old)</small></strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-clock text-success"></i></span>
                    <input type="number" class="form-control form-control-sm " name="rate_per_hour_old" value="{{$finds->rate_per_hour_old}}"
                        id="rate_per_hour_old" step="any">
                </div>
            </div>

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">mins</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-clock text-success"></i></span>
                    <input type="number" class="form-control form-control-sm bg-success text-white" name="mins" value="{{$finds->mins}}" id="mins" step="any" readonly>
                </div>
            </div>




            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Daily Rate</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-percent text-success"></i></span>
                    <input type="number" class="form-control form-control-sm bg-success text-white" name="daily_rate" value="{{$finds->daily_rate}}"
                        id="daily_rate" step="any" readonly>
                </div>
            </div>

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Salary</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-ruble-sign text-success"></i></span>
                    <input type="number" class="form-control form-control-sm bg-success text-white" name="salary" value="{{$finds->salary}}"
                        id="salary" step="any" readonly>
                </div>
            </div>

            <hr>

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Basic</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-ruble-sign text-success"></i></span>
                    <input type="number" class="form-control form-control-sm bg-success text-white" name="basic" value="{{$finds->basic}}" id="basic" step="any" readonly>
                </div>
            </div>

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Emolument</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-ruble-sign text-success"></i></span>
                    <input type="number" class="form-control form-control-sm bg-success text-white" name="emolument" value="{{$finds->emolument}}"
                        id="emolument" step="any" readonly>
                </div>
            </div>

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Over Load</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-clock text-success"></i></span>
                    <input type="number" class="form-control form-control-sm bg-success text-white" name="overload" value="{{$finds->overload}}"
                        id="overload" step="any" readonly>
                </div>
            </div>

            <hr>





        </div>

    </div>



    <div class="col">
        <div class="border border-danger mt-3">
            <h3 class=" pt-2 text-secondary text-center">
                <i class="fas fa-user-clock text-danger"></i> Absences/Lates
            </h3>
            <hr>

            

            <div class="form-group ml-5 mr-5">
                <strong for="exampleInputEmail1">Absence / Lates (mins)</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-danger bg-white"><i
                            class="fas fa-clock text-danger"></i></span>
                    <input type="number" class="form-control form-control-sm bg-danger text-white" name="absence" value="{{$finds->absence}}"
                        id="absence" step="any" readonly>
                </div>
            </div>

        </div>



    </div>

    {!! Form::close() !!}

   

          
       
            
           
         

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
            document.getElementById('laboratory_hours').value = total_hours_formula = (laboratory_units * 5) / 3;

            //Total Hours
            document.getElementById('total_hours').value = (load_units - laboratory_units) + laboratory_hours;

            

          

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
