@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Time Logs</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-clock"></i> Time Logs</li>
    </ol>
</nav>
<hr>

<div class="container-fluid col-12">
    <div class="shadow">
        <div class="table-responsive p-3">
            <table class="table table-hover table-bordered text-center" id="myTable">
                <thead class="thead-info">
                    <tr>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($time as $viewTime)
                    <tr>
                    <td>{{$viewTime->att_date}}</td>
                    <td>{{$viewTime->checkin}}</td>
                    <td>{{$viewTime->checkout}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>





@endsection
