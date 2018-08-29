@extends('layouts/app')

@section('content')

    <div id="home-page-container" class="container">

        <clubs-nearest>
        </clubs-nearest>

        {{--<events-nearest-location>--}}
        {{--</events-nearest-location>--}}

        <events-nearest-date>
        </events-nearest-date>

    </div>

@endsection