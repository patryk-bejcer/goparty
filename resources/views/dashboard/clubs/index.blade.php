@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Twoje kluby</b>
                    </div>
                    <div class="card-body">
                        @foreach($clubs as $club)
                            <div class="row ">
                                <div class="col-md-2">
                                    <img class="img-fluid"
                                         src="http://static.asiawebdirect.com/m/bangkok/portals/bangkok-com/homepage/club-guide/pagePropertiesImage/clubs-bangkok.JPG"
                                         alt="">
                                </div>
                                <div class="col-md-8">
                                    <h4><a href="{{url('/clubs/' . $club->id)}}">{{$club->official_name}}</a></h4>
                                    <p class="mb-0">{{$club->route}} {{$club->street_number}}
                                        , {{$club->locality}}   </p>
                                    <p class="mb-0">Ostania modyfikacja: {{$club->updated_at}}  </p>
                                    <a href=""><i class="fa fa-comments-o" aria-hidden="true"></i> (35)</a>
                                    <a href=""><i class="fa fa-heart pl-2" aria-hidden="true"></i> (125)</a>
                                    <a href=""><i class="fa fa-star pl-2" aria-hidden="true"></i> 4.85</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('events.create', ['club_id' => $club->id])}}"
                                       class="btn btn-primary btn-sm mb-2 mr-2">Dodaj wydarzenie</a>
                                    <a href="{{url('dashboard/clubs/' . $club->id . '/club-events')}}"
                                       class="btn btn-primary btn-sm mb-2 mr-2">Wydarzenia</a>
                                    <a href="{{url('dashboard/clubs/' . $club->id . '/edit')}}" class="btn btn-secondary btn-sm mr-2">Edycja</a>
                                </div>
                            </div>
                            <hr>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
