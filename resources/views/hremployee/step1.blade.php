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

<div class="row justify-content-between">
    <!-- Button trigger modal -->
    <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i>
        Back</a>
</div>


<hr>

<br>

<form method="POST" action={{ action('HRNFController@submit') }}>
    @csrf
    <section>
        <div class="container-fluid mb-5">


           

            <div class="label">
                <h5 class="text-danger">STEP 2</h5>
            </div>
            <div class="row mb-2 bg-white shadow">
                <div class="col border border-info">
                    <h3 class="pt-2 text-secondary text-center"><i class="fas fa-user text-primary"></i> Basic
                        Personal Record
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


                    @foreach ($employee as $view)


                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <div class="label bold">Employee ID</div>
                                <input value="{{$view->emp_pin}}" class="form-control" readonly name="emp_id">
                            </div>
                        </div>

                        <div class="col">
                                <div class="form-group">
                                    <div class="label bold">Cost Center</div>
                                    <select name="cost_center" class="form-control" required>
                                        @foreach ($cost_center as $cost_view)
                                    <option value="{{$cost_view->cc_name}}">{{$cost_view->cc_name}}</option>
                                        @endforeach
                                      
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                    <div class="form-group">
                                        <div class="label bold">Employement Status</div>
                                        <select name="employment_status" class="form-control" required>
                                            <option value="Full-Time">Full-Time</option>
                                            <option value="Part-Time">Part-Time</option>
                                            <option value="Probationary">Probationary</option>
                                        </select>
                                    </div>
                                </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col">
                            <div class="label">First Name</div>
                            <input placeholder="{{$view->emp_firstname}}" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <div class="label">Middle Name</div>
                            <input placeholder="Middle Name" class="form-control" name="middle_name" required>
                        </div>
                        <div class="col">
                            <div class="label">Last Name</div>
                            <input placeholder="{{$view->emp_lastname}}" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col">
                            <div class="label">Birthday</div>
                            <input placeholder="{{date('M. d,Y',strtotime($view->emp_birthday))}}" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <div class="label">Email Address</div>
                            <input placeholder="{{$view->emp_email}}" class="form-control" readonly>
                        </div>
                   
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="label">SSS Number </div>
                                <input placeholder="Ex. SSS-00-0000000-0" class="form-control" name="sss_number" required>
                                <small class="text-danger">(SSS-00-0000000-0)</small>
                         
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="label">Philhealth Number </div>
                                <input placeholder="PHIL-00-00000000-00" class="form-control" name="philhealth_number" required>
                                <small class="text-danger">(PHIL-00-00000000-00)</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="label">Pag-Ibig Number </div>
                                <input placeholder="HDMF-0000-0000-0000" class="form-control" name="pagibig_number" required>
                                <small class="text-danger">(HDMF-0000-0000-0000)</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="label">TIN </div>
                                <input placeholder="TIN-000-000-000-000" class="form-control" name="tin_number" required>
                                <small class="text-danger">(TIN-000-000-000-000)</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="label">BPI Account</div>
                            <input class="form-control" placeholder="BPI Accounts" name="bpi_account" required>
                        </div>
                    </div>


                    @endforeach

                    <hr>
                    <div class="row justify-content-end mr-0 mt-2 mb-2">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>

                </div>
            </div>

        </div>






</div>
</section>
</form>


@endsection