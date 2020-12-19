@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Profile</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Profile</li>
    </ol>
</nav>
<hr>

<style>
    .avatar {
        vertical-align: middle;
        border-radius: 50%;
    }

    "

</style>



@foreach ($profile as $view)
<div class="container-fluid">


    <div class="row">
        <div class="col-12 col-sm-12 col-lg-4 shadow p-3 mr-5">
            <div class="row justify-content-center wrapper">
                ​<picture>
                    <img class="img-responsive img-thumbnail rounded-circle" src={{url("img/tamtam.png")}} alt="Photo"
                        class="avatar" height="150" width="150">
                </picture>
            </div>
            <div class="row justify-content-center">
                <h5 class="text-success">{{$view->emp_firstname}} {{$view->emp_lastname}}</h5>
            </div>
            <div class="row justify-content-center">
                <small>Employee ID: {{$view->emp_pin}}</small>
            </div>
            <div class="row justify-content-center">
                <small>Position: {{$view->emp_title}}</small>
            </div>
        
        </div>
        <div class="col-12 col-sm-12 col-lg-7 shadow p-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="true">Personal Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                        aria-controls="address" aria-selected="false">Address</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Contact</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th colspan="2" class="text-center">Basic Informations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>@if ($view->emp_gender == 0 )
                                    Male
                                    @elseif($view->emp_gender == 1)
                                    Female
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Birthday</th>
                                <td>{{date('M. d,Y',strtotime($view->emp_birthday))}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>
                                    {{$view->emp_email}}
                            
                               </td>
                            </tr>
                            <tr>
                                <th scope="row">Account Type</th>
                                @foreach ($userAccount as $userAccountView)
                                <td>{{$userAccountView->type}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th colspan="2" class="text-center">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">City</th>
                                <td>{{$view->emp_city}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Country</th>
                                <td>{{$view->emp_country}}</td>
                            </tr>
                            <tr>
                                <th scope="row">State</th>
                                <td>{{$view->emp_state}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th colspan="2" class="text-center">Contact Informations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Mobile Phone</th>
                                <td>{{$view->emp_phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Emergency Contact</th>
                                <td>{{$view->emp_emergencyname}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Emergency Contact Address </th>
                                <td>{{$view->emp_emergencyaddress}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Emergency Contact Number #1</th>
                                <td>{{$view->emp_emergencyphone1}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Emergency Contact Number #2</th>
                                <td>{{$view->emp_emergencyphone2}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
