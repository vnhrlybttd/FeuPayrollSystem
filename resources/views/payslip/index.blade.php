@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payslip</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-money-check-alt"></i> Non Faculty Payslip</li>
    </ol>
</nav>

<div class="container-fluid mb-5">
    <div class="border border-secondary">
        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-money-check-alt text-primary"></i> Non Faculty Payslip
        </h3>


        <hr>



        <div class="row ml-auto">

            <a href="{{('/payslip/create')}}"><button class="btn btn-primary ml-3"><i class="fas fa-plus-circle"></i>
                    Add
                    Payslip</button></a>

                    <a href="{{('/sss_table')}}"><button class="btn btn-primary ml-3"><i class="fas fa-university"></i>
                        SSS Table</button></a>

        </div>

        <hr>




        <div class="container-fluid">

            <div class="table-responsive mb-3">
                <table class="table table-hover table-bordered text-center" id="displayTwo" class="display nowrap">
                    <thead class="thead-dark">
                        <tr>
                             
                            <th>#</th>
                            <th>Employee Name</th>
                            <th>Pay Period</th>
                            <th>Admin's Approval</th>
                            <th class="bg-warning">Payment Status</th>
                            <th>Summary</th>
                            <th class="bg-primary text-white">Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($payslip as $payslipView)
                        <tr>
                           
                            <td>{{$payslipView->employee_id}}</td>
                            <td>{{$payslipView->emp_firstname}} {{$payslipView->emp_lastname}}</td>
                            <td>{{$payslipView->date}}</td>
                            <!--Admin's Approval-->
                            @if($payslipView->admin_approval == 'Approved')
                            <td>
                                <span class="badge badge-success"><i class="far fa-check-square"></i>
                                    Approved</span>
                            </td>
                            @elseif($payslipView->admin_approval == 'Pending')
                            <td>
                                <span class="badge badge-warning"><i class="far fa-hourglass"></i>
                                    Pending </span>
                            </td>
                            @elseif($payslipView->admin_approval == 'Rejected')
                            <td>
                                <span class="badge badge-danger"><i class="far fa-times-alt"></i>
                                    Rejected </span>
                            </td>
                            @endif

                              <td>
                        <div class="row">
                            <div class="col">1st Half Pay</div>
                        </div>
                        @if($payslipView->first_status_pay == 1)<span class="badge badge-success"><i class="fas fa-check-circle text-white"></i> Paid</span>
                        @elseif($payslipView->first_status_pay == 0)
                        <span class="badge badge-danger"><i class="fas fa-check-circle text-white"></i> Not Paid</span>
                        @endif

                        <div class="row">
                                <div class="col">2nd Half Pay</div>
                            </div>
                            @if($payslipView->second_status_pay == 1)<span class="badge badge-success"><i class="fas fa-check-circle text-white"></i> Paid</span>
                            @elseif($payslipView->second_status_pay == 0)
                            <span class="badge badge-danger"><i class="fas fa-check-circle text-white"></i> Not Paid</span>
                            @endif

                    </td>


                            <td> <a class="btn btn-info" href="{{ route('payslip.show',[Crypt::encrypt($payslipView->payslip)]) }}"><i class="fas fa-money-check"></i>  View</a></td>
                            <!--ACTIONS-->
                            <td colspan="2">
                                    <form action="{{ route('payslip.destroy',$payslipView->payslip) }}" method="post">
                                        <a class="btn btn-warning" href="{{action('PayslipPDFController@downloadPDF', $payslipView->payslip)}}" >PDF</a>
                                        <a class="btn btn-primary" href="{{ route('payslip.edit',[Crypt::encrypt($payslipView->payslip)]) }}"><i class="fas fa-edit"></i> Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </form>
                                </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



        </div>


    </div>
</div>







@endsection
