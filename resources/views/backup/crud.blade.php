<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Sunnyface.com') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        window.AppRootData = {!! json_encode([
            'csrfToken' => csrf_token(),
            'state' => ['user' => Auth::user()]
        ]) !!};
    </script>
</head>
<body>
    <div id="app" class="boxx-wrapper">
        
        <div class="album py-5 bg-light">
          
            @yield('content')
        </div>
       
        @stack('modals')
    </div>
    <!-- Scripts -->
    @if (app()->isLocal())
      <script src="{{ mix('js/app.js') }}"></script>
    @else
      <script src="{{ mix('js/manifest.js') }}"></script>
      <script src="{{ mix('js/vendor.js') }}"></script>
      <script src="{{ mix('js/app.js') }}"></script>
    @endif
    @stack('scripts')
</body>
</html>