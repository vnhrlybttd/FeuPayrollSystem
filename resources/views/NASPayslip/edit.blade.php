@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payslip Reports</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-check"></i> Payslip Approval</li>
    </ol>
</nav>
<hr>

<div class="container-fluid">
    <div class="shadow bg-white">

            <h3 class="pt-2 text-secondary text-center">
                    <i class="fas fa-user text-primary"></i> Payslip Approval
                </h3>
                <hr>

                
                <div class="p-5">
            {!! Form::model($finds, ['method' => 'PATCH','route' => ['NASPayslip.update', $finds->payslip]]) !!}

            <div class="form-group">
                   <label>Employee ID:</label>
                    {{$finds->employee_id}}
                </div>

                <div class="form-group">
                        <label>Payslip Number:</label>
                         {{$finds->payslip}}
                     </div>

            <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Type:</strong>
                                {!! Form::select('admin_approval', array('Approved' => 'Approve','Rejected' => 'Reject','Pending'=>'Pending'), 'Approve');
                                !!}
                            </div>
                        </div>
            </div>

            <a class="btn btn-primary" href="{{route('NASPayslip.index')}}"><i class="fas fa-arrow-circle-left"></i> Back</a>
            <button class="btn btn-success" type="submit">Submit</button>
            
            
            {!! Form::close() !!}
                </div>

    </div>
</div>



@endsection
