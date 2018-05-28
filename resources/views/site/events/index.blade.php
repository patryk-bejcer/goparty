@extends('layouts.app')

@section('content')

    <div class="container">

        @include('site.events.includes.search')

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div id="events-list" class="text-white mb-3 pt-3 pb-3 pl-3 pr-3 user-left-menu">
                    <h1>Najbliższe imprezy</h1>
                    @foreach($events as $event)
                        @include('site.events.includes.single')
                    @endforeach
                </div>

                {{ $events->links() }}

            </div>

        </div>
    </div>
@endsection

