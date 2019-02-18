<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GoToParty.pl') }} - @yield('title', 'Najlepsze imprezy i kluby w zasięgu Twojej ręki')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logo.png')}}"/>

@yield('css')

<!-- Google maps APIs -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNOkBFDkeXJPFHUAxKjwohBeoZKDEZjks&libraries=places"></script>
    <script>(function (e, t, n) {
            var r = e.querySelectorAll("html")[0];
            r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
        })(document, window, 0);</script>
</head>
<body>

<div id="app">

    @include('layouts.header')

    @if(Route::getCurrentRoute()->uri() == '/')
        @include('layouts.slider')

    @elseif(Route::getCurrentRoute()->uri() == '/events')
        test
    @else
        {{--@include ('layouts.banner')--}}
    @endif
    <main style="" class="mb-3">
        @yield('content')
    </main>

    @include('layouts.footer')

</div>

<div id="validate-errors">
    <div id="validate-error-content" class="content">
    </div>
</div>


<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'api_token' => (Auth::user()) ? Auth::user()->api_token : null
        ]) !!};
</script>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</body>
</html>
