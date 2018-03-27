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
                        @foreach($events as $event)
                            <p>{{$event->title}}</p>
                            {{$event->start_date}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
