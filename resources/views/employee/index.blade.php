@extends('layouts.sidemenu')

@section('content')



<h2 style="color:#008349;"> User Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> User Managment</li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-cog"></i> Manage Accounts</li>
    </ol>
</nav>
<div class="row ml-auto">
    <a href="{{('/employee/create')}}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add
            Accounts</button></a>
</div>
<hr>





<section>

    <div class="container-fluid">


        <ul class="nav nav-tabs" id="myTab" role="tablist" data-tab data-options="deep_linking: true">
            <li class="nav-item">
                <a class="nav-link active" id="Active-tab" data-toggle="tab" href="#Active" role="tab"
                    aria-controls="Active" aria-selected="true">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Inactive-tab" data-toggle="tab" href="#Inactive" role="tab"
                    aria-controls="Inactive" aria-selected="false">Inactive</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent" >
            <div class="tab-pane fade show active" id="Active" role="tabpanel" aria-labelledby="Active-tab">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center" id="myTable" class="display">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Employee ID</th>
                                <th>Full Name</th>
                                <th>Account Type</th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->emp_id}}</td>
                                <td>{{$user->first_name}} {{$user->last_name}}</td>

                                <td>{{$user->type}}</td>



                                <td>

                                    <form action="{{ route('employee.destroy',$user->id) }}" method="post">

                                        @if($user->status === 1)
                                        @if($user->type === 'Admin' || $user->type === 'Co-Admin' || $user->type === 'Faculty' || $user->type === 'Non-Faculty' || $user->type === 'HR')
                                            <a class="btn btn-danger"
                                            href={{action('DeactivateController@deactivate',$user->id)}}
                                            onclick="return confirm('Are you sure you want to Deactivate?')">Deactivate</a>
                                            @endif
                                        @elseif($user->status === 0)
                                        <a class="btn btn-danger"
                                        href={{action('DeactivateController@activate',$user->id)}}
                                        onclick="return confirm('Are you sure you want to Activate?')">Activate</a>
                                        @endif
                                        @if($user->type === 'Admin' || $user->type === 'Co-Admin' || $user->type === 'Faculty' || $user->type === 'Non-Faculty' || $user->type === 'HR')
                                        <a class="btn btn-success"
                                            href={{action('ResetPasswordController@reset',$user->id)}}
                                            onclick="return confirm('Are you sure you want to Reset?')">Reset
                                            Password</a>
                                            @endif
                                        <a class="btn btn-primary" href="{{ route('employee.edit',[Crypt::encrypt($user->id)]) }}"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        @csrf

                                    </form>
                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="tab-pane fade" id="Inactive" role="tabpanel" aria-labelledby="Inactive-tab">


                    <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center" id="FONE" class="display">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Employee ID</th>
                                        <th>Full Name</th>
                                        <th>Account Type</th>
                                        <th></th>
        
        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usersTwo as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->emp_id}}</td>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
        
                                        <td>{{$user->type}}</td>
        
        
        
                                        <td>
        
                                            <form action="{{ route('employee.destroy',$user->id) }}" method="post">
                                                    @if($user->status === 1)
                                                    <a class="btn btn-danger"
                                                    href={{action('DeactivateController@deactivate',$user->id)}}
                                                    onclick="return confirm('Are you sure you want to Deactivate?')">Deactivate</a>
                                                @elseif($user->status === 0)
                                                <a class="btn btn-success"
                                                href={{action('DeactivateController@activate',$user->id)}}
                                                onclick="return confirm('Are you sure you want to Activate?')">Activate</a>
                                                @endif
                                                <a class="btn btn-success"
                                                    href={{action('ResetPasswordController@reset',$user->id)}}
                                                    onclick="return confirm('Are you sure you want to Reset?')">Reset
                                                    Password</a>
                                                <a class="btn btn-primary" href="{{ route('employee.edit',[Crypt::encrypt($user->id)]) }}"><i
                                                        class="fas fa-edit"></i> Edit</a>
                                                @csrf
        
                                            </form>
                                        </td>
        
        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        

            </div>
        </div>

        <!-- END OF ALERT -->



    </div>









</section>

<script>

</script>

@endsection
