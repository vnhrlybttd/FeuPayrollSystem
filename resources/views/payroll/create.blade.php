@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payroll</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-calculator"></i> Create Payroll</li>
    </ol>
</nav>
<hr>



<div class="container-fluid">


        <div class="col border border-secondary m-2 shadow p-2 bg-white rounded">
            <h3 class="pt-2 text-secondary text-center"><i class="fas fa-money-bill-wave-alt text-primary"></i> Create
                Payroll
            </h3>
            <hr>

            <!-- START OF FORM -->
        <form action="{{route('payroll.store')}}" method="POST">
                @csrf
                <div class="form-group pl-5 pr-5">
                        <label for="exampleFormControlSelect1">Month</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="month">
                            <option name="January">January</option>
                            <option name="February">February</option>
                            <option name="March">March</option>
                            <option name="April">April</option>
                            <option name="May">May</option>
                            <option name="June">June</option>
                            <option name="July">July</option>
                            <option name="August">August</option>
                            <option name="September">September</option>
                            <option name="October">October</option>
                            <option name="November">November</option>
                            <option name="December">December</option>
                        </select>
                    </div>
                
                <div class="form-group pl-5 pr-5">
                        <label for="exampleInputEmail1">
                            Year
                        </label>
                        <input type="text" class="form-control" placeholder="Enter Year"  name="year" >
                </div>
            
                <div class="form-group pl-5 pr-5">
                        <label>Pay Date</label>
                        <input type="date" class="form-control" id="datePicker" name="paydate">
                    </div>

                <div class="d-flex justify-content-center">
                    <div class="p-1"><button type="button" class="btn btn-primary btn-lg-block"><i
                                class="fas fa-undo"></i> Reset</button></div>
                    <div class="p-1"><button type="submit" class="btn btn-success btn-lg-block"><i
                                class="fas fa-check"></i> Submit</button></div>



                </div>
            </form>
        </div>
    
</div>


@endsection
