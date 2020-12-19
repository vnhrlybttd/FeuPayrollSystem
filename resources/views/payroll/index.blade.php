@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Payroll</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tasks"></i> Manage Payroll</li>
    </ol>
</nav>




<!-- ALERT -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <p>{{ $message }}</p>
</div>
@endif







<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center" id="managePayroll" class="display">
            <thead class="thead-dark">
                <tr>
                    <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                    <th>#</th>
                    <th>Month </th>
                    <th>Year</th>
                    <th>Pay Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payrolls as $payroll)
                <tr>
                    <td></td>
                    <td>{{ $payroll ->id }}</td>
                    <td>{{$payroll ->month}}</td>
                    <td>{{$payroll ->year}}</td>
                    <td>{{$payroll ->paydate}}</td>
                    <td colspan="2">
                            <form action="{{ route('payroll.destroy',$payroll->id) }}" method="post">
                            <a class="btn btn-info" href="{{route('payroll.show',$payroll->id)}}"><i class="fas fa-eye"></i> Show</a>
                                    <a class="btn btn-primary" href="{{ route('payroll.edit',$payroll->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</div>



@endsection
