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
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Edit Employee</li>
    </ol>
</nav>
<hr>

{!! Form::model($finds, ['method' => 'PATCH','route' => ['NonFaculty.update', $finds->non_salary]]) !!}
@csrf
{{ method_field('PUT') }}

<div class="row justify-content-between">
    <a class="btn btn-primary ml-3" href="{{route('NonFaculty.index')}}"><i class="fas fa-arrow-circle-left"></i> Back</a>
    
<button type="submit" class="btn btn-success btn-lg-block mr-3"><i class="fas fa-check-circle"></i>
    Save</button>
</div>

<hr>



<div class="border border-secondary">
    <h3 class="pt-2 text-secondary text-center">
        <i class="fas fa-user text-primary"></i> Employee Information
    </h3>
    <hr>

    @foreach ($EmployeeDetails->where('non_salary',$finds->non_salary) as $edit)
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
            <input type="number" class="form-control form-control-sm bg-success text-white text-center" name="total_basic_salary" value="{{$finds->total_basic_salary}}"
                    id="total_basic_salary" readonly step="any">
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
                <input type="number" class="form-control form-control-sm bg-danger text-white text-center" name="total_absence" value="{{$finds->total_absence}}"
                    id="total_absence" readonly step="any">
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
                <strong for="exampleInputEmail1">Salary</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-ruble-sign text-success"></i></span>
                    <input type="number" class="form-control form-control-sm" name="salary" value="{{$finds->salary}}"
                        id="salary" step="any">
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
                <strong for="exampleInputEmail1">Per Hour</strong>
                <div class="input-group-prepend">
                    <span class="input-group-text border border-success bg-white"><i
                            class="fas fa-clock text-success"></i></span>
                    <input type="number" class="form-control form-control-sm bg-success text-white" name="rate_per_hour" value="{{$finds->rate_per_hour}}"
                        id="rate_per_hour" step="any" readonly>
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
                    <input type="number" class="form-control form-control-sm" name="emolument" value="{{$finds->emolument}}"
                        id="emolument" step="any">
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
