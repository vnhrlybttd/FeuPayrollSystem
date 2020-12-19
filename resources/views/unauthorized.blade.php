@extends('layouts.sidemenu')

@section('content')

<noscript>
        <meta http-equiv="refresh" content="5;url={{$url}}" />
    </noscript>

<div class="row justify-content-center">
    <h1><i class="fas fa-exclamation-circle text-danger"></i></h1>
</div>


<div class="row justify-content-center">
    <h1 class="text-danger">Redirecting...</h1>

   
</div>

<div class="row justify-content-center">
        If you are not redirected within 5 seconds, 
        please <a href="{{ $url }}"> click here</a>.
</div>


<script>
        window.setTimeout(function () {
            window.location = "{{ $url }}";
        }, 5000);
    </script>

@endsection
