@extends('layouts.app')

@section('content')

    <div class="container">


        @include('layouts.includes.subpages-banner')
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Twoje wydarzenia w klubie <a href="{{url('clubs/'. $club->id)}}">{{$club->official_name}}</a></b>
                        <a href="{{route('events.create', ['club_id' => $club->id])}}"
                           class="btn btn-primary btn-sm mb-2 pull-right">Dodaj wydarzenie</a>
                    </div>
                    <div class="card-body">
                        @foreach($club->events as $event)
                            <h3><b>{{$event->title}}</b> (<small>{{$event->start_date}}) </small></h3>
                            <h4>Klub: <a href="">{{$event->club->official_name}}</a></h4>
                            <a href="{{url('dashboard/clubs/' . $event->club->id . '/events/' . $event->id . '/edit')}}"
                               class="btn btn-primary btn-sm mr-2">Edytuj wydarzenie</a>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
