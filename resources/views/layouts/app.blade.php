<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/portal.css') }}" rel="stylesheet">
    <link href="{{asset ('css/hover-min.css')}}" rel="stylesheet">
    <link href="{{asset ('css/rating.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">






    <!-- Google maps APIs -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNOkBFDkeXJPFHUAxKjwohBeoZKDEZjks&libraries=places"></script>
</head>
<body>

<div id="app">

    @include('layouts.header')
    @if(Route::getCurrentRoute()->uri() == '/')
     @include('layouts.slider')

    @else
    @include ('layouts.banner')
        @endif
    <main style="overflow-y: hidden" class="mt-5 mb-5">
        @yield('content')
    </main>
      @include('layouts.footer')
</div>

<div id="validate-errors">

        <div id="validate-error-content" class="content">

        </div>
</div>


<!-- Scripts -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="{{asset('js/custom.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    var main_change_url = '{{route('clubImage.changeMain')}}';
    var active_change_url = '{{route('clubImage.changeActive')}}';
    var image_delete_url = '{{route('clubImage.delete')}}';
    var url = '{{url('public/users')}}';
    var club_image_create_url = '{{route('clubImage.store')}}';
    var token = '{{csrf_token()}}';
    var club_rate = '{{route('club.rate')}}';
    var club_rate_delete = '{{route('club.rate.delete')}}';
</script>


</body>
</html>
