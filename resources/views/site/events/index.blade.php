@extends('layouts.app')

@section('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css"/>
@endsection

@section('content')
    <div class="container">

        <form method="GET" action="{{ url('/search-events')  }}">
        <div class="row">
            <div id="events-search-form">
                <h2>Wyszukiwarka imprez</h2>
                <div class="row">
                    <div class="col-10 offset-1">
                <div class="row p-0 search-form-body">
                        <div class="col-md-4">
                            <city-search-box></city-search-box>
                        </div>
                        <div class='col-md-3'>
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                    <input name="start_date" type="text" class="form-control datetimepicker-input"
                                           data-target="#datetimepicker7" data-toggle="datetimepicker"/>
                                    <div class="input-group-append" data-target="#datetimepicker7"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-3'>
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                                    <input name="end_date" type="text" class="form-control datetimepicker-input"
                                           data-target="#datetimepicker8" data-toggle="datetimepicker"/>
                                    <div class="input-group-append" data-target="#datetimepicker8"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class='col-md-2 pr-0'>
                        <input type="submit" class="btn btn-success" value="Szukaj imprez">
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card text-white bg-dark mb-3 pt-3 pb-3 pl-3 pr-3 user-left-menu">
                    <h1>Najbliższe imprezy</h1>
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
                {{ $events->links() }}

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script type="text/javascript" src="{{asset('js/moment/locale_pl.js')}}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
            $('#datetimepicker7').datetimepicker({
                format: 'YYYY-MM-DD',
                defaultDate: "2017-05-23",
            });
            $('#datetimepicker8').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: false,
                defaultDate: "2017-06-23"
            });
            $("#datetimepicker7").on("change.datetimepicker", function (e) {
                $('#datetimepicker8').datetimepicker('minDate', e.date);
            });
            $("#datetimepicker8").on("change.datetimepicker", function (e) {
                $('#datetimepicker7').datetimepicker('maxDate', e.date);
            });
        });
    </script>
@endsection