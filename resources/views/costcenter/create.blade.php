@extends('layouts.sidemenu')

@section('content')
<h2 style="color:#008349;"> Cost Center</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home" style="color:darkgoldenrod">&nbsp;</i><a
                href="{{'/home'}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-cog"></i> Manage Cost Center</li>
    </ol>
</nav>

<div class="container-fluid">

    <div class="shadow bg-white p-5">

    <form method="POST" action="{{route('CC.store')}}">
        @csrf
            <div class="form-group">
                <div class="label">Cost Center Name</div>
                <input class="form-control" name="cc_name">
            </div>
            <div class="form-group">
                <div class="label">Description</div>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

      
    </div>

</div>

@endsection
