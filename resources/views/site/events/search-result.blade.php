@extends('layouts.app')

@section('content')
    <div class="container">

        @include('site.events.includes.search')

        <div class="row justify-content-center">

            <div class="col-md-3 p-4 text-white" id="sidebar" style="background:#343a40;">

                @include('site.events.includes.sidebar')

            </div>


            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3 pt-3 pb-3 pl-3 pr-3 user-left-menu">
                    <h1>Wyniki wyszukiwania:</h1>
                    @foreach($events as $event)
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-fluid"
                                     src="http://static.asiawebdirect.com/m/bangkok/portals/bangkok-com/homepage/club-guide/pagePropertiesImage/clubs-bangkok.JPG"
                                     alt="">
                            </div>
                            <div class="col-md-9">
                                <a href="{{ url('/events/' . $event->id)  }}"><h3>{{$event->title}}</h3></a>
                                <h5><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    {{$event->start_date}}</h5>
                                <h5><i class="fa fa-building"
                                       aria-hidden="true"></i><a href="{{url('clubs/' . $event->club->id )}}">
                                        {{$event->club->official_name }}</a> <i class="fa fa-map-marker pl-3"
                                                                                aria-hidden="true"></i>
                                    {{$event->club->route }}, {{$event->club->locality }}</h5>
                                <p>Wstęp od: {{$event->admission}}+ | Cena biletu: {{$event->ticket_price}}zł |
                                    Selekcja: @if($event->selection) Tak @else Nie @endif</p>
                                <p>{{$event->description}}</p>


                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                {{--{{ $events->links() }}--}}

            </div>

        </div>
    </div>
@endsection
