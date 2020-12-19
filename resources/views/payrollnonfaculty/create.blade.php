@extends('layouts.sidemenu')

@section('content')


<div class="shadow p-5">
<h3 class="pt-2 text-secondary text-center"><i class="fas fa-address-card text-primary"></i> Create Payroll
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

<form action="{{route('PayrollNonFaculty.store')}}" method="POST">
@csrf
<label>Date From:</label>
<input class="form-control" type="date" name="date_from">

<label>Date To:</label>
<input class="form-control" type="date" name="date_to">

<div class="form-group">
    <label for="exampleFormControlSelect2">Choose Employee:</label>

    <select multiple class="form-control" id="exampleFormControlSelect2" name="emp_id">
            @foreach ($nonfacultydetails as $view)
    <option value="{{$view->emp_id}}">{{$view->emp_id}}-{{$view->emp_firstname}}{{$view->emp_lastname}}</option>
    @endforeach
    </select>

  </div>

  <a class="btn btn-primary" href="{{ route('PayrollNonFaculty.index') }}"><i class="fas fa-arrow-circle-left"></i>
    Back</a>
<button class="btn btn-success" type="submit">Submit</button>
</form>
</div>

@endsection