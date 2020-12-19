@extends('layouts.sidemenu')

@section('content')

<h2 style="color:#008349;"> Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Edit</li>
    </ol>
</nav>
<hr>

<div class="container-fluid">


    <div class="row justify-content-between">
        <!-- Button trigger modal -->
    <a class="btn btn-primary" href="{{action('AddEmployeeNFController@index')}}"><i class="fas fa-arrow-circle-left"></i>
            Back</a>



    </div>

    <hr>
    <div class="container-fluid">
        <div class="shadow bg-white mb-5 pb-3">
            <h3 class="pt-2 text-secondary text-center">
                <i class="fas fa-user-check text-primary"></i> Edit Employee
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




            {!! Form::model($find, ['method' => 'PATCH','route' => ['AddEmployeeNF.update', $find->add_id]]) !!}
            @csrf


            <div class="row p-3">
                <div class="col-7">

                    <h3 class="pt-2 text-secondary text-center">
                        <i class="fas fa-user text-primary"></i> Basic Personal Record
                    </h3>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="label bold">Employee ID</div>
                                <input value="{{$find->emp_id}}" class="form-control" readonly name="emp_id">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="label bold">Cost Center</div>
                                <select name="cost_center" class="form-control" required>
                                    @foreach ($cost_center as $cost_view)
                                    <option value="{{$cost_view->cc_name}}"
                                        {{$find->cost_center == $cost_view->cc_name ? 'selected="selected"' : ''}}>
                                        {{$cost_view->cc_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="label bold">Employement Status</div>
                                {!! Form::select('employment_status',['Full-Time' =>
                                'Full-Time','Part-Time'=>'Part-Time','Probationary'=>'Probationary'],null, array('class'
                                =>
                                'form-control'));
                                !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col">
                            <div class="label bold">First Name</div>
                            <input value="{{$find->emp_firstname}}" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <div class="label bold">Middle Name</div>
                            <input value="{{$find->middle_name}}" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <div class="label">Last Name</div>
                            <input value="{{$find->emp_lastname}}" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col">
                            <div class="label bold">SSS Number</div>
                            <input value="{{$find->sss_number}}" class="form-control" name="sss_number">
                        </div>
                        <div class="col">
                            <div class="label bold">Philhealth</div>
                            <input value="{{$find->philhealth_number}}" class="form-control" name="philhealth_number">
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col">
                            <div class="label bold">Pag-IBIG Number</div>
                            <input value="{{$find->pagibig_number}}" class="form-control" name="pagibig_number">
                        </div>
                        <div class="col">
                            <div class="label bold">TIN Number</div>
                            <input value="{{$find->tin_number}}" class="form-control" name="tin_number">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <div class="label bold">BPI Account</div>
                            <input value="{{$find->bpi_account}}" class="form-control" name="bpi_account">
                        </div>
                    </div>





                </div>
                <div class="col-5">

                    <h3 class="pt-2 text-secondary text-center">
                        <i class="fas fa-coins text-primary"></i> Basic Salary Details
                    </h3>
                    <hr>

                    <div class="form-group">
                        <div class="label"><strong>Salary</strong></div>
                        <input value="{{$find->salary}}" class="form-control" name="salary" id="salary">
                        <div class="label"><strong>Daily Rate</strong></div>
                        <input value="{{$find->daily_rate}}" class="form-control" name="daily_rate" id="daily_rate" readonly>
                        <div class="label"><strong>Rate per Hour</strong></div>
                        <input value="{{$find->rate_per_hour}}" class="form-control" name="rate_per_hour"
                            id="rate_per_hour" readonly>
                        <div class="label"><strong>mins</strong></div>
                        <input value="{{$find->mins}}" class="form-control" name="mins" id="mins" readonly>
                        <div class="label"><strong>Basic</strong></div>
                        <input value="{{$find->basic}}" class="form-control" name="basic" id="basic" readonly>
                        <div class="label"><strong>Emolument</strong></div>
                        <input value="{{$find->emolument}}" class="form-control" name="emolument" id="emolument">
                        <hr>
                        <div class="label"><strong>Total Basic Salary</strong></div>
                        <input value="{{$find->total_basic_salary}}" class="form-control" name="total_basic_salary"
                            id="total_basic_salary" readonly>
                    </div>

                </div>
            </div>

            <hr>

            <div class="row justify-content-end mr-3 mt-2">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>

            </form>


        </div>
    </div>


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
            daily_rate_formula = (salary * 12) / 262;
            var twoDecimal = daily_rate_formula.toFixed(2);
            document.getElementById('daily_rate').value = twoDecimal;

            //Per Hour Round Off
            per_hour_formula = (daily_rate / 8);
            var perHourDecimal = per_hour_formula.toFixed(2);
            document.getElementById('rate_per_hour').value = perHourDecimal;


            //Mins Round Off

            //min_hour_formula = (rate_per_hour / 60);
            // var minsDecimal = min_hour_formula.toFixed(3);

            document.getElementById('mins').value = rate_per_hour / 60;

            document.getElementById('basic').value = salary;

            document.getElementById('total_basic_salary').value = basic + emolument;


            //Absence Round Off

            absence_hour_formula = (absence * mins);
            var absenceDecimal = absence_hour_formula.toFixed(2);

            document.getElementById('total_absence').value = absenceDecimal;
        });

    </script>

    @endsection
