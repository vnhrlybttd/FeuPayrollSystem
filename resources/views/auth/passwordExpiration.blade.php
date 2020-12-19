@extends('layouts.app')

@section('content')

<form method="POST" action="{{route('passwordExpiration')}}">
@csrf
<div class="container-fluid p-5">
    <div class="row p-5">
        <div class="col">
            <div class="shadow p-3">





                <h3 class="text-secondary text-center">
                    <i class="fas fa-key text-danger"></i> Password Expired
                </h3>
                <hr>

                @if ($message = Session::get('message'))
                <div class="alert alert-primary">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{ $message }}</p>
                </div>
                @endif
                
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
                <div class="form-group">
                    <label>Current Password</label>
                    <input class="form-control" placeholder="Old Password" name="current_password" type="password">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control" placeholder="New Password" name="password" type="password">
                    
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input class="form-control" placeholder="Confirm New Password" name="new_confirm_password"
                        type="password">
                </div>
                <div class="row justify-content-between">
                    <a class="btn btn-primary text-white ml-3" href="javascript:history.back()" >Go Back</a>
                    <button class="btn btn-success mr-3" type="submit">Save</button>
                </div>

            </div>
        </div>
    </div>
</div>
</form>

@endsection