<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/portal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/events.css') }}" rel="stylesheet">
    <link href="{{asset ('css/hover-min.css')}}" rel="stylesheet">
    <link href="{{asset ('css/rating.css')}}" rel="stylesheet">

@yield('css')

<!-- Google maps APIs -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNOkBFDkeXJPFHUAxKjwohBeoZKDEZjks&libraries=places"></script>

</head>
<body>

<div id="app">

    @include('layouts.header')

    <main style="overflow-y: hidden; margin-top: 6em;" class=" mb-5">
        @yield('content')
    </main>

    @include('layouts.footer')

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/custom.js')}}"></script>

@yield('scripts')

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
	]); ?>
</script>

<script>
    var main_change_url = '{{route('clubImage.changeMain')}}';
    var active_change_url = '{{route('clubImage.changeActive')}}';
    var image_delete_url = '{{route('clubImage.delete')}}';
    var url = '{{url('public/users')}}';
    var club_image_create_url = '{{route('clubImage.store')}}'
    var token = '{{csrf_token()}}'
</script>



</body>
</html>
