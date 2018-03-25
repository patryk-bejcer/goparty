@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('users.dashboard.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Wydarzenia w klubie {{$club->official_name}}</b>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary btn-sm mb-3" href="">Dodaj nowe wydarzenie</a>
                        <p>{{$club->events}}</p>
                       {{--@foreach($events as $event)--}}
                           {{--<div class="row ">--}}
                               {{--<div class="col-md-2">--}}
                                   {{--<img class="img-fluid" src="http://static.asiawebdirect.com/m/bangkok/portals/bangkok-com/homepage/club-guide/pagePropertiesImage/clubs-bangkok.JPG" alt="">--}}
                               {{--</div>--}}
                               {{--<div class="col-md-8">--}}
                                   {{--<h4><a href="{{url('/clubs/' . $event->id)}}">{{$event->official_name}}</a></h4>--}}
                                   {{--<p class="mb-0">{{$event->route}} {{$event->street_number}}, {{$event->locality}}   </p>--}}
                                   {{--<p class="mb-0">Ostania modyfikacja: {{$event->updated_at}}  </p>--}}
                                   {{--<a href=""><i class="fa fa-comments-o" aria-hidden="true"></i> (35)</a>--}}
                                   {{--<a href=""><i class="fa fa-heart pl-2" aria-hidden="true"></i> (125)</a>--}}
                                   {{--<a href=""><i class="fa fa-star pl-2" aria-hidden="true"></i>  4.85</a>--}}
                               {{--</div>--}}
                               {{--<div class="col-md-2">--}}
                                   {{--<a href="#" class="btn btn-primary btn-sm mb-2">Wydarzenia</a>--}}
                                   {{--<a href="{{url('/clubs/' . $event->id . '/edit')}}" class="btn btn-secondary btn-sm">Edycja</a>--}}
                               {{--</div>--}}
                           {{--</div>--}}
                            {{--<hr>--}}
                       {{--@endforeach--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
