@extends('layouts.sidemenu')


@section('content')
<h2 style="color:#008349;"> View Role</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-lock"></i> Role Management</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> View Role</li>
    </ol>
</nav>
<hr>

<div class="container-fluid">
        <div class="row shadow rounded p-4">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
</div>

        </div>
</div>
@endsection