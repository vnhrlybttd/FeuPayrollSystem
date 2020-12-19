@extends('layouts.sidemenu')


@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
          <h2 style="color:#008349;">Users Management</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                        href="{{'/home'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-cog"></i> Manage Users</li>
            </ol>
        </nav>
        </div>
     
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Account Type</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
  <td>{{$user->type}}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
      @if ($user->type === "Super Admin")
      <a class="btn btn-success"
      href={{action('ResetController@reset',$user->id)}}
      onclick="return confirm('Are you sure you want to Reset?')">Reset
      Password</a>
      @endif
      
     
   
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


@endsection