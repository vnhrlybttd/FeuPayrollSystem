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
    <a class="btn btn-primary" href="{{action('AddEmployeeFController@index')}}"><i class="fas fa-arrow-circle-left"></i>
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




            {!! Form::model($find, ['method' => 'PATCH','route' => ['AddEmployeeF.update', $find->add_id]]) !!}
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
                                <select name="cost_center" class="form-control" required readonly>
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
                                'form-control' ,'readonly'));
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
                            <input value="{{$find->sss_number}}" class="form-control" name="sss_number" readonly>
                        </div>
                        <div class="col">
                            <div class="label bold">Philhealth</div>
                            <input value="{{$find->philhealth_number}}" class="form-control" name="philhealth_number" readonly>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col">
                            <div class="label bold">Pag-IBIG Number</div>
                            <input value="{{$find->pagibig_number}}" class="form-control" name="pagibig_number" readonly>
                        </div>
                        <div class="col">
                            <div class="label bold">TIN Number</div>
                            <input value="{{$find->tin_number}}" class="form-control" name="tin_number" readonly>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <div class="label bold">BPI Account</div>
                            <input value="{{$find->bpi_account}}" class="form-control" name="bpi_account" readonly>
                        </div>
                    </div>





                </div>
                <div class="col-5">

                    <h3 class="pt-2 text-secondary text-center">
                        <i class="fas fa-coins text-primary"></i> Basic Salary Details
                    </h3>
                    <hr>

                    <div class="form-group">
                            <div class="label"><strong>Work Hours</strong></div>
                            <input value="{{$find->load_units}}" class="form-control" name="load_units" id="load_units" min="0" max="24  " type="number">
                            <div class="label"><strong>Additional Hours</strong></div>
                            <input value="{{$find->additional_hours}}" class="form-control" name="additional_hours" id="additional_hours" min="0" max="24">
                            <div class="label"><strong>Total Hours</strong></div>
                            <input value="{{$find->total_hours}}" class="form-control" name="total_hours" id="total_hours" readonly>
                        <!--
                        <div class="label"><strong>Load Units</strong></div>
                        <input value="{{$find->load_units}}" class="form-control" name="load_units" id="load_units">
                        <div class="label"><strong>Laboratory Total Units</strong></div>
                        <input value="{{$find->laboratory_units}}" class="form-control" name="laboratory_units" id="laboratory_units" >
                        <div class="label"><strong>Laboratory Total Hours</strong></div>
                        <input value="{{$find->laboratory_hours}}" class="form-control bg-primary text-white" name="laboratory_hours" id="laboratory_hours" readonly>
                        <div class="label"><strong>Total Hours</strong></div>
                        <input value="{{$find->total_hours}}" class="form-control bg-primary text-white" name="total_hours" id="total_hours" readonly>
                                  -->
                        <div class="label"><strong>Rate Per Hour</strong></div>
                        <input value="{{$find->rate_per_hour}}" class="form-control" name="rate_per_hour" id="rate_per_hour">
                        <div class="label"><strong>Rate Per Hour <small>(old)</small></strong></div>
                        <input value="{{$find->rate_per_hour_old}}" class="form-control" name="rate_per_hour_old" id="rate_per_hour_old">
                        <div class="label"><strong>mins</strong></div>
                        <input value="{{$find->mins}}" class="form-control bg-primary text-white" name="mins" id="mins" readonly>
                        <div class="label"><strong>Daily Rate</strong></div>
                        <input value="{{$find->daily_rate}}" class="form-control bg-primary text-white" name="daily_rate" id="daily_rate" readonly>
                        <div class="label"><strong>Salary</strong></div>
                        <input value="{{$find->salary}}" class="form-control bg-primary text-white" name="salary" id="salary" readonly>
                        <div class="label"><strong>Basic</strong></div>
                        <input value="{{$find->basic}}" class="form-control bg-primary text-white" name="basic" id="basic" readonly>
                        <div class="label"><strong>Emolument</strong></div>
                        <input value="{{$find->emolument}}" class="form-control bg-primary text-white" name="emolument" id="emolument" readonly>
                        <div class="label"><strong>Over Load</strong></div>
                        <input value="{{$find->overload}}" class="form-control bg-primary text-white" name="overload" id="overload"readonly>
                        <hr>
                        <div class="label"><strong>Total Basic Salary</strong></div>
                        <input value="{{$find->total_basic_salary}}" class="form-control bg-primary text-white text-center" name="total_basic_salary"
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
                var total_hours = Number($('#total_hours').val());
                var additional_hours = Number($('#additional_hours').val());
                //var work_hours = Number($('#work_hours').val());
    
    
             
                //document.getElementById('load_units').value = parseInt(24);

                if(load_units > 24){
                    document.getElementById('load_units').value = parseInt(24);
                }
                

                
                
                document.getElementById('total_hours').value = load_units + additional_hours;
    
                //Laboratory Total Hours
                //document.getElementById('laboratory_hours').value = total_hours_formula = (laboratory_units * 5) / 3;
    
                //Total Hours
                //document.getElementById('total_hours').value = (load_units - laboratory_units) + laboratory_hours;
    
                

               
              
    
                //Mins
                mins_formula = rate_per_hour / 60;
                var mins_decimal = mins_formula.toFixed(2);
                document.getElementById('mins').value = mins_decimal;
    
                
    
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
                var basic_decimal = basic_formula = basic_formula.toFixed(2);
                document.getElementById('basic').value = basic_decimal;
    
                document.getElementById('total_basic_salary').value = basic + emolument;
    
                //Daily Rate
                daily_rate_formula = (total_basic_salary * 12) / 262;
                var daily_rate_Decimal = daily_rate_formula.toFixed(2);
                document.getElementById('daily_rate').value = daily_rate_Decimal;


                if(total_hours > 24){
                      //Over Load
                      over_load_formula = salary_formula - basic_formula - emolument_formula;
                var over_load_decimal = over_load_formula.toFixed(2);
                document.getElementById('overload').value = over_load_decimal;
                }else{
                    document.getElementById('overload').value = 0 ;
                }
    
                
               
    
    
            });
    
        </script>

    @endsection
