@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Position</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tasks"></i> Manage Position</li>
    </ol>
</nav>
<hr>

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
        <table class="table table-hover table-bordered text-center" id="myTable" class="display">
            <thead class="thead-dark">
                <tr>
                    <th>Position ID</th>
                    <th>Position Name</th>
                    <th>Total Employees</th>
                    <th>Date Created</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                <tr>
                    <td>{{ $position->id }}</td>
                    <td>{{ $position->position_name }}</td>
                    <td>5</td>
                    <td>{{ $position->created_at }}</td>
                    @if($position->status =='Active')
                    <td>
                        <span class="badge badge-pill badge-success"><i class="far fa-check-square"></i>
                            {{ $position->status }}</span>
                    </td>
                    @else
                    <td>
                        <span class="badge badge-pill badge-danger"><i class="far fa-check-square"></i>
                            {{ $position->status }}</span>
                    </td>
                    @endif

                   <td colspan="2">
                        <form action="{{ route('position.destroy',$position->id) }}" method="post">
                            <a class="btn btn-primary" href="{{ route('position.edit',$position->id) }}"><i class="fas fa-edit"></i>  Edit</a>
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
