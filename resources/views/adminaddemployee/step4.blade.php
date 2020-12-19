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
                    <small class="text-success">Overview</small> <i class="fas fa-address-book text-success"></i>
                </div>

    </div>

</div>
<hr>

<form method="POST" action={{ action('AddEmployeeNFController@addEmployee') }} onsubmit="document.getElementById('btnSubmit').disabled=true;">
    @csrf
    <section>
        <div class="container-fluid mb-5">




            <div class="label">
                <h5 class="text-danger">STEP 3</h5>
            </div>
            <div class="row mb-2 bg-white shadow">
                <div class="col border border-info">
                    <h3 class="pt-2 text-secondary text-center"><i class="fas fa-address-book text-primary"></i>
                        Overview
                    </h3>
                    <hr>

                    @foreach ($employee as $view)


                    <div class="row">
                        <div class="col">
                                <h3 class="pt-2 text-secondary text-center">
                                        <i class="fas fa-user text-primary"></i> Basic Personal Record
                                    </h3>
                                    <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="label">Employee ID</div>
                                        <label readonly>{{$view->emp_pin}} </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <div class="label">Cost Center</div>
                                        <label readonly>{{Session::get('addemployee')->cost_center}} </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <div class="label">Employment Status</div>
                                        <label readonly>{{Session::get('addemployee')->employment_status}} </label>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col">
                                    <div class="label">First Name</div>
                                    <label readonly>{{$view->emp_firstname}} </label>
                                </div>
                                <div class="col">
                                    <div class="label">Middle Name</div>
                                    <label readonly>{{Session::get('addemployee')->middle_name}} </label>
                                </div>
                                <div class="col">
                                    <div class="label">Last Name</div>
                                    <label readonly>{{$view->emp_lastname}} </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="label">Birthday</div>
                                    <label readonly>{{date('M. d,Y',strtotime($view->emp_birthday))}} </label>

                                </div>
                                <div class="col">
                                    <div class="label">Email Address</div>
                                    <label readonly>{{$view->emp_email}} </label>

                                </div>
                            </div>
<hr>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="label">SSS Number </div>
                                        <label readonly>{{Session::get('addemployee')->sss_number}} </label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="label">Philhealth Number </div>
                                        <label readonly>{{Session::get('addemployee')->philhealth_number}} </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="label">Pag-Ibig Number </div>

                                        <label readonly>{{Session::get('addemployee')->pagibig_number}} </label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="label">TIN </div>

                                        <label readonly>{{Session::get('addemployee')->tin_number}} </label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col">
                                        <div class="label">BPI Account</div>
                                        <label readonly>{{Session::get('addemployee')->bpi_account}} </label>
                                    </div>
                                </div>
            


                        </div>
                        <div class="col">
                                <h3 class="pt-2 text-secondary text-center">
                                        <i class="fas fa-coins text-primary"></i> Basic Salary Details
                                    </h3>
                                    <hr>
                                <div class="form-group text-center">
                                        <div class="label"><strong>Salary</strong></div>
                                        <h5 class="text-primary">{{Session::get('addemployee')->salary}}</h5>
                                        <div class="label"><strong>Daily Rate</strong></div>
                                        <h5 class="text-primary">{{Session::get('addemployee')->daily_rate}}</h5>
                                        <div class="label"><strong>Rate per Hour</strong></div>
                                        <h5 class="text-primary">{{Session::get('addemployee')->rate_per_hour}}</h5>
                                        <div class="label"><strong>mins</strong></div>
                                        <h5 class="text-primary">{{Session::get('addemployee')->mins}}</h5>
                                        <div class="label"><strong>Basic</strong></div>
                                        <h5 class="text-primary">{{Session::get('addemployee')->basic}}</h5>
                                        <div class="label"><strong>Emolument</strong></div>
                                        <h5 class="text-primary">{{Session::get('addemployee')->emolument}}</h5>
                                        <div class="label"><strong>Total Basic Salary</strong></div>
                                        <h5 class="text-primary">{{Session::get('addemployee')->total_basic_salary}}</h5>
                                    </div>

                        </div>
                    </div>





                  

                    @endforeach

                    <hr>
                    <div class="row justify-content-end mr-0 mt-2 mb-2">
                        <button class="btn btn-success" type="submit" id="btnSubmit">Submit</button>
                    </div>

                </div>
            </div>

        </div>






        </div>
    </section>
</form>


@endsection
