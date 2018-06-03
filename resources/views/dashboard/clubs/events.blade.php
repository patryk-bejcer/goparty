@extends('layouts.app')

@section('content')
    <div class="container">
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
                            <p>{{$event->start_date}} - {{$event->title}}</p>
                            <p>Klub: {{$event->club->official_name}}</p>
                            <a href="{{url('dashboard/clubs/' . $event->club->id . '/events/' . $event->id . '/edit')}}"
                               class="btn btn-secondary btn-sm mr-2">Edycja</a>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
