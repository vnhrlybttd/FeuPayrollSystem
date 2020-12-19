@extends('layouts.sidemenu')


@section('content')


<h2 style="color:#008349;"> View User</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-cog"></i> Users Management</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> View User</li>
    </ol>
</nav>
<hr>


       

<div class="container-fluid">
<div class="row shadow rounded p-4">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->first_name }} {{ $user->last_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
    </div>
</div>

</div>
@endsection