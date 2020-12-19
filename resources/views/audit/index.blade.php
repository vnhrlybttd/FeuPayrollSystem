@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Audit Trail</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-server"></i> Audit Trail</li>
    </ol>
</nav>
<hr>

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-bordered text-center" id="myTable" class="display">
            <thead class="thead-dark">
                <tr>

                    <th>Event</th>
                    <th>User Type</th>
                    <th>User Name</th>
                    <th>New Value</th>
                    <th>Old Value</th>
                    <th>Log Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach($auditTrail as $aud)
                <tr>
                    <td>{{$aud->event}}</td>
                    <td >{{$aud->user_type}}</td>
                    <td >{{$aud->first_name}} {{$aud->last_name}}</td>

                    <td id="scroll">
                        @foreach(json_decode($aud->new_values) as $colName => $value)
                        <li>
                            {{$colName}}
                        </li>
                        @endforeach
                    </td>

                    @if($aud->old_values=='[]')
                    <td id="scroll">
                        No Changes
                    </td>
                   @else
                    <td id="scroll">
                        @foreach(json_decode($aud->old_values) as $colName => $value)
                        <li>
                            {{$colName}}
                        </li>
                        @endforeach
                    </td>
                    @endif
                    <td >{{$aud->created_at}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>








    @endsection
