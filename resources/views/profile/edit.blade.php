@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Profile</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Profile</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-key"></i> Change Password</li>
    </ol>
</nav>
<hr>
{!! Form::model($finds, ['method' => 'PATCH','route' => ['profile.update', $finds->id]]) !!}
@csrf
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="shadow p-3">


                @if (count($errors) > 0)
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



                <h3 class="text-secondary text-center">
                    <i class="fas fa-key text-primary"></i> Change Password
                </h3>
                <hr>
                <div class="form-group">
                    <label>Old Password</label>
                    <input class="form-control" placeholder="Old Password" name="current_password" type="password">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control" placeholder="New Password" name="new_password" type="password">
                    
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input class="form-control" placeholder="Confirm New Password" name="new_confirm_password"
                        type="password">
                </div>
                <div class="row justify-content-between">
                    <a class="btn btn-primary text-white ml-3" href="{{('/profile')}}">Go Back</a>
                    <button class="btn btn-success mr-3" type="submit">Save</button>
                </div>

            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection
