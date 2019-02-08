@extends('layouts.app')

@section('content')

    <div class="container">


        @include('site.events.includes.search')


        <div id="event-list" class="mt-4 pt-4">
            <flash message="{{ session('flash') }}"></flash>
            <div class="card-columns">

                @foreach($events as $event)
                    <div class="">
                        <div class="card mb-4 pb-4">
                            {{--<div class="card-header">--}}
                            {{--Card Header--}}
                            {{--</div>--}}
                            <a href="{{ url('/events/' . $event->id)  }}">
                                <img class="card-img-top"
                                     src="@if($event->event_img) {{ url('/uploads/events/' . $event->event_img )  }} @else {{url('/img/default-event-img.jpg')}} @endif "
                                     alt="Card image top">
                            </a>
                            <div class="card-body pb-0">
                                <a href="{{ url('/events/' . $event->id)  }}"><h4>{{$event->title}}</h4></a>
                                <h6><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    {{--{{ Carbon\Carbon::now() }}--}}
                                    {{$event->start_date}}</h6>
                                <h6><i class="fa fa-building"
                                       aria-hidden="true"></i><a href="{{url('clubs/' . $event->club->id )}}">
                                        {{$event->club->official_name }}</a> <br> <i class="fa fa-map-marker pt-1"
                                                                                     aria-hidden="true"></i>
                                    {{$event->club->route }}, {{$event->club->locality }}</h6>
                                <p class="mb-1">
                                    @if($event->ticket_price) Wstęp od: {{$event->admission}} + @else Wstęp dla
                                    każdego @endif |
                                    @if($event->ticket_price) Cena biletu: {{$event->ticket_price}}zł @else <span
                                            class="text-success">Darmowy wstęp</span> @endif
                                    <br>
                                    Selekcja: @if($event->selection) Tak @else Nie @endif</p>
                                {{--<p class="pb-0 mb-0">{{ str_limit($event->description, $limit = 120, $end = '...') }}</p>--}}

                                @if(Auth::check())
                                    @if(!$event->checkIfAttendance())

                                        <form method="POST" action="{{url('/take-part')}}">
                                            @csrf
                                            <input name="event_id" type="hidden" value="{{$event->id}}">
                                            <input style="background: #EF3AB1 !important"
                                                   class="btn btn-success pull-right" type="submit" value="Weź udział">
                                        </form>

                                    @else

                                        <form method="POST" action="{{url('/take-part')}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input name="event_id" type="hidden" value="{{$event->id}}">
                                            <input style="background: #EF3AB1 !important"
                                                   class="btn btn-success pull-right" type="submit"
                                                   value="Zrezygnuj z imprezy">
                                        </form>

                                    @endif

                                @endif


                            </div>

                            {{--<div class="card-footer">--}}
                            {{--Card Footer--}}
                            {{--</div>--}}
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

        {{ $events->links() }}

    </div>


@endsection

