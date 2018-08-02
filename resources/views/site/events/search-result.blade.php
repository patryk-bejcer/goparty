@extends('layouts.app')

@section('content')

    <div class="container">

        @include('site.events.includes.search')

        {{--<div class="row">--}}
            {{--<h1>Najbliższe imprezy</h1>--}}
        {{--</div>--}}

        <div class="row justify-content-center mt-2">

            {{--<div class="col-md-3 pt-3 pr-0">--}}
                {{--<div id="events-list-sidebar" class="text-white p-4">--}}
                    {{--@include('site.events.includes.sidebar')--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-10 col-md-offset-2 pl-0">
                <div id="events-list" class="text-white mb-3 pt-3 pb-3 pl-3 pr-3 user-left-menu">
                    {{--<h1>Najbliższe imprezy</h1>--}}
                    @foreach($events as $event)
                        @include('site.events.includes.single')
                    @endforeach

                    {{ $events->links() }}

                </div>
            </div>

        </div>
    </div>

@endsection

