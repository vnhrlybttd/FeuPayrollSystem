@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payslip Reports</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-file"></i> Non Academic Staff Payslip
        </li>
    </ol>
</nav>
<hr>




<div class="container-fluid">
    <div class="table-responsive">

        <h3 class="pt-2 text-secondary text-center">
            <i class="fas fa-users text-primary"></i> Non Faculty
        </h3>
        <hr>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active bg-success text-white" id="Approved-tab" data-toggle="tab" href="#Approved"
                    role="tab" aria-controls="Approved" aria-selected="true">Approved</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-warning text-white" id="Pending-tab" data-toggle="tab" href="#Pending" role="tab"
                    aria-controls="Pending" aria-selected="false">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-danger text-white" id="Rejected-tab" data-toggle="tab" href="#Rejected" role="tab"
                    aria-controls="Rejected" aria-selected="false">Rejected</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Approved" role="tabpanel" aria-labelledby="Approved-tab">

                <table class="table table-sm table-hover table-bordered text-center" id="NFMasterFile" class="displayOne">
                    <thead class="thead-dark">
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Pay Date</th>
                            <th class="bg-primary">Actions</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($approved as $payslipView)
                        <tr>
                            <td>{{$payslipView->emp_id}}</td>
                            <td>{{$payslipView->emp_firstname}} {{$payslipView->emp_lastname}}</td>
                            <td>{{$payslipView->date}}</td>
                            <td>
                                <a class="btn btn-info"
                                    href="{{ route('NASPayslip.show',[Crypt::encrypt($payslipView->payslip)]) }}"><i
                                        class="fas fa-eye"></i> Payslip Details</a>
                                <a class="btn btn-success"
                                    href="{{ route('NASPayslip.edit',$payslipView->payslip) }}"><i
                                        class="fas fa-check"></i> Change Status</a>
                            </td>
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
                                < class="badge badge-danger"><i class="far fa-times-alt"></i>
                                    Rejected </ span>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="Pending" role="tabpanel" aria-labelledby="Pending-tab">

                <table class="table table-sm table-hover table-bordered text-center" id="NFMasterFile" class="displayOne">
                    <thead class="thead-dark">
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Pay Date</th>
                            <th class="bg-primary">Actions</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payslip as $payslipView)
                        <tr>
                            <td>{{$payslipView->emp_id}}</td>
                            <td>{{$payslipView->emp_firstname}} {{$payslipView->emp_lastname}}</td>
                            <td>{{$payslipView->date}}</td>
                            <td>
                                <a class="btn btn-info"
                                    href="{{ route('NASPayslip.show',[Crypt::encrypt($payslipView->payslip)]) }}"><i
                                        class="fas fa-eye"></i> Payslip Details</a>
                                <a class="btn btn-success"
                                    href="{{ route('NASPayslip.edit',$payslipView->payslip) }}"><i
                                        class="fas fa-check"></i> Payslip Approval</a>
                            </td>
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
                                < class="badge badge-danger"><i class="far fa-times-alt"></i>
                                    Rejected </ span>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="Rejected" role="tabpanel" aria-labelledby="Rejected-tab">

                    <table class="table table-sm table-hover table-bordered text-center" id="NFMasterFile" class="displayOne">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Pay Date</th>
                                    <th class="bg-primary">Actions</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rejected as $payslipView)
                                <tr>
                                    <td>{{$payslipView->emp_id}}</td>
                                    <td>{{$payslipView->emp_firstname}} {{$payslipView->emp_lastname}}</td>
                                    <td>{{$payslipView->date}}</td>
                                    <td>
                                        <a class="btn btn-info"
                                            href="{{ route('NASPayslip.show',[Crypt::encrypt($payslipView->payslip)]) }}"><i
                                                class="fas fa-eye"></i> Payslip Details</a>
                                    </td>
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
                                        <i class="badge badge-danger"><i class="far fa-times-alt"></i>
                                            Rejected </ span>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

            </div>
        </div>



    </div>
</div>

  <!--DATA TABLE JS -->
  <script>
        $(document).ready(function () {
            $('#displayOne').DataTable();
        });
    
    </script>


@endsection
