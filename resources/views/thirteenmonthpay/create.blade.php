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
        </h3>


        <hr>

        <div class="container-fluid">
        <form  action="{{route('ThirteenMonthPay.store')}}" method="POST">
            @csrf

                <div class="row justify-content-center">
                    <div class="col">
                        <div class="form-group p-2">
                            <label>Employee ID:<label>
                                    <select class="form-control" name="emp_id">
                                        @foreach ($employeePayslip as $item)
                                    <option value="{{$item->emp_id}}">{{$item->emp_id}} - {{$item->name}}</option>
                                        @endforeach
                                    </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group p-2">
                            <label>Date From:<label>
                                    <input class="form-control" type="date" name="date_from">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group p-2">
                            <label>Date To:<label>
                                    <input class="form-control" type="date" name="date_to">
                        </div>

                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <button class="btn btn-primary" type="submit">Generate</button>
                </div>
            </form>
        </div>


        @endsection
