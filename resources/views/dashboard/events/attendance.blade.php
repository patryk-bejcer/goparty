@extends('layouts.app')

@section('content')

    <div class="container">


        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center pb-4">

            @include('dashboard.includes.sidebar')

            <div class="col-md-9">
                <div class="card text-white pb-5 mb-3">
                    <div class="card-header">
                        <h2 class="text-center mt-4"><b>Imprezy w których bierzesz udział</b></h2>
                    </div>
                    <div class="card-body">

                        @if(($events->count() == 0))
                        <h3 class="text-center">Niestety nie bierzesz udziału w żadnej imprezie :(</h3>
                            <a  href="{{url('/events')}}" class="text-white text-center center-block">
                                <div class="btn btn-success mt-3 margin-auto">Przejdz do imprez aby dodać</div></a>
                        @else
                        @foreach($events as $event)
                            <div class="single-event mb-3 p-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-fluid"
                                             src="@if($event->event->event_img) {{ url('/uploads/events/' . $event->event->event_img )  }} @else {{url('/img/default-event-img.jpg')}} @endif " alt="">
                                    </div>
                                    <div class="col-md-9">

                                        <a href="{{ url('/events/' . $event->event->id)  }}"><h3>{{$event->event->title}}</h3></a>
                                        <h5><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                            {{--{{ Carbon\Carbon::now() }}--}}
                                            {{$event->event->start_date}}</h5>
                                        <h5><i class="fa fa-building"
                                               aria-hidden="true"></i><a href="{{url('clubs/' . $event->event->club->id )}}">
                                                {{$event->event->club->official_name }}</a> <i class="fa fa-map-marker pl-3"
                                                                                        aria-hidden="true"></i>
                                            {{$event->event->club->route }}, {{$event->event->club->locality }}</h5>
                                        <p class="mb-1">
                                            @if($event->event->ticket_price) Wstęp od: {{$event->event->admission}} + @else Wstęp dla każdego @endif |
                                            @if($event->event->ticket_price) Cena biletu: {{$event->event->ticket_price}}zł @else <span class="text-success">Darmowy wstęp</span> @endif  |
                                            Selekcja: @if($event->event->selection) Tak @else Nie @endif</p>
                                        <i class="fa fa-users" aria-hidden="true"></i>

                                        @if(!$event->event->attendance->count() > 0)
                                            Nikt jescze nie bierze udziału
                                        @else
                                            Liczba osób które biorą udział: {{$event->event->attendance->count()}}
                                        @endif


                                        <p class="mt-1">{{ str_limit($event->event->description, $limit = 250, $end = '...') }}</p>

                                        @if(Auth::check())
                                            @if(!$event->event->checkIfAttendance())

                                                <form method="POST" action="{{url('/take-part')}}">
                                                    @csrf
                                                    <input name="event_id" type="hidden" value="{{$event->event->id}}">
                                                    <input style="background: #EF3AB1 !important" class="btn btn-success pull-right" type="submit" value="Weź udział">
                                                </form>

                                            @else

                                                <form method="POST" action="{{url('/take-part')}}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input name="event_id" type="hidden" value="{{$event->event->id}}">
                                                    <input style="background: #EF3AB1 !important" class="btn btn-success pull-right" type="submit" value="Zrezygnuj z imprezy">
                                                </form>

                                            @endif

                                        @endif





                                        {{--<take-part :user="{{ json_encode(Auth::id()) }}" :event="{{ json_encode($event->event->id) }}"></take-part>--}}

                                    </div>
                                </div>
                            </div>
                            {{--@include('site.events.includes.single')--}}
                        @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
