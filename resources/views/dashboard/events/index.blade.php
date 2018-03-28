@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('dashboard.includes.sidebar')
            <div class="col-md-9">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Wydarzenia utworzone przez ciebie</b>
                    </div>
                    <div class="card-body">
                        @foreach($events as $event)
                            <p>{{$event->title}}</p>
                            {{$event->start_date}}
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
